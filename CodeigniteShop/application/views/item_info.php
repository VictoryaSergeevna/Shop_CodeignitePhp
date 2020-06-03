<?php 
$this->load->view('header');
echo "<div class='col-md-offset-1'>";
echo "<h2>".$title."</h2>";
echo "<h3>".$item[0]['itemName']."</h3>";
echo "<p>".$item[0]['priceIn']."</p>";
echo "<p style='color:red;font-size:14pt;font-family=Verdana;''>".$item[0]['priceSale']."</p>";
echo "<p>".$item[0]['info']."</p>";
 echo"</div>";
 $this->load->view('footer');
?>

