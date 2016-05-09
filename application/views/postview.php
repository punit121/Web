<?php
$hed = str_replace(" ", "-", $post[0]['head']);
$hed = preg_replace('/[^A-Za-z0-9\-]/', '', $hed);
$fhed = substr($hed, 0, 50);
?>
<script>
    var isMobile = false;
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|Opera Mobile|Kindle|Windows Phone|PSP|AvantGo|Atomic Web Browser|Blazer|Chrome Mobile|Dolphin|Dolfin|Doris|GO Browser|Jasmine|MicroB|Mobile Firefox|Mobile Safari|Mobile Silk|Motorola Internet Browser|NetFront|NineSky|Nokia Web Browser|Obigo|Openwave Mobile Browser|Palm Pre web browser|Polaris|PS Vita browser|Puffin|QQbrowser|SEMC Browser|Skyfire|Tear|TeaShark|UC Browser|uZard Web|wOSBrowser|Yandex.Browser mobile/i.test(navigator.userAgent))
    {
       // alert("mobile");
        isMobile = true;
        location.replace("http://m.zersey.com/postview/<?= $fhed ?>/<?= $post[0]['id'] ?>")
    }
    


    /*alert("Hi");
     if(window.innerWidth < 800)
     {

     window.location.href("http://m.zersey.com/postview/<?= $fhed ?>/<?= $post['0']['id'] ?>");
     }*/
</script>

    <div id="fb-root"></div>

   <!-- <script>
        function fbShare(url, title, descr, image, winWidth, winHeight) {
            var winTop = (screen.height / 2) - (winHeight / 2);
            var winLeft = (screen.width / 2) - (winWidth / 2);
            window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
        }

    </script>-->
    <?php if($this->session->userdata['user_id']!=NULL)
    { 
        ?>
    <script>

        $(document).ready(function ()
        {

            var i = 0;
            var j = 0;
            //alert("hi");
            /* $("#postcomment").click(function()
             {

             //alert("hello");
             var comment=$("#comment").val();
             //alert(comment);

             if(comment.length==0)
             {
             alert("comment should not be empty");
             }
             else
             {
             $.ajax({
             type:"GET",
             data:"data="+ comment,
             url:"<?= base_url() ?>users/viewpost/<?= $post['0']['id'] ?>",
             success:function(msg)
             {
             $('#comment').val("");
             //alert("Comment posted");
             $("#comments").html(msg);

             }
             });

             }
             });*/

            /*    Function called when comment is entered through enter key           */
            $("#comment").keypress(function (e)
            {


                var comment = $("#comment").val();
                //alert(comment);
                var postid = $("#post").val();

                if (e.keyCode == 13)
                {
                    i++;
                    if (i == 1)
                    {
                        e.preventDefault();
                        //alert("hello");
                        if (comment.length == 0)
                        {
                            alert("comment should not be empty");

                        } else
                        {
                            $.ajax({
                                type: "GET",
                                data: "data=" + comment,
                                url: "<?= base_url() ?>users/viewpost/" + postid,
                                success: function (msg)
                                {
                                    $('#comment').val("");
                                    //alert("Comment posted");
                                    $("#comments").html(msg);

                                }
                            });

                        }
                    }
                }
            });

            /* Function called when bookmark button is pressed  */
            $("#bookmark").click(function ()
            {
                //alert("Hello");
                var userid = $("#userid").val();
                //alert(userid);

                $.ajax({
                    type: "GET",
                    data: "data=" + userid,
                    url: "<?= base_url() ?>users/bookmark_story/<?= $post['0']['id'] ?>",
                                    success: function (msg)
                                    {
                                        //$('#comment').val("");
                                        $("#bookmark").hide();
                                        $("#remove").show();
                                        //alert("Post has been bookmarked");
                                        //$("#bookmarks").html(msg);

                                    }
                                });

                            });
                            /* Function called when a bookmarked post is removed from the bookmark list*/
                            $("#remove").click(function ()
                            {

                                var userid = $("#userid").val();
                                //alert(userid);

                                $.ajax({
                                    type: "GET",
                                    data: "remove=" + userid,
                                    url: "<?= base_url() ?>users/bookmark_story/<?= $post['0']['id'] ?>",
                                                    success: function (msg)
                                                    {
                                                        //$('#comment').val("");
                                                        $("#remove").hide();
                                                        $("#bookmark").show();

                                                        //alert("Post has been removed from bookmark list");
                                                        //$("#bookmarks").html(msg);

                                                    }
                                                });

                                            });


                                            /* Function called when a user wants to delete a comment*/
                                            $(".delete").click(function ()
                                            {
                                                //alert("Hello");
                                                var cmtid = this.id;
                                                //alert(cmtid);
                                                var postid = $("#post").val();

                                                if (confirm("Do you want to delete this comment?"))
                                                {
                                                    $.ajax({
                                                        type: "GET",
                                                        data: "cmtid=" + cmtid,
                                                        url: "<?= base_url() ?>users/viewpost/" + postid,
                                                        success: function (msg)
                                                        {
                                                            //$('#comment').val("");
                                                            $("#comments").html(msg);

                                                            //alert("Post has been removed from bookmark list");
                                                            //$("#bookmarks").html(msg);

                                                        }
                                                    });
                                                } else
                                                {
                                                    return false;
                                                }





                                            });

                                            /* Function called when a user clicks on the icon for editing or deleting a comment*/

                                            $(".images").click(function ()
                                            {
                                                var str = this.id;
                                                var id = str.substr(3);
                                                //alert(id);
                                                i++;
                                                if (i % 2 != 0)
                                                {
                                                    $("#list" + id).show();
                                                } else
                                                {
                                                    $("#list" + id).hide();
                                                }
                                            });

                                            $(".images1").click(function ()
                                            {
                                                var ids = this.id;

                                                var str = ids.substr(4);
                                                //alert(str);
                                                var id = $("#com").val();
                                                j++;
                                                if (j % 2 != 0)
                                                {
                                                    $("#list" + str).show();
                                                } else
                                                {
                                                    $("#list" + str).hide();
                                                }
                                                $("#" + ids).hide();
                                                $("#ima" + id).show();
                                                $("#comment_sections" + id).hide();
                                                $("#comment_section" + id).show();
                                            });

                                            /* Function called when a user wants to edit a comment*/

                                            $(".edit").click(function ()
                                            {
                                                // alert("Hello");
                                                var id = this.id;
                                                // $("#list").hide();
                                                $("#ima" + id).hide();
                                                $("#ima1" + id).show();
                                                $("#comment_section" + id).hide();
                                                $("#comment_sections" + id).show();
                                                $("#list" + id).hide();
                                            });

                                            $(".update_comment").keydown(function (e)
                                            {

                                                var comment_id = this.id;
                                                //alert(comment_id);
                                                var comments = $("#" + comment_id).val();
                                                //alert(comments);
                                                var postid = $("#post").val();

                                                if (e.keyCode == 13)
                                                {
                                                    //alert("HEllo");
                                                    if (comments.length == 0)
                                                    {
                                                        alert("comment should be empty");
                                                    } else
                                                    {
                                                        $.ajax({
                                                            type: "GET",
                                                            data: {"comment_id": comment_id, "comment": comments},
                                                            url: "<?= base_url() ?>users/viewpost/" + postid,
                                                            success: function (msg)
                                                            {
                                                                //$('#comment').val("");
                                                                $("#comments").html(msg);
                                                                $("#comment_sections").hide();
                                                                //alert("Post has been removed from bookmark list");
                                                                //$("#bookmarks").html(msg);

                                                            }


                                                        });
                                                    }
                                                }
                                                if (e.keyCode == 9)
                                                {
                                                    //alert("yes");
                                                    e.preventDefault();

                                                    $("#comment_sections" + comment_id).hide();
                                                    $("#comment_section" + comment_id).show();
                                                    $("#ima1" + comment_id).hide();
                                                    $("#ima" + comment_id).show();
                                                }

                                                if (e.keyCode == 27)
                                                {
                                                    alert("Escape is not allowed");

                                                    return false;


                                                }
                                            });
                                            /* Edit functionality ends here */
                                            /*$("#save").click(function()
                                             {

                                             var v = $("#bdesc").text().length;
                                             //alert(v);
                                             if(v < 100)
                                             {
                                             alert("Comment should be at least 100 characters");
                                             }
                                             else
                                             {
                                             $.ajax({
                                             type:"POST",
                                             data:"save=" + v,
                                             url:"<?= base_url() ?>users/viewpost/<?= $post['0']['id'] ?>",
                                             success:function(msg)
                                             {
                                             //$('#comment').val("");
                                             alert("Comment is received");
                                             $("#bdesc").val("");
                                             //alert("Post has been removed from bookmark list");
                                             //$("#bookmarks").html(msg);

                                             }
                                             });
                                             }
                                             });*/


                                        });
    </script>
<?php } ?>


