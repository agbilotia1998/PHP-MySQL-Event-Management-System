<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"/>
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'/>
</head>
<body background="data:image/jpeg;base64,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" style="">
    <nav class="navbar navbar-default ">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Event Management System</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#"></a></li>
                    <li class="dropdown">
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <center>
        <div style="box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.5), 0px 6px 20px 0px rgba(0, 0, 0, 0.4);width:80%;padding-top:20px; border: 1px solid rgb(0, 0, 0); border-radius: 10px;background: whitesmoke none repeat scroll 0% 0%;">
            <h1 style="color:purple;">
                THE SIMPLEST WAY TO CREATE EVENTS
            </h1>
            <?php
                session_start();
                if (isset($_SESSION['user'])) {
                    echo "<a href='login.php' class='btn btn-primary btn-lg' style='margin-top: 10px; margin-bottom: 10px' '>Login</a>";
                } else {
                    echo "<a href='loginpage.php' class='btn btn-primary btn-lg' style='margin-top: 10px; margin-bottom: 10px' '>Login</a>";
                }
            ?>
            <a href="registration.html" class="btn btn-primary btn-lg" style="margin-top: 10px; margin-bottom: 10px" '>Registration</a>
            <br>
        </div>

        <div id="span">
            <h1 style="width: 55%; box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.5), 0px 6px 20px 0px rgba(0, 0, 0, 0.4);
                background-color:whitesmoke;padding-top: 20px;border: 1px solid #000;padding-bottom:11px;">
                WATCH OUT THE LATEST EVENTS BELOW.
            </h1>
            <br>
            <br>
            <br>
            <br>
        </div>
    </center>

    <?php

        $servername = getenv('SERVER_NAME');
        $username = getenv('USER_NAME');
        $password = getenv('USER_PASSWORD');
        $dbname = getenv('DB_NAME');

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $nRows = $conn->query("select count(*) from events")->fetchColumn();
            $dataarray = $conn->query("SELECT * FROM `events` ")->fetchAll();
            $conn = null;
            for ($i = $nRows; $i >= 1; $i--) {
                $image = $dataarray[$i - 1][6];
                $id = $dataarray[$i - 1][0];
                $DOC = $dataarray[$i - 1][3];
                $DOE = $dataarray[$i - 1][2];
                $username = $dataarray[$i - 1][4];
                $name = $dataarray[$i - 1][1];
                $description = $dataarray[$i - 1][5];
                $link = $dataarray[$i - 1][7];
                $going = $dataarray[$i - 1][8];
                $interested = $dataarray[$i - 1][9];

                if ($i == $nRows)
                    echo "<center><div class='container'><center><div class='col-lg-8 col-sm-8' id='$id' style='margin-left: 20%'>";

                else
                    echo "<div class='col-lg-4' id='$id'>";

                echo "<div class='thumbnail' style='box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.5), 0px 6px 20px 0px rgba(0, 0, 0, 0.4);'><p><strong>Name of Event</strong> : $name</p><div class='thumbnail'>Date of Event : $DOE</div>
                                    <img src='/uploads/$image'";

                echo "<div class='thumbnail'><strong> Description :</strong> $description<br><a href='$link'>Link to the event</a>";
                echo "<br><br><button class='btn btn-primary' id='interested' onclick='interested($id)'>Interested: $interested</button>";
                echo "  ";
                echo "<button class='btn btn-primary' id='going' onclick='going($id)'>Going: $going  </button>";
                echo "<br><br><div class='thumbnail'>Date of Creation : $DOC<br>By : $username</div></div></div>
                      </div>";
            }

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    ?>

    <script>
        function interested(id) {
            $.ajax({
                type: "POST",
                url: 'updateinterest.php?id=' + id,
                dataType: 'json',
                success: function (data) {
                    $('#' + id).find("#interested").text('Interested :' + data.result[0]);
                    $('#' + id).find("#interested:enabled").addClass('disabled');
                },
                error: function (err) {
                    console.log(err);

                }
            });
        }
        function going(id) {
            $.ajax({

                type: "POST",
                dataType: 'json',
                url: 'updategoing.php?id=' + id,
                success: function (data) {
                    //$(this).text('Going :' + data.result[0].toString());
                    $('#' + id).find("#going").text('Going : ' + data.result[0].toString());
                    $('#' + id).find("#going:enabled").addClass('disabled');
                    return false;
                },

                error: function (err) {
                    console.log(err);
                }
            });
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>