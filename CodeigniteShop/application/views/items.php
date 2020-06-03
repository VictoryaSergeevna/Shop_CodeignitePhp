<?php
$this->load->view('header');
echo '<h2>'.$title.'</h2>';
echo '<table  class="table table-striped">';
foreach($items as $c)
{
echo '<tr>';
echo '<td>'.$c['itemName'].'</td>';
echo '<td>'.$c['priceIn'].'</td>';
echo '<td>'.$c['priceSale'].'</td>';
echo '<td>'.$c['info'].'</td>';
echo '</tr>';
}
echo '</table>';
$this->load->view('footer');
?>
