<?php
echo '<span style="color:red;margin-left:20px;">';
echo validation_errors();
echo '</span>';
if(isset($success))
{
echo '<span style="color:green;margin-left:20px;">';
echo $success;
echo '</span>';
}

$this->load->view('header');
$st['class']='form-horizontal';
echo form_open('index.php/home/registration',$st);
echo '<div class="row" style="margin:2px;">';
echo form_label('Enter your login: ','login', array('class'=>'control-label col-md-3'));
$data = array('name' => 'login','size' => '50', 'value'=> set_value('login'));
echo form_input($data);
echo '</div>';
echo '<div class="row " style="margin:2px;">';
echo form_label('Enter password: ','pass1', array('class'=>'control-label col-md-3'));
$data = array('name'=>'pass1','size'=>'50', 'value'=> set_value('pass1'));
echo form_password($data);
echo '</div>';
echo '<div class="row" style="margin:2px;">';
echo form_label('Confirm password: ','pass2', array('class'=>'control-label col-md-3'));
$data = array('name' => 'pass2', 'size' => '50', 'value'=> set_value('pass2'));
echo form_password($data);
echo '</div>';
echo '<div class="row" style="margin:2px;">';
echo form_label('Enter email: ','email', array('class'=>'control-label col-md-3'));
$data = array('name' => 'email', 'type' => 'email', ' size' => '50', 'value'=>set_value('email'));
echo form_input($data);
echo '</div>';

echo '<div class="row" style="margin-left:500px; margin-top:20px;">';
echo form_submit(array('name'=>'send','value'=>'Send', 'class'=>'btn btn-success'));
echo form_reset(array('name'=>'reset','value'=>'Reset', 'class'=>'btn btn-info'));
echo '</div>';
echo form_close();
$this->load->view('footer');
?>
