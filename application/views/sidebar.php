			<?php $result=$this->admin_model->findLevelById($this->session->userdata('user_id'));
			?>
<aside id="sidebar">
    <div class="side-options">
        <ul class="list-unstyled">
            <li>
                <a href="#" id="collapse-nav" class="act act-primary tip" title="Collapse navigation">
                    <i class="icon16 i-arrow-left-7"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-wrapper">
        <nav id="mainnav">
            <ul class="nav nav-list">
                <li>
                    <a href="admin">
                        <span class="icon"><i class="icon20 i-screen"></i></span>
                        <span class="txt">Dashboard</span>
                    </a>
                </li>
				<?php
			if(($result[0]['userLevel']!="3")) {
				if($result[0]['userLevel']=="1") { ?>
                <li>
                    <a href="admin/merchants">
                        <span class="icon"><i class="icon20 i-stats-up"></i></span>
                        <span class="txt">Merchants</span>
                    </a>
                </li>
				
					<li>
                  <a href="#forms">
                      <span class="icon"><i class="icon20 i-menu-6"></i></span>
                      <span class="txt">Reverse Auction</span>
                  </a>
                  <ul class="sub">
                      <li>
                          <a href="add_auction">
                              <span class="icon"><i class="icon20 i-stack-list"></i></span>
                              <span class="txt">Add Auction</span>
                          </a>
                      </li>
                      <li>
                          <a href="view_auction">
                              <span class="icon"><i class="icon20 i-stack-checkmark"></i></span>
                              <span class="txt">View Auction</span>
                          </a>
                      </li>                      
                  </ul>
                </li>
				<?php } ?>
				<li>
                    <a href="#" <?php if(isset($pageName)){if($pageName=='service'){ echo "style=\"background: url(./admin_assets/images/patterns/furley_bg1.png);\""; }}?>>
                        <span class="icon"><i class="icon20 i-stats-up"></i></span>
                        <span class="txt">Services</span>
                    </a>
						<ul class="sub" <?php if(isset($pageName)){if($pageName=='service'){ echo "style=\"display:block;\""; }}?>>
							<li>
							  <a href="newservice">
								  <span class="icon"><i class="icon20 i-stack-list"></i></span>
								  <span class="txt">Add Service</span>
							  </a>
							</li>
							<li>
							  <a href="services" <?php if(isset($pageName)){if($pageName=='service'){ echo "style=\"background: url(./admin_assets/images/patterns/furley_bg1.png);\""; }}?>>
								  <span class="icon"><i class="icon20 i-stack-checkmark"></i></span>
								  <span class="txt">View Services</span>
							  </a>
							</li>                      
						</ul>
                </li>
								<li>
                  <a href="#forms" <?php if(isset($pageName)){if($pageName=='employee'){ echo "style=\"background: url(./admin_assets/images/patterns/furley_bg1.png);\""; }}?>>
                      <span class="icon"><i class="icon20 i-menu-6"></i></span>
                      <span class="txt">Employees</span>
                  </a>
                  <ul class="sub" <?php if(isset($pageName)){if($pageName=='employee'){ echo "style=\"display:block;\""; }}?>>
                      <li>
                          <a href="new_emp">
                              <span class="icon"><i class="icon20 i-stack-list"></i></span>
                              <span class="txt">Add Employee</span>
                          </a>
                      </li>
                      <li>
                          <a href="employees" <?php if(isset($pageName)){if($pageName=='employee'){ echo "style=\"background: url(./admin_assets/images/patterns/furley_bg1.png);\""; }}?>>
                              <span class="icon"><i class="icon20 i-stack-checkmark"></i></span>
                              <span class="txt">View Employees</span>
                          </a>
                      </li>                      
                  </ul>
                </li>	
				
				<?php if($result[0]['userLevel']=="2") { ?>
				<li>
                  <a href="#forms" <?php if(isset($pageName)){if($pageName=='viewAppointment'){ echo "style=\"background: url(./admin_assets/images/patterns/furley_bg1.png);\""; }}?>>
                      <span class="icon"><i class="icon20 i-menu-6"></i></span>
                      <span class="txt">Appointments</span>
                  </a>
                  <ul class="sub" <?php if(isset($pageName)){if($pageName=='viewAppointment'){ echo "style=\"display:block;\""; }}?>>
                      <li>
                          <a href="new_appointment">
                              <span class="icon"><i class="icon20 i-stack-list"></i></span>
                              <span class="txt">Book Appointment</span>
                          </a>
                      </li>
                      <li>
                          <a href="<?=base_url()?>viewAppointment" <?php if(isset($pageName)){if($pageName=='viewAppointment'){ echo "style=\"background: url(./admin_assets/images/patterns/furley_bg1.png);\""; }}?>>
                              <span class="icon"><i class="icon20 i-stack-checkmark"></i></span>
                              <span class="txt">View Appointments</span>
                          </a>
                      </li>                      
                  </ul>
                </li>
				<?php } ?>
				
				<li>
                  <a href="#forms" <?php if(isset($pageName)){if(($pageName=='viewCategory')||($pageName=='newCategory')){ echo "style=\"background: url(./admin_assets/images/patterns/furley_bg1.png);\""; }}?>>
                      <span class="icon"><i class="icon20 i-menu-6"></i></span>
                      <span class="txt">Categories</span>
                  </a>
                  <ul class="sub" <?php if(isset($pageName)){if(($pageName=='viewCategory')||($pageName=='newCategory')){ echo "style=\"display:block;\""; }}?>>
                      <li>
                          <a href="new_category" <?php if(isset($pageName)){if($pageName=='newCategory'){ echo "style=\"background: url(./admin_assets/images/patterns/furley_bg1.png);\""; }}?>>
                              <span class="icon"><i class="icon20 i-stack-list"></i></span>
                              <span class="txt">Add Category</span>
                          </a>
                      </li>
                      <li>
                          <a href="<?=base_url()?>viewCategory" <?php if(isset($pageName)){if($pageName=='viewCategory'){ echo "style=\"background: url(./admin_assets/images/patterns/furley_bg1.png);\""; }}?>>
                              <span class="icon"><i class="icon20 i-stack-checkmark"></i></span>
                              <span class="txt">View Categories</span>
                          </a>
                      </li>                      
                  </ul>
                </li>
				
				<li>
                  <a href="#forms">
                      <span class="icon"><i class="icon20 i-menu-6"></i></span>
                      <span class="txt">Offers</span>
                  </a>
                  <ul class="sub">
                      <li>
                          <a href="new_offer">
                              <span class="icon"><i class="icon20 i-stack-list"></i></span>
                              <span class="txt">Add Offer</span>
                          </a>
                      </li>
                      <li>
                          <a href="view_offer">
                              <span class="icon"><i class="icon20 i-stack-checkmark"></i></span>
                              <span class="txt">View Offers</span>
                          </a>
                      </li>                      
                  </ul>
                </li>
					<li>
                  <a href="setting">
                      <span class="icon"><i class="icon20 i-menu-6"></i></span>
                      <span class="txt">Setting</span>
                  </a>
				  </li>
					
					<li>
                  <a href="#forms">
                      <span class="icon"><i class="icon20 i-menu-6"></i></span>
                      <span class="txt">Photo</span>
                  </a>
                  <ul class="sub">
                      <li>
                          <a href="add_photo">
                              <span class="icon"><i class="icon20 i-stack-list"></i></span>
                              <span class="txt">Add Photo</span>
                          </a>
                      </li>
                      <li>
                          <a href="view_photo">
                              <span class="icon"><i class="icon20 i-stack-checkmark"></i></span>
                              <span class="txt">View Photo</span>
                          </a>
                      </li>                      
                  </ul>
                </li>
					
				
                  <?php if($result[0]['userLevel']=="2") { ?>
				  <li>
                  <a href="#forms">
                      <span class="icon"><i class="icon20 i-menu-6"></i></span>
                      <span class="txt">Biding</span>
                  </a>
                  <ul class="sub">
                      <li>
                          <a href="dashboardReverseAuction">
                              <span class="icon"><i class="icon20 i-stack-list"></i></span>
                              <span class="txt">New / View Bid</span>
                          </a>
                      </li>                      
                  </ul>
                </li>
				<?php } } 
				else
				{ ?><li>
                  <a href="#forms">
                      <span class="icon"><i class="icon20 i-menu-6"></i></span>
                      <span class="txt">Appointments</span>
                  </a>
                  <ul class="sub">
                      <li>
                          <a href="admin/new_appointment">
                              <span class="icon"><i class="icon20 i-stack-list"></i></span>
                              <span class="txt">Book Appointment</span>
                          </a>
                      </li>
                      <li>
                          <a href="<?=base_url()?>viewAppointment">
                              <span class="icon"><i class="icon20 i-stack-checkmark"></i></span>
                              <span class="txt">View Appointments</span>
                          </a>
                      </li>                      
                  </ul>
                </li>
			<?php } ?>
			 </ul>
        </nav> <!-- End #mainnav -->

    </div> <!-- End .sidebar-wrapper  -->
</aside><!-- End #sidebar  -->
