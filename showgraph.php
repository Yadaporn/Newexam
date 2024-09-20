<?php
    include 'config/db.php';
    $sql = "SELECT YEAR(CURDATE()) - YEAR(birthdate) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(birthdate, '%m%d')) AS age, COUNT(*) AS count 
    FROM users 
    GROUP BY age 
    ORDER BY age";
    $result = $conn->query($sql);

    $data = [];
    $labels = [];

    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['age'];
        $data[] = $row['count'];
    }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานจำนวนสมาชิกตามอายุ</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #ageChart {
            width: 10px; 
            height: 10px; 
        }
    </style>
</head>
<body>
<h2>รายงานจำนวนสมาชิกตามอายุ</h2>
<a href="index.php" style=" background-color: #007bff; border-radius: 5px;">กลับไปหน้าหลัก</a>
<canvas id="ageChart"></canvas>
    <script>
        const labels = <?php echo json_encode($labels); ?>;
        const data = <?php echo json_encode($data); ?>;

        const ctx = document.getElementById('ageChart').getContext('2d');
        const ageChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'จำนวนสมาชิก',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>