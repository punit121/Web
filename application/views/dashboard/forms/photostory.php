<!-- everything before this can be found in layout/header_postview.php -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?= base_url() ?>assert/plugins/FileDrop-master/filedrop.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://www.google.com/jsapi">

</script>


<div class="container">
    <div class="row ">
        <div class="holder draw-dash-border tooltipped col s12"   data-position="top" data-delay="50" data-tooltip="<?php echo ' Add minimum 5 photos in the box here. Photos should be clear,catchy and have mention of the photo source' ?>" id="holder">
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
                <input  name="scheduler_status" type="checkbox" class="input_sheduler_status validate" value="1" hidden>
                <label for="scheduler_status">sheduler status</label>
            </div>
        </div>
        <div class="row hide">
            <div class="input-field col s12 hide ">
                <input  name="savedraft_status" type="checkbox" class="input_savedraft_status validate" value="1" hidden>
                <label for="savedraft_status">Save Draft</label>
            </div>
        </div>
        <div class="row" >
            <div class="col s2">Choose language</div>
            <div  class="col s2" id='translControl'>
                <input type="checkbox" id="checkboxId" onclick="javascript:checkboxClickHandler()"></input>
                <select id="languageDropDown" onchange="javascript:languageChangeHandler()"></select>
            </div>

            <div class="input-field col s12 " >
                <input   id="transl1"  data-position="bottom" data-delay="50" data-tooltip="Add a nice catchy title. Keep it short and capitalize it." type="text" name="head" class="input_head validate tooltipped" required>
                <label  for="head_title">Title</label>
            </div>
            <div id="errorDiv"></div>
            <div class="input-field col m3 s12 hide ">
                <input  name="board" type="text" class="input_board validate" value="<?php echo $boardname ?>" hidden>
                <label for="board">board</label>
            </div>

            <div class="input-field col s12 m3 hide">
                <input type="text" name="category" class="input_category validate" required hidden value="<?php echo $category ?>">
                <label  for="category">Category</label>
            </div>
            <div class="input-field col s12 m3 hide">
                <input type="text" name="subboard" class="input_subboard validate" required hidden value="<?php echo $subboard ?>">
                <label  for="subboard">subboard</label>
            </div>
        </div>
    </div>

    <div class="container">
        <div id="photoStoryList" class="row sortable " ></div>
    </div>

    <div class="container">
        <div class="row ">
            <div class="col m2 s4 offset-s3 offset-m8 tooltipped right-align" data-position="top" data-delay="50" data-tooltip="Choose 'Public' if you want others to see or 'Private' otherwise.">
                <select class="icons "  name="privacy">
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
                <div class=" just_btn waves-effect waves-green tooltipped lighten-2 right" data-position="top" data-delay="50" data-tooltip="Click on drop-down to publish now or schedule later. You can save a draft if you want to edit it late." onclick="submitPhotoStory()" >
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
        <div class="row">
            <div class="col s12 m4 l4" style="text-align:center"><img src="<?= base_url() ?>assert/images/choose.png" width="80" height="80" style="" ><br/><h4>Step 1</h4><hr><b>Upload Photo </b> <p style="position:relative;left:25px;">1. Drag-drop photos in the top box<br>2. Choose minimum of 5 photos<br>3. Have a nice short post title</p></div>
            <div class="col s12 m4 l4" style="text-align:center"><img src="<?= base_url() ?>assert/images/customize.png"  width="80" height="80" ><h4>Step 2</h4><hr><b>Add Description</b> <p style="position:relative;left:15px;">1. Add a suitable caption to every photo<br/>2. Text should be of atleast 100 characters<br/>3. Use Left-Right to move to next photo</p></div>
            <div class="col s12 m4 l4" style="text-align:center"><img src="<?= base_url() ?>assert/images/tweak.png"  width="80" height="80" ><h4>Step 3</h4><hr><b>Publish Options</b><p style="position:relative;left:25px;">1. Choose one of the image as Intro Pic<br>2. Select the right privacy settings<br>3. Publish now or save/schedule for later</p></div>
        </div>
    </div>
    <?php echo form_close() ?><!--form-->

</div>

