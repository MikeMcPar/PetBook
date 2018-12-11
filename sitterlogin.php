<?php
//echo "Helloooooooooo";
require_once 'login.php';
$connection = new mysqli($hn, $un, $pw, $db);
  if ($connection->connect_error) die($conn->connect_error);
if (isset($_POST['username']) && isset($_POST['passw']))
{
    $un_temp = mysql_entities_fix_string($connection, $_POST['username']);
    $pw_temp = mysql_entities_fix_string($connection, $_POST['passw']);
                             //put searcher database table   
    $query  = "SELECT * FROM passwords WHERE searcher_id='$un_temp'";
                            //put petsitter database table
    $query1  = "SELECT * FROM passwords WHERE pet_sitter_id='$un_temp'";
                            //put shelter database table
    $query2  = "SELECT * FROM passwords WHERE vet_id='$un_temp'";
                            //put vet database table
    $query3  = "SELECT * FROM passwords WHERE shelter_id='$un_temp'";
    
    //start
    $result = $connection->query($query1);
    if (!$result) die($connection->error);
    elseif ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_NUM);

		$result->close();

       /* $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pw_temp$salt2");
        */
        if ($pw_temp == $row[0])
        { echo "$row[1] $row[0] : 
        	Hi $row[1], you are now logged in as '$row[1]'";
                $user=$row[1];
                session_start();
                $_SESSION["user_data"] = $user;

  
                header("Location: homepage.php");
                }
        
    }
    
  
  //start
  $result = $connection->query($query1);
  if (!$result) die($connection->error);
    elseif ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_NUM);

		$result->close();

       /* $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pw_temp$salt2");
        */
        if ($pw_temp == $row[0])
        { echo "$row[2] $row[0] : 
        	Hi $row[2], you are now logged in as '$row[2]'";
                $user=$row[2];
                session_start();
                $_SESSION["user_data"] = $user;

  
                header("Location: homepage.php");
                }
        
    }
    
  ////
  //start
  $result = $connection->query($query2);
  if (!$result) die($connection->error);
    elseif ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_NUM);

		$result->close();

       /* $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pw_temp$salt2");
        */
        if ($pw_temp == $row[1])
        { echo "$row[0] $row[1] : 
        	Hi $row[0], you are now logged in as '$row[0]'";
                $user=$row[0];
                session_start();
                $_SESSION["user_data"] = $user;

  
                header("Location: homepage.php");
                }
        
    }
    
   
    
  ////
  //start
  $result = $connection->query($query3);
  if (!$result) die($connection->error);
    elseif ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_NUM);

		$result->close();

       /* $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pw_temp$salt2");
        */
        if ($pw_temp == $row[1])
        { echo "$row[0] $row[1] : 
        	Hi $row[0], you are now logged in as '$row[0]'";
                $user=$row[0];
                session_start();
                $_SESSION["user_data"] = $user;

  
                header("Location: homepage.php");
                }
        else die("Invalid username/password combination");
    }
    else die("Invalid username/password combination");
  }
  
  
  /*else
  {
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die ("Please enter your username and password");
  }*/

  $connection->close();

  function mysql_entities_fix_string($connection, $string)
  {
    return htmlentities(mysql_fix_string($connection, $string));
  }	

  function mysql_fix_string($connection, $string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
  }



echo "Login<br>";
echo <<<_END
</pre></form>
<form action="sittlogin.php" method="post"><pre>
<input type="text" name="username"><br>
<input type="password" name="passw"><br>
<input type="submit" value="Login">
</pre></form>

_END;














?>






