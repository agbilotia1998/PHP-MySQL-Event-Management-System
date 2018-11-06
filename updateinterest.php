<?php

    $servername = getenv('SERVER_NAME');
    $username = getenv('USER_NAME');
    $password = getenv('USER_PASSWORD');
    $dbname = getenv('DB_NAME');
    $id = $_GET['id'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $currentDir = getcwd();
        $uploadDirectory = "/uploads/";
        $errors = [];
        $count = $conn->query("select Interested from events WHERE Id='$id'")->fetchColumn();
        $count = $count + 1;
        // use exec() because no results are returned
        $sql = " UPDATE events SET Interested = '$count' WHERE Id = '$id' ";
        $conn->exec($sql);
        $dataarray = array($count);
        $data['result'] = $dataarray;
        header('Content-Type: application/json');
        echo json_encode($data);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }