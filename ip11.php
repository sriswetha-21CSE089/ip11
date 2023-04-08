<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<center>
  
<table border="1">
<h1>FORM VALIDATION</h1>
  <tr><td><label> Enter name:</label><input type="text" name="usr"></td></tr>
  <tr><td><label>Enter Email:</label><input type="text" name="email"></td></tr>
  <tr><td><label>Enter phone number:</label><input type="telephone" name="phno"></td></tr>
</table><br><br>
<input type="submit" value="Register" name="submit-btn">
</center>
</form>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$db="myDB";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


//$sql1="CREATE DATABASE myDB";

//$sql = "create table user(name varchar(10),email varchar(20),phone int(10))";

 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
     $u=$_REQUEST["usr"];
       // echo $u;
        if(empty($u))
        {
            echo "<br>enter your name<br>";
            $flag=false;
        }
        else 
        {
            $pattern="/^[a-zA-Z]+$/";
          
           if(preg_match($pattern, $u)==0)
           {
             echo "<br>enter valid name<br>";
             $flag=false;
           }
           else{
             $flag=true;
           }

            
        }
      
        $mail=$_REQUEST["email"];
        //echo $mail;
        if(empty($mail))
        {
             echo ("<br>enter your gmail<br>");
             $flag1=false;
        }
        else
        {
             $pattern1="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
          
           if(preg_match($pattern1, $mail)==0)
           {
              echo "<br>enter valid mail<br>";
              $flag1=false;
           }
            else{
             $flag1=true;
           }
        }
        $p=$_REQUEST["phno"];
        //echo $p;
        if(empty($p))
        {
            echo ("<br>enter phoneno<br>");
            $flag2=false;
        }
        else {
     
            $pattern2="/^[0-9]+$/";
          
           if(preg_match($pattern2, $p)==0)
           {
              echo "<br>invalid phone no<br>";
              $flag2=false;
           }
            else{
             $flag2=true;
           }
            
        }
      
      if($flag==true&&$flag1==true&&$flag2==true)
       {
          $i="insert into user values('$u','$mail','$p')";
          if ($conn->query($i) === TRUE)
          {
            echo "<br>inserted successfully";
          }
	  else
	  {
           echo "Error creating table: " . $conn->error;
          }
          
        }
  }
?>