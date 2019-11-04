<?php
    session_start();
    $_SESSION['usuario'] = 'Dr josé';
    $_SESSION['id'] = 36;
    
    
    
    
    
?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Landing PAGE Html5 Template">

    <meta name="keywords" content="landing,startup,flat">

    <meta name="author" content="Made By GN DESIGNS">



    <title>SG-Odonto</title>



    <!-- // PLUGINS (css files) // -->

    <link href="assets/js/plugins/bootsnav_files/skins/color.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/animate.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/bootsnav.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/overwrite.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.theme.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">

    <link href="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">

    <!--// ICONS //-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--// BOOTSTRAP & Main //-->

    <link href="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/main.css" rel="stylesheet">

</head>



<body>



    <!--======================================== 

           Preloader

    ========================================-->

    <div class="page-preloader">

        <div class="spinner">

            <div class="rect1"></div>

            <div class="rect2"></div>

            <div class="rect3"></div>

            <div class="rect4"></div>

            <div class="rect5"></div>

        </div>

    </div>

    <!--======================================== 

           Header

    ========================================-->



    <!--//** Navigation**//-->

    <nav class="navbar navbar-default navbar-fixed white no-background bootsnav navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000"style="height: 85px;">



        <div class="container" >

            <!-- Start Header Navigation -->

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">

                    <i class="fa fa-bars"></i>

                </button>

                <a class="navbar-brand" href="#brand">

                    <h3 style="color: black; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">SG-Odonto</h3>

                    <!-- <img src="assets/img/logo.png" class="logo" alt="logo"> -->

                </a>

            </div>

        </div>

    </nav>



    <!--//** Banner**//-->

    <section id="home">

        <div class="container">

            <div class="row">

                <!-- Introduction -->

                <div class="col-md-6 caption" style="padding: 0px;">

                    <h1>Bem vindo ao SG-Odonto</h1>

                    <!-- <h2>

                           I am 

                            <span class="animated-text"></span>

                            <span class="typed-cursor"></span>

                        </h2> -->

                    <p>O SG-Odonto é um sistema de gerecinamento de consultório Odontológico. O objetivo do sistema é automatizar o prontuário, tornando assim visível a
                            qualquer momento pelos profissionais e tornar o prontuário um documento mais limpo,
                            organizado e melhor registrado, também melhorar a organização e registro dos
                            agendamentos de pacientes. </p>

                </div>

                <!-- Sign Up -->

                <div class="col-md-5 col-md-offset-1">

                    <form class="signup-form">

                        <h2 class="text-center">Realizar Login</h2>

                        <hr>

                        <div class="form-group">

                            <input type="text" class="form-control" placeholder="Nome" required="required">

                        </div>

                

                        <div class="form-group">

                            <input type="text" class="form-control" placeholder="Senha" required="required">

                        </div>

                        <div class="form-group text-center">

                                <a class="btn btn-primary" href="../App/View/cadastrarUsuario.php">Entrar</a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>



    <!--======================================== 

           About Us

    ========================================-->



    <section id="about" class="section-padding">

        <div class="container">

            <h2>About Us</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, optio.</p>

            <div class="row">

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">favorite</i>

                        <h4>Simple To Use</h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas minima, dicta quaerat sit cupiditate eum mollitia.</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">flash_on</i>

                        <h4>Powerful</h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas minima, dicta quaerat sit cupiditate eum mollitia.</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">settings</i>

                        <h4>Easy To Customize</h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas minima, dicta quaerat sit cupiditate eum mollitia.</p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!--======================================== 

           Footer

    ========================================-->



    <footer>

        <div class="container">

            <div class="row">

                <div class="footer-caption" style="text-align: center;">

                        <h3 style="color: black; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">SG-Odonto</h3>

                    <hr>

                    <ul class="liste-unstyled pull-right">

                        <li><a href="#facebook"><i class="fa fa-facebook"></i></a></li>

                        <li><a href="#twitter"><i class="fa fa-twitter"></i></a></li>

                        <li><a href="#linkedin"><i class="fa fa-linkedin"></i></a></li>

                        <li><a href="#instagram"><i class="fa fa-instagram"></i></a></li>

                    </ul>

                </div>

            </div>

        </div>

    </footer>



    <!--======================================== 

           Modal

    ========================================-->



    <!-- Modal -->

    <div class="modal fade" id="SignIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title text-center" id="myModalLabel">Sign In</h4>

                </div>

                <div class="modal-body">

                    <form class="signup-form">

                        <div class="form-group">

                            <input type="text" class="form-control" placeholder="User Name" required="required">

                        </div>

                        <div class="form-group">

                            <input type="text" class="form-control" placeholder="Password" required="required">

                        </div>

                        <div class="form-group text-center">

                            <button type="submit" class="btn btn-blue btn-block">Log In</button>

                        </div>

                    </form>

                </div>

                <div class="modal-footer text-center">

                    <a href="#">Forgot your password /</a>

                    <a href="#">Signup</a>

                </div>

            </div>

        </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>

    <script src="assets/js/plugins/bootsnav_files/js/bootsnav.js"></script>

    <script src="assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script src="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>

    <script src="assets/js/main.js"></script>

</body>



</html>