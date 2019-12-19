<div id = "table-pagination">
<table class="table" id = "table" >
  <thead class="thead">
    <tr>
      <th scope="col">#</th>
      <th scope="col"> Name</th>
      <th scope="col"> E-mail</th>
      <th scope="col">Text</th>
      <th scope="col">Status</th>
      <?php if($data['admin']){
          echo  '<th scope="col">Action</th>';
      }?>
    </tr>
  </thead>
  <tbody>
  <?php if(isset($data['tasks'])){
  foreach($data['tasks'] as $task){
    echo '<tr><th scope="row">'.$task->id.'</th>';
    echo '<td>'.$task->name.'</td>';
    echo '<td>'.$task->email.'</td>';
    echo '<td><code>'.$task->getText().'</code></td>';
    echo '<td>'.$task->getStatus().'</td>';

     if($data['admin']){
        echo '<td>
        <form action="/task/edit" method="post">
        <input type="hidden"  name = "task_id" value = "'.$task->id.'">
        <button type="submit" class ="btn btn-warning btn-sm">Edit</button>
        </form>
    
        <form action="/task/delete" method="post">
        <input type="hidden"  name = "task_id" value = "'.$task->id.'">
        <button type="submit" class ="btn btn-danger btn-sm">Delete</button>
        </form>
        </td>';
    }

    echo '</tr>';
  }
} 
?>
  </tbody>
</table>
</div>