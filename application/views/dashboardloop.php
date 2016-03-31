	
    						
						<?php if(isset($post)){
							foreach($post as $pt){
							?>
						<div class="grid">
                        <?php 
						$hed=str_replace(" ","-",$pt['head']);
						$hed= preg_replace('/[^A-Za-z0-9\-]/', '', $hed);
						$fhed=substr($hed,0,50);
						
						?>
                        <a href="<?= base_url()?>postview/<?= $fhed?>/<?= $pt['id']?>" style="text-decoration:none">
							<div class="imgholder">
								<img src="http://zersey.com/assets/zerseynme/<?= $pt['image']?>" />
                                <p class="card-tag"><?= $pt['category']?></p>
							</div>
							<div class="content">
								<div class="like-comment-date">
									<ul class="meta">
									<li style="padding:0px 5px !important"><a href="#" style="color:rgb(187, 187, 187);" class="comment" rel="617"><i class="icon-comment"></i>0 </a></li>
									<li class="like"><a href="http://zersey.com/blog/likelukbok/luklikemrchant/617/">
									<i class="icon-heart" id="hrts"></i>0</a>
									</li>
									<li style="padding:0px 5px !important"><i class="icon-calendar"></i><?php // $to_time = strtotime($cm->datetm);
$to_time = strtotime(str_replace('/', '-', $pt['createdOn']));
//echo strtotime("22-03-2015 20:08:16");
$from_time = strtotime(date("d-m-Y H:i:s"));
$min=round(abs($to_time - $from_time) / 60);
if($min>59){
	$minx= round($min/60);
if($minx>23){
$minz=round($minx/24);
if($minz<30){
echo ($minz. " Day");
}
else{
	
	$a= explode(" ", $pt['createdOn']);
	echo $a[0];
	}
}
else{	echo $minx." Hr";}
	}
else{ echo $min." Min.";}
?></li>
									</ul>
									<h5 style="text-align:justify"><?= $pt['head']?></h5>
								</div>
							</div>
                           <?php  $photox=$this->usermodel->where_data('customer',array('userId'=>$pt['userid']));
							if($pt['userid']!=0)
								$unm=$this->datamodel->getusernamebyid($pt['userid']);
							 ?>
							<div class=" metabtm meta">
                            <a href="<?= base_url()?>userprofile/<?= $unm->username?>">
                          <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="width:30px;border-radius: 10px;display: inline-block;"></a>
                    <p style="display:inline-block; padding:5px"><a href="<?= base_url()?>userprofile/<?= $unm->username?>"><?php if($pt['userid']!='0') echo $photox[0]->fullname; else echo 'Admin'?></a></p></div>
						</a>
                        </div>
                        <?php }}?>
						 							