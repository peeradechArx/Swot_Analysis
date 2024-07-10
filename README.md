## วิธีการติดตั้งและใช้งาน SWOT Analysis
### 1. เปิดใช้งาน XAMPP และ MySQL

1.1. ดาวน์โหลดและติดตั้ง XAMPP จาก [เว็บไซต์ XAMPP](https://www.apachefriends.org/index.html)

1.2. เริ่มต้น XAMPP และเปิด MySQL Server และ Apache Server

### 2. เข้าสู่ระบบ phpMyAdmin

2.1. เปิดเบราว์เซอร์และไปที่ URL: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)

### 3. สร้างฐานข้อมูลใหม่

3.1. คลิกที่แท็บ "Database" แล้วกรอกชื่อฐานข้อมูลใหม่เป็น "swot_analysis"

### 4. สร้างตารางในฐานข้อมูล

4.1. เลือกฐานข้อมูล "swot_analysis" แล้วคลิกที่แท็บ "SQL"

4.2. นำเอาคำสั่ง SQL ต่อไปนี้มาวางและกดปุ่ม "Go" เพื่อสร้างตาราง:
   
   ```sql
   CREATE TABLE areas (
       area_id INT AUTO_INCREMENT PRIMARY KEY,
       area_name VARCHAR(100) NOT NULL,
       creator_name VARCHAR(100) NOT NULL,
       target_area_analysis TEXT NOT NULL,
       strengths TEXT NOT NULL,
       weaknesses TEXT NOT NULL,
       opportunities TEXT NOT NULL,
       threats TEXT NOT NULL,
       report_date DATE NOT NULL
   );
   CREATE TABLE data (
    data_id INT AUTO_INCREMENT PRIMARY KEY,
    area_id INT,
    reporter_name VARCHAR(255),
    FOREIGN KEY (area_id) REFERENCES areas(area_id)
   );
   CREATE TABLE data1 (
    data1_id INT AUTO_INCREMENT PRIMARY KEY,
    area_id INT,
    resources TEXT,
    FOREIGN KEY (area_id) REFERENCES areas(area_id)
   );
   ```

### 5. นำเอาโค้ดและไฟล์ต่าง ๆ ไปวางที่ที่ต้องการ

5.1. ดาวน์โหลดไฟล์โปรแกรม SWOT Analysis และแตกไฟล์ ZIP

5.2. เก็บไฟล์ที่แตกไฟล์ไว้ที่ `C:\xampp\htdocs`

### 6. เปิดเบราว์เซอร์และทดสอบการใช้งาน

6.1. เปิดเบราว์เซอร์และใส่ URL ต่อไปนี้: [http://localhost/ชื่อไฟล์ที่ต้องการ/data.php](http://localhost/ชื่อไฟล์ที่ต้องการ/data.php)

### 7. เริ่มต้นใช้งาน SWOT Analysis

7.1. ลงทะเบียนบัญชีผู้ใช้หรือเข้าใช้งานตามคำแนะนำที่ระบุในโปรแกรม SWOT Analysis
