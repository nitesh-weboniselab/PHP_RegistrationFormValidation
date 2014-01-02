<?php

   session_start();
   $firstName=$_SESSION['fn'];
       $lastName=$_SESSION['ln'];
       $email=$_SESSION['em'];
       $zipCode=$_SESSION['zp'];
       $country_val=$_SESSION['country'];
       $passid= $_SESSION['passid'];
       $file = $_SESSION['file'];
       $gender=$_SESSION['gender'];

   echo '<form name="edit" method="post" action="Registration.php" >' ; 
   echo "First Name : " ; 
   print  '<input type="text" name="firstName" value= ' . $firstName . ">";
   echo  "<br>" . "LAST NAME : ";
   print  '<input type="text" name="lastName" value= ' . $lastName .">";
   echo  "<br>" . "Email : ";
   print '<input type="text" name="email" value= ' . $email .">";
   echo "<br>" ."Zip Code : ";
   print '<input type="text" name="zipCode" value= ' . $zipCode .">";
   echo "<br>" ."country : ";
   print '<input type="text" name="country" value= ' . $country_val .">";
   echo "<br>" ."Password : ";
   print '<input type="text" name="passid" value= ' . $passid .">";
   echo "<br>" ."Gender : ";
   print '<input type="text" name="gender" value= ' . $gender .">";
   echo "<br>" ."Profile picture accepted" ."<br>";
   echo "<br>" .'<input type="submit" name="EDIT" value="EDIT">';
   echo "</form>";
?>   