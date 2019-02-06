<!DOCTYPE html>

<html>
<?php include 'regular/head.php';?>
<link href="<?php echo base_url();?>assets/css/plugins/jsTree/style.min.css" rel="stylesheet">

<link href="<?php echo base_url();?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
<body>
 <div id="wrapper">

    <?php include 'regular/leftheader.php';?>


    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
          <?php include 'regular/topheader.php';?>
      </div>         

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2> <a href="<?php echo base_url();?>main/edit_video/<?php echo $course;?>/<?php echo $branch;?>/<?php echo $semester;?>/<?php echo $subject;?>"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>               </h2>
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
                        <h5>Video description</h5>
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
                            <?php echo $d_description;?> 
                            <br><br>
                            <?php 
                            if($upload_user_id[0]->upload_user_id == $pdata['user_id'])
                                {?>


                            <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-file-video-o modal-icon"></i>
                                            <h4 class="modal-title">Edit Video</h4>
                                            <small class="font-bold">Directory:<?php echo $course;?>/<?php echo $branch;?>/<?php echo $semester;?>/<?php echo $subject;?></small>
                                        </div>
                                        <?php

                                        $d_id = base64_encode($d_id); 
                                        $d_title = base64_encode($d_title); 
                                        $d_description = base64_encode($d_description); 
                                        $d_date = base64_encode($d_date); 
                                        ?>
                                        <form class="m-t" role="form" action="<?php echo base_url();?>main/edit_view_video/<?php echo $d_id;?>/<?php echo $d_title;?>/<?php echo $d_description;?>/<?php echo $d_date;?>/<?php echo $course;?>/<?php echo $branch;?>/<?php echo $semester;?>/<?php echo $subject;?>" method = "POST">


                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label>Title</label> 
                                                    <input type="text" placeholder="Title" class="form-control" name="title" >

                                                    <label>Description</label> 
                                                    <input type="text" placeholder="Description" class="form-control" name="description" >

                                                    <label>YouTube Video Embedded Link</label> 
                                                    <input type="text" placeholder="YouTube Video Embedded Link" class="form-control" name="embedded" id="embedded_url">

                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="edit_upload" value="10" id="upload_button">Edit Video</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal" style="width: 20%;">Edit Video</button> 

                            <form class="m-t" role="form" action="<?php echo base_url();?>main/edit_view_video/<?php echo $d_id;?>/<?php echo $d_title;?>/<?php echo $d_description;?>/<?php echo $d_date;?>/<?php echo $course;?>/<?php echo $branch;?>/<?php echo $semester;?>/<?php echo $subject;?>" method = "POST">


                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                <button type="submit" class="btn btn-primary" name="delete" value="10" id="delete">Delete Video</button>


                            </form>
                            <?php }?>



                        </p>

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
    <script src="<?php echo base_url();?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
    <?php 

    if($io=="done")
    {
        echo '    <script>

        $(document).ready(function () {




            swal({
                title: "Successfully Edited",
                text: "Video Edited Successfully!",
                type: "success"
            });
        });



    </script>';
}
?>

</body>
</html>
