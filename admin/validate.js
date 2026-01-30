/*استخدمنا جافا سكربت هنا علشان امتداد الملف قبل ارساله للسيرفر بحيث يكون الامتداد يكون (فايل) بس واذا سوينا امتداد مثل:الي تحت
(jpg) (png) (gif)
تظهر رساله تنبيه للمستخدم ويتم الغاء عمليه الارسال */
function validateForm() {
    const fileInput = document.getElementById('imageInput');
    const filePath = fileInput.value;
    const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    
    if (!allowedExtensions.exec(filePath)) {
        alert('خطأ من إدارة الموقع: يرجى رفع صور فقط!');
        fileInput.value = '';
        return false;
    }
    return true;
}