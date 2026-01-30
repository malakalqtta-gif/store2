<?php 
session_start();
include 'header.php'; // استدعاء الهيدر
include 'config.php'; // الاتصال بالقاعدة

// التقاط رقم المنتج من الرابط
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    // جلب بيانات العطر المختار من الجدول
    $stmt = $conn->prepare("select * from products where productID =:id");
    $stmt->execute(['id' => $id]);
    $product = $stmt->fetch();
}
?>

<div class="details-wrapper">
    <div class="image-section">
        <img src="img/<?php echo $product['image']; ?>" class="large-img">
    </div>

    <div class="info-section">
        <h1 class="product-title"><?php echo $product['Name']; ?></h1>
        
        <div class="detail-item">
            <span class="label">وصف العطر:</span>
            <p class="content"><?php echo $product['Description']; ?></p>
        </div>

        <div class="detail-item">
            <span class="label">الحجم:</span>
            <p class="content">100 مل</p>
        </div>

        <div class="product-price">
            <?php echo $product['Price']; ?> ر.س
        </div>

   <div class="add-to-cart-container">
    <form action="cart_action.php" method="POST">
        <input type="hidden" name="p_id" value="<?php echo $id; ?>">
        <button type="submit" name="add_to_cart" class="cart-btn">إضافة للسلة</button>
    </form>
</div>
    </div>
</div>

<style>
    /* الحاوية الرئيسية للتفاصيل */
    .details-wrapper {
        display: flex;            /* وضع الصورة بجانب الكلام */
        flex-wrap: wrap;          /* ترتيب مرن للشاشات الصغيرة */
        gap: 50px;                /* مسافة بين الصورة والتفاصيل */
        padding: 60px 10%;        /* مساحة داخلية كبيرة */
        background-color: #f4f4f2; /* لون الصفحة الكريمي */
        min-height: 80vh;         /* ضمان أخذ مساحة كافية من الشاشة */
    }

    /* قسم الصورة */
    .image-section {
        flex: 1;                  /* أخذ نصف المساحة */
        min-width: 300px;         /* الحد الأدنى للعرض */
    }

    .large-img {
        width: 70%;              /* الصورة تأخذ كامل عرض قسمها */
        border-radius: 20px;      /* زوايا دائرية فخمة */
        box-shadow: 0 10px 30px rgba(0,0,0,0.1); /* ظل يعطي عمق للصورة */
        background: #fff;         /* خلفية بيضاء للصورة */
    }

    /* قسم المعلومات */
    .info-section {
        flex: 1.2;                /* أخذ مساحة أكبر قليلاً للكلام */
        min-width: 300px;
    }

    .product-title {
        font-size: 42px;          /* اسم العطر كبير وفخم */
        color: #333;
        margin-bottom: 10px;
    }

    .detail-item {
        margin-bottom: 25px;      /* مسافة بين المكونات والحجم والسعر */
    }

    .label {
        font-weight: bold;        /* عناوين جانبية عريضة */
        color: #8a9a5b;           /* اللون الأخضر الزيتوني لموقعك */
        display: block;           /* جعل العنوان في سطر لوحده */
        font-size: 18px;
        margin-bottom: 5px;
    }

    .content {
        color: #666;              /* لون النص للوصف والمكونات */
        font-size: 18px;
        line-height: 1.6;         /* مساحة مريحة للعين بين الأسطر */
    }

    .product-price {
        font-size: 32px;          /* السعر واضح جداً */
        color: #333;
        font-weight: bold;
        margin: 30px 0;
    }

    /* زر إضافة للسلة */
    .cart-btn {
        background-color: #8da07a; /* لون موقعك */
        color: white;
        padding: 15px 60px;       /* زر كبير وسهل الضغط */
        border: none;
        border-radius: 30px;      /* زوايا بيضاوية بالكامل */
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;          /* شكل الماوس يد */
        transition: 0.3s;
    }

    .cart-btn:hover {
        background-color: #6b7a44; /* يغمق اللون عند تمرير الماوس */
    }
</style>



<?php include 'footer.php'; ?>