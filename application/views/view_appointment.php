<!-- Init plugins only for page -->
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<!--<script src="assets/js/pages/form-elements.js"></script>-->
	<!--<script src="assets/js/plugins/forms/validation/jquery.validate.js"></script>-->

	<!--<script src="assets/js/pages/form-validation.js"></script><!-- Init plugins only for page -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<section id="content">
  
  <div class="row">
	<div class="large-5 medium-12 small-12 columns large-offset-4">
	<div id="adcvt" class="reveal-modal" data-reveal style="z-index:999999999;" >
	<div class="row">
				<div class="large-12 columns">
				<center><strong>Do you really want to Cancel this Appointment?</strong></center>
				<input type="hidden" name="adcvt_id" id="adcvt_id"/>
				</div>				
				</div>	<p>
				<div class="row">		
				<center><button type="button" id="ok_adctv" class="btn btn-primary" style="width:50%">Cancel Appointment</button></center>
				</div>
				<a class="close-reveal-modal radius-close close"><div class="text-center">&#215;</div></a>
				</div>
				</div>
			</div>
  
  
  
  

            <div class="wrapper">
              
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1></h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="panel panel-default">								
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-table"></i></div> 
                                    <h4>View Appointment</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable" style="width:100%">
                                        <thead>
                                            <tr>
                                                
                                                <th>Service</th>
                                                <th>Date</th>
                                                <th>Apply Date</th>
                                                <th>Time</th>
                                                <th>Emplyoee</th>
                                                <th>Merchant</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php $result=$this->usermodel->getAppointment();
											if($result)
											{
											foreach($result as $apointment)
											{
											
											?>
											<tr id="<?= $apointment['id']?>">
                                               
                                                <td><?php echo $result=$this->usermodel->findServiceByCustomer($apointment['serviceId']);
												?></td>
                                                <td><?=$apointment['appointDate']?></td>
                                                <td><?=$apointment['applyDate']?></td>
                                                <td><?=$apointment['appointTime']?></td>
                                                <td><?php echo $result=$this->usermodel->findEmployeById($apointment['empId']);?></td>
												<td><?php echo $result=$this->usermodel->findNameById($apointment['merchantId']);?></td>
                                          <td>
					<?php
							if($apointment['status']=='1')
							{
							?>
							<a><i aria-hidden="true" class="adctv_service"  style="cursor:pointer;">Cancel</i></a>
<?php
}
else
{
?>
	<a><i aria-hidden="true" class="adctv_service"  style="cursor:pointer;">Activate</i></a>
					<?php
					}?>
																									
																								</td> 
                                            </tr>
                                        <?php }
									}else {
									echo "<tr><td colspan='6' align='center'>No record(s) found</td></tr>";
									}		
									?> </tbody>
                                    </table>
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-6  -->                      
						</div>

                    </div><!-- End .row-fluid  -->
                </div>
            </div> <!-- End .wrapper  -->
    </section>    
	<script>
		$(document).ready(function(){
			$('.adctv_service').click(function(){
				var del = $(this).closest('tr').attr('id');
				$('#adcvt_id').val(del);
				$('#adcvt').foundation('reveal','open');
			});
			 $('#ok_adctv').click(function(){
			// alert($('#adcvt_id').val());
				var id = $('#adcvt_id').val();
				$.ajax({
					url: "users/cancel_Appointment",
					type: "POST",
					data: "id="+id,
					success: function(res){
									//$('body').html(res);return;
						if(res){
						location.reload();
						}
					}
				});
			 });
		$('.close').click(function(){
		$('#adcvt').foundation('reveal','close');
		});
		
});
	</script>