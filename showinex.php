<?php
    include 'config/db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตารางรายรับรายจ่าย</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<div class="container mt-5">
    <h2>ตารางรายรับรายจ่าย</h2>
   
    <form method="GET" action="">
        <input type="submit" name="sortold" value="เรียงตามอายุมากไปน้อย">
        <input type="submit" name="sortyoung" value="เรียงตามอายุน้อยไปมาก">
        <input type="submit" name="sort_updated" value="เรียงตามเวลาการใส่ข้อมูล">
    </form>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>คำนำหน้า</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>วันเดือนปีเกิด</th>
                <th>รูปโปรไฟล์</th>
                <th>วันเวลาที่ปรับปรุงข้อมูลล่าสุด</th>
                <th>ข้อมูลรายรับรายจ่าย</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php
           

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['title_prefix'] . "</td>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>" . $row['birthdate'] . "</td>";
                    echo "<td><img src='profile_img/" . $row['profile_image'] . "' alt='Profile Image' width='100'></td>";
                    echo "<td>" . $row['updated_at'] . "</td>";
                    echo "<td>";
                    echo "<a href='showinex.php?id=" . $row['id'] . "'>ดูรายละเอียด</a> | ";
                    echo "</td>";
                    echo "<td>";
                    echo "<a href='editdata.php?id=" . $row['id'] . "'>แก้ไข</a> | ";
                    echo "<a href='deletedata.php?id=" . $row['id'] . "' onclick='return confirm(\"คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้?\")'>ลบ</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>ไม่มีข้อมูล</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    $conn->close();
    ?>
</body>
</html>
