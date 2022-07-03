<?php 

    // connecting to db
  $conn = mysqli_connect('localhost', 'azrini', 'test1234','hotgirlpizza');

  // check if it's connected
  if(!$conn){
    echo 'Connection error' . mysqli_connect_error();
  }


?>