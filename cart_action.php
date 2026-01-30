<?php
session_start(); // ضروري جداً في أول سطر

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['p_id']; // استلام الرقم من صفحة المنتج

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // إضافة الرقم للسلة
    $_SESSION['cart'][] = $product_id;

    // العودة لصفحة السلة
    header("Location: " . $_SERVER['HTTP_REFERER']); /*بدل ما اضغط على اضافه للسله 
    ويروح لصفحه السله خليناه عند الضغط تجلس في الصفحه نفسه والسله تتعبا منتجات */
    exit();
}

