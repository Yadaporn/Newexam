<?php
    include 'config/db.php';

    $title_prefix = $_POST['title_prefix'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthdate = $_POST['birthdate'];

    $profile_image = '';
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === 0) {
        $target_dir = "profile_img/";
        $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            $profile_image = $_FILES["profile_image"]["name"];
        } else {
            echo "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ";
            exit();
        }
    }

    $sql = "INSERT INTO users (title_prefix, first_name, last_name, birthdate, profile_image) VALUES ('$title_prefix', '$first_name', '$last_name', '$birthdate', '$profile_image')";

    if ($conn->query($sql) === TRUE) {
        echo "บันทึกข้อมูลสำเร็จ";
        header("location: index.php");
    } else {
        echo "เกิดข้อผิดพลาดในการส่งฟอร์ม: " . $conn->error;
    }

    $conn->close();
?>