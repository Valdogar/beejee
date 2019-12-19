<?php
if($data['task_id']){
  require_once('./application/views/parts/edit_task.php');
} else {
  require_once('./application/views/parts/create_task.php');
}