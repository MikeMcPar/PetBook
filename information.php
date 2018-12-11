<?php
require_once 'login.php';
$connection = new mysqli($hn, $un, $pw, $db);
if ($connection->connect_error) die($conn->connect_error);

require_once 'sessiontest.php';

    if (!$_SESSION["user_data"]) {
        
header("Location: index.php");

       }
      
    $user=$_SESSION["user_data"];
    

if(isset($_POST['firstname']))
{
    
    
    $username1 = $_POST['username'];
    $password1= $_POST['password'];
    $firstname1 = $_POST['firstname'];
    $lastname1 = $_POST['lastname'];
    $address1 = $_POST['address'];
    $phonenumber1 = $_POST['phonenumber'];
    $bio1 = $_POST['bio'];
    $query5 = "INSERT INTO $user ('firstname', 'lastname', 'address', 'phonenumber', 'bio') VALUES ('$firstname1', '$lastname1', '$address1', '$phonenumber1', '$bio1');";
    $query6= "UPDATE $user SET lastname='$lastname1' WHERE username='$username1';";
    $result = $connection->query($query6);

}









                        //put searcher database table   
    $query  = "SELECT * FROM user_s WHERE username='$user'";
                            //put petsitter database table
    $query1  = "SELECT * FROM user_ps WHERE username='$user'";
                            //put shelter database table
    $query2  = "SELECT * FROM user_sh WHERE username='$user'";
                            //put vet database table
    $query3  = "SELECT * FROM user_v WHERE username='$user'";
    
    //start
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    elseif ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_NUM);

		$result->close();

       /* $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pw_temp$salt2");
        */
        
        //make sure rows and information line up with your database
        $username=$row[0];
        $firstname=$row[2];
            $lastname=$row[3];
            $address=$row[4];
            $phonenumber=$row[5];
            $bio=$row[6];
            //enter the database name
            $user="user_s";
            echo <<<_END

</pre></form>
<form action="information.php" method="post"><pre>
<input type="text" name="username" value="$username" readonly><br>
<input type="text" name="firstname" value="$firstname"><br>
<input type="text" name="lastname" value="$lastname"><br>
<input type="text" name="address" value= "$address"><br>
<input type="text" name="phonenumber" value="$phonenumber"><br>
<input type="textbox" name="bio" value="$bio"><br>
<input type="submit" value="Change!">
</pre></form>

_END;

  
                
                }
        
        //
    //
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
        
        //make sure rows and information line up with your database
        $username=$row[0];
        $firstname=$row[2];
            $lastname=$row[3];
            $address=$row[4];
            $phonenumber=$row[5];
            $bio=$row[6];
            
            //enter the database name
           // $user="user_ps";
            echo <<<_END

</pre></form>
<form action="information.php" method="post"><pre>
<input type="text" name="username" value="$username" readonly><br>
<input type="text" name="firstname" value="$firstname"><br>
<input type="text" name="lastname" value="$lastname"><br>
<input type="text" name="address" value= "$address"><br>
<input type="text" name="phonenumber" value="$phonenumber"><br>
<input type="textbox" name="bio" value="$bio"><br>
<input type="submit" value="Change!">
</pre></form>

_END;

  
                
                }
        
    
    //
    //
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
        
        //make sure rows and information line up with your database
        
        $firstname=$row[2];
            $lastname=$row[3];
            $address=$row[4];
            $phonenumber=$row[5];
            $bio=$row[6];
            
            //enter the database name
            //$user="user_sh";
            echo <<<_END

<pre><form>
<form action="information.php" method="post"><pre>
<input type="text" name="username" value="$username" readonly><br>
<input type="text" name="firstname" value="$firstname"><br>
<input type="text" name="lastname" value="$lastname"><br>
<input type="text" name="address" value= "$address"><br>
<input type="text" name="phonenumber" value="$phonenumber"><br>
<input type="textbox" name="bio" value="$bio"><br>
<input type="submit" value="Change!">
</pre></form>

_END;

  
                
                }
        
    
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
        
        //make sure rows and information line up with your database
        
        $firstname=$row[2];
            $lastname=$row[3];
            $address=$row[4];
            $phonenumber=$row[5];
            $bio=$row[6];
            
            //enter the database name
            //$user="user_v";
            echo <<<_END

<pre><form>
<form action="information.php" method="post"><pre>
<input type="text" name="username" value="$username" readonly><br>
<input type="text" name="firstname" value="$firstname"><br>
<input type="text" name="lastname" value="$lastname"><br>
<input type="text" name="address" value= "$address"><br>
<input type="text" name="phonenumber" value="$phonenumber"><br>
<input type="textbox" name="bio" value="$bio"><br>
<input type="submit" value="Change!">
</pre></form>

_END;

  
                
                }
        
    

  
                
                }
        
    
    
    
    
    
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

function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }



/*
echo <<<_END

<pre><form>
<form action="information.php" method="post"><pre>
<input type="text" name="username" value="$username" readonly><br>
<input type="text" name="firstname" value="$firstname"><br>
<input type="text" name="lastname" value="$lastname"><br>
<input type="text" name="address" value= "$address"><br>
<input type="text" name="phonenumber" value="$phonenumber"><br>
<input type="textbox" name="bio" value="$bio"><br>
<input type="submit" value="Change!">
</pre></form>

_END;

*/



















?>