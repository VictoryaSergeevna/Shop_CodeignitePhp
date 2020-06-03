<?php
$this->load->view('header');
$st['class']='form-horizontal';
$data['accept-charset']='utf8';
echo form_open('index.php/home/getItemInfo2',$st);
echo "<div class='col-md-offset-3'>";
echo form_label('Select item','itemid',array( 'class'=>'control-label'));
echo '&nbsp;';
echo '<select name="itemid">';
foreach ($list as $l){
echo '<option value='.$l['id'].'>';
echo $l['itemName'];
echo '</option>';
}
echo '</select>';
echo '&nbsp;';
echo form_submit(array('name'=>'send','value'=>'Send', ' class'=>'btn btn-success'));
echo '</div>';
echo form_close();
$this->load->view('footer');

?>