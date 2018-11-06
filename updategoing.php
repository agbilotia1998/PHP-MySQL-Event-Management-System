<?php

    $servername = "localhost";
    $username = "agbilotia1998";
    $password = "qazwsxed";
    $dbname = "myDBPDO";
    $id = $_GET['id'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $currentDir = getcwd();
        $uploadDirectory = "/uploads/";
        $errors = [];
        $count = $conn->query("select Going from events WHERE Id='$id'")->fetchColumn();
        $count = $count + 1;

        // use exec() because no results are returned
        $sql = " UPDATE events SET Going = '$count'WHERE Id = '$id' ";
        $conn->exec($sql);
        $dataarray = array($count);
        $data['result'] = $dataarray;
        echo json_encode($data);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

?>