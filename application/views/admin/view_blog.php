<!-- Tables plugins -->
  <script src="assets_assets/js/plugins/tables/datatables/jquery.dataTables.min.js"></script>
	<script src="assets_assets/js/pages/data-tables.js"></script><!-- Init plugins only for page -->
	<?php $this->load->view('admin_layout/sidebar.php')?>
<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li><a href="#">Post Blog</a></li>
                      <li class="active">View Blog</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1><i class="icon20 i-table-2"></i> Data Tables</h1>
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
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Category</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
																				<?php 
			if(!empty($blog)){
																				foreach($blog as $value){ ?>
                                            <?php if($value['photo']){
																							$src = base_url().'assets/images/demo/blog/'.$value['photo'];
																						}else{
																							$src = base_url().'assets/images/merchant/usericon.jpg';
																						}?>
																						<tr class="gradeX" id="<?= $value['id']?>">
                                                <td align="center"><img src="<?= $src; ?>" style="width:70px;height:70px;"/></td>
												<td><?= $value['title']; ?></td>
                                                <td style="text-align:left;"><?= substr($value['description'],0,460).'......'; ?></td>
                         <td><?=$this->admin_model->findCategoryById($value['businessCategory']); ?></td>
                                                <td>
					
																									<a href="admin/edit_blog?id=<?= $value['id']?>"><i aria-hidden="true" class="i-marker-2" style="cursor:pointer;"></i></a>
																																													<a><i aria-hidden="true" class="i-remove-4 del_blog" title="Delete" style="cursor:pointer;"></i></a>
											<!-- Working -->
						<?php
							if($value['status']==1)
							{
							?>
							<a><i aria-hidden="true" class="adctv_blog"  style="cursor:pointer;">Deactivate</i></a>
<?php
}
else
{
?>
	<a><i aria-hidden="true" class="adctv_blog"  style="cursor:pointer;">Activate</i></a>
					<?php
					}?>
																								</td>
                                            </tr>
                                        <?php }}
										else{
										echo "<tr><td colspan='5' align='center'>No record(s) found</td></tr>";
										
										}?> 
                                        </tbody>
                                        <!--<tfoot>
                                            <tr>
                                                <th>Rendering engine</th>
                                                <th>Browser</th>
                                                <th>Platform(s)</th>
                                                <th>Engine version</th>
                                                <th>CSS grade</th>
                                            </tr>
                                        </tfoot>-->
                                    </table>
                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                                                
                        </div><!-- End .col-lg-12  -->                     
                                            
                    </div><!-- End .row-fluid  -->

                </div> <!-- End .container-fluid  -->
            </div> <!-- End .wrapper  -->
        </section>
    </div><!-- End .main  -->
	    <!-- Boostrap modal dialog -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Confirm delete</h4>
          </div>
					<div class="modal-body">
						Do you really want to delete?
						<input type="hidden" name="blog_id" id="blog_id"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="ok_delete" class="btn btn-primary">Ok</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 
	<div class="modal fade" id="modal_ban" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Confirm ban</h4>
          </div>
					<div class="modal-body">
						Do you really want to ban this Employee?
						<input type="hidden" name="employee_id" id="employee_id"/>
          </div>		  
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="ok_ban" class="btn btn-primary">Ok</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 
  
  <div class="modal fade" id="adcvt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Confirm Activate/Deactivate</h4>
          </div>
					<div class="modal-body">
						Do you really want to Activate/Deactivate this Employee?
						<input type="hidden" name="adcvt_id" id="adcvt_id"/>
          </div>		  
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="ok_adctv" class="btn btn-primary">Ok</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 
  
  
  
  
  
  </body>
	<script>
		$(document).ready(function(){
			$('.del_blog').click(function(){
				var del = $(this).closest('tr').attr('id');
				$('#blog_id').val(del);
				$('#myModal').modal('show');
			});
			$('#ok_delete').click(function(){
				var id = $('#blog_id').val();
				$.ajax({
					url: "admin/del_blog",
					type: "POST",
					data: "blog_id="+id,
					success: function(res){
						//$('body').html(res);return;
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
						}
					}
				});
			});
			
			
			
			//Working
			$('.adctv_blog').click(function(){
				var del = $(this).closest('tr').attr('id');
				$('#adcvt_id').val(del);
				$('#adcvt').modal('show');
			});
			$('#ok_adctv').click(function(){
				var id = $('#adcvt_id').val();
				$.ajax({
					url: "admin/adctv_blog",
					type: "POST",
					data: "blog_id="+id,
					success: function(res){
						//$('body').html(res);return;
						if(res){
							$('#adcvt').modal('show');
							//$('#'+id).remove();
							setTimeout(function() {
								$('#adcvt').modal('hide');
								location.reload();
							}, 250);
						}
					}
				});
			});
			
		});
	</script>
</html>