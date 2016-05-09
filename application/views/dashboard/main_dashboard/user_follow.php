<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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
<div class="panel-heading" style="background: #555;color: #fff;"><h3 class="panel-title">Follow User</h3></div>
<?php
foreach ($users_not_followed as $user) :
    $proimg = $user['photo'] ? (preg_match('/http/') ? $user['photo'] : base_url() . 'assets/images/merchant/' . $user['photo'] ) : 'http://zersey.com/assets/images/merchant/usericon.jpg';
    ?>
    <form class="row">
        <div class="col-md-12" style="padding:5px; margin-top:10px">
            <div class="col-sm-3 col-sm-offset-1" style="padding:0px;">
                <div class="square-box ">
                    <a class="square-content" href="<?= base_url() ?>userprofile/<?= $user['username'] ?>">
                        <img class="img-responsive" src="<?= $proimg ?>" class="follow" style="width:100%;padding: 5px;">
                    </a>
                </div>
            </div>
            <div class="col-sm-8" style="margin-top: -8px;padding:0px;">
                <a href="<?= base_url() ?>userprofile/<?= $user['username'] ?>"><div class="col-sm-12 " style="padding:3px;text-align:center; font-size:14px"><?php
                        echo $user['fullname'];
                        ?></div></a>
                <div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center">
                    <button type="button" class="btn btn-follow" data-uid="<?= $user['userid'] ?>" onclick="follow_user($(this))">Follow</button>
                </div>
            </div>
        </div>
    </form>
    <?php
endforeach;
?>

<div class="col-sm-12 text-left"><a href="<?= base_url() ?>alluser">More...</a></div>
</div>
