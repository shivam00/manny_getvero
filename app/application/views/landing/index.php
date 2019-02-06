<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vivra</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">V</h1>

            </div>
            <h3>Welcome to Vivra</h3>
            <p>A BI platform.

            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" action="<?php echo base_url();?>main/auth" method = "POST">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="E-mail" required="" name="email" >
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password">
                    <p style="color: <?php echo $color;?>"><?php echo $error;?></p>
                    
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b" name="login">Login</button>
                <p>Don't have Account? <a href="<?php echo base_url();?>main/register">Create Account</a></p>

              <!--   <a href="<?php echo base_url();?>main/forget"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo base_url();?>main/register">Create an account</a>
            --></form>
            <p class="m-t"> <small>Vivra &copy; 2018</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Sweet alert -->
    <script src="<?php echo base_url();?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
    <?php 

    if($error == "*Either email or password is wrong")
    {
        echo '    <script>

        $(document).ready(function () {




            swal({
                title: "Login Error",
                text: "Login Credential is Wrong!",
                type: "error"
                });
                });



                </script>';
            }
            if($error == "*E-mail Already Registered Kindly Log In")
            {
                echo '    <script>

                $(document).ready(function () {




                    swal({
                        title: "E-mail Already Registered",
                        text: "Kindly Log In Your Account!",
                        type: "warning"
                        });
                        });



                        </script>';
                    }

                    if($error == "*Kindly Fill The Entries")
                    {
                        echo '    <script>

                        $(document).ready(function () {




                            swal({
                                title: "Empty Login Credential",
                                text: "*Kindly Fill The Entries",
                                type: "warning"
                                });
                                });



                                </script>';
                            }

                            if($error == "*Registered Successfully Kindly Check Your College E-mail ID")
                            {
                                echo '    <script>

                                $(document).ready(function () {




                                    swal({
                                        title: "Registered Successfully",
                                        text: "Login Credential has been send to your College E-mail ID!",
                                        type: "success"
                                        });
                                        });



                                        </script>';
                                    }
                                    if($error == "*Password send Successfully")
                                    {
                                        echo '    <script>

                                        $(document).ready(function () {




                                            swal({
                                                title: "Password Reset",
                                                text: "Login Credential has been send to your E-mail!",
                                                type: "success"
                                                });
                                                });



                                                </script>';
                                            }

                                            ?>

                                        </body>
                                        </html>
