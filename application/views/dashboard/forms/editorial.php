<?php
/*
 * Editorial is main part of Zersey
 * Editorial is like a news channel
 * It accepts a heading , an image and very big paragraphs
 */
?>
<link href="<?php echo base_url(); ?>assert/plugins/FileDrop-master/filedrop.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assert/lib/css/wysiwyg-color.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assert/plugins/textAngular-master/dist/textAngular.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assert/plugins/bootstrap-switch-master/dist/css/bootstrap2/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assert/plugins/bootstrap-switch-master/dist/js/bootstrap-switch.min.js" type="text/javascript"></script>
<?php
/*
 * I am thinking of introducing two parts
 * left side for previde of how it appears on the dashboard
 * right side is were the form appears
 */
?>
<?php /* -------------------Left side-------------------------- */ ?>
<!-- Navbar goes here -->
<!-- Page Layout here -->
<div class="whole_wrapper" ng-app="editor" ng-controller="text_editor">

    <div class="row preview_switcher_holder" >
        <div class="col-md-12">
            <div class="form-group form-group-lg">
                <input class="form-control preview_switcher" type="checkbox"  data-on-text="Draft" data-off-text="Preview"  >
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 20px;" >

        <div class="row">
            <div class="col-md-12" id="pic_viewer">
                <div class="editorial-pic-holder " id="holder">
                    <p  id="upload" class="flow-text grey-text lighten-2 center-align">Drag & Drop </p>
                </div>
                <p class="bg-danger" ng-show="error.img" ng-bind="error.img"></p>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-12">
                <div class="form-group form-group-lg">
                    <input class="form-control" type="text" id="head" ng-model="data.heading" placeholder="Heading....">
                    <p class="bg-danger" ng-show="error.heading" ng-bind="error.heading"></p>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-12">
                <div class="form-group form-group-lg">
                    <input class="form-control" type="text" id="img_creds" ng-model="data.img_creds" placeholder="Image Credits....">
                    <p class="bg-danger" ng-show="error.img_creds" ng-bind="error.img_creds"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"> <!--Note that "m8 l9" was added -->
                <!--Teal page content -->
                <text-angular ng-model="data.content" ta-toolbar='[["bold"
                              ,"italics"
                              ,"underline"
                              ,"strikeThrough"
                              ,"ul"
                              ,"ol"
                              ,"undo"
                              ,"redo"
                              ,"clear"
                              ,"justifyLeft"
                              ,"justifyCenter"
                              ,"justifyRight"
                              ,"justifyFull"
                              ,"indent"
                              ,"outdent"
                              ,"wordcount"
                              ,"charcount"]]'></text-angular>
                <p class="bg-danger" ng-show="error.content" ng-bind="error.content"></p>
            </div>
        </div>
        <!--button for submission should come here -->
        <div style="margin-top: 10px;">

            <div style="text-align:center">
                <span style="color:#F00" id="error"></span>
                <div style="text-align:right" id="submitdiv">
                    <select class="btn btn-default" name="upsstatus" id="upsstatus" ng-model="data.privacy" style="font-family:'FontAwesome', Arial;border: solid 1px #ccc;">
                        <option value="1">&#xf0ac; Public</option>
                        <option value="2">&#xf0c0; Friends</option>

                    </select>
                    <div class="btn-group">
                        <input type="button" name="publish" id="publish" value="Publish" ng-click="submit()" class="btn btn-danger">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" style="height:33px" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu action_div">
                            <li data-toggle="modal" data-target="#scheduleinst"> <button type="submit" name="scheduleltr" style="background: none;color: #fff;border: none;" id="publish">Scheduler</button></li>
                            <li role="separator" class="divider"></li>
                            <li> <button type="submit" name="savedraft" style="background: none;color: #fff;border: none;" ng-click="saveDraft()" id="publish">Save as Draft</button></li>

                        </ul>
                        <div class="modal fade" id="scheduleinst" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="color: #000;
                                            font-weight: bold;text-align:left;">shedule later</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div id="datetimepicker1" class="input-append date">
                                            <label style="float: left;">Date and time</label>
                                            <input type="text" value="" id="datetimepicker_mask1" ng-model="data.scheduleDate" name="scheduletime" class="form-control"><br><br>
                                            <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" value="Cancel" class="btn" data-dismiss="modal">
                                        <button name="scedule" id="scedule" type="submit" value="Save" class="btn" ng-click="submit()" style="background:#993737;color:#fff;">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div style="text-align:right;display:none" id="loding" >
                <img src="http://zersey.com/assert/images/uploading.gif" width="150px"/>
                </div>-->
            </div>
        </div>
    </div>


    <div class="preview-editorial ">
        <!-- here i will give preview -->

        <!-- see this is where preview should come -->
        <!--several parts for preview -->
        <!-- 1. Image --->
        <!-- 2. IMage Credits -->
        <!-- 3. Time -->
        <!-- 4 published by -->
        <!-- 5 report & bookmark -->
        <!-- 6 heading -->
        <!-- 7 content-->

        <div class="component-content">
            <div class="responsive-articlepage">
                <div class="article-container">
                    <div class="main-article">
                        <div class="main-article-image-container">
                            <!-- to contain -->
                            <div class="rectangle-5-2">
                                <!-- creating rectangle 3:2 -->
                                <div class="rectangle-content">
                                    <div class="img_holder">
                                        <img ng-show="data.img_show" ng-src="{{data.img_show}}" alt="{{data.img_creds}}" >
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- image credits-->
                        <div class="article-image-photographer-container-margin article-image-photographer-container-space">
                            <div class="article-image-photographer">
                                {{data.img_creds}}
                            </div>
                        </div>
                        <!-- img credits end -->
                        <div class="article-popular">
                        </div>
                        <div class="article-intro-container">
                            <div class="article-intro-text-container">
                                <div class="article-title">
                                    {{data.heading}}
                                </div>
                                <div class="author-name">
                                    <div class="author-name-image"></div>
                                    <div class="author-name-text">
                                        <div class="author-name-name floatstyle">
                                            <span>
                                                <!-- write author's name -->
                                                <?php echo $user['fullname']; ?>
                                            </span>
                                        </div>
                                        <div class="author-name-date floatstyle">
                                            <span ng-bind="data.date">
                                                <!--keep date here -->
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- content part-->
                        <div  class="article-mainbody-container">
                            <div class="article-mainbody-centre">
                                <div class="article-fulltext" ng-bind-html="data.content">

                                </div>
                            </div>
                        </div> <!-- end of content part -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--thumbnail template card -->
