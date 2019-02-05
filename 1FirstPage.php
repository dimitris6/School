<!DOCTYPE html>
<!-- created by Dimitris Theodorides-->
<html>

<head>
    <script type="text/javascript" src="1FirstPage.js"></script>
    <link rel="stylesheet"  href="mycss.css" />

<style>
    table, th, td {
        border: 1px solid red;
    }
</style>
<link rel="stylesheet" type="text/css" href="group11Styles.css"/>
	</head>
	<body style="background-image:url('bgimage.png')">
	
<?php include_once 'menu.php'; ?>
<br></br>

<div id = "demobox">
<input type="button" id="addStudentButton" name="addStudentButton" value="Add Student"/>
<input type="button"
       name="addSubjectButton"
       id="addSubjectButton"
       value="Add Subject"

       right;/>
<br></br>
<table>
    <tr>
        <th> First Name</th>
        <th> Last Name</th>
        <th> Date of Birth</th>
        <th> E-mail</th>
        <th> Gender</th>
        <th> Subject</th>
    </tr>
    <?php
    include_once 'connection.php';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);  
    // Check connection                                                
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `students`"; //

    $result = $conn->query($sql); //
    if ($result) {

        while ($row = $result->fetch_assoc()) { //
            echo "<tr>
					<td>" . $row['fname'] . " </td>
					<td>" . $row['lname'] . " </td>
					<td>" . $row['birthday'] . "</td>
					<td>" . $row['email'] . "</td>
					<td>" . $row['gender'] . "</td>
					<td>" . $row['course'] . "</td>
					</tr>";
				}


    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $conn->close(); 
    ?>

</table>
</div>
</body>
</html>				