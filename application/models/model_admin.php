<?php
require_once('./application/models/model_db.php');
class Model_Admin extends Model
{
    public $id;
	public $login;
	public $password;
	private $table = 'admins';
	public $_isNew = true;

   public  function getAdmin($login)
        {	
            $conn = Model_DbConnection::get();

            $login = $conn->real_escape_string($login);
            $table = $this->table;
            $query = "SELECT * FROM $table WHERE login ='$login' LIMIT 1";
            
            $result = $conn->query($query);
            
            $arrData = $result->fetch_assoc();
            
            $admin = new Model_Admin;
            $admin->id = $arrData['id'];
            $admin->login = $arrData['login'];
            $admin->password = $arrData['password'];
            $admin->_isNew = false;
            return $admin;
        }

}
?>
