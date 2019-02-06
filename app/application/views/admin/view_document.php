
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
                           <h2> <a href="<?php echo base_url();?>main/edit_document/<?php echo $course;?>/<?php echo $branch;?>/<?php echo $semester;?>/<?php echo $subject;?>"><i class="fa fa-arrow-left"></i>&nbsp;Back</a></h2>
                           <h5><?php echo $d_title;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar"></i>&nbsp;<?php echo $d_date;?></h5>
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

                        <h2>Description</h2>
                        <p><?php echo $d_description;?></p>
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
