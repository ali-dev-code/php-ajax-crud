<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
<script>

$(document).ready(function () {

$('#search').keyup(function () {

  var $search = $('#search').val();

  $.ajax({

  url: 'search.php',
  data:{search:search},
  type: 'POST',
  success: function (data) {
    if (!data.error) {
      $('#resukt').html(data);
    }
   }


  });


 });


 });

</script>

</body>
</html>
