<DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<title>Registration Lookup</title>
		<link rel="stylesheet" type="text/css" href="group11Styles.css"/>
</head>
	<body style="background-image:url('bgimage.png')">
	<div class="banner">
		
	</div>
	
	<br><br>
<body>
<?php include_once 'menu.php'; ?> 

	<div id = "demobox">
	
	<h2> Lookup Results: </h2>
		<?php
			//check if a round trip and do the insert:
			//echo "we are trying <br>";
			if(isset($_POST["registerLookup"])){
				//round trip:
				//we are not doing any validations for the sake of time.
				//credentials for db:
				$servername = "localhost";
				$username = 'root';
				$password = '';
				$database = 'mystudents';
				
				$email =$_POST["email"];
				
				//that was step 1 : now step 2
				//declaring variables for values, and creating sql query:
				$fname = "";
				$lname = "";							
				$gender = "";
				$birthday = "";
				$course = "";				
				$result = "";
				$tmp = 0;
				
				
				$selectQuery = "SELECT * FROM students WHERE email = '$email';";
				//students(fname, lname, email, gender, birthday, course) VALUES ('$fname', '$lname', '$email', '$gender', '$birthday', '$course');";
				
				//step 3: connection object
				$connection = new mysqli($servername, $username, $password, $database);
				
				//try to see if you are connected to the db
				if ($connection -> errno) {
					echo "Connection failed: Error Details: ". $connection->errno ."<br>";
					die ($connection->error);	
					
				}//connect check
				//try to Select data, now that you know connection succeeded:
				
				try{
					//run the Select query:
					if ($result = $connection-> query($selectQuery)){
						//query succeeded:
						 
						while ($row = $result->fetch_assoc()){	
							echo "Use the fields below to update your data or click the DELETE button to erase your record.";
							$fname = $row["fname"];
							$lname =$row["lname"];							
							$gender =$row["gender"];
							$birthday =$row["birthday"];
							$course =$row["course"];
							$tmp++;
						}
						if ($tmp==0) {
							echo "No records found.  Please check your entry or register again.";
						}
					}else {
						throw  new Exception ("Select Failed" . $connection->error);
					}//end if/else for Select Query
					
				}catch (Exception $e){
					
					echo ("Error: " . $e->getMessage());
				}
					
				$connection ->close();
			}else
			{
				//Fill the values with blank text as to not display errors
				$email = "";
				$fname = "";
				$lname = "";							
				$gender = "";
				$birthday = "";
				$course = "";				
				$result = "";	
	
			}

		?></p>
	<form action="registrationedit.php" method="post">	
		First name: 
		<input type="text" name="fname" value="<?php echo $fname; ?>">
		<br></br>
		Last name:
		<input type="text" name="lname" value="<?php echo $lname; ?>">
		<br></br>
		E-mail:
		<input type="email" name="email" value="<?php echo $email; ?>">
		<br></br>
		Gender: <select name="gender">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option selected><?php echo $gender; ?></option>
				</select>
				<br></br>
		Date of Birth: 
		<input type="date" name="birthday" value="<?php echo $birthday; ?>">
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
		<option selected><?php echo $course; ?></option>
		</select>
		<br></br>
		<input type="submit" value="Update" name="updateRegister"/>
		<input type="submit" value="DELETE" name="deleteRegister" right;/> 		
	</form>	
	</div>
</body>


<html>
