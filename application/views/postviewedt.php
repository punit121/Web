<?php
$hed = str_replace(" ", "-", $next[0]['head']);
$hed = preg_replace('/[^A-Za-z0-9\-]/', '', $hed);
$fhed = substr($hed, 0, 50);
?>
<script>
    var isMobile = false;
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|Opera Mobile|Kindle|Windows Phone|PSP|AvantGo|Atomic Web Browser|Blazer|Chrome Mobile|Dolphin|Dolfin|Doris|GO Browser|Jasmine|MicroB|Mobile Firefox|Mobile Safari|Mobile Silk|Motorola Internet Browser|NetFront|NineSky|Nokia Web Browser|Obigo|Openwave Mobile Browser|Palm Pre web browser|Polaris|PS Vita browser|Puffin|QQbrowser|SEMC Browser|Skyfire|Tear|TeaShark|UC Browser|uZard Web|wOSBrowser|Yandex.Browser mobile/i.test(navigator.userAgent))
    {
        isMobile = true;
        location.replace("http://m.zersey.com/postvieweditorial/<?= $fhed ?>/<?= $next[0]['id'] ?>")
    }

    /*alert("Hi");
     if(window.innerWidth < 800)
     {

     window.location.href("http://m.zersey.com/postview/<?= $fhed ?>/<?= $post['0']['id'] ?>");
     }*/
</script>

<?php
if (isset($post)) {
    ?><script src="<?= base_url() ?>assert/js/jquery.xdomainajax.js"></script>
<?php } ?>

<script>
    function twitterShare(url, card, title, description, image) {

        /* var meta = document.createElement('meta');
         meta.name = "twitter:card";
         meta.content = "summary";
         document.getElementsByTagName('head')[0].appendChild(meta);


         var meta_title = document.createElement('meta');
         meta.name = "twitter:title";
         meta.content = title;
         document.getElementsByTagName('head')[0].appendChild(meta_title);

         var meta_desc = document.createElement('meta');
         meta.name = "twitter:description";
         meta.content = description;
         document.getElementsByTagName('head')[0].appendChild(meta_desc);

         var meta_img = document.createElement('meta');
         meta.name = "twitter:image";
         meta.content = image;
         document.getElementsByTagName('head')[0].appendChild(meta_img);*/

        //var winTop = (screen.height / 2) - (winHeight / 2);
        //var winLeft = (screen.width / 2) - (winWidth / 2);
        /*window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);*/
        window.open('https://twitter.com/intent/tweet?url=' + url);
    }

</script>

