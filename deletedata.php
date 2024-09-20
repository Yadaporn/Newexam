<?php
    include 'config/db.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "ลบข้อมูลสำเร็จแล้ว";
        header("Location: index.php");
    } else {
        echo "เกิดข้อผิดพลาด";
        header("Location: index.php");
    }

    $conn->close();
    exit();
?>