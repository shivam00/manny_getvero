
<!-- Mainly scripts -->
<script src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Flot -->
<script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.spline.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/summernote/summernote.min.js"></script>
<link href="<?php echo base_url();?>assets/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
<!-- Peity -->
<script src="<?php echo base_url();?>assets/js/plugins/peity/jquery.peity.min.js"></script>
<script src="<?php echo base_url();?>assets/js/demo/peity-demo.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url();?>assets/js/inspinia.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="<?php echo base_url();?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- GITTER -->
<script src="<?php echo base_url();?>assets/js/plugins/gritter/jquery.gritter.min.js"></script>

<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="<?php echo base_url();?>assets/js/demo/sparkline-demo.js"></script>

<!-- ChartJS-->
<script src="<?php echo base_url();?>assets/js/plugins/chartJs/Chart.min.js"></script>

<!-- Toastr -->
<script src="<?php echo base_url();?>assets/js/plugins/toastr/toastr.min.js"></script>

<script src="<?php echo base_url();?>assets/js/plugins/idle-timer/idle-timer.min.js"></script>
<script>
    $(document).ready(function() {



        //  var conec=navigator.onLine;


        //  if(conec==false)
        //     {                toastr.options = {
        //         closeButton: false,
        //         progressBar: true,
        
        //         showMethod: 'slideDown',
        //         timeOut: 0,
        //         positionClass: 'toast-top'

        //     };
        //     toastr.error('connection', 'not connected');
        // }



        var count = 1;
        setInterval(function() {

            var conec=navigator.onLine;
            

            {
                if(conec==false)
                    {                toastr.options = {
                        closeButton: false,
                        progressBar: false,
                        showMethod: 'fadeIn',
                        positionClass: "toast-top-right",
                        preventDuplicates: true,
                        timeOut: '1000',

                    };
                    toastr.error('Trying to connect ....', 'No Internet Connection');
                    count = 1;
                }

                else 
                {       
                  if(count==1){    toastr.options = {
                    closeButton: false,
                    progressBar: false,
                    positionClass: "toast-top-right",
                    showMethod: 'slideDown',
                    preventDuplicates: true,
                    timeOut: '500',

                };
                toastr.success('Internet Connection', 'Connected ....');
                count--;
            }
        }


    }
}, 100);








    });


    $(document).ready(function () {

        // Set idle time
        $( document ).idleTimer( 500000 );

    });

    $( document ).on( "idle.idleTimer", function(event, elem, obj){
        toastr.options = {
            "positionClass": "toast-top-right",
            "timeOut": 8000
        }

        toastr.warning('You can go to any module of E-learning.','Idle time');
        $('.custom-alert').fadeIn();
        $('.custom-alert-active').fadeOut();

    });

    $( document ).on( "active.idleTimer", function(event, elem, obj, triggerevent){
        // function you want to fire when the user becomes active again
        toastr.clear();
        $('.custom-alert').fadeOut();
        toastr.success('Great that you decided to move on some module.','Start Learning. ');



    });



</script>