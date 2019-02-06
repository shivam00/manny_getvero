<!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-learning</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
</head>

<body class="gray-bg">

    <div class="passwordBox animated fadeInDown">
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content">

                    <h2 class="font-bold">Forgot password</h2>

                    <p>
                        Enter your email address and your password will be reset and emailed to you.
                    </p>

                    <div class="row">

                        <div class="col-lg-12">
                            <form class="m-t" role="form" action="<?php echo base_url();?>main/forget" method ="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email address" required="" name="username">

                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                                    <p style="color: <?php echo $color;?>"><?php echo $error;?></p>

                                </div>

                                <button type="submit" class="btn btn-primary block full-width m-b" name="forget">Send new password</button>
                                <center><a href="<?php echo base_url();?>"><small>Login In Your Account</small></a></center>
                                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                                <a class="btn btn-sm btn-white btn-block" href="<?php echo base_url();?>main/register">Create an account</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright InnovatorsInnovation
            </div>
            <div class="col-md-6 text-right">
                <small>© 2017</small>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Sweet alert -->
    <script src="<?php echo base_url();?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

    

</body>
</html>
