<?php
    include 'config/db.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "ไม่พบข้อมูล";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูล</title>
</head>
<body>
    <h2>แก้ไขข้อมูลรายรับ/รายจ่าย</h2>

    <form action="updatedata.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="title_prefix">คำนำหน้าชื่อ:</label>
        <select id="title_prefix" name="title_prefix">
            <option value="นาย" <?php echo ($row['title_prefix'] == 'นาย') ? 'selected' : ''; ?>>นาย</option>
            <option value="นาง" <?php echo ($row['title_prefix'] == 'นาง') ? 'selected' : ''; ?>>นาง</option>
            <option value="นางสาว" <?php echo ($row['title_prefix'] == 'นางสาว') ? 'selected' : ''; ?>>นางสาว</option>
        </select><br>

        <label for="first_name">ชื่อ:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>" required><br>

        <label for="last_name">นามสกุล:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>" required><br>

        <label for="birthdate">วันเดือนปีเกิด:</label>
        <input type="date" id="birthdate" name="birthdate" value="<?php echo $row['birthdate']; ?>" required><br>

        <label for="profile_image">รูปภาพโปรไฟล์:</label>
        <input type="file" id="profile_image" name="profile_image" accept="image/*"><br>
        <?php if ($row['profile_image']): ?>
            <img src="profile_img/<?php echo $row['profile_image']; ?>" alt="Profile Image" width="100"><br>
        <?php endif; ?>

        <input type="submit" value="อัปเดตข้อมูล">
    </form>
    
</body>
</html>

<?php
$conn->close();
?>
