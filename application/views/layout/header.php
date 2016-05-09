<!-- Google Icons -->

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script>
    $(document).on('click', '#board', function ()
    {

        var value = $(this).attr('value');
        //alert(value);
        //$("#subboard").val(value);
        $.post('http://zersey.com/users/header', {"boardid": value}, function (response)
        {
            $("#subboards").load(response);
        });

        /*$.ajax(
         {
         "type":"POST",
         "data":{"boardid": value},
         "url:":"http://zersey.com/users/header",
         "success":function(data)
         {
         alert(data);
         }
         });*/
    });

</script>
<script>
    $(document).ready(function ()
    {
        var i=0,j=0;
        $("body").on('click', '#create_board', function (e)
        {

            var category = $("#bcat").val();
            var bname = $("#bname").val();
            var bdesc = $("#bdesc").val();
            var dat = $("#cmn-toggle-7").is(":checked");
            var sec = dat ? 1 : 0;
            var allow = $("#cmn-toggle-post").is(":checked");
            var publish = allow ? 1 : 0;
            //alert(sec);
            // /alert(publish);
            //alert(bname);
            //alert(bdesc);
            //alert(category);
            if (category != 0 && bname.length != 0 && bdesc.length != 0)
            {
                $.ajax(
                        {
                            "type": "post",
                            "data": {"cat": category, "boardname": bname, "boarddesc": bdesc, "secret": sec, "publish": publish},
                            "url": "<?= base_url() ?>users/creatboard",
                            success: function (msg)
                            {
                                $(location).attr('href', 'http://zersey.com/board/'+bname);
                            }
                        });
            } else
            {
                e.preventDefault();
                $("#error").text("Please Select a category. Do not leave name and description blank");
                $("#error").css("color", "red");
            }

        });

        $("body").on('click', '.accept', function (e)
        {

            //var email= <?= $email ?>;
            var accept_id = this.id;
            var id = accept_id.substring(6);
            //alert(id);
            var email = $("#email").val();
            //alert(email);
            $.ajax(
                    {
                        "type": "post",
                        "data": {"accept": id, "email": email},
                        "url": "<?= base_url() ?>users/invitation",
                        success: function (msg)
                        {
                            $("#board" + id).remove();
                            //$(location).attr('href', 'http://zersey.com/board/'+bname);
                        }
                    });


        });

        $("body").on('click', '.reject', function (e)
        {

            //var email= <?= $email ?>;
            var reject_id = this.id;
            var id = reject_id.substring(6);
            //alert(id);
            var email = $("#email").val();
            //alert(email);
            $.ajax(
                    {
                        "type": "post",
                        "data": {"reject": id, "email": email},
                        "url": "<?= base_url() ?>users/invitation",
                        success: function (msg)
                        {
                            $("#board" + id).remove();
                            //$(location).attr('href', 'http://zersey.com/board/'+bname);
                        }
                    });


        });
        $("body").on('click', '.toggle-button', function(e) {

            i++;
    $(this).toggleClass('toggle-button-selected');

   // alert(this.value);
   if(i%2!=0)
   {
        var id=$("#cmn-toggle-7").prop('checked',true);
    }
    else
    {
    var id=$("#cmn-toggle-7").prop('checked',false);
        
    }
        var id_value=id.val();
        var ids=$("#cmn-toggle-7").is(":checked");
        //alert(ids);
          e.preventDefault(); 
});
        $("body").on('click', '.toggle-buttonpost', function(e) {

            j++;
    $(this).toggleClass('toggle-buttonpost-selected');

   // alert(this.value);
   if(j%2!=0)
   {
        var id=$("#cmn-toggle-post").prop('checked',true);
    }
    else
    {
    var id=$("#cmn-toggle-post").prop('checked',false);
        
    }
        //var id_value=id.val();
        //var ids=$("#cmn-toggle-7").is(":checked");
        //alert(ids);
          e.preventDefault(); 
});

    });
</script>
<?php
if (!isset($v)) {
    ?>
    <script>

        function datepicker()

        {
            $("#datetimepicker1").show();
            $("#hide_btn").hide();
            $("#show_submit_btn").show();
        }
    </script>
    <?php
}
?>
<?php
if (isset($values)) {
    echo "<script>";
    echo "alert('Its working')";
    echo "</script>";
}
$uid = $this->session->userdata['user_id'];
?>

<style>
    .toggle-button { background-color: grey;margin: -24% 0px 19px 122%;border: 2px solid #D0D0D0; height: 30px; cursor: pointer; width: 65px; position: relative; display: inline-block; user-select: none; -webkit-user-select: none; -ms-user-select: none; -moz-user-select: none;
    border-radius: 4px;  }

