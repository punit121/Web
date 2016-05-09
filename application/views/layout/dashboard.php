<!DOCTYPE html>

<html>

    <head>

        <title>zersey</title>


        <link rel="icon" href="<?= base_url() ?>assets/images/final_logo.jpg" type="image/ico">

        <!-- Google Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



        <link rel="stylesheet" href="<?= base_url(); ?>assert/css/bootstrap.min.css">

        <script src="<?= base_url(); ?>assert/js/jquery.min.js"></script>

        <script src="<?= base_url(); ?>assert/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <script src="<?= base_url(); ?>assert/js/blocksit.min.js"></script>

        <script src="<?= base_url(); ?>assert/js/jquery.datetimepicker.full.js"></script>

        <link href="<?= base_url(); ?>assert/css/responsive-slider.css" rel="stylesheet">



        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/jquery.datetimepicker.css"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/style.css">

        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/header.css">

        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/dashboard.css">



        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assert/css/responsive.css">

        <link rel="icon" href="<?= base_url(); ?>asset/images/logo.jpg" type="image/ico">

        <script src="<?= base_url(); ?>assert/js/page/dashboard.js"></script>

        <script>



            $(document).ready(function () {


                //blocksit define

                $(window).load(function () {

                    $('#container').BlocksIt({
                        numOfCol: 3,
                        offsetX: 8,
                        offsetY: 8

                    });

                });



                //window resize

                var currentWidth = 860;

                $(window).resize(function () {

                    var winWidth = $('#container').width();

                    var conWidth;



                    if (winWidth < 160) {

                        conWidth = '100%';

                        col = 1

                    } else if (winWidth < 660) {

                        conWidth = '100%';

                        col = 2

                    } else if (winWidth < 880) {

                        conWidth = '100%';

                        col = 3

                    } else if (winWidth < 1100) {

                        conWidth = '100%';

                        col = 3;

                    } else {

                        conWidth = '100%';

                        col = 3;

                    }



                    currentWidth = conWidth;

                    $('#container').BlocksIt({
                        numOfCol: col,
                        offsetX: 8,
                        offsetY: 8

                    });

                    $('#container').width(conWidth);





                });

            });

        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

