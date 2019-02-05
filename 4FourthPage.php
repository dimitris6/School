<!DOCTYPE html>
<!-- created by Dimitris-->
<html>

<head>
    <link rel="stylesheet"  href="mycss.css" />
</head>

<link rel="stylesheet" type="text/css" href="group11Styles.css"/>
	</head>
	<body style="background-image:url('bgimage.png')">
 <!---  Include a php file in another one. if the code from a file has already been included, it will not be included again, and include_once returns TRUE. -->
<?php include_once 'menu.php'; ?>

<br></br>
	<div id = "demobox">
<h2> Add subject form: </h2>

<?php
include_once 'connection.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST)) {
    // insert into database
    if(!empty($_GET['subject_id']) && !empty($_POST))
    {

        $sql = "UPDATE `subjects` 
SET `SubjectNameTxt` = '" . $_POST['SubjectNameTxt'] . "'
, `SubjectCode` = '" . $_POST['SubjectCode'] . "'
, `enterDescriptionArea` = '" . $_POST['enterDescriptionArea'] . "'
WHERE `subjects`.`subject_id` = '" . $_GET['subject_id'] . "';";
        if ($conn->query($sql) === TRUE) {
            echo "Your subject is updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else if (!empty($_POST)) {
        $sql = "INSERT INTO `subjects` (`subject_id`, `SubjectNameTxt`,`SubjectCode`, `enterDescriptionArea`) 
VALUES (NULL, '" . $_POST['SubjectNameTxt'] . "', '" . $_POST['SubjectCode'] . "', '" . $_POST['enterDescriptionArea'] . "');";

        if ($conn->query($sql) === TRUE) {
            echo "Your subject is added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

if(!empty($_GET['subject_id']))
{
    $sql = "SELECT * FROM `subjects` where  `subjects`.`subject_id` = '" . $_GET['subject_id'] . "' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

}


$conn->close();
?>
<form action="#" method="post">
    Subject name: <input type="text" name="SubjectNameTxt" value="<?php echo @$row['SubjectNameTxt']?>">
    <br></br>
    Subject ID: <input type="text" name="SubjectCode" value="<?php echo @$row['SubjectCode']?>">
    <br></br>
    Description: <p><textarea name="enterDescriptionArea" id="enterDescriptionArea" rows="1" cols="20"><?php echo @$row['enterDescriptionArea']?></textarea>
    <p id="descriptionArea"></p> </p>
    <br></br>

    <input type="submit" name="SaveButton" value="Save" right;>
</form>

<p>Click the "Save" button and the form-data will be saved in a database.</p>

</div>
</body>
</html>				