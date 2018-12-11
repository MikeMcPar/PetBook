<?php // sqltest.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['delete']) && isset($_POST['shelter_review_id']))
  {
    $shelter_review_id   = get_post($conn, 'shelter_review_id');
    $query  = "DELETE FROM shelter_review WHERE shelter_review_id='$shelter_review_id'";
    $result = $conn->query($query);
  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  if (isset($_POST['shelter_review_id'])   &&
      isset($_POST['shelter_id'])    &&
      isset($_POST['shelter_review']))
  {
    $shelter_review_id   = get_post($conn, 'shelter_review_id');
    $shelter_id    = get_post($conn, 'shelter_id');
    $shelter_review = get_post($conn, 'shelter_review');
   
    
    $query    = "INSERT INTO shelter_review VALUES" .
      "('NULL', '$shelter_id', '$shelter_review')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  echo <<<_END
  <form action="shelterreview.php" method="post"><pre>
  <input type="hidden" name='shelter_review_id'>
     Shelter Name <input type="text" name="shelter_id">
  Review <input type="textarea" name="shelter_review" style="width:400px; height:100px;">

     
           <input type="submit" value="ADD RECORD">
  </pre></form>
_END;
 $query  = "SELECT * FROM shelter_review";
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
    
    Pet Shelter ID: $row[1]
    Review: $row[2]
      
  </pre>
  
_END;
    }

  $query  = "SELECT * FROM shelter_review";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
 
  <form action="shelterreview.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="shelter_review_id" value="$row[0]">
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
