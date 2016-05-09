<script>
  //alert(window.innerWidth);
var isMobile = false;
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|Opera Mobile|Kindle|Windows Phone|PSP|AvantGo|Atomic Web Browser|Blazer|Chrome Mobile|Dolphin|Dolfin|Doris|GO Browser|Jasmine|MicroB|Mobile Firefox|Mobile Safari|Mobile Silk|Motorola Internet Browser|NetFront|NineSky|Nokia Web Browser|Obigo|Openwave Mobile Browser|Palm Pre web browser|Polaris|PS Vita browser|Puffin|QQbrowser|SEMC Browser|Skyfire|Tear|TeaShark|UC Browser|uZard Web|wOSBrowser|Yandex.Browser mobile/i.test(navigator.userAgent))
{
    //alert("mobile");
 isMobile = true;
 location.replace("http://m.zersey.com");
 }
else
{
    //alert("web");
  //location.replace("http://zersey.com");
}
</script>

<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!-- whole window of dashboard -->
<div class="container-fluid">
    <div class="row" style="margin-top:18px;">
        <!--follow category part side -->
        <div class="col-md-2 follow_div" style="position:fixed; left:0;padding:0px;">
            <!-- loading it to view-->
            <?php
            //optionally pass a limit
            $ctrl->show_not_followed_categories();
            ?>
        </div>
        <div class="col-md-8 up_center_div col-md-offset-2">
            <!--hidden meanus and modals -->
            <div class="sharebox col-sm-12" style="display:none;">
                <div class="col-sm-12">
                    <div style="display:inline-block;">
                        <i class="material-icons">insert_comment</i> Update Status
                    </div>
                    <p class="icon_text_slash">/</p>
                    <div style="display:inline-block;">
                        <a href="#" style="text-decoration:none" data-toggle="modal" data-target="#newpopup"><i class="fa fa-commenting">&nbsp; Post Photo Story</i></a>
                    </div>
                    <p class="icon_text_slash">/</p>
                    <div style="display:inline-block;">
                        <a href="#" style="text-decoration:none" data-toggle="modal" data-target="#popupeditorl"><i class="fa fa-calendar-plus-o">&nbsp; Post Editorial</i></a>
                    </div>
                    <!--<p class="icon_text_slash">/</p>
                    <div style="display:inline-block;">
                       <i class="fa fa-pie-chart">&nbsp; Post Poll</i>
                    </div>
                    <p class="icon_text_slash">/</p>
                    <div style="display:inline-block;">
                       <i class="fa fa-pencil-square-o">&nbsp;Post Quiz</i>
                    </div>-->
                </div>
                <form method="post" action="<?= base_url(); ?>users/dplifeupload" enctype="multipart/form-data">
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div style="width:100%;background-color:rgba(255, 255, 255, 0.62); margin-bottom: 10px;">
                            <div class="uparrow"></div>
                            <div style="width: 100%;padding:5px;border: 1px solid #cecece;">
                                <textarea rows="2" name="upsname" id="upsname" style="width:100%;border: none;margin-bottom: -5px;" placeholder="Write something" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:left;vertical-align:middle;">
                            <p style="display: inline-block;vertical-align: middle;">Attach
                            <style>
                                label.myLabel input[type="file"] {
                                    position: fixed;
                                    top: -1000px;
                                }
                                .btn-primary:hover,.open .dropdown-toggle.btn-primary {
                                    border-color: #116C67!important;
                                    background-color: #116C67!important;
                                }

                            </style>
                            <label class="myLabel">
                                <span class="btn fileinput-button">
                                    <span>
                                        <i class="fa fa-camera fa-primary"> <input type="file" name="photo" id="photo" value="Upload Photo" /></i>
                                    </span>
                                </span>
                            </label>
                            <!--<label class="myLabel"> <span class="btn fileinput-button">
                            <span onclick="video_dv()"><i class="fa fa-youtube-play"></i></span></span>
                            </label>
<label class="myLabel" style="width: 300px;">
                                    <span id="video_url_div" style="display:none;"style="margin-left:20px;">
                                    <input type="text" name="video" id="video" class="form-control" placeholder="Paste Youtyube Url">
                                    </span>
                    </label>-->
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:right;vertical-align:middle;">
                            <select class="btn btn-default" name="upsstatus" id="upsstatus" style="font-family:'FontAwesome', Arial;border: solid 1px #ccc;">
                                <option value="1">&#xf0ac; Public</option>
                                <option value="2">&#xf0c0; Friends</option>

                            </select>
                            <div class="btn-group">
                                <button type="submit" name="publish" id="publish" class="btn btn-danger" style="height: 32px; font-family: Arial;">Publish</button>
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height:32px;">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu action_div">
                                    <li data-toggle="modal" data-target="#scheduleinst"><a href="#"  style="background: none;color: #000;border: none; text-decoration:none" id="publish">Scheduler</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li> <button type="submit" name="savedraft" style="background: none;color: #000;border: none;" id="publish">Save as Draft</button></li>
                                </ul>
                                <!-- schedule letter popup-->

                                <div class="modal fade" id="scheduleinst" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" style="color: #000;
                                                    font-weight: bold;text-align:left;">Select date time for shedule post</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="datetimepicker1" class="input-append date">

                                                    <input type="text" value="" name="scheduletime" id="datetimepicker_maskdash" class="form-control"><br><br>
                                                    <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" value="Cancel" class="btn" data-dismiss="modal">
                                                <button name="scedule" id="scedule" type="submit" value="Save" class="btn" style="background:#993737;color:#fff;">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <!-- ignore this code above-- refractor this later -->
            <div class="row" id="dashboard_image_div">

            </div>
        </div>
        <!-- user follow side nav -->
        <div class="col-md-2 follow_div" style="position:fixed; right:3px;padding:0px;">
            <!--loading it to view-->
            <?php
            //optionally pass a limit
            //default 5
            $ctrl->show_users_not_followed();
            ?>
        </div>
    </div>
</div>
<script>
    var loading_posts = false;
    var feeds_ended = false;
    var last_post_time = null;
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
            data: {'last_date': last_date, 'limit': limit},
            url: "<?= base_url() ?>fetch_feeds/" + stat,
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



