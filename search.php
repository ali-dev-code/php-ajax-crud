<?php

require_once 'db.php';


  $search =   $_POST['search'];// kewyword frist search

  if (!empty($search)) {

    $sql = "SELECT * FROM cars WHERE cars LIKE  '$search%' ";

    $search_sql = mysqli_query($connection, $sql);

    if (!$search_sql) {
     die("QUERY FAILED ".mysqli_error($connection));
    }

    if (mysqli_num_rows($search_sql) > 0) {
        ?>

  <div class="card">
    <div class="card-header bg-success text-light">
     Stock
    </div><!-- /.card-header -->
    <div class="card-body">
     <ul class="list-group">
       <?php
        while ($row = mysqli_fetch_array($search_sql)) {
            $brand = $row['cars']; ?>
       <li class="list-group-item"><?php echo $brand; ?></li>
    <?php
        }
    }else {
      echo '<li class="list-group-item text-danger">nothing found!</li>';
    }?>
     </ul>
    </div><!-- /.card-body -->
  </div><!-- /.card -->
    <ul>


    </ul>
 <?php


  }
