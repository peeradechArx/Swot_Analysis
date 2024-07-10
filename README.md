1 เปิดใช้งาน XAMPP หัวข้อ MySQL
2 เข้าไปที่เว็บ http://localhost/phpmyadmin
3 สร้าง DataBase ขึ้นใหม่ชื่อ swot_analysis
4 เข้าไปที่ Structure ของ swot_analysis 
5 ใส่คำสั่งนี้ลงไปเเล้วกด Go คำสั่ง CREATE TABLE areas (
    area_id INT AUTO_INCREMENT PRIMARY KEY,
    area_name VARCHAR(100) NOT NULL,
    creator_name VARCHAR(100) NOT NULL,
    target_area_analysis TEXT NOT NULL,
    strengths TEXT NOT NULL,
    weaknesses TEXT NOT NULL,
    opportunities TEXT NOT NULL,
    threats TEXT NOT NULL,
    resources TEXT NOT NULL,
    reporter_name VARCHAR(100) NOT NULL,
    report_date DATE NOT NULL
);

6.จากนั้น ใส่เอาไฟล์ ที่ดาวโหลดเป็น zip ไปเก็บไว้ที่ "C:\xampp\htdocs" 
7.จากนั้นเปิดเบราว์เซอร์ ใส่ลิ้งนี้ http://localhost/ชื่อไฟล์/data.php
