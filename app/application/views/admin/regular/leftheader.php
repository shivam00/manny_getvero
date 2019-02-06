<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="<?php echo $pdata['profile'];?>" />
                </span>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php  echo $pdata['username'];?></strong>
                    </span> <span class="text-muted text-xs block"><?php echo $pdata['rank'];?> <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>main/logout">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    II
                </div>
            </li>
            <li>
                <a href="<?php echo base_url();?>main"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span> </a>

            </li>
            <li>
                <a href="<?php echo base_url();?>main/edit_courses"><i class="fa fa-tag"></i> <span class="nav-label">Edit Courses</span></a>            </li>
                <li>
                    <a href="<?php echo base_url();?>main/edit_document/ADVANCED/ADVANCED/ALL/E-LEARNING"><i class="fa fa-book"></i> <span class="nav-label">Upload Document</span></a>
                </li>

                <li>
                    <a href="<?php echo base_url();?>main/edit_video/ADVANCED/ADVANCED/ALL/E-LEARNING"><i class="fa fa-video-camera"></i> <span class="nav-label">Upload Video</span></a>
                </li>


            </ul>

        </div>
    </nav>