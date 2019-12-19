<?php 
require_once('./application/models/model_db.php');
class Model_Task extends Model
{
    public $id;
    public $name; 
    public $text;
    public $email; 
    public $status;
    public $edited = '0';
    protected $table = 'tasks';
    public static $table_st = 'tasks';
    public $_isNew = true;

    public function save()
    {
        
        $conn = Model_DbConnection::get();

        if ($this->_isNew) {
            $query = "INSERT INTO $this->table (name, email, text)  
                    VALUES ('$this->name', '$this->email', '$this->text')";
            $result = $conn->query($query);
            if ($result) {
                $this->id = $conn->insert_id;
                $this->_isNew = false;
            }
            return $result;
        } else {
            $query = "UPDATE $this->table SET `text` = '$this->text',
                                    `status` = '$this->status',
                                    `edited` = '$this->edited'
                    WHERE id = $this->id";
            $result = $conn->query($query);
            return $result;
        }
    }

    public static function delete($task_id){

		$conn = Model_DbConnection::get();
        $table = self::$table_st;
		$query = "DELETE FROM $table WHERE id = '$task_id'";
		$result = $conn->query($query);
        return $result;

    }

    public  function getTaskById($task_id)
    {	
        $conn = Model_DbConnection::get();
        $table = $this->table;
        $query = "SELECT * FROM $table WHERE id ='$task_id'";
        $result = $conn->query($query);
        $arrData = $result->fetch_assoc();
        $task = new Model_Task;
        $task->id = $arrData['id'];
        $task->name = $arrData['name'];
        $task->email = $arrData['email'];
        $task->text = $arrData['text'];
        $task->status = $arrData['status'];
        $task->edited = $arrData['edited'];
        $task->_isNew = false;
        return $task;
    }

    public static function getTasks()
    {
        $conn = Model_DbConnection::get();
        $table = 'tasks';
        $query = "SELECT * FROM $table";
        $result = $conn->query($query);
        $tasks = [];
        $arrData = $result->fetch_assoc();
        while ($arrData) {
            $task = new Model_Task;
            $task->id = $arrData['id'];
            $task->name = $arrData['name'];
            $task->email = $arrData['email'];
            $task->text = $arrData['text'];
            $task->status = $arrData['status'];
            $task->edited = $arrData['edited'];
            $task->_isNew = false;
            $tasks[] = $task;
            $arrData = $result->fetch_assoc();
        }
        return $tasks;
    }
    
    public function getStatus(){
        if($this->status == true){
            return 'Выполнено';
        }
        return 'Не выполнено';
    }

    function getText(){
		$isEditText = '  (Отредактированно Администратором!)';
		if($this->edited == '1') {
			return $this->text.$isEditText;
		}
		return $this->text;
	}
}