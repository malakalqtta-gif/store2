<?php include 'header.php';?>

<div class="container">
    <h2 class="section-title">فئات العطور</h2>
    
    <div class="category-grid">
        <div class="cat-card">
            <h3>عطور رجالية</h3>
            <p>فخامة وقوة تدوم طويلاً</p>
            <a href="products.php?cat=2" class="cat-btn">تصفح الآن</a>
        </div>

  <div class="cat-card">
      <h3>عطور نسائية</h3>
      <p>رقة وأنوثة في كل رشة</p>
      <a href="products.php?cat=1" class="cat-btn">تصفح الآن</a>
     </div>

        <div class="cat-card">
            <h3>عطور شرقية</h3>
            <p>أصالة العود والمسك الفاخر</p>
            <a href="products.php?cat=5" class="cat-btn">تصفح الآن</a>
        </div>
    </div>
</div>
<?php include 'footer.php';?>


<style>
    .container {
        text-align: center;      /* توسيط كل شيء في الصفحة */
        padding: 60px 5%;        /* مسافة من الأعلى والجوانب */
       
    }

    .category-grid {
        display: flex;           /* وضع الكروت بجانب بعضها */
        justify-content: center; /* توسيط الكروت أفقياً */
        gap: 25px;               /* مسافة بين الكروت */
        margin-top: 40px;        /* مسافة فوق الكروت */
    }

    .cat-card {
        flex: 1;    /* جعل الكروت متساوية في الحجم */
        background: #d4d7c4ff;             
        max-width: 500px;        /* أقصى عرض للكرت الواحد */
        padding: 50px;           /* 'طول الصندوق'*/
        border: 1px solid #ddd;  /* إطار خفيف */
        border-radius: 15px;     /* زوايا دائرية */
        transition: 0.3s;        /* نعومة الحركة */
    }

    

    .cat-card h3 {
        color: #8a9a5b;          /* لون العنوان أخضر */
        margin-bottom: 10px;     /* مسافة تحت العنوان */
    }

    .cat-btn {
        display: inline-block;   /* ليعمل كزر */
        margin-top: 15px;        /* مسافة فوق الزر */
        padding: 8px 20px;       /* حجم الزر */
        background: #8a9a5b;     /* لون خلفية الزر */
        color: white;            /* لون النص */
        text-decoration: none;   /* حذف الخط تحت الكلام */
        border-radius: 20px;     /* زوايا دائرية للزر */
    }
</style>

