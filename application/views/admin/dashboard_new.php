<!DOCTYPE html>
    <div class="main">
	<?php $this->load->view('admin_layout/sidebar.php')?>
        <script src="admin_assets/js/plugins/charts/gauge/raphael.2.1.0.min.js"></script>
			<div id="gauge" style="width:200px; height:150px; display:none"></div>
             <div id="gauge1" style="width:200px; height:150px; display:none"></div>
               
        </div> <!-- End .sidebar-wrapper  -->
       <!-- </aside><!-- End #sidebar  -->


        <section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="#"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li><a href="#">Library</a></li>
                      <li class="active">Data</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1><i class="icon20 i-dashboard"></i> Dashboard</h1>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-stats"></i></div>
                                    <h4>Newsletter Statistic</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">

                                    <div class="chart" style="width: 100%; height:250px; margin-top: 10px;">
                                        
                                    </div>

                                    <div class="campaign-stats center">
                                        <div class="items">
                                            <div class="percentage" data-percent="100"><span>357</span></div>
                                            <div class="txt">Total</div>
                                        </div>
                                        <div class="items">
                                            <div class="percentage" data-percent="78"><span>78</span>%</div>
                                            <div class="txt">Opens</div>
                                        </div>
                                        <div class="items">
                                            <div class="percentage" data-percent="42"><span>42</span>%</div>
                                            <div class="txt">Clicks</div>
                                        </div>
                                        <div class="items">
                                            <div class="percentage" data-percent="17"><span>17</span>%</div>
                                            <div class="txt">Bounces</div>
                                        </div>
                                        <div class="items red">
                                            <div class="percentage-red" data-percent="2"><span>2</span>%</div>
                                            <div class="txt">Unsubscribes</div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-8  --> 
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-temperature"></i></div>
                                    <h4>Weather widget</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                                    <div class="weather">
                                        <div class="center"><div class="location"><i class="icon16 i-location"></i> Los Angeles California</div></div>
                                        <div class="center clearfix">
                                             <div class="pull-left">
                                                <div class="icon"><i class="icon64 i-sun-2 orange"></i></div>
                                                <span class="today">currently</span>
                                            </div>
                                            <div class="pull-right"><span class="degree blue">24&deg;</span></div>
                                        </div>
                                        <ul class="clearfix">
                                            <li>
                                                <span class="day">Mon</span>
                                                <span class="dayicon"><i class="icon24 i-sun orange"></i></span>
                                                <span class="max">30&deg;</span>
                                                <span class="min">16&deg;</span>
                                            </li>
                                            <li>
                                                <span class="day">Tue</span>
                                                <span class="dayicon"><i class="icon24 i-cloud-2 dark"></i></span>
                                                <span class="max">24&deg;</span>
                                                <span class="min">10&deg;</span>
                                            </li>
                                            <li>
                                                <span class="day">Wed</span>
                                                <span class="dayicon"><i class="icon24 i-weather-rain dark"></i></span>
                                                <span class="max">17&deg;</span>
                                                <span class="min">8&deg;</span>
                                            </li>
                                            <li>
                                                <span class="day">Thu</span>
                                                <span class="dayicon"><i class="icon24 i-weather-lightning red-smooth"></i></span>
                                                <span class="max">20&deg;</span>
                                                <span class="min">11&deg;</span>
                                            </li>
                                            <li>
                                                <span class="day">Fri</span>
                                                <span class="dayicon"><i class="icon24 i-weather-snow blue"></i></span>
                                                <span class="max">4&deg;</span>
                                                <span class="min">-5&deg;</span>
                                            </li>
                                            <li>
                                                <span class="day">Sat</span>
                                                <span class="dayicon"><i class="icon24 i-snowflake blue"></i></span>
                                                <span class="max">0&deg;</span>
                                                <span class="min">-10&deg;</span>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->                                                
                        </div><!-- End .col-lg-4  --> 

                    </div><!-- End .row-fluid  -->

                    <div class="row">

                        <div class="col-lg-6">

                            <div class="panel panel-default">
                                <div class="panel-heading plain">
                                    <div class="icon"><i class="icon20 i-pie-2"></i></div>
                                    <h4>Vital stats</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->

                                <div class="panel-body center">

                                    <div class="vital-stats">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <div class="item">
                                                        <div class="icon"><i class="i-calendar"></i></div>
                                                        <span class="percent">8</span>
                                                        <span class="txt">Events</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="item">
                                                        <div class="icon blue"><i class="i-basket"></i></div>
                                                        <span class="percent">12</span>
                                                        <span class="txt">Orders</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="item">
                                                        <div class="icon red"><i class="i-clipboard-4"></i></div>
                                                        <span class="percent">5</span>
                                                        <span class="txt">tasks</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="item">
                                                        <div class="icon green"><i class="i-download-2"></i></div>
                                                        <span class="percent">1134</span>
                                                        <span class="txt">Downloads</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="item">
                                                        <div class="icon yellow"><i class="i-search-3"></i></div>
                                                        <span class="percent">8</span>
                                                        <span class="txt">Searches</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="item">
                                                        <div class="icon orange"><i class="i-temperature"></i></div>
                                                        <span class="percent">27%</span>
                                                        <span class="txt">Overload</span>
                                                    </div>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                   </div><!-- End .vital-stats -->

                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->

                        </div><!-- End .col-lg-4 -->

                        <div class="col-lg-6">
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-share-2"></i></div>
                                    <h4>Social sharing</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body center">

                                    <div class="chart-pie-social" style="width: 50%; height:225px; float:left;">                               

                                    </div>

                                    <div class="social-stats">
                                        <ul>
                                            <li class="item clearfix">
                                                <div class="icon"><i class="icon32 i-facebook-4 blue"></i></div>
                                                <span class="number">765</span>
                                                <span class="txt">likes</span>
                                            </li>
                                            <li class="item clearfix">
                                                <div class="icon"><i class="icon32 i-twitter-3 blue"></i></div>
                                                <span class="number">325</span>
                                                <span class="txt">retweets</span>
                                            </li>
                                            <li class="item clearfix">
                                                <div class="icon"><i class="icon32 i-google-plus-4 red"></i></div>
                                                <span class="number">56</span>
                                                <span class="txt">share</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="clearfix"></div>
                                    
                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                            
                        </div><!-- End .col-lg-6  -->
                    </div><!-- End .row-fluid  -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel plain">
                                <div class="panel-heading">
                                    <i class="icon20 i-mail-send"></i>
                                    <h4>Overview</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body center">
                                    <div class="stats-buttons">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="#" class="clearfix">
                                                    <span class="icon green"><i class="icon24 i-file-8"></i></span>
                                                    <span class="number">1276</span>
                                                    <span class="txt">page views</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="clearfix">
                                                    <span class="icon blue"><i class="icon24 i-point-up"></i></span>
                                                    <span class="number">72</span>
                                                    <span class="txt">click-throughs</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="clearfix">
                                                    <span class="icon yellow"><i class="icon24 i-eye-2"></i></span>
                                                    <span class="number">72</span>
                                                    <span class="txt">ad impressions</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="clearfix">
                                                    <span class="icon gray"><i class="icon24 i-envelop-2"></i></span>
                                                    <span class="number">103</span>
                                                    <span class="txt">newsletter registred</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="clearfix">
                                                    <span class="icon"><i class="icon24 i-coin"></i></span>
                                                    <span class="number"><small>$</small>2,015</span>
                                                    <span class="txt">campaign value</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="clearfix">
                                                    <span class="icon green"><i class="icon24 i-user-plus"></i></span>
                                                    <span class="number">126</span>
                                                    <span class="txt">users registred</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- End .stats-buttons  -->
                                    <div class="clearfix"></div>
                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-6  -->
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-file-8"></i></div>
                                    <h4>ToDo widget</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">

                                    <div class="toDo">
                                        <h4 class="period">Today</h4>
                                        <ul class="todo-list">
                                            <li class="task-item clearfix">
                                                <span class="chbox"><input type="checkbox"></span>
                                                <span class="priority medium tip" title="Medium priority"><i class="icon12 i-circle-2"></i></span>
                                                <span class="label category"> css </span>
                                                <span class="task">
                                                    Add some shadows to buttons
                                                </span>
                                                <a href="#" class="act"><i class="icon12 i-close-2"></i></a>
                                            </li>
                                            <li class="task-item clearfix">
                                                <span class="chbox"><input type="checkbox"></span>
                                                <span class="priority high tip" title="High priority"><i class="icon12 i-circle-2"></i></span>
                                                <span class="label label-info category"> html </span>
                                                <span class="task">
                                                    Change html structure
                                                </span>
                                                <a href="#" class="act"><i class="icon12 i-close-2"></i></a>
                                            </li>
                                            <li class="task-item clearfix">
                                                <span class="chbox"><input type="checkbox"></span>
                                                <span class="priority normal tip" title="Normal priority"><i class="icon12 i-circle-2"></i></span>
                                                <span class="label label-inverse category"> javascript </span>
                                                <span class="task">
                                                    Update jquery plugin.
                                                </span>
                                                <a href="#" class="act"><i class="icon12 i-close-2"></i></a>
                                            </li>
                                        </ul>
                                        <h4 class="period">Tomorrow</h4>
                                        <ul class="todo-list">
                                             <li class="task-item clearfix">
                                                <span class="chbox"><input type="checkbox"></span>
                                                <span class="priority tip" title="Priority none"><i class="icon12 i-circle-2"></i></span>
                                                <span class="label label-important category"> php </span>
                                                <span class="task">
                                                    Create category controller
                                                </span>
                                                <a href="#" class="act"><i class="icon12 i-close-2"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-6  --> 
                    </div><!-- End .row-fluid  -->

                    <div class="row">
                        
                        <div class="col-lg-8">
                            <div class="panel plain">
                                <div class="panel-heading">
                                    <i class="icon24 i-calendar-4"></i>
                                    <h4>Calendar</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body noPadding">
                                    <div id="dashboard-calendar"></div>
                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-8  --> 

                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-cube"></i></div> 
                                    <h4>Chat layout</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body ">
                                    
                                    <div class="chat-layout">
                                        <ul>
                                            <li class="clearfix leftside">
                                                <div class="user">
                                                    <div class="avatar">
                                                         <!--<img src="https://si0.twimg.com/profile_images/3163619940/8170a820d02cdda8f34d0059fea5b381_normal.jpeg" alt="Daniel Haim">-->
                                                    </div>
                                                    <span class="ago">5 min</span>
                                                </div>
                                                <div class="message">
                                                    <span class="name">Daniel Haim</span>
                                                    <span class="txt">Hey St�phanie how are you doing?</span>
                                                </div>
                                            </li>
                                            <li class="clearfix rightside">
                                                <div class="user">
                                                    <div class="avatar">
                                                        <!--<img src="https://si0.twimg.com/profile_images/3163619940/8170a820d02cdda8f34d0059fea5b381_normal.jpeg" alt="Daniel Haim">-->
                                                    </div>
                                                    <span class="ago">3 min</span>
                                                </div>
                                                <div class="message">
                                                    <span class="name">St�phanie Walter</span>
                                                    <span class="txt">Pretty good, browsing themeforest new items.</span>
                                                </div>
                                            </li>
                                            <li class="clearfix leftside">
                                                <div class="user">
                                                    <div class="avatar">
                                                        <!--<img src="https://si0.twimg.com/profile_images/3163619940/8170a820d02cdda8f34d0059fea5b381_normal.jpeg" alt="Daniel Haim">-->
                                                    </div>
                                                    <span class="ago">just now</span>
                                                </div>
                                                <div class="message">
                                                    <span class="name">Daniel Haim</span>
                                                    <span class="txt">Did you find something cool ?</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <form class="form-horizontal pad15 pad-bottom0" role="form">
                                            <div class="form-group">
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="text" name="message" placeholder="Enter your message ...">
                                                </div> 
                                                <div class="col-lg-3">
                                                    <button class="btn btn-primary col-lg-12" type="submit">Send</button>
                                                </div>                                                    
                                                
                                            </div><!-- End .form-group  -->
                                        </form>
                                    </div>

                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-4  -->

                    </div><!-- End .row-fluid  -->

                </div> <!-- End .container-fluid  -->
            </div> <!-- End .wrapper  -->
        </section>
    </div><!-- End .main  -->