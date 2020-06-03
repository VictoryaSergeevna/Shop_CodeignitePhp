<?php
$this->load->view('header');
$data['class']='form-horizontal';
$data['accept-charset']='utf8';
echo form_open('index.php/home/getItemInfo',$data);
echo "<div class='col-md-offset-4'>";
$inp=array('name'=>'itemid','class'=>'col-md-2', 'style'=>'color:green;margin:5px;',
'placeholder'=>'select id','type'=>'text');
echo form_input($inp);
echo form_submit(array('name'=>'send','value'=>'OK', 'class'=>'btn btn-sm btn-success col-sm-2'));
echo "</div>";
echo form_close();
$this->load->view('footer');
?>