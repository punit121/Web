<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

        <title>Untitled Document</title>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/jquery.classyedit.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/style.css"/>
        <link href="<?= base_url() ?>assert/plugins/Materialize/dist/css/materialize.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/responsive.css"/>
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/jquery.datetimepicker.css"/>
        <!--bandana -->
        <!--bandana -->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/header.css">
            <script src="<?= base_url(); ?>assert/js/jquery.min.js"></script>
            <!--bandana -->
            <script src="<?= base_url(); ?>assert/js/jquery.classyedit.js"></script>
            <script src="<?= base_url(); ?>assert/js/jquery.datetimepicker.full.js"></script>
            <script>
<?php
if (isset($error)) {
    ?>
                    var maincat = "<?= $this->uri->segment(3); ?>";
    <?php
} else {
    ?>
                    var maincat = "<?= $this->uri->segment(2); ?>";
    <?php
}
?>
                //alert(maincat);

                var baseurl = "<?= base_url(); ?>"

                var ids = 0;

            </script>
            <script src="<?= base_url(); ?>assert/js/page/vertualpost.js"></script>

            <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
    </head>

