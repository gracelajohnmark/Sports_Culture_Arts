<?php
include('../../connection/dbase.php');

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];
    $sql = "SELECT * FROM tblaccount WHERE Student_id = ?";
    $stmt = $CON->prepare($sql);
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>

<body>
    <form action="process_edit.php" method="POST">
        <input type="hidden" name="student_id" value="<?= $user['Student_id'] ?>">
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname" value="<?= $user['Fullname'] ?>" required>
        <label for="usertype">User Type:</label>
        <select name="usertype">
            <option value="student" <?= $user['Usertype'] == 'student' ? 'selected' : '' ?>>Student</option>
            <option value="admin" <?= $user['Usertype'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>
        <button type="submit">Update</button>
    </form>
</body>

</html>