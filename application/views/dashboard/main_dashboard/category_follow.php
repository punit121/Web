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
<div class="panel-heading" style="background: #555;color: #fff;"><h3 class="panel-title">Follow Category</h3></div>
<?php
foreach ($not_followed_categories as $category) :
    ?>


    <form class="category_action_form row">
        <label class="col-md-12">

            <div  style=" margin-top:10px">
                <div class=" col-sm-3 col-sm-offset-1" style="padding:0px; margin-top:5%;">
                    <div class="square-box ">
                        <a class="square-content" href="<?= base_url() ?>category/<?= $category['cat_name']; ?>" style="text-decoration:none">
                            <img class="img-responsive" src="<?= base_url() ?>assert/catimg/<?php echo $category['proimg'] ?>">
                        </a>
                    </div>
                </div>
                <div class="col-sm-8" style="margin-top: -8px;padding:0px;">
                    <a href="<?= base_url() ?>category/<?= $category['cat_name'] ?>" style="text-decoration:none"><div class="col-sm-12 catagorynew_txt_dv"><?= $category['cat_name']; ?></div></a>
                    <div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center">
                        <button type="button" class="btn btn-follow follow_category" data-cid="<?= $category['cat_name'] ?>"  onclick="follow_category($(this))"> Follow </button>
                    </div>
                </div>
            </div>
        </label>
    </form>
    <?php
endforeach;
?>
<div class="col-sm-12 text-left" style="margin-top:10px;"><a href="<?= base_url() ?>allcategory">More...</a></div>

