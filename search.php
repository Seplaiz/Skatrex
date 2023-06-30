<?php
  include ("./connection.php");
  
  $value = $_POST['search'];
  $sql = "SELECT * FROM product WHERE prod_name LIKE '%$value%' ";
  $result = $db->query($sql);

  if($result) {
    while ($row = $result->fetch_assoc()) {
      echo $row['prod_name'];
      echo $row['prod_price'];
      echo $row['img'];
      echo $row['stock'];
    }
  } else {
    echo 'Error';
  }
?>