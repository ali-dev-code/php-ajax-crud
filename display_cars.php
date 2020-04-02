<?php


include_once 'db.php';



?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Action</th>
      <!-- <th></th> -->
    </tr>
  </thead>
  <tbody class="bg-light">


    <?php
         $query = " SELECT * FROM cars  ";

         $execute_query = mysqli_query($connection, $query);


         while ($row = mysqli_fetch_array($execute_query)) {

          $car_id = $row['id'];
          $car_name = $row['cars'];
           ?>
    <tr>
      <td> <?php echo $car_id; ?> </td>
      <td>  <?php echo $car_name; ?> </td>
      <td> <a rel="<?php echo $car_id; ?>" class="title-link btn btn-primary btn-sm" href="javascript:void(0)"> action </a> </td>

    </tr>
    <?php

}

 ?>

  </tbody>

</table>




<script>
// $("#action-container").hide();
$(document).ready(function() {


  $(".title-link").on('click', function() {

    $("#action-container").show();
    var id = $(this).attr("rel");
    $.post('process.php', {
      id: id
    }, function(data) {

      $("#action-container").html(data);

    });

  });
});
</script>