<?php
if (!isset($om)) {
    ?>

        <div class="container popup_div_post">
            <div>
                <a href="<?= base_url() ?>"><i class="fa fa-times fa-2x popup_cross_icon"></i></a>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px;" >
    <?php
    if (isset($post)) {
        foreach ($post as $pt) {
            $i = 01;
            $time = $pt['createdOn'];
            $id = $pt['id'];
            $ids = $pt['userid'];
            $idu['id'] = $pt['userid'];
            $usrnam = $this->usermodel->where_data('users', $idu);
            $uid = $this->session->userdata['user_id'];
            ?>

                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-right:solid 1px;" id='galry'>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h1 style="margin:0px; font-weight:bold; font-size:26px"><?= ucfirst($pt['head']) ?></h1>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 post_div">
                                <ul id="gallery" class=" ">
                                    <li>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="col-lg-1 col-md-1 col-sm-1" >

                                            </div>
                                            <div class="col-lg-11 col-md-11 col-sm-11">
            <?php
            $pic = $pt['image'];

            if ($pic != '' && file_exists("http://m.zersey.com/assets/zerseynme/$pic")) {
                ?>
                                                    <img src="http://m.zersey.com/assets/zerseynme/<?= $pt['image'] ?>" style="width:100%;"/>

                                                <?php } else { ?>
                                                    <img src="http://m.zersey.com/assets/zerseynme/<?= $pt['image'] ?>" style="width:100%;"/>
                                                <?php } ?>

                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="col-lg-1 col-md-1 col-sm-1">
                                                <p style="font-size:3.5em; margin-top:20px"><?= $i ?></p>
                                            </div>
                                            <div class="col-lg-11 col-md-11 col-sm-11">
                                                <h4></h4>
            <?php
            if($uid!=NULL)
            {
            if ($ids == $uid) {
                ?>
                                                    <a href="<?= base_url() ?>deletepost/<?= $pt['id'] ?>" style="text-decoration:none; color:#000; float:right;" onclick="return isDelete();"><i class="fa fa-trash"></i> &nbsp;</a>
                                                    <a href="<?= base_url() ?>postedit/<?= $pt['id'] ?>" style="text-decoration:none; color:#000; float:right"><i class="fa fa-pencil"></i>&nbsp;</a>
                                                <?php } } ?>
                                                <p style="text-align: justify;padding-right: 25px;"><?= ucfirst($pt['intro']) ?></p>
            <?php
            $tag = explode(',', $pt['category']);

            if (!empty($tag[0])) {
                ?>
                                                    <h5>See more of :
                                                    <?php foreach ($tag as $tg) { ?>
                                                            <a href="<?= base_url() ?>category/<?= $pt['maincat'] ?>/<?= $tg ?>" style="color:#000; text-decoration:underline"><?= $tg ?></a>
                                                    <?php }
                                                } ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </li>
            <?php
            if ($postdetail) {

                foreach ($postdetail as $ptd) {
                    $i = $i + 01;
                    ?>
                                            <li>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="col-lg-1 col-md-1 col-sm-1" >
                                            <!--	 <i class="fa fa-facebook-official fa-2x post_fb_icon"></i>
                                                    <i class="fa fa-twitter fa-2x post_twitter_icon"></i>
                                                    <i class="fa fa-google-plus-square fa-2x post_gmail_icon"></i>
                                                    <i class="fa fa-facebook-official fa-2x post_fi_icon"></i>
                                                        -->
                                                    </div>
                    <?php
                    $pic = $ptd['photo'];
                    if ($pic != '' && file_exists("http://m.zersey.com/assets/zerseynme/$pic")) {
                        ?>
                                                        <div class="col-lg-11 col-md-11 col-sm-11">
                                                            <img src="http://m.zersey.com/assets/zerseynme/<?= $ptd['photo'] ?>"style="width:100%;" />
                                                        </div>
                    <?php } else { ?>
                                                        <div class="col-lg-11 col-md-11 col-sm-11">
                                                            <img src="http://m.zersey.com/assets/zerseynme/<?= $ptd['photo'] ?>"style="width:100%;" />
                                                        </div>
                    <?php } ?>

                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="col-lg-1 col-md-1 col-sm-1">
                                                        <p style="font-size:3.5em; margin-top:20px"><?= $i ?></p>
                                                    </div>
                                                    <div class="col-lg-11 col-md-11 col-sm-11">
                                                        <h4></h4>
                    <?php
                    if($uid!=NULL)
                    {
                    if ($ids == $uid) {
                        ?>

                                                            <a href="<?= base_url() ?>deletepost/<?= $pt['id'] ?>" style="text-decoration:none; color:#000; float:right;" onclick="return isDelete();"><i class="fa fa-trash"></i> &nbsp;</a>
                                                            <a href="<?= base_url() ?>postedit2/<?= $ptd['id'] ?>" style="text-decoration:none; color:#000; float:right"><i class="fa fa-pencil"></i>&nbsp;</a>
                    <?php } } ?>
                                                        <p style="text-align: justify;padding-right: 25px;"><?= ucfirst($ptd['description']) ?></p>
                                                        <?php
                                                        $tag = explode(',', $pt['category']);
                                                        if (!empty($tag[0])) {
                                                            ?>
                                                            <h5>See more of :
                                                            <?php
                                                            foreach ($tag as $tg) {
                                                                ?>

                                                                    <a href="<?= base_url() ?>category/<?= $pt['maincat'] ?>/<?= $tg ?>" style="color:#000; text-decoration:underline"><?= $tg ?></a>,
                                                                <?php }
                                                            } ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </li>
                <?php }
            } ?>

                                </ul>

                                <a class="prev" id="pgprv"><i class="fa fa-angle-left fa-4x" style="margin-left: -25px;"></i></a>

                                <a class="prevpt" id="pstprv" style="display:none"><i class="fa fa-angle-left fa-4x" style="margin-left: -25px;"></i></a>

                                <a class="next" id='pgnext'><i class="fa fa-angle-right fa-4x" style="margin-right: -15px;"></i></a>

                                <a class="nextpt" id="pstnext"  style="display:none"><i class="fa fa-angle-right fa-4x"></i></a>

                                <div class="pagination"> </div>
                                <!-- end of #container -->
                            </div>
                        </div>

                        <div class="col-sm-4" id="comentdiv">
                        <?php
                if($uid != NULL)
                {
            $uid = $ids;

            $photox = $this->usermodel->where_data('customer', array('userId' => $uid));

            $pic = $photox[0]->photo;
            ?>
                            <div class="col-sm-2" style="margin-left: -15px;">
                                <a href="<?= base_url() ?>userprofile/<?php echo $usrnam[0]->username; ?>"><img class="post_comment_user_img" src="<?php if (isset($photox[0]->photo)) {
                if (file_exists("./assets/images/merchant/$pic")) {
                    echo base_url() . 'assets/images/merchant/' . $pic; ?><?php } else { ?>http://zersey.com/assets/images/merchant/<?php echo $photox[0]->photo;
                }
            } else {
                echo base_url() . 'assets/images/merchant/usericon.jpg';
            }
            ?>">
                                </a></div>

                            <div class="col-sm-10">
                                <a href="<?= base_url() ?>userprofile/<?php echo $usrnam[0]->username; ?>" style="color:#000;"><p class="post_cooment_user_name"style="width:120px;">  <?php if ($uid != 0) {
                            echo $photox[0]->fullname;
                        } else echo 'Admin'; ?></p></a>
                        <?php } ?>
                                <time><?php
                                    // $to_time = strtotime($cm->datetm);


                                    $to_time = strtotime(str_replace('/', '-', $time));
                                    //echo strtotime("22-03-2015 20:08:16");
                                    $from_time = strtotime(date("d-m-Y H:i:s"));
                                    $min = round(abs($to_time - $from_time) / 60);
                                    if ($min > 59) {
                                        $minx = round($min / 60);
                                        if ($minx > 23) {
                                            $minz = round($minx / 24);
                                            if ($minz < 30) {
                                                echo ($minz . " Day");
                                            } else {

                                                $a = explode(" ", $time);
                                                echo $a[0];
                                            }
                                        } else {
                                            echo $minx . " Hr";
                                        }
                                    } else {
                                        echo $min . " Min.";
                                    }
                                    ?></time>
                            </div>





                            <div class="post-detail-bottom">
                                <div class="pull-lt" style="display:inline-block">
                                    <?php
                                    $fts['fbblogid'] = $id;
                                    $ftsd['fbblogid'] = $id;
                                    $ftsd['userid'] = $user_id;
                                    $cid['postid'] = $id;
                                    $cmtntcnt = $this->usermodel->countlikecomment('post_coment', $cid);
                                    $likecnt = $this->usermodel->countlikecomment('fbblog_like', $fts);
                                    $likeno = $this->usermodel->where_data('fbblog_like', $ftsd);
                                    ?>
                                    <a href="#" class="askpost" rel="<?php echo $id ?>" id="askchng<?php echo $id ?>" style=" <?php if (!count($likeno)) {

                                } else {
                                    echo "display:none";
                                } ?>"><abbr style="color:#000">Like - </abbr> <span class="contask" style="color:#000;"><?php
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
                                            ?></span></a>
                                    <a href="<?php /* echo base_url()?>blog/unlikepost/<?php echo $pt->postid."/".$user_id */ ?>#" class="" id="askchng<?php echo $id ?>" style=" <?php if (!count($likeno)) {
                                    echo "display:none";
                                } else {

                                } ?>"><abbr style="color:#000";>Liked </abbr> <span class="contask" style="color:#000;"><?php
                                            if ($likecnt >= 1000 && $likecnt < 1000000) {
                                                $cnlikecnt = number_format($likecnt / 1000, 2) . 'K';
                                                //echo $cnlikecnt;
                                            } else if ($likecnt >= 1000000 && $likecnt < 1000000000) {
                                                $cnlikecnt = number_format($likecnt / 1000000, 2) . 'M';
                                                //echo $cnlikecnt;
                                            } else if ($num >= 1000000000) {
                                                $cnlikecnt = number_format($likecnt / 1000000000, 2) . 'B';
                                                //echo $cnlikecnt;
                                            } else {
                                                $cnlikecnt = $likecnt;
                                                //echo $cnlikecnt;
                                            }
                                            ?></span></a>
                                </div>
                                <div class="pull-lt" style="display:inline-block">

                                    <a class="icon-btn post-link" style="color:#000">
                                        | Comment -
                                    </a>
                                    <span style="color:#000"><?php echo $cmtntcnt; ?></span>
                                </div>
                                <!-- <div class="pull-lt" style="display:inline-block">
                                 <a href="#" class="icon-btn post-link" style="color:#000">| Follow</a>
                                 </div> -->
                                <!--<div class="pull-lt" style="display:inline-block">
                                <a href="#" class="icon-btn post-link" style="color:#000">| Add Friend</a>
                                </div> -->
            <?php
            $hed = str_replace(" ", "-", $post['0']['head']);
            $hed = preg_replace('/[^A-Za-z0-9\-]/', '', $hed);
            $fhed = substr($hed, 0, 50);
            ?>

                                <div><!-- <a id="fb-share"  style='text-decoration:none;'  type="icon_link" b onClick="window.open(
             'http://www.facebook.com/sharer.php?s=100&p[title]=<?php echo $post['0']['head']; ?>&p[summary]=<?php echo strip_tags($post['0']['intro']); ?>&p[url]=http://zersey.com/postview/<?= $fhed; ?>/<?php echo $post['0']['id']; ?>&p[images][0]=<?php echo $post['0']['image']; ?>',
                     'sharer',
                     'toolbar=0,status=0,width=580,height=325');"
                 href="javascript: void(0)"
             >Share</a> -->

                                    &nbsp; &nbsp; &nbsp;
                                    <a href="#myModalreport" data-toggle="modal" id="fb-share" style='text-decoration:none;'> Report Abuse </a>
                                    &nbsp; &nbsp;
                                    <div id="bookmarks">
                                        <?php
                                        if ($book['0']['status'] == 1) {
                                            ?>

                                            <img id="remove" src="<?= base_url() ?>assets/images/Bookmark Icon_2.png" width="40px" height="30px">
                                            <img id="bookmark" src="<?= base_url() ?>assets/images/Bookmark Icon_1.png" width="40px" height="30px" style="display: none;"> <?php
                                        } else if ($book['0']['status'] == 0) {
                                            ?>
                                            <img id="remove" src="<?= base_url() ?>assets/images/Bookmark Icon_2.png" width="40px" height="30px" style="display: none;">
                                            <img id="bookmark" src="<?= base_url() ?>assets/images/Bookmark Icon_1.png" width="40px" height="30px">
            <?php
            } else {
                ?>
                                            <img id="remove" src="<?= base_url() ?>assets/images/Bookmark Icon_2.png" width="40px" height="30px" style="display: none;">
                                            <img id="bookmark" src="<?= base_url() ?>assets/images/Bookmark Icon_1.png" width="40px" height="30px">
                <?php
            }
            ?>
                                    </div>
                                </div>
                                <div class="modal fade" id="myModalreport" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" style="color: #000;
                                                    font-weight: bold;">Comment</h4>
                                            </div>
                                            <form action="" method="post">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <!-- <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                                                              <div class="col-lg-4 col-md-4 col-sm-4">
                                                                   <label for="usr">Name</label>
                                                              </div>
                                                              <div class="col-lg-8 col-md-8 col-sm-8">
                                                              <input type="text" class="form-control" placeholder="Enter Your Board Name" name="bname" id="bname">
                                                              </div>
                                                         </div>-->
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label for="usr">Description</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8">
                                                                <textarea class="form-control custom-control" rows="3" style="resize:none" placeholder="The reason for reporting" name="bdesc" id="bdesc"></textarea>
                                                                <span> Comment should be minimum 100 characters long. </span>
                                                            </div>
                                                        </div>
                                                        <!--<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                 <label for="usr">Catagory</label>
                                                            </div>

                                                            <div class="col-lg-8 col-md-8 col-sm-8">
                                                            <select name="bcat" id="bcat" class="form-control">
                                                            <option>Select Category</option>
            <?php foreach ($cat as $cas) { ?>
                                                                <option value="<?= $cas['category'] ?>"><?= $cas['category'] ?></option>
            <?php } ?>
                                                            </select>
                                                       </div>
                                                      </div>-->

                                                        <input type="hidden" name="postid" id="postid" value="<?php echo $id; ?>" />
                                                        <input type="hidden" name="userid" id="userid" value="<?php echo $user_id; ?>" />

                                                    </div>
                                                </div>


                                                <div class="modal-footer">


                                                    <input type="button" value="Cancel" class="btn" data-dismiss="modal">

                                                    <input type="submit" value="Save" name="save" id="save" class="btn" style="background:#993737;color:#fff;">

                                                </div></form>
                                        </div>

                                    </div>
                                </div>
                                
                                <!--<a id="fb-share" style='text-decoration:none;' type="icon_link" onClick="window.open('http://www.facebook.com/sharer.php?s=100&p[title]=<?= $post['0']['head']; ?>&p[summary]=<?= strip_tags($post['0']['intro']); ?>&p[url]=http://zersey.com/postview/<?= $fhed ?>/<?= $post['0']['id'] ?>&p[images][0]=<?= $post['0']['image'] ?>','sharer','toolbar=0,status=0,width=580,height=325');" href="javascript: void(0)">Share</a>-->

                                        <?php
                                        $intro = str_replace("'", "", $post[0]['intro']);
                                        $intro = str_replace('"', '', $intro);
                                        $intro = str_replace('#', '', $intro);
                                        $intro = str_replace(PHP_EOL, '', $intro);
                                         $intro = preg_replace("/&#?[a-z0-9]+;/i","",$intro);
                                        $post[0]['head'] = str_replace('#', '', $post[0]['head']);
                                         $post[0]['head'] = str_replace('"', '', $post[0]['head']);
                                          $post[0]['head'] = str_replace("'", "", $post[0]['head']);
                                           $post[0]['head'] = preg_replace("/&#?[a-z0-9]+;/i","",$post[0]['head']);
                                        ?>

                                        <meta name="twitter:card" content="summary_large_image" />
                            <meta name="twitter:title" content="<?= $post[0]['head'] ?>" />
                            <meta name="twitter:description" content="<?= $post[0]['intro'] ?>" />
                            <meta name="twitter:image" content="http://m.zersey.com/assets/zerseynme/<?= $post[0]['image'] ?>" />


                                <ul class="social-icon-list text-center">
                               <!--<a href="javascript:fbShare('http://zersey.com/postview/<?= str_replace('"', '', $fhed) ?>/<?= $post['0']['id']; ?>', 'Fb', 'fb-share', '<?php echo $post['0']['image']; ?>' , 520, 350)"> Share </a>-->
                              <li class="social-icon-list"><a style="text-decoration: none;" type="icon_link" onClick="window.open(
                  'https://www.facebook.com/dialog/feed?app_id=538927462950396&link=http://m.zersey.com/postview/<?= $fhed ?>/<?= $post[0]['id']?>&picture=http://m.zersey.com/assets/zerseynme/<?= $post[0]['image'] ?>&name=<?= $post['0']['head']?>&caption=Zersey&description=<?=strip_tags($intro)?>')" href="javascript:void(0)"> <i class="fa fa-facebook-square social-icon-list-icon"></i> </a>

                                    </li>
            <li class="social-icon-list"><a onClick="window.open('https://twitter.com/intent/tweet?url=http://m.zersey.com/postview/<?=$fhed?>/<?= $post[0]['id']?>')" href="javascript:void(0)"><i class="fa fa-twitter-square social-icon-list-icon"></i></a></li>

                                    <li class="social-icon-list"><a onClick="window.open('https://www.pinterest.com/pin/create/button/?url=http://m.zersey.com/postview/<?=$fhed?>/<?= $id?>&media=http://m.zersey.com/assets/zerseynme/<?= $post[0]['image'] ?>&description=<?=strip_tags($post['0']['head'])?>')"  href="javascript:void(0)"><i class="fa fa-pinterest-square social-icon-list-icon"></i></a></li>

              <!--<li class="social-icon-list"><a href="#"><i class="fa fa-envelope-square social-icon-list-icon"></i></a></li>

              <li class="social-icon-list"><a href="#"><i class="fa fa-whatsapp social-icon-list-icon"></i></a></li>

              <li class="social-icon-list"><a href="#"><i class="fa fa-commenting-o social-icon-list-icon"></i></a></li></h3>-->

                                </ul>

        <?php
        }
        if (isset($post) || isset($om)) {
            ?>
                                <form method="get" action="" >

                                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px;background:rgba(221, 221, 221, 0.4);margin-bottom:10px;">


                                        <div style="padding:5px;">

                                        </div>
                                        <div style="width:5%;display:inline-block">

                                        </div>
                                        <div style="width:100%;display:inline-block">
                                        <?php
                                        if($uid==NULL)
                                        {

                                            }
                                            else
                                            { ?>
                                            <img src="<?php if ($this->usermodel->getLoginimage($this->session->userdata['user_id'])) {
                echo base_url(); ?>assets/images/merchant/<?php echo ($this->usermodel->getLoginimage($this->session->userdata['user_id']));
            } else {
                echo base_url() . 'assets/images/merchant/usericon.jpg';
            }
            ?>"style="width:15%;" >
                                            <input type="text"  style="width:80%;height:40px" name="comment" id="comment"  placeholder="Write your comment">
                                            <input type="hidden" value="<?= $id ?>" id="post">
                                                                                                  <!--<input type="button" value="Comment" name="postcomment" id="postcomment" style="height:30px;width:120px;background-color:grey;color:#fff;margin-top: 10px; margin-bottom: 10px;"></input>-->
                                 <?php } ?>                                                                 
                                        </div>
                                    </div>
                                    <div style="padding:5px;">

                                        <div style="width:93%;display:inline-block;vertical-align: bottom;" >

                                            <div>
            <?php
        } if (!isset($om)) {
            ?>

                                                <div style="display:inline-block;width: 100%;" id="comments">

                                                                                                                                       <?php
                                                                                                                                       if (isset($com)) {
                                                                                                                                           foreach ($com as $cm) {
                                                                                                                                               ?>



                                                            <div>
                                                                <?php $idu['id'] = $cm['userid'];
                                                                $usrnam = $this->usermodel->where_data('users', $idu);
                                                                ?>

                                                                <a href="<?= base_url() ?>userprofile/<?php echo $usrnam[0]->username; ?> "><img src="<?php if ($this->usermodel->getLoginimage($cm['userid'])) {
                                                echo base_url(); ?>assets/images/merchant/<?php echo ($this->usermodel->getLoginimage($cm['userid']));
                                        } else {
                                            echo base_url() . 'assets/images/merchant/usericon.jpg';
                                        }
                                                                ?>"style="width:10%" ></a>
                                                                <a href="<?= base_url() ?>userprofile/<?php echo $usrnam[0]->username; ?> " style="color:#000;margin-left:5px;"><b><?php echo $this->usermodel->getName($cm['userid']); ?></b>	</a>
                                                                &nbsp; &nbsp; &nbsp;
                                                                <i class="icon-calendar"></i><?php
                                                                // $to_time = strtotime($cm->datetm);
                                                                $to_time = strtotime(str_replace('/', '-', $cm['datetm']));
//echo strtotime("22-03-2015 20:08:16");
                                                                $from_time = strtotime(date("d-m-Y H:i:s"));
                                                                $min = round(abs($to_time - $from_time) / 60);
                                                                if ($min > 59) {
                                                                    $minx = round($min / 60);
                                                                    if ($minx > 23) {
                                                                        $minz = round($minx / 24);
                                                                        if ($minz < 30) {
                                                                            echo ($minz . " Day ago");
                                                                        } else {

                                                                            $a = explode(" ", $cm['datetm']);
                                                                            echo $a[0];
                                                                        }
                                                                    } else {
                                                                        echo $minx . " Hrs ago";
                                                                    }
                                                                } else {
                                                                    echo $min . " Min ago";
                                                                }
                                                                ?>
                                                                <p style="padding-top:5px;" id="comment_section<?= $cm['cmtid'] ?>"><?= $cm['comment'] ?>

                                                                </p>

                    <?php
                    if ($cm['userid'] == $user_id) {
                        ?>
                                                                    <img src="<?= base_url() ?>assets/images/Edit.png" class="images" id="ima<?= $cm['cmtid'] ?>" width="20px" height="20px" style="cursor: pointer;" />
                                                                    <img src="<?= base_url() ?>assets/images/Edit.png" class="images1" id="ima1<?= $cm['cmtid'] ?>" width="20px" height="20px" style="cursor: pointer; display: none;" />
                                                                    <p style="padding-top:5px; display: none;" id="comment_sections<?= $cm['cmtid'] ?>">
                                                                        <input type="text" value="<?= $cm['comment'] ?>" class="update_comment" id="<?= $cm['cmtid'] ?>">
                                                                        <br/>

                                                                        <span style="color:#00F"> Press Tab for cancel editing </span>
                                                                    </p>


                                                                    <p style="padding-top:5px;">
                                                                    <ul style="list-style-type: none; display: none;" class="list" id="list<?= $cm['cmtid'] ?>">
                                                                        <li>
                                                                            <span class="edit" id="<?= $cm['cmtid'] ?>" style="cursor: pointer;"> Edit </span>
                                                                        </li><li>
                                                                            <span class="delete" id="<?= $cm['cmtid'] ?>" style="cursor: pointer;"> Delete </span>
                                                                        </li>
                                                                    </ul>
                                                                    <input type="hidden" value="<?= $cm['cmtid'] ?>" id="com">
                                                                    <input type="hidden" value="<?= $cm['postid'] ?>" id="post">
                                                                    </p>
                                <?php } ?>
                                                            </div>
                            <?php }
                        } ?>
                                                </div>
                        <?php } ?>

                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <?php
                        }
                    }
                    $l = 0;
                    ?>
            </div>
