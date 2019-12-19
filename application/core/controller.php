<?php
require_once('./application/models/model_db.php');
class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
	}
	
	function action_index()
	{

	}

	function validateAdmin(){

			$db = Model_DbConnection::get();
			if ($db->connect_error) {
				die("Connection failed: " . $db->connect_error);
			} 
			$err = array();
			// проверям логин
			if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
			{
				$err[] = "Логин может состоять только из букв английского алфавита и цифр";
			}
			if(!preg_match("/^[0-9]+$/",$_POST['contact']))
			{
				$err[] = "Номер телефона может состоять только из  цифр";
			}
			if(strlen($_POST['contact']) < 5 or strlen($_POST['contact']) > 15)
			{
				$err[] = "Номер телефона должен быть не меньше 5-х символов и не больше 15";
			}
			if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 15)
			{
				$err[] = "Логин должен быть не меньше 3-х символов и не больше 15";
			}
			if ($_POST['password']!=$_POST['password_check'])
			{
				$err[] = "Пароли не совпадают!";
			}
			//проверяем, не сущестует ли пользователя с таким именем
			$sql= "SELECT * FROM users WHERE login = '{$_POST['login']}'";
			$ressql = $db->query($sql);//
			if ($ressql->num_rows==1)
			{
				$err[] = 'Пользователь с таким логином уже существует в базе данных!';
			}

			if(count($err) == 0)
			{ 
				return true;
			}
			else
			{
				return $err;
			}
		}
	
		function validate($input){
			$err = [];
			// e-mail validation
			if (!empty($input['email'])) {
				
				$email = $input['email'];
				$email = filter_var($email, FILTER_VALIDATE_EMAIL);
				if ($email === false) {
					$err[] = "E-mail не корректен!";
				}
			
			} 
			// name validation
			if (!empty($input['name'])){
				
				if(strlen($input['name']) < 3 or strlen($input['name']) > 15)
				{
					$err[] = "Имя должено быть не меньше 3-х символов и не больше 15";
				}
			} 

			//text validation
			if (!empty($input['text'])){
				
				if(strlen($input['text']) < 3 or strlen($input['text']) >500)
				{
					$err[] = "Текст должен быть не меньше 3-х символов и не больше 500";
				}
			} 


			if(count($err) == 0)
			{ 
				return true;
			}
			else
			{
				return $err;
			}
		}
/*
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		  }*/


}
