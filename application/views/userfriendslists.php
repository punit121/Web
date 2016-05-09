<div class="col-lg-12 col-md-12 col-sm-12 userfriend_main_div" id="dashboard_image_div">
    <?php
    $result = $this->datamodel->selectuser();
    //print_r($result);
    //print_r(max($follow));
    $ids = Array();
    $i = 0;
    for ($i = 0; $i < 20; $i++) {

        $max = max($post);
        //echo $max."<br>";
        $key = array_search($max, $post);
        //echo $key."<br>";
        array_push($ids, $key);
        unset($post[$key]);
    }
    //print_r($ids);


    $j = 0;
    for ($j = 0; $j < count($ids); $j++) {


        $uid = $ids[$j];
        //echo $uid;


        $cntpost = $this->datamodel->countofuserpost($uid);
        $cntpost1 = $this->datamodel->countofuserfoll($uid);
        $cntfollowing = $this->datamodel->countfollowing($uid);
        $user = $this->usermodel->where_data('customer', array('userId' => $uid));
        //print_r();
        $usid = $this->session->userdata['user_id'];
        $pro1 = $this->datamodel->selectuserfollow($uid, $usid);
        $follid = $pro1[0]['fuid'];
        $photox = $this->usermodel->where_data('users', array('id' => $uid));
        ?>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 0px;">
            <div class="userfriend_center_div">
                <div style="position: relative;">
                    <div>
                        <a href="<?= base_url() ?>userprofile/<?= $photox[0]->username; ?>"><img src="<?php
                            if (isset($user[0]->covimg)) {
                                echo base_url();
                                ?>assets/images/merchant/<?php
                                                                                                     echo $user[0]->covimg;
                                                                                                 } else {
                                                                                                     echo base_url() . 'assets/images/merchant/d_Cover.jpg';
                                                                                                 }
                                                                                                 ?>" style="width:100%; background-color:#ccc;height:190px;"></a>
                    </div>
                    <div class="userfriend_img">
                        <a href="<?= base_url() ?>userprofile/<?= $photox[0]->username ?>"><img src="<?php
                            if (isset($user[0]->photo)) {
                                echo base_url();
                                ?>assets/images/merchant/<?php
                                                                                                    echo $user[0]->photo;
                                                                                                } else {
                                                                                                    echo base_url() . 'assets/images/merchant/usericon.jpg';
                                                                                                }
                                                                                                ?>" style="width:100%; background-color:#ccc;"></a>
                    </div>
                </div>
                <div class="userfriend_data">
                    <a href="<?= base_url() ?>userprofile/<?= $photox[0]->username ?>"> <p class="user_name_frnds"><?php
                            if (isset($user[0]->fullname))
                                echo $user[0]->fullname;
                            else
                                echo'unknown';
                            ?></p></a>

                </div>
                <div class="userfriend_data1">
                    <?php
                    if ($pro1 == "0") {
                        ?>

                        <button type="button" class="btn btn-follow" data-uid="<?= $user[0]->userId; ?>" onclick="follow_user($(this))">Follow</button>
                        <?php
                    } else {
                        ?>
                        <button type="button" class="btn btn-follow" data-uid="<?= $user[0]->userId ?>" onclick="follow_user($(this))">Unfollow</button>
                    <?php } ?>
                </div>
                <div>
                    <p style="margin-left:10px;"> followers <?= $cntpost1 ?> following  <?= $cntfollowing ?> posts <?= $cntpost ?> </p>
                </div>
            </div>
        </div>
    <?php } ?>

</div>
<script>

    /**
     *
     * @param {type} btn
     * @returns {undefined}
     */
    function follow_user(btn) {

        btn.prop('disabled', true);
        var status = 'follow';
        if (btn.text() === 'Unfollow') {
            status = 'un_follow';
        }
        var data = {user_id: btn.attr('data-uid'), status: status};
        //i have to write ajax query here
        $.post('<?= base_url() ?>follow_user', data)
                .done(function (result) {
                    //if success change the ui
                    update_followBtn(btn, result);
                })
                .fail(function () {
                    btn.prop('disabled', false);
                });
    }

    //update followBtn is on category_follow file ass well so delete on conjunction
    /**
     * this updates the follow button based on status and result
     * @param {type} btn
     * @param {type} result
     * @returns {undefined}
     */
    function update_followBtn(btn, result) {
        // unfollowed
        if (btn.text() === 'Unfollow') {
            if (result === 'success') {
                // unfollwed successfully
                //btn should read follow
                btn.text('Follow');
            } else {
                //error un following
                //btn will read un follow
                btn.text('Unfollow');
            }
        } else {
            //followed
            if (result === 'success') {
                //sucessfully followed
                //btn will read unfollow
                btn.text('Unfollow');
            } else {
                //error following
                //btn will read follow
                btn.text('Follow');
            }
        }
        btn.prop('disabled', false);
    }
</script>
