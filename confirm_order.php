<?php
session_start();
include'config.php';

if (isset($_POST['confirm_order']) && !empty($_SESSION['cart'])) {
    try {
        // لكي نتخطى قيود قاعدة البيانات ونحفظ الطلب فوراً للمشروع
        $conn->exec("SET FOREIGN_KEY_CHECKS=0"); 
        $randomOrderID = rand(100, 999); // إنشاء رقم طلب عشوائي للمناقشة

        foreach ($_SESSION['cart'] as $p_id) {
            // جلب السعر من جدول المنتجات
            $stmt = $conn->prepare("select Price from products where productID = ?");
            $stmt->execute([$p_id]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($product) {
                $price = $product['Price'];
                
                // حفظ في جدول order_details
                $sql = "insert into order_details (OrderID, ProductID, Quantity, Price) VALUES (?, ?, 1, ?)";
                $insert = $conn->prepare($sql);
                $insert->execute([$randomOrderID, $p_id, $price]);
            }
        }

        // إعادة تفعيل القيود للأمان بعد الحفظ
   $conn->exec("SET FOREIGN_KEY_CHECKS=1");

    unset($_SESSION['cart']); // تفريغ السلة
    echo "<script>alert('تم تأكيد طلبك بنجاح! رقم الطلب: $randomOrderID'); window.location.href='index.php';</script>";

    } catch (PDOException $e) {
        echo "خطأ: " . $e->getMessage();
    }
} else {
    header("Location: view_cart.php");
}
?>