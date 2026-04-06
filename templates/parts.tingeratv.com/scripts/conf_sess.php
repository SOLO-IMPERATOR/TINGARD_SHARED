<?
    session_start();
    $_SESSION['ORDER']['ID'] = $_POST['id'];
    $_SESSION['ORDER']['MODS'] = $_POST['mod'];
    $_SESSION['ORDER']['ENGINE'] = $_POST['engine'];
    $_SESSION['ORDER']['MODULE_PRICE'][] = $_POST['price_engine'];
    $_SESSION['ORDER']['MODULE_PRICE'][] = $_POST['price_mod'];
?>