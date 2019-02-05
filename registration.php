<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="group11Styles.css"/>
</head>
	<body style="background-image:url('bgimage.png')">
	
		
	</div>
	<?php include_once 'menu.php'; ?> 

	<br><br>
<body>

	<div id = "demobox">	
	<h2> Register for more information: </h2>
	<form action="#" method="post">
		First name: 
		<input type="text" name="fname" value="">
		<br></br>
		Last name:
		<input type="text" name="lname" value="">
		<br></br>
		E-mail:
		<input type="email" name="email" value="">
		<br></br>
		Gender: <select name="gender">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				</select>
				<br></br>
		Date of Birth: 
		<input type="date" name="birthday" value="">
		<br></br>
		Course: 
		<select name="course">
		<option value="HTML5">HTML5</option>
		<option value="CSS">CSS</option>
		<option value="JavaScript">JavaScript</option>
		<option value="PHP">PHP</option>
		<option value="ASP.NET">ASP.NET</option>
		<option value="Java" >Java</option>
		<option value="Android">Android</option>
		<option value="C#">C#</option>
		</select>
		<br></br>
		<input type="submit" value="Submit" name="newRegister"/>
	</form>

<p>
		<?php

			//check if a round trip and do the insert:			
			if(isset($_POST["newRegister"])){
				//round trip:
				//we are not doing any validations for the sake of time.
				//credentials for db:
				
				$servername = "localhost";
				$username = 'root';
				$password = '';
				$database = 'mystudents';
				
				//that was step 1 : now step 2
				//declaring variables for values, and creating sql query:
				
				$fname = $_POST["fname"];
				$lname =$_POST["lname"];
				$email =$_POST["email"];
				$gender =$_POST["gender"];
				$birthday =$_POST["birthday"];
				$course =$_POST["course"];
				
				
				$result;
				
				$insertQuery = "INSERT INTO students(fname, lname, email, gender, birthday, course) VALUES ('$fname', '$lname', '$email', '$gender', '$birthday', '$course');";
				
				//step 3: connection object
				$connection = new mysqli($servername, $username, $password, $database);
				
				//try to see if you are connected to the db
				if ($connection ->errno) {
					echo "Connection failed: Error Details: ". $connection->errno ."<br>";
					die ($connection->error);	
					
				}//connect check
				//try to insert data, now that you know connection succeeded:
				
				try{
					//run the insert query:
					if ($connection-> query($insertQuery)){
						//query succeeded:
						echo "Your data has been successfully received";
						
					}else {
						throw  new Exception ("Insert Failed" . $connection->error);
					}//end if/else for insert Query
					
				}catch (Exception $e){
					
					echo ("Error: " . $e->getMessage());
				}
					
				$connection ->close();
			}//end try/catch
			
			
			
			
		?></p>
<br><br>
<h3>Already registered? Enter your email here to view/edit your registration data</h3>
<form action="registrationlookup.php" method="post">
E-mail: <input type="email" name="email" value="">
<input type="submit" name="registerLookup" value="Look Up" right;>
</form>

	</div>
</body>
</html>