<?php
if (isset($om)) {
    $l++;
    ?>
                <div style="display:inline-block;" id="comments">

                        <?php
                        if (isset($om)) {
                            foreach ($om as $cm) {
                                ?>



                            <div>
                                <?php $idu['id'] = $cm['userid'];
                                $usrnam = $this->usermodel->where_data('users', $idu);
                                ?>

                                <a href="<?= base_url() ?>userprofile/<?php echo $usrnam[0]->username; ?> "><img src="<?php if ($this->usermodel->getLoginimage($cm['userid'])) {
                        echo base_url(); ?>assets/images/merchant/<?php echo ($this->usermodel->getLoginimage($cm['userid']));
                } else {
                    echo base_url() . 'assets/images/merchant/usericon.jpg';
                }
                                ?>"style="width:10%" ></a>
                                <a href="<?= base_url() ?>userprofile/<?php echo $usrnam[0]->username; ?> " style="color:#000;margin-left:5px;"><b><?php echo $this->usermodel->getName($cm['userid']); ?></b>	</a>

                                &nbsp; &nbsp; &nbsp;
                                <i class="icon-calendar"></i><?php
                    // $to_time = strtotime($cm->datetm);
                    $to_time = strtotime(str_replace('/', '-', $cm['datetm']));
//echo $to_time."<br>";
//echo strtotime("22-03-2015 20:08:16");
                    $from_time = strtotime(date("d-m-Y H:i:s"));
//echo $from_time."<br>";
                    $min = round(abs($to_time - $from_time) / 60);
                    if ($min > 59) {
                        $minx = round($min / 60);
                        if ($minx > 23) {
                            $minz = round($minx / 24);
                            if ($minz < 30) {
                                echo ($minz . " Day ago");
                            } else {

                                $a = explode(" ", $cm['datetm']);
                                echo $a[0];
                            }
                        } else {
                            echo $minx . " Hrs ago";
                        }
                    } else {
                        echo $min . " Min ago";
                    }
                    ?>


                                <p style="padding-top:5px;" id="comment_section<?= $cm['cmtid'] ?>"><?= $cm['comment'] ?>

                                </p>

            <?php
            if ($cm['userid'] == $user_id) {
                ?>
                                    <img src="<?= base_url() ?>assets/images/Edit.png" class="images" id="ima<?= $cm['cmtid'] ?>" width="20px" height="20px" style="cursor: pointer;" />
                                    <img src="<?= base_url() ?>assets/images/Edit.png" class="images1" id="ima1<?= $cm['cmtid'] ?>" width="20px" height="20px" style="cursor: pointer; display: none;" />
                                    <p style="padding-top:5px; display: none;" id="comment_sections<?= $cm['cmtid'] ?>">
                                        <input type="text" value="<?= $cm['comment'] ?>" class="update_comment" id="<?= $cm['cmtid'] ?>">
                                        <br/>
                                        <span style="color:#00F"> Press Tab for cancel editing </span>
                                    </p>


                                    <p style="padding-top:5px;">
                                    <ul style="list-style-type: none; display: none;" class="list" id="list<?= $cm['cmtid'] ?>">
                                        <li>
                                            <span class="edit" id="<?= $cm['cmtid'] ?>" style="cursor: pointer;"> Edit </span>
                                        </li><li>
                                            <span class="delete" id="<?= $cm['cmtid'] ?>" style="cursor: pointer;"> Delete </span>
                                        </li>
                                    </ul>
                                    <input type="hidden" value="<?= $cm['cmtid'] ?>" id="com">
                                    <input type="hidden" value="<?= $cm['postid'] ?>" id="post">
                                    </p>
            <?php } ?>
                            </div>
        <?php }
    } ?>
                </div>

