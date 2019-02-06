<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> 
<!--                 
                <span>
                    <img alt="image" class="img-circle" src="<?php echo $pdata['profile'];?>" />
                </span> -->
                
                
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php  echo $pdata['username'];?></strong>
                    </span> <span class="text-muted text-xs block"><b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <?php 
if($project!=""){
foreach($project as $key)
{
    $proj_id = $this->session->userdata['projectactive'];

    if($key->project_id == $proj_id['project'])
    {
       echo ' <li><a href="'.base_url().'main/user/'.$key->project_id.'"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;'.$key->Project_name.'</a></li>
        <li class="divider"></li>';
    }
        else { echo '<li><a href="'.base_url().'main/user/'.$key->project_id.'"><i class="fa fa-bookmark"></i>&nbsp;&nbsp;'.$key->Project_name.'</a></li>
                            <li class="divider"></li>';
                    
        }
                
                    }}?>
                        <li><a href="<?php echo base_url();?>main/addproject"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Create New Project</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    V
                </div>
            </li>
             <li>
                <a href="<?php echo base_url();?>main"><i class="fa fa-user"></i> <span class="nav-label">Customers</span> </a>

            </li>
            <li>
                <a href="<?php echo base_url();?>main/event"><i class="fa fa-calendar"></i> <span class="nav-label">Event</span> </a>

            </li>
           
           <li>
                <a href="<?php echo base_url();?>main/api"><i class="fa fa-book"></i> <span class="nav-label">Api</span></a>
            </li>

            <li>
                <a href="<?php echo base_url();?>main/campaign"><i class="fa fa-video-camera"></i> <span class="nav-label">Campaign</span></a>
            </li>

           
<!--
            <li>
                <a href="<?php echo base_url();?>main/video/ADVANCED/ADVANCED/ALL/E-LEARNING"><i class="fa fa-video-camera"></i> <span class="nav-label">Video</span></a>
            </li> -->
           <!--  <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="graph_flot.html">Flot Charts</a></li>

                </ul>
            </li> -->

        </ul>

    </div>
</nav>