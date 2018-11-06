<?php
    session_start();

    $servername = "localhost";
    $username = "agbilotia1998";
    $password = "qazwsxed";
    $dbname = "myDBPDO";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $username = $_GET['username'];

        $sql = " UPDATE users SET Verified=TRUE WHERE username = '$username' ";
        // use exec() because no results are returned
        $conn->exec($sql);
        header("Location: /loginpage.php");
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }