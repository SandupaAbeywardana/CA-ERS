<?php include_once 'config.php'; ?>

<?php
/*
function extendedAddslash(array $params): array{
    foreach ($params as &$var) {
        is_array($var) ? ExtendedAddslash($var) : $var = addslashes($var);
        unset($var);
    }
    return $params;
}
*/

//$submissionData = @$_POST;

/*if (! isset($submissionData["submission_id"])) {
    die("Invalid submission data! 'submission_id' not exists.");
}*/

//$submissionData = extendedAddslash(extendedAddslash);


//print_r($submissionData);


$submission_id = @$_POST["submission_id"];
$formID = @$_POST["formID"];
$student_Id = @$_POST["student_Id"];
$email = @$_POST["email"];
$name = @$_POST["name"][0]." ".$_POST["name"][1];
$phone = @$_POST["phone"][0]." ".@$_POST["phone"][1];
$medium = @$_POST["medium"];
$centre = @$_POST["centre"];
$module = @$_POST["module"][0]." ".@$_POST["module"][1]." ".@$_POST["module"][2]." ".@$_POST["module"][3];


$query = "SELECT * FROM formData WHERE submission_id = '" . @$_POST["submission_id"] . "'";
$sqlsearch = mysqli_query($conn, $query);
$resultcount  = $sqlsearch->num_rows;


if ($resultcount > 0) {
    mysqli_query($conn, "UPDATE `formData` SET `student_Id`='".$student_Id."',`email`='".$email."',`name`='".$name."',`phone`='".$phone."',`medium`='".$medium."',`centre`='".$centre."',`module`='".$module."' WHERE submission_id='" . @$_POST["submission_id"] . "'");
    
    echo "<script>alert ('Details Appended Successfully!')</script>";
    echo('<script>window.location.replace("../index.html");</script>');
}

else {
    mysqli_query($conn, "INSERT INTO formData(submission_id, formID, student_Id, email, name, phone, medium, centre, module) VALUES('$submission_id','$formID','$student_Id','$email','$name','$phone','$medium','$centre','$module')");
    
    echo "<script>alert ('Registration Successful! Please check your inbox for confirmation email.')</script>";
    echo('<script>window.location.replace("../index.html");</script>');
}

?>