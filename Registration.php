<html>
<head>
<title>Registration Form </title>
</head>  
<body>
	<h1 align="center">Registration Form</h1>
	<form name="registration" method="post" action="#" enctype="multipart/form-data">
		<table border="1" cellpadding="8" cellspacing="3" width="500" align="center">
			<tr>
				<td><label>First Name:<span>*</span></label></td>
				<td><input type="text" id="firstName" name="firstName" value='<?php echo $_POST['firstName'];?>' size="50" /></td>
			</tr>
			<tr>
				<td><label>Last Name:<span>*</span></label></td>
				<td><input type="text" id="lastName" name="lastName" value='<?php echo $_POST['lastName'];?>' size="50" /></td>
			</tr>
			<tr>
				<td><label>Email:<span>*</span></label></td>
				<td><input type="text" id="email" name="email"  value='<?php echo $_POST['email'];?>' size="50" /></td>
			</tr>
			<tr>
				<td><label>Password:<span>*</span></label></td>
				<td><input type="password" id="passid" name="passid" value='<?php echo $_POST['passid'];?>'size="12" /></td>
			</tr>
			<tr>
				<td><label>Country:<span>*</span></label></td>
				<td><select id="country" name="country">
					<option selected="" value="0"><?php echo $_POST['country'];?></option>
					<option value="1">Australia</option>
					<option value="2">Canada</option>
					<option value="3">India</option>
					<option value="4">Russia</option>
					<option value="5">USA</option>
					</select></td>
			</tr>
			<tr>
				<td> <label>Zip Code:<span>*</span></label></td>
				<td><input type ="text" id="zipCode" name="zipCode" value='<?php echo $_POST['zipCode'];?>'size="50"/><input type="hidden" name="hidden" value="1"></td>
			</tr>
			<tr>
				<td><label>Gender:<span>*</span></label></td>

				<td><input type="radio" id="male" name="gender" value="Male" <?php if (($_POST['gender']) == 'Male') {echo 'checked="checked"';} ?>/>Male
			    <input type="radio" id="female" name="gender" value="Female" <?php if (($_POST['gender']) == 'Female') {echo 'checked="checked"';} ?>/>Female</td>
					  
			</tr>
			<tr>
				<td><label>Profile photo:<span>*</span></label></td>
				<td><input type="file" name="file" id="file"></td>
			</tr>
			<tr>
				<td align="center"><input type="submit" name="submit" value="Submit" /></td>
			</tr>
		</table>
	</form>
 


 <?php
session_start();
$firstName=$lastName=$email=$passid =$gender=$country_val=$zipCode="";

$hidden =$_POST['hidden'];
if(empty($_POST['firstName'])) {
	 $nameErr = "missing first name" .  "<br>";
	 echo "$nameErr";
	 $flag=1;
} else {
 	       $firstName = test_input($_POST['firstName']);
 	       $flag=0;
  }

if(empty($_POST['lastName'])) {
	echo $nameErr = "missing last name" .  "<br>";
	$flag=1;
} else {
 	      $lastName = test_input($_POST['lastName']);
  }

if(empty($_POST['email'])) {
	echo $emailErr= "missing email" .  "<br>";
	 $flag=1;
} else {
 	      $email = test_input($_POST['email']);
  }

if(empty($_POST['passid'])) {
	echo $passidErr= "missing password" .  "<br>";
	$flag=1;
} else {
 	      $passid = test_input($_POST['passid']);
  }

if(!isset($_POST['gender'])) {
 	 echo $genderErr = "Must select one gender.." .  "<br>";
 	  $flag=1;
} else {
  	   $gender = test_input($_POST['gender']);
  	   $data[]= $gender;
  }
if ($hidden == "1" || $hidden==1) {
  if(($_POST['country']==0)) {
   echo $countryErr = "Must select one country.." .  "<br>";
     $flag=1;
  } else {
       $country = array('--Select country--', 'Australia','Canada','India','Russia','USA');
       $country_val= test_input($country[$_POST['country']]);
       $data[]= $country_val;
    }
  
}

  
if(empty($_POST['zipCode'])) {
  	echo $zipErr = "Enter Zip Code" .  "<br>";
  	$flag=1;
} else {
  	 $zipCode= test_input($_POST['zipCode']);

  }

if(!eregi("^[A-Za-z]+$",$_POST['firstName'])) {
        echo "<br>"  .$errors[] = 'invalid  first name' . "<br>";
         $flag=1;
} else $data[] = $_POST['firstName'];
 
if(!eregi("^[A-Za-z]+$",$_POST['lastName'])) {
      echo "<br>"  .$errors[] = 'invalid  last name' . "<br>";
      $flag=1;
} else $data[] = $_POST['lastName'];     


if(!eregi('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$',$_POST['email'])) {
      echo "<br>"  .$errors[] = ' invalid email address' . "<br>";
      $flag=1;
} else $data[]=$_POST['email'];

if (!preg_match("/(?=.{10,})(?=.*[A-Z])(?=.*[a-z])(?=.*\d.)(?=.*[,\;\?\!\@])/", $passid)){
  	    echo "invalid Password... Password must contain one capital letter , one small letter , one number and one special charecter" . "<br>";
  	    $flag=1;
}

if (!eregi("^[0-9]+$",$_POST['zipCode'])) {
     echo "Invalid Zip Code" . "<br>";
     $flag=1;
   }   
 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($hidden =="1" || $hidden==1) {
  if ($_FILES["file"]["error"] > 0) {
     echo "Error : " . $_FILE["file"]["error"] . "<br>";
   } else {
       $allowedExts = array("gif", "jpeg", "jpg", "png");
       $temp = explode("/", $_FILES["file"]["name"]);
     
      if (($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png") || (in_array($temp, $allowedExts))&& ($_FILE["file"]["size"]<=2048)){
                      
      } else {
            $flag=1;
            echo "Please Insert Profile Picture which is upto 2MB and only image Format..!!!" . "<br>";
        }
    } 
}
if ($flag==0) {
	
  $flag=1;
$_SESSION['fn']=$firstName;
       $_SESSION['ln']=$lastName;
       $_SESSION['em']=$email;
       $_SESSION['zp']=$zipCode;
       $_SESSION['country']=$country_val;
       $_SESSION['passid']=$passid;
       $_SESSION['file']=$file;
       $_SESSION['gender']=$gender;
     echo '<a href="ValidateForm.php">Registration</a>';      
}
?>


</body>
</html>