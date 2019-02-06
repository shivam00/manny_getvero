<!DOCTYPE html>
<html>
<?php include 'regular/head.php';?>

<link href="<?php echo base_url();?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/plugins/jsTree/style.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/plugins/dropzone/basic.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/plugins/dropzone/dropzone.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">


<body>

    <div id="wrapper">

        <?php include 'regular/leftheader.php';?>


        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
              <?php include 'regular/topheader.php';?>
          </div>
          <div class="row wrapper border-bottom white-bg page-heading">
              <div class="col-lg-9">
                <h2>Document Manager</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url();?>main">Home</a>
                    </li>
                    <li class="active">
                        <strong>Documents</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                       <div class="ibox-content">
                         <h5>All Document</h5>
                         <div class="hr-line-dashed"></div>
                         <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">Upload Document</button>
                         <div class="hr-line-dashed"></div>
                         <div id="jstree1">
                            <ul>
                             <?php
                             foreach ($course as $cours ) {
                                 # code...
                                ?><li <?php
                                if($cours->course == $dashcourse)
                                    echo 'class="jstree-open"';
                                ?>><?php echo $cours->course;?>
                                <ul>
                                    <?php
                                    foreach ($branch as $branc ) {
                                        if ($branc->course == $cours->course ){

                                            ?><li <?php
                                            if($branc->branch == $dashbranch && $branc->course == $dashcourse )
                                                echo 'class="jstree-open"';
                                            ?> data-jstree='{"icon":"glyphicon glyphicon-tags"}'><?php echo $branc->branch;?>

                                            <ul>
                                                <?php
                                                foreach ($semester as $sem ) {
                                                    if ($branc->course == $sem->course && $branc->branch == $sem->branch ){

                                                        ?><li <?php
                                                        if($sem->semester == $dashsemester && $sem->course == $dashcourse && $sem->branch == $dashbranch)
                                                            echo 'class="jstree-open"';
                                                        ?> data-jstree='{"icon":"glyphicon glyphicon-book"}'><?php echo $sem->semester;?>
                                                        <ul>
                                                            <?php
                                                            foreach ($subject as $sub ) {
                                                                if ($sub->course == $sem->course && $sub->branch == $sem->branch && $sub->semester == $sem->semester){

                                                                    ?><li <?php
                                                                    if($sub->subject == $dashsubject)
                                                                        echo 'class="text-navy"';
                                                                    ?> data-jstree='{"icon":"glyphicon glyphicon-inbox"}'><a href="<?php echo base_url();?>main/edit_document/<?php echo $sub->course;?>/<?php echo $sub->branch;?>/<?php echo $sub->semester;?>/<?php echo $sub->subject;?>"><?php echo $sub->subject;?>

                                                                </a>
                                                            </li>
                                                            <?php }}?>

                                                        </ul>


                                                    </li>
                                                    <?php }}?>

                                                </ul>
                                            </li>
                                            <?php }}?>
                                        </ul>
                                    </li>
                                    <?php }


                                    ?>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-6 animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">

                            <?php
                            $i=0;
                            // print_r($document);
                            foreach ($document as $docu) {
    # code...

                                ?>
                                <div class="file-box">
                                    <div class="file">
                                        <?php
                                        $d_id = base64_encode($docu->sno);
                                        $d_title = base64_encode($docu->title);
                                        $d_description = base64_encode($docu->description);

                                        $d_embedded = $docu->embedded;
                                        $d_date = base64_encode($docu->date);



                                        ?>
                                        <a href="<?php echo base_url();?>main/edit_view_document/<?php echo $d_id;?>/<?php echo $d_title;?>/<?php echo $d_description;?>/<?php echo $d_date;?>/<?php echo $dashcourse;?>/<?php echo $dashbranch;?>/<?php echo $dashsemester;?>/<?php echo $dashsubject;?>">
                                            <span class="corner"></span>

                                            <div class="icon">

                                                <?php  if($docu->type == "PDF"){?>

                                                <i class="fa fa-file-pdf-o"></i>
                                                <?php }?>
                                                <?php  if($docu->type == "WORD"){?>

                                                <i class="fa fa-file-word-o"></i>
                                                <?php }?>
                                                <?php  if($docu->type == "EXCEL"){?>

                                                <i class="fa fa-file-excel-o"></i>
                                                <?php }?>
                                                <?php  if($docu->type == "PPT"){?>

                                                <i class="fa fa-file-powerpoint-o"></i>
                                                <?php }?>

                                            </div>
                                            <div class="file-name">
                                                <?php echo $docu->title;?>
                                                <br/>
                                                <small>Added: <?php echo $docu->date;?></small><br>
                                                <small><i class="fa fa-eye-slash"></i> <?php foreach ($view[$i] as $vi) {
                                                    echo $vi->view;

                                                }?></small><br>
                                                <small><i class="fa fa-user"></i> <?php foreach ($upload_user[$i] as $upload) {
                                                    echo $upload->username;

                                                }$i++;?></small><br>
                                            </div>
                                        </a>
                                    </div>

                                </div>

                                <?php }?>



                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>



    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-file-pdf-o modal-icon"></i>
                    <h4 class="modal-title">Upload Document</h4>
                    <small class="font-bold">Directory:<?php echo $dashcourse;?>/<?php echo $dashbranch;?>/<?php echo $dashsemester;?>/<?php echo $dashsubject;?></small>
                </div>
                <form class="dropzone" id="dropzoneForm" action="<?php echo base_url();?>main/document_upload">
                    <div class="fallback" >
                        <input name="userfile" type="file" multiple />
                    </div>

                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                </form>
                <form class="m-t" role="form" action="<?php echo base_url();?>main/edit_document/<?php echo $dashcourse;?>/<?php echo $dashbranch;?>/<?php echo $dashsemester;?>/<?php echo $dashsubject;?>" method = "POST" >
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" placeholder="Title" class="form-control" name="title" required="">

                            <label>Description</label>
                            <input type="text" placeholder="Description" class="form-control" name="description" required="">

                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="upload" value="10" id="upload_button">Upload Document</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url();?>assets/js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- DROPZONE -->
    <script src="<?php echo base_url();?>assets/js/plugins/dropzone/dropzone.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
    <?php

    if($io=="done")
    {
        echo '    <script>

        $(document).ready(function () {




            swal({
                title: "Successfully Uploaded",
                text: "Document Uploaded Successfully!",
                type: "success"
            });
        });



    </script>';
}
?>






