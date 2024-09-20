<?php
    include 'config/db.php';

    $id = $_POST['id'];
    $title_prefix = $_POST['title_prefix'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthdate = $_POST['birthdate'];

    $profile_image = '';
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            $profile_image = $_FILES["profile_image"]["name"];
        }
    }

    $sql = "UPDATE users SET 
            title_prefix = '$title_prefix',
            first_name = '$first_name',
            last_name = '$last_name',
            birthdate = '$birthdate',
            updated_at = NOW()";

    if ($profile_image) {
        $sql .= ", profile_image = '$profile_image'";
    }

    $sql .= " WHERE id = $id";

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
