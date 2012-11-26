<div>
<?php
form_open('/dashboard/login');

$data = array(
              'name'        => 'username',
              'id'          => 'username' );
echo form_input($data);
echo form_input(array('name' => 'password', 'id' => 'password');

form_close();
 ?>
</div>