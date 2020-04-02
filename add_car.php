<?php

require_once 'db.php';


if (isset($_POST['car_name'])){



$carName = $_POST['car_name'];


$sql_check = " SELECT * FROM cars WHERE cars = '$carName' ";
$execute_check = mysqli_query($connection, $sql_check);

if (mysqli_num_rows($execute_check)>0) {
echo " <h5 class = ' alert alert-danger' >  <span class = 'text-warning'>{$carName}</span> Already existed </h5> ";

}elseif (empty($carName)) {
  echo " <h5 class = ' alert alert-danger' >  Please provide Car name </h5> ";
}

else {
$sql = " INSERT INTO cars(cars) VALUES('$carName') ";
$executeSql = mysqli_query($connection, $sql);
if ($executeSql) {

  echo " <h5 class = ' alert alert-success' > Added Success Fully </h5> ";
}
}



// header("Location: index.html");


}


?>
