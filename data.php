<!DOCTYPE html>
<html>
<head>
    <title>SWOT Analysis</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
            background-color: #f3feff;
            margin: 20px;
            padding: 20px;
            text-align: center;
        }
        h2 {
            color: #333333;
            text-align: center;
        }
        form {
            width: 50%;
            margin: 0 auto 20px auto;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #333333;
        }
        input[type="text"], input[type="submit"], textarea {
            padding: 8px;
            margin-top: 4px;
            margin-bottom: 10px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
            text-align: left;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #449d48;
        }
        input[type="delete"], input[type="submit"], textarea {
            padding: 8px;
            margin-top: 4px;
            margin-bottom: 10px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }
        input[type="delete"] {
            background-color: #e60000;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="delete"]:hover {
            background-color: #b30000;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333333;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
include 'db.php';

// Add new area analysis
if(isset($_POST['add_area'])) {
    $area_name = $_POST['area_name'];
    $creator_name = $_POST['creator_name'];
    $target_area_analysis = $_POST['target_area_analysis'];
    $strengths = $_POST['strengths'];
    $weaknesses = $_POST['weaknesses'];
    $opportunities = $_POST['opportunities'];
    $threats = $_POST['threats'];
    
    $resources = "สถานที่ท่องเที่ยวหรือสถานที่สำคัญในพื้นที่: " . $_POST['tourism_in_area'] . "\n" .
                 "พืชเศรษฐกิจในพื้นที่: " . $_POST['economy_in_area'] . "\n" .
                 "สิ่งที่มีมากในพื้นที่: " . $_POST['abundant_in_area'] . "\n" .
                 "กลุ่มชุมชน/วิสาหกิจชุมชน: " . $_POST['community_groups'] . "\n";

    $reporter_name = $_POST['reporter_name'];
    $report_date = date('Y-m-d');

    // Insert data into areas table
    $sql_area = "INSERT INTO areas (area_name, creator_name, target_area_analysis, strengths, weaknesses, opportunities, threats, report_date) 
                 VALUES ('$area_name', '$creator_name', '$target_area_analysis', '$strengths', '$weaknesses', '$opportunities', '$threats', '$report_date')";

    if ($conn->query($sql_area) === TRUE) {
        $area_id = $conn->insert_id; // Get the last inserted ID

        // Insert data into data table
        $sql_data = "INSERT INTO data (area_id, reporter_name) VALUES ('$area_id', '$reporter_name')";
        $conn->query($sql_data);

        // Insert data into data1 table
        $sql_data1 = "INSERT INTO data1 (area_id, resources) VALUES ('$area_id', '$resources')";
        $conn->query($sql_data1);

        echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    } else {
        echo "<script>alert('Error: " . $sql_area . "<br>" . $conn->error . "');</script>";
    }
}

// Delete area analysis
if(isset($_POST['delete_area'])) {
    $area_id = $_POST['area_id'];

    // Delete from areas table
    $sql_delete_area = "DELETE FROM areas WHERE area_id=$area_id";
    // Delete from data table
    $sql_delete_data = "DELETE FROM data WHERE area_id=$area_id";
    $conn->query($sql_delete_data);

    // Delete from data1 table
    $sql_delete_data1 = "DELETE FROM data1 WHERE area_id=$area_id";
    $conn->query($sql_delete_data1);
    
    if ($conn->query($sql_delete_area) === TRUE) {

        echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว');</script>";
    } else {
        echo "<script>alert('Error: " . $sql_delete_area . "<br>" . $conn->error . "');</script>";
    }
}
?>

<h2>SWOT Analysis</h2>
<h2>ผู้สร้างเว็บ พีระเดช โพธิ์หล้า</h2>
<h2>ชื่อนักศึกษา พีระเดช โพธิ์หล้า 643450082-4</h2>
<form method="POST">
    <label for="creator_name">ผู้สร้าง:</label>
    <input type="text" id="creator_name" name="creator_name" required><br>
    <label for="area_name">ชื่อพื้นที่:</label>
    <input type="text" id="area_name" name="area_name" required><br>
    <label for="target_area_analysis">การวิเคราะห์พื้นที่เป้าหมาย:</label><br>
    <textarea id="target_area_analysis" name="target_area_analysis" rows="4" required></textarea><br>
    <label for="strengths">จุดแข็งของพื้นที่:</label><br>
    <textarea id="strengths" name="strengths" rows="4" required></textarea><br>
    <label for="weaknesses">จุดอ่อนของพื้นที่:</label><br>
    <textarea id="weaknesses" name="weaknesses" rows="4" required></textarea><br>
    <label for="opportunities">โอกาสและความท้าทายในพื้นที่:</label><br>
    <textarea id="opportunities" name="opportunities" rows="4" required></textarea><br>
    <label for="threats">อุปสรรคและปัจจัยคุกคามในพื้นที่:</label><br>
    <textarea id="threats" name="threats" rows="4" required></textarea><br>
    <label for="tourism_in_area">ทรัพยากรท้องถิ่นที่สำคัญ</label><br>
    <label for="tourism_in_area">สถานที่ท่องเที่ยวหรือสถานที่สำคัญในพื้นที่:</label><br>
    <textarea id="tourism_in_area" name="tourism_in_area" rows="4" required></textarea><br>
    <label for="economy_in_area">พืชเศรษฐกิจในพื้นที่:</label><br>
    <textarea id="economy_in_area" name="economy_in_area" rows="4" required></textarea><br>
    <label for="abundant_in_area">สิ่งที่มีมากในพื้นที่:</label><br>
    <textarea id="abundant_in_area" name="abundant_in_area" rows="4" required></textarea><br>
    <label for="community_groups">กลุ่มชุมชน/วิสาหกิจชุมชน:</label><br>
    <textarea id="community_groups" name="community_groups" rows="4" required></textarea><br>
    <label for="reporter_name">ชื่อผู้รายงาน:</label>
    <input type="text" id="reporter_name" name="reporter_name" required><br>
    <input type="submit" name="add_area" value="บันทึกข้อมูล">
</form>

<h2>ลบข้อมูลพื้นที่การวิเคราะห์</h2>
<form method="POST">
    <label for="area_id">รหัสพื้นที่:</label>
    <input type="text" id="area_id" name="area_id" required><br>
    <input type="submit" name="delete_area" value="ลบข้อมูล">
</form>

<h2>รายการประวัติการวิเคราะห์</h2>
<table border="1">
    <tr>
        <th>รหัสพื้นที่ (ID)</th>
        <th>ชื่อพื้นที่</th>
        <th>ผู้สร้าง</th>
        <th>วันที่รายงาน</th>
    </tr>
    <?php
    // เชื่อมต่อฐานข้อมูล
    include 'db.php';

    // สร้างคำสั่ง SQL เพื่อดึงข้อมูล
    $sql = "SELECT area_id, area_name, creator_name, report_date FROM areas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["area_id"] . "</td>";
            echo "<td>" . $row["area_name"] . "</td>";
            echo "<td>" . $row["creator_name"] . "</td>";
            echo "<td>" . $row["report_date"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>ไม่พบข้อมูลพื้นที่การวิเคราะห์</td></tr>";
    }
    $conn->close(); // ปิดการเชื่อมต่อฐานข้อมูล
    ?>
</table>

</body>
</html>
