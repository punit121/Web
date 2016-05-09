<body>
    <style>

        .bottom_stip_div_about
        {
            cursor: pointer;
        }
        .btn-default1 {
            color: #333;
            background-color: transparent;
            border-color: transparent;
            outline:none;
        }
        .btn-default1:hover {
            color: #333;
            background-color: transparent;
            border-color: transparent;
            outline:none;
        }

    </style>
    <script>
        var last_post_time = null;
        var loading_posts = false;
        var feeds_ended = false;
        // i have two options wait until custom feed input is over
        // or I can directly call

        if (typeof custom_feed_ready === 'undefined') {
            // here just call the function to fetch datat and
            // parse it on to screen
            //unix timestamp in seconds
            var currentTime = new Date().getTime() / 1000 | 0;
            console.log('currentTime :', currentTime);
            fetch_posts(currentTime, 'older', '24', function (done) {});
        }

        /**
         * Fetches posts through ajax
         * @param {type} last_date
         * @param {type} limit
         * @returns {undefined}
         */
        function fetch_posts(last_date, stat, limit, callback) {
            //ajax call
            $.ajax({
                type: "get",
                data: {'last_date': last_date, 'limit': limit, 'userid': '<?php echo $user_id->id; ?>'},
                url: "<?= base_url() ?>user_feeds/" + stat,
                success: function (msg) {
                    var data = JSON.parse(msg);
                    if (!data['feeds'] && stat === 'older') {
                        feeds_ended = true;
                    } else {
                        //forEach post
                        data['feeds'].forEach(function (feed) {
                            //console.log('username :', feed['username']);
                            var layout = createGridLayout(feed);
                            $("#dashboard_image_div").append(layout);
                            $('[data-toggle="tooltip"]').tooltip()
                        });
                        //to know the last post further fetch
                        last_post_time = data['feeds'][data['feeds'].length - 1]['publishedOn'];
                        //console.log('last_post_time', last_post_time);
                    }
                    //alert(msg);
                    //alert(last_post_id);
                    //$(".grid").hide();
                    loadingposts = false;
                    callback('success');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    loadingposts = false;
                    callback('error');
                }

            });
        }

        function approxDateDiff(mysqlDate) {
            // Split timestamp into [ Y, M, D, h, m, s ]
            var t = mysqlDate.split(/[- :]/);
            // Apply each element to the Date function
            var startDate = new Date(t[0], t[1] - 1, t[2], t[3], t[4], t[5]);
            var now = new Date();
            var difference = (now.getTime() - startDate.getTime()) / 1000 | 0;

            if ((difference / (60 * 60 * 24 * 365) | 0)) {
                var years = Math.round(difference / (60 * 60 * 24 * 365));
                return  years == 1 ? years + ' Year' : years + ' Years';
            }
            if ((difference / (60 * 60 * 24 * 30) | 0)) {
                var months = Math.round(difference / (60 * 60 * 24 * 30));
                return  months + (months == 1 ? ' Month' : ' Months');
            }
            if ((difference / (60 * 60 * 24) | 0)) {
                var days = Math.round(difference / (60 * 60 * 24));
                return  days + (days == 1 ? ' Day' : ' Days');
            }
            if ((difference / (60 * 60) | 0)) {
                var hours = Math.round(difference / (60 * 60));
                return  hours + (hours == 1 ? ' Hour' : ' Hours');
            }
            if ((difference / (60) | 0)) {
                var minutes = Math.round(difference / (60));
                return  minutes + (minutes == 1 ? ' Minute' : ' Minutes');
            }
            if (difference) {
                var seconds = difference;
                return  seconds + (seconds == 1 ? ' sec' : ' secs');
            }


        }

        /**
         *  function to create grid element
         * @param {type} pt
         * @param {type} user
         * @returns {undefined}     */
        function createGridLayout(feed) {
            var pte = feed['editorial'];
            var hed = feed['head'].split(' ').join('-');
            hed = hed.replace(/[^0-9a-zA-Z-]/g, '');
            var fhed = hed.substring(0, 50);
            if (fhed === '') {
                //removing white spaces
                fhed = feed['username'];
            }
            // check codes below just copying them word to word
            var post_icon = 'description';
            var post_icon_type = "Editorial";
            var linkToPost = '#';
            if (pte == 1) {
                linkToPost = '<?= base_url() ?>postvieweditorial/' + fhed + '/' + feed['id'];
            } else if (pte == 2) {
                linkToPost = '<?= base_url() ?>postviewvideo/' + fhed + '/' + feed['id'];
                post_icon = 'video_library';
                post_icon_type = "Videos";
            } else {
                linkToPost = '<?= base_url() ?>postview/' + fhed + '/' + feed['id'];
                post_icon = 'photo_album';
                post_icon_type = "Photo Story";
            }
            // image of the post
            var imgLink = 'http://m.zersey.com/assets/zerseynme/' + feed['image'];
            var card_tag = feed['maincat'];
            var duration = approxDateDiff(feed['publishedOn']);
            //echo strtotime("22-03-2015 20:08:16");
            var categoryPage = '<?= base_url() ?>category/' + feed['maincat'];
            //now user data
            var proimg = feed['photo'] ? (feed['photo'].match(/http/) ? feed['photo'] : '<?= base_url() ?>assets/images/merchant/' + feed['photo']) : 'http://zersey.com/assets/images/merchant/usericon.jpg';
            var fullname = feed['fullname'] || 'Admin';
            var user_profile = '<?= base_url() ?>userprofile/' + feed['username'];
            //layout
            //initializing variables
            var mediaContent = '';
            var videoLink = '';
            ///not video
            if (pte != 2) {
                mediaContent = '<img src="' + imgLink + '" realsrc="' + imgLink + '" class="img-responsive">';
            } else {

                //video
                //spliting to parseUrl also can use parse Url functions
                var domain = feed['image'].split('.')[1];
                //checking if its youtube
                if (domain === 'youtube') {
                    //getting count of matches
                    var videoCount = (feed['image'].match(/watch\/?v=/g) || []).length;
                    //based on clunt creating videoLinks
                    videoLink = (videoCount > 0) ? feed['image'].replace("watch/?v=", "embed/") : feed['image'].replace("watch?v=", "embed/");
                } else {
                    videoLink = feed['image'] + "/embed/simple";
                }
                //assiging the value to mediaContent
                mediaContent = '<iframe src="' + videoLink + '" class="img-responsive" frameborder="0" allowfullscreen>'
                        + '</iframe>';
            }
            //layout
            var grid_layout = '<div class="col-md-4 col-sm-4">'
                    + '<div class="grid " >'
                    + '<a href="' + categoryPage + '" class="card-tag">'
                    + '<span>' + feed["maincat"]
                    + '</span>'
                    + '<span class="pull-right" style="padding:0px 5px !important"><i class="icon-calendar"></i>' + duration + '</span>'
                    + '</a>'
                    + '<a href="' + linkToPost + '" style="text-decoration:none">'
                    + '<div class="rectangle-2-3">'
                    + '<div class="imgholder rectangle-content">'
                    + mediaContent

                    + '</div>'
                    + '</div>'
                    + '<div class="content">'
                    + '<div class="like-comment-date">'
                    + '<ul class="meta">'
                    + '</ul>'
                    + '<h5  class="truncate lines-2">' + feed["head"] + ' </h5>'
                    + '</div>'
                    + '</div>'
                    + '</a>'
                    + '<div class=" metabtm meta"><a href="' + linkToPost + '" style="text-decoration:none">'
                    + '</a><a href="' + user_profile + '">'
                    + '<img src="' + proimg + '" style="width:30px;height:30px; border-radius: 50%;display: inline-block;"></a>'
                    + '<p style="display:inline-block; padding:5px"><a href="' + user_profile + '">' + fullname
                    + '</a></p>'
                    + '<span class="pull-right"><i class="material-icons" data-toggle="tooltip" data-placement="left" title="' + post_icon_type + '">' + post_icon + '</i></span>'
                    + '</div>'
                    + '</div>';
            +'</div>'
            return grid_layout;

        }

        //length of description
        // images to represent type

        //on scroll load posts if you are not already loading posts
        $(window).scroll(function () {
            //reached end of the page
            if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                //alert("hello");
                //alert(last_post_id);

                if (last_post_time) {
                    // Split timestamp into [ Y, M, D, h, m, s ]
                    var t = last_post_time.split(/[- :]/);
                    // Apply each element to the Date function
                    //12 hour change
                    var now = (new Date(t[0], t[1] - 1, t[2], t[3], t[4], t[5]).getTime() / 1000 | 0);
                    console.log('last_post_time', now);
                }

                if (feeds_ended)
                    return;
                if (loadingposts)
                    return;
                loadingposts = true;
                //alert(25 * i);
                fetch_posts(now, 'older', '6', function (done) {});
            }
        });
    </script>

    <script>
        function overview()
        {
            $(".first_div").show();
            $(".socialprofile").hide();
            $(".setting").hide();
            $(".profile").hide();
            $(".interest").hide();
            $('#over').css('font-weight', 'bold');
            $('#set').css('font-weight', 'inherit');
            $('#acc').css('font-weight', 'inherit');
            $('#int').css('font-weight', 'inherit');
            return false;
        }
        function social()
        {
            $(".first_div").hide();
            $(".socialprofile").show();
            $(".setting").hide();
            $(".profile").hide();
            $(".interest").hide();
            return false;
        }
        function setting()
        {
            $(".first_div").hide();
            $(".socialprofile").hide();
            $(".setting").show();
            $(".profile").hide();
            $(".interest").hide();
            $('#set').css('font-weight', 'bold');
            $('#int').css('font-weight', 'inherit');
            $('#over').css('font-weight', 'inherit');
            $('#acc').css('font-weight', 'inherit');

            return false;
        }
        function account()
        {
            $('#over').css('font-weight', 'inherit');
            $('#set').css('font-weight', 'inherit');
            $('#int').css('font-weight', 'inherit');
            $('#acc').css('font-weight', 'bold');
            $(".first_div").hide();
            $(".socialprofile").hide();
            $(".setting").hide();
            $(".profile").show();
            $(".interest").hide();
            return false;
        }
        function intrest()
        {
            $(".first_div").hide();
            $(".socialprofile").hide();
            $(".setting").hide();
            $(".profile").hide();
            $(".interest").show();
            $('#int').css('font-weight', 'bold');
            $('#set').css('font-weight', 'inherit');
            $('#acc').css('font-weight', 'inherit');
            $('#over').css('font-weight', 'inherit');
            return false;
        }
    </script>

    <?php
    $user = $this->usermodel->where_data('customer', array('userId' => $user_id->id));
    $user_id = $user[0]->userId;
    $us_id = $this->session->userdata('user_id');
    if ($user_id == $us_id) {
        $cust = $this->usermodel->findCustomerById($user_id);
        echo $cust['0']['location'];
    }
    $unm = $this->datamodel->getusernamebyid($user[0]->userId);
