<?php
    session_start();

    $servername = getenv('SERVER_NAME');
    $username = getenv('USER_NAME');
    $password = getenv('USER_PASSWORD');
    $dbname = getenv('DB_NAME');

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $errors = []; // Store all foreseen and unforseen errors here

        $fileExtensions = ['jpeg', 'jpg', 'png']; // Get all the file extensions
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileType = $_FILES['file']['type'];
        $fileExtension = strtolower(end(explode('.', $fileName)));


        if (!in_array($fileExtension, $fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        }

        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        $UploadName = $_FILES['file']['name'];
        $UploadTmp = $_FILES['file']['tmp_name'];
        $UploadType = $_FILES['file']['type'];

        $UploadName = preg_replace("#[^a-z0-9.]#i", "", $UploadName);

        if (!$UploadTmp && empty($errors)) {
            die("No File Selected, Please Upload Again");
        } else {
            if (move_uploaded_file($UploadTmp, "uploads/$UploadName")) ;

        }

        if ($UploadName == null) {
            $UploadName = 'party.jpg';
        }


        $username = $_GET['username'];
        $event = $_POST["event"];
        $link = $_POST["link"];
        $description = $_POST["description"];
        $date = $_POST["date"];
        $month = $_POST["month"];
        $mydate = getdate(date("U"));
        $year = $_POST["year"];
        $DOC = "$mydate[mday]$mydate[month]$mydate[year]";
        $DOE = $date . '/' . $month . '/' . $year;

        if (isset($_SESSION['user'])) {

            $sql = "INSERT INTO events (Name,Description,DOE,DOC,Username,Image,Link)
                    VALUES ('$event',' $description','$DOE','$DOC','$username','$UploadName','$link')";
            // use exec() because no results are returned
            $conn->exec($sql);
            $last_id = $conn->lastInsertId();
        }
        $dataarray = array($event, $description, $DOC, $DOE, $UploadName, $username, $link, $last_id);
        $data['result'] = $dataarray;
        echo json_encode($data);
        $conn = null;
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }