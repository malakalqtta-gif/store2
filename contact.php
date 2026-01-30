<?php 
// استدعاء ملف الهيدر (الشريط العلوي) لتوحيد شكل المتجر
include 'header.php'; 
?>

<div class="contact-container">
    
    <h3 style="color:#4a5d4a; text-align:center;">تواصل معنا</h3>

    <div class="form-style">
        <form action="send_data.php" method="POST">
        <div class="row">
          <label>الاسم الكامل:</label>
          <input type="text" name="n"> </div>

            <div class="row">
                <label>البريد الإلكتروني:</label>
                <input type="email" name="e"> </div>

            <div class="row">
                <label>نص الرسالة:</label>
                <textarea rows="4" name="m"></textarea> </div>

            <button type="submit" name="btn_send" class="btn-send">إرسال الرسالة</button>
        </form>
     </div>

    <div class="info-footer">
        <p><b>العنوان:</b> اليمن - صنعاء - شارع الستين</p>
        <p><b>البريد الإلكتروني:</b> info@nafahat.com</p>
        <p><b>الواتساب:</b> 967XXXXXXXX+</p>
</div>

</div>


<style>
    /* الحاوية الرئيسية: نستخدمها لتوسيط المحتوى في الصفحة */
    .contact-container {
        width: 50%;                /* تم تصغير العرض من 60% إلى 50% ليكون الحجم متناسقاً */
        margin: 30px auto;         /* مسافة من الأعلى والأسفل وتوسيط تلقائي */
        direction: rtl;            /* لترتيب المحتوى من اليمين لليسار */
    }

    /* صندوق النموذج: الخلفية البيضاء والإطار */
    .form-style {
        background-color: #fff;    /* لون خلفية الصندوق أبيض */
        padding: 20px;             /* مساحة داخلية */
        border: 1px solid #ddd;    /* إطار خفيف جداً رمادي */
        border-radius: 8px;        /* زوايا دائرية بسيطة للمربع */
    }

    /* تنسيق صفوف الإدخال */
    .row {
        margin-bottom: 12px;       /* مسافة بسيطة بين كل حقل والآخر */
    }

    /* تنسيق العناوين فوق المربعات (مثل: الاسم الكامل) */
    .row label {
        display: block;            /* جعل العنوان يظهر في سطر مستقل فوق المربع */
        font-weight: bold;         /* خط عريض للعنوان */
        color: #8da07a;            /* لون زيتوني غامق يطابق الشريط العلوي */
        margin-bottom: 5px;        /* مسافة تحت العنوان */
    }

    /* تنسيق مربعات النص */
    .row input, .row textarea {
        width: 100%;               /* المربع يملأ كامل مساحة الصندوق */
        padding: 8px;              /* حجم الفراغ داخل المربع عند الكتابة */
        border: 1px solid #ccc;    /* إطار المربعات رمادي كلاسيكي */
        border-radius: 4px;        /* زوايا المربعات */
    }

    /* زر الإرسال: بلون الشريط العلوي */
    .btn-send {
        background-color: #8da07a; /* اللون الزيتوني الغامق */
        color: white;              /* لون النص أبيض */
        padding: 10px 25px;        /* حجم الزر (طول وعرض) */
        border: none;              /* إزالة الإطار الافتراضي للزر */
        border-radius: 5px;        /* زوايا دائرية للزر */
        cursor: pointer;           /* تحويل شكل الماوس ليد عند الوقوف عليه */
    }

    /* قسم المعلومات السفلية: بدون الخط الجانبي */
    .info-footer {
        margin-top: 25px;          /* مسافة فوق قسم المعلومات */
        padding: 15px;             /* مساحة داخلية */
        background-color: #f9f9f9; /* خلفية رمادية فاتحة جداً للتمييز */
        text-align: right;         /* محاذاة النص لليمين */
        /* لاحظي هنا حذفنا سطر border-right تماماً ليرحل الخط */
    }
</style>


<?php include 'footer.php'; // استدعاء الفوتر السفلي ?>