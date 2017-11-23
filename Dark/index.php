<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <title>M2L - Maison des ligues de Loraine</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/plugins/morris/morris.css">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <?php 
        session_start();
        // if (empty ($_SESSION)) {
        //     header("location:../index.php");
        // }

        require("../inc/connect.php");
        $lcount = $bdd->query('SELECT count(*) as nb FROM licencie');
        $count = $lcount->fetch();
        $totalfrais = $bdd->query('SELECT year(date_creation), frais FROM `frais` WHERE year(date_creation) = year(CURRENT_DATE) group by year(date_creation)');
        $totalfraisbyyear = $totalfrais->fetch();
        $lnewcurrentyear = $bdd->query('SELECT count(*) as nb FROM `licencie` WHERE year(date_creation) = year(CURRENT_DATE) group by year(date_creation)');
        $newcurrentyear = $lnewcurrentyear->fetch();
        $fmoyann = $bdd->query('SELECT round(avg(frais)) as frais FROM `frais`');
        $moyann = $fmoyann->fetch();

        require("header.php");
        ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">

                            <div class="col-lg-3 col-md-6">
                        		<div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                    </div>

                        			<h4 class="header-title m-t-0 m-b-30">Total Evènements</h4>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1">
                                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                                               data-bgColor="#F9B9B9" value="58"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15"/>
                                        </div>

                                        <div class="widget-detail-1">
                                            <h2 class="p-t-10 m-b-0"> 256 </h2>
                                            <p class="text-muted">Revenue today</p>
                                        </div>
                                    </div>
                        		</div>
                            </div><!-- end col -->

                            <div class="col-lg-3 col-md-6">
                        		<div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                    </div>

                        			<h4 class="header-title m-t-0 m-b-30">Réservation de salles</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2">
                                            <span class="badge badge-success pull-left m-t-20">32% <i class="zmdi zmdi-trending-up"></i> </span>
                                            <h2 class="m-b-0"> 8451 </h2>
                                            <p class="text-muted m-b-25">Revenue today</p>
                                        </div>
                                        <div class="progress progress-bar-success-alt progress-sm m-b-0">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 77%;">
                                                <span class="sr-only">77% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                        		</div>
                            </div><!-- end col -->

                            <div class="col-lg-3 col-md-6">
                        		<div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                    </div>

                        			<h4 class="header-title m-t-0 m-b-30">Note de Frais</h4>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1">
                                            <span class="badge badge-info pull-left m-t-20"><?php echo $moyann['frais']; ?> <i class="fa fa-eur" aria-hidden="true"></i></br> Moyenne annuel</span>
                                        </div>
                                        <div class="widget-detail-1">
                                            <h2 class="p-t-10 m-b-0"> <?php echo $totalfraisbyyear['frais']; ?> €</h2>
                                            <p class="text-muted">Frais Annuel</p>
                                        </div>
                                    </div>
                        		</div>
                            </div><!-- end col -->

                            <div class="col-lg-3 col-md-6">
                        		<div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                    </div>

                        			<h4 class="header-title m-t-0 m-b-30">Licenciés</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2">
                                            <span class="badge badge-inverse pull-left m-t-20"><i class="fa fa-user-o" aria-hidden="true"></i> <?php echo $newcurrentyear['nb']; ?> Nouvaux</span>
                                            <h2 class="m-b-0"> <?php echo $count['nb'];?> </h2>
                                            <p class="text-muted m-b-25">Licencié actuel</p>
                                        </div>
                                    </div>
                        		</div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->

                <footer class="footer text-right">
                    2016 - 2017 © Nicolas GARNIER.
                </footer>

            </div>

        </div>
        <!-- END wrapper -->





        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>


        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

        <!--Morris Chart-->
		<script src="assets/plugins/morris/morris.min.js"></script>
		<script src="assets/plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="assets/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>