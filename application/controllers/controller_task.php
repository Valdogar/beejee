<?php
require_once('./application/models/model_db.php');
class Controller_Task extends Controller
{
    function __construct()
	{
		$this->model = new Model_Task();
		$this->view = new View();
	}
    
    
    function action_index()
	{	
			$data=[];
			session_start();
			if(isset($_SESSION['login']) && $_SESSION['login']=='admin'){
				$data['admin'] = true;
			} else {
				$data['admin'] = false;
			}
			$this->view->generate('task_view.php', 'template_view.php',$data);
    }


	function action_save()
	{
			$is_valid_input = $this->validate($_POST);
			if($is_valid_input===true){

			if(isset($_POST['task_id'])){
				session_start();
				if(isset($_SESSION['login']) && $_SESSION['login']=='admin'){
					$this->model->_isNew = false;
					$this->model->id = $_POST['task_id'];
					$old_task = $this->model->getTaskById($_POST['task_id']);
		
					if($old_task->text != trim(htmlspecialchars($_POST['text'])) ){
						$this->model->edited = '1';
					}
		
					$this->model->text = trim(htmlspecialchars($_POST['text']));
					$this->model->status = trim(htmlspecialchars($_POST['status']));
					
				} else {
					header('Location:/404');
				}
			} else {
				$this->model->name = trim(htmlspecialchars($_POST['name']));
				$this->model->email = trim(htmlspecialchars($_POST['email']));
				$this->model->text = trim(htmlspecialchars($_POST['text']));
			}
			$this->model->save();
            $suc[] = "Task saved!";
			$data['err'] = $suc;
			$this->view->generate('task_view.php', 'template_view.php',$data);
		} else {
			$data['err'] = $is_valid_input;
			$this->view->generate('task_view.php', 'template_view.php',$data);
		}
	
		
	}

	function action_delete()
	{	
		session_start();

		if(isset($_SESSION['login']) && $_SESSION['login']=='admin'){
			$err =[];
			$resource = $this->model;
			if(isset($_POST['task_id'])){
				$result = $resource::delete($_POST['task_id']);
				if($result){
					$err[] = 'Resource deleted!';
					$data['err'] = $err;
					header('Location:/');
				}
			} else {
				 $err[] = 'Something went wrong!';
				 $data['err'] = $err;
				 header('Location:/');
			}
		} else {
			header('Location:/404');
		} 
    }

	function action_edit()
	{	
			session_start();
			if(isset($_SESSION['login']) && $_SESSION['login']=='admin'){
				$data['admin'] = true;
			} else {
				$data['admin'] = false;
			}
			$data['task_id']=$_POST['task_id'];
			$data['task'] = $this->model->getTaskById($_POST['task_id']);
			$this->view->generate('task_view.php', 'template_view.php',$data);
    }



}
