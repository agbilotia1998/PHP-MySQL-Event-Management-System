<?php
/**
 * Created by PhpStorm.
 * User: AYUSH
 * Date: 5/28/2017
 * Time: 9:41 AM
 */
session_start();
$_SESSION['user'] = null;
header("Location: /index.php");