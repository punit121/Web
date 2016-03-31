  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Confirm delete</h4>
          </div>
					<div class="modal-body">
						Do you really want to delete?
						<input type="hidden" name="service_id" id="service_id"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="ok_delete" class="btn btn-primary">Ok</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 

<script>
		var baseurl='<?=base_url();?>';
	</script>
   <!-- Init plugins only for page -->
		
		<!-- Charts plugins -->

	<!--<script src="admin_assets/js/pages/dashboard.js"></script>-->
<?php $this->load->view('admin_layout/sidebar.php')?>
	<!--<script src="assets/js/pages/form-validation.js"></script><!-- Init plugins only for page -->
	<!-- Important plugins put in all pages -->
  
	<?php $result=$this->admin_model->viewAppointment();
		//	print_r($result);?>

<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="#"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li><a href="#">Appointments</a></li>
                      <li class="active">Edit Appointments</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1></h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="panel panel-default">								
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-table"></i></div> 
                                    <h4>Data tables</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            <div class="panel-body">
                            		 <div class="row">
                         <div class="col-lg-12">
                        
						
						<div class="form-group">
                                         <label class="col-lg-2 control-label" for="placeholder">Select Date</label>
                                            <div class="col-lg-10">
                                           <input type="date" name="appointment" id="appointment">
                                            </div>
                                        </div>
						
						
						
						
		
						
						
						   <div id="div1">
						   </div>
						
						
                        </div><!-- End .col-lg-8  -->  
						</div><!-- End .row-fluid  -->
					 </div><!-- End .widget -->
                        </div><!-- End .col-lg-6  -->                      
						</div>

                    </div><!-- End .row-fluid  -->
                </div>
            </div> <!-- End .wrapper  -->
    </section>    
	<script>
		$(document).ready(function(){
				$("#appointment" ).change(function(){
					$date=$("#appointment" ).val();
					$.ajax({
						url: "admin/getAppointment",
						type: "POST",
						data: "date="+$date,
						success: function(res){
				
				$("#tbodyid").remove();
		    var $table = $('<table style="width:100%;" id="tbodyid">');
			$table.append('<thead>').children('thead')
				.append('<tr />').children('tr').append('<th style="">Customer Name</th><th style="padding-left:10%;">Employe Name</th><th style="padding-left:10%;">Service</th><th style="padding-left:10%;">Appoint Date</th><th style="padding-left:10%;">Appoint Time</th><th style="padding-left:5%;">Action</th>');
					$table.appendTo( '#div1' );
					
					var $tbody = $table.append('<tbody />').children('tbody');
					var data1=eval(res);
					$.each(data1,function(index,value){
					$tbody.append('<tr />').children('tr:last')
					.append("<td>"+value['cName']+"</td>")
							.append("<td style='padding-left:10%;'>"+value['eName']+"</td>")
							.append("<td style='padding-left:10%;'>"+value['service']+"</td>")
							.append("<td style='padding-left:10%;'>"+value['appointDate']+"</td>")
							.append("<td style='padding-left:10%;'>"+value['appointTime']+"</td>")
							.append("<td style='padding-left:5%;'><a href='admin/edit_service?id='><i aria-hidden='true' title='Edit' class='i-marker-2' style='cursor:pointer;'></i></a><a  class='del_service' id='"+value['id']+"'><i aria-hidden='true' class='i-remove-4' title='Delete' style='cursor:pointer;'></i></a></td>");
						});
						
						//$('body').html(res);return;
						}
					 });
					  // $('.del_service').bind('click',function(){
						 // alert("hello");
							// var del = $(this).closest('tr').attr('id');
							// $('#service_id').val(del);
							 //$('#myModal').modal('show');
					 //});
				 });
				$(document).on('click', '.del_service', function(){
					var del = $(this).attr('id');
					$('#service_id').val(del);
					 $('#myModal').modal('show');
				});
				
				$('#ok_delete').click(function(){
				 var id = $('#service_id').val();
				 $.ajax({
					 url: "admin/del_Appointment",
					type: "POST",
					data: "appoint_id="+id,
					success: function(res){
						
						if(res){
							$('#myModal').modal('hide');
							$('#'+id).remove();
							setTimeout(function() {
								$.jGrowl("<i class='icon16 i-checkmark-3'></i> Deleted successfully", {
									group: 'success',
									position: 'center',
									sticky: false,
									closeTemplate: '<i class="icon16 i-close-2"></i>',
									animateOpen: {
											width: 'show',
											height: 'show'
									}
								});
							}, 250);
							location.reload();
						}
					}
				});
			});
				
		});
	</script>