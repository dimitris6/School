<!DOCTYPE html>
<!-- created by Dimitris-->
<html>

<head>
</head>
<link rel="stylesheet"  href="mycss.css" />

<link rel="stylesheet" type="text/css" href="group11Styles.css"/>
	</head>
	

	<body style="background-image:url('bgimage.png')">
<?php include_once 'menu.php'; ?>
<br></br>
	<div id = "demobox">
<h2> Add a student : </h2>
<?php
include_once 'connection.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




if(isset($_POST))
{
    // insert into database
    if(!empty($_POST)) 
    {
        $sql = "INSERT INTO `students` ( `fname`, `lname`, `email`, `gender`, `birthday`, `course`) 
VALUES ('".$_POST['fname']."', '".$_POST['lname']."','".$_POST['email']."', '".$_POST['gender']."'
, '".$_POST['birthday`']."', '".$_POST['course']."');";

        if ($conn->query($sql) === TRUE) {
            echo "You are added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
 /*The INSERT INTO statement is used to add new data to a database. The INSERT INTO statement adds a new record to a table.
 INSERT INTO can contain values for some or all of its columns. INSERT INTO can be combined with a SELECT to insert records.*/


?>

<form action="#" method="post">
    First name: <input type="text" name="fname" value="">
    <br></br>
    Last name: <input type="text" name="lname" value="">
    <br></br>
    E-mail: <input type="email" name="email" value="">
    <br></br>
    Gender: <select name="gender" id="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    <br></br>
    Date of Birth: <input type="date" name="birthday`" value="">
    <br></br>

    Subjects: <select name="course" id="subjects">
       <?php
       $sql = "SELECT * FROM `subjects`";

       $result1 = $conn->query($sql);

       if ($result1) {

           while ($row = $result1->fetch_assoc()) {
               echo "<option value='".$row['SubjectNameTxt']."'>".$row['SubjectNameTxt']."</option>";
           }
       }
       ?>
    </select>
    <br></br>


    <input type="submit" value="Submit" right;>
</form>


<?php
$conn->close();
?>
</div>
</body>
</html>				