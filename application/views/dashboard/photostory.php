<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!Doctype html>
<html>
    <head>
        <title><?php $title ?></title>
        <link href="<?= base_url() ?>assert/plugins/Materialize/dist/css/materialize.min.css" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url() ?>assert/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assert/plugins/Materialize/dist/js/materialize.js" type="text/javascript"></script>
        <link href="<?= base_url() ?>assert/css/jquery.datetimepicker.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?= base_url() ?>/assert/plugins/FileDrop-master/filedrop.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .progress-custom{
                margin-top:0;
            }
            .vertical-align{
                display: -webkit-box;
                -webkit-box-orient: horizontal;
                -webkit-box-pack: center;
                -webkit-box-align: center;

                display: -moz-box;
                -moz-box-orient: horizontal;
                -moz-box-pack: center;
                -moz-box-align: center;

                display: box;
                box-orient: horizontal;
                box-pack: center;
                box-align: center;
            }
            .draw-dash-border{
                border : 3px #cccccc dashed;
                width:90%;
                margin:5% auto 0;
            }


            .icon-3x{
                font-size:3em;
            }

            .smaller{
                font-size:0.7em;
            }
            .card.padded  .card-content{
                padding:0%;
            }
            .top-left-corner{
                position:absolute;
                top:-15px;
                right:-15px;
            }
            .remove-photoItem{
                cursor: pointer;
            }
            #formModal{

                min-width: 240px;

            }
            .holder > .center-align{
                display: block;
                margin:50px auto;
            }
            .hidden{
                display:none;
            }
            .imagery{
                width:100%;

            }


            .square-box{
                position: relative;
                width: 100%;
                overflow: hidden;

            }
            .square-box:before{
                content: "";
                display: block;
                padding-top: 100%;
            }
            .square-content{
                position:  absolute;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;

                text-align: center;
            }
            .image-wrapper,.image-wrapper img{
                width: 100%;
            }
            .modal.wider{
                width:75%;

            }
            i.icon-4x{
                font-size:6rem !important;
            }
            i.icon-3x{
                font-size:2.6rem !important;
            }
            i.icon-2x{
                font-size:1.6rem !important;
            }
            i.slick{
                font-weight:200 !important;
            }

            .navigator.place-right{
                right:10.5%;;
            }
            .navigator.place-left{
                left:10.5%;
            }
            .navigator{
                position: fixed;
                top:41%;
                z-index:2000;
            }
            .navigation{

                padding: 0;
                max-height: 70%;
                width:75%;
                margin: auto;
                border-radius: 2px;

            }

            .drop_n_btn{
                padding:0!important;

            }
            .drop_n_btn .drop_btn{
                border-left:1px #ffffff;
                padding : 0 0.7rem;

            }
            .drop_n_btn .just_btn{
                padding : 0 0.9rem;

            }

        </style>
    </head>
    <body>

        <div class="progress progress-custom">
            <div class="determinate" id="progressbar" style="width: 0%"></div>
        </div>

        <div class="container">
            <div class="row">
                <div class="holder draw-dash-border col s12     " id="holder">
                    <p  id="upload" class="flow-text grey-text lighten-2 center-align">Drag & Drop </p>

                </div>
            </div>
        </div>

        <div class="formContainer">
            <?php
            echo form_open(base_url() . 'photostory/submit', array('name' => "photoStory",
                'id' => "photoStory"));
            ?>
            <!--modal scheduler -->
            <!-- Modal Structure -->
            <div id="scheduler_modal" class="modal">
                <div class="modal-content">
                    <div class="row ">
                        <div class="input-field col s12 ">
                            <input id="scheduler" name="scheduler_time" type="text" class="input_scheduler_time validate"  >
                            <label for="scheduler">Scheduler Time</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a onclick="schedulePhotoStory()" class=" btn  waves-effect waves-green ">Schedule It</a>
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                </div>
            </div>
            <div class="container">
                <div class="row hide">
                    <div class="input-field col s12 hide ">
                        <input  name="board" type="text" class="input_board validate" value="Appu" hidden>
                        <label for="board">id</label>
                    </div>
                </div>
                <div class="row hide">
                    <div class="input-field col s12 hide ">
                        <input  name="scheduler_status" type="checkbox" class="input_sheduler_status validate" value="1" hidden>
                        <label for="scheduler_status">sheduler status</label>
                    </div>
                </div>
                <div class="row hide">
                    <div class="input-field col s12 hide ">
                        <input  name="savedraft_status" type="checkbox" class="input_savedraft_status validate" value="1" hidden>
                        <label for="savedraft_status">savedraft</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="head_title" type="text" name="head" class="input_head validate" required>
                        <label  for="head_title">Title</label>
                    </div>

                    <div class="input-field col s12 m6 hide">
                        <input type="text" name="category" class="input_category validate" required hidden value="main cat">
                        <label  for="category">Category</label>
                    </div>
                </div>
            </div>
            <div class="container">
                <div id="thumbList" class="row"></div>
            </div>
            <div id="formList" >


            </div>
            <div class="container">
                <div class="row ">
                    <div class="col m2 s4 offset-s3 offset-m8 right-align">
                        <select class="icons" name="privacy">
                            <option value="1" data-icon="<?= base_url() ?>assert/images/public.png" class="left circle">Public</option>
                            <option value="2" data-icon="<?= base_url() ?>assert/images/private.png" class="left circle">Private</option>
                        </select>
                        <label>Images in select</label>
                    </div>


                    <div class="btn right-align drop_n_btn">
                        <span class="drop_btn dropdown-button waves-effect waves-green  lighten-2 right" data-activates="publishList">
                            <i class="material-icons">keyboard_arrow_down
                            </i>
                        </span>
                        <div class=" just_btn waves-effect waves-green  lighten-2 right" onclick="submitPhotoStory()" >
                            Publish
                        </div>
                        <ul id='publishList' class='dropdown-content'>
                            <li>
                                <a class=" waves-effect waves-green  " onclick="saveDraftPhotoStory()">Save as Draft</a>
                            </li>
                            </li>

                            <li class="divider"></li>
                            <li>
                                <a class=" waves-effect waves-green modal-trigger " href="#scheduler_modal">Schedule Post</a>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
            <?php echo form_close() ?><!--form-->
        </div>

        <!--thumbnail template card -->
        <div  id="thumb_temp_holder" style='display: none; visibility: hidden;'>
            <div class="small_holder">
                <div class="row" id='thumb_template'>
                    <div class="col s6 m2 photoThumb"  >
                        <div class="card padded hoverable ">
                            <div class = "btn-floating waves-effect waves-light red top-left-corner remove_photoItem" >
                                <i class="material-icons">clear</i>
                            </div>
                            <div class="card-image square-box">
                                <div class="  vertical-align text-center square-content ">
                                    <img src="" class="imagery" alt="">
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="flow-text">
                                    <div class="smaller card-title black-text">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- form modal template -->
        <div id="formModalTemplate" style='display: none; visibility: hidden;'>
            <div class="modal wider">
                <div class="modal-content row">
                    <div class="col s12 m5">
                        <div class="row">
                            <div class="col s12">
                                <div class=" vertical-align text-center square-box">
                                    <div class="image-wrapper  square-content">
                                        <img src=""  alt='' class="photoFullView"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m7 ">
                        <div class="row hide">
                            <div class="input-field col s12 hide ">
                                <input  name="pic_id[]" type="text" class="input_pic_id validate" hidden>
                                <label for="pic_id">id</label>
                            </div>
                        </div>
                        <div class="row hide">
                            <div class="input-field col s12 hide ">
                                <input  name="savedraft" type="checkbox" class="input_savedraft " hidden>
                                <label for="savedraft">Save As Draft</label>
                            </div>
                        </div>
                        <div class="row hide">
                            <div class="input-field col s12  ">
                                <input  name="pic[]" type="text" class="input_pic validate" hidden>
                                <label for="pic[]">picture</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="desc" name="desc[]" length="10000"  minlength="100" class="input_desc materialize-textarea validate " required></textarea>
                                <label data-error="very short!"  for="desc">Description</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="img_cred"  name="img_cred[]" type="text" class="input_img_cred validate">
                                <label for="img_cred">Image Credits</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" class="intro_pic">
                                        <span class="lever"></span>
                                        Make This Intro Pic
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="navigation">
            <a class="btn-floating btn-large waves-effect waves-light red  navigator place-right ">
                <i class="icon-3x material-icons slick " onclick="next_form()">chevron_right</i>
            </a>
            <a class="btn-floating btn-large waves-effect waves-light red  navigator place-left">
                <i class="icon-3x material-icons slick" onclick="prev_form()">chevron_left</i></a>

        </div>




        <script src="<?= base_url() ?>/assert/plugins/FileDrop-master/filedrop-min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assert/js/jquery.datetimepicker.full.js" type="text/javascript"></script>
        <script>
                    function schedulePhotoStory() {
                        if ($('.input_scheduler_time').val()) {
                            $('.input_scheduler_status').prop('checked', true);
                            submitPhotoStory();
                        } else {
                            alert('set a time for scheduling');
                        }
                    }
                    function saveDraftPhotoStory() {
                        if (!$('.input_savedraft_status').prop('checked')) {
                            $('.input_savedraft_status').prop('checked', true);
                            submitPhotoStory();
                        } else {
                            submitPhotoStory();
                        }
                    }
                    function submitPhotoStory() {
                        var btn = $(this);
                        var flag = 0;
                        var inputs = $('#photoStory .input_desc').length, l = 0;
                        if (!$('.input_head').val()) {
                            flag = 1;
                        }
                        if (inputs < 5) {
                            alert('You need at least 5 photo items for the story');
                            flag = 1;
                        }
                        $('.input_desc').each(function () {
                            minLength = $(this).attr('minlength');
                            length = $(this).val().length;
                            maxlength = $(this).attr('length');
                            if (length > maxlength || length < minLength) {
                                flag = 1;
                            }
                            l++;
                            if (l === inputs && flag === 0) {
                                $('#photoStory').submit();
                            } else if (l === inputs && flag !== 0) {
                                btn.addClass('red').delay(400).removeClass('red');
                            }
                        });
                    }
                    $(document).ready(function () {
                        $('#scheduler').datetimepicker({
                            minDate: '0',
                            maxDate: '+1970/01/30'
                        });
                        $('select').material_select();
                        $('.modal-trigger').leanModal();
                        $('.navigation').hide();
                    });
                    $('.dropdown-button').dropdown({
                        inDuration: 300,
                        outDuration: 225,
                        constrain_width: false, // Does not change width of dropdown to that of the activator
                        hover: true, // Activate on hover
                        gutter: 0, // Spacing from edge
                        belowOrigin: false, // Displays dropdown below the button
                        alignment: 'left' // Displays dropdown with edge aligned to the left of button
                    });
                    var photoStory = {}, i = 0;
                    //rivets
                    // We can deal with iframe uploads using this URL:
                    var options = {multiple: true};
                    // 'zone' is an ID but you can also give a DOM node:
                    var zone = new FileDrop('holder', options);
                    // Do something when a user chooses or drops a file:
                    zone.event('send', function (files) {
                        // FileList might contain multiple items.

                        files.each(function (file) {
                            // Send the file:
                            file.sendTo('<?= base_url() ?>upload_pic/photostory');
                            file.event('done', function (xhr) {
                                setTimeout(function () {
                                    $('#progressbar').css('width', 0);
                                }, 1000);
                                //parse the json
                                var data = JSON.parse(xhr.responseText);
                                //suceess then add file
                                if (data.success) {
                                    var id = data.id;
                                    //Add image thumbnail
                                    file.readDataURI(function (uri) {
                                        addPhotoStoryItem(uri, id);
                                    });
                                    photoStory[id] = {};
                                    photoStory[id].img = data.file_name;
                                    photoStory[id].id = data.id;
                                    photoStory[id].img_cred = '';
                                    photoStory[id].desc = '';

                                    if (i === 0) {
                                        photoStory[id].intro = 'checked';
                                    } else {
                                        photoStory[id].intro = '';
                                    }
                                    i++;

                                } else {
                                    console.log(data.error);
                                }
                                // Here, 'this' points to fd.File instance.
                                //alert(xhr.responseText);

                            }
                            );
                            file.event('error', function (e, xhr) {
                                // alert(xhr.status + ', ' + xhr.statusText);
                            });
                            file.event('progress', function (current, total) {
                                var width = current / total * 100 + '%';
                                $('#progressbar').css('width', width);
                            });
                        });
                    });


                    /**
                     * It should add the part of the story to
                     * make it right preview
                     * @param {string} id Id to the image
                     * @param {string} src image src to be added
                     * @returns {undefined}
                     * */
                    function addPhotoStoryItem(src, id) {
                        var thumbList = document.getElementById('thumbList');
                        var photoThumbs = document.getElementById('thumb_temp_holder');
                        photoThumbs = photoThumbs.cloneNode(true);
                        var photoThumb = photoThumbs.getElementsByClassName('photoThumb')[0];
                        //set id
                        photoThumb.id = 'thumb_' + id;
                        //ading button for removal
                        var remove_btn = photoThumb.getElementsByClassName('remove_photoItem')[0];
                        remove_btn.addEventListener('click', function (event) {
                            remove_item(id);
                        });
                        var imagery = photoThumb.getElementsByClassName('imagery')[0];
                        imagery.addEventListener('click', function (event) {
                            show_form(id);
                        });
                        imagery.src = src;
                        thumbList.appendChild(photoThumb);

                        var formList = document.getElementById('formList');
                        var formModalTemplate = document.getElementById('formModalTemplate');
                        formModalTemplate = formModalTemplate.cloneNode(true);

                        var formModal = formModalTemplate.getElementsByClassName('modal')[0];
                        formModal.id = 'form_' + id;

                        var desc = formModal.getElementsByClassName('input_desc')[0];
                        desc.id = 'input_desc_' + id;
                        var descLabel = desc.parentNode.getElementsByTagName('label')[0];
                        descLabel.setAttribute("for", 'input_desc_' + id);

                        var img_cred = formModal.getElementsByClassName('input_img_cred')[0];
                        img_cred.id = 'input_img_cred_' + id;
                        var img_credLabel = img_cred.parentNode.getElementsByTagName('label')[0];
                        img_credLabel.setAttribute("for", 'input_img_cred_' + id);


                        var pic_name = formModal.getElementsByClassName('input_pic')[0];
                        pic_name.value = photoStory[id].img;

                        var pic_id = formModal.getElementsByClassName('input_pic_id')[0];
                        pic_id.value = id;

                        var intro_pic = formModal.getElementsByClassName('intro_pic')[0];
                        intro_pic.name = id;
                        intro_pic.checked = photoStory[id].intro;

                        var photoFullView = formModal.getElementsByClassName('photoFullView')[0];
                        photoFullView.src = src;
                        formList.appendChild(formModal);

                        $('#form_' + id + ' textarea.input_desc').characterCounter();

                        $(".intro_pic").change(function () {
                            $(".intro_pic").prop('checked', false);
                            $(this).prop('checked', true);
                        });


                    }



                    function show_form(id) {

                        $('#form_' + id).openModal({
                            dismissible: true, // Modal can be dismissed by clicking outside of the modal
                            opacity: .5, // Opacity of modal background
                            in_duration: 10, // Transition in duration
                            out_duration: 10, // Transition out duration
                            ready: function () {
                                $('.navigation').show('slow');
                            }, // Callback for Modal open
                            complete: function () {
                                $('.navigation').hide('fast');
                            } // Callback for Modal close
                        });

                        $('.navigation').show();
                    }


                    var x = null;
                    /**
                     *  to get the next modal open up
                     * @param {type} $id
                     * @returns {undefined} */
                    function next_form() {
                        if (x)
                            clearTimeout(x);
                        x = setTimeout(function () {
                            // do the work here
                            //disable button to reduce problem with clicking next fast
                            if ($('#formList .modal').length > 1) {
                                $('#formList .modal').each(function () {
                                    var self = $(this);
                                    if (self.css('display') !== 'none') {
                                        if (self.next().is('.modal')) {
                                            console.log(self.next());
                                            self.closeModal();
                                            self.next().openModal({
                                                dismissible: true, // Modal can be dismissed by clicking outside of the modal
                                                opacity: .5, // Opacity of modal background
                                                in_duration: 10, // Transition in duration
                                                out_duration: 10, // Transition out duration
                                                ready: function () {
                                                    $('.navigation').show('slow');
                                                }, // Callback for Modal open
                                                complete: function () {
                                                    $('.navigation').hide('fast');
                                                } // Callback for Modal close
                                            });
                                            return false;
                                        } else {
                                            self.closeModal();
                                            $('#formList .modal').first().openModal({
                                                dismissible: true, // Modal can be dismissed by clicking outside of the modal
                                                opacity: .5, // Opacity of modal background
                                                in_duration: 10, // Transition in duration
                                                out_duration: 10, // Transition out duration
                                                ready: function () {
                                                    $('.navigation').show('slow');
                                                }, // Callback for Modal open
                                                complete: function () {
                                                    $('.navigation').hide('fast');
                                                } // Callback for Modal close
                                            });
                                            return false;

                                        }
                                    }
                                });
                            }
                        }, 200);

                    }

                    /**
                     * this function has also been protected from overuse
                     *
                     * @returns {undefined}                     */
                    function prev_form() {
                        if (x)
                            clearTimeout(x);
                        x = setTimeout(function () {
                            if ($('#formList .modal').length > 1) {
                                $('#formList .modal').each(function () {
                                    var self = $(this);
                                    if (self.css('display') !== 'none') {
                                        if (self.prev().is('.modal')) {

                                            self.closeModal();
                                            self.prev().openModal({
                                                dismissible: true, // Modal can be dismissed by clicking outside of the modal
                                                opacity: .5, // Opacity of modal background
                                                in_duration: 10, // Transition in duration
                                                out_duration: 10, // Transition out duration
                                                ready: function () {
                                                    $('.navigation').show('slow');
                                                }, // Callback for Modal open
                                                complete: function () {
                                                    $('.navigation').hide('fast');
                                                } // Callback for Modal close
                                            });
                                            return false;
                                        } else {
                                            self.closeModal();
                                            $('#formList .modal').last().openModal({
                                                dismissible: true, // Modal can be dismissed by clicking outside of the modal
                                                opacity: .5, // Opacity of modal background
                                                in_duration: 10, // Transition in duration
                                                out_duration: 10, // Transition out duration
                                                ready: function () {
                                                    $('.navigation').show('slow');
                                                }, // Callback for Modal open
                                                complete: function () {
                                                    $('.navigation').hide('fast');
                                                } // Callback for Modal close
                                            });
                                            return false;
                                        }
                                    }
                                });
                            }
                        }, 200);

                    }

                    function remove_item(id) {

                        var thumbs = document.getElementById('thumbList');
                        var thumb = document.getElementById('thumb_' + id);
                        thumbs.removeChild(thumb);

                        var forms = document.getElementById('formList');
                        var form = document.getElementById('form_' + id);
                        forms.removeChild(form);

                        delete photoStory[id];
                    }










        </script>
    </body>
</html>
