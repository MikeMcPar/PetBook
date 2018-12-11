<?php // sqltest.php
  require_once 'login.php';
  require_once 'sessiontest.php';

    if (!$_SESSION["user_data"]) {
        
header("Location: index.php");

       }
      
    $user=$_SESSION["user_data"];
    
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['delete']) && isset($_POST['pet_id']))
  {
    $pet_id   = get_post($conn, 'pet_id');
    $query  = "DELETE FROM pets WHERE pet_id='$pet_id'";
    $result = $conn->query($query);
  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }
  if(isset($_POST['field2']))
       {
       $field2=$_POST['field2'];
       }

  if (isset($_POST['pet_id'])   &&
      isset($_POST['breed'])    &&
      isset($_POST['name'])    &&
      isset($_POST['age'])    &&
      isset($_POST['sex'])    &&
      isset($_POST['about'])   &&
      isset($_POST['state'])   &&
      isset($_POST['phone']))
  {
      
    $pet_id   = get_post($conn, 'pet_id');
    $breed    = get_post($conn, 'breed');
    $name = get_post($conn, 'name');
    $age = get_post($conn, 'age');
    $sex = get_post($conn, 'sex');
    $about = get_post($conn, 'about');
    $state = get_post($conn, 'state');
    $phone = get_post($conn, 'phone');
    
    
    $query    = "INSERT INTO $field2 VALUES" .
      "('$pet_id', '$breed', '$name', '$age', '$sex', '$about', '$state', '$user', '$user', '$user', '$user', '$phone')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  echo <<<_END
  <form action="addpet.php" method="post"><pre>
   <select name="field2"> 
   <option value="0">--None--</option>
  "<option value="dogs">Dogs</option>
  <option value="cats">Cats</option>
  <option value="pets">Other</option>
  </select><br>
    Pet_ID <input type="text" name="pet_id">
     Breed <input type="text" name="breed">
  Name <input type="text" name="name">
   Age <input type="text" name="age">
     Sex <input type="text" name="sex">
  About <input type="text" name="about">
  State <input type="text" name="state">
  Phone Number <input type="text" name="phone">
     
           <input type="submit" value="ADD RECORD">
  </pre></form>
_END;

  $query  = "SELECT * FROM pets";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
 
  <form action="addpet.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="pet_id" value="$row[0]">
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