//print_r($unm->username);
    ?>
    <div class="row" >
        <!-----middle part-------->
        <div class="col-lg-12 col-md-12 col-sm-12" style="padding:5px;background:url(<?php
        if ($user[0]->covimg) {
            ?> ' <?= base_url() ?>assets/images/merchant/<?= $user[0]->covimg ?>'
             <?php } else { ?>
                 '<?= base_url() ?>assets/images/merchant/d_Cover.jpg'
             <?php } ?>
             ); margin-top:-8px; background-size:cover" >
            <!---- model popup for image -->

            <div style="width:100%;height:450px;">

                <div style="display:inline-block;width:60%;">
                    <div  style="z-index:50;margin-top:100px;margin-left:50px;">
                        <img src="<?php
                        if (isset($user[0]->photo)) {
                            echo base_url();
                            ?>assets/images/merchant/<?php
                                 echo $user[0]->photo;
                             } else {
                                 echo base_url() . 'assets/images/merchant/usericon.jpg';
                             }
                             ?>" class="facebook_div" data-toggle="modal" data-target="#myuserprofile">


                        <h3 class="facebook_user_name"><?php echo $user[0]->fullname; ?></h3>

                    </div>
                    <?php
                    //$id=$this->session->userdata('user_id');
                    //$catnm=$this->uri->segment(2);
                    //						  $uid=$user_id->id;
                    //echo $id."<br>";
                    //echo $user_id."<br>";
                    //echo $user_id;
                    //$uid=$user_id->id;
                    if ($user_id == $us_id) {
                        ?>
                        <button class="btn btn-default"style="display:inline-block;margin-top:5px;margin-left:80px;"  data-toggle="modal" data-target="#myModal"><i class="fa fa-camera-retro"></i> Edit Image</button>
                        <button class="btn btn-default1" style="display:inline-block;margin-top:5px;margin-left:80px;"data-toggle="modal" data-target="#myModal1"><i class="fa fa-camera" aria-hidden="true" style="font-size: 40px;color: #fff;    position: relative;bottom: 260px;right: 220px;"></i> </button>

                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <form action="<?= base_url(); ?>users/uploaduserimg" method="post" enctype="multipart/form-data">
                                    <!-- Modal content-->
                                    <div class="modal-content" style="padding: 0 0 1px 16px;line-height: 32px;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" style="color:#000">Upload Your Profile & Covor Photo</h4>
                                        </div>
                                        <div class="modal-body">
                                            <label style="color:#000">Profile pic</label>
                                            <input type="file" name="prophoto" id="prophoto" style="color:#000" value="Upload Photo" /></i>Upload your pic</br>
                                            <!--
                                               <label style="color:#000">cover pic</label>
                                               <input type="file" name="covphoto" id="covphoto" value="Upload Photo" style="color:#000" /></i>Upload cover pic<br>
                                            -->
                                            <input type="hidden" name="catidm" id="catidm" value="<?= $id ?>" />
                                            <input type="hidden" name="catman" id="catman" value="<?= $catnm ?>" />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-sucess" value="Submit"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <?php /** added by sadhna * */ ?>
                        <div class="modal fade" id="myModal1" role="dialog">
                            <div class="modal-dialog">
                                <form action="<?= base_url(); ?>users/uploaduserimg" method="post" enctype="multipart/form-data">

                                    <div class="modal-content" style="padding: 0 0 1px 16px;line-height: 32px;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" style="color:#000">Upload Covor Photo</h4>
                                        </div>
                                        <!--
                                        <div class="modal-body">
                                        <label style="color:#000">Profile pic</label>
               <input type="file" name="prophoto" id="prophoto" style="color:#000" value="Upload Photo" /></i>Upload your pic</br>

                                        -->
                                        <label style="color:#000">cover pic</label>
                                        <input type="file" name="covphoto" id="covphoto" value="Upload Photo" style="color:#000" /></i>Upload cover pic<br>
                                        <input type="hidden" name="catidm" id="catidm" value="<?= $id ?>" />
                                        <input type="hidden" name="catman" id="catman" value="<?= $catnm ?>" />

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-sucess" value="Submit"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php /*                         * ---------------------------------------end added by sadhna----------------* */ ?>

                        <?php
                    } else {

                    }
                    ?>

                </div>

                <div class="side_post_div">

                    <div  class="side_inner_pst_div">
                        <?php
                        if ($us_id !== $user_id) {

                            // i don't like doing this this is hot fix and  i hate doing hot fixes
                            //but since i have other things to take cae of i am calling
                            //model right here , if you come accross this mess
                            // please take this into the users controller ,and pass it as context
                            //so that the code is clean
                            $followed = $this->usermodel->where_data('follow_user', array('usid' => $user_id, 'userid' => $us_id));
                            ?>
                            <div style="text-align:right;margin-top:5px;">
                                <?php if ($followed) { ?>
                                    <button type="button" class="btn btn-default" data-uid="<?= $user_id ?>" onclick="follow_user($(this))">Unfollow</button>
                                <?php } else { ?>
                                    <button type="button"  class="btn btn-default" data-uid="<?= $user_id ?>" onclick="follow_user($(this))">Follow</button>
                                <?php } ?>
                            </div>
                        <?php }
                        ?>

                    </div>
                </div>
            </div>
            <div data-toggle="modal" data-target="#mycoverprofile">

            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12" style="background:#FFFFFF;border:solid 1px;">
            <div class="col-lg-4 col-md-4 col-sm-4" style="width:20%;">
                <?php
                $id = $this->session->userdata('user_id');

                $uid = $user_id->id;
                if ($id == $uid) {
                    ?>
                    <center><h3 class="bottom_stip_div_about" data-toggle="modal" data-target="#myModal1" style="cursor:pointer; padding-top: 15px">About </h3></center>
                    <p style="color:#777;margin: 0 0 0px;"><?php echo substr($user[0]->yourself, 0, 50); ?></p>
                    <?php
                } else {
                    ?>
                    <center><h3 class="bottom_stip_div_about" data-toggle="modal" data-target="#myModal2">About </h3></center>
                    <p style="color:#777;margin: 0 0 0px;"><?php echo substr($user[0]->yourself, 0, 50); ?></p>
                    <?php
                }
                ?>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 onhover_div" style="border-left: solid 1px;width:20%;">
                <div class="bottom_stip_post"><h4 class="bottom_stip_post_following" style="padding-top: 5px;">Post </br>
                        <?php
                        /* $post=$this->db->query("SELECT * FROM fbblogmain WHERE userid='1909' ");
                          $result=$post->num_rows();
                          echo $result; */
                        $likecnt = ($this->usermodel->countlikecomment('fbblogmain', array('userid' => $user['0']->userId)));
                        //print_r($user['0']->userId);
                        //echo $cntpost1;
                       // $likecnt_null = ($this->usermodel->countlikecomment('fbblogmain', array('userid' => $user['0']->userId,'published_id' => 'NULL')));
                       // $likecnt=$likecnt-$likecnt_null;

                        if ($likecnt >= 1000 && $likecnt < 1000000) {
                            $cnlikecnt = number_format($likecnt / 1000, 2) . 'K';
                            echo $cnlikecnt;
                        } else if ($likecnt >= 1000000 && $likecnt < 1000000000) {
                            $cnlikecnt = number_format($likecnt / 1000000, 2) . 'M';
                            echo $cnlikecnt;
                        } else if ($num >= 1000000000) {
                            $cnlikecnt = number_format($likecnt / 1000000000, 2) . 'B';
                            echo $cnlikecnt;
                        } else {
                            $cnlikecnt = $likecnt;
                            echo $cnlikecnt;
                        }
                        ?>
                    </h4>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 onhover_div" style="border-left: solid 1px;width:20%;">
                <div class="bottom_stip_post"><h4 class="bottom_stip_post_following" style="padding-top: 5px;">Following </br> <?= $cntfollowing ?></h4></div>
            </div>


            <div class="col-lg-2 col-md-2 col-sm-2 onhover_div" style="border-left: solid 1px;width:20%;" id="normal">
                    <!--<a href="<?= base_url(); ?>friends/<?= $unm->username ?>"> </a>--><div class="bottom_stip_post"><h4 class="bottom_stip_post_following" style="padding-top: 5px;">Followers </br> <?= $cntpost1 ?></h4></div>
            </div>

            <div class="col-lg-2 col-md-2 col-sm-2 onhover_div" style="border-left: solid 1px;">
                <div style="height:65px;padding-top: 20px;">
                    <!--<a class="dropdown-toggle" href="#" data-toggle="dropdown" style="color:#777; font-size:20px">
                    + More
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu" style="background-color: rgba(10, 10, 10, 0.71);">
                      <li><a href="#" class="dropdown_nev">View Profile</a></li>
                      <li><a href="#" class="dropdown_nev">Edit Profile</a></li>
                      <li><a href="#" class="dropdown_nev">Settings</a></li>
                      <li><a href="#" class="dropdown_nev">Login</a></li>
                    </ul> -->
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <!-- this is where all of it goes -->
        <div class="col-lg-10 col-md-10 col-sm-10" style="padding:5px;margin-top:5px;" id="dashboard_image_div">
            <!--stories-->
        </div>
        <!--side panel-->
        <div class="col-lg-2 col-md-2 col-sm-2">
            <div class="col-lg-12 col-md-12 col-sm-12 follow_div" id="board_show" style="margin-top:15px; padding:0px;">

                <div class="panel-heading" style="background: #555;color: #fff;"><h3 class="panel-title" style="display:inline-block">Public Board</h3>

                </div>


                <?php
                $resultuserl = $this->usermodel->where_data('user_board', array('userid' => $user['0']->userId,'private' => 0));
               //                 echo $user['0']->userId;
                //print_r($resultuser1);
                //$resultuser1=rsort($resultuser1);
                //print_r($resultuser1);
               //echo count($resultuser1);
                $i=0;
                if ($resultuserl) {
                    foreach ($resultuserl as $rtsul) {
                        $i++;
                        if($i==6)
                        {
                         ?>
                         <div class="col-sm-12 text-left"><a href="<?=base_url()?>allboard/<?=$user['0']->userId?>">More...</a></div>

                         <?php 
                         break;  
                        }
                        $blid = $rtsul->bid;
                        $usid = $this->session->userdata['user_id'];
                        $pro2 = $this->datamodel->selectboardfollow($blid, $usid);


                        $foloid = $pro2[0]['fbid'];
                        ?>

                        <form method="post" action="<?= base_url() ?>users/boardfollow">
                            <input type="hidden" id="bid" name="bid" value="<?= $rtsul->bid ?>"/>


                            <div class="col-md-12" style="padding:5px; margin-top:10px">
                                <div class="col-sm-3" style="padding:0px;">
                                    <a href="<?= base_url() ?>board/<?= $rtsul->bordname ?>">
                                        <img src="
                                        <?php
                                        if ($rtsul->image) {
                                            ?><?= base_url() ?>assert/catimg/<?= $rtsul->image ?>
                                             <?php } else { ?>
                                                 <?= base_url() ?>assert/catimg/d_Icon.png
                                             <?php } ?>
                                             " class="follow" style="width:100%;">
                                    </a>
                                </div>
                                <div class="col-sm-9" style="margin-top: -8px;">
                                    <a href="<?= base_url() ?>board/<?= $rtsul->bordname ?>">
                                        <div class="col-sm-12 " style="padding:3px;text-align:center; font-size:14px"><?= ucfirst($rtsul->bordname) ?></div></a>
                                    <?php
                                    if ($user_id != $us_id) {
                                    if ($pro2 == "0") {
                                        ?>


                                        <div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center">
                                            <button type="submit" class="btn btn-follow">Follow</button></div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center" > <a href="<?= base_url() ?>users/deletebfollow/<?= $pro2[0]['fbid'] ?>"  class="btn btn-follow">Followed</a></div>
                                    <?php } }?>
                                </div>
                            </div>
                        </form>

                        <?php

                    }
                }
                ?>
            </div>
            <?php  /*if ($user_id == $us_id) { ?>
            <div class="col-lg-12 col-md-12 col-sm-12 follow_div" id="board_show" style="margin-top:15px; padding:0px;">

                <div class="panel-heading" style="background: #555;color: #fff;"><h3 class="panel-title" style="display:inline-block">Private Board</h3>

                </div>


                <?php
                $resultuserl = $this->usermodel->where_data('user_board', array('userid' => $user['0']->userId,'private' => 1));

                //echo $user['0']->userId;
                if ($resultuserl) {
                    foreach ($resultuserl as $rtsul) {

                        $blid = $rtsul->bid;
                        $usid = $this->session->userdata['user_id'];
                        $pro2 = $this->datamodel->selectboardfollow($blid, $usid);


                        $foloid = $pro2[0]['fbid'];
                        ?>

                        <form method="post" action="<?= base_url() ?>users/boardfollow">
                            <input type="hidden" id="bid" name="bid" value="<?= $rtsul->bid ?>"/>


                            <div class="col-md-12" style="padding:5px; margin-top:10px">
                                <div class="col-sm-3" style="padding:0px;">
                                    <a href="<?= base_url() ?>board/<?= $rtsul->bordname ?>">
                                        <img src="
                                        <?php
                                        if ($rtsul->image) {
                                            ?><?= base_url() ?>assert/catimg/<?= $rtsul->image ?>
                                             <?php } else { ?>
                                                 <?= base_url() ?>assert/catimg/d_Icon.png
                                             <?php } ?>
                                             " class="follow" style="width:100%;">
                                    </a>
                                </div>
                                <div class="col-sm-9" style="margin-top: -8px;">
                                    <a href="<?= base_url() ?>board/<?= $rtsul->bordname ?>">
                                        <div class="col-sm-12 " style="padding:3px;text-align:center; font-size:14px"><?= ucfirst($rtsul->bordname) ?></div></a>
                                    <?php
                                    /*if ($pro2 == "0") {
                                        ?>


                                        <div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center">
                                            <button type="submit" class="btn btn-follow">Follow</button></div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center" > <a href="<?= base_url() ?>users/deletebfollow/<?= $pro2[0]['fbid'] ?>"  class="btn btn-follow">Followed</a></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </form>

                        <?php
                    }
                }
                ?>
            </div>
            <?php } ?>

            <?php  if ($user_id == $us_id) { ?>
            <div class="col-lg-12 col-md-12 col-sm-12 follow_div" id="board_show" style="margin-top:15px; padding:0px;">

                <div class="panel-heading" style="background: #555;color: #fff;"><h3 class="panel-title" style="display:inline-block">Group Board</h3>

                </div>


                <?php
                 $user=$this->usermodel->where_data('users',array('id'=>$us_id));

                $resultuser = $this->usermodel->where_data('board_invites', array('email' => $user['0']->email,'status' => 1));
                //echo count($resultuser);
                for($i=0;$i<count($resultuser);$i++)
                {
                $boardid=$resultuser[$i]->boardid;
                $resultuserl = $this->usermodel->where_data('user_board', array('bid'=>$boardid));     
                
               
                
                //echo $user['0']->userId;
                if ($resultuserl) {
                    foreach ($resultuserl as $rtsul) {

                        $blid = $rtsul->bid;
                        $usid = $this->session->userdata['user_id'];
                        $pro2 = $this->datamodel->selectboardfollow($blid, $usid);


                        $foloid = $pro2[0]['fbid'];
                        ?>

                        <form method="post" action="<?= base_url() ?>users/boardfollow">
                            <input type="hidden" id="bid" name="bid" value="<?= $rtsul->bid ?>"/>


                            <div class="col-md-12" style="padding:5px; margin-top:10px">
                                <div class="col-sm-3" style="padding:0px;">
                                    <a href="<?= base_url() ?>board/<?= $rtsul->bordname ?>">
                                        <img src="
                                        <?php
                                        if ($rtsul->image) {
                                            ?><?= base_url() ?>assert/catimg/<?= $rtsul->image ?>
                                             <?php } else { ?>
                                                 <?= base_url() ?>assert/catimg/d_Icon.png
                                             <?php } ?>
                                             " class="follow" style="width:100%;">
                                    </a>
                                </div>
                                <div class="col-sm-9" style="margin-top: -8px;">
                                    <a href="<?= base_url() ?>board/<?= $rtsul->bordname ?>">
                                        <div class="col-sm-12 " style="padding:3px;text-align:center; font-size:14px"><?= ucfirst($rtsul->bordname) ?></div></a>
                                    <?php
                                    /*if ($pro2 == "0") {
                                        ?>


                                        <div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center">
                                            <button type="submit" class="btn btn-follow">Follow</button></div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center" > <a href="<?= base_url() ?>users/deletebfollow/<?= $pro2[0]['fbid'] ?>"  class="btn btn-follow">Followed</a></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </form>

                        <?php
                    }
                }
            }
                ?>
            </div>
            <?php } */?>
            <div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="margin-top:15px; padding:0px">
                <?php
                //can optionally pass a variable
                //for limiting number
                //ctrl is controller
                $ctrl->show_users_not_followed();
                ?>
            </div>

        </div>
    </div>

    <?php $user = $this->usermodel->where_data('customer', array('userId' => $user_id->id)); ?>
    <!--<div class="modal fade" id="myModal3" role="dialog">
                            <div class="modal-dialog">

                               Modal content-->
    <!--<div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Upload Your Cover Photo</h4>
          </div>
          <div class="modal-body">

    <label class="myLabel"> <span class="btn fileinput-button">
    <span><i class="fa fa-camera fa-primary"> <input type="file" name="photo" id="photo" value="Upload Photo" /></i>Upload your Cover Picture</span></span></label>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
    </div>

    </div>
    </div>-->

    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-header" style="background: rgba(128, 128, 128, 0.28);">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding:0px">
                            <img src="<?= base_url() ?>assert/images/user.png" style="width:25px;">
                            <a href="" style="color: #000;font-size: 17px;vertical-align: bottom;font-weight: bold;">About</a>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2">

                            <ul style="list-style:none;padding-left:0px;">
                                <li><a  onclick="overview();" id='over' style="font-weight:bold;">Overview</a></li>
                                <li  id="intrest" ><a href="#" onclick="intrest();" id='int'>Interest</a></li>
                                <!--<li style="font-size: 18px;font-weight: bold;margin-top:10px;"><a href="#" onclick="setting();">Settings</a></li>-->
                                <?php if ($us_id == $user_id) {
                                    ?>
                                    <li><a href="#" onclick="account();" id='acc'>Account</a></li>
                                    <li><a href="#" onclick="setting();" id='set'>Settings</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10" style="border-left: solid 1px rgba(212, 203, 203, 0.42);padding:5px;">

                            <div class="first_div">
                                <form method="post" action="">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="usr">Gender</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <?php
                                            if ($us_id == $user_id) {
                                                ?>
                                                <select name="gender" id="gender">
                                                    <?php
                                                    if ($cust['0']['gender'] == 'M') {
                                                        ?>
                                                        <option value="0"> Select </option>
                                                        <option value="M" selected> Male </option>
                                                        <option value="F"> Female </option>
                                                        <?php
                                                    } else if ($cust['0']['gender'] == 'F') {
                                                        ?>
                                                        <option value="0"> Select </option>
                                                        <option value="M"> Male </option>
                                                        <option value="F" selected> Female </option>
                                                        <?php
                                                    } else {
                                                        ?>

                                                        <option value="0"> Select </option>
                                                        <option value="M"> Male </option>
                                                        <option value="F"> Female </option>
                                                        <?php
                                                    }
                                                    ?>

                                                </select>
                                                <?php
                                            } else {

                                                echo $custom['0']['gender'];
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="usr">Date of birth</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <?php
                                            if ($user_id == $us_id) {
                                                ?>
                                                <input data-format="dd/MM/yyyy hh:mm:ss" id="datepicker" class="form-control" class="ui-widget-header" type="date" name="datepicker" value="<?php echo $cust['0']['DOB']; ?>"></input>
                                                <?php
                                            } else {
                                                echo $custom['0']['DOB'];
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="usr">Location</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <?php
                                            if ($user_id == $us_id) {
                                                ?>

                                                <input type="text" class="form-control" id="loc" name="loc" value="<?php echo $cust['0']['location']; ?>">
                                                <?php
                                                //echo $user[0]->location;
                                            } else {
                                                echo $custom['0']['location'];
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="usr">Employment</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <?php
                                            if ($user_id == $us_id) {
                                                ?>

                                                <input type="text" class="form-control" id="emp" name="emp" value="<?php echo $cust['0']['employment']; ?>">
                                                <?php
                                            } else {
                                                echo $custom['0']['employment'];
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px;">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="usr">Mobile number</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <?php
                                            if ($user_id == $us_id) {
                                                ?>

                                                <input type="text" class="form-control" id="mbno" name="mbno" maxlength="10" value="<?php echo $cust['0']['mobile']; ?>">
                                                <?php
                                            } else {
                                                echo $custom['0']['mobile'];
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="usr">Brief B/o</label>
                                        </div>
                                        <?php
                                        if ($user_id == $us_id) {
                                            ?>

                                            <textarea class="form-control" id="brief" name="brief"> <?php echo $cust['0']['yourself']; ?> </textarea>
                                            <?php
                                        } else {
                                            echo $custom['0']['yourself'];
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if ($us_id == $user_id) {
                                        ?>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <input type="submit" class="btn btn-default" value="Update" name="update" />
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </form>
                            </div>

                            <div class="interest" style="display:none">
                                <div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="margin-top:15px; padding:0px; padding-bottom:10px;">
                                    <form method="post" action="<?= base_url() ?>users/categoryfollowByName">
                                        <div>
                                            <style>
                                                ul.ui-autocomplete {z-index: 1100;}
                                            </style>
                                            <div class="text-center">
                                                <p style="font-size:18px;font-weight:bold">Interests</p>
                                            </div>
                                            <?php
                                            $result = $this->usermodel->getInterestsById($this->session->userdata['user_id']);
                                            if ($result) {
                                                foreach ($result as $rts) {
                                                    ?>
                                                    <div id="interests" style="background: #6BB7EF;padding: 5px;display: inline-block;margin-bottom: 5px;border-radius: px;color: #000;border: 1px solid;"><?= $rts['cat_name'] ?></div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php if ($user_id == $us_id) { ?>
                                                <div class="form-group" style="padding-top: 10px;">
                                                    <input type="text" name="realcat" id="realcat" class="text_div form-control" placeholder="Select Your Interests"/>
                                                    <input type="hidden" name="cid" id="cid" value=""/>
                                                </div>
                                                <div id="topicbtn"></div>
                                            <?php } ?>
                                        </div>
                                </div>
                                <?php if ($user_id == $us_id) { ?>
                                    <div style="float:right;">
                                        <input type="submit" name="flw" class="btn btn-default">
                                    </div>
                                <?php } ?>											</form>

                            </div>

                            <div class="setting" style="display:none">

                                <div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="margin-top:15px; padding:0px; padding-bottom:10px;">
                                    <form method="post" action="">
                                        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <label for="usr">Blog Url</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8">
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Url">

                                            </div>
                                        </div>


                                        <!-- <div class="form-group" style="padding-top: 10px;">
                                                       <input type="text" name="realcat" id="realcat" class="text_div form-control" placeholder="Select Your url"/>
                                                       <input type="hidden" name="cid" id="cid" value=""/>
                                               </div>
                                        -->

                                </div>
                                <div style="float:right;">
                                    <input type="submit" name="flw" class="btn btn-default">
                                </div>
                                </form>


                            </div><!--settings -->
                            <div class="profile" style="display:none">
                                <form method="post" action="">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="usr">User name</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <input type="text" class="form-control" id="name" value="<?php print_r($uname) ?>" name="name" placeholder="Enter your User name">

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="usr">Password</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <input type="password" class="form-control" id="usrpass" name="usrpass" placeholder="Enter your password">

                                        </div>




                                        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;text-align:center;padding:0px">
                                            <input type="submit" value="Update" name="password">


                                        </div>
                                    </div>
                                </form>
                            </div><!-- profile -->
                        </div><!-- col lg 10 -->
                    </div><!-- row -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-header" style="background: rgba(128, 128, 128, 0.28);">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding:0px">


                        <img src="<?= base_url() ?>assert/images/user.png" style="width:25px;">


                        <a href="" style="color: #000;font-size: 17px;vertical-align: bottom;font-weight: bold;">About</a>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">

                        <ul style="list-style:none;padding-left:0px;">
                            <li style="font-size: 18px;font-weight: bold;margin-top:10px;"><a  href="#" onclick="overview();">Overview</a></li>
                            <li style="font-size: 18px;font-weight: bold;margin-top:10px;" ><a href="#" onclick="intrest();">Interest</a></li>
                            <li style="font-size: 18px;font-weight: bold;margin-top:10px;"><a href="#" onclick="setting();">Settings</a></li>
                            <li style="font-size: 18px;font-weight: bold;margin-top:10px;"><a href="#" onclick="account();">Account</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9" style="border-left: solid 1px rgba(212, 203, 203, 0.42);">

                        <div class="first_div">
                            <form  method="post" action="">

                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label for="usr">Gender</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <?php
                                        if ($us_id == $user_id) {
                                            ?>
                                            <select name="gender" id="gender">
                                                <option value="M"> Male </option>
                                                <option value="F"> Female </option>
                                            </select>
                                            <?php
                                        } else {

                                            echo $user[0]->gender;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label for="usr">Date of birth</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <div class="form-group">
                                            <?php
                                            if ($user_id == $us_id) {
                                                ?>
                                                <input data-format="dd/MM/yyyy hh:mm:ss" id="datepicker" class="form-control" class="ui-widget-header" type="date" name="datepicker" value="<?php echo $user[0]->DOB; ?>"></input>
                                                <?php
                                            } else {
                                                echo $user[0]->DOB;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label for="usr">Location</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <?php
                                        if ($user_id == $us_id) {
                                            ?>

                                            <input type="text" class="form-control" id="loc" name="loc" value="<?php echo $user[0]->location; ?>">
                                            <?php
                                        } else {
                                            echo $user[0]->location;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label for="usr">Employment</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <?php
                                        if ($user_id == $us_id) {
                                            ?>

                                            <input type="text" class="form-control" id="emp" name="emp" value="<?php echo $user[0]->employment; ?>">
                                            <?php
                                        } else {
                                            echo $user[0]->employment;
                                        }
                                        ?>


                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px;">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label for="usr">Mobile number</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <?php
                                        if ($user_id == $us_id) {
                                            ?>

                                            <input type="text" class="form-control" id="mbno" name="mbno" maxlength="10" value="<?php echo $user[0]->mobile; ?>">
                                            <?php
                                        } else {
                                            echo $user[0]->mobile;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label for="usr">Brief B/o</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <?php
                                        if ($user_id == $us_id) {
                                            ?>

                                            <textarea class="form-control" id="brief" name="brief"> <?php echo $user[0]->yourself; ?> </textarea>
                                            <?php
                                        } else {
                                            echo $user[0]->yourself;
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if ($us_id == $user_id) {
                                        ?>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <button type="submit" class="btn btn-default" name="update">Update</button>
                                        </div>
                                        <?php
                                    }
                                    ?>

                            </form>

                        </div>
                    </div>
                    <div class="interest" style="display:none">
                        <div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="margin-top:15px; padding:0px; padding-bottom:10px;">
                            <form method="post" action="<?= base_url() ?>users/categoryfollow">

                                <div>

                                    <div style="text-align:center">
                                        <p style="font-size:18px;font-weight:bold">Intrest</p>
                                    </div>
                                    <?php
                                    $result = $this->datamodel->selectcategory();
                                    //print_r($result);
                                    if ($result) {
                                        foreach ($result as $rts) {
                                            ?>
                                            <label class="checkbox-inline checkbox">
                                                <input type="radio" name="cid" value="<?= $rts['name'] ?>"><?= $rts['name'] ?>
                                            </label>

                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div style="float:right;">
                                    <input type="submit" name="flw" class="btn btn-default">
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="socialprofile" style="display:none">

                    </div>
                    <div class="setting" style="display:none">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px">
                                <h3>Web notification</h3>

                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px">

                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <label class="checkbox-inline" style="margin-left:10px;">
                                        <input type="checkbox" value="">Notify when someone follows me
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="">Notify when someone comments on my post
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="">Notify when someone likes my post
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;text-align:center;padding:0px">
                                <input type="button" value="Update">

                            </div>
                        </div>
                    </div>
                    <div class="profile" style="display:none">

                        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <label for="usr">User name</label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <input type="text" class="form-control" id="usr" placeholder="User name"></br>


                            </div>

                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <label for="usr">Password</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <input type="password" class="form-control" id="usr" placeholder="Password">

                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;text-align:center;padding:0px">
                                <input type="button" value="Update">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>


<div class="modal fade" id="myuserprofile" role="dialog">
    <div class="modal-dialog" style="width: 60%;">

        <!-- Modal content-->
        <div class="modal-content">

            <button type="button" class="close" data-dismiss="modal" style="position:absolute;margin-left: 97%;">&times;</button>
            <img src="<?= base_url(); ?>assert/images/New_Board_User_Default_Cover_Pic_1.jpg" style="width:100%;">

        </div>
    </div>
</div>

<div class="modal fade" id="mycoverprofile" role="dialog">
    <div class="modal-dialog" style="width: 80%;">

        <!-- Modal content-->
        <div class="modal-content">

            <button type="button" class="close" data-dismiss="modal" style="position:absolute;margin-left:98%;">&times;</button>
            <img src="<?= base_url(); ?>assert/images/New_Board_User_Default_Cover_Pic_1.jpg" style="width:100%;">


        </div>
    </div>
</div>

