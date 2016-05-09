<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!-- including items on the go is the latest rend -->
<link href="<?= base_url() ?>assert/css/bootstrap-material.css" rel="stylesheet" type="text/css"/>

<div class = "modal fade" role = "dialog" data-backdrop = "static" id = "wizard-modal" >
    <div class = "modal-dialog1">
        <!--Modal content-->
        <div class = "modal-content">
            <div class = "modal-body">
                <!--wizard start -->
                <div class = "wizard-container" style = "padding-top: 0px;">
                    <div class = "card wizard-card ct-wizard-orange" id = "wizard">
                        <!---->
                        <fieldset>
                            <form id = "category_follow_form">
                                <div class = "tab-content">
                                    <div class = "tab-pane active" id = "about">
                                        <div class = "row">
                                            <div class = "col-sm-12">
                                                <h3 class = "info-text">
                                                    Follow Categories that interest you <br>
                                                    <small>This will help us build a custom feed for you as per your interest, Thanks!</small>
                                                </h3>
                                            </div>
                                            <div class = "col-sm-12" style = "margin-top: -20px;">
                                                <div class = "form-group" style = "border: 1px solid black; height:415px; overflow: auto;">
                                                    <!--Run a loop to generate category boxes with this code inside it to create the box-->

                                                    <?php
                                                    foreach ($not_followed_categories as $category) {
                                                        ?>
                                                        <div class="col-sm-4 col-xs-6 col-md-2">
                                                            <label style="display:block">

                                                                <div class="card" style="padding:0 !important;">
                                                                    <div class="card-image square-box">
                                                                        <div class="img-container text-center square-content " id="catimg_<?php echo $category['maincat_id'] ?>">
                                                                            <img class="img-responsive" src="<?= base_url() ?>assert/catimg/<?php echo $category['proimg'] ?>">
                                                                            <span class="card-title small black semi-transparent width-100 "><?php echo $category['cat_name'] ?></span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <input type="checkbox" name="<?php echo $category['cat_name'] ?>" onchange="selectCategory($(this))" >
                                                            </label>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    foreach ($followed_categories as $category) {
                                                        ?>
                                                        <div class="col-sm-4 col-xs-6 col-md-2">
                                                            <label style="display:block">

                                                                <div class="card" style="padding:0 !important;">
                                                                    <div class="card-image square-box">
                                                                        <div class="img-container text-center square-content " id="catimg_<?php echo $category['maincat_id'] ?>">
                                                                            <img class="img-responsive" src="<?= base_url() ?>assert/catimg/<?php echo $category['proimg'] ?>">
                                                                            <span class="card-title small black semi-transparent width-100 "><?php echo $category['cat_name'] ?></span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <input checked="checked" type="checkbox" name="<?php echo $category['cat_name'] ?>" onchange="selectCategory($(this))" >
                                                            </label>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <!--code for 1 category box ends here-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                                <div class="wizard-footer">


                                    <div class="pull-right" style="margin-top: -20px;">
                                        <button type="button" class="btn btn-finish btn-fill btn-warning btn-wd btn-sm btn-proceed"  >Proceed</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </fieldset>

                        <fieldset>
                            <form id="user_follow_form">
                                <div class = "tab-content">
                                    <div class = "tab-pane active" id = "about">
                                        <div class = "row">
                                            <div class = "col-sm-12">
                                                <h3 class = "info-text">
                                                    Follow Users <br>
                                                    <small>This will help us build a custom feed for you as per your interest, Thanks!</small>
                                                </h3>
                                            </div>
                                            <div class = "col-sm-12" style = "margin-top: -20px;">
                                                <div class = "form-group" style = "border: 1px solid black; height:415px; overflow: auto;">
                                                    <!--Run a loop to generate category boxes with this code inside it to create the box-->
                                                    <?php
                                                    foreach ($users_not_followed as $user) :

                                                        $proimg = $user['photo'] ? (preg_match('/http/', $user['photo']) ? $user['photo'] : base_url() . 'assets/images/merchant/' . $user['photo'] ) : 'http://zersey.com/assets/images/merchant/usericon.jpg';
                                                        ?>
                                                        <div class="col-sm-4 col-xs-6 col-md-2">
                                                            <label style="display:block">

                                                                <div class="card" style="padding:0 !important;">
                                                                    <div class="card-image square-box">
                                                                        <div class="img-container text-center square-content " id="catimg_<?php echo $category['maincat_id'] ?>">
                                                                            <img class="img-responsive" src="<?php echo $proimg ?>">
                                                                            <span class="card-title small black semi-transparent width-100 "><?php echo $user['fullname'] ?></span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <input  type="checkbox" name="user_<?php echo $user['userid'] ?>" onchange="selectUser($(this))" >
                                                            </label>
                                                        </div>

                                                        <?php
                                                    endforeach;
                                                    ?> <?php
                                                    foreach ($users_followed as $user) :

                                                        $proimg = $user['photo'] ? (preg_match('/http/') ? $user['photo'] : base_url() . 'assets/images/merchant/' . $user['photo'] ) : 'http://zersey.com/assets/images/merchant/usericon.jpg';
                                                        ?>
                                                        <div class="col-sm-4 col-xs-6 col-md-2">
                                                            <label style="display:block">

                                                                <div class="card" style="padding:0 !important;">
                                                                    <div class="card-image square-box">
                                                                        <div class="img-container text-center square-content " id="catimg_<?php echo $category['maincat_id'] ?>">
                                                                            <img class="img-responsive" src="<?php echo $proimg ?>">
                                                                            <span class="card-title small black semi-transparent width-100 "><?php echo $user['fullname'] ?></span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <input checked="checked" type="checkbox" name="user_<?php echo $user['userid'] ?>" onchange="selectUser($(this))" >
                                                            </label>
                                                        </div>

                                                        <?php
                                                    endforeach;
                                                    ?>
                                                    <!--code for 1 category box ends here-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                                <div class="wizard-footer">


                                    <div class="pull-right" style="margin-top: -20px;">

                                        <button type="button" class="btn btn-finish btn-fill btn-warning btn-wd btn-sm btn-proceed" onclick="loadPosts()">Proceed
                                        </button>
                                    </div>
                                    <div class="pull-left">
                                        <button class="btn btn-previous btn-fill btn-default btn-wd btn-sm " >Previous
                                        </button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </fieldset>
                        <fieldset>
                            <div class="tab-content">
                                <div class="tab-pane active" id="about">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h3 class="info-text">
                                                We are building custom feed for you.....<br>
                                                <small>Thanks!</small>
                                            </h3>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: -20px;">
                                            <div class="form-group" style="border: 1px solid black; height:415px; overflow: auto;">
                                                <!--Run a loop to generate category boxes with this code inside it to create the box-->
                                                <?php
                                                foreach ($followed_categories as $category) :
                                                    ?>
                                                    <div class="col-sm-4 col-xs-6 col-md-2">
                                                        <label style="display:block">

                                                            <div class="card" style="padding:0 !important;">
                                                                <div class="card-image square-box">
                                                                    <div class="category-img-container text-center square-content " id="catimg_<?php echo $category['maincat_id'] ?>">
                                                                        <img class="img-responsive" src="<?= base_url() ?>assert/catimg/<?php echo $category['proimg'] ?>">
                                                                        <span class="card-title small black semi-transparent width-100 "><?php echo $category['cat_name'] ?></span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <?php
                                                endforeach;
                                                ?>


                                                <?php
                                                foreach ($users_followed as $user):

                                                    $proimg = $user['photo'] ? (preg_match('/http/') ? $user['photo'] : base_url() . 'assets/images/merchant/' . $user['photo'] ) : 'http://zersey.com/assets/images/merchant/usericon.jpg';
                                                    ?>
                                                    <div class="col-sm-4 col-xs-6 col-md-2">
                                                        <label style="display:block">

                                                            <div class="card" style="padding:0 !important;">
                                                                <div class="card-image square-box">
                                                                    <div class="user-img-container text-center square-content " id="catimg_<?php echo $category['maincat_id'] ?>">
                                                                        <img class="img-responsive" src="<?php echo $proimg ?>">
                                                                        <span class="card-title small black semi-transparent width-100 "><?php echo $user['fullname'] ?></span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <?php
                                                endforeach;
                                                ?>
                                                </form>
                                                <!--code for 1 category box ends here-->
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                            <div class="wizard-footer">


                                <div class="pull-right" style="margin-top: -20px;">
                                    <!--     <button type="button" class="btn btn-finish btn-fill btn-warning btn-wd btn-sm btn-proceed" onclick="closeModals()" > Proceed </button>
                                    --> </div>
                                <div class="pull-left">
                                    <button type="button" class="btn btn-previous btn-fill btn-default btn-wd btn-sm disabled"  >Previous </button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <!-- wizard close -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    // this is so that the ajax is not loaded again
    var custom_feed_ready = true;

    //if category is selected the image should be given a tick mark
    // above it
    function selectCategory(self) {

        var inputs = $("#category_follow_form input[type=checkbox]:checked");
        var btn = $('#category_follow_form .btn-proceed');
        var imgCont = self.parent();
        btn.prop('disabled', true);
        var status = 'follow';

        if (!self.prop('checked')) {
            status = 'un_follow';
        }


        var data = {cid: self.prop('name'), status: status};
        //i have to write ajax query here
        $.post('<?= base_url() ?>follow_category', data, function (result) {
            //if success change the ui
            if (result === 'success') {
                check_follow_num(inputs, btn, 5);
            }
            updateOnSuccess(self, result, imgCont);

        });
    }

    function selectUser(self) {
        var inputs = $("#user_follow_form input[type=checkbox]:checked");
        var btn = $('#user_follow_form .btn-proceed');
        var imgCont = self.parent();
        //so wait for request to complete
        btn.prop('disabled', true);

        var status = 'follow';
        if (!self.prop('checked')) {
            status = 'un_follow';
        }

        var data = {user_id: self.prop('name').replace('user_', ''), status: status};
        //i have to write ajax query here
        $.post('<?= base_url() ?>/follow_user', data, function (result) {
            //if success change the ui

            updateOnSuccess(self, result, imgCont);
            if (result === 'success') {
                check_follow_num(inputs, btn, 5);
            }
        });
    }

    /**
     * checks for the minimum
     * @param {type} inputs
     * @param {type} btn
     * @param {type} inputs_len
     * @returns {undefined}
     */
    function check_follow_num(inputs, btn, inputs_len) {
        var checked = inputs.length;
        if (checked < inputs_len) {
            btn.html((inputs_len - checked) + ' more required');
            btn.prop('disabled', true);
        } else {
            btn.text('Proceed');
            btn.prop('disabled', false);
        }
    }

    function updateOnSuccess(self, result, imgCont) {
        // unfollowed
        if (!self.prop('checked')) {
            if (result === 'success') {
                changeOverlayStyle(imgCont, 'remove');
            } else {
                //error following
                self.prop('checked', true);
            }
        } else {
            //followed
            if (result === 'success') {
                changeOverlayStyle(imgCont, 'remove', 'add');
            } else {
                //error following
                self.prop('checked', false);
            }
        }
    }

    function changeOverlayStyle(self, stat) {
        if (stat === 'add') {
            var overlay = '<div class="overlay transition green-red tick-cross semi-transparent"></div>';
            self.appendChild(overlay);
        } else {
            self.find('.overlay').remove();
        }
    }

    $(document).ready(function () {
        var inputs = $("#category_follow_form input[type=checkbox]:checked");
        var btn = $('#category_follow_form .btn-proceed');
        //
        check_follow_num(inputs, btn, 5);
        inputs = $("#user_follow_form input[type=checkbox]:checked");
        btn = $('#user_follow_form .btn-proceed');
        //
        check_follow_num(inputs, btn, 5);
    });
    $('.wizard-container fieldset:first-child').fadeIn(function () {
        $(this).next().fadeOut();
        $(this).next().next().fadeOut();
    });
    $('.btn-proceed').on('click', function () {
        var parent_fieldset = $(this).parents('fieldset');
        var next_step = true;
        if (next_step) {
            parent_fieldset.fadeOut(400, function () {
                $(this).next().fadeIn();
            });
        } else {

            $("#wizard-modal").modal('hide');
        }
    });

    /**
     * this load posts as well as
     * confirming the selection of category and users
     * @returns {undefined}
     */
    function loadPosts() {

        var now = new Date().getTime() / 1000 | 0;
        fetch_posts(now, 'older', '24', function done(result) {
            if (result == 'success') {
                //funny to send jesus to confirm selecting data
                $.ajax({
                    type: 'post',
                    url: '<?= base_url() ?>custom_feed_input_confirm',
                    data: {'confirm': 'jesus'},
                    success: function (result) {
                        //refresh page
                        if (result === 'error') {
                            location.href = '<?= base_url() ?>';
                        }
                        if (result == 'success') {
                            closeModals();
                        }
                    },
                    error: function () {
                        location.href = '<?= base_url() ?>';
                    }
                });
            } else {
                setTimeout(loadPosts, 3000);
            }
        });
    }

    function closeModals() {
        $('.modal').modal('hide');
    }

    $("#wizard-modal").modal('show');


</script>
