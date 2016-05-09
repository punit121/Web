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
<div class="container-fluid mainheder" style="width:100%;">
    <div class=" col-xs-12">
        <div class=" col-sm-6 col-xs-12">
            <div class="col-xs-6">
                <a href="<?= base_url() ?>"><img src="<?= base_url(); ?>assert/images/my.png" style="padding: 5px; width:60%; padding-top:8px">
                </a>
            </div>
            <div class=" col-xs-6">

            </div>
        </div>
        <div class=" col-sm-6 col-xs-12">
            <div class=" col-xs-12">
                <div class="col-xs-7">

                </div>
                <div class=" col-xs-5">
                    <div class="col-xs-2">

                        <?php
                        // This is user image,should be  fetched in controller    and passed here
                        /*  <img src="<?php if ($this->usermodel->getLoginimage($this->session->userdata['user_id'])) {
                          echo base_url();
                          ?>assets/images/merchant/<?php
                          echo ($this->usermodel->getLoginimage($this->session->userdata['user_id']));
                          } else {
                          echo base_url() . 'assets/images/merchant/usericon.jpg';
                          }
                          ?>" class="logo_img"> */
                        // the following lines has interpreted it very well
                        ?>

                        <img src="<?= $login_image ?>" class="logo_img">
                    </div>
                    <div class=" col-xs-10">
                        <?php
                        //  if user is present it should be checked in the view but
                        //  accessing seesions directly is not the right way of doing it
                        /* <?php if ($this->session->userdata['user_id']) {
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
                          <?php } ?>
                         */
                        ?>
                        <?php if ($user) { ?>
                            <div class="dropdown_div">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                    <?= $user['login_name'] ?>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
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
</div>