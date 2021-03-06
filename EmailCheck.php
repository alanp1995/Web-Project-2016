<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agency - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="index.php">Alan Philpott</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a href="index.php">Products</a>
                </li>
                <li>
                    <a href="customer.php">Customers</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header Edited -->
<header>
    <div class="container">
        <div class="intro-text">
            <div class="intro-heading">MindFactory</div>
            <div class="intro-lead-in">Graphics Card's On A Budget</div>
        </div>
    </div>
</header>

<!-- Services Section Edited -->
<section id="services">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Email Check</h2>
            </div>
        </div>

        <div class="row text-center">

            <!-- PHP Start -->

            <?php

            if(isset($_POST['checkEmail']))
            {
                $email = $_POST['emailCheck'];
                $totalCost = (double) $_POST['totalCost'];
                $saleQuantity = (int) $_POST['saleQuantity'];
                $stockID = (int) $_POST['stockID'];

                if($email == ""){
                    echo "No Email Entered. Please Repeat Process.";
                }

                else {
                    include 'db.php';

                    $email = mysqli_real_escape_string($db,$email);
                    $statement = "SELECT * FROM customer WHERE email = '$email'";

                    $result = mysqli_query($db,$statement);

                    if(!$result){
                        echo "Query Failed -" . mysqli_error($db);
                        exit();
                    }
                    else {
                        if(mysqli_num_rows($result) < 1) {
                            echo "User with Email <u>" . $email . "</u> Does Not Exist. Please Repeat Process";
                        }
                        else {
                            $row = mysqli_fetch_array($result);

                            $custID = $row['custID'];

                            echo("<p>User With Email: <u>" . $email . "</u> Found.<br> Please Confirm User's Details Below.</p>
                         <br>Email: " . $row['email'] .
                                "<br>Name: " . $row['forename'] . " " . $row['surname'] .
                                "<br>Delivery Address: " . $row['address'] . "</p>
                    
                        <form method='POST' action='confirmSale.php'>
                            <input type='submit' name='confirmButton' value='Confirm & Place Order' />
                            
                            <input type='hidden' name='totalCost' value='$totalCost' />
                            <input type='hidden' name='custID' value='$custID' />
                            <input type='hidden' name='saleQuantity' value = $saleQuantity />
                            <input type='hidden' name='stockID' value = $stockID />
                        </form>");
                        }
                    }
                }
            }

            ?>
        </div>

        <!-- PHP End -->

    </div>
</section>

<!-- Footer Edited -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; MindFactory 2016</span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li><a href="#">Privacy Policy</a>
                    </li>
                    <li><a href="#">Terms of Use</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="js/agency.min.js"></script>

</body>

</html>
