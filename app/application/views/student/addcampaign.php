<!DOCTYPE html>
<html>
<?php include 'regular/head.php';?>
<body>
    <div id="wrapper">
        <?php include 'regular/leftheader.php';?>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <?php include 'regular/topheader.php';?>
            </div>
            <div class="row  border-bottom white-bg dashboard-header">



            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create New Campaign</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">


                    <form class="m-t" role="form" action="<?php echo base_url();?>main/addcampaign" method = "POST">

                    <input type="text" class="form-control" placeholder="Campaign Name" required="" name="campaign_name" >
                   
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    <br>
                    <label class="col-sm-2 control-label">Schedule:</label>
                    <br>
                  


        
                                   <input type="datetime-local" class="form-control" value="" name="campaign_datetime">
        <br>
        <br>
            <label class="col-sm-2 control-label">To:</label>
            <br>

                           <input type="text" class="form-control" value="<?php foreach($event as $k)
                           {
                           echo $k->email;
                           echo ';';
                           }
                           ?>" name="campaign_to" readonly="readonly">
<br>
                           
                        <label class="col-sm-2 control-label">Subject:</label>
                        <br>

                            <input type="text" class="form-control" value="" name="campaign_subject">
                            <br>


                        <textarea class="summernote form-group" name="campaign_content">
                           Enter your Email.
                            <br/>

</textarea>
<br>
<br>


                <button type="submit" class="btn btn-primary block full-width m-b" name="addevent">Add Campaign</button>

            </form>

                </div>
            </div>
            </div>
        </div>




</div>
</div>

</div>


<?php include "regular/chat.php";?>


</div>

  <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>

<?php include "regular/script.php";?>
<script type="text/javascript">
    
    $(document).ready(function () {

        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                positionClass: "toast-top-right",
                timeOut: 3000
            };
            toastr.success('Vero', 'Welcome <?php echo $pdata['username']?>');

        }, 1300);

        
    });


</script>

<script>
        $(document).ready(function(){

            $('.summernote').summernote();

        });

    </script>

</body>

</html>
