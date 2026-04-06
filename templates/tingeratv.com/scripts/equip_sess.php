<?
    session_start();
    $_SESSION['ORDER']['EQUIPMENT'] = $_POST['equip'];
    $_SESSION['ORDER']['TOTAL_PRICE'] = $_POST['price'];
    $_SESSION['ORDER']['MODUL_PRICE'] = $_POST['modul_price'];
    $_SESSION['ORDER']['COLOR'] = $_POST['color'];
?>