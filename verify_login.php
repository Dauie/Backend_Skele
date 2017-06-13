<?php
    include 'auth.php';
    if (auth($_POST['login'], $_POST['passwd'])) {
        session_start();
        $_SESSION['loggued_on_user'] = $_POST['login'];
		header("Location: ../storefront.php");
        echo "OK\n";
    }
    else
        echo "ERROR\n";
?>