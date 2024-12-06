<?php
include('../../connection/dbase.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['Student_id'];
    $fullname = $_POST['Fullname'];
    $usertype = $_POST['Usertype'];

    $sql = "UPDATE tblaccount SET Fullname = ?, Usertype = ? WHERE Student_id = ?";
    $stmt = $CON->prepare($sql);
    $stmt->bind_param("sss", $fullname, $usertype, $student_id);

    if ($stmt->execute()) {
        header("Location: Registered_Record.php?success=record_updated");
    } else {
        header("Location: Registered_Record.php?error=update_failed");
    }
    $stmt->close();
    $CON->close();
}
?>