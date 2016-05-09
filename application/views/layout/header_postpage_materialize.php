<?php
/*
 * Idea of MVC is such that the code is kept modular and away from the other kind
 * Models are only used for data transactions
 * Controllers are processors as well as view renderers
 * Views are only meant to handle the passed data
 *
 * Keeping this in mind , no functionalities should be called
 * directly ( strict mode) in any view, controllers should fetch data from
 * models or any other data sources, views should only display it
 * neither fetching nor parsing is done by views (unless ajax)
 */
?>
<?php echo '<body>'; ?>

<div class='row mainheder padding-top-10 ' style="width:100%; margin-top:0;">
    <div class=" col m6 col s12">
        <div class='row'>
            <div class="col s6">
                <a href="<?= base_url() ?>"><img src="<?= base_url(); ?>assert/images/my.png"  class='zersey-logo'>
                </a>
            </div>
            <div class=" col s6">

            </div>
        </div>
    </div>

    <div class=" col m6 col s12 ">
        <div class=" row">
            <div class=" col s5 offset-s7">

                <div class="col s2">
                    <img src="<?= $login_image ?>" class="logo_img">
                </div>
                <div class=" col s10">
                    <?php if ($user) { ?>
                        <div class="dropdown_div">
                            <a class="dropdown-toggle dropdown-button" href="#" data-activates="setting_menu">
                                <?= $user['login_name'] ?>
                                <span >&#9660;</span></a>
                            <ul class="dropdown-menu dropdown-content" id='setting_menu'>
                                <?php // user is passed as a dictionary in the controller it will thus decide ?>
                                <li><a href="<?= base_url(); ?>userprofile/<?= $user['username'] ?>"  title="" class="dropdown_nev">View Profile</a></li>
                                <li><a href="<?= base_url(); ?>postdraft/<?= $user['username'] ?>" class="dropdown_nev">Draft Post</a></li>
                                <li> <a href="<?= base_url(); ?>logout" class="dropdown_nev">Log Out</a></li>
                            </ul>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="" style="height:0px;margin-top:50px;">
</div>
