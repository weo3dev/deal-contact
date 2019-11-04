<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dealer Inspire Code Challenge</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/grayscale.min.css" rel="stylesheet">

    <!-- Additional CSS -->
    <link href="css/additional.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->    

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <span class="fa fa-bars"></span>
                </button>
                <a class="navbar-brand page-scroll" title="go to page top" href="#page-top">
                    <span class="fa fa-play-circle"></span> <span class="light">Dealer</span> Inspire Challenge
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top" title="hidden go to page top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about" title="go to about section">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#coffee" title="go to take a break section">Coffee</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact" title="go to contact form section">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Challenge</h1>
                        <p class="intro-text">Code Something Awesome.
                            <br>We &lt;3 PHP Developers.</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <span class="fa fa-angle-double-down animated"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About This Challenge</h2>
                <p>We make awesome things at Dealer Inspire.  We'd like you to join us.  That's why we made this page.  Are you ready to join the team?</p>
                <p>To take the code challenge, visit <a href="https://bitbucket.org/dealerinspire/php-contact-form">this Git Repo</a> to clone it and start your work.</p>
            </div>
        </div>
    </section>

    <section id="coffee" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Coffee Break?</h2>
                    <p>Take a coffee break.  You deserve it.</p>
                    <a href="https://www.youtube.com/dealerinspire" class="btn btn-default btn-lg">or Watch YouTube</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container content-section">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">

                <h2 class="smiley-title text-center">Contact Guy Smiley</h2>
                <p class="smiley-message text-center">Remember Guy Smiley?  Yeah, he wants to hear from you.</p>
                <div id="contact-messages" class="alert">
                    <!-- form response messaging here -->
                </div>                
                <form role="form" method="post" id="contact-form">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="name"> Your Name: <em>(required)</em></label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="<?php //echo isset($_POST['name']) ? $name : ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email"> Email: <em>(required)</em></label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php //echo isset($_POST['email']) ? $email : ''; ?>" required>
                            </div>
                                     
                            <div class="form-group">
                                <label for="phone"> Phone: <em>(optional)</em></label>
                                <small>&nbsp;&nbsp;example: 123-456-7890</small>
                                <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control" id="phone" name="phone" minlength="12" size="12" value="<?php //echo isset($_POST['phone']) ? $phone : ''; ?>">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <label for="message"> Message: <em>(required)</em></label>
                            <textarea class="form-control" type="textarea" id="message" name="message" maxlength="6000" rows="7"><?php //echo isset($_POST['message']) ? $message : ''; ?></textarea>

                            <button type="submit" name="submit" class="btn btn-lg btn-default pull-right" >Send &rarr;</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>

    <!-- Map Section -->
    <div id="map"></div>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p><small>Copyright 2018 Dealer Inspire</small></p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Theme JavaScript -->
    <script src="js/grayscale.min.js"></script>

    <!-- TBD Additional JavaScript -->
    <script src="js/formListener.js"></script>

</body>
</html>