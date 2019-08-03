<?php
  if(isset($_POST['submit'])) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword="";
    $dbname = "reporting";

    //CREATE CONNECTION
    try {
      $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbUsername, $dbPassword);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
      }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }

      $client_name = $_POST['clientname'];
      $task_date = $_POST['taskdate'];
      $task_hours = $_POST['taskhours'];
      $description = $_POST['description'];

      $pdoQuery = "INSERT INTO `tasklog`(`client_name`, `task_date`, `task_hours`, `description`,`modified`) VALUES (:client_name,:task_date,:task_hours,:description,NOW())";

      $pdoResult = $conn->prepare($pdoQuery);

      $pdoExec = $pdoResult->execute(array(":client_name"=>$client_name,":task_date"=>$task_date, ":task_hours"=>$task_hours, ":description"=>$description));

      $sql = "SELECT NOW()";

      if($pdoExec) {
        header('location:/lp/home.php');
        // echo "<meta http-equiv='refresh' content='0'>" ;
      } else {
        echo "Data not inserted";
      }
    } else {
    echo "All fields are required";
    die();
  }
?>
