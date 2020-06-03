<?php
$this->load->view('header');
if(isset($error))
{
echo '<div style="color:red;">'.$error.'</div>';
} 
else if(isset($upload_data))
{
echo '<div style="color:green;">';
echo '<ul>';
foreach ($upload_data as $item => $value) {
  echo '<li>'.$item.':'.$value.'</li>';
}
echo '</ul>';
echo '</div>';
}
else if(isset($result))
{
echo '<div style="color:green;">'.$result.'</div>';
}

$st['class']='form-horizontal';
echo form_open_multipart('index.php/home/selectImages',$st);
echo '<div class="col-md-offset-3">';
echo form_label('Select image ', ' image',array('class'=>'control-label'));
echo '&nbsp;';
echo form_upload('image',array('class'=>'control-label'));
echo '&nbsp;';
echo form_submit(array('name'=>'send','value'=>'Send', 'class'=>'btn btn-success'));
echo '</div>';
echo form_close();
$this->load->view('footer');
?>