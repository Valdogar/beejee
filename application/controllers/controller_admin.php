<?php
class Controller_Admin extends Controller
{
    
	function __construct()
	{
		$this->model = new Model_Admin();
		$this->view = new View();
	}
	
	function action_index()
	{

	}

	function action_save()
	{

		$is_valid_input = $this->validate();

		if($is_valid_input===true){
			$this->model->login = $_POST['login'];
			$this->model->contact = $_POST['contact'];
			$this->model->password = md5(md5(trim($_POST['password'])));
			$this->model->save();
			$this->view->generate('login_view.php', 'template_view.php');
		} else {
			$data['err'] = $is_valid_input;
			$this->view->generate('register_view.php', 'template_view.php',$data);
		}
	}

	function action_login(){
		$err = [];
		if(isset($_POST['login']) && isset($_POST['password']))
		{
			$login = $_POST['login'];
			$password =md5(md5(trim($_POST['password'])));
			
			$admin = $this->model->getAdmin($login);
			if(!$admin or $password!=$admin->password) {
				$err[] = 'Неправильный логин или пароль!';
			} 
			if($login==$admin->login && $password==$admin->password)
			{
				$data["login_status"] = "access_granted";
				session_start(); 
				$_SESSION['login'] = $login;
				echo $_SESSION['password'];
				$_SESSION['admin_id'] = $admin->id;
				header('Location:/');
			}
			else
			{
				$data["login_status"] = "access_denied";
			}
		}
		else
		{
			$data["login_status"] = "";
		}
		$data['err'] = $err;
		$this->view->generate('login_view.php', 'template_view.php', $data);
	}


	function action_logout()
	{
		session_start();
		$_SESSION['login'] = '';
		session_destroy();
		header('Location:/');
	}
}
?>