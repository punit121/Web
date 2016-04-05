<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
 <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" /> 

  <body>
    <header id="header">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <a class="navbar-brand" href="<?php echo base_url('admin');?>"><img src="admin_assets/images/logo.png" alt="Zersey admin" class="img-responsive"></a>
            <button type="button" class="navbar-toggle btn-danger" data-toggle="collapse" data-target="#navbar-to-collapse">
                <span class="sr-only">Toggle right menu</span>
                <i class="icon16 i-arrow-8"></i>
            </button>          
            <div class="collapse navbar-collapse" id="navbar-to-collapse">  
              
                <ul class="nav navbar-nav pull-right">
                   
                    <li class="divider-vertical"></li>
                    <li class="dropdown user">
                         <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                            <?php $result=$this->admin_model->findMerchantImageById($this->session->userdata('user_id'));
								 $resultemp=$this->admin_model->findUserProfileImageById($this->session->userdata('user_id'));
								  ?>
								<img src="assets/images/merchant/<?php  if(!empty($result[0]['photo']))
								{ echo $result[0]['photo']; }
								elseif(!empty($resultemp[0]['photo']))
								{
								echo $resultemp[0]['photo'];
								}
							   else
							   {
							   echo 'nophoto.jpg';
							   }?>" alt="suggest">
                            <span class="more"><i class="icon16 i-arrow-down-2"></i></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                           
                            <li role="presentation"><a href="<?php echo base_url('auth/logout');?>" class=""><i class="icon16 i-exit"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li class="divider-vertical"></li>
                </ul>
            </div><!--/.nav-collapse -->
        </nav>
    </header> <!-- End #header  -->
    