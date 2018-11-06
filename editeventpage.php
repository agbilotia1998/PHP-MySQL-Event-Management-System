<html>
<head>
    <title>
        Create your event.
    </title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <script src="main.js"></script>
</head>

<body>
    <center>
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
                    <a type="button" class="btn btn-primary nav navbar-nav navbar-right" href="logout.php" id="logout"
                       style="margin-right: 16px;
    padding-left: 12px;"> Log Out</a>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <h1 class='alert alert-danger' style="width:55%;">
            Are You Sure Want to Edit this event ?
        </h1>
    </center>
    <br>

    <center>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">Edit Event
        </button>
    </center>

<?php
    $id = $_GET['id'];
    $name = $_GET['name'];
    $description = $_GET['description'];

    echo /** @lang text */
    "<div class=\"modal fade bs-example-modal-lg\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myLargeModalLabel\"
         id='edit'>
        <div class=\"modal-dialog modal-lg\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span>
                    </button>
                    <h4 class=\"modal-title\" id=\"exampleModalLabel\">Edit Event</h4>
                </div>
                <div class=\"modal-body\">
                    <form method=\"post\" id=\"editform\" enctype=\"multipart/form-data\" action='editevent.php?id=$id'>
                        <div class=\"form-group\">
                            <label class=\"control-label\">Name of Event:</label>
                            <input type=\"text\" class=\"form-control\" id=\"recipient-name\" name=\"event\" placeholder='$name'>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">Link of Event:</label>
                            <input type=\"text\" class=\"form-control\" id=\"recipient-name\" name=\"link\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"message-text\" class=\"control-label\">Description:</label>
                            <textarea class=\"form-control\" id=\"message-text\" name=\"description\" placeholder='$description'></textarea>
                        </div>
    
    
                        <div class=\"form-group\">
                            Upload a File:
                            <input type=\"file\" name=\"file\" id=\"fileToUpload\">
                        </div>
    
                        <div class=\"form-group\">
                            <label for=\"doe\" class=\"control-label\">Date of Event:</label>
                            <br>
                            <in class=\"form-group\">
    
                                <label>DAY</label>
                                <select name=\"date\">
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
                                <select name=\"month\">
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
                                <select name=\"year\">
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
    
                        <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"close\">Close</button>
                            <input type=\"submit\" class=\"btn btn-primary\" name=\"Save\" value=\"save\" id=\"save\">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>";
    ?>
</body>
</html>
