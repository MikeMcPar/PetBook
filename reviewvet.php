<?php // sqltest.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['delete']) && isset($_POST['vet_review_id']))
  {
    $vet_review_id   = get_post($conn, 'vet_review_id');
    $query  = "DELETE FROM vet_review WHERE vet_review_id='$vet_review_id'";
    $result = $conn->query($query);
  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  if (isset($_POST['vet_review_id'])   &&
      isset($_POST['vet_id'])    &&
      isset($_POST['vet_review']))
  {
    $vet_review_id   = get_post($conn, 'vet_review_id');
    $vet_id    = get_post($conn, 'vet_id');
    $vet_review = get_post($conn, 'vet_review');
   
    
    $query    = "INSERT INTO vet_review VALUES" .
      "('NULL', '$vet_id', '$vet_review')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  echo <<<_END
  <form action="vetreview.php" method="post"><pre>
  <input type="hidden" name='vet_review_id'>
     Vet Name <input type="text" name="vet_id">
  Review <input type="textarea" name="vet_review" style="width:400px; height:100px;">

     
           <input type="submit" value="ADD RECORD">
  </pre></form>
_END;

  $query  = "SELECT * FROM vet_review";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

//This displays the button under each entry to delete
    
  
   echo <<<_END
  <pre>
    
    Vet ID: $row[1]
    Review: $row[2]
      
  </pre>
  
_END;
    }

  $query  = "SELECT * FROM vet_review";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
 
  <form action="vetreview.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="vet_review_id" value="$row[0]">
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
