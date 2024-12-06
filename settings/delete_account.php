<?php
include('../../connection/dbase.php');

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    $sql = "DELETE FROM tblaccount WHERE Student_id = ?";
    $stmt = $CON->prepare($sql);
    $stmt->bind_param("s", $student_id);

    if ($stmt->execute()) {
        header("Location: Registered_Record.php?success=record_deleted");
    } else {
        header("Location: Registered_Record.php?error=delete_failed");
    }
    $stmt->close();
    $CON->close();
}
?>