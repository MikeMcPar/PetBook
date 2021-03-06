<?php // sqltest.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['delete']) && isset($_POST['vet_id']))
  {
    $vet_id   = get_post($conn, 'vet_id');
    $query  = "DELETE FROM vet WHERE vet_id='$vet_id'";
    $result = $conn->query($query);
  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  if (isset($_POST['vet_id'])   &&
      isset($_POST['location'])    &&
      isset($_POST['name'])   &&
      isset($_POST['pet_id'])   &&
      isset($_POST['info'])   &&
      isset($_POST['email'])   &&
      isset($_POST['phone'])   &&
      isset($_POST['password']))
  {
    $vet_id   = get_post($conn, 'vet_id');
    $location    = get_post($conn, 'location');
    $name = get_post($conn, 'name');
    $pet_id = get_post($conn, 'pet_id');
    $info = get_post($conn, 'info');
    $email = get_post($conn, 'email');
    $phone = get_post($conn, 'phone');
    $password = get_post($conn, 'password');
    
    $query    = "INSERT INTO vet VALUES" .
      "('$vet_id', '$location', '$name', '$pet_id', '$info', '$email', '$phone')";
    
    $result   = $conn->query($query);
    
    $query    = "INSERT INTO passwords VALUES" .
      "('$password', 'NULL', 'NULL', '$vet_id', 'NULL')";
    
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  echo <<<_END
  <form action="vetaccount.php" method="post"><pre>
  Vet_ID: <input type="text" name='vet_id'>
     Location: <input type="text" name="location">
  Name: <input type="text" name="name">
   Pet_ID: (N/A if not known) <input type="text" name="pet_id">
   Basic Bio: <input type="text" name="info">
   Email: <input type="text" name="email">
   Phone: <input type="text" name="phone">
   Password: <input type="password" name="password">
     
           <input type="submit" value="ADD RECORD">
  </pre></form>
_END;

  $query  = "SELECT * FROM vet";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
 
  <form action="vetaccount.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="vet_id" value="$row[0]">
  </form>
_END;
  }
  
  
  $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>