<?php
}
if ($l == 1) {
    exit;
}
?>

        </div>
<?php
if (!isset($om)) {
    ?>

            <style>
                .text-center {
                    text-align: center;
                }

                ul, ol {
                    margin-top: 0;
                    margin-bottom: 10px;
                }
                h3 {
                    font-size: 1.2em;
                }
                li {
                    display: list-item;
                    text-align: -webkit-match-parent;
                }
                a, a:link, a:visited, a:focus, a:hover {
                    color: #eee;
                    text-decoration: none;
                    outline: none;
                }
                a {
                    background: 0 0;
                }
                .social-icon-list {
                    list-style-type: none;
                    float: left;
                    padding-bottom: 10px;
                }
                .fa-twitter-square {
                    color: #00aced;
                }
                .social-icon-list-icon {
                    width: 49px;
                    font-size: 40px;
                }

                .fa-facebook-square {
                    color: #3b5998;
                }

                .fa-pinterest-square {
                    color: #dd4b39;
                }

                .fa-envelope-square {
                    color: #999;
                }


                .fa-whatsapp {
                    color: #58ad15;
                }


                .fa-commenting-o {
                    color: #2d197f;
                }



                textarea { margin: 1em; outline: none; text-align: justify; }
                .list
                {
                    margin: -15% 0px 0px 77%;
                    color: #00F;
                    border-style: solid;
                    border:2px;
                    border-color: #00F;

                }

                #fb-share
                {
                    color:#00F;
                }
                #bookmark
                {
                    color: #00F;
                }
                #remove
                {
                    color: #00F;

                }
                .images
                {
                    margin:-20% 0px 0px 94%;
                }
                .images1
                {
                    margin:-12% 0px 0px 94%;
                }
                #bookmarks
                {
                    margin:-20px 0px 0px 190px;
                }

            </style>
            <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
            <script src="<?= base_url() ?>assert/js/jquery.pagination-with-hash-change-2.js"></script>
            <script>
                                $(document).ready(function () {
                                    $('#gallery').Paginationwithhashchange2({
                                        nextSelector: '.next',
                                        prevSelector: '.prev',
                                        // counterSelector: '.counter',
                                        pagingSelector: '.pagination',
                                        itemsPerPage: 1,
                                        initialPage: 1
                                    });

                                    $('#pstnext').click(function ()
                                    {

    <?php
    foreach ($nextpost as $post) {

        $hed = str_replace(" ", "-", $post['head']);
        //echo $hed;
        $hed = preg_replace('/[^A-Za-z0-9\-]/', '', $hed);
        $fhed = substr($hed, 0, 50);
        ?>
                                            $(location).attr('href', 'http://zersey.com/postview/<?= $fhed?>/<?php echo $post['id']; ?>');

        <?php
    }
    //return true;
    ?>
                                    });
                                });
            </script>

            <script>
                $(function () {
                    //  changes mouse cursor when highlighting loawer right of box
                    $("textarea").mousemove(function (e) {
                        var myPos = $(this).offset();
                        myPos.bottom = $(this).offset().top + $(this).outerHeight();
                        myPos.right = $(this).offset().left + $(this).outerWidth();

                        if (myPos.bottom > e.pageY && e.pageY > myPos.bottom - 16 && myPos.right > e.pageX && e.pageX > myPos.right - 16) {
                            $(this).css({cursor: "nw-resize"});
                        } else {
                            $(this).css({cursor: ""});
                        }
                    })
                            //  the following simple make the textbox "Auto-Expand" as it is typed in
                            .keyup(function (e) {
                                //  this if statement checks to see if backspace or delete was pressed, if so, it resets the height of the box so it can be resized properly
                                if (e.which == 8 || e.which == 46) {
                                    $(this).height(parseFloat($(this).css("min-height")) != 0 ? parseFloat($(this).css("min-height")) : parseFloat($(this).css("font-size")));
                                }
                                //  the following will help the text expand as typing takes place
                                while ($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
                                    $(this).height($(this).height() + 1);
                                }
                                ;
                            });
                });
            </script>

            <script>
                $(document).ready(function () {
                    $(".like_div").click(function () {
                        $(".text_div").toggle();
                    });
                });
            </script>
            <script type="text/javascript">

                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', 'UA-36251023-1']);
                _gaq.push(['_setDomainName', 'jqueryscript.net']);
                _gaq.push(['_trackPageview']);

                (function () {
                    var ga = document.createElement('script');
                    ga.type = 'text/javascript'; ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                })();

            </script>
            <script type="text/javascript">
                function isDelete()
                {
                    if (confirm("Do you want to delete this post?"))
                    {
                        return true;
                    } else
                        return false;
                }
            </script>

            <!-- Google Analytics Code -->
    <?php include_once("analyticstracking.php") ?>
    <?php
}
?>

</body>
</html>