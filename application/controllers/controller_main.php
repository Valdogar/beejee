<?php
require_once('./application/models/model_task.php');
class Controller_Main extends Controller
{
	function action_index()
	{	
		session_start();
		$data =[];
		$tasks = Model_Task::getTasks();
		$data['tasks'] = $tasks;
		if(isset($_SESSION['login']) && $_SESSION['login']=='admin'){
			$data['admin'] = true;
		} else {
			$data['admin'] = false;
		}
		$this->view->generate('main_view.php', 'template_view.php',$data);
	}
}

?>