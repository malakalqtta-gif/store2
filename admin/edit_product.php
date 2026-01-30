<?php
include '../config.php';

// 1. استقبال الرقم من الرابط (غيرناه ليكون update ليتوافق مع الزر)
if(isset($_GET['update'])){
   $id = $_GET['update'];
   
   // 2. جلب بيانات العطر لعرضها في الخانات
   $stmt = $conn->prepare("SELECT * FROM products WHERE productID = ?");
   $stmt->execute([$id]);
   $p = $stmt->fetch();
   
   // إذا لم يجد العطر نرجعه لصفحة المنتجات
   if(!$p){ header('location:admin_products.php'); }
}

// 3. كود تحديث البيانات عند ضغط زر "تعديل"
if(isset($_POST['update_product'])){
   $name = $_POST['name'];
   $price = $_POST['price'];
   $update_id = $_POST['update_id'];

   $update = $conn->prepare("UPDATE products SET Name = ?, Price = ? WHERE productID = ?");
   if($update->execute([$name, $price, $id])){
      echo "<script>alert('تم التعديل بنجاح'); window.location.href='admin_products.php';</script>";
   }
}
?>

<form action="" method="post">
   <input type="hidden" name="update_id" value="<?= $p['productID']; ?>">
   <input type="text" name="name" value="<?= $p['Name']; ?>" class="input-box">
   <input type="number" name="price" value="<?= $p['Price']; ?>" class="input-box">
   <input type="submit" name="update_product" value="تعديل العطر" class="btn-save">
</form>

<div class="sidebar">
    <h3>إدارة المتجر</h3>
    <a href="admin_products.php"> عرض كافة المنتجات</a>
    <a href="add_product.php"> إضافة منتج جديد</a>
    <a href="../index.php">الرجوع للمتجر الرئيسي</a>
</div>

<div class="content">
    <div class="edit-box">
        <h2 style="color: #8a9a5b;">تعديل بيانات العطر</h2>
        
        <form method="POST">
            <label>اسم العطر الجديد:</label>
            <input type="text" name="name" value="<?php echo $p['Name']; ?>" required>
            
            <label>السعر الجديد:</label>
            <input type="number" name="price" value="<?php echo $p['Price']; ?>" required>
            
            <button type="submit" name="update_product" class="btn-update">تحديث البيانات الآن</button>
        </form>
    </div>
</div>

<style>
/* تهيئة الصفحة للنظام الجانبي */
body {
    direction: rtl; /* الاتجاه من اليمين */
    margin: 0;      /* إلغاء الهوامش */
    display: flex;  /* وضع القائمة بجانب المحتوى */
    background-color: #f0f2ed; /* خلفية الصفحة */
    font-family: sans-serif;
}

/* القائمة الجانبية الثابتة */
.sidebar {
    width: 250px;      /* عرض القائمة */
    height: 100vh;     /* طول القائمة كامل الشاشة */
    background-color: #93a184ff; /* رمادي غامق */
    position: fixed;   /* تثبيت في مكانها */
    right: 0;          /* جهة اليمين */
}

/* عنوان القائمة باللون الزيتي */
.sidebar h3 {
    background-color: #708060ff;
    color: white;
    text-align: center;
    padding: 20px;
    margin: 0;
}

/* روابط التنقل في القائمة */
.sidebar a {
    display: block;
    color: white;
    padding: 15px 20px;
    text-decoration: none;
    border-bottom: 1px solid #708060ff;
}

/* لون الروابط عند مرور الماوس */
.sidebar a:hover {
    background-color: #c5d8b2ff;
}

/* منطقة محتوى التعديل */
.content {
    margin-right: 250px; /* ترك مسافة للقائمة */
    padding: 40px;
    width: 100%;
}

/* صندوق فورم التعديل */
.edit-box {
    background: white;
    padding: 30px;
    max-width: 450px;
    border-radius: 8px;
    
}

/* تنسيق خانات الإدخال تحت بعض */
input {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    margin-bottom: 20px;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* زر التحديث الأزرق */
.btn-update {
    background-color: #708060ff;
    color: white;
    border: none;
    padding: 12px;
    width: 100%;
    cursor: pointer;
    font-size: 16px;
    border-radius: 4px;
}
</style>