<?php include "regular/chat.php";?>

<?php include "regular/script.php";?>
<script src="<?php echo base_url();?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

<script src="<?php echo base_url();?>assets/js/plugins/jsTree/jstree.min.js"></script>

<style>
    .jstree-open > .jstree-anchor > .fa-folder:before {
        content: "\f07c";
    }

    .jstree-default .jstree-icon.none {
        width: 0;
    }
</style>

<script>
   Dropzone.options.dropzoneForm = {

maxFiles: 1,
            paramName: "userfile", // The name that will be used to transfer the file
            maxFilesize: 50, // MB
            dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br>",
            acceptedFiles :"application/pdf,.ppt,.pptx,.docx,.doc,.xlsx,.xls",
            accept: function(file, done) {
   console.log("uploaded");
   done();
 },
 init: function() {
   this.on("maxfilesexceeded", function(file){
     swal({
         title: "File Not Uploaded",
         text: "You Canot upload more than one file at one time!",
         type: "Error"
     });
   });
 }
        };



        $(document).ready(function(){

            $('#jstree1').jstree({
                'core' : {
                    'check_callback' : true
                },
                'plugins' : [ 'types', 'dnd' ],
                'types' : {
                    'default' : {
                        'icon' : 'fa fa-folder'
                    }            }
                });
            $("#jstree1 li").on("click", "a",
                function() {
                    document.location.href = this;
                }
                );

        });
    </script>


    <script>
        $(document).ready(function(){
            $('.file-box').each(function() {
                animationHover(this, 'pulse');
            });
        });
    </script>
    <script>
        $(document).ready(function () {

            $(".ibox").resizable({
                helper: "ui-resizable-helper",
                grid: 20
            });

        });
    </script>


</body>

</html>
