<!-- 1. استدعاء الهيدر وملف الاتصال بالقاعدة الذي سميتيه config.php-->
<?php 
// 1. استدعاء الملفات الأساسية
include 'header.php';     // يجلب الهيدر
include 'config.php';     // يفتح الاتصال بقاعدة البيانات

// 2. التقاط رقم الفئة إذا كان المستخدم ضغط على (رجالي/نسائي) من صفحة الفئات
$catID = isset($_GET['cat']) ? $_GET['cat'] : null;

// 3. كتابة الاستعلام: هل نعرض فئة معينة أم كل العطور؟
if ($catID) {
    $stmt = $conn->prepare("select * from products where CategoryID = :cid");
    $stmt->bindParam(':cid', $catID);
} else {
    $stmt = $conn->prepare("select * from products");
}

$stmt->execute();
$products = $stmt->fetchAll();
?>

<style>
    /* تنسيق شبكة المنتجات */
    .products-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
        padding: 50px 5%;
        background-color: #f0f2ed; /* اللون الجديد اللي اخترناه للخلفية */
    }

    /* تنسيق كرت العطر */
    .product-card {
        background: #fff;
        border-radius: 15px;
        width: 280px;
        padding: 20px;
        text-align: center;
        transition: 0.3s;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        text-decoration: none; /* إزالة الخط تحت الروابط */
        color: inherit;        /* الحفاظ على لون النص الأصلي */
        display: block;        /* جعل الكرت بالكامل قابل للضغط */
    }

    

    .product-img {
        width: 100%;
        height: 250px;
        object-fit: contain;
        margin-bottom: 15px;
    }

    .price {
        color: #808d73ff;
        font-weight: bold;
        font-size: 20px;
        margin: 10px 0;
    }

    .add-btn {
        display: inline-block;
        background: #8da07a;
        color: white;
        padding: 10px 25px;
        border-radius: 20px;
        text-decoration: none;
        font-weight: bold;
    }
</style>

<div class="products-grid">
    <?php foreach($products as $product): ?>
        
        <a href="product_details.php?id=<?php echo $product['productID']; ?>" class="product-card">
            
            <img src="img/<?php echo $product['image']; ?>" class="product-img">
            
            <h3><?php echo $product['Name']; ?></h3>
            
            <p class="price"><?php echo $product['Price']; ?> ر.س</p>
            
            <span class="add-btn">عرض التفاصيل</span>
            
        </a>

    <?php endforeach; ?>
</div>

<?php include 'footer.php'; ?>