<script>
    function datepicker()

    {
        $("#datetimepicker1").show();
        $("#hide_btn").hide();
        $("#show_submit_btn").show();
    }
</script>

<?php
$uid = $this->session->userdata['user_id'];
?>

<style>
    .codrops-demos
    {
        margin:-2% -85px 0px -1%;
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
                                        <i class="fa fa-pencil-square-o corner_fa_icon">&nbsp; Update Status</i>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="addpost">
                                    <?php if (!empty($catname)) { ?>
                                        <a href="<?= base_url(); ?>posteditorial/<?= $catname ?>" style="display:inline-block;" >
                                            <i class="fa fa-commenting corner_fa_icon">&nbsp; Post Editorial</i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="#" data-toggle="modal" data-target="#popupeditorl" style="display:inline-block;">
                                            <i class="fa fa-calendar-plus-o corner_fa_icon">&nbsp; Post Editorial</i>
                                        </a>
                                    <?php } ?>
                                </div>
                            </li>
                            <li>
                                <div class="addpost">
                                    <?php if (!empty($catname)) { ?>
                                        <a href="<?= base_url(); ?>poststory/<?= $category ?>/<?= $catname ?>" style="display:inline-block;" >
                                            <i class="fa fa-commenting corner_fa_icon">&nbsp; Post Photo Story</i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="#" style="display:inline-block;" data-toggle="modal" data-target="#newpopup">
                                            <i class="fa fa-commenting corner_fa_icon">&nbsp; Post Photo Story</i>
                                        </a>
                                    <?php } ?>
                                </div>
                            </li>
                            <li>
                                <div class="addpost">
                                    <a href="#" data-toggle="modal" data-target="#myModalcreat" id="newmodelpopup">
                                        <i class="fa fa-plus-circle corner_fa_icon">&nbsp; Add New Board</i>
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
        <?php } ?>
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
                                <div class="catpopdiv">
                                    <a href="<?= base_url(); ?>posteditorial/<?= $bt['bordname'] ?>">
                                        <div style="width:100%;" class="catpopuptext">
                                            <img src="<?php echo base_url() . 'assert/images/Board_Profile_Pic_Icon.png'; ?>" class="follow" style="width:100%;">
                                        </div>
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
                    <form action="<?= base_url() ?>users/creatboard" method="post">
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
                            <input type="button" value="Cancel" class="btn">
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