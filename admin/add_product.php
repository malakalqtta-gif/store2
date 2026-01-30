<?php
// الاتصال بقاعدة البيانات
include '../config.php'; 

if(isset($_POST['add_product'])){
   // استلام البيانات من الخانات
   $name = $_POST['name'];
   $price = $_POST['price'];
   $category_id = $_POST['CategoryID']; // رقم القسم المختار
   
   // التعامل مع الصورة
   $image = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../img/'.$image;

   // تصحيح جملة الإدخال بناءً على أسماء أعمدة جدول المنتجات عندك
   /*استخدمنا الانسرت لتخزين البيانات  */
   $insert_query = $conn->prepare("INSERT INTO products (Name, Price, image, CategoryID) VALUES (?, ?, ?, ?)");
   
   if($insert_query->execute([$name, $price, $image, $category_id])){
      // نقل الصورة للمجلد الفعلي
      move_uploaded_file($image_tmp_name, $image_folder);
      echo "<script>alert('تم إضافة العطر بنجاح!'); window.location.href='admin_products.php';</script>";
   } else {
      echo "<script>alert('حدث خطأ أثناء الإضافة');</script>";
   }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <title>إدارة المتجر - إضافة عطر</title>

   <body>

<div class="admin-wrapper">

   <div class="sidebar">
      <div class="sidebar-title">إدارة المتجر</div>
      <a href="admin_products.php">عرض كافة المنتجات</a>
      <a href="add_product.php" class="active">إضافة منتج جديد</a>
      <a href="../index.php">الرجوع للمتجر</a>
   </div>

   <div class="main-content">
      <div class="form-card">
         <h3>إضافة عطر جديد</h3>
         
         <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            
            <input type="text" name="name" placeholder="أدخلي اسم العطر" class="input-box" required>
            
            <input type="number" name="price" placeholder="أدخلي السعر" class="input-box" required>
    <!--استخدمنها علشان اذا اضفنا قسم جديد في القاعده بيظهر طوالي بدون ما اعدل على كودselect-->
            <select name="CategoryID" class="input-box" required>
               <option value="" disabled selected>-- اختر القسم --</option>
               
               <?php
                  $select_cats = $conn->prepare("SELECT * FROM `categories` ");
                  $select_cats->execute();
                  while($row = $select_cats->fetch(PDO::FETCH_ASSOC)){
                     // هنا نستخدم Name و CategorieID كما هي في قاعدة بياناتك تماماً
                     echo '<option value="'.$row['CategorieID'].'">'.$row['Name'].'</option>';
                  }
               ?>
            </select>

            <label style="display:block; margin-bottom:5px; color:#545942;">صورة العطر:</label>
            <input type="file" name="image" id="imageInput" class="input-box" required>

            <input type="submit" name="add_product" value="حفظ في المتجر" class="btn-save">
         </form>
      </div>
   </div>

</div>
                <!--هنا الربط مع جافا اسكربت-->
<script src="validate.js"></script>

</body>
</html>
   
   <style>
      /* تنسيق الحاوية الكبرى لتكون من اليمين لليسار وبجانب بعض */
      .admin-wrapper {
         display: flex;
         flex-direction: row; 
         min-height: 100vh;
         direction: rtl; 
         background-color: #f4f7f1;
      }

      /* تنسيق اللوحة الجانبية (Sidebar) اليمين */
      .sidebar {
         width: 280px;
         background-color: #8da07a; /* لونك الزيتي المعتمد */
         color: white;
      }

      .sidebar-title {
         padding: 30px;
         font-size: 24px;
         text-align: center;
         background-color: #7a8c69; /* لون أغمق للعنوان */
         font-weight: bold;
      }

      .sidebar a {
         display: block;
         color: white;
         text-decoration: none;
         padding: 20px;
         border-bottom: 1px solid rgba(255,255,255,0.1);
         text-align: right;
         transition: 0.3s;
      }

      /* لون الزر المختار (بونص التميز) */
      .sidebar a.active, .sidebar a:hover {
         background-color: #acc198; 
         padding-right: 30px;
      }

      /* تنسيق منطقة الفورم في الوسط */
      .main-content {
         flex: 1;
         display: flex;
         justify-content: center;
         align-items: center;
         padding: 20px;
      }

      .form-card {
         background: white;
         width: 100%;
         max-width: 500px;
         padding: 40px;
         border-radius: 10px;
         box-shadow: 0 4px 15px rgba(0,0,0,0.05);
      }

      .form-card h3 {
         text-align: center;
         color: #545942;
         margin-bottom: 30px;
      }

      /* تنسيق الخانات والمدخلات */
      .input-box {
         width: 100%;
         padding: 12px;
         margin-bottom: 20px;
         border: 1px solid #ddd;
         border-radius: 5px;
         display: block;
         text-align: right; /* الكتابة تبدأ من اليمين */
      }

      .btn-save {
         width: 100%;
         padding: 15px;
         background-color: #8da07a;
         color: white;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         font-weight: bold;
         font-size: 18px;
      }
   </style>
</head>
