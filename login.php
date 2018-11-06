<html>
<head>
    <title>
        The Simplest way to create event
    </title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
</head>


<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        $servername = getenv('SERVER_NAME');
        $username = getenv('USER_NAME');
        $password = getenv('USER_PASSWORD');
        $dbname = getenv('DB_NAME');

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $username = $_POST["username"];
            $password = $_POST["password"];

            "<input type='hidden' name='username' value='$username'>";

            $stmt = $conn->query("SELECT * FROM users WHERE username='$username'");
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['username'] == $username && $row['password'] == $password && $row['Verified']) {
                $_SESSION['user'] = $username;
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                //echo $_SESSION['name'];
            } else {
                $_SESSION['message'] = 'Invalid username or password.';
                header("Location: /loginpage.php");
            }
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
?>


<body>
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
                <button type="button" class="btn btn-primary nav navbar-nav navbar-right" style="padding-left: 5px"
                        data-toggle="modal" data-target="#myModal"> Create Event
                </button>

                <a type="button" class="btn btn-primary nav navbar-nav navbar-right" href="logout.php" id="logout" style="margin-right: 16px;
    padding-left: 12px;"> Log Out</a>

                <?php
                $name = $_SESSION['name'];
                echo "<p class=\" nav navbar-nav navbar-right\" style='margin-top: 8px;
    margin-right: 2%;'>Welcome $name</p>";
                ?>


            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <!-- Large modal -->

    <h1>
        <center>
            Your Events.
            <br>
            <br>

        </center>
    </h1>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         id="myModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">New Event</h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="submitform" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label">Name of Event:</label>
                            <input type="text" class="form-control" id="recipient-name" name="event">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Link of Event:</label>
                            <input type="text" class="form-control" id="recipient-name" name="link">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Description:</label>
                            <textarea class="form-control" id="message-text" name="description"></textarea>
                        </div>


                        <div class="form-group">
                            Upload a File:
                            <input type="file" name="file" id="fileToUpload" accept="image/jpeg,image/png,image/jpg">
                        </div>

                        <div class="form-group">
                            <label for="doe" class="control-label">Date of Event:</label>
                            <br>
                            <in class="form-group">

                                <label>DAY</label>
                                <select name="date">
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                    <option>05</option>
                                    <option>06</option>
                                    <option>07</option>
                                    <option>08</option>
                                    <option>09</opt
                                        ion>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option>16</option>
                                    <option>17</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>

                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
                                    <option>26</option>
                                    <option>27</option>
                                    <option>28</option>
                                    <option>29</option>
                                    <option>30</option>
                                    <option>31</option>
                                </select>

                                <label>Month</label>
                                <select name="month">
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                    <option>05</option>
                                    <option>06</option>
                                    <option>07</option>
                                    <option>08</option>
                                    <option>09</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                </select>

                                <label>Year</label>
                                <select name="year">
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                    <option>2021</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                    <option>2026</option>
                                    <option>2027</option>
                                    <option>2028</option>
                                    <option>2029</option>
                                    <option>2030</option>
                                    <option>2031</option>
                                    <option>2032</option>
                                </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
                            <input type="submit" class="btn btn-primary" name="Done" value="Done" id="Done">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
        $servername = getenv('SERVER_NAME');
        $user = getenv('USER_NAME');
        $password = getenv('USER_PASSWORD');
        $dbname = getenv('DB_NAME');

        if (!isset($_SESSION['user']))
            $username = $_POST["username"];

        else
            $username = $_SESSION['user'];


        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
        // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $nRows = $conn->query("select count(*) from events WHERE username='$username'")->fetchColumn();

            $dataarray = $conn->query("SELECT * FROM `events` WHERE Username='$username' ")->fetchAll();

            $conn = null;

            echo "<div class ='container'>";
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

                if ($i == $nRows)
                    echo "<div class='col-lg-4' id='$id' style='margin-left: 34%'>";

                else
                    echo "<div class='col-lg-4' id='$id'>";

                echo "<div class='thumbnail'><p><strong>Name of Event</strong> : $name</p><div class='thumbnail'>Date of Event : $DOE</div>
                                    <img src='/uploads/$image'";

                echo "<div class='thumbnail'><strong> Description :</strong> $description<br><a href='$link'>Link to the event</a>";
                echo "<center><div class='caption'> <a class ='btn btn-primary' href='/deleteevent.php?id=$id&user=$username'>Delete</a>";
                echo "   <a class=\"btn btn-primary\" href='editeventpage.php?name=$name&id=$id&user=$username&description=$description'>Edit</a></center>";
                echo "<br><br><div class='thumbnail'>Date of Creation : $DOC<br>By : $username</div></div></div>
                      </div>
                      </div>";
                echo "</div>";
            }

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        ?>


        <script>
            $("#submitform").on("submit", function (event) {
                $('#Done').val('Creating....');
                event.preventDefault();
                console.log($(this).serialize());
                var form = $('form')[0];
                var formData = new FormData(form);
                var username = '<?php echo $username; ?>';

                $.ajax({
                    type: "POST",
                    url: 'addEvent.php?username=' + username,
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (data) {
                        $('#Done').val('Done');

                        $('#close').click();
                        $('.row').append("<div class='col-lg-4' style='margin-left: 34%'><div class='thumbnail'><strong>Name of Event : </strong>" + data.result[0] + "<br><div class='thumbnail'>Date of Event : " + data.result[3] +
                            "</div><img src='/uploads/" + data.result[4] + "'>" + "<div class='caption'>" +
                            "<br><div class='thumbnail'><strong>Description : </strong>" + data.result[1] +
                            "<br><a href='" + data.result[6] + "'>Link to the Event</a><br>" +
                            " <a class ='btn btn-primary'href='/deleteevent.php?id=" + data.result[7] + "&user=" + data.result[5] + "'>Delete</a> " + "<a class=\"btn btn-primary\" href='editeventpage.php?id=" + data.result[7] + "&user=" + data.result[5] + "?name=" + data.result[0] + "?description=" + data.result[1] + "'>Edit</a></center><br><br>"
                            + "<div class='thumbnail'>Date of Creation : " + data.result[2] + "<br>By : " + data.result[5] + "</div></div>" +
                            "</div></div>");

                    },
                    error: function (err) {
                        $('#Done').val('Done');
                        console.log(err);

                    }
                });
            });

        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </body>
    </html>