<?php
    require_once 'config/db.php';
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    if (isset($_GET['sortold'])) {
        $sql = "SELECT *, YEAR(CURDATE()) - YEAR(birthdate) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(birthdate, '%m%d')) AS age FROM users WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' ORDER BY age DESC";            
    } 
    elseif (isset($_GET['sortyoung'])) {
        $sql = "SELECT *, YEAR(CURDATE()) - YEAR(birthdate) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(birthdate, '%m%d')) AS age FROM users WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' ORDER BY age ASC";            
    }
    elseif (isset($_GET['sort_updated'])) {
        $sql = "SELECT * FROM users WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' ORDER BY updated_at DESC";             
    }
    else {
        $sql = "SELECT * FROM users WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' ORDER BY updated_at ASC";
    }
    $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตารางข้อมูล</title>
</head>
<body>
    <h2>ตารางข้อมูล</h2>
    <form method="GET" action="">
        <label for="search">ค้นหา:</label>
        <input type="text" id="search" name="search" value="<?php echo isset($search) ? $search : ''; ?>">
        <input type="submit" value="ค้นหา">
    </form>
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
                <th>วันเกิด</th>
                <th>รูปโปรไฟล์</th>
                <th>วันที่ปรับปรุงล่าสุด</th>
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
