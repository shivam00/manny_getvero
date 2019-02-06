<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vivra</title>
    

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">


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
            <form class="m-t" role="form" action="<?php echo base_url();?>main/register" method = "POST">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="E-mail" required="" name="email" >
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="User Name" required="" name="username">


                    
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password">

                    
                    <p style="color: <?php echo $color;?>"><?php echo $error;?></p>
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b" name="register">Register</button>

                
                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo base_url();?>">Log In Your Account</a>
            </form>
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

    

    if($error == "*Kindly Enter Your College E-mail Id")
    {
        echo '    <script>

        $(document).ready(function () {




            swal({
                title: "Wrong E-mail",
                text: "Kindly Enter Your College E-mail Id!",
                type: "error"
            });
        });



    </script>';
}
if($error == "*Kindly Register First (E-mail Not Registered)")
{
    echo '    <script>

    $(document).ready(function () {




        swal({
            title: "E-mail Not Registered",
            text: "Kindly Register First!",
            type: "error"
        });
    });



</script>';
}

?>


</body>
</html>
