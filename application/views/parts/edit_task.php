<div class="login-page">
  <div class="form" autocomplete="off" >
    <form class="register-form" action="/task/save" method="post" id="register-form">

    <?php 
      echo '<input type="text" placeholder="name" name="name" disabled value="'.$data['task']->name.'" 
      required autocomplete="false"/>';
      echo '<input type="text" placeholder="e-mail" name="email"  disabled value ="'.$data['task']->email.
      '" required autocomplete="false"/>';
      echo '<textarea name="text" id="text" placeholder="text"  rows="3" required autocomplete="false">'
      .$data['task']->text.
      '</textarea>';
      echo '<input type="hidden" name="task_id" value="'.$data['task_id'].'">';
      echo '<select  name = "status" class="mdb-select md-form">';
      if($data['task']->status === '1'){
        echo '<option value="1" selected="selected" >Выполнено</option>';
      } else {
        echo '<option value="1">Выполнено</option>';
        echo '<option value="0" selected="selected">Не выполнено</option>';
      }
      echo  '</select>';
?>
      <button type="submit" form="register-form" >edit</button>
    </form>
  </div>
</div>