<div  id="preview_temp_holder" style='display: none; visibility: hidden;'>
    <div class="small_holder">
        <div class="row" id='thumb_template'>
            <div class="photoPreview"  >
                <div class="padded hoverable ">
                    <div class = "float-right remove_photoItem" >
                        <i class="fa fa-remove fa-2x"></i>
                    </div>
                    <div class="progress progress-custom">
                        <div class="determinate"  style="width: 0%"></div>
                    </div>
                    <div class="rectangle-5-2">
                        <div class="  vertical-align text-center rectangle-content">
                            <figure class="img_holder">
                                <img src="" class="imagery" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assert/plugins/FileDrop-master/filedrop-min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assert/plugins/AngularJs/angular.min.js.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assert/plugins/textAngular-master/dist/textAngular-sanitize.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assert/plugins/textAngular-master/dist/textAngular-rangy.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assert/plugins/textAngular-master/dist/textAngular.min.js" type="text/javascript"></script>

<script>
                                    $(document).ready(function () {
                                        $('#datetimepicker_mask1').datetimepicker({
                                            minDate: '0',
                                            maxDate: '+1970/01/30'
                                        });
                                    });
                                    var app = angular.module('editor', ['textAngular']);
                                    app.controller('text_editor', ['$scope', '$http', function ($scope, $http) {
                                            //initialize scope variables
                                            var monthNames = [
                                                "Jan", "Feb", "Mar",
                                                "Apr", "May", "Jun", "Jul",
                                                "Aug", "Sep", "Oct",
                                                "Nov", "Dec"
                                            ];
                                            var date = new Date();
                                            var day = date.getDate();
                                            var monthIndex = date.getMonth();
                                            var year = date.getFullYear();
                                            //console.log(day, monthNames[monthIndex], year);
                                            var datenow = day + ' ' + monthNames[monthIndex] + ' ' + year;
                                            $scope.data = {
                                                content: '',
                                                heading: '',
                                                img: '',
                                                img_show: '',
                                                img_creds: '',
                                                date: datenow,
                                                privacy: '1'
                                            };
                                            $scope.error = {};
                                            /**
                                             * submit function
                                             * @returns {undefined}
                                             */
                                            $scope.submit = function () {

                                                var error = $scope.validate();
                                                var editorialData = {
                                                    'content': $scope.data.content,
                                                    'head': $scope.data.heading,
                                                    'image': $scope.data.img,
                                                    'img_creds': $scope.data.img_creds,
                                                    'privacy': $scope.data.privacy,
                                                    'category': '<?php echo $category ?>',
                                                    'subboard': '<?php echo $subboard ?>',
                                                    'board': '<?php echo $board ?>'
                                                }
                                                if ($scope.data.scheduleDate) {
                                                    editorialData.scheduled = true;
                                                    editorialData.scheduleDate = $scope.data.scheduleDate;
                                                } else if ($scope.data.draft) {
                                                    editorialData.draft = true;
                                                    $scope.data.draft = false;
                                                }
                                                if (!error) {
                                                    //submit
                                                    var url = '<?php echo base_url(); ?>editorialsubmit'
                                                    var request = $http({
                                                        method: 'POST',
                                                        url: url,
                                                        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                                                        transformRequest: this._transformRequest,
                                                        data: $.param(editorialData)
                                                    });
                                                    request.then(
                                                            function (response) {
                                                                var data = response.data;
                                                                // not relevant
                                                                if (data === 'success') {
                                                                    window.location.href = '<?php echo base_url(); ?>';
                                                                } else {
                                                                    alert(data);
                                                                }
                                                            }, function (error) {
                                                        var data = error.data;
                                                        // not relevant
                                                        alert('error while submitting Try again');
                                                    });
                                                    console.log($scope.data);
                                                }
                                            };
                                            /**
                                             *
                                             * validate and show validation errors
                                             */
                                            $scope.validate = function () {
                                                setTimeout(function () {
                                                    $scope.error.content = '';
                                                    $scope.error.heading = '';
                                                    $scope.error.img_creds = '';
                                                    $scope.error.img = '';
                                                    $scope.$apply();
                                                    // console.log($scope.error)
                                                }, 6000);
                                                if (!$scope.data.content) {
                                                    $scope.error.content = 'Content is required';
                                                    return 1;
                                                }
                                                console.log($.parseHTML($scope.data.content));
                                                var textLen = $($.parseHTML($scope.data.content)).text().length;
                                                if (textLen < 1000) {
                                                    $scope.error.content = 'Content length is less than 1000 characters!!';
                                                    return 1;
                                                }
                                                if ($scope.data.heading.length < 10) {
                                                    $scope.error.heading = 'Heading should be atleast 10 characters long';
                                                    return 1;
                                                }
                                                if (!$scope.data.img_creds) {
                                                    $scope.error.img_creds = 'Image Credits not provided';
                                                    return 1;
                                                }
                                                if (!$scope.data.img) {
                                                    $scope.error.img = 'No proper image selected, please select an image first';
                                                }


                                            }

                                            $scope.saveDraft = function () {
                                                $scope.data.draft = true;
                                                $scope.submit();
                                            }

                                            $(".preview_switcher").bootstrapSwitch();
                                            $(".preview_switcher").on('switchChange.bootstrapSwitch', function show_preview(event, stat, e) {

                                                console.log('stat of switch', stat);
                                                $('.preview-editorial').toggleClass('active');
                                            });
                                            var editorial = {};
                                            var zone = new FileDrop('holder', {});
                                            // Do something when a user chooses or drops a file:
                                            zone.event('send', function (files) {
                                                // FileList might contain multiple items.

                                                files.each(function (file) {
                                                    var id = uuid_v4();
                                                    //we have to show the progress for the file here
                                                    file.readDataURI(function (uri) {
                                                        $scope.data.img_show = uri;
                                                        $scope.$apply();
                                                        addPhotoPreview(uri, id);
                                                    });
                                                    // Send the file:
                                                    //same as photostory
                                                    file.sendTo('<?= base_url() ?>upload_pic/editorial');
                                                    file.event('done', function (xhr) {
                                                        //parse the json
                                                        var data = JSON.parse(xhr.responseText);
                                                        //suceess then add file
                                                        // everything is done only adding image name is left
                                                        if (data.success) {
                                                            $scope.data.img = data.file_name;
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
                                            /**
                                             * setting preview for the image
                                             * @param {type} uri
                                             * @returns {undefined} */
                                            function addPhotoPreview(src, id) {
                                                var preview_holder = document.getElementById('pic_viewer');
                                                var editorialPic = document.createElement('div');
                                                editorialPic.id = 'photoPreview_' + id;
                                                editorialPic.className = 'col-md-12';
                                                preview_holder.appendChild(editorialPic);
                                                //getting preiview clone
                                                var photoPreviews = document.getElementById('preview_temp_holder');
                                                photoPreviews = photoPreviews.cloneNode(true);
                                                var photoPreview = photoPreviews.getElementsByClassName('photoPreview')[0];
                                                //set id
                                                photoPreview.id = 'preview_' + id;
                                                //ading button for removal
                                                var remove_btn = photoPreview.getElementsByClassName('remove_photoItem')[0];
                                                remove_btn.addEventListener('click', function (event) {
                                                    remove_item(id);
                                                });
                                                var progressContainer = photoPreview.getElementsByClassName('progress')[0];
                                                var progressbar = progressContainer.getElementsByClassName('determinate')[0];
                                                progressbar.id = 'progressbar_' + id;
                                                var imagery = photoPreview.getElementsByClassName('imagery')[0];
                                                imagery.src = src;
                                                editorialPic.appendChild(photoPreview);
                                                $('#holder').hide();
                                            }


                                            /**
                                             * remove any given thumb + form

                                             * @param {type} id
                                             * @returns {undefined}             */
                                            function remove_item(id) {
                                                var photoPreview = $('#photoPreview_' + id);
                                                photoPreview.remove();
                                                //remove preview as well
                                                $scope.data.show_img = '';
                                                $scope.data.img = '';
                                                $scope.$apply();
                                                //show the holder back
                                                $('#holder').show();
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


                                        }]);
</script>
</body>
</html>