.toggle-button button { cursor: pointer; outline: 0; display:block; position: absolute; left: 3px; top: 3px; width: 30px; height: 28px; background-color:#d3d3d3; float: left; margin: -3px 0 0 -3px; transition: right 0.1s; border-radius: 4px; }


.toggle-button button::after
{
    content: 'No';
    color: #FFF;
    margin-left: 30px;
    font-size: 19px;
}

.toggle-button-selected { background-color: #83B152; border: 2px solid #D0D0D0; margin:-19% 0px 19px 119%; }
.toggle-button-selected button { cursor: pointer; outline: 0; display:block; position: absolute; left: 37px; top: 0px; width: 30px; height: 30px; background-color:#d3d3d3; float: left; margin: -3px 0 0 -3px; transition: left 0.3s; border-radius: 4px; }

.toggle-button-selected button::before
{
    content: 'Yes';
    color: #FFF;
    margin-left: -36px;
    font-size: 19px;
}


   
  .toggle-buttonpost { background-color: grey;margin: -24% 0px 19px 122%;border: 2px solid #D0D0D0; height: 30px; cursor: pointer; width: 65px; position: relative; display: inline-block; user-select: none; -webkit-user-select: none; -ms-user-select: none; -moz-user-select: none;
    border-radius: 4px;  }
.toggle-buttonpost button { cursor: pointer; outline: 0; display:block; position: absolute; left: 3px; top: 3px; width: 30px; height: 28px; background-color:#d3d3d3; float: left; margin: -3px 0 0 -3px; transition: left 0.3s; border-radius: 4px; }
.toggle-buttonpost-selected { background-color: #83B152; border: 2px solid #D0D0D0; }
.toggle-buttonpost-selected button { cursor: pointer; outline: 0; display:block; position: absolute; left: 37px; top: 0px; width: 30px; height: 30px; background-color:#d3d3d3; float: left; margin: -3px 0 0 -3px; transition: left 0.3s; border-radius: 4px; }

.toggle-buttonpost button::after
{
    content: 'No';
    color: #FFF;
    margin-left: 30px;
    font-size: 19px;
}
.toggle-buttonpost-selected button::before
{
    content: 'Yes';
    color: #FFF;
    margin-left: -36px;
    font-size: 19px;
}


.center { text-align:center; }

    .codrops-demos
    {
        margin:-2% -85px 0px -1%;
    }
    input.cmn-toggle-yes-no + label {
        padding: 2px;
        width: 100px;
        height: 30px;
    }
    .secret
    {
        margin: 0px 0px 0px 0px;
    }
    .secret::after
    {
        content: '?';
        font-size: 90%;
        font-family: sans-serif;
        vertical-align: middle;
        font-weight: bold;
        text-align: center;
        line-height:1;
        display: inline-block;
        width: 1.8ex;
        height: 1.8ex;
        border-radius: 1ex;
        color: black;
        background: white;
        border: thin solid black;
    }
    .accept
    {
        margin: 0px 0px 0px 400px;
    }

    .reject
    {
        margin: 0px 0px 0px 0px;
    }
    .switch
    {
        margin: -24% 0px 0px 122%;
    }
    input.cmn-toggle-yes-no + label:before,
    input.cmn-toggle-yes-no + label:after {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        color: #fff;
        font-family: "Roboto Slab", serif;
        font-size: 20px;
        text-align: center;
        line-height: 32px;
    }
    input.cmn-toggle-yes-no + label:before {
        background-color: #dddddd;
        content: attr(data-off);
        transition: transform 0.5s;
        backface-visibility: hidden;
    }
    input.cmn-toggle-yes-no + label:after {
        background-color: #8ce196;
        content: attr(data-on);
        transition: transform 0.5s;
        transform: rotateY(180deg);
        backface-visibility: hidden;
    }
    input.cmn-toggle-yes-no:checked + label:before {
        transform: rotateY(180deg);
    }
    input.cmn-toggle-yes-no:checked + label:after {
        transform: rotateY(0);
    }
    .cmn-toggle {
        position: absolute;
        margin-left: -9999px;
        visibility: hidden;
    }
    .cmn-toggle + label {
        display: block;
        position: relative;
        cursor: pointer;
        outline: none;
        user-select: none;
    }
</style>
<body style="background-color:#f7f5f5">

    <div class="container-full">
        <div class="container-fluid mainheder" style="width:100%;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <a href="<?= base_url() ?>"><img src="<?= base_url(); ?>assert/images/my.png" style="padding: 5px; width:60%; padding-top:8px">
                        </a>
                        <a href = "" id = "new_posts_link"></a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">

                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

                                            <img src="<?php
                            if ($this->usermodel->getLoginimage($this->session->userdata['user_id'])) {
                                echo base_url();
                                ?>assets/images/merchant/<?php
                                echo ($this->usermodel->getLoginimage($this->session->userdata['user_id']));
                            }
                            ?>" class="logo_img">

                            </div> -->
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <?php if ($this->session->userdata['user_id']) {
                                    ?>
                                    <div class="dropdown_div">
                                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                            <?= ucfirst($this->usermodel->getLoginName($this->session->userdata['username'])); ?>
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?= base_url(); ?>userprofile/<?= $this->session->userdata['username'] ?>"  title="" class="dropdown_nev">View Profile</a></li>

                                            <li><a href="<?= base_url(); ?>postdraft/<?= $this->session->userdata['username'] ?>" class="dropdown_nev">Draft Post</a></li>
                                            <li><a href="<?= base_url(); ?>mybookmarks/<?= $this->session->userdata['username'] ?>" class="dropdown_nev">My Bookmarks</a></li>

                                            <li><a href="#" data-toggle="modal" data-target="#invitations" class="dropdown_nev">Invitations</a></li>
                                            <li> <a href="<?= base_url(); ?>logout" class="dropdown_nev">Log Out</a></li>
                                        </ul>
                                    </div>
                                    <?php
                                } else {
                                    ?>

                                    <p class="codrops-demos" style="position: absolute;z-index: 999;right:0">
                                        <a class="current-demo" data-toggle="modal" data-target="#myModal" href="#" style="border: none;"><button class="btn btn-lg btn-primary btn-block" type="submit">Login</button></a>
                                    </p>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="" style="height:0px;margin-top:50px;">
            </div>
        </div>
        <!-- the white  line on top --->
        <!--<div class="" style="height: 10px;background-color: #F7F5F5;/* margin-top:50px; */z-index: 100;margin-top: 50px;width: 100%;position: fixed;">
        </div> --?
        <!-- Modal status update -->
        <div id="updatestatusmodla" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Status</h4>
                    </div>
                    <form method="post" action="<?= base_url(); ?>users/dplifeupload" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div style="width: 100%;padding:5px;border: 1px solid #cecece;">
                                <textarea rows="4" name="upsname" id="upsname" style="width:100%;border: none;margin-bottom: -5px;" placeholder="Write something" required></textarea>
                            </div>
                            <div style="text-align:left;vertical-align:middle;height: 5px;">
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
                                </p>
                            </div>
                            <div id="datetimepicker1" class="input-append date" style="margin-top:20px;display:none;">
                                <label>Select date time for shedule post</label>
                                <input type="text" value="" id="datetimepicker_mask" class="form-control">
                                <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <select class="btn btn-default" name="upsstatus" id="upsstatus" style="font-family:'FontAwesome', Arial;border: solid 1px #ccc;">
                                <option value="1">&#xf0ac; Public</option>
                                <option value="2">&#xf0c0; Friends</option>
                            </select>
                            <div class="btn-group" id="hide_btn">
                                <button type="submit" name="publish" id="publish" class="btn btn-danger">Publish</button>
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu action_div" >
                                    <li><a name="scheduleltr" style="background: none;color: #000;border: none;" id="publish" href="#" onclick="datepicker()">Scheduler</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li data-toggle="modal" data-target="#scheduleinst"> <button type="submit" name="savedraft" style="background: none;color: #000;border: none;" id="publish">Save as Draft</button></li>
                                </ul>
                            </div>
                            <input type="button" value="Publish" style="display:none;" id="show_submit_btn" class="btn btn-danger">
                        </div>
                </div>
                </form>
            </div>

        </div>

        <!-- close-->
        <?php
        if ($pagename == "postpage") {

        } else {


            $value = 0;
            if ($this->uri->segment(1) == "board" || $this->uri->segment(1) == "boards") {

                $uid = $this->session->userdata['user_id'];
                $board_name = $this->uri->segment(2);
                $photox = $this->usermodel->where_data('user_board', array('bordname' => $board_name));
                $private = $photox[0]->private;
                // echo $private."<br>";
                $post = $photox[0]->post;
                // echo $post."<br>";
                $board_id = $photox[0]->bid;
                //echo $board_id;
                if ($this->session->userdata['user_id'] == $photox[0]->userid) {
                    $value = 1;
                }
                if (($private == 0 && $post == 1)) {
                    $follow = $this->usermodel->countlikecomment('follow_board', array('boardid' => $board_id, 'userid' => $uid));
                    // echo $follow."<br>";
                    $email_invite = $this->usermodel->where_data('users', array('id' => $uid));
                    $email = $email_invite[0]->email;

                    $invites = $this->usermodel->countlikecomment('board_invites', array('boardid' => $board_id, 'email' => $email, 'status' => '1'));
                    if ($invites != 0) {
                        $value = 1;
                    }
                    if ($follow != 0) {
                        $value = 1;
                    }
                } else {
                    $email_invite = $this->usermodel->where_data('users', array('id' => $uid));
                    $email = $email_invite[0]->email;

                    $invites = $this->usermodel->countlikecomment('board_invites', array('boardid' => $board_id, 'email' => $email, 'status' => '1'));
                    if ($invites != 0) {
                        $value = 1;
                    }
                }

                if ($value == 1) {
                    ?>
                    <div class="main" style="width:100%;">
                        <div data-toggle="dropdown" data-target="#users" class="corner_pls_btn">
                            <i class="fa fa-plus-circle fa-3x corner_pls_btn_main"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-user navbar-left side_drp_down">
                            <li class="dropdown user-dropdown" id="users">
                                <ul class="dropdown-menu" style="background-color: #555;">

                                    <li>
                                        <div class="addpost">
                                            <a href="#" style="display:inline-block;" data-toggle="modal" data-target="#updatestatusmodla">
                                                <span class="corner_fa_icon">
                                                    <i class="material-icons vcenter">insert_comment</i>
                                                    Update Status
                                                </span>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="addpost">
                                            <?php
                                            if (!empty($catname)) {
                                                $boardid = $this->datamodel->getboardbyname($catname);
                                                ?>
                                                <a href="<?= base_url() ?>posteditorial/<?= $category ?>/<?= $catname ?>" style="display:inline-block;" >
                                                    <span class="corner_fa_icon"><i class="material-icons vcenter">description</i> Post Editorial</span>
                                                </a>
                                            <?php } else { ?>
                                                <a href="#" data-toggle="modal" data-target="#popupeditorl" style="display:inline-block;">
                                                    <span class="corner_fa_icon"><i class="material-icons vcenter">description</i> Post Editorial</span>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="addpost">
                                            <?php if (!empty($catname)) { ?>
                                                <a href="<?= base_url() ?>poststory/<?= $category ?>/<?= $catname ?>" style="display:inline-block;" >
                                                    <span class="corner_fa_icon"><i class="material-icons vcenter">photo_album</i> Post Photo Story</span>
                                                </a>
                                            <?php } else { ?>
                                                <a href="#" style="display:inline-block;" data-toggle="modal" data-target="#newpopup">
                                                    <span class="corner_fa_icon"><i class="material-icons vcenter">photo_album</i> Post Photo Story</span>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="addpost">
                                            <a href="#" data-toggle="modal" data-target="#myModalcreat" id="newmodelpopup">
                                                <span class="corner_fa_icon"><i class="material-icons vcenter">domain</i> Add New Board</span>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="addpost">
                                            <a href="#" data-toggle="modal" data-target="#popupvideo">
                                                <span class="corner_fa_icon"><i class="material-icons vcenter">video_library</i> Add Video</span>
                                            </a>
                                        </div>
                                    </li>

                                    <!--	<li>
                                            <div class="addpost">
                                                            <a href="#" style="display:inline-block;">
                            <i class="fa fa-pie-chart corner_fa_icon">&nbsp; Post Poll</i>
                            </a>
                                                    </div>
                                            </li>
                    <li>
                                                    <div class="addpost">
                                                            <a href="#" style="display:inline-block;">
                            <i class="fa fa-pencil-square-o corner_fa_icon">&nbsp;Post Quiz</i>
                            </a>
                                                    </div>
                                            </li>-->
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <?php
                }
            } else if ($this->session->userdata['user_id']) {
                ?>
                <div class="main" style="width:100%;">
                    <div data-toggle="dropdown" data-target="#users" class="corner_pls_btn">
                        <i class="fa fa-plus-circle fa-3x corner_pls_btn_main"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-user navbar-left side_drp_down">
                        <li class="dropdown user-dropdown" id="users">
                            <ul class="dropdown-menu" style="background-color: #555;">

                                <li>
                                    <div class="addpost">
                                        <a href="#" style="display:inline-block;" data-toggle="modal" data-target="#updatestatusmodla">
                                            <span class="corner_fa_icon">
                                                <i class="material-icons vcenter">insert_comment</i>
                                                Update Status
                                            </span>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="addpost">
                                        <?php
                                        if (!empty($catname)) {
                                            $boardid = $this->datamodel->getboardbyname($catname);
                                            ?>
                                            <a href="<?= base_url() ?>posteditorial/<?= $category ?>/<?= $catname ?>" style="display:inline-block;" >
                                                <span class="corner_fa_icon"><i class="material-icons vcenter">description</i> Post Editorial</span>
                                            </a>
                                        <?php } else { ?>
                                            <a href="#" data-toggle="modal" data-target="#popupeditorl" style="display:inline-block;">
                                                <span class="corner_fa_icon"><i class="material-icons vcenter">description</i> Post Editorial</span>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="addpost">
                                        <?php if (!empty($catname)) { ?>
                                            <a href="<?= base_url() ?>poststory//<?= $category ?>/<?= $catname ?>" style="display:inline-block;" >
                                                <span class="corner_fa_icon"><i class="material-icons vcenter">photo_album</i> Post Photo Story</span>
                                            </a>
                                        <?php } else { ?>
                                            <a href="#" style="display:inline-block;" data-toggle="modal" data-target="#newpopup">
                                                <span class="corner_fa_icon"><i class="material-icons vcenter">photo_album</i> Post Photo Story</span>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="addpost">
                                        <a href="#" data-toggle="modal" data-target="#myModalcreat" id="newmodelpopup">
                                            <span class="corner_fa_icon"><i class="material-icons vcenter">domain</i> Add New Board</span>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="addpost">
                                        <a href="#" data-toggle="modal" data-target="#popupvideo">
                                            <span class="corner_fa_icon"><i class="material-icons vcenter">video_library</i> Add Video</span>
                                        </a>
                                    </div>
                                </li>

                                <!--    <li>
                                        <div class="addpost">
                                                        <a href="#" style="display:inline-block;">
                        <i class="fa fa-pie-chart corner_fa_icon">&nbsp; Post Poll</i>
                        </a>
                                                </div>
                                        </li>
                <li>
                                                <div class="addpost">
                                                        <a href="#" style="display:inline-block;">
                        <i class="fa fa-pencil-square-o corner_fa_icon">&nbsp;Post Quiz</i>
                        </a>
                                                </div>
                                        </li>-->
                            </ul>
                        </li>
                    </ul>
                </div>
            <?php
            }
        }
        ?>
        <!--------------------------category popup vertual story---------------------------->
        <div id="newpopup" class="modal fade" role="dialog">
            <div class="modal-dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Select Category</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <?php
                            $cat = $this->datamodel->catlist();
                            foreach ($cat as $ct) {
                                ?>
                                <div class="catpopdiv">
                                    <a href="<?= base_url(); ?>poststory/<?= $ct['category'] ?>">
                                        <div style="width:100%;" class="catpopuptext">
                                            <img src="<?php echo base_url() . 'assert/images/Board_Profile_Pic_Icon.png'; ?>" class="follow" style="width:100%;"></div>
                                        <p class="catpopuphead"><?= $ct['category'] ?></p>
                                        <!--<p class="catpopuptext" >dsad sds dsds dsds d</p>    -->
                                    </a>     </div>

<?php } ?>
                            <div class="catpopdiv">
                                <a href="#" data-toggle="modal" data-target="#mycreatvers" id="newmodelpopup">
                                    <div style="width:100%;" class="catpopuptext">
                                        <img src="<?php echo base_url() . 'assert/images/Add_Board.png'; ?>" class="follow" style="width:100%;"></div>
                                    <p class="catpopuphead">Add New Board</p>
                                </a>    </div>


                            <div class="catpopdiv">
                                <a href="#" data-toggle="modal" data-target="#boardlist" id="neboardlist">
                                    <div style="width:100%;" class="catpopuptext">
                                        <img src="<?php echo base_url() . 'assert/images/Existing_Board.png'; ?>" class="follow" style="width:100%;"></div>
                                    <p class="catpopuphead">View List</p>
                                </a>      </div>

                        </div></div>
                </div>
            </div>
        </div>

        <div id="invitations" class="modal fade" role="dialog">
            <div class="modal-dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Pending Invitations</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <?php
//$cat = $this->datamodel->catlist();
// $uid=$this->session->userdata['user_id'];
                            $user = $this->usermodel->where_data('users', array('id' => $uid));
//print_r($user[0]->email);
//$invite_email=$user[0]->email;
//print_r($email);
                            $board = $this->usermodel->where_data('board_invites', array('status' => '0', 'email' => $user[0]->email));
// print_r(count($board));
                            $j = 0;

                            for ($i = 0; $i < count($board); $i++) {
                                $j++;
                                $boardid = $board[$i]->boardid;
                                $boards = $this->usermodel->where_data('user_board', array('bid' => $boardid));
                                $boardname = $boards[0]->bordname;
                                ?>
                                <div style="border-bottom:3px solid #e9e9e9;margin-bottom: 10px;" id="board<?= $boardid ?>" >

                                    <a href="<?= base_url() ?>board/<?= $boardname ?>">
                                        <div style="width:50%;" class="catpopuptext">

                        <img src="<?php echo base_url() . 'assert/images/Board_Profile_Pic_Icon.png'; ?>" style="width:100px; height: 100px;"></div>
                                        <p class="catpopuphead" style="width:50%;margin-bottom: -34px;"> <?= $boardname ?>
                                        </p></a>
                                    <input type="hidden" id="email" value="<?= $user[0]->email ?>">
                                    <input type="button" value="Accept" name="Accept" id="accept<?= $boardid ?>" class="accept" style="color:#FFF;background-color:#00F;border-radius:8px;margin-bottom: 23px;padding: 2px 16px;margin-left: 65%;" />
                                    <input type="button" value="Reject" name="Reject" id="reject<?= $boardid ?>" class="reject" style="color:#000;background-color:#FFF;border-radius: 8px;padding: 2px 16px;" />

                                </div>
                                <?php
                            }
                            if ($j == 0) {
                                ?>
                                <p class="catpopuphead" style="width:50%;margin-bottom: 0px; margin-left: 25%"> No Pending Invitations
                                </p>
                                <?php
                            }
                            /* foreach ($board as $ct) {
                              ?>
                              <div class="catpopdiv">
                              <a href="#">
                              <div style="width:100%;" class="catpopuptext">
                              <!--<img src="<?php echo base_url() . 'assert/images/Board_Profile_Pic_Icon.png'; ?>" class="follow" style="width:100%;">--></div>
                              <p class="catpopuphead"><?= $ct['boardid'] ?></p>
                              <!--<p class="catpopuptext" >dsad sds dsds dsds d</p>    -->
                              </a>     </div>

                              <?php } */
                            ?>
                            <!--<div class="catpopdiv">
                                <a href="#" data-toggle="modal" data-target="#mycreatvers" id="newmodelpopup">
                                    <div style="width:100%;" class="catpopuptext">
                                        <img src="<?php echo base_url() . 'assert/images/Add_Board.png'; ?>" class="follow" style="width:100%;"></div>
                                    <p class="catpopuphead">Add New Board</p>
                                </a>    </div>


                            <div class="catpopdiv">
                                <a href="#" data-toggle="modal" data-target="#boardlist" id="neboardlist">
                                    <div style="width:100%;" class="catpopuptext">
                                        <img src="<?php echo base_url() . 'assert/images/Existing_Board.png'; ?>" class="follow" style="width:100%;"></div>
                                    <p class="catpopuphead">View List</p>
                                </a>      </div>-->

                        </div></div>
                </div>
            </div>
        </div>

        <!--------------------------category popup editorial---------------------------->
        <div id="popupeditorl" class="modal fade" role="dialog">
            <div class="modal-dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Select Category</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <?php
                            $cat = $this->datamodel->catlist();
                            foreach ($cat as $ct) {
                                ?>
                                <div class="catpopdiv">
                                    <a href="<?= base_url(); ?>posteditorial/<?= $ct['category'] ?>">
                                        <div style="width:100%;" class="catpopuptext">
                                            <img src="<?php echo base_url() . 'assert/images/Board_Profile_Pic_Icon.png'; ?>" class="follow" style="width:100%;"></div>
                                        <p class="catpopuphead"><?= $ct['category'] ?></p>
                                        <!--<p class="catpopuptext" >dsad sds dsds dsds d</p>    -->
                                    </a>     </div>

<?php } ?>
                            <div class="catpopdiv">
                                <a href="#" data-toggle="modal" data-target="#mycreatedit" id="newmodelpopup">
                                    <div style="width:100%;" class="catpopuptext">
                                        <img src="<?php echo base_url() . 'assert/images/Add_Board.png'; ?>" class="follow" style="width:100%;"></div>
                                    <p class="catpopuphead">Add New Board</p>
                                </a>    </div>


                            <div class="catpopdiv">
                                <a href="#" data-toggle="modal" data-target="#boardlistedit" id="neboardlist">
                                    <div style="width:100%;" class="catpopuptext">
                                        <img src="<?php echo base_url() . 'assert/images/Existing_Board.png'; ?>" class="follow" style="width:100%;"></div>
                                    <p class="catpopuphead">View List</p>
                                </a>      </div>

                        </div></div>
                </div>
            </div>
        </div>

        <!-- video popup-->
        <div id="popupvideo" class="modal fade" role="dialog">
            <div class="modal-dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Select Category</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <?php
                            $cat = $this->datamodel->catlist();
                            foreach ($cat as $ct) {
                                ?>
                                <div class="catpopdiv">
                                    <a href="<?= base_url(); ?>postvideo/<?= $ct['category'] ?>">
                                        <div style="width:100%;" class="catpopuptext">
                                            <img src="<?php echo base_url() . 'assert/images/Board_Profile_Pic_Icon.png'; ?>" class="follow" style="width:100%;"></div>
                                        <p class="catpopuphead"><?= $ct['category'] ?></p>
                                        <!--<p class="catpopuptext" >dsad sds dsds dsds d</p>    -->
                                    </a>     </div>

<?php } ?>
                            <!--<div class="catpopdiv">
                                <a href="#" data-toggle="modal" data-target="#mycreatedit" id="newmodelpopup">
                                    <div style="width:100%;" class="catpopuptext">
                                        <img src="<?php echo base_url() . 'assert/images/Add_Board.png'; ?>" class="follow" style="width:100%;"></div>
                                    <p class="catpopuphead">Add New Board</p>
                                </a>    </div>


                            <div class="catpopdiv">
                                <a href="#" data-toggle="modal" data-target="#boardlistedit" id="neboardlist">
                                    <div style="width:100%;" class="catpopuptext">
                                        <img src="<?php echo base_url() . 'assert/images/Existing_Board.png'; ?>" class="follow" style="width:100%;"></div>
                                    <p class="catpopuphead">View List</p>
                                </a>      </div>-->

                        </div></div>
                </div>
            </div>
        </div>

        <!------------------board list story popup-------------------->

        <div id="boardlist" class="modal fade" role="dialog">
            <div class="modal-dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center"> Select Category</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <?php
                            $bat = $this->datamodel->bordlist();
                            foreach ($bat as $bt) {
                                ?>
                                <div class="catpopdiv">
                                    <a href="<?= base_url(); ?>poststory/<?= $bt['category'] ?>/<?= $bt['bordname'] ?>">
                                        <div style="width:100%;" class="catpopuptext">
                                            <img src="<?php echo base_url() . 'assert/images/Board_Profile_Pic_Icon.png'; ?>" class="follow" style="width:100%;"></div>
                                        <p class="catpopuphead"><?= $bt['bordname'] ?></p>
                                        <!--<p class="catpopuptext" >dsad sds dsds dsds d</p>    -->
                                    </a>
                                </div>
<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!------------------------------------>

        <!------------------board list edit popup-------------------->

        <div id="boardlistedit" class="modal fade" role="dialog">
            <div class="modal-dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Select Category</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <?php
                            $bat = $this->datamodel->bordlist();
                            foreach ($bat as $bt) {
                                ?>
                                <div class="catpopdiv" id="board" value="<?= $bt['bid'] ?>">
                                    <a href="<?= base_url(); ?>posteditorial/<?= $bt['category'] ?>/<?= $bt['bordname'] ?>">
                                        <div style="width:100%;" class="catpopuptext">
                                            <img src="<?php echo base_url() . 'assert/images/Board_Profile_Pic_Icon.png'; ?>" class="follow" style="width:100%;">
                                        </div>
                                        <p class="catpopuphead"><?= $bt['bordname'] ?></p>
                                        <!--<p class="catpopuptext" >dsad sds dsds dsds d</p>    -->
                                    </a>
                                </div>
<?php } ?>
                            <!--<div>
                               <input type="hidden" id="subboard" name="subboard" value="<?php echo $_POST['boardid']; ?>">

                            <?php
                            $bat = $this->datamodel->getsubbodall($_POST['boardid']);
                            foreach ($subboard as $bt) {
                                ?>
                                                                                                                            <div class="catpopdiv" id="subboards" value="" >
                                                                                                                            <a href="<?= base_url(); ?>posteditorial/<?= $bt['category'] ?>/<?= $bt['bordname'] ?>">
                                                                                                                                    <div style="width:100%;" class="catpopuptext">
                                                                                                                                     <img src="<?php echo base_url() . 'assert/images/Board_Profile_Pic_Icon.png'; ?>" class="follow" style="width:100%;">
                                                                                                                                     </div>
                                                                                                                                     <p class="catpopuphead"><?= $bt['subboardname'] ?></p>
                                                                                                                                     <!--<p class="catpopuptext" >dsad sds dsds dsds d</p>    -->
                                <!-- </a>
                               </div>
<?php } ?>
</div>-->

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="subboardlistpost" class="modal fade" role="dialog">
            <div class="modal-dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Select Subboard</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="catpopdiv" value="" >
                                <a href="<?= base_url(); ?>poststory/<?= $category ?>/<?= $catname ?>">
                                    <div style="width:100%;" class="catpopuptext">
                                        <img src="<?php echo base_url() . 'assert/images/Board_Profile_Pic_Icon.png'; ?>" class="follow" style="width:100%;">
                                    </div>
                                    <p class="catpopuphead"> Home </p>
                                    <!--<p class="catpopuptext" >dsad sds dsds dsds d</p>    -->
                                </a>
                            </div>
                            <?php
                            $boardid = $this->datamodel->getboardbyname($catname);
                            $bat = $this->datamodel->getsubbodall($boardid['0']['bid']);
                            foreach ($bat as $bt) {
                                ?>
                                <div class="catpopdiv" value="" >
                                    <a href="<?= base_url(); ?>poststory/<?= $bt['category'] ?>/<?= $bt['bordname'] ?>/<?= $bt['sbid'] ?>">
                                        <div style="width:100%;" class="catpopuptext">
                                            <img src="<?php echo base_url() . 'assert/images/Board_Profile_Pic_Icon.png'; ?>" class="follow" style="width:100%;">
                                        </div>
                                        <p class="catpopuphead"><?= $bt['subboardname'] ?></p>
                                        <!--<p class="catpopuptext" >dsad sds dsds dsds d</p>    -->
                                    </a>
                                </div>
<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="subboardlistedit" class="modal fade" role="dialog">
            <div class="modal-dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Select Subboard</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="catpopdiv" value="" >
                                <a href="<?= base_url(); ?>posteditorial/<?= $category ?>/<?= $catname ?>">
                                    <div style="width:100%;" class="catpopuptext">
                                        <img src="<?php echo base_url() . 'assert/images/Board_Profile_Pic_Icon.png'; ?>" class="follow" style="width:100%;">
                                    </div>
                                    <p class="catpopuphead"> Home </p>
                                    <!--<p class="catpopuptext" >dsad sds dsds dsds d</p>    -->
                                </a>
                            </div>
                            <?php
                            $boardid = $this->datamodel->getboardbyname($catname);
                            $bat = $this->datamodel->getsubbodall($boardid['0']['bid']);
                            foreach ($bat as $bt) {
                                ?>
                                <div class="catpopdiv" value="" >
                                    <a href="<?= base_url(); ?>posteditorial/<?= $bt['category'] ?>/<?= $bt['bordname'] ?>/<?= $bt['sbid'] ?>">
                                        <div style="width:100%;" class="catpopuptext">
                                            <img src="<?php echo base_url() . 'assert/images/Board_Profile_Pic_Icon.png'; ?>" class="follow" style="width:100%;">
                                        </div>
                                        <p class="catpopuphead"><?= $bt['subboardname'] ?></p>
                                        <!--<p class="catpopuptext" >dsad sds dsds dsds d</p>    -->
                                    </a>
                                </div>
<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------>
        <!-- Modal    add new board direct -->
        <div class="modal fade" id="myModalcreat" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color: #000;
                            font-weight: bold;">START A NEW BOARD</h4>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div id="error"> </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label for="usr">Name</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <input type="text" class="form-control" placeholder="Enter Your Board Name" name="bname" id="bname">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label for="usr">Description</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <textarea class="form-control custom-control" rows="3" style="resize:none" placeholder="What's Your Board About" name="bdesc" id="bdesc"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label for="usr">Catagory</label>
                                    </div>

                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <select name="bcat" id="bcat" class="form-control">
                                            <option value="0">Select Category</option>
                                            <?php foreach ($cat as $cas) { ?>
                                                <option value="<?= $cas['category'] ?>"><?= $cas['category'] ?></option>
<?php } ?>
                                        </select>

                                    </div>

                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                                    <div class="col-lg-4 col-md-4 col-sm-4">

                                        <label for="usr" class="secret" title="To keep the board secret, click on the button beside"> Secret </label>
                                         <div class="toggle-button">
                                         <input id="cmn-toggle-7" class="cmn-toggle cmn-toggle-yes-no" type="checkbox">
                                            <button></button>
                                            
                                                </div>

                                        <!--<div class="switch">
                                            <input id="cmn-toggle-7" class="cmn-toggle cmn-toggle-yes-no" type="checkbox">
                                            <label for="cmn-toggle-7" data-on="Yes" data-off="No" title="Click to flip the button"></label>
                                        </div>-->


                                    </div>


                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label for="usr"  class="secret" title="To allow followers to post, click on the button beside."> Post </label>
                                        
                                         <div class="toggle-buttonpost">
                                         <input id="cmn-toggle-post" class="cmn-toggle cmn-toggle-yes-no" type="checkbox">
                                            <button></button>
                                                </div>
                                        <!--<div class="switch">
                                            <label for="cmn-toggle-post" data-on="Yes" data-off="No" title="Click to flip the button"></label>
                                        </div>-->


                                    </div>


                                </div>


                            </div>
                        </div>


                        <div class="modal-footer">


                            <input type="button" value="Cancel" class="btn" data-dismiss="modal">

                            <input type="submit" value="Save" class="btn" id="create_board" style="background:#993737;color:#fff;">

                        </div></form>
                </div>

            </div>
        </div>


        <!-- Modal    add new board story -->
        <div class="modal fade" id="mycreatvers" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color: #000;
                            font-weight: bold;">START A NEW BOARD</h4>
                    </div>
                    <form action="<?= base_url() ?>users/creatboardstory" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label for="usr">Name</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <input type="text" class="form-control" placeholder="Enter Your Board Name" name="bname" id="bname">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label for="usr">Description</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <textarea class="form-control custom-control" rows="3" style="resize:none" placeholder="Waht's Your Board About" name="bdesc" id="bdesc"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
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
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" data-dismiss="modal" value="Cancel" class="btn">
                            <input type="submit" value="Save" class="btn" style="background:#993737;color:#fff;">
                        </div>
                    </form>
                </div>

            </div>
        </div>



        <!-- Modal    add new board editorial -->
        <div class="modal fade" id="mycreatedit" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color: #000;
                            font-weight: bold;">START A NEW BOARD</h4>
                    </div>
                    <form action="<?= base_url() ?>users/creatboardedit" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label for="usr">Name</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <input type="text" class="form-control" placeholder="Enter Your Board Name" name="bname" id="bname">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label for="usr">Description</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <textarea class="form-control custom-control" rows="3" style="resize:none" placeholder="Waht's Your Board About" name="bdesc" id="bdesc"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
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
                                </div>



                            </div>
                        </div>


                        <div class="modal-footer">


                            <input type="button" value="Cancel" class="btn">

                            <input type="submit" value="Save" class="btn" style="background:#993737;color:#fff;">

                        </div></form>
                </div>

            </div>
        </div>
        <script>
            $('#datetimepicker_mask').datetimepicker({
            });
        </script>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-61123198-1', 'auto');
            ga('send', 'pageview');

        </script>