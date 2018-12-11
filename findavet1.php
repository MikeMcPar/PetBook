
                                    
<?php
                                        require_once 'login.php';
  //require_once 'sessiontest.php';

  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  /*
if (!$_SESSION["user_data"]) {
        
header("Location: homepage.php");
*/
       //}
       if(isset($_POST['Data']))
       {
       $data=$_POST['Data'];
       }
       
        if(isset($_POST['field2']))
       {
       $field2=$_POST['field2'];
       }
       
  if (isset($_POST['field']))
  {
      $field=$_POST['field'];
      
      $TeamName   = get_post($conn, 'field');
      $query  = "SELECT * FROM vet where $field='$data'";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <pre>
      Location $row[1]
      Name $row[2]
      Info $row[4]
      Email $row[5]
      Phone $row[6]
      
  </pre>
 
_END;
      
      }
      }
      

  echo <<<_END
  <form action="searchforvet.php" method="post"><pre>
  Enter data from the drop down menu to search by<br>


  </select>
    <select name="field">                     
  <option value="0">--None--</option>
  "<option value="location">Location</option>
  <option value="name">Name</option>
  </select><br>
  Enter Data <input type="text" name='Data'>
  <input type="submit" value="Search">
  </pre></form>
  <form action="userhomepage.php" method="post"><pre>
  <input type="submit" value="Go Back to Home Page">
  </pre></form>
_END;

echo <<< EOT
       
EOT;


  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>
    