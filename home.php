<?php
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

    $sql = "SELECT id, client_name, task_date, task_hours, description from tasklog";
    $result = $conn->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="master.css">

    <title>Register Form</title>
  </head>
  <body>

  	<div class="jumbotron">
  		Data Entry Aplication
    </div>

    <div id="stripe">
  		<button id="insert">Insert Data</button>
      <button id="list">DataList</button>
    </div>

    <div class="container" id="container">
      <div>
        <form class="auth" action="/lp/insert.php" method="post">

          <label for="fname">Client Name:</label>
          <input type="text" placeholder="name" name="clientname" id="clientname" required>

          <label for="fname">Task Date:</label>
          <input type="date" placeholder="date" name="taskdate" id="taskdate" value="0001-01-01">

          <label for="fname">Task Hours:</label>
          <input type="text" placeholder="hours" name="taskhours" id="taskhours" required>

          <label for="fname">Description</label>
          <input type="text" placeholder="details" name="description" id="description" required>

          <input type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>
    <div class="container" id="datalist_div">
      <table class="table table-bordered table-condensed">
          <thead>
              <tr>
                  <th> ID </th>
                  <th> Client Name </th>
                  <th> Task Date </th>
                  <th> Task Hours </th>
                  <th> Description </th>
              </tr>
          </thead>
          <tbody>
              <?php while ($r = $result->fetch()): ?>
                  <tr>
                      <td><?php echo htmlspecialchars($r['id']) ?></td>
                      <td><?php echo htmlspecialchars($r['client_name']); ?></td>
                      <td><?php echo htmlspecialchars($r['task_date']); ?></td>
                      <td><?php echo htmlspecialchars($r['task_hours']); ?></td>
                      <td><?php echo htmlspecialchars($r['description']); ?></td>
                  </tr>
              <?php endwhile; ?>
          </tbody>
      </table>
    </div>

    <script type="text/javascript" src="home.js" charset="utf-8"></script>
  </body>
</html>
