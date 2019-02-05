<!DOCTYPE html>
<!-- created by Dimitris-->
<html>

<head>
    <script type="text/javascript" src="1FirstPage.js"></script>
    <link rel="stylesheet"  href="mycss.css" />
</head>
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
<h2> Add Subject: </h2>

<input type="button" name="addSubjectButton" id="addSubjectButton" value="Add Subject" onclick="takeMeToPageTwo()"/>

<br></br>
<table>
    <tr>
        <th> Subject Name</th>
        <th> Subject ID</th>
        <th> Description</th>
        <th> Action</th>
    </tr>
    <?php
    include_once 'connection.php';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `subjects`";

    $result = $conn->query($sql);
    if ($result) {

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
					<td>" . $row['SubjectNameTxt'] . " </td>
					<td>" . $row['SubjectCode'] . " </td>
					<td>" . $row['enterDescriptionArea'] . "</td>
					<td><a href='4FourthPage.php?subject_id=".$row['subject_id'] ."'>Edit</a></td>
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