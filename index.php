<?php
    session_start();
    require_once 'config/db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบบันทึกข้อมูลสมาชิก</title>
</head>
<body>
    <h2>ระบบบันทึกข้อมูลสมาชิก</h2>
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo "<p style='color: green;'>บันทึกข้อมูลเรียบร้อยแล้ว!</p>";
        } elseif ($_GET['status'] == 'error') {
            echo "<p style='color: red;'>เกิดข้อผิดพลาดในการบันทึกข้อมูล</p>";
        }
    }
    ?>
    <a href="showgraph.php" style=" background-color: #007bff; border-radius: 5px;">ดูกราฟ</a><br></br>

    <form action="savedata.php" method="POST" enctype="multipart/form-data">
        <label for="title_prefix">คำนำหน้าชื่อ:</label>
        <select id="title_prefix" name="title_prefix">
            <option value="นาย">นาย</option>
            <option value="นาง">นาง</option>
            <option value="นางสาว">นางสาว</option>
        </select><br>
        <label for="first_name">ชื่อ:</label><br>
        <input type="text" id="first_name" name="first_name" required><br><br>
        <label for="last_name">นามสกุล:</label><br>
        <input type="text" id="last_name" name="last_name" required><br><br>
        <label for="birthdate">วันเดือนปีเกิด:</label><br>
        <input type="date" id="birthdate" name="birthdate" required><br><br>
        <label for="profile_image">รูปภาพโปรไฟล์:</label>
        <input type="file" required name="profile_image" id="profile_image" >
        <input type="submit" value="บันทึก" name="savedata">
    </form>
    <?php include('showuser.php'); ?>
</body>
</html>