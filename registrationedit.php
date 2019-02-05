<DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<title>Registration Update</title>
		<link rel="stylesheet" type="text/css" href="group11Styles.css"/>
</head>
	<body style="background-image:url('bgimage.png')">
	
		
	</div>
	
	<br><br>
<body>
<?php include_once 'menu.php'; ?> 

	<div id = "demobox">
	
	<h2> Update Results: </h2>
		<?php
			//check if a round trip and do the insert:
			//echo "we are trying <br>";
			if(isset($_POST["updateRegister"])){
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
				
				$updateQuery = "UPDATE students SET fname='$fname', lname='$lname', email='$email', gender='$gender', birthday='$birthday', course='$course' WHERE email='$email';";
				//students(fname, lname, email, gender, birthday, course) VALUES ('$fname', '$lname', '$email', '$gender', '$birthday', '$course');";
				
				//step 3: connection object
				$connection = new mysqli($servername, $username, $password, $database);
				
				//try to see if you are connected to the db
				if ($connection -> errno) {
					echo "Connection failed: Error Details: ". $connection->errno ."<br>";
					die ($connection->error);	
					
				}//connect check
				//try to Update data, now that you know connection succeeded:
				
				try{
					//run the Update query:
					if ($result = $connection-> query($updateQuery)){
						//query succeeded:
						echo "Your data has been successfully updated.";
					}else {
						throw  new Exception ("Update Failed" . $connection->error);
					}//end if/else for Update Query
					
				}catch (Exception $e){
					
					echo ("Error: " . $e->getMessage());
				}
					
				$connection ->close();
			}//end try/catch for update
			
			if(isset($_POST["deleteRegister"])){
				//round trip:
				//we are not doing any validations for the sake of time.
				//credentials for db:
				$servername = "localhost";
				$username = 'root';
				$password = '';
				$database = 'mystudents';
				

				
				//that was step 1 : now step 2
				//declaring variables for values, and creating sql query:
				$email =$_POST["email"];
				
				$deleteQuery = "DELETE FROM students WHERE email='$email';";
			
				
				//step 3: connection object
				$connection = new mysqli($servername, $username, $password, $database);
				
				//try to see if you are connected to the db
				if ($connection -> errno) {
					echo "Connection failed: Error Details: ". $connection->errno ."<br>";
					die ($connection->error);	
					
				}//connect check
				//try to delete data, now that you know connection succeeded:
				
				try{
					//run the delete query:
					if ($result = $connection-> query($deleteQuery)){
						//query succeeded:
						echo "Your data has been successfully deleted.";
					}else {
						throw  new Exception ("Delete Failed" . $connection->error);
					}//end if/else for Delete Query
					
				}catch (Exception $e){
					
					echo ("Error: " . $e->getMessage());
				}
					
				$connection ->close();
			}//end try/catch for delete

		?></p>
	</div>
</body>


<html>
