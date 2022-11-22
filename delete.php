<?php
include 'connectdb.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "DELETE FROM users where id='$user_id'";
    $result = $conn->query($sql);

    if ($result) {
        echo 'Deleted successfully';
        header('location: view.php');
    } else {
        echo 'Failed to delete the record: ' .$sql . $conn->error;
    }
}
?>