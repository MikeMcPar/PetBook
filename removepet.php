<?php
 require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

//This snippet of code is the session control. If a use is not logged in and tries to access this page, they are immediately returned to the home page.
require_once 'sessiontest.php';

    if (!$_SESSION["user_data"]) {
        
header("Location: homepage.php");

       }
      
    $user=$_SESSION["user_data"];
    
 
  if (isset($_POST['delete']) && isset($_POST['name']))
  {
      $table = $_POST['table'];
    $name   = get_post($conn, 'name');
    $query  = "DELETE FROM $table WHERE name='$name'";
    $result = $conn->query($query);
  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  if (isset($_POST['name'])   &&
      isset($_POST['age'])    &&
      isset($_POST['sex']))
  {
    $name   = get_post($conn, 'name');
    $age    = get_post($conn, 'age');
    $sex = get_post($conn, 'sex');

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  echo <<<_END
  
_END;

//This shows every entry of pets with their name, age and sex in the pets table.
 
  $query  = "SELECT * FROM pets WHERE searcher_id='$user' AND shelter_id='$user' AND vet_id='$user' AND pet_sitter_id='$user';";
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
    name $row[2]
    age $row[3]
    sex $row[4]
      
  </pre>
  <form action="removepet1.php" method="post">
  <input type="hidden" name="table" value="pets">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="name" value="$row[2]">
  <input type="submit" value="Delete Pet"></form>
_END;
    }
    
    $query  = "SELECT * FROM dogs WHERE searcher_id='$user' AND shelter_id='$user' AND vet_id='$user' AND pet_sitter_id='$user';";
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
    name $row[2]
    age $row[3]
    sex $row[4]
      
  </pre>
  <form action="removepet1.php" method="post">
  <input type="hidden" name="table" value="dogs">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="name" value="$row[2]">
  <input type="submit" value="Delete Pet"></form>
_END;
    }
    
    $query  = "SELECT * FROM cats WHERE searcher_id='$user' AND shelter_id='$user' AND vet_id='$user' AND pet_sitter_id='$user';";
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
    name $row[2]
    age $row[3]
    sex $row[4]
      
  </pre>
  <form action="removepet1.php" method="post">
  <input type="hidden" name="table" value="cats">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="name" value="$row[2]">
  <input type="submit" value="Delete Pet"></form>
_END;
  }
  
//The Button to return to the main menu
  
  $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
  
?>