<?php
if (isset($post)) {
    ?>
    <script>
        $(document).ready(function ()
        {
            //alert($(window).scrollLeft());
            //alert("hi");
            //alert($("#2661").offset().left-$("#2628").offset().left);
            //alert($("#2628").offset().left-$("#2597").offset().left);
            var i = 0;
            $('input[type="button"]').click(function ()
            {

                //alert("hello");

                var editorial = this.id;
                //alert(comment);
                //alert(editorial);
                var comment = $("#comment" + editorial).val();
                //alert(editorial);
                //alert(comment);
                edit = editorial.substr(11);
                if (comment.length == 0)

                {
                    alert("comment should not be empty");
                } else
                {
                    $.ajax({
                        type: "GET",
                        data: "com=" + comment,
                        url: "<?= base_url() ?>users/postviewedt/" + edit,
                        success: function (msg)
                        {
                            $('#comment' + editorial).val("");
                            //alert("Comment posted");
                            $("#comments" + edit).html(msg);

                        }
                    });

                }
            });

            $(".comments").keypress(function (e)
            {

                //alert("hello");



                var editorial = this.id;
                //alert(comment);

                var comment = $("#" + editorial).val();
                //alert(editorial);

                edit = editorial.substr(18);

                if (e.keyCode == 13)
                {
                    //alert(editorial);
                    //alert(comment);
                    ///alert(edit);
                    e.preventDefault();
                    if (comment.length == 0)

                    {
                        alert("comment should not be empty");
                    } else
                    {
                        $.ajax({
                            type: "GET",
                            data: "data=" + comment,
                            url: "<?= base_url() ?>users/postviewedt/" + edit,
                            success: function (msg)
                            {
                                $("#" + editorial).val("");
                                //alert("Comment posted");
                                $("#comments" + edit).html(msg);

                            }
                        });

                    }
                }
            });



            $(".bookmark").click(function ()
            {
                //alert("Hello");
                var userid = $("#userid").val();
                //alert(userid);
                var ids = this.id;
                //alert(ids);
                var id = ids.substr(8);
                //alert(id);
                $.ajax({
                    type: "GET",
                    data: "data=" + userid,
                    url: "<?= base_url() ?>users/bookmark_story/" + id,
                    success: function (msg)
                    {
                        //$('#comment').val("");
                        $("#bookmark" + id).hide();
                        $("#remove" + id).show();
                        //alert("Post has been bookmarked");
                        //$("#bookmarks").html(msg);

                    }
                });

            });

            $(".remove").click(function ()
            {

                var userid = $("#userid").val();
                //alert(userid);
                var ids = this.id;
                //alert(ids);
                var id = ids.substr(6);
                //alert(id);
                $.ajax({
                    type: "GET",
                    data: "remove=" + userid,
                    url: "<?= base_url() ?>users/bookmark_story/" + id,
                    success: function (msg)
                    {
                        //$('#comment').val("");
                        $("#remove" + id).hide();
                        $("#bookmark" + id).show();

                        //alert("Post has been removed from bookmark list");
                        //$("#bookmarks").html(msg);

                    }
                });

            });

            $(".delete").click(function ()
            {
                //alert("Hello");

                var cmtid = this.id;
                //alert(cmtid);
                var postid = $("#post" + cmtid).val();
                //alert(postid);

                if (confirm("Do you want to delete this comment?"))
                {

                    $.ajax({
                        type: "GET",
                        data: "cmtid=" + cmtid,
                        url: "<?= base_url() ?>users/postviewedt/" + postid,
                        success: function (msg)
                        {
                            //$('#comment').val("");
                            $("#comments" + postid).html(msg);

                            //alert("Post has been removed from bookmark list");
                            //$("#bookmarks").html(msg);

                        }
                    });

                }
            });

            $(".edit").click(function ()
            {
                // alert("Hello");
                var id = this.id;


                $("#ima" + id).hide();
                $("#ima1" + id).show();
                $("#comment_section" + id).hide();
                $("#comment_sections" + id).show();
                $("#list" + id).hide();
            });

            $(".update_comment").keypress(function (e)
            {

                var comment_id = this.id;
                //alert(comment_id);
                var comments = $("#" + comment_id).val();
                //alert(comments);

                //alert(postid);

                if (e.keyCode == 13)
                {
                    //alert("HEllo");
                    var postid = $("#post" + comment_id).val();
                    //alert(postid);
                    $.ajax({
                        "type": "GET",
                        "data": {"comment_id": comment_id, "comment": comments},
                        "url": "<?= base_url() ?>users/postviewedt/" + postid,
                        success: function (msg)
                        {
                            //$('#comment').val("");
                            $("#comments" + postid).html(msg);
                            // $("#comment_sections").hide();
                            //alert("Post has been removed from bookmark list");
                            //$("#bookmarks").html(msg);

                        }
                    });
                }
            });



        });
    </script>
    <script>
        $(document).ready(function ()
        {
            $(".tags").hide();
            var i = 0;

            var id = [];
            //alert("hi");
            $("#titles li").each(function (i)
            {
                var value = $(this).val();
                id.push(value);

            });

            //console.log(id[1]);
            //console.log($("#section"+id[1]).offset().top);
            //console.log(id.length);
            $(window).scroll(function ()
            {
                //console.log($(window).scrollTop());
                if ($(window).scrollTop() == 0)
                {
                    $("li").removeClass('active');
                    $("#" + id[0]).addClass('active');
                    //$("#meta"+id[0]).css("display","block");
                }


                for (var i = 0; i < id.length; i++)
                {

                    if (i == id.length - 1)
                    {
                        if ($(window).scrollTop() >= $("#section" + id[i]).offset().top - 400)
                        {
                            //alert("reached");
                            $("li").removeClass('active');
                            $("#" + id[i]).addClass('active');
                            //$(".tags").css("display","none");
                            //$("#meta"+id[i]).css("display","block");
                            $('#titles').stop().animate({
                                scrollLeft: 260 * (i)}, 1000);
                        }

                    } else
                    {
                        if (($(window).scrollTop() >= $("#section" + id[i]).offset().top - 400) && ($(window).scrollTop() < $("#section" + id[i + 1]).offset().top - 400))
                        {

                            //alert("reached");
                            //$(".editorial").append('<object data="http://zersey.com/postvieweditorial/2265">');
                            //$(window).scrollTop() == $("#section"+id[i].offset().top);
                            $("li").removeClass('active');
                            $("#" + id[i]).addClass('active');
                            //alert(id[i]);
                            $("#meta" + id[i - 4]).show();


                            //alert("reached");
                            //  alert($("#"+id[i]).offset().left);
                            $('#titles').stop().animate({
                                scrollLeft: 260 * (i)}, 1000);


                        }
                    }
                }
            });

            $("#titles li").click(function ()
            {
                //alert($(window).scrollTop());
                // alert($("#2265").offset().top);
                var id = this.value;
                // alert( $("#section"+id).offset().top);
                $("li").removeClass('active');
                $("#" + id).addClass('active');

                //alert(id);
                $('html,body').animate({
                    scrollTop: $("#section" + id).offset().top},
                        2000);


                //alert(id);

                /*$.ajax(
                 {
                 type:"GET",
                 url:"http://zersey.com/postvieweditorial/"+id,
                 success:function(msg)
                 {
                 $(".editorial").append(msg);
                 }
                 });*/
            });


            $(".images").click(function ()
            {
                var str = this.id;
                var id = str.substr(3);
                // alert(id);
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
                var id = $("#com").val();
                $("#" + ids).hide();
                $("#ima" + id).show();
                $("#comment_sections" + id).hide();
                $("#comment_section" + id).show();
            });

        });

        //alert(last_post_id);



        /*  $(window).scroll(function() {


         if($(window).scrollTop() == $(document).height() - $(window).height()) {
         //alert("hello");
         if(feeds_ended)return;
         if(loadingposts==true)return;
         loadingposts = true;

         //alert(25 * i);
         //alert(last_post_id);
         //$(".editorial").append('<img src="<?= base_url() ?>assert/images/loading_spinner.gif"  id="loading">');

         /* $.ajax({
         type: "GET",
         data: "data="+ last_post_id,
         url:  "<?= base_url() ?>users/moreposts",
         success: function(msg){
         if(msg==null||msg.trim()==""){feeds_ended = true;}

         loadingposts = false;
         //$("#loading").remove();
         $(".editorial").append(msg);

         //$(".grid").hide();
         },
         error: function(jqXHR, textStatus, errorThrown){
         loadingposts = false;
         }

         });*/


        // ajax call get data from server and append to the div
        /*}
         });*/

        /*$(window).scroll(function(){
         $('img[realsrc]').each(function(i){
         var t = $(this);
         if(t.position().top > ($(window).scrollTop()+$(window).height()){
         t.attr('src', t.attr('realsrc')); // trigger the image load
         t.removeAttr('realsrc'); // so we only process this image once
         }
         });
         });

         });*/


    </script>
    <?php
    ?>

    <script src="<?= base_url(); ?>assert/js/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>assert/js/jquery.sticky.js"></script>
    <script src="<?= base_url(); ?>assert/js/jquery.flexslider-min.js"></script>
    <script src="<?= base_url(); ?>assert/js/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>assert/js/jquery.scrollTo.js"></script>
    <script src="<?= base_url(); ?>assert/js/jquery.appear.js"></script>

    <script src="<?= base_url(); ?>assert/js/stellar.js"></script>
    <script src="<?= base_url(); ?>assert/js/owl.carousel.min.js"></script>
    <script src="<?= base_url(); ?>assert/js/nivo-lightbox.min.js"></script>
    <!--<script src="<?= base_url(); ?>assert/js/bootstrap.min.js"></script>-->

    <script src="<?= base_url(); ?>assert/js/custom.js"></script>

    <script src="<?= base_url(); ?>assert/js/page/home.js"></script>
    <!-- end bandana js-->

    <!-- one page scroll js link start -->
    <script type="text/javascript" src="<?= base_url(); ?>assert/js/modernizr-2.6.2.min.js"></script><!-- You will need Modernizr for the plugin to work. -->
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--><!-- You will need jQuery for the plugin to work. -->
    <script type="text/javascript" src="<?= base_url(); ?>assert/js/jquery.mousewheel.js"></script><!-- You will need mousewheel.js for the plugin to work. -->
    <script type="text/javascript" src="<?= base_url(); ?>assert/js/jquery.easing.min.js"></script><!-- You will need Easing for the plugin to work. -->
    <script type="text/javascript" src="<?= base_url(); ?>assert/js/ninjaScroll.js"></script><!-- This is the main script that I created to perform the scrolling functions -->
    <!-- one page scroll js link close -->

    <!-- simple marque slider code start -->
    <!--<script src="http://code.jquery.com/jquery.js"></script>-->
    <script src="<?= base_url(); ?>assert/js/jquery.picMarque.js"></script>
    <script src="<?= base_url(); ?>assert/js/skdslider.js"></script>
    <script src="<?= base_url(); ?>assert/js/skdslider.min.js"></script>
    <!-- simple marque slider code close -->

    <!-- wizard popup code start -->
    <script src="<?= base_url(); ?>assert/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assert/js/wizard.js"></script>

    <!-- end bandana js-->

    <!-- one page scroll js link start -->
    <script type="text/javascript" src="<?= base_url(); ?>assert/js/modernizr-2.6.2.min.js"></script><!-- You will need Modernizr for the plugin to work. -->
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--><!-- You will need jQuery for the plugin to work. -->
    <script type="text/javascript" src="<?= base_url(); ?>assert/js/jquery.mousewheel.js"></script><!-- You will need mousewheel.js for the plugin to work. -->
    <script type="text/javascript" src="<?= base_url(); ?>assert/js/jquery.easing.min.js"></script><!-- You will need Easing for the plugin to work. -->
    <script type="text/javascript" src="<?= base_url(); ?>assert/js/ninjaScroll.js"></script><!-- This is the main script that I created to perform the scrolling functions -->
    <!-- one page scroll js link close -->

    <!-- simple marque slider code start -->
    <!--<script src="http://code.jquery.com/jquery.js"></script>-->
    <script src="<?= base_url(); ?>assert/js/jquery.picMarque.js"></script>
    <script src="<?= base_url(); ?>assert/js/skdslider.js"></script>
    <script src="<?= base_url(); ?>assert/js/skdslider.min.js"></script>
    <!-- simple marque slider code close -->

    <!-- wizard popup code start -->
    <script src="<?= base_url(); ?>assert/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assert/js/wizard.js"></script>


    <link rel="icon" href="<?= base_url(); ?>asset/images/logo.jpg" type="image/ico">

    <!-- bootstrap css link start -->
    <link href="<?= base_url(); ?>assert/css/bootstrap.min.css" rel="stylesheet" type="text/css"> <!-- bootstrap css link close -->

    <!-- slider css link start -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/mediaquery.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/custom.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/skdslider.css" />
    <noscript>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/styleNoJS.css" />
    </noscript>
    <!-- slider css link close -->

    <!-- one page scroll css link start -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans|Oswald:300' rel='stylesheet' type='text/css'>
    <!--<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/style.css" media="all" />-->
    <!-- one page scroll css link close -->

    <!-- simple marque slider code start -->
    <link href="<?= base_url(); ?>assert/css/jquery.picMarque.css" rel="stylesheet">
    <!-- simple marque slider code close -->


    <link href="<?= base_url(); ?>assert/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assert/css/nivo-lightbox.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assert/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assert/css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="<?= base_url(); ?>assert/css/owl.theme.css" rel="stylesheet" media="screen" />
    <link href="<?= base_url(); ?>assert/css/flexslider.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assert/css/animate.css" rel="stylesheet" />
    <!--	<link href="<?= base_url(); ?>assert/css/styles.css" rel="stylesheet">-->
    <link href="<?= base_url(); ?>assert/css/color/default.css" rel="stylesheet">


    <link rel="stylesheet" media="all" type="text/css" href="style/style-demo.css">

    <script src="script/jquery-1.11.1.js"></script>



    <style>
        .editorial > div{
            background:#fff !important;
        }

        li {
            display: list-item;
            text-align: -webkit-match-parent;
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
        li .headings
        {
            width: 100%;
            white-space: normal;
            font-size: 16px;

            display: table-cell;
            line-height: 1.5;
        }

        li .cnt
        {
            font-size: 22px;
            font-weight: bold;
            padding: 0 10px 0 0;
            position: relative;
            top: 7px;
            display: table-cell;
            vertical-align: top;
        }

        .dropdown-menu {
            background-color: rgba(10, 10, 10, 0.71);
        }
        .dropdown_nev {
            color: white !important;
        }

        #fb-share
        {
            color:#00F;
        }
        #titles
        {
            z-index: 10000;
            background-color: #FFF;
            bottom: 0px;
            position: fixed;

        }
        #report
        {
            color:#00F;
            margin:0px 0px 0px 38%;
        }
        #bookmarks
        {
            margin:-5% 0px 0px 85%;
        }
        #titles li
        {
            width: 9%;
            display: inline-block;
            background-color: rgba(223, 217, 217, 0.4);
            color: #000;
            cursor: pointer;

            position: relative;
            top: -5px;
            border: 1px solid;
            padding: 12px;
        }
        #titles li:hover
        {
            width: 9%;
            display: inline-block;
            background-color: rgba(223, 217, 217, 0.4);
            color: #000;
            cursor: pointer;

            position: relative;
            top: -5px;
            border: 1px solid;
            padding: 12px;
        }
        #2448{
            position: relative;
            top: 20px;
        }

        #titles li.active
        {
            width: 9%;
            display: inline-block;
            /* background-color: #0F0; */
            color: #362D2D;
            cursor: pointer;
            border-top: 5px solid #be2819;

        }
        .corner_fa_icon {
            color: #fff;
            font-size: 18px;
            padding: 5px;
            width: 130%;
            font:normal normal normal 17px/1 FontAwesome;
        }
        .images
        {
            margin: -8% 0px 0px 89%;
        }
        .images1
        {
            margin: -3% 0px 0px 89%;
        }
        .list
        {
            margin: -8% 0px 0px 88%;
            width: 6%;
            color: #00F;
        }
        .dropdown-menu {
            padding: 0;
            margin: 0px 0px 0px 15px;
            color: #FFF;
            text-align: left;
            list-style: none;
            height: 90px;
            width: 160px;

        }
        a.dropdown_nev
        {
            height:26px;
            width:155px;
        }

        .open>.dropdown-menu {
            display: block;
        }
        .dropdown-menu  li {
            display: -moz-inline-box;
            display: inline-block;
            padding: 0px 10px;
            margin:0px 0px 0px -2px;
        }

        .dropdown-menu a {
            color: #FFF;
            text-decoration: none;
            font-weight:bold;
            font-size:14px;
        }

        .dropdown-menu a:hover
        { text-decoration: underline; }
        /* one page scroll code close */

        .navbar-nav>li>.dropdown-menu {
            margin-top: -90px;
            border-top-right-radius: 0;
            border-top-left-radius: 0;
        }
        #like
        {
            margin :-0.5% 0px 0px 0px;
        }
        a
        {
            color:#000;
            text-decoration: none !important;
        }
        .dropdown-toggle {
            color: #fff;
        }
        a:hover
        {
            color:#428bca;
        }
        #comment
        {
            margin:0px 0px 0px 0px;
        }
        #postcomment
        {
            margin: 0% 0px 0px 0%;
        }
        .corner_pls_btn_main {
            color: #ff0000;
            text-decoration: none;
            margin: 5px 0px 80px 0px;
        }

        .navbar-nav > li > .dropdown-menu, .dropdown-menu{
            display: block;
            margin: 0;
            padding: 0;
            z-index: 9000;
            position: absolute;
            -webkit-border-radius: 10px;
            box-shadow: 1px 2px 3px rgba(0, 0, 0, 0.125);
            border-radius: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            opacity: 0;
            -ms-filter: "alpha(opacity=0)";
            -webkit-filter: alpha(opacity=0);
            -moz-filter: alpha(opacity=0);
            -ms-filter: alpha(opacity=0);
            -o-filter: alpha(opacity=0);
            filter: alpha(opacity=0);
            -webkit-transform: scale(0);
            -moz-transform: scale(0);
            -o-transform: scale(0);
            -ms-transform: scale(0);
            transform: scale(0);
            -webkit-transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);
            -moz-transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);
            -o-transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);
            -ms-transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);
            transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);

        }
        .navbar-nav > li.open > .dropdown-menu, .open .dropdown-menu{
            -webkit-transform-origin: 29px -50px;
            -moz-transform-origin: 29px -50px;
            -o-transform-origin: 29px -50px;
            -ms-transform-origin: 29px -50px;
            transform-origin: 29px -50px;
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -o-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
            opacity: 1;
            -ms-filter: none;
            -webkit-filter: none;
            -moz-filter: none;
            -ms-filter: none;
            -o-filter: none;
            filter: none;
        }
        .dropdown-menu:before{
            border-bottom: 11px solid rgba(0, 0, 0, 0.2);
            border-left: 11px solid rgba(0, 0, 0, 0);
            border-right: 11px solid rgba(0, 0, 0, 0);
            content: "";
            display: inline-block;
            position: absolute;
            left: 100%;
            margin-left: -60%;
            top: -11px;
        }
        .dropdown-menu:after {
            border-bottom: 11px solid #FFFFFF;
            border-left: 11px solid rgba(0, 0, 0, 0);
            border-right: 11px solid rgba(0, 0, 0, 0);
            content: "";
            display: inline-block;
            position: absolute;
            left: 100%;
            margin-left: -60%;
            top: -10px;
        }
        ul li {
            display: -moz-inline-box;
            display: inline-block;
            padding: 0 10px;
        }
        #login-form{width:350px; background:#FFF; margin:0 auto; margin-top:70px; background:#f8f8f8; overflow:hidden; border-radius:7px}
        .form-header{display:table; clear:both;}
        .form-header label{display:block; cursor:pointer; z-index:999;}
        .form-header li
        {margin:0; line-height:60px; width:175px; text-align:center; background:#eee; font-size:18px; float:left; transition:all 600ms ease;}

        /*sectiop*/
        .section-out{width:700px; float:left; transition:all 600ms ease}
        .section-out:after{content:''; clear:both; display:table}
        .section-out section{width:350px; float:left}
        .login{padding:20px}
        .ul-list{clear:both; display:table; width:100%}
        .ul-list:after{content:''; clear:both; display:table}
        .ul-list li{ margin:0 auto; margin-bottom:12px;display: -moz-inline-box;}
        .input{background:#fff; transition:all 800ms; width:247px; border-radius:3px 0 0 3px; font-family: 'Ropa Sans', sans-serif; border:solid 1px #ccc; /*border-right:none;*/ outline:none; color:#999; height:40px; line-height:40px; display:inline-block; padding-left:10px; font-size:16px}
        .input,.login span.icon{vertical-align:top}
        .login span.icon{width:50px; transition:all 800ms; text-align:center; color:#999; height:40px; border-radius:0 3px 3px 0; background:#e8e8e8; height:40px; line-height:40px; display:none; border:solid 1px #ccc; border-left:none; font-size:16px}
        .input:focus:invalid{border-color:red}
        .input:focus:invalid+.icon{border-color:red}
        .input:focus:valid{border-color:green}
        .input:focus:valid+.icon{border-color:green}
        #check,#check1{top:1px; position:relative}
        /*.btn{border:none; outline:none;  font-family: 'Ropa Sans', sans-serif; margin:0 auto; display:block; height:40px; width:100%; padding:0 10px; border-radius:3px; font-size:16px; color:#FFF}*/


        .social-login{padding:15px 20px; background:#f1f1f1; border-top:solid 2px #e8e8e8; text-align:right}
        .social-login a{display:inline-block; height:35px; text-align:center; line-height:35px; width:35px; margin:0 3px; text-decoration:none; color:#FFFFFF}
        .form a i.fa{line-height:35px}
        /*.fb{background:#305891} .tw{background:#2ca8d2} .gp{background:#ce4d39} .in{background:#006699}*/
        .remember{width:50%; display:inline-block; clear:both; font-size:14px}
        .remember:nth-child(2){text-align:right}
        .remember a{text-decoration:none;
                    color:#666;
                    font-weight:bold;
                    font-size: 18px;}

        .hide{display:none}

        #signup:checked~.section-out{margin-left:-350px}
        #login:checked~.section-out{margin-left:0px}
        #login:checked~div .form-header li:nth-child(1),#signup:checked~div .form-header li:nth-child(2){background:#c0c0c0}
        section { position: relative; }
        .form-control::-moz-placeholder{
            color: #DDDDDD;
            opacity: 1;
        }
        .form-control:-moz-placeholder{
            color: #DDDDDD;
            opacity: 1;
        }
        .form-control::-webkit-input-placeholder{
            color: #DDDDDD;
            opacity: 1;
        }
        .form-control:-ms-input-placeholder{
            color: #DDDDDD;
            opacity: 1;
        }
        /*     General overwrite     */

        li:hover {
            background-color: rgb(255,255,255);
        }
        a:focus, a:active,
        button::-moz-focus-inner,
        input[type="reset"]::-moz-focus-inner,
        input[type="button"]::-moz-focus-inner,
        input[type="submit"]::-moz-focus-inner,
        select::-moz-focus-inner,
        input[type="file"] > input[type="button"]::-moz-focus-inner {
            outline : 0;
        }

        /*           Animations              */
        .form-control, .input-group-addon{
            -webkit-transition: all 300ms linear;
            -moz-transition: all 300ms linear;
            -o-transition: all 300ms linear;
            -ms-transition: all 300ms linear;
            transition: all 300ms linear;
        }

        /*             Inputs               */



    </style>
    <style>

        <!--comm-->
        body{
            overflow:scroll;


        }


        /* scroll bar removed
                ::-webkit-scrollbar{
                    webkit-appearance: none;
                    width:0px;
                }
                ::-webkit-scrollbar {
                    width:30px;
                    height: 14px;

                }

                ::-webkit-scrollbar-track {
                    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                    border-radius: 10px;

                }

                ::-webkit-scrollbar-thumb {
                    border-radius: 10px;
                    -webkit-box-shadow: inset 0 0 10px rgb(190, 40, 25);
                }
        */


        .box{
            background: rgba(128, 128, 128, 0.17);
            box-shadow: 3px 2px 8px 0px;
            position: relative;
            bottom: 15px;


        }

        <!--comm-->

        .dropdown-menu {
            background-color: rgba(10, 10, 10, 0.71);
        }
        .dropdown_nev {
            color: white !important;
        }


        #titles
        {
            z-index: 10000;
            background-color: #FFF;
            bottom: 0px;
            position: fixed;
            padding: 1px 2px 6px 2px;
        }
        #report
        {
            color:#00F;
            margin:0px 0px 0px 38%;
        }
        #bookmarks
        {
            margin:-5% 0px 0px 85%;
        }
        #titles li
        {
            width: 19%;
            display: inline-block;
            background-color: rgba(223, 217, 217, 0.4);
            color: #000;
            cursor: pointer;

            position: relative;
            top: 3px;
            border: 1px solid;
            padding: 0px 0px 0px 11px;
        }
        #titles li:hover
        {
            width: 19%;
            display: inline-block;
            background-color: rgba(223, 217, 217, 0.4);
            color: #000;
            cursor: pointer;

            position: relative;
            top: 3px;
            border: 1px solid;
            padding: 0px 0px 0px 11px;
        }
        .a1{
            position: relative;
            top: 20px;
        }

        #titles li.active
        {
            width: 19%;
            display: inline-block;
            /* background-color: #0F0; */
            color: #362D2D;
            cursor: pointer;
            border-top: 5px solid #be2819;

        }
        .corner_fa_icon {
            color: #fff;
            font-size: 18px;
            padding: 5px;
            width: 130%;
            font:normal normal normal 17px/1 FontAwesome;
        }
        .images
        {
            margin: -8% 0px 0px 89%;
        }
        .images1
        {
            margin: -3% 0px 0px 89%;
        }
        .list
        {
            margin: -8% 0px 0px 88%;
            width: 6%;
            color: #00F;
        }
        .dropdown-menu {
            padding: 0;
            margin: 0px 0px 0px 15px;
            color: #FFF;
            text-align: left;
            list-style: none;
            height: 90px;
            width: 160px;

        }
        a.dropdown_nev
        {
            height:26px;
            width:155px;
        }

        .open>.dropdown-menu {
            display: block;
        }
        .dropdown-menu  li {
            display: -moz-inline-box;
            display: inline-block;
            padding: 0px 10px;
            margin:0px 0px 0px -2px;
        }

        .dropdown-menu a {
            color: #FFF;
            text-decoration: none;
            font-weight:bold;
            font-size:14px;
        }

        .dropdown-menu a:hover
        { text-decoration: underline; }
        /* one page scroll code close */

        .navbar-nav>li>.dropdown-menu {
            margin-top: -90px;
            border-top-right-radius: 0;
            border-top-left-radius: 0;
        }
        #like
        {
            margin :-0.5% 0px 0px 0px;
        }
        a
        {
            color:#000;
            text-decoration: none !important;
        }
        .dropdown-toggle {
            color: #fff;
        }
        a:hover
        {
            color:#428bca;
        }
        #comment
        {
            margin:0px 0px 0px 0px;
        }
        #postcomment
        {
            margin: 0% 0px 0px 0%;
        }
        .corner_pls_btn_main {
            color: #ff0000;
            text-decoration: none;
            margin: 5px 0px 80px 0px;
        }

        .navbar-nav > li > .dropdown-menu, .dropdown-menu{
            display: block;
            margin: 0;
            padding: 0;
            z-index: 9000;
            position: absolute;
            -webkit-border-radius: 10px;
            box-shadow: 1px 2px 3px rgba(0, 0, 0, 0.125);
            border-radius: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            opacity: 0;
            -ms-filter: "alpha(opacity=0)";
            -webkit-filter: alpha(opacity=0);
            -moz-filter: alpha(opacity=0);
            -ms-filter: alpha(opacity=0);
            -o-filter: alpha(opacity=0);
            filter: alpha(opacity=0);
            -webkit-transform: scale(0);
            -moz-transform: scale(0);
            -o-transform: scale(0);
            -ms-transform: scale(0);
            transform: scale(0);
            -webkit-transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);
            -moz-transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);
            -o-transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);
            -ms-transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);
            transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);

        }
        .navbar-nav > li.open > .dropdown-menu, .open .dropdown-menu{
            -webkit-transform-origin: 29px -50px;
            -moz-transform-origin: 29px -50px;
            -o-transform-origin: 29px -50px;
            -ms-transform-origin: 29px -50px;
            transform-origin: 29px -50px;
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -o-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
            opacity: 1;
            -ms-filter: none;
            -webkit-filter: none;
            -moz-filter: none;
            -ms-filter: none;
            -o-filter: none;
            filter: none;
        }
        .dropdown-menu:before{
            border-bottom: 11px solid rgba(0, 0, 0, 0.2);
            border-left: 11px solid rgba(0, 0, 0, 0);
            border-right: 11px solid rgba(0, 0, 0, 0);
            content: "";
            display: inline-block;
            position: absolute;
            left: 100%;
            margin-left: -60%;
            top: -11px;
        }
        .dropdown-menu:after {
            border-bottom: 11px solid #FFFFFF;
            border-left: 11px solid rgba(0, 0, 0, 0);
            border-right: 11px solid rgba(0, 0, 0, 0);
            content: "";
            display: inline-block;
            position: absolute;
            left: 100%;
            margin-left: -60%;
            top: -10px;
        }
        ul li {
            display: -moz-inline-box;
            display: inline-block;
            padding: 0 10px;
        }
        #login-form{width:350px; background:#FFF; margin:0 auto; margin-top:70px; background:#f8f8f8; overflow:hidden; border-radius:7px}
        .form-header{display:table; clear:both;}
        .form-header label{display:block; cursor:pointer; z-index:999;}
        .form-header li
        {margin:0; line-height:60px; width:175px; text-align:center; background:#eee; font-size:18px; float:left; transition:all 600ms ease;}

        /*sectiop*/
        .section-out{width:700px; float:left; transition:all 600ms ease}
        .section-out:after{content:''; clear:both; display:table}
        .section-out section{width:350px; float:left}
        .login{padding:20px}
        .ul-list{clear:both; display:table; width:100%}
        .ul-list:after{content:''; clear:both; display:table}
        .ul-list li{ margin:0 auto; margin-bottom:12px;display: -moz-inline-box;}
        .input{background:#fff; transition:all 800ms; width:247px; border-radius:3px 0 0 3px; font-family: 'Ropa Sans', sans-serif; border:solid 1px #ccc; /*border-right:none;*/ outline:none; color:#999; height:40px; line-height:40px; display:inline-block; padding-left:10px; font-size:16px}
        .input,.login span.icon{vertical-align:top}
        .login span.icon{width:50px; transition:all 800ms; text-align:center; color:#999; height:40px; border-radius:0 3px 3px 0; background:#e8e8e8; height:40px; line-height:40px; display:none; border:solid 1px #ccc; border-left:none; font-size:16px}
        .input:focus:invalid{border-color:red}
        .input:focus:invalid+.icon{border-color:red}
        .input:focus:valid{border-color:green}
        .input:focus:valid+.icon{border-color:green}
        #check,#check1{top:1px; position:relative}
        /*.btn{border:none; outline:none;  font-family: 'Ropa Sans', sans-serif; margin:0 auto; display:block; height:40px; width:100%; padding:0 10px; border-radius:3px; font-size:16px; color:#FFF}*/


        .social-login{padding:15px 20px; background:#f1f1f1; border-top:solid 2px #e8e8e8; text-align:right}
        .social-login a{display:inline-block; height:35px; text-align:center; line-height:35px; width:35px; margin:0 3px; text-decoration:none; color:#FFFFFF}
        .form a i.fa{line-height:35px}
        /*.fb{background:#305891} .tw{background:#2ca8d2} .gp{background:#ce4d39} .in{background:#006699}*/
        .remember{width:50%; display:inline-block; clear:both; font-size:14px}
        .remember:nth-child(2){text-align:right}
        .remember a{text-decoration:none;
                    color:#666;
                    font-weight:bold;
                    font-size: 18px;}

        .hide{display:none}

        #signup:checked~.section-out{margin-left:-350px}
        #login:checked~.section-out{margin-left:0px}
        #login:checked~div .form-header li:nth-child(1),#signup:checked~div .form-header li:nth-child(2){background:#c0c0c0}
        section { position: relative; }
        .form-control::-moz-placeholder{
            color: #DDDDDD;
            opacity: 1;
        }
        .form-control:-moz-placeholder{
            color: #DDDDDD;
            opacity: 1;
        }
        .form-control::-webkit-input-placeholder{
            color: #DDDDDD;
            opacity: 1;
        }
        .form-control:-ms-input-placeholder{
            color: #DDDDDD;
            opacity: 1;
        }
        /*     General overwrite     */

        li:hover {
            background-color: rgb(255,255,255);
        }
        a:focus, a:active,
        button::-moz-focus-inner,
        input[type="reset"]::-moz-focus-inner,
        input[type="button"]::-moz-focus-inner,
        input[type="submit"]::-moz-focus-inner,
        select::-moz-focus-inner,
        input[type="file"] > input[type="button"]::-moz-focus-inner {
            outline : 0;
        }

        /*           Animations              */
        .form-control, .input-group-addon{
            -webkit-transition: all 300ms linear;
            -moz-transition: all 300ms linear;
            -o-transition: all 300ms linear;
            -ms-transition: all 300ms linear;
            transition: all 300ms linear;
        }

        /*             Inputs               */


        .article_divider {
            border-top: 8px solid #ccc;
            margin: 0 20px;
            font-size: 15px;
            color: #ccc;
            text-align: center;
            margin-bottom: -70px;}

        .article_divider:before {
            content: "";
            display: block;
            margin: auto;
            margin-bottom: 10px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 10px solid #ccc;
        }
    </style>
    <!-- slider css link start -->       <!-- slider css link start -->


    <div class="container popup_div_post" style="width:100%;" id="header">
        <?php
    } if (isset($post)) {
        ?>
        <div>
            <a href="dashboard"><i class="fa fa-times fa-2x popup_cross_icon"></i></a>
        </div>
        <?php
    } /* if(isset($post))
      {
      ?>

      <div class="editorial">
      <?php if(isset($post)){
      foreach($post as $pt){
      $id= $pt['id'];
      $uid=$this->session->userdata['user_id'];
      $cntpost= $this->datamodel->getlikecount($id);


      ?>
      <?php if($postdetail){

      foreach($postdetail as $ptd){
      ?>


      <div class="col-lg-12 col-md-12 col-sm-12"style="width:100%;" >
      <div class="col-lg-12 col-md-12 col-sm-12"style="width:100%;"  >
      <div>
      <?php if(file_exists("http://m.zersey.com/assets/zerseynme/$pic")){?>
      <img src="http://m.zersey.com/assets/zerseynme/<?= $pt['image']?>" style="width:100%; height:550px;"/>
      <?php } else { ?>
      <img src="http://m.zersey.com/assets/zerseynme/<?= $pt['image']?>" style="width:100%; height:550px;"/>

      <?php } ?>
      <div style="width:70%;font-size:50px;position: absolute;margin-top: -300px;z-index=100;line-height:120%;color:#fff;font-family:nyt-mag-slab,georgia,times new roman,times,serif;">
      <b><?= ucfirst( $pt['head'])?></b></br>
      <p style="float:right;font-size:30px"><?php echo "By ".$this->usermodel->getName($pt['userid']);?></p>

      </div>
      </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="col-lg-10 col-md-10 col-sm-10" style="padding:0px;">
      <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px;">
      <?php  if($this->session->userdata['user_id']==$pt['userid'])
      {?>
      <a href="<?= base_url()?>deletepost/<?= $pt['id']?>" style="text-decoration:none; color:#000; float:right;" onclick="return isDelete();"><i class="fa fa-trash"></i> &nbsp;</a>

      <a href="<?= base_url()?>postedit3/<?= $pt['id']?>" style="text-decoration:none; color:#000; float:right"><i class="fa fa-pencil"></i>&nbsp;</a><?php } ?>
      <p><?= ucfirst( $pt['intro'])?></p>
      <p><?= ucfirst($ptd['description'])?></p>
      </div>

      <?php }}?>

      <?php }}?>


      <div>
      <a id="fb-share"style='text-decoration:none;' type="icon_link" onClick="window.open('http://www.facebook.com/sharer.php?s=100&p[title]=<?php echo $post['0']['head']; ?>&p[summary]=<?php echo strip_tags($post['0']['intro']); ?>&p[url]=http://zersey.com/postvieweditorial/<?php echo $post['0']['id'];?>&p[images][0]=<?php echo $post['0']['image'];?>',
      'sharer','toolbar=0,status=0,width=580,height=325');" href="javascript: void(0)"> Share </a> </div>
      <form method="post" action="">

      <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px;background:rgba(221, 221, 221, 0.4);margin-bottom:10px;">
      <div style="padding:15px;">

      <?php if($uid==NULL)
      {
      ?>


      <a data-toggle="modal" data-target="#myModal" href="#" style="border: none;">
      <input type="submit" value="Like:" name="like" id="like" style="display:inline-block; border: none; background-color: transparent;">

      </input>
      </a>
      <?php
      }
      else
      {
      ?>
      <input type="submit" value="Like:" name="like"  id="like" style="display:inline-block; border: none; background-color: transparent;">
      <?php
      }
      ?>
      <p style="display:inline-block;"> <?= $count?> </p>
      </div>

      <div style="padding:5px;">
      <div style="width:5%;display:inline-block">
      <img src="<?php if($this->usermodel->getLoginimage($this->session->userdata['user_id'])){ echo base_url();?>assets/images/merchant/<?php echo ($this->usermodel->getLoginimage($this->session->userdata['user_id']));}
      else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>"style="width:100%;" >								</div>
      <div style="width:93%;display:inline-block">
      <input type="text"  style="width:80%;height:50px" id="comment" name="comment" placeholder="Write your comment">
      <?php if($uid==NULL)
      {
      ?>

      <a data-toggle="modal" data-target="#myModal" href="#" style="border: none;">
      <input type="submit" value="Comment" name="postcomment" id="postcomment" style="height:50px;width:150px;background-color:grey;color:#fff"></input>
      </a>
      <?php
      }
      else
      {
      ?>
      <input type="submit" value="Comment" name="postcomment" id="postcomment" style="height:50px;width:150px;background-color:grey;color:#fff"></input>
      <?php
      }
      ?>

      </div>
      </div>

      <div style="padding:5px;">

      <div style="width:93%;display:inline-block;vertical-align: bottom;">

      <div>
      <div style="display:inline-block;">

      <?php

      if(isset($com))
      {
      foreach($com as $cm){
      ?>



      <div>
      <?php	 			 $idu['id']=$cm['userid'];
      $usrnam=$this->usermodel->where_data('users',$idu);?>

      <a href="<?= base_url()?>userprofile/<?php echo $usrnam[0]->username;?> "><img src="<?php if($this->usermodel->getLoginimage($cm['userid'])){ echo base_url();?>assets/images/merchant/<?php echo ($this->usermodel->getLoginimage($cm['userid']));}
      else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>"style="width:10%" ></a>
      <a href="<?= base_url()?>userprofile/<?php echo $usrnam[0]->username;?> "><b><?php echo $this->usermodel->getName($cm['userid']); ?></b>	</a> <?php echo $cm['datetm']; ?>
      <p style="margin-left:50px;"><?= $cm['comment']?></p>
      </div>
      <?php }}?>
      </div>

      </div>
      </div>
      </div>
      </div>
      </form>
      </div>

      </div>
      </div>
      </div>
      <?php
      } */
    //print_r($edit);

    $k = -1;
    ;
    foreach ($next as $pt) {
        $k++;
        $id = $pt['id'];

        $hed = str_replace(" ", "-", $pt['head']);
        $hed = preg_replace('/[^A-Za-z0-9\-]/', '', $hed);
        $fhed = substr($hed, 0, 50);

        $uid = $this->session->userdata['user_id'];
        $cntpost = $this->datamodel->getlikecount($id);
        ?>
        <?php
        if (isset($post)) {
            ?>
            <br>
            <br>
            <br>

            <div class="editorial">
                <div class="col-lg-12 col-md-12 col-sm-12"  id="section<?= $pt['id'] ?>" style="width:100%;" >

                    <div class="col-lg-12 col-md-12 col-sm-12"style="width:100%;"  >
                        <div>
                            <h2 style="text-align: center; font: normal 400%/110% proxima-semibold,roboto slab,roboto,arial,sans-serif; color: #000; "> <b>  <?php echo $pt['head']; ?> </b></h2>
                            <?php if (file_exists("http://m.zersey.com/assets/zerseynme/$pic")) { ?>
                                <img src="http://m.zersey.com/assets/zerseynme/<?= $pt['image'] ?>" style="width:100%; height:550px;"/>
                            <?php } else { ?>
                                <img src="http://m.zersey.com/assets/zerseynme/<?= $pt['image'] ?>" style="width:100%; height:550px;"/>

                            <?php } ?>
                            <!-- <div style="width:70%;font-size:50px;position: absolute;margin-top: -300px;z-index=100;line-height:120%;color:#fff;font-family:nyt-mag-slab,georgia,times new roman,times,serif;">
                                 <b><?= ucfirst($pt['head']) ?></b></br>
                                      <p style="float:right;font-size:30px"><?php echo "By " . $this->usermodel->getName($pt['userid']); ?></p>

                             </div>-->
                        </div>
                        <?php
                        $idu['id'] = $pt['userid'];
                        $usrnam = $this->usermodel->where_data('users', array('id' => $idu['id']));
                        ?>
                        <a href="<?= base_url() ?>userprofile/<?php echo $usrnam[0]->username; ?>">
                            <p style="float:right;font-size:30px;margin:0px 10% 0px 0px;"><?php echo "By " . $this->usermodel->getName($pt['userid']); ?></p>
                        </a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-10 col-md-10 col-sm-10" style="padding:0px;">



                            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px;">

                                <?php if ($this->session->userdata['user_id'] == $pt['userid']) {
                                    ?>
                                    <a href="<?= base_url() ?>deletepost/<?= $pt['id'] ?>" style="text-decoration:none; color:#000; float:right;" onclick="return isDelete();"><i class="fa fa-trash"></i> &nbsp;</a>

                                    <a href="<?= base_url() ?>postedit3/<?= $pt['id'] ?>" style="text-decoration:none; color:#000; float:right"><i class="fa fa-pencil"></i>&nbsp;</a><?php } ?>
                                <?php // no security here but ?>
                                <p><?= $pt['intro'] ?></p>
                                <p><?= strip_tags(ucfirst($editorialdetail[$k]['0']['description'])) ?></p>
                            </div>



                            <?php
                            $intro = str_replace("'", "", $pt['intro']);
                            $intro = str_replace('"', '', $intro);
                            $intro = str_replace('#', '', $intro);
                            $intro = str_replace(PHP_EOL, '', $intro);
                            $intro = preg_replace("/&#?[a-z0-9]+;/i", "", $intro);
                            $pt['head'] = str_replace('#', '', $pt['head']);
                            $pt['head'] = str_replace('"', '', $pt['head']);
                            $pt['head'] = str_replace("'", "", $pt['head']);
                            $pt['head'] = preg_replace("/&#?[a-z0-9]+;/i", "", $pt['head']);
                            $editorialdetail[$k]['0']['description'] = str_replace(PHP_EOL, '', $editorialdetail[$k]['0']['description']);
                            $editorialdetail[$k]['0']['description'] = str_replace('#', '', $editorialdetail[$k]['0']['description']);
                            $editorialdetail[$k]['0']['description'] = str_replace('"', '', $editorialdetail[$k]['0']['description']);
                            $editorialdetail[$k]['0']['description'] = str_replace("'", "", $editorialdetail[$k]['0']['description']);
                            ?>

                            <div class="tags" style="display:block;" id="meta<?= $pt['id'] ?>">

                                <meta name="twitter:card" content="summary_large_image" />
                                <meta name="twitter:title" content="<?= $pt['head'] ?>" />
                                <meta name="twitter:description" content="<?= strip_tags($pt['intro']) ?>" />
                                <meta name="twitter:image" content="http://m.zersey.com/assets/zerseynme/<?= $pt['image'] ?>" />
                            </div>

                            <ul class="social-icon-list text-center">
                           <!--<a href="javascript:fbShare('http://zersey.com/postview/<?= str_replace('"', '', $fhed) ?>/<?= $post['0']['id']; ?>', 'Fb', 'fb-share', '<?php echo $post['0']['image']; ?>' , 520, 350)"> Share </a>-->
                                <li class="social-icon-list"><a style="text-decoration: none;" type="icon_link" onClick="window.open(
                                                        'https://www.facebook.com/dialog/feed?app_id=538927462950396&link=http://m.zersey.com/postvieweditorial/<?= $fhed ?>/<?= $id ?>&picture=http://m.zersey.com/assets/zerseynme/<?= $pt['image'] ?>&caption=<?= $pt['head'] ?>&description=<?= strip_tags($intro) ?>')" href="javascript:void(0)"> <i class="fa fa-facebook-square social-icon-list-icon"></i> </a>

                                </li>

                                <li class="social-icon-list"><a onClick="window.open('https://twitter.com/intent/tweet?url=http://m.zersey.com/postvieweditorial/<?= $fhed ?>/<?= $id ?>')" href="javascript:void(0)"><i class="fa fa-twitter-square social-icon-list-icon"></i></a></li>

                                <li class="social-icon-list"><a onClick="window.open('https://www.pinterest.com/pin/create/button/?url=http://m.zersey.com/postvieweditorial/<?= $fhed ?>/<?= $id ?>&media=http://m.zersey.com/assets/zerseynme/<?= $pt['image'] ?>&description=<?= strip_tags($pt['head']) ?>')" href="javascript:void(0)"><i class="fa fa-pinterest-square social-icon-list-icon"></i></a></li>

                                                      <!--<li class="social-icon-list"><a href="#"><i class="fa fa-envelope-square social-icon-list-icon"></i></a></li>

                                                      <li class="social-icon-list"><a href="#"><i class="fa fa-whatsapp social-icon-list-icon"></i></a></li>

                                                      <li class="social-icon-list"><a href="#"><i class="fa fa-commenting-o social-icon-list-icon"></i></a></li></h3>-->

                            </ul>


                            <div>
                            <!-- <a id="fb-share"style='text-decoration:none;' type="icon_link" onClick="window.open('http://www.facebook.com/sharer.php?s=100&p[title]=<?php echo $post['0']['head']; ?>&p[summary]=<?php echo strip_tags($post['0']['intro']); ?>&p[url]=http://zersey.com/postvieweditorial/<?php echo $post['0']['id']; ?>&p[images][0]=<?php echo $post['0']['image']; ?>',
                                   'sharer','toolbar=0,status=0,width=580,height=325');" href="javascript: void(0)"> Share </a>-->

                                &nbsp; &nbsp;

                                <a href="#myModalreport<?= $pt['id'] ?>" data-toggle="modal" id="report" class="<?= $pt['id'] ?>" style='text-decoration:none;'> Report Abuse </a>

                                <div id="bookmarks">

                                    <?php
                                    $boo = $this->usermodel->where_data('bookmark', array('postid' => $id));


                                    if (count($boo) != 0) {
                                        for ($i = 0; $i < count($boo); $i++) {
                                            if ($uid == $boo[$i]->userid) {
                                                if ($boo[$i]->status == 1) {
                                                    ?>
                                                    <img id="remove<?= $pt['id'] ?>" class="remove" src="<?= base_url() ?>assets/images/Bookmark Icon_2.png" width="40px" height="30px">
                                                    <img id="bookmark<?= $pt['id'] ?>" class="bookmark" src="<?= base_url() ?>assets/images/Bookmark Icon_1.png" width="40px" height="30px" style="display: none;">
                                                    <?php
                                                }
                                                if ($boo[$i]->status == 0) {
                                                    ?>
                                                    <img id="remove<?= $pt['id'] ?>" class="remove" src="<?= base_url() ?>assets/images/Bookmark Icon_2.png" width="40px" height="30px" style="display:none;">
                                                    <img id="bookmark<?= $pt['id'] ?>" class="bookmark" src="<?= base_url() ?>assets/images/Bookmark Icon_1.png" width="40px" height="30px">
                                                    <?php
                                                }
                                            }
                                        }
                                    } else {
                                        ?>
                                        <img id="remove<?= $pt['id'] ?>" class="remove" src="<?= base_url() ?>assets/images/Bookmark Icon_2.png" width="40px" height="30px" style="display:none;">
                                        <img id="bookmark<?= $pt['id'] ?>" class="bookmark" src="<?= base_url() ?>assets/images/Bookmark Icon_1.png" width="40px" height="30px">

                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <form method="post" action="">

                        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px;background:rgba(221, 221, 221, 0.4);margin-bottom:10px;">

                            <div style="padding:15px;">

                                <?php
                                if ($uid == NULL) {
                                    ?>

                                    <a data-toggle="modal" data-target="#myModal" href="#" style="border: none;">
                                        <input type="submit" value="Like:" name="like" id="like" style="display:inline-block; border: none; background-color: transparent;">

                                        </input>
                                    </a>
                                    <?php
                                } else {
                                    ?>
                                    <input type="submit" value="Like:" name="like"  id="like" style="display:inline-block; border: none; background-color: transparent;">
                                    <?php
                                }
                                ?>
                                <p style="display:inline-block;"> <?= $count ?> </p>


                                <div class="modal fade" id="myModalreport<?= $pt['id'] ?>" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" style="color: #000;
                                                    font-weight: bold;">Comment</h4>
                                            </div>
                                            <form action="" method="post">
                                                <input type="hidden" name="postid" id="postid" value="<?= $pt['id'] ?>" />
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


                                                        <input type="hidden" name="userid" id="userid" value="<?php echo $uid; ?>" />

                                                    </div>
                                                </div>


                                                <div class="modal-footer">


                                                    <input type="button" value="Cancel" class="btn" data-dismiss="modal">

                                                    <input type="submit" value="Save" name="save" class="btn" style="background:#993737;color:#fff;">

                                                </div></form>
                                        </div>

                                    </div>
                                </div>


                            </div>

                            <div style="padding:5px;">
                                <div style="width:5%;display:inline-block">

                                    <img src="<?php
                                    if ($this->usermodel->getLoginimage($this->session->userdata['user_id'])) {
                                        echo base_url();
                                        ?>assets/images/merchant/<?php
                                             echo ($this->usermodel->getLoginimage($this->session->userdata['user_id']));
                                         } else {
                                             echo base_url() . 'assets/images/merchant/usericon.jpg';
                                         }
                                         ?>"style="width:100%;" >                             </div>
                                <div style="width:93%;display:inline-block">
                                    <input type="text"  style="width:100%;height:50px" class="comments" id="commentpostcomment<?= $pt['id'] ?>" name="comment" placeholder="Write your comment">
                                    <?php
                                    if ($uid == NULL) {
                                        ?>

                                        <a data-toggle="modal" data-target="#myModal" href="#" style="border: none;">
                                            <input type="hidden" id="editorial_id" value="<?= $pt['id'] ?>">
                   <!--<input type="button" value="Comment" name="postcomment" id="postcomment<?= $pt['id'] ?>" style="height:50px;width:150px;background-color:grey;color:#fff"></input>-->
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <input type="hidden" id="editorial_id" value="<?= $pt['id'] ?>">
                                        <!--<input type="button" value="Comment" name="postcomment" id="postcomment<?= $pt['id'] ?>" style="height:50px;width:150px;background-color:grey;color:#fff"></input>-->
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>

                        </div>
                    </form>




                    <div style="padding:5px;">

                        <div style="width:93%;display:inline-block;vertical-align: bottom;">


                            <div>



                                <div style="width:100%;display:inline-block;" id="comments<?= $pt['id'] ?>">
                                    <?php
                                    for ($j = 0; $j < count($com[$k]); $j++) {
                                        //print_r($com[$i]);
                                        $idu = $com[$k][$j]['userid'];
                                        $cm['postid'] = $pt['id'];

                                        $usrnam = $this->usermodel->where_data('users', array('id' => $idu));
                                        ?>

                                        <a href="<?= base_url() ?>userprofile/<?php echo $usrnam[0]->username; ?> "><img src="<?php
                                            if ($this->usermodel->getLoginimage($com[$k][$j]['userid'])) {
                                                echo base_url();
                                                ?>assets/images/merchant/<?php
                                                                                                                             echo ($this->usermodel->getLoginimage($com[$k][$j]['userid']));
                                                                                                                         } else {
                                                                                                                             echo base_url() . 'assets/images/merchant/usericon.jpg';
                                                                                                                         }
                                                                                                                         ?>"style="width:10%" ></a>
                                        <a href="<?= base_url() ?>userprofile/<?php echo $usrnam[0]->username; ?> "><b><?php echo $this->usermodel->getName($com[$k][$j]['userid']); ?></b>    </a>

                                        &nbsp; &nbsp; &nbsp;
                                        <i class="icon-calendar"></i><?php
                                        // $to_time = strtotime($cm->datetm);
                                        $to_time = strtotime(str_replace('/', '-', $com[$k][$j]['datetm']));
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

                                                    $a = explode(" ", $com[$k][$j]['datetm']);
                                                    echo $a[0];
                                                }
                                            } else {
                                                echo $minx . " Hrs ago";
                                            }
                                        } else {
                                            echo $min . " Min ago";
                                        }
                                        ?>

                                        <p style="margin-left:50px;" id="comment_section<?= $com[$k][$j]['cmtid'] ?>"><?= $com[$k][$j]['comment'] ?></p>

                                        <?php
                                        if ($com[$k][$j]['userid'] == $uid) {
                                            ?>
                                            <img src="<?= base_url() ?>assets/images/Edit.png" class="images" id="ima<?= $com[$k][$j]['cmtid'] ?>" width="20px" height="20px" style="cursor: pointer;" />
                                            <img src="<?= base_url() ?>assets/images/Edit.png" class="images1" id="ima1<?= $com[$k][$j]['cmtid'] ?>" width="20px" height="20px" style="cursor: pointer; display: none;" />
                                            <p style="padding-top:5px; display: none;" id="comment_sections<?= $com[$k][$j]['cmtid'] ?>">
                                                <input type="text" value="<?= $com[$k][$j]['comment'] ?>" class="update_comment" id="<?= $com[$k][$j]['cmtid'] ?>">
                                            </p>
                                            <p style="padding-top:5px;">
                                            <ul style="list-style-type: none; display: none;" class="list" id="list<?= $com[$k][$j]['cmtid'] ?>">
                                                <li>
                                                    <span class="edit" id="<?= $com[$k][$j]['cmtid'] ?>" style="cursor: pointer;"> Edit </span>
                                                </li><li>
                                                    <span class="delete" id="<?= $com[$k][$j]['cmtid'] ?>" style="cursor: pointer;"> Delete </span>
                                                </li>
                                            </ul>
                                            <input type="hidden" value="<?= $com[$k][$j]['cmtid'] ?>" id="com">
                                            <input type="hidden" value="<?= $com[$k][$j]['postid'] ?>" id="post">
                                            </p>
                                        <?php } ?>

                                        <?php
                                    }
                                    ?>
                                </div>

                                <?php
                            }
                            if (isset($om)) {
                                ?>





                                <?php
                                for ($j = 0; $j < count($om[$k]); $j++) {
                                    $idu = $om[$k][$j]['userid'];
                                    $cm['postid'] = $pt['id'];


                                    $usrnam = $this->usermodel->where_data('users', array('id' => $idu));
                                    ?>

                                    <a href="<?= base_url() ?>userprofile/<?php echo $usrnam[0]->username; ?> "><img src="<?php
                                        if ($this->usermodel->getLoginimage($om[$k][$j]['userid'])) {
                                            echo base_url();
                                            ?>assets/images/merchant/<?php
                                                                                                                         echo ($this->usermodel->getLoginimage($om[$k][$j]['userid']));
                                                                                                                     } else {
                                                                                                                         echo base_url() . 'assets/images/merchant/usericon.jpg';
                                                                                                                     }
                                                                                                                     ?>"style="width:10%" ></a>
                                    <a href="<?= base_url() ?>userprofile/<?php echo $usrnam[0]->username; ?> "><b><?php echo $this->usermodel->getName($om[$k][$j]['userid']); ?></b>    </a>
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="icon-calendar"></i><?php
                                    // $to_time = strtotime($cm->datetm);
                                    $to_time = strtotime(str_replace('/', '-', $om[$k][$j]['datetm']));
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

                                                $a = explode(" ", $om[$k][$j]['datetm']);
                                                echo $a[0];
                                            }
                                        } else {
                                            echo $minx . " Hrs ago";
                                        }
                                    } else {
                                        echo $min . " Min ago";
                                    }
                                    ?>

                                    <p style="margin-left:50px;" id="comment_section<?= $om[$k][$j]['cmtid'] ?>"><?= $om[$k][$j]['comment'] ?></p>

                                    <?php
                                    if ($om[$k][$j]['userid'] == $uid) {
                                        ?>
                                        <img src="<?= base_url() ?>assets/images/Edit.png" class="images" id="ima<?= $om[$k][$j]['cmtid'] ?>" width="20px" height="20px" style="cursor: pointer;" />
                                        <img src="<?= base_url() ?>assets/images/Edit.png" class="images1" id="ima1<?= $om[$k][$j]['cmtid'] ?>" width="20px" height="20px" style="cursor: pointer; display: none;" />
                                        <p style="padding-top:5px; display: none;" id="comment_sections<?= $om[$k][$j]['cmtid'] ?>">
                                            <input type="text" value="<?= $om[$k][$j]['comment'] ?>" class="update_comment" id="<?= $om[$k][$j]['cmtid'] ?>">
                                        </p>
                                        <p style="padding-top:5px;">
                                        <ul style="list-style-type: none; display: none;" class="list" id="list<?= $om[$k][$j]['cmtid'] ?>">
                                            <li>
                                                <span class="edit" id="<?= $om[$k][$j]['cmtid'] ?>" style="cursor: pointer;"> Edit </span>
                                            </li><li>
                                                <span class="delete" id="<?= $om[$k][$j]['cmtid'] ?>" style="cursor: pointer;"> Delete </span>
                                            </li>
                                        </ul>
                                        <input type="hidden" value="<?= $om[$k][$j]['cmtid'] ?>" id="com">
                                        <input type="hidden" value="<?= $om[$k][$j]['postid'] ?>" id="post">
                                        </p>
                                    <?php } ?>
                                    <?php
                                }
                                ?>




                            <?php }
                            ?>
                        </div>
                    </div>

                </div>

                <?php
                if (!isset($post)) {
                    break;
                }
                ?>
            </div>
        </div>
        <!--comm---->
        <div class="article_divider">
            <p style="position: relative;top: 66px;">NEXT STORY	</p>


        </div>
        <!--comm---->
        <?php
    }

    if (isset($post)) {
        ?>


        <div class="col-lg-2 col-md-2 col-sm-2" style="padding-right:0px;">

        </div>
    </div></div>










    <div id="jcl-demo">
        <div class="custom-container nonImageContent">

            <div class="carousel">
                <ul id="titles" class='dd'  style="width: 100%;overflow: scroll;max-width: 114%;overflow-y: hidden;overflow-x: auto;white-space: nowrap;margin-bottom: 0px;margin-left: 0px;">

                    <?php
                    $i = 0;
                    if (isset($next)) {
                        foreach ($next as $next_editorial) {
                            $i++;
                            if ($i == 1) {
                                ?>
                                <li id="<?php echo $next_editorial['id']; ?>" value="<?php echo $next_editorial['id']; ?>" class="active a1">
                                    <span class="cnt"> <?= $i ?> </span>
                                    <span class="headings"><?php echo substr($next_editorial['head'], '0', '50'); ?><span></li>
                                            <?php
                                        } else {
                                            ?>
                                            <li id="<?php echo $next_editorial['id']; ?>" value="<?php echo $next_editorial['id']; ?>" class="a1">
                                                <span class="cnt"> <?= $i ?> </span>
                                                <span class="headings"><?php echo substr($next_editorial['head'], '0', '50'); ?></span></li>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                                </ul>



                                </div>


                                <div class="clear"></div>
                                </div>















                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog" style="width: 352px !important;">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-body" style="padding:0px;">
                                                <!-- signup & register code start -->
                                                <div id="login-form" style="margin: 0px;display: block;margin-left: auto;margin-right: auto;">
                                                    <input type="radio" checked id="login" name="switch" class="hide">
                                                    <input type="radio" id="signup" name="switch" class="hide">

                                                    <div class="section-out">
                                                        <section class="login-section">
                                                            <div>
                                                                <ul class="form-header" style="color: #000;">
                                                                    <li><label for="login"><i class="fa fa-lock"></i> LOGIN<label for="login"></li>
                                                                                <li><label for="signup"><i class="fa fa-credit-card"></i> REGISTER</label></li>
                                                                                </ul>
                                                                                </div>
                                                                                <h1 style="text-align: center;">Log in to continue</h1>
                                                                                <div style="text-align:center">
                                                                                    <a href="<?= base_url(); ?>hauth/login/Facebook" title="Facebook"  style="cursor:pointer" >

                                                                                        <img src="<?= base_url(); ?>assert/images/facebook.png" title="" alt="" style="width: 80px;" />
                                                                                    </a>
                                                                                    <a href="<?= base_url(); ?>hauth/login/Google" title="Google"  style="cursor:pointer" >
                                                                                        <img src="<?= base_url(); ?>assert/images/google.png" title="" alt="" style="width:80px;" />
                                                                                    </a>
                                                                                </div>
                                                                                <p style="text-align: center;margin-top: 20px;">Or via email</p>
                                                                                <div class="login">
                                                                                    <form method="post" id="form_login" action="<?= base_url(); ?>auth/login">
                                                                                        <ul class="ul-list">
                                                                                            <li>
                                                                                                <input type="email"  name="login" id="emailLogin" required class="input" placeholder="Your Email"/>
                                                                                                <span class="icon"><i class="fa fa-user"></i></span>
                                                                                            </li>
                                                                                            <li>
                                                                                                <input type="password" name="password" id="logpassword"  required class="input" placeholder="Password"/>
                                                                                                <span class="icon"><i class="fa fa-lock"></i></span>
                                                                                            </li>
                                                                                            <li style="width: 80%;text-align: left;">
                                                                                                <span class="remember">
                                                                                                    <a data-toggle="modal" href="#" data-target="#testwq" id="forget_password">Forgot Password</a>
                                                                                                </span>
                                                                                            </li>
                                                                                            <li>
                                                                                                <button type="submit" class="btn btn-skin btn-lg btn-block" id="btnContactUs" name="submitLogin" style="width: 240px;">LOGIN
                                                                                                </button>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </form>
                                                                                </div>
                                                                                </section>
                                                                                <section class="signup-section">
                                                                                    <div>
                                                                                        <ul class="form-header" style="color: #000;">
                                                                                            <li><label for="login"><i class="fa fa-lock"></i> LOGIN<label for="login"></li>
                                                                                                        <li><label for="signup"><i class="fa fa-credit-card"></i> REGISTER</label></li>
                                                                                                        </ul>
                                                                                                        </div>
                                                                                                        <form id="registrationform" method="post" action="<?= base_url(); ?>auth/signUp">
                                                                                                            <div class="login" style="padding-bottom: 0px;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
                                                                                                                <div style="border:solid 1px #ccc;width:80%;margin:auto;background:#fff;">
                                                                                                                    <div style="display:inline-block;margin-top:11px;font-size:15px;margin-left: 10px;"> Zersey.com/</div><input type="name" required class="input" name="username" placeholder="User Name" style="width:97px;display: inline-block;border: none;">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <h1 style="text-align: center;margin-top: 0px;">Sign up with</h1>
                                                                                                            <div style="text-align:center">
                                                                                                                <a href="<?= base_url(); ?>hauth/login/Facebook"title="Facebook"  style="cursor:pointer" >

                                                                                                                    <img src="<?= base_url(); ?>assert/images/facebook.png" title="" alt="" style="width: 80px;" />
                                                                                                                </a>
                                                                                                                <a href="<?= base_url(); ?>hauth/login/Google" title="Google"  style="cursor:pointer" >
                                                                                                                    <img src="<?= base_url(); ?>assert/images/google.png" title="" alt="" style="width:80px;" />
                                                                                                                </a>
                                                                                                            </div>
                                                                                                            <p style="text-align: center;margin-top: 10px;">Or via email</p>
                                                                                                            <div class="login" style="padding-top: 10px;padding-bottom: 10px;">
                                                                                                                <ul class="ul-list">
                                                                                                                    <li><input type="name" required name="firstName" id="firstName" class="input" placeholder="First Name"/><span class="icon"><i class="fa fa-user"></i></span></li>
                                                                                                                    <li><input type="name" required name="lastName" id="lastName" class="input" placeholder="Last Name"/><span class="icon"><i class="fa fa-user"></i></span></li>
                                                                                                                    <li><input type="email" required class="input" name="email" id="email" placeholder="Your Email"/><span class="icon"><i class="fa fa-user"></i></span></li>
                                                                                                                    <li><input type="password" required name="password" id="password" class="input" placeholder="Password"/><span class="icon"><i class="fa fa-lock"></i></span></li>
                                                                                                                    <li><input type="text" required class="input" name="phno" id="phno" placeholder="ContactNo"/><span class="icon"><i class="fa fa-user"></i></span></li>
                                                                                                                    <li>
                                                                                                                        <button type="submit" class="btn btn-skin btn-lg btn-block" name="customerSubmit" id="customerSubmit" style="width: 245px;">SIGN UP</button>
                                                                                                                    </li>
                                                                                                                    <!--<li>
                                                                                                                        <span class="remember">
                                                                                                                            <a href="#">Forget Password</a>
                                                                                                                        </span>
                                                                                                                    </li>-->
                                                                                                                </ul>
                                                                                                            </div>
                                                                                                        </form>
                                                                                                        </section>
                                                                                                        </div>


                                                                                                        </div>
                                                                                                        <!-- signup & register code close -->
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        <div class="modal fade" id="testwq" role="dialog">
                                                                                                            <div class="modal-dialog" style="width: 352px !important;">
                                                                                                                <!-- Modal content-->
                                                                                                                <div class="modal-content">
                                                                                                                    <div class="modal-body" style="padding:0px;">
                                                                                                                        <!-- signup & register code start -->
                                                                                                                        <div id="login-form" style="margin: 0px;display: block;margin-left: auto;margin-right: auto;">
                                                                                                                            <input type="radio" checked id="login" name="switch" class="hide">
                                                                                                                            <input type="radio" id="signup" name="switch" class="hide">

                                                                                                                            <div class="section-out">
                                                                                                                                <section class="login-section">
                                                                                                                                    <form method="post" action="<?= base_url(); ?>auth/forgot_password">

                                                                                                                                        <h5 style="text-align: center;margin-top: 25px;">FORGOT PASSWORD<button style="margin-top: -22px;" type="button" class="close" data-dismiss="modal">  x </button></h5>


                                                                                                                                        <div class="login">
                                                                                                                                            <form action="">
                                                                                                                                                <ul class="ul-list">
                                                                                                                                                    <li><input type="email" required class="input" placeholder="Your Email"/><span class="icon"><i class="fa fa-user"></i></span></li>

                                                                                                                                                </ul>
                                                                                                                                        </div>
                                                                                                                                        <p style="border-top: solid 2px;border-bottom: solid 2px;text-align: center;" >Please enter the email address you signed up with and we'll send you a password reset link.</p>
                                                                                                                                        <li style="padding-bottom: 20px;">
                                                                                                                                            <button type="submit" class="btn btn-skin btn-lg btn-block" id="btnContactUs" style="width: 160px;margin-left:100px;">
                                                                                                                                                Reset password</button>
                                                                                                                                        </li>
                                                                                                                                    </form>
                                                                                                                                </section>

                                                                                                                                <section class="signup-section">
                                                                                                                                    <div>
                                                                                                                                        <ul class="form-header" style="color: #000;">
                                                                                                                                            <li><label for="login"><i class="fa fa-lock"></i> LOGIN<label for="login"></li>
                                                                                                                                                        <li><label for="signup"><i class="fa fa-credit-card"></i> REGISTER</label></li>
                                                                                                                                                        </ul>
                                                                                                                                                        </div>

                                                                                                                                                        </section>
                                                                                                                                                        </div>


                                                                                                                                                        </div>
                                                                                                                                                        <!-- signup & register code close -->
                                                                                                                                                        </div>
                                                                                                                                                        </div>
                                                                                                                                                        </div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="modal fade" id="testwqs" role="dialog">
                                                                                                                                                            <div class="modal-dialog" style="width: 352px !important;">
                                                                                                                                                                <!-- Modal content-->
                                                                                                                                                                <div class="modal-content">
                                                                                                                                                                    <div class="modal-body" style="padding:0px;">
                                                                                                                                                                        <!-- signup & register code start -->
                                                                                                                                                                        <div id="login-form" style="margin: 0px;display: block;margin-left: auto;margin-right: auto;">
                                                                                                                                                                            <input type="radio" checked id="login" name="switch" class="hide">
                                                                                                                                                                            <input type="radio" id="signup" name="switch" class="hide">

                                                                                                                                                                            <div class="section-out">
                                                                                                                                                                                <section class="login-section">

                                                                                                                                                                                    <h5 style="text-align: center;margin-top: 25px;">FORGOT PASSWORD</h5>
                                                                                                                                                                                    <div class="login">
                                                                                                                                                                                        <form action="">
                                                                                                                                                                                            <ul class="ul-list">
                                                                                                                                                                                                <li><input type="email" required class="input" placeholder="Your Email"/><span class="icon"><i class="fa fa-user"></i></span></li>

                                                                                                                                                                                            </ul>
                                                                                                                                                                                        </form>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <button type="submit" class="btn btn-skin btn-lg btn-block" id="btnContactUs" style="width: 160px;margin-left:68px;">
                                                                                                                                                                                        Reset password</button>
                                                                                                                                                                                    </li>


                                                                                                                                                                                </section>
                                                                                                                                                                            </div>


                                                                                                                                                                        </div>
                                                                                                                                                                        <!-- signup & register code close -->
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        </div>



                                                                                                                                                        <script>
                                                                                                                                                            $(window).scroll(function () {
                                                                                                                                                                if ($(window).scrollTop() + $(window).height() == $(document).height() + 50) {
                                                                                                                                                                    $("html, body").animate({scrollTop: 0}, 2000);
                                                                                                                                                                }
                                                                                                                                                            });

                                                                                                                                                        </script>
                                                                                                                                                        <!-- Core JavaScript Files -->
                                                                                                                                                        <script type="text/javascript">
                                                                                                                                                            jQuery(document).ready(function () {
                                                                                                                                                                jQuery('#demo1').skdslider({'delay': 5000, 'animationSpeed': 2000, 'showNextPrev': true, 'showPlayButton': true, 'autoSlide': true, 'animationType': 'fading'});
                                                                                                                                                                jQuery('#demo2').skdslider({'delay': 5000, 'animationSpeed': 1000, 'showNextPrev': true, 'showPlayButton': false, 'autoSlide': true, 'animationType': 'sliding'});
                                                                                                                                                                jQuery('#demo3').skdslider({'delay': 5000, 'animationSpeed': 2000, 'showNextPrev': true, 'showPlayButton': true, 'autoSlide': true, 'animationType': 'fading'});

                                                                                                                                                                jQuery('#responsive').change(function () {
                                                                                                                                                                    $('#responsive_wrapper').width(jQuery(this).val());
                                                                                                                                                                });

                                                                                                                                                            });
                                                                                                                                                        </script>

                                                                                                                                                        <script type="text/javascript">
                                                                                                                                                            function customCheckbox(checkboxName) {
                                                                                                                                                                var checkBox = $('input[name="' + checkboxName + '"]');
                                                                                                                                                                $(checkBox).each(function () {
                                                                                                                                                                    $(this).wrap("<span class='custom-checkbox'></span>");
                                                                                                                                                                    if ($(this).is(':checked')) {
                                                                                                                                                                        $(this).parent().addClass("selected");
                                                                                                                                                                    }
                                                                                                                                                                });
                                                                                                                                                                $(checkBox).click(function () {
                                                                                                                                                                    $(this).parent().toggleClass("selected");
                                                                                                                                                                });
                                                                                                                                                            }
                                                                                                                                                            $(document).ready(function () {
                                                                                                                                                                customCheckbox("sport[]");
                                                                                                                                                                customCheckbox("car[]");
                                                                                                                                                                customCheckbox("confirm");
                                                                                                                                                            })
                                                                                                                                                        </script>

                                                                                                                                                        <script>
                                                                                                                                                            function valthisform()
                                                                                                                                                            {
                                                                                                                                                                if ($('.selected').length < 4)
                                                                                                                                                                {
                                                                                                                                                                    $("#next").removeClass("btn-next");
                                                                                                                                                                    alert("Please check minimum four checkbox");
                                                                                                                                                                }
                                                                                                                                                                if ($('.selected').length >= 4)
                                                                                                                                                                {
                                                                                                                                                                    $("#next").addClass("btn-next");

                                                                                                                                                                    $("#about_li").removeClass("active");
                                                                                                                                                                    $("#address_li").addClass("active");
                                                                                                                                                                    $("#about").removeClass("active");
                                                                                                                                                                    $("#address").addClass("active");
                                                                                                                                                                    $(wizard).find('.btn-next').hide();
                                                                                                                                                                    $(wizard).find('.btn-finish').show();
                                                                                                                                                                }
                                                                                                                                                            }
                                                                                                                                                        </script>
                                                                                                                                                        <script>
                                                                                                                                                            $("#forget_password").click(function () {
                                                                                                                                                                //alert("Hello");
                                                                                                                                                                $("#myModal").hide();
                                                                                                                                                                //$("#testwq").modal('show');

                                                                                                                                                            });
                                                                                                                                                        </script>

                                                                                                                                                        <script>
                                                                                                                                                            $("#btnContactUs").click(function () {
                                                                                                                                                                $("#myModal").modal('hide');
                                                                                                                                                                $("#testwqs").modal('show');

                                                                                                                                                            });
                                                                                                                                                        </script>

                                                                                                                                                        <script>
                                                                                                                                                            /*!
                                                                                                                                                             * jCarouselLite - v1.1 - 2014-09-28
                                                                                                                                                             * http://www.gmarwaha.com/jquery/jcarousellite/
                                                                                                                                                             * Copyright (c) 2014 Ganeshji Marwaha
                                                                                                                                                             * Licensed MIT (https://github.com/ganeshmax/jcarousellite/blob/master/LICENSE)
                                                                                                                                                             */

                                                                                                                                                            (function ($) {                                          // Compliant with jquery.noConflict()
                                                                                                                                                                $.jCarouselLite = {
                                                                                                                                                                    version: '1.1'
                                                                                                                                                                };

                                                                                                                                                                $.fn.jCarouselLite = function (options) {

                                                                                                                                                                    options = $.extend({}, $.fn.jCarouselLite.options, options || {});

                                                                                                                                                                    return this.each(function () {   // Returns the element collection. Chainable.

                                                                                                                                                                        var running,
                                                                                                                                                                                animCss, sizeCss,
                                                                                                                                                                                div = $(this), ul, initialLi, li,
                                                                                                                                                                                liSize, ulSize, divSize,
                                                                                                                                                                                numVisible, initialItemLength, itemLength, calculatedTo, autoTimeout;

                                                                                                                                                                        initVariables();                    // Set the above variables after initial calculations
                                                                                                                                                                        initStyles();                       // Set the appropriate styles for the carousel div, ul and li
                                                                                                                                                                        initSizes();                        // Set appropriate sizes for the carousel div, ul and li
                                                                                                                                                                        attachEventHandlers();              // Attach event handlers for carousel to respond

                                                                                                                                                                        function go(to) {
                                                                                                                                                                            if (!running) {
                                                                                                                                                                                clearTimeout(autoTimeout);  // Prevents multiple clicks while auto-scrolling - edge case
                                                                                                                                                                                calculatedTo = to;

                                                                                                                                                                                if (options.beforeStart) {   // Call the beforeStart() callback
                                                                                                                                                                                    options.beforeStart.call(this, visibleItems());
                                                                                                                                                                                }

                                                                                                                                                                                if (options.circular) {      // If circular, and "to" is going OOB, adjust it
                                                                                                                                                                                    adjustOobForCircular(to);
                                                                                                                                                                                } else {                    // If non-circular and "to" is going OOB, adjust it.
                                                                                                                                                                                    adjustOobForNonCircular(to);
                                                                                                                                                                                }                           // If neither overrides "calculatedTo", we are not in edge cases.

                                                                                                                                                                                animateToPosition({// Animate carousel item to position based on calculated values.
                                                                                                                                                                                    start: function () {
                                                                                                                                                                                        running = true;
                                                                                                                                                                                    },
                                                                                                                                                                                    done: function () {
                                                                                                                                                                                        if (options.afterEnd) {
                                                                                                                                                                                            options.afterEnd.call(this, visibleItems());
                                                                                                                                                                                        }
                                                                                                                                                                                        if (options.auto) {
                                                                                                                                                                                            setupAutoScroll();
                                                                                                                                                                                        }
                                                                                                                                                                                        running = false;
                                                                                                                                                                                    }
                                                                                                                                                                                });

                                                                                                                                                                                if (!options.circular) {     // Enabling / Disabling buttons is applicable in non-circular mode only.
                                                                                                                                                                                    disableOrEnableButtons();
                                                                                                                                                                                }

                                                                                                                                                                            }
                                                                                                                                                                            return false;
                                                                                                                                                                        }

                                                                                                                                                                        function initVariables() {
                                                                                                                                                                            running = false;
                                                                                                                                                                            animCss = options.vertical ? "top" : "left";
                                                                                                                                                                            sizeCss = options.vertical ? "height" : "width";
                                                                                                                                                                            ul = div.find(">ul");
                                                                                                                                                                            initialLi = ul.find(">li");
                                                                                                                                                                            initialItemLength = initialLi.size();

                                                                                                                                                                            // To avoid a scenario where number of items is just 1 and visible is 3 for example.
                                                                                                                                                                            numVisible = initialItemLength < options.visible ? initialItemLength : options.visible;

                                                                                                                                                                            if (options.circular) {
                                                                                                                                                                                var $lastItemSet = initialLi.slice(initialItemLength - numVisible).clone();
                                                                                                                                                                                var $firstItemSet = initialLi.slice(0, numVisible).clone();

                                                                                                                                                                                ul.prepend($lastItemSet)        // Prepend the lis with final items so that the user can click the back button to start with
                                                                                                                                                                                        .append($firstItemSet);     // Append the lis with first items so that the user can click the next button even after reaching the end

                                                                                                                                                                                options.start += numVisible;    // Since we have a few artificial lis in the front, we will have to move the pointer to point to the real first item
                                                                                                                                                                            }

                                                                                                                                                                            li = $("li", ul);
                                                                                                                                                                            itemLength = li.size();
                                                                                                                                                                            calculatedTo = options.start;
                                                                                                                                                                        }

                                                                                                                                                                        function initStyles() {
                                                                                                                                                                            div.css("visibility", "visible");   // If the div was set to hidden in CSS, make it visible now

                                                                                                                                                                            li.css({
                                                                                                                                                                                overflow: "hidden",
                                                                                                                                                                                "float": options.vertical ? "none" : "left" // Some minification tools fail if "" is not used
                                                                                                                                                                            });

                                                                                                                                                                            ul.css({
                                                                                                                                                                                margin: "0",
                                                                                                                                                                                padding: "0",
                                                                                                                                                                                position: "relative",
                                                                                                                                                                                "list-style": "none",
                                                                                                                                                                                "z-index": "1"
                                                                                                                                                                            });

                                                                                                                                                                            div.css({
                                                                                                                                                                                overflow: "hidden",
                                                                                                                                                                                position: "relative",
                                                                                                                                                                                "z-index": "2",
                                                                                                                                                                                left: "0px",
                                                                                                                                                                                width: "100%"
                                                                                                                                                                            });

                                                                                                                                                                            // For a non-circular carousel, if the start is 0 and btnPrev is supplied, disable the prev button
                                                                                                                                                                            if (!options.circular && options.btnPrev && options.start == 0) {
                                                                                                                                                                                $(options.btnPrev).addClass("disabled");
                                                                                                                                                                            }
                                                                                                                                                                        }

                                                                                                                                                                        function initSizes() {

                                                                                                                                                                            liSize = options.vertical ? // Full li size(incl margin)-Used for animation and to set ulSize
                                                                                                                                                                                    li.outerHeight(true) :
                                                                                                                                                                                    li.outerWidth(true);
                                                                                                                                                                            ulSize = liSize * itemLength;       // size of full ul(total length, not just for the visible items)
                                                                                                                                                                            divSize = liSize * numVisible;      // size of entire div(total length for just the visible items)

                                                                                                                                                                            // Generally, LI's dimensions should be specified explicitly in a style-sheet
                                                                                                                                                                            // But in the case of img (with width and height attr), we can derive LI's dimensions and set here
                                                                                                                                                                            // May be applicable for other types of LI children if their dimensions are explicitly specified
                                                                                                                                                                            // Individual LI dimensions
                                                                                                                                                                            /* li.css({
                                                                                                                                                                             width: li.width(),
                                                                                                                                                                             height: li.height()
                                                                                                                                                                             });
                                                                                                                                                                             */
                                                                                                                                                                            // Size of the entire UL. Including hidden and visible elements
                                                                                                                                                                            // Will include LI's (width + padding + border + margin) * itemLength - Using outerwidth(true)
                                                                                                                                                                            ul.css(sizeCss, ulSize + "px")
                                                                                                                                                                                    .css(animCss, -(calculatedTo * liSize));

                                                                                                                                                                            // Width of the DIV. Only the width of the visible elements
                                                                                                                                                                            // Will include LI's (width + padding + border + margin) * numVisible - Using outerwidth(true)
                                                                                                                                                                            div.css(sizeCss, divSize + "px");

                                                                                                                                                                        }

                                                                                                                                                                        function attachEventHandlers() {
                                                                                                                                                                            if (options.btnPrev) {
                                                                                                                                                                                $(options.btnPrev).click(function () {
                                                                                                                                                                                    return go(calculatedTo - options.scroll);
                                                                                                                                                                                });
                                                                                                                                                                            }

                                                                                                                                                                            if (options.btnNext) {
                                                                                                                                                                                $(options.btnNext).click(function () {
                                                                                                                                                                                    return go(calculatedTo + options.scroll);
                                                                                                                                                                                });
                                                                                                                                                                            }

                                                                                                                                                                            if (options.btnGo) {
                                                                                                                                                                                $.each(options.btnGo, function (i, val) {
                                                                                                                                                                                    $(val).click(function () {
                                                                                                                                                                                        return go(options.circular ? numVisible + i : i);
                                                                                                                                                                                    });
                                                                                                                                                                                });
                                                                                                                                                                            }

                                                                                                                                                                            if (options.mouseWheel && div.mousewheel) {
                                                                                                                                                                                div.mousewheel(function (e, d) {
                                                                                                                                                                                    return d > 0 ?
                                                                                                                                                                                            go(calculatedTo - options.scroll) :
                                                                                                                                                                                            go(calculatedTo + options.scroll);
                                                                                                                                                                                });
                                                                                                                                                                            }

                                                                                                                                                                            if (options.auto) {
                                                                                                                                                                                setupAutoScroll();
                                                                                                                                                                            }
                                                                                                                                                                        }

                                                                                                                                                                        function setupAutoScroll() {
                                                                                                                                                                            autoTimeout = setTimeout(function () {
                                                                                                                                                                                go(calculatedTo + options.scroll);
                                                                                                                                                                            }, options.auto);
                                                                                                                                                                        }

                                                                                                                                                                        function visibleItems() {
                                                                                                                                                                            return li.slice(calculatedTo).slice(0, numVisible);
                                                                                                                                                                        }

                                                                                                                                                                        function adjustOobForCircular(to) {
                                                                                                                                                                            var newPosition;

                                                                                                                                                                            // If first, then goto last
                                                                                                                                                                            if (to <= options.start - numVisible - 1) {
                                                                                                                                                                                newPosition = to + initialItemLength + options.scroll;
                                                                                                                                                                                ul.css(animCss, -(newPosition * liSize) + "px");
                                                                                                                                                                                calculatedTo = newPosition - options.scroll;

                                                                                                                                                                                console.log("Before - Positioned at: " + newPosition + " and Moving to: " + calculatedTo);
                                                                                                                                                                            }

                                                                                                                                                                            // If last, then goto first
                                                                                                                                                                            else if (to >= itemLength - numVisible + 1) {
                                                                                                                                                                                newPosition = to - initialItemLength - options.scroll;
                                                                                                                                                                                ul.css(animCss, -(newPosition * liSize) + "px");
                                                                                                                                                                                calculatedTo = newPosition + options.scroll;

                                                                                                                                                                                console.log("After - Positioned at: " + newPosition + " and Moving to: " + calculatedTo);
                                                                                                                                                                            }
                                                                                                                                                                        }

                                                                                                                                                                        function adjustOobForNonCircular(to) {
                                                                                                                                                                            // If user clicks "prev" and tries to go before the first element, reset it to first element.
                                                                                                                                                                            if (to < 0) {
                                                                                                                                                                                calculatedTo = 0;
                                                                                                                                                                            }
                                                                                                                                                                            // If "to" is greater than the max index that we can use to show another set of elements
                                                                                                                                                                            // it means that we will have to reset "to" to a smallest possible index that can show it
                                                                                                                                                                            else if (to > itemLength - numVisible) {
                                                                                                                                                                                calculatedTo = itemLength - numVisible;
                                                                                                                                                                            }

                                                                                                                                                                            console.log("Item Length: " + itemLength + "; " +
                                                                                                                                                                                    "To: " + to + "; " +
                                                                                                                                                                                    "CalculatedTo: " + calculatedTo + "; " +
                                                                                                                                                                                    "Num Visible: " + numVisible);
                                                                                                                                                                        }

                                                                                                                                                                        function disableOrEnableButtons() {
                                                                                                                                                                            $(options.btnPrev + "," + options.btnNext).removeClass("disabled");
                                                                                                                                                                            $((calculatedTo - options.scroll < 0 && options.btnPrev)
                                                                                                                                                                                    ||
                                                                                                                                                                                    (calculatedTo + options.scroll > itemLength - numVisible && options.btnNext)
                                                                                                                                                                                    ||
                                                                                                                                                                                    []
                                                                                                                                                                                    ).addClass("disabled");
                                                                                                                                                                        }

                                                                                                                                                                        function animateToPosition(animationOptions) {
                                                                                                                                                                            running = true;

                                                                                                                                                                            ul.animate(
                                                                                                                                                                                    animCss == "left" ?
                                                                                                                                                                                    {left: -(calculatedTo * liSize)} :
                                                                                                                                                                                    {top: -(calculatedTo * liSize)},
                                                                                                                                                                                    $.extend({
                                                                                                                                                                                        duration: options.speed,
                                                                                                                                                                                        easing: options.easing
                                                                                                                                                                                    }, animationOptions)
                                                                                                                                                                                    );
                                                                                                                                                                        }
                                                                                                                                                                    });
                                                                                                                                                                };

                                                                                                                                                                $.fn.jCarouselLite.options = {
                                                                                                                                                                    btnPrev: null, // CSS Selector for the previous button
                                                                                                                                                                    btnNext: null, // CSS Selector for the next button
                                                                                                                                                                    btnGo: null, // CSS Selector for the go button
                                                                                                                                                                    mouseWheel: false, // Set "true" if you want the carousel scrolled using mouse wheel
                                                                                                                                                                    auto: null, // Set to a numeric value (800) in millis. Time period between auto scrolls

                                                                                                                                                                    speed: 200, // Set to a numeric value in millis. Speed of scroll
                                                                                                                                                                    easing: null, // Set to easing (bounceout) to specify the animation easing

                                                                                                                                                                    vertical: false, // Set to "true" to make the carousel scroll vertically
                                                                                                                                                                    circular: true, // Set to "true" to make it an infinite carousel
                                                                                                                                                                    visible: 3, // Set to a numeric value to specify the number of visible elements at a time
                                                                                                                                                                    start: 0, // Set to a numeric value to specify which item to start from
                                                                                                                                                                    scroll: 1, // Set to a numeric value to specify how many items to scroll for one scroll event

                                                                                                                                                                    beforeStart: null, // Set to a function to receive a callback before every scroll start
                                                                                                                                                                    afterEnd: null              // Set to a function to receive a callback after every scroll end
                                                                                                                                                                };

                                                                                                                                                            })(jQuery);
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

                                                                                                                                                        <!-- wizard popup code close -->



                                                                                                                                                        <!-- Google Analytics Code -->
                                                                                                                                                        <?php include_once("analyticstracking.php") ?>
                                                                                                                                                        </body>
                                                                                                                                                        </html>
                                                                                                                                                    <?php } ?>