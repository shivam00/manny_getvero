
<html>
<?php include 'regular/head.php';?>
<link href="<?php echo base_url();?>assets/css/plugins/jsTree/style.min.css" rel="stylesheet">
<body>

    <div id="wrapper">

        <?php include 'regular/leftheader.php';?>


        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
              <?php include 'regular/topheader.php';?>
          </div>
          <div class="wrapper wrapper-content animated fadeIn">
            <div class="row">

                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                           <h2> <a href="<?php echo base_url();?>main/document/<?php echo $course;?>/<?php echo $branch;?>/<?php echo $semester;?>/<?php echo $subject;?>"><i class="fa fa-arrow-left"></i>&nbsp;Back</a></h2>
                           
                           <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="fullscreen-link">
                                <i class="fa fa-expand"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <iframe src="<?php echo $d_embedded[0]->embedded;?>" frameborder="none" style="width: 100%;height: 100%;"  >



                        </iframe>
                    </div>
                </div>
            </div>


            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Document Description</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong><?php echo $d_title;?></strong></h4>
                        <p><i class="fa fa-clock-o"></i> Uploaded on &nbsp;<?php echo $d_date;?></p>

                        <p>
                            <?php echo $d_description;?> </p>

                        </div>
                    </div>
                </div>


            </div>




        </div>
    </div>

    <?php include "regular/chat.php";?>
    <?php include "regular/script.php";?>

    <script>

        $(document).ready(function () {

        // Add slimscroll to element
        $('.scroll_content').slimscroll({
            height: '200px'
        })

    });

</script>

</body>
</html>
