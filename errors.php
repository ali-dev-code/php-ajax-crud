<?php

require_once 'db.php';



$car_namees =   $_POST['error'];// kewyword frist search

if (!empty($car_namees)) {
  $sql_check = " SELECT * FROM cars WHERE cars = '$car_namees' ";
  $execute_check = mysqli_query($connection, $sql_check);

  if (mysqli_num_rows($execute_check)>0) {
    echo " <h5 class = ' alert alert-danger' >  <span class = 'text-danger'> {$car_namees} </span> Already existed </h5> ";

    }

}else {
  echo " <h5 class = ' alert alert-danger' >  Please provide Car name </h5> ";
}


?>
