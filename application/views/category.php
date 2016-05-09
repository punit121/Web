<div class="row" style="border: solid 2px black;margin-left:0px;margin-right:0px;">

    <!-----middle part-------->

    <div class="col-lg-12 col-md-12 col-sm-12" style="color: #fff; background-color:#CCCCCC;background: url(
    <?php
    if ($covimg) {
        ?>'<?= base_url() ?>assert/catimg/<?= $covimg ?>'
         <?php } else { ?>
             '<?= base_url() ?>assert/catimg/d_Cover.jpg'
         <?php } ?>
         ); margin-top:40px; background-size:cover;">
        <div class="col-lg-12 col-md-12 col-sm-12" style="height:360px;" >
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div style="width:100%; margin-top:160px;">
                    <div style="display: inline-block;width:49%;">
                        <img src="<?php
                        if ($proimg) {
                            ?><?= base_url() ?>assert/catimg/<?= $proimg ?>
                             <?php } else { ?>
                                 <?= base_url() ?>assert/catimg/d_Icon.png
                             <?php } ?>
                             " style="width: 175px;border: solid 5px;">

                    </div>
                    <div style="display: inline-block;width:49%;">
                        <?php
                        $catnm = $this->uri->segment(2);
                        $cntpost = $this->datamodel->countofcatposr($catnm);
                        $cntpost1 = $this->datamodel->countofcatfoll($catnm);

                        $cat = $this->datamodel->fetchcatid($catnm);
                        $res = $cat[0]['category'];
                        $uid = $this->session->userdata['user_id'];
                        $pro = $this->datamodel->selectfollow($res, $uid);
                        $folid = $pro[0]['fcid'];
                        ?>
                        <h3 class="middle_user_name"><?= ucfirst($catnm) ?></h3>
                        <p class="discription_div">  <?= $cntpost ?> posts</p>
                    </div>
                </div>
                <div style="padding-top: 13px; margin-bottom: 10px;margin-left: 50px;">
                    <?php
                    $id = $this->session->userdata('user_id');


                    if ($id == '383') {
                        ?>

                        <button class="btn btn-default"style="display:inline-block;margin-top:5px;margin-left:20px;"  data-toggle="modal" data-target="#myModal"><i class="fa fa-camera-retro"></i>Edit Image</button>


                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <form action="<?= base_url(); ?>users/uploadcatdetail" method="post" enctype="multipart/form-data">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" style="color:#000">Upload Your Profile & Cover Photo</h4>
                                        </div>
                                        <div class="modal-body">
                                            <label style="color:#000">Profile pic</label>
                                            <input type="file" name="prophoto" id="prophoto" style="color:#000" value="Upload Photo" /></i>Upload your pic</br>
                                            <label style="color:#000">cover pic</label>
                                            <input type="file" name="covphoto" id="covphoto" value="Upload Photo" style="color:#000" /></i>Upload cover pic<br>
                                            <input type="hidden" name="catidm" id="catidm" value="<?= $catidm ?>" />
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
                        <?php
                    } else {
                        ?>                  <form method="post" action="<?= base_url() ?>users/categoryfollowByName">

                            <input type="hidden" id="cid" name="cid" value="<?= $cat[0]['category'] ?>"/>

                            <?php
                            if ($pro == "0") {
                                ?>

                                <div class="col-sm-12" style="border:0px solid red;padding:0px;"> <button type="submit" class="btn btn-follow" name="flw" style="margin-left: -50px;"><i class="fa fa-user-plus"></i>&nbsp; Follow</button></div>
                                <?php
                            } else {
                                ?>
                                <div class="col-sm-12" style="border:0px solid red;padding:0px;" > <a href="<?= base_url() ?>users/deletefollow/<?= $pro[0]['fcid'] ?>"  class="btn btn-follow" style="margin-left: -50px;"><i class="fa fa-user-plus"></i>&nbsp; Followed</a></div>
                            <?php } ?>

                        </form>
                    <?php } ?>

                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-4" style="float:right; margin-top: 165px;">
                <h3 class="topic_txt" style="color: #fff;">Topics</h3>
                <div>
                    <?php
                    if ($topic) {
                        foreach ($topic as $tp) {
                            ?>
                            <a href="<?= base_url() ?>categories/<?= $catnm ?>/<?= $tp->name ?>" class="btn btn-default topic_content"><?= $tp->name ?></a>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <!--<div class="col-lg-3 col-md-3 col-sm-3" >
                <div style="text-align:center">
                        <h3 class="top_user_txt">Top User</h3>
            <?php
            if ($topuser) {
                foreach ($topuser as $tpu) {
                    ?>
                                                                                                                                                                                                <div>
                                                                                                                                                                                                                            <div style="display:inline-block;">
                                                                                                                                                                                                                                     <a href="<?= base_url() ?>categoriess/<?= $catnm ?>/<?= $tpu->userid ?>">
                                                                                                                                                                                                         <img src="<?= base_url(); ?>assets/images/merchant/<?php
                    if ($tpu) {
                        echo $tpu->photo;
                    } else

                        ?>usericon.jpg" style="width:35px; border-radius:5px; padding:2px">
                                                                                                                                                                                                                                    </a>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                    <div class="circle_followers">
                    <?php
                    if ($tpu->name) {
                        echo $tpu->name;
                    } else
                        echo 'User'
                        ?>
                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                        </div>
                    <?php
                }
            }
            ?>
                    </div>
             </div>-->
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12" style="border: solid 2px black;">
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div><h3 style="text-align:center;">Recent Activity</h3></div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3" style="">
            <div><h3 style="text-align:center">Filter</h3></div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3" style="">
            <a href="<?= base_url() ?>category/<?= $catnm ?>"><div><h3 style="text-align:center">Remove all filter</h3></div></a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3" style="">
            <img src="<?= base_url() ?>assert/images/ic_settings_48px-128.png" width="48px" height="48px" style="margin: 0px 0px 0px 50%;">
        </div>
    </div>
</div>


<!-- //feeds container -->
<div class="col-lg-12 col-md-12 col-sm-12" style="padding:5px;margin-top:5px;" id="dashboard_image_div">
    <!--contains all catgory feeds -->
</div>


</div>
<div id="newpopup" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 80%;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding: 0px;">
                <!-- wizard start -->
                <div class="wizard-container" style="padding-top: 0px;">
                    <form action="" method="">
                        <div class="card wizard-card ct-wizard-orange" id="wizard">

                            <!-- You can switch "ct-wizard-orange"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->

                            <!--<div class="wizard-header">
                                <h3>
                                    Follow topics that interest you <br>
                                    <small>This will help us build a custom feed for you as per your interest, Thanks!</small>
                                </h3>
                            </div>-->
                            <ul class="nav nav-pills" style="background-color: #FF9500;">
                                <li class="active" style="width:100%;"><a href="#about" data-toggle="tab">Follow</a></li>
                                <!--<li style="width: 33.3333%;" class=""><a href="#account" data-toggle="tab">Account</a></li>-->
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="about">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h3 class="info-text">
                                                Follow topics that interest you <br>
                                                <small>This will help us build a custom feed for you as per your interest, Thanks!</small>
                                            </h3>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group" style="border: 1px solid black; height:415px; overflow: auto;">
                                                <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
                                                    <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                        <input type="checkbox" name="sport[]" value="football" />
                                                    </label>
                                                    <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                    <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>
                                                </div>
                                                <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
                                                    <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                        <input type="checkbox" name="sport[]" value="football" />
                                                    </label>
                                                    <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                    <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>
                                                </div>
                                                <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
                                                    <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                        <input type="checkbox" name="sport[]" value="football" />
                                                    </label>
                                                    <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                    <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>
                                                </div>
                                                <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
                                                    <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                        <input type="checkbox" name="sport[]" value="football" />
                                                    </label>
                                                    <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                    <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>
                                                </div>
                                                <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
                                                    <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                        <input type="checkbox" name="sport[]" value="football" />
                                                    </label>
                                                    <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                    <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>
                                                </div>
                                                <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
                                                    <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                        <input type="checkbox" name="sport[]" value="football" />
                                                    </label>
                                                    <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                    <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>
                                                </div>
                                                <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius:   10%;border: 1px solid #c0c0c0;">
                                                    <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                        <input type="checkbox" name="sport[]" value="football" />
                                                    </label>
                                                    <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                    <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>
                                                </div>
                                                <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius:   10%;border: 1px solid #c0c0c0;">
                                                    <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                        <input type="checkbox" name="sport[]" value="football" />
                                                    </label>
                                                    <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                    <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>
                                                </div>
                                                <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius:   10%;border: 1px solid #c0c0c0;">
                                                    <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                        <input type="checkbox" name="sport[]" value="football" />
                                                    </label>
                                                    <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                    <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>
                                                </div>
                                                <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius:   10%;border: 1px solid #c0c0c0;">
                                                    <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                        <input type="checkbox" name="sport[]" value="football" />
                                                    </label>
                                                    <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                    <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>
                                                </div>
                                                <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius:   10%;border: 1px solid #c0c0c0;">
                                                    <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                        <input type="checkbox" name="sport[]" value="football" />
                                                    </label>
                                                    <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                    <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="tab-pane" id="account">
                                    <h4 class="info-text"> What are you doing? </h4>
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="col-sm-4">
                                                <div class="choice" data-toggle="wizard-radio">
                                                    <input type="radio" name="job" value="Design">
                                                    <div class="icon">
                                                        <i class="fa fa-pencil"></i>
                                                    </div>
                                                    <h6>Design</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="choice" data-toggle="wizard-radio">
                                                    <input type="radio" name="job" value="Code">
                                                    <div class="icon">
                                                        <i class="fa fa-terminal"></i>
                                                    </div>
                                                    <h6>Code</h6>
                                                </div>

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="choice" data-toggle="wizard-radio">
                                                    <input type="radio" name="job" value="Develop">
                                                    <div class="icon">
                                                        <i class="fa fa-laptop"></i>
                                                    </div>
                                                    <h6>Develop</h6>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="tab-pane" id="address">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text"> Connect Your Friends To Discuss On Various Topics </h4>
                                        </div>
                                        <div class="col-sm-12">
                                            <img src="" title="" alt="" style="width:100%;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer" style="margin-top:25px;">
                                <div class="pull-right">
                                    <input type="button" class="btn btn-next btn-fill btn-warning btn-wd btn-sm" name="next" value="Next" style="">
                                    <input type="button" class="btn btn-finish btn-fill btn-warning btn-wd btn-sm" name="finish" value="Finish" style="display: none;">
                                </div>
                                <div class="pull-left">
                                    <input type="button" class="btn btn-previous btn-fill btn-default btn-wd btn-sm disabled" name="previous" value="Previous">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- wizard close -->
            </div>
        </div>

    </div>
</div>

<script>
    $("#sorting_div").click(function () {

        $("#sorting_show_div").toggle();


    });
</script>

<script>
    $("#article_buttton").click(function () {
        $("#dashboard_image_div").toggle();
    });
</script>

<script>
    $("#update_popup").click(function () {
        $("#newpopup").modal('show');
    });

    $("#visiual_post").click(function () {
        $("#create_discussion").modal('show');
    });

    $("#poll_post").click(function () {
        $("#newpopup").modal('show');
    });


    $("#post_quiz").click(function () {
        $("#newpopup").modal('show');
    });


    $("#question_post").click(function () {
        $("#newpopup").modal('show');
    });


</script>
<script>
    var loading_posts = false;
    var feeds_ended = false;
    var last_post_time = null;
    // i have two options wait until custom feed input is over
    // or I can directly call

    // here just call the function to fetch datat and
    // parse it on to screen
    //unix timestamp in seconds
    var currentTime = new Date().getTime() / 1000 | 0;
    console.log('currentTime :', currentTime);
    fetch_posts(currentTime, 'older', '24', function (done) {});


    /**
     *
     * @param {type} last_date
     * @param {type} stat
     * @param {type} limit
     * @param {type} callback
     * @returns {undefined}
     */
    function fetch_posts(last_date, stat, limit, callback) {
        //ajax call
        $.ajax({
            type: "get",
            data: {'last_date': last_date, 'limit': limit, 'category': '<?php echo $catname; ?>'},
            url: "<?= base_url() ?>category_feeds/" + stat,
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
        var grid_layout = '<div class="col-md-3 col-sm-3">'
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


<!-- Google Analytics Code -->
<?php include_once("analyticstracking.php") ?>
</body>
</html>
