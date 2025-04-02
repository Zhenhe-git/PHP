<?php
session_start();

$validSizes = [5, 8, 10];
$newSize = isset($_GET['pageSize']) ? (int)$_GET['pageSize'] : 5;

if (in_array($newSize, $validSizes)) {
    $_SESSION['pageSize'] = $newSize;
}

header('location:../userlist.php');
?>