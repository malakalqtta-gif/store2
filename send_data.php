<?php
// تأكدي أن الملف config.php يحتوي على dbname = ebookdb
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استقبال البيانات من الحقول n, e, m كما في صورتك للكود
    $name  = $_POST['n']; 
    $email = $_POST['e'];
    $msg   = $_POST['m'];

    try {
        // نستخدم اسم الجدول كما هو في صورتك بالـ phpMyAdmin بالضبط
        $sql = "insert into massages (full_name, email, massage_text) VALUES (:n, :e, :m)";
        $stmt = $conn->prepare($sql);
        
        if ($stmt->execute(['n' => $name, 'e' => $email, 'm' => $msg])) {
            echo "<script>alert('أخيراً! تم الحفظ بنجاح في قاعدة ebookdb'); window.location.href='contact.php';</script>";
        }
    } catch (PDOException $e) {
        // هذا السطر سيخبرك إذا كان هناك نقص في أعمدة الجدول
        echo "خطأ في القاعدة: " . $e->getMessage();
    }
}
?>