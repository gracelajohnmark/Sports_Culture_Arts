<?php
include('../../connection/dbase.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $address = $_POST['address'];
    $fullname = $_POST['fullname'];
    $pass = $_POST['pass'];
    $email_address = $_POST['email_address'];
    $mobile_number = $_POST['mobile_number'];
    $usertype = $_POST['usertype'];

    try {

        $sql = "INSERT INTO tblaccount (Student_id, Lastname, Firstname, Address, Fullname, Pass, Email_Address, Mobile_Number, Usertype)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $CON->prepare($sql);
        $stmt->bind_param(
            "sssssssss",
            $student_id,
            $lastname,
            $firstname,
            $address,
            $fullname,
            $pass,
            $email_address,
            $mobile_number,
            $usertype
        );

        if ($stmt->execute()) {
            header("Location: Create_Account.php?success=record_added");
            exit();
        }
        $stmt->close();
    } catch (mysqli_sql_exception $e) {
        // Custom error message for duplicate entry
        if ($e->getCode() == 1062) { // MySQL error code for duplicate entry
            header("Location: Create_Account.php?error=duplicate_id");
        } else {
            header("Location: Create_Account.php?error=general_error");
        }
        exit();
    }
}
$CON->close();
?>