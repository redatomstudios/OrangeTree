<div>
<?php
echo form_open('/dashboard/login');

echo "Username : ";
$data = array(
              'name'        => 'username',
              'id'          => 'username' );
echo form_input($data);

echo "<br>Password : ";
echo form_input(array('name' => 'password', 'id' => 'password', 'type' => 'password'));

echo form_submit('Submit','Submit');
form_close();
 ?>
</div>