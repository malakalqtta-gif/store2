<?php
// ربط الملف بقاعدة البيانات
include '../config.php';

// التأكد إذا كان هناك طلب حذف لمنتج معين
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    // تنفيذ أمر الحذف بناءً على رقم المنتج
    $stmt = $conn->prepare("DELETE FROM products WHERE productID = ?");
    $stmt->execute([$delete_id]);
    // إعادة التوجيه لتحديث الصفحة فوراً
    header("Location: admin_products.php");
}

// جلب كافة بيانات المنتجات لعرضها في الجدول
$query = "SELECT * FROM products ORDER BY productID DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll();
?>


<div class="sidebar">
    <h3>إدارة المتجر</h3>
    <a href="admin_products.php">عرض كافة المنتجات</a>
    <a href="add_product.php"> إضافة منتج جديد</a>
    <a href="../index.php"> الرجوع للمتجر الرئيسي</a>
</div>

<div class="content">
    <h2 style="color: #8da07a;">قائمة المنتجات المضافة</h2>
    
    <table class="product-table">
        <thead>
            <tr>
                <th>رقم المنتج</th>
                <th>الصورة</th>
                <th>الاسم</th>
                <th>السعر</th>
                <th>التحكم</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $row): ?>
            <tr>
                <td><?php echo $row['productID']; ?></td>
                <td><img src="../img/<?php echo $row['image']; ?>" width="50"></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Price']; ?> ر.س</td>
                <td>
                   <a href="edit_product.php?update=<?= $row['productID']; ?>" class="option-btn">تعديل</a>
            <!--onclick تقول للمستخدم انه متاكد انه يشتي يحذف-->

<a href="admin_products.php?delete=<?= $row['productID']; ?>" class="delete-btn" onclick="return confirm('هل أنتِ متأكدة من حذف هذا العطر؟');">حذف</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
/* تهيئة الصفحة لتناسب نظام القائمة الجانبية */
body {
    direction: rtl; /* الكتابة من اليمين */
    margin: 0;      /* إلغاء الفراغات الخارجية */
    display: flex;  /* وضع العناصر بجانب بعضها */
    background-color: #f0f2ed; /* خلفية رمادية فاتحة */
    font-family: 'Segoe UI', sans-serif;
}

/* القائمة الجانبية الثابتة على اليمين */
.sidebar {
    width: 250px;       /* عرض القائمة */
    height: 100vh;      /* طول القائمة بكامل الشاشة */
    background-color: #93a184ff; /* رمادي غامق */
    position: fixed;    /* تثبيت القائمة عند سحب الصفحة */
    right: 0;           /* التثبيت جهة اليمين */
}

/* عنوان اللوحة داخل القائمة */
.sidebar h3 {
    background-color: #708060ff; /* اللون الزيتي */
    color: white;              /* لون النص أبيض */
    text-align: center;        /* توسيط العنوان */
    padding: 20px;             /* مسافة داخلية */
    margin: 0;                 /* إلغاء الهوامش */
}

/* تنسيق الروابط للتنقل بين الصفحات */
.sidebar a {
    display: block;            /* جعل الرابط يأخذ سطر كامل */
    color: white;              /* لون الخط أبيض */
    padding: 15px 20px;        /* مسافات داخلية */
    text-decoration: none;     /* إلغاء الخط تحت الرابط */
    border-bottom: 1px solid #708060ff; /* خط فاصل بسيط */
}

/* تغيير اللون عند ملامسة الماوس للرابط */
.sidebar a:hover {
    background-color: #c5d8b2ff; /* التحول للزيتي */
}

/* مساحة عرض الجدول (المحتوى الرئيسي) */
.content {
    margin-right: 250px; /* ترك مسافة تساوي عرض القائمة الجانبية */
    padding: 30px;       /* مسافة للمحتوى من الداخل */
    width: 100%;         /* استهلاك باقي عرض الشاشة */
}

/* تنسيق الجدول الزيتي */
.product-table {
    width: 100%;             /* العرض الكامل */
    border-collapse: collapse; /* دمج الحدود */
    background-color: white;   /* خلفية الجدول بيضاء */
}

.product-table th {
    background-color: #8da07a; /* رؤوس الأعمدة زيتية */
    color: white;              /* نص الرؤوس أبيض */
    padding: 12px;             /* مسافة داخل الخلايا */
}

.product-table td {
    padding: 10px;             /* مسافة داخل الخلايا */
    border-bottom: 1px solid #ddd; /* خط فاصل بين الصفوف */
    text-align: center;        /* توسيط النصوص */
}
/* تنسيق الأزرار العام */
.option-btn, .delete-btn {
    display: inline-block;
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    font-weight: bold;
    color: white;
    margin: 2px;
    transition: 0.3s;
    border: none;
}

/* زر التعديل - لون أخضر زيتي متناسق مع تصميمك */
.option-btn {
    background-color: #8da07a;
}
.option-btn:hover {
    background-color: #6b7d5e;
}

/* زر الحذف - لون أحمر هادئ */
.delete-btn {
    background-color: #c0392b;
}
.delete-btn:hover {
    background-color: #a02d22;
}
</style>