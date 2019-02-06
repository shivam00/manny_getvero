<!DOCTYPE html>

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

          <div class="row wrapper border-bottom white-bg page-heading">
              <div class="col-lg-10">
                <h2> <a href="<?php echo base_url();?>main/video/<?php echo $course;?>/<?php echo $branch;?>/<?php echo $semester;?>/<?php echo $subject;?>"><i class="fa fa-arrow-left"></i>&nbsp;Back</a></h2>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Video </h5>
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
                            <figure>
                                <?php echo html_entity_decode($d_embedded[0]->embedded);?>
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Video Description</h5>
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

            <?php include "regular/chat.php";?>

        </div>
    </div>


    <?php include "regular/script.php";?>

    <script>
        $(document).on('webkitfullscreenchange mozfullscreenchange fullscreenchange', function (e){
            $('body').hasClass('fullscreen-video') ? $('body').removeClass('fullscreen-video') : $('body').addClass('fullscreen-video')
        });


        $(document).ready(function () {

            var $allVideos = $("iframe[src^='http://player.vimeo.com'], iframe[src^='http://www.youtube.com'], object, embed"),
            $fluidEl = $("figure");


            // jQuery .data does not work on object/embed elements
            $("iframe").removeAttr('height')
            .removeAttr('width');


            $("iframe").attr("width","480")
            .attr("height","520");



            $(window).resize(function() {
                var newWidth = $fluidEl.width();
                var newHeight = $fluidEl.height();
                $("iframe").each(function() {
                    $("iframe")
                    .width(newWidth)
                    .height(newHeight)
                    
                });
            }).resize();

            
        });
    </script>
</body>
</html>
