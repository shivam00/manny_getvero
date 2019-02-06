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
                        <h5>Customers</h5>
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
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Details</th>
                        
                    </tr>
                    </thead>
                    <tbody>

<?php 
foreach($customer as $key)
{
?>

                    <tr class="gradeC">
                        <td class="center"><?php echo $key->email;?></td>
                        <td class="center"><?php echo $key->first_name;?></td>
                        <td><?php echo $key->last_name;?></td>
                        <td class="center"><?php echo $key->details;?></td>
                    </tr>

            <?php
            }
            ?>      


                 
                    </tbody>
                    <tfoot>
                    <tr>
                    <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                     
                        <th>Details</th>
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
