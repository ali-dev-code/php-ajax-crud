<?php

include 'db.php';


/***********************Displaying Action Box Data ********************/


/***********************Displaying Action Box Data ********************/


if(isset($_POST['id'])) {

  $id =   mysqli_real_escape_string($connection, $_POST['id']);

    $query = "SELECT * FROM cars WHERE id = {$id}";
    $query_car_info = mysqli_query($connection, $query);

    if(!$query_car_info) {

    die("Query Failed" . mysqli_error($connection));


    }

    while($row = mysqli_fetch_array($query_car_info)) {



?>


 <div class="card bg-secondary p-5">
 <p id="feedback" class="bg-success"></p>
 <input rel=" <?php echo $row['id']; ?>" type='text' class='mr-1 form-control title-input' value="<?php echo $row['cars']; ?> ">


<div class="d-flex  mt-2 buttonall">

  <input type='button' class='mr-1 btn btn-success update' value='Update'>
  <input type='button' class='mr-1 btn btn-danger delete' value='Delete'>
  <input type='button' class=' btn btn-close btn-warning' value='Close'>

</div><!-- /.d-flex -->
 </div><!-- /.card-body -->



<?php

    }



}



/*********************** Updating Data ********************/


if(isset($_POST['updatethis'])) {


  $id =   mysqli_real_escape_string($connection, $_POST['id']);
  $tittle =   mysqli_real_escape_string($connection, $_POST['title']);


 $id    =  $_POST['id'];
 $title =  $_POST['title'];

  $query = "UPDATE cars SET cars = '$title' WHERE id = $id ";

  $result_set = mysqli_query($connection, $query);


  if(!$result_set) {

  die("QUERY FAILED" . mysqli_error($connection));

  }



}





/*********************** Deleting Data ********************/

if(isset($_POST['deletethis'])) {


  $id =   mysqli_real_escape_string($connection, $_POST['id']);

  $id    =  $_POST['id'];


  $query = "DELETE FROM cars WHERE id = $id ";

  $result_set = mysqli_query($connection, $query);

  if(!$result_set) {

  die("QUERY FAILED" . mysqli_error($connection));

  }



}





?>




<script>
$(document).ready(function() {

  var id;
  var title;
  var updatethis = "update";
  var deletethis = "delte";
  /* Extract id and titles */


  $('.title-input').on('input', function() {
    id = $(this).attr('rel');
    title = $(this).val();



  }); // fetch valude when user will inout for updating


  /* update function */

  $('.update').on('click', function() {

    $.post('process.php', {
      id: id,
      title: title,
      updatethis: updatethis
    }, function(data) {

      $("#feedback").text("Record updated successfully");

    });



  }); //update


  /* delete function */

  $(".delete").on('click', function() {


    if (confirm('Are you sure you want to delete this')) {

      id = $(".title-input").attr('rel');

      $.post("process.php", {
        id: id,
        deletethis: deletethis
      }, function(data) {



        $("#action-container").hide();



      });


    }


  }); // delete



 /*********** Close Button Function *************/


 $(".btn-close").on('click', function(){

            $("#action-container").hide();



        });






}); // document ready
</script>