<!--thumbnail template card -->
<div  id="thumb_temp_holder" style='display: none; visibility: hidden;'>
    <div class="small_holder">
        <div class="row" id='thumb_template'>
            <div class=" photoThumb"  >
                <div class="card padded hoverable ">
                    <div class = "btn-floating waves-effect waves-light red top-left-corner remove_photoItem" >
                        <i class="material-icons">clear</i>
                    </div>
                    <div class="progress progress-custom">
                        <div class="determinate"  style="width: 0%"></div>
                    </div>
                    <div class="card-image square-box tooltipped" data-position="top" data-delay="50" data-tooltip="Click on the photo to add an appropriate text. Keep it short and sweet - no more than two or three sentences.
                         " >
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
<!--photostory_card adder holde template -->
<div id="adderHolderTemplate" style="display:none">
    <div  id="placeholder_extra" class="card padded holder draw-dash-border " style="padding:50%; color:#ccc;" >
        <i class="material-icons">add</i>
    </div>
</div>

<!-- form modal template -->
<div id="formModalTemplate" style='display: none; visibility: hidden;'>
    <div class="modal wider">
        <div class="modal-content row no-margin padded-40">
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
                    <div class="input-field col s12" >
                        <textarea id="desc" name="desc[]" length="10000"  minlength="100"  class="input_desc materialize-textarea validate " required></textarea>
                        <label data-error="very short!"   for="desc">Description</label>
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




<script src="<?= base_url() ?>assert/plugins/FileDrop-master/filedrop-min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assert/plugins/Materialize/dist/js/materialize.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assert/plugins/Materialize/dist/js/tooltip.js" type="text/javascript"></script>
<!-- Submission script -->
<script>
            var add_photo_holder = null;

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
</script>
<!-- on ready -->
<script>
    $(document).ready(function () {
        $('#scheduler').datetimepicker({
            minDate: '0',
            maxDate: '+1970/01/30'
        });
        $('select').material_select();
        $('.modal-trigger').leanModal();
        $('.navigation').hide();
    });
</script>

<script>
    $('.dropdown-button').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrain_width: false, // Does not change width of dropdown to that of the activator
        hover: true, // Activate on hover
        gutter: 0, // Spacing from edge
        belowOrigin: false, // Displays dropdown below the button
        alignment: 'left' // Displays dropdown with edge aligned to the left of button
    });
</script>

<!-- photostory -->
<script>
    var photoStory = {}, i = 0;

    /**
     * function used to create multiple instances
     * of the drag and dop zone
     * @param {type} drop_zone
     * @returns {undefined}
     */
    function create_dropzone(drop_zone) {
        // We can deal with iframe uploads using this URL:
        var options = {multiple: true};
        // 'zone' is an ID but you can also give a DOM node:
        var zone = new FileDrop(drop_zone, options);
        // Do something when a user chooses or drops a file:
        zone.event('send', function (files) {
            // FileList might contain multiple items.

            files.each(function (file) {
                var id = uuid_v4();
                //we have to show the progress for the file here
                file.readDataURI(function (uri) {
                    addPhotoThumbItem(uri, id);
                });

                photoStory[id] = {};
                photoStory[id].id = id;
                photoStory[id].img_cred = '';
                photoStory[id].desc = '';

                if (i === 0) {
                    photoStory[id].intro = 'checked';
                } else {
                    photoStory[id].intro = '';
                }
                i++;

                // Send the file:
                file.sendTo('<?= base_url() ?>upload_pic/photostory');
                file.event('done', function (xhr) {
                    //parse the json
                    var data = JSON.parse(xhr.responseText);
                    //suceess then add file
                    // everything is done only adding image name is left
                    if (data.success) {

                        photoStory[id].img = data.file_name;
                        //Add image thumbnail
                        file.readDataURI(function (uri) {
                            addPhotoFormItem(uri, id);
                        });

                    } else {
                        remove_item(id);
                    }
                    // Here, 'this' points to fd.File instance.
                    //alert(xhr.responseText);
                });
                file.event('error', function (e, xhr) {
                    // alert(xhr.status + ', ' + xhr.statusText);
                });
                file.event('progress', function (current, total) {
                    var width = current / total * 100 + '%';
                    $('#progressbar_' + id).css('width', width);
                });
            });
        });
    }

