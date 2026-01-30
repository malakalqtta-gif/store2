<?php 
session_start();
include 'config.php'; // للاتصال بقاعدة البيانات لجلب أسماء العطور وأسعارها
include 'header.php';

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>سلة التسوق</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
 <table border="1" style="width: 80%; margin: 50px auto auto auto; text-align: center;
  background-color: white;">
     <tr>
         <th>المنتج</th>
         <th>السعر</th>
        </tr>

 <?php 
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
         foreach ($_SESSION['cart'] as $p_id) {
                // جلب بيانات كل عطر مضاف من الجدول products
           $stmt = $conn->prepare("select Name, Price from products where productID = ?");
          $stmt->execute([$p_id]);
          $product = $stmt->fetch();
                
                if ($product) {
                 echo "<tr>
                    <td>{$product['Name']}</td>
                    <td>{$product['Price']} ر.س</td>
                    </tr>";
                }
            }
        } else {
            echo "<tr><td colspan='2'>السلة فارغة حالياً</td></tr>";
        }
        ?>
    </table>

   <div style="text-align: center; margin-top: 30px; display: flex; justify-content: center;
    gap: 15px; align-items: center;">

    <a href="products.php" class="btn" style="background-color: #8da07a; color: white;
     text-decoration: none;">متابعة التسوق</a>

    <form action="confirm_order.php" method="POST" style="margin: 0;">
        <button type="submit" name="confirm_order" class="btn" style="background-color:
         #8da07a; color: white; border: none; cursor: pointer;">تأكيد الطلب</button>
    </form>

</div>
</body>
</html>
<style>
/* تنسيق جدول السلة */

table {
    width: 90%;
    border-collapse: collapse;
    margin: 30px auto;
    background-color: #fff;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

th {
    background-color: #8da07a; /* نفس لون موقعك الأخضر */
    color: white;
    padding: 15px;
}

td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
}

/* تنسيق أزرار السلة */
.btn-view {
    padding: 10px 25px;
    border-radius: 20px;
    text-decoration: none;
    display: inline-block;
    margin: 10px;
    transition: 0.3s;
}

.confirm-btn { background-color: #8da07a; color: white; border: none; cursor: pointer; }
.back-btn { background-color: #f4f4f4; color: #333; border: 1px solid #ddd; }
</style>