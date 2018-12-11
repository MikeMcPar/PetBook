<?php // sqltest.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['delete']) && isset($_POST['sitter_review_id']))
  {
    $sitter_review_id   = get_post($conn, 'sitter_review_id');
    $query  = "DELETE FROM pet_sitter_review WHERE sitter_review_id='$sitter_review_id'";
    $result = $conn->query($query);
  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  if (isset($_POST['sitter_review_id'])   &&
      isset($_POST['pet_sitter_id'])    &&
      isset($_POST['sitter_review']))
  {
    $sitter_review_id   = get_post($conn, 'sitter_review_id');
    $pet_sitter_id    = get_post($conn, 'pet_sitter_id');
    $sitter_review = get_post($conn, 'sitter_review');
   
    
    $query    = "INSERT INTO pet_sitter_review VALUES" .
      "('NULL', '$pet_sitter_id', '$sitter_review')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  echo <<<_END
   <form action="sitterreview.php" method="post"><pre>
  <input type="hidden" name='sitter_review_id'>
     Pet Sitter Name <input type="text" name="pet_sitter_id">
  Review <input type="textarea" name="sitter_review" style="width:400px; height:100px;">
     
           <input type="submit" value="ADD RECORD">
  </pre></form>
_END;
 $query  = "SELECT * FROM pet_sitter_review";
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
    
    Pet Sitter ID: $row[1]
    Review: $row[2]
      
  </pre>
  
_END;
    }

  $query  = "SELECT * FROM pet_sitter_review";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
 
  <form action="sitterreview.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="sitter_review_id" value="$row[0]">
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