</script>
<script>
    //rivets
    // We can deal with iframe uploads using this URL:
    var zone_object1 = document.getElementById('holder');
    //calling function
    create_dropzone(zone_object1);
</script>

<!-- functions related to manipulating dom -->
<script>

    /**
     * It should add the part of the story to
     * make it right preview
     * @param {string} id Id to the image
     * @param {string} src image src to be added
     * @returns {undefined}
     * */
    function addPhotoThumbItem(src, id) {
        /*
         * The photoStorylist contains photoStoryItems
         * PhotoStoryItem contains a photoThumb with id = thumb_{id}
         * and form_modal with id = form_{id}
         * photoStoryList is sortable
         */
        var photoStoryList = document.getElementById('photoStoryList');
        var photoStoryItem = document.createElement('div');
        photoStoryItem.id = 'storyItem_' + id;
        photoStoryItem.className = 'col s6 m2';

        //getting template from photoThumb temp
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
        //getting progress and setting
        var progressContainer = photoThumb.getElementsByClassName('progress')[0];
        var progressbar = progressContainer.getElementsByClassName('determinate')[0];
        progressbar.id = 'progressbar_' + id;

        var imagery = photoThumb.getElementsByClassName('imagery')[0];
        imagery.addEventListener('click', function (event) {
            show_form(id);
        });
        imagery.src = src;

        photoStoryItem.appendChild(photoThumb);

        //form modals
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

        var intro_pic = formModal.getElementsByClassName('intro_pic')[0];
        intro_pic.name = id;
        intro_pic.checked = photoStory[id].intro;

        var photoholder_card = document.getElementById('placeholder_extra');
        //photoholder_card = photoholder_card.cloneNode(true);
        if (add_photo_holder) {
            //removing if already present
            alert('remove');
            photoStoryList.removeChild(add_photo_holder);
        }
        //photostory item is added with formModal
        //error was due to this not happening
        photoStoryItem.appendChild(formModal);
        //adding single photoStoryItem
        photoStoryList.appendChild(photoStoryItem);
        //designing holder
        var photoholder_card_container = document.createElement('div');
        photoholder_card_container.className = 'col s6 m2';

        photoholder_card = photoholder_card_container.appendChild(photoholder_card)

        //adding photo holder into the list
        add_photo_holder = photoStoryList.appendChild(photoholder_card_container);

        //creating new dropzone
        console.log(photoholder_card);
        create_dropzone(photoholder_card);


        //tootltip
        $('.tooltipped').tooltip({delay: 50}); //tooltipped reinitialized

        $('#form_' + id + ' textarea.input_desc').characterCounter();

        $(".intro_pic").change(function () {
            $(".intro_pic").prop('checked', false);
            $(this).prop('checked', true);
        });
        var currentIndex = null;
        $('.sortable').sortable({
            'cursor': 'drag'
        });
    }
    function addPhotoFormItem(src, id) {

        var formModal = document.getElementById('form_' + id);

        var pic_name = formModal.getElementsByClassName('input_pic')[0];
        pic_name.value = photoStory[id].img;

        var pic_id = formModal.getElementsByClassName('input_pic_id')[0];
        pic_id.value = id;


        var photoFullView = formModal.getElementsByClassName('photoFullView')[0];
        photoFullView.src = src;
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
     *  @returns {undefined} */
    function next_form() {
        if (x)
            clearTimeout(x);
        x = setTimeout(function () {

            var modalList = $('#photoStoryList .modal');
            // do the work here
            //disable button to reduce problem with clicking next fast
            if (modalList.length > 1) {
                modalList.each(function (index, el) {
                    var self = $(this);
                    if (self.css('display') !== 'none') {
                        //selecting next based on current index
                        if (index + 1 >= modalList.length) {
                            var next = modalList.eq(0);
                        } else {
                            var next = modalList.eq(index + 1);
                        }

                        self.closeModal();
                        next.openModal({
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
            var modalList = $('#photoStoryList .modal');
            // do the work here
            //disable button to reduce problem with clicking next fast
            if (modalList.length > 1) {
                modalList.each(function (index, el) {
                    var self = $(this);
                    if (self.css('display') !== 'none') {
                        //selecting next based on current index
                        var prev = modalList.eq(index - 1);
                        self.closeModal();
                        prev.openModal({
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
                });
            }
        }, 200);
    }


    /**
     * remove any given thumb + form

     * @param {type} id
     * @returns {undefined}             */
    function remove_item(id) {
        var photoStoryItem = $('#storyItem_' + id);
        photoStoryItem.remove();
        delete photoStory[id];
    }

    /**
     * creates unique id
     * @returns {String}             */
    function uuid_v4() {
        var d = new Date().getTime();
        var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
            var r = (d + Math.random() * 16) % 16 | 0;
            d = Math.floor(d / 16);
            return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
        });
        return uuid;
    }
</script>
<script type="text/javascript">

    // Load the Google Transliterate API
    google.load("elements", "1", {
        packages: "transliteration"
    });

    var transliterationControl;
    function onLoad() {
        var options = {
            sourceLanguage: 'en',
            destinationLanguage: ['hi', 'kn', 'ml', 'ta', 'te'],
            transliterationEnabled: true,
            shortcutKey: 'ctrl+g'
        };
        // Create an instance on TransliterationControl with the required
        // options.
        transliterationControl =
                new google.elements.transliteration.TransliterationControl(options);

        // Enable transliteration in the textfields with the given ids.
        var ids = ["transl1"];
        transliterationControl.makeTransliteratable(ids);

        // Add the STATE_CHANGED event handler to correcly maintain the state
        // of the checkbox.
        transliterationControl.addEventListener(
                google.elements.transliteration.TransliterationControl.EventType.STATE_CHANGED,
                transliterateStateChangeHandler);

        // Add the SERVER_UNREACHABLE event handler to display an error message
        // if unable to reach the server.
        transliterationControl.addEventListener(
                google.elements.transliteration.TransliterationControl.EventType.SERVER_UNREACHABLE,
                serverUnreachableHandler);

        // Add the SERVER_REACHABLE event handler to remove the error message
        // once the server becomes reachable.
        transliterationControl.addEventListener(
                google.elements.transliteration.TransliterationControl.EventType.SERVER_REACHABLE,
                serverReachableHandler);

        // Set the checkbox to the correct state.
        document.getElementById('checkboxId').checked =
                transliterationControl.isTransliterationEnabled();

        // Populate the language dropdown
        var destinationLanguage =
                transliterationControl.getLanguagePair().destinationLanguage;
        var languageSelect = document.getElementById('languageDropDown');
        var supportedDestinationLanguages =
                google.elements.transliteration.getDestinationLanguages(
                        google.elements.transliteration.LanguageCode.ENGLISH);
        for (var lang in supportedDestinationLanguages) {
            var opt = document.createElement('option');
            opt.text = lang;
            opt.value = supportedDestinationLanguages[lang];
            if (destinationLanguage == opt.value) {
                opt.selected = true;
            }
            try {
                languageSelect.add(opt, null);
            } catch (ex) {
                languageSelect.add(opt);
            }
        }
    }

    // Handler for STATE_CHANGED event which makes sure checkbox status
    // reflects the transliteration enabled or disabled status.
    function transliterateStateChangeHandler(e) {
        document.getElementById('checkboxId').checked = e.transliterationEnabled;
    }

    // Handler for checkbox's click event.  Calls toggleTransliteration to toggle
    // the transliteration state.
    function checkboxClickHandler() {
        transliterationControl.toggleTransliteration();
    }

    // Handler for dropdown option change event.  Calls setLanguagePair to
    // set the new language.
    function languageChangeHandler() {
        var dropdown = document.getElementById('languageDropDown');
        transliterationControl.setLanguagePair(
                google.elements.transliteration.LanguageCode.ENGLISH,
                dropdown.options[dropdown.selectedIndex].value);
    }

    // SERVER_UNREACHABLE event handler which displays the error message.
    function serverUnreachableHandler(e) {
        document.getElementById("errorDiv").innerHTML =
                "Transliteration Server unreachable";
    }

    // SERVER_UNREACHABLE event handler which clears the error message.
    function serverReachableHandler(e) {
        document.getElementById("errorDiv").innerHTML = "";
    }
    google.setOnLoadCallback(onLoad);

</script>
</body>
</html>
