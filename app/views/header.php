<?php
/**
 * @link http://www.i-taj.com/
 * @copyright Copyright (c) 2019 I-taj.com
 * @license http://www.i-taj.com/license/
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>RTO Affordability Calculator</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="/calculator/them/css/bootstrap.min.css" rel="stylesheet">
    <link href="/calculator/them/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="/calculator/them/css/font-awesome.css" rel="stylesheet">
    <link href="/calculator/them/css/style.css" rel="stylesheet">
    <link href="/calculator/them/css/pages/dashboard.css" rel="stylesheet">
    <script src="/calculator/them/js/jquery-1.7.2.min.js"></script>
    <script src="/calculator/them/js/bootstrap.js"></script>
    <script src="/calculator/them/js/bootbox.min.js"></script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"><a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a>
            <a class="brand" href="/">Admin Panel</a>
            <div class="nav-collapse">
                <ul class="nav pull-right">
                    <?php
                    if ($helper->is_admin()){
                        echo '<li class="dropdown">';
                        echo '<a href = "/calculator/login/edit/25/" ><i class="icon-edit" ></i > Edit</a>';
                        echo '</li>';
                    }

                    ?>
                    <li class="dropdown">
                        <?php
                        $helper = new Helper();
                        if ($helper->is_admin())
                            echo '<a href = "/calculator/login/logout/" ><i class="icon-user" ></i > Logout [admin]</a>';
                        //else echo '<a href = "./login/" ><i class="icon-user" ></i > Login</a>';
                        ?>
                    </li>



                </ul>

            </div>
            <!--/.nav-collapse -->
        </div>
        <!-- /container -->
    </div>
    <!-- /navbar-inner -->
</div>
<!-- /navbar -->


<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">


        </div>
        <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->


<div class="main">
    <div class="main-inner">
        <div class="container">