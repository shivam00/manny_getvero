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
<a class="btn btn-primary right " href="<?php echo base_url();?>main/addcampaign" style="float:right">Create Campaign</a>
                        <h5>Campaign </h5>
                        <br>
<br>                        
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

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Campaign Id</th>
                        <th>Name </th>
                        <th>Email Subject </th>
                        <th>Email Content </th>
                        <th>Schedule </th>
                        <th>Status </th>
                        
                       
                        
                    </tr>
                    </thead>
                    <tbody>

<?php 
foreach($event as $key)
{
?>

                    <tr class="gradeC">
                        <td class="center"><?php echo $key->id;?></td>
                        <td class="center"><?php echo $key->name;?></td>
                        <td class="center"><?php echo $key->email_subject;?></td>
                        <td class="center"><?php echo $key->content;?></td>
                        <td class="center"><?php echo $key->schedule;?></td>
                        <td class="center"><?php 
                        
                        if ($key->status == 1)
                        echo "Processing";
                        else
                        echo "Completed";
                        ?></td>
                        
                        
                        
                    </tr>

            <?php
            }
            ?>      


                 
                    </tbody>
                    <tfoot>
                    <tr>
                    <th>Campaign Id</th>
                    <th>Name </th>
                    <th>Email Subject </th>
                    <th>Email Content </th>
                    <th>Schedule </th>
                    <th>Status </th>
                    
                    
                   
                   
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
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


<link href="<?php echo base_url();?>assets/js/plugins/dataTables/datatables.min.css" rel="stylesheet">



		<script src="<?php echo base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>


		<script>

			$(document).ready(function(){

				$('.dataTables-example').DataTable({

					pageLength: 25,

					responsive: true,

					dom: '<"html5buttons"B>lTfgitp',

					buttons: [

					{ extend: 'copy'},

					{extend: 'csv'},

					{extend: 'excel', title: 'Userlist'},

					{extend: 'pdf', title: 'Userlist'},



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

</body>

</html>
