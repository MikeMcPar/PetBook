<?php //fetchrow.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  $query  = "SELECT * FROM pets";
  $result = $conn->query($query);
  if (!$result) die($conn->error);

  $rows = $result->num_rows;

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    echo 'Breed: '   . $row['breed']   . '<br>';
    echo 'Name: '    . $row['name']    . '<br>';
    echo 'Age: ' . $row['age'] . '<br>';
    echo 'Sex: '     . $row['sex']     . '<br>';
    echo 'About: '     . $row['about']     . '<br><br>';
  }

  $result->close();
  $conn->close();
?>
