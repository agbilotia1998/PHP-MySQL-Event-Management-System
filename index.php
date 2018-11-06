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
<body background='https://res.cloudinary.com/agbilotia1998/image/upload/v1497014956/background_bxbrnn.jpg'>
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
                    echo "<a href='login.php' class='btn btn-primary' style='margin-bottom: 10px' '>Login</a>";
                } else {
                    echo "<a href='loginpage.php' class='btn btn-primary' style='margin-bottom: 10px' '>Login</a>";
                }
            ?>
            <a href="registration.html" class="btn btn-primary" style="margin-bottom: 10px" '>Registration</a>
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

        $servername = "localhost";
        $password = "qazwsxed";
        $dbname = "myDBPDO";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", 'agbilotia1998', $password);
        // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $nRows = $conn->query("select count(*) from events")->fetchColumn();
            $dataarray = $conn->query("SELECT * FROM `events` ")->fetchAll();
            $conn = null;
            echo "<div class='container'>";
            echo "<div class='row'>";
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
                    echo "<center><div class='col-lg-12 col-sm-12' id='$id'>";


                else
                    echo "<div class='col-lg-4' id='$id'>";
                echo "<div class='thumbnail' style='box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.5), 0px 6px 20px 0px rgba(0, 0, 0, 0.4);'><p><strong>Name of Event</strong> : $name</p><div class='thumbnail'>Date of Event : $DOE</div>
                                    <img src='/uploads/$image'";

                echo "<div class='thumbnail'><strong> Description :</strong> $description<br><a href='$link'>Link to the event</a>";
                echo "<br><br><button class='btn btn-primary' id='interested' onclick='interested($id)'>Interested: $interested</button>";
                echo "  ";
                echo "<button class='btn btn-primary' id='going' onclick='going($id)'>Going: $going  </button>";
                echo "<br><br><div class='thumbnail'>Date of Creation : $DOC<br>By : $username</div></div></div>
                      </div>
                      </div></center>";
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