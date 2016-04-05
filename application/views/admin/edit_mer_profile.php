<script src="<?=base_url();?>assets/js/pages/admin_merchant.js"></script>
<?php $this->load->view('admin_layout/sidebar.php')?>
<section id="content">
  <div class="wrapper">
    <div class="crumb">
      <ul class="breadcrumb">
        <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
        <li><a href="#">Profile</a></li>
        <li class="active">Edit Profile</li>
      </ul>
    </div>    
    <div class="container-fluid">
      <div id="heading" class="page-header">
          <h1><i class="icon20 i-user"></i> Edit Profile </h1>
      </div>
      <div class="row">
        <div class="col-lg-10">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="icon"><i class="icon20 i-user"></i></div> 
              <h4>Profile</h4>
              <a href="#" class="minimize"></a>
            </div><!-- End .panel-heading -->   
						<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>
            <div class="panel-body">
              <form class="form-horizontal" role="form" id="userprofile" method="post" action="<?= base_url(); ?>admin/edit_mer_profile" enctype="multipart/form-data">
								<input type="hidden" name="merchantId" value="<?= $merchant['merchantId']?>"/>
                <div class="form-group">
                  <label class="col-lg-2 control-label" for="fullname">Full Name</label>
                  <div class="col-lg-10">
                    <input class="form-control" type="text" name="name" value="<?= $merchant['name'];?>" placeholder="Full Name">
										<label for="name" class="error"></label>
                  </div>
                </div><!-- End .control-group  -->
				<?php
							if($this->session->userdata('user_level')!='1') {?>
			 <div class="form-group">
                  <label class="col-lg-2 control-label" for="salonname">Salon Name</label>
                  <div class="col-lg-10">
                    <input class="form-control" type="text" name="salonname" value="<?= $merchant['salonName'];?>" placeholder="Salon Name">
										<label for="name" class="error"></label>
                  </div>
             </div>
			 <?php } ?>
                <div class="form-group">
                  <label class="col-lg-2 control-label" for="email">Email</label>
                  <div class="col-lg-10">
                    <input class="form-control" type="text" name="email" value="<?= $merchant['email'];?>" readonly>
                  </div>
                </div>
               
				 <div class="form-group">
				   <label class="col-lg-2 control-label" for="state">City</label>
				  <div class="col-lg-5">
							<select name="state" id="state">
							<?php
								$city=$this->admin_model->getCity();
								foreach($city as $c)
								{
							?>
								<option value="<?php echo $c['id']; ?>" <?php if($merchant['city']==$c['id'])echo 'selected'; ?>><?php echo $c['cityName']; ?></option>
							<?php
								}
							?>
							</select>
                    <!--<input class="form-control notTakeComa" type="text" name="state" id="state" value="<?php //echo $this->admin_model->findCityById($merchant['city']); ?>" placeholder="City">-->
				  </div>
					<label class="col-lg-1 control-label" for="location">Area</label>
                  <div class="col-lg-4" id="selarea">
                    <!--<select name="location" id="location">-->
										<?php
											//$area=$this->admin_model->getArea();
											//foreach($area as $a)
											//{
										?>
											<!--<option value="<?php //echo $a['id']; ?>" <?php //if($merchant['area']==$a['id'])echo 'selected'; ?>><?php //echo $a['name']; ?></option>-->
										<?php
											//}
										?>
										<!--</select>-->
                  </div>
          </div>
					<script>
						$(document).ready(function(){
							var cit=$('#state').val();
							$.ajax({
								url:'<?=base_url()?>admin/getAreaById',
								type:'post',
								data:'city='+cit+'&area=<?php echo $merchant['area']; ?>',
								success:function(data){
									console.log(data);
									$('#selarea').html('');
									$('#selarea').html(data);
									//$('#location').val('<?php // echo $merchant['area']; ?>');
								}
							});

							$('#state').change(function(){
								var cit=$('#state').val();
								
								$.ajax({
								url:'<?=base_url()?>admin/getAreaById',
								type:'post',
								data:'city='+cit,
								success:function(data){
									$('#selarea').html('');
									$('#selarea').html(data);
									
								}
							});
							});
						});
					</script>
				<div class="form-group">
                  <label class="col-lg-2 control-label" for="location">About us</label>
                  <div class="col-lg-10">
                    <textarea id="aboutus" name="aboutus" style="width:100%" placeholder="about us"><?= $merchant['description'];?></textarea>
                  </div>
                </div>
				
				<div class="form-group">
                  <label class="col-lg-2 control-label" for="location">Speciality</label>
                  <div class="col-lg-10">
					<div class="input_fields_wrap">
						<input type="text" id="speciality" class="form-control notTakeComa" name="mytext[]" maxlength="20" placeholder="Speciality" style="width:70%;float:left;"/> <a href="#" id="addfield" class="add_field_button" style="float:left;margin:1%;">Add More Fields</a>
					</div>
                  </div>
			
					 
				
                </div>
				
				
				
				
				 <div class="form-group">
                  <label class="col-lg-2 control-label" for="location">My Website</label>
                  <div class="col-lg-10">
                    <input class="form-control autosuggest" type="text" name="website" value="<?= $merchant['website'];?>" placeholder="My Website">
                  </div>
                </div>
				 <div class="form-group">
                  <label class="col-lg-2 control-label" for="location">Blog</label>
                  <div class="col-lg-10">
                    <input class="form-control autosuggest" type="text" name="blog" value="<?= $merchant['blog'];?>" placeholder="My Blog">
                  </div>
                </div>
				 <div class="form-group">
                  <label class="col-lg-2 control-label" for="location">Twiter</label>
                  <div class="col-lg-10">
                    <input class="form-control autosuggest" type="text" name="twiter" value="<?= $merchant['twiter'];?>" placeholder="Twitter">
                  </div>
                </div>
				 <div class="form-group">
                  <label class="col-lg-2 control-label" for="location">Google+</label>
                  <div class="col-lg-10">
                    <input class="form-control autosuggest" type="text" name="gplus" value="<?= $merchant['gplus'];?>" placeholder="Google+">
                  </div>
                </div>
				 <div class="form-group">
                  <label class="col-lg-2 control-label" for="location">Linkedin</label>
                  <div class="col-lg-10">
                    <input class="form-control autosuggest" type="text" name="linkedin" value="<?= $merchant['linkedin'];?>" placeholder="Linkedin">
                  </div>
                </div>
				<!-- End .control-group  -->
						<!--		<div class="form-group">
                  <label class="col-lg-2 control-label" for="email">Password:</label>
                  <div class="col-lg-10">
                    <input class="form-control" type="password" name="password" value="" >
                  </div>
                </div><!-- End .control-group  -->			
								<div class="form-group">
								<?php if($merchant['photo']){
									$src = base_url()."assets/images/merchant/".$merchant['photo'];
								}else{
									$src = base_url()."assets/images/merchant/nophoto.jpg";
								}?>
                  <label class="col-lg-2 control-label" for="photo">Photo</label>
                  <div class="col-lg-10">
                      <!--<input class="form-control" type="file" name="photo" value="">-->
										<div class="col-lg-2" style="padding:0px;">
											<img src="<?= $src;?>" style="height:134px;width:115px;">
										</div>
										<input class="form-control" type="file" name="profile_image" value="" id="profileimage" style="width:85%;margin-left:15%;">
										<div id="picture"></div>
                  </div>
                </div><!-- End .control-group  -->
            <!--    <div class="form-group">
                  <label class="col-lg-2 control-label" for="location">Location</label>
                  <div class="col-lg-10">
                    <input class="form-control" type="text" name="location" value="<?= $merchant['location']?>">
                  </div>
                </div><!-- End .control-group  -->
					<!--			<div class="form-group">
                  <label class="col-lg-2 control-label" for="description">Description</label>
                  <div class="col-lg-10">
                    <input class="form-control" type="text" name="description" value="<?= $merchant['description']?>">
                  </div>
                </div><!-- End .control-group  -->
                <div class="form-group">
                  <div class="col-lg-offset-2">
                    <div class="pad-left15">
                      <button type="submit" class="btn btn-primary">Save changes</button>                        
                    </div>                                                
                  </div>      
                </div>
              </form>
							
            </div><!-- End .panel-body -->
          </div><!-- End .widget -->            
        </div><!-- End .col-lg-12  --> 
      </div><!-- End .row-fluid  -->
    </div> <!-- End .container-fluid  -->
  </div> <!-- End .wrapper  -->
</section>
    </div><!-- End .main  -->
	    
  </body>
	<script>
		$(document).ready(function(){
			$.post('<?=base_url()?>admin/AutoCompleteMerchantLocation',function(data){
					console.log(data);
					var availableTags = data.split(",");
					$('#location').autocomplete({
					source: availableTags
					});
				});
				
			$.post('<?=base_url()?>admin/getAllstate',function(data){
				console.log(data);
				var availableTags = data.split(",");
				$('#state').autocomplete({
				source: availableTags
				});
			});
			$('.notTakeComa').keydown(function (evt) {
				 var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode == 188)
            return false;

        return true;
						 
				});
				
				 var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" style="width:70%;float:left;margin-top:1%;" class="form-control notTakeComa" name="mytext[]" maxlength="20"/><a href="#" class="remove_field" style="float:left;margin:1%;">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
	$('#addfield').click(function(){
		return false;
	});
	});
	</script>
</html>