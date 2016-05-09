<div class="col-lg-12 col-md-12 col-sm-12 userfriend_main_div" id="dashboard_image_div">
    <?php
    $result = $this->datamodel->selectcategory();
    //print_r($result);
    if ($boards) {
        foreach ($boards as $rts) {
            $catnm = $rts['bordname'];

                $boardid=$this->usermodel->where_data('user_board',array('bordname'=> $catnm));
                $bid=$boardid[0]->bid;

            $cntpost = $this->datamodel->countofboardposr($catnm);
            //$cntpost1 = $this->datamodel->countofcatfoll($catnm);
            //$cat = $this->datamodel->fetchcatid($catnm);

            //category follow is chose using cat_name
            $uid = $this->session->userdata['user_id'];
            $pro = $this->usermodel->where_data('follow_board', array('boardid' => $bid, 'userid' => $uid));
            // $folid = $pro[0]['fcid'];
            ?>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding:0px;">
                <div class="userfriend_center_div">
                    <div style="position: relative;">
                        <div>
                            <a href="<?= base_url() ?>board/<?= $rts['bordname'] ?>"><img src="<?= base_url() ?>assert/catimg/<?= $rts['coverimg'] ?>" style="width:100%;height: 140px;"></a>
                        </div>
                        <div class="userfriend_img">
                            <a href="<?= base_url() ?>board/<?= $rts['bordname'] ?>"><img src="<?= base_url() ?>assert/catimg/<?= $rts['image'] ?>" style="width:100%; background-color:#ccc;"></a>
                        </div>
                    </div>
                    <div class="userfriend_data">
                        <a href="<?= base_url() ?>board/<?= $rts['bordname'] ?>"> <p class="user_name_frnds"><?= $rts['bordname'] ?></p></a>
                    </div>
                    <div class="userfriend_data1">

                        <?php
                        if($uid!=$this->uri->segment(2))
                        {
                        if (!$pro) {
                            ?>
                            <button type="button" class="btn btn-follow follow_category" data-cid="<?= $rts['category'] ?>"  onclick="follow_category($(this))"> Follow </button>
                            <?php
                        } else {
                            ?>

                            <button type="button" class="btn btn-follow follow_category" data-cid="<?= $rts['category'] ?>"  onclick="follow_category($(this))">Unfollow </button>

                        <?php } } ?>

                    </div>
                    <div >
                        <p>  <?= $cntpost ?> posts</p>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>

</div>
<script>

    /**
     *
     * @param {type} btn
     * @returns {undefined}
     */
    function follow_category(btn) {

        btn.prop('disabled', true);
        var status = 'follow';
        if (btn.text() === 'Unfollow') {
            status = 'un_follow';
        }
        var data = {cid: btn.attr('data-cid'), status: status};
        //i have to write ajax query here
        $.post('<?= base_url() ?>follow_category', data)
                .done(function (result) {
                    //if success change the ui
                    update_followBtn(btn, result);
                })
                .fail(function () {
                    btn.prop('disabled', false);
                });
    }

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