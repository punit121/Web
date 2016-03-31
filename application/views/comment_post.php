<?php

/*if (isset($_POST['submit'])) {

$i = 0;
foreach ($_POST as $val) {
    $name = $_POST['name'][$i];
    $age = $_POST['age'][$i];

    mysql_query("INSERT INTO users (name, age) VALUES ('$name', '$age')");
$i++;
} 
}
*/
?>





<style>
.lookcs{
border-bottom:dashed 1px #25C9DA;
margin:10px;
}
</style>
<div class="main-wrapper" style="margin:50px">
	
        <div class="row">
            
<form class="" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>blog/do_upd" >

<div class="col-lg-12 lookcs" >
<div class="col-md-6">
<label>Heading</label>

<input type="text"  name="heading" id="heading" required>
</div>
<div class="col-md-6">
<label>Topic</label>
  <select style="width:100%;" id="catgry1" name="catgry1"   required>
               <option value="0" selected disabled>Select Topic</option>
												   <?php 
			$groups = $this->usermodel->getAllGroups();
            foreach($groups as $row)
            { 
              echo '<option value="'.$row->name.'">'.ucfirst($row->name).'</option>';
            }
            ?>
                                                  </select>

</div></div>
<div class="col-lg-12 lookcs" >
<div class="col-md-6">
<label>Introduction</label>

<textarea cols="16" rows="50" name="intro" id="intro" style="word-wrap: break-word;" required></textarea>
</div><div class="col-md-6">
<label>Image</label>
<input type="file" name="imgint" id="imgint" required/>
</div>
</div>



<div class="col-lg-12 lookcs" >
<div class="col-md-6">
<label>Paregraph1</label>

<textarea cols="16" rows="50" name="comment1" id="comment1" style="word-wrap: break-word;"></textarea>
</div><div class="col-md-6">
<label>Image1</label>
<input type="file" name="image1" id="image1" />
</div>
</div>

<div class="col-lg-12 lookcs">
<div class="col-md-6">
<label>Image2</label>
<input type="file" name="image2" id="image2" />
</div><div class="col-md-6">
<label>Paregraph2</label>
<textarea cols="16" rows="30" name="comment2" id="comment2"></textarea>
</div>
</div>

<div class="col-lg-12 lookcs" >
<div class="col-md-6">
<label>Paregraph3</label>

<textarea cols="16" rows="50" name="comment3" id="comment3"></textarea>
</div><div class="col-md-6">
<label>Image3</label>
<input type="file" name="image3" id="image3" />
</div>
</div>

<div class="col-lg-12 lookcs">
<div class="col-md-6">
<label>Image4</label>
<input type="file" name="image4" id="image4" />
</div><div class="col-md-6">
<label>Paregraph4</label>
<textarea cols="16" rows="30" name="comment4" id="comment4"></textarea>
</div>
</div>
<div class="col-lg-12 lookcs" >
<div class="col-md-6">
<label>Paregraph5</label>

<textarea cols="16" rows="50" name="comment5" id="comment5"></textarea>
</div><div class="col-md-6">
<label>Image5</label>
<input type="file" name="image5" id="image5" />
</div>
</div>

<div class="col-lg-12 lookcs">
<div class="col-md-6">
<label>Image6</label>
<input type="file" name="image6" id="image6" />
</div><div class="col-md-6">
<label>Paregraph6</label>
<textarea cols="16" rows="30" name="comment6" id="comment6"></textarea>
</div>
</div>
<div class="col-lg-12 lookcs" >
<div class="col-md-6">
<label>Paregraph7</label>

<textarea cols="16" rows="50" name="comment7" id="comment7"></textarea>
</div><div class="col-md-6">
<label>Image7</label>
<input type="file" name="image7" id="image7" />
</div>
</div>

<div class="col-lg-12 lookcs">
<div class="col-md-6">
<label>Image8</label>
<input type="file" name="image8" id="image8" />
</div><div class="col-md-6">
<label>Paregraph8</label>
<textarea cols="16" rows="30" name="comment8" id="comment8"></textarea>
</div>
</div>
<div class="col-lg-12 lookcs" >
<div class="col-md-6">
<label>Paregraph9</label>

<textarea cols="16" rows="50" name="comment9" id="comment9"></textarea>
</div><div class="col-md-6">
<label>Image9</label>
<input type="file" name="image9" id="image9" />
</div>
</div>

<div class="col-lg-12 lookcs">
<div class="col-md-6">
<label>Image10</label>
<input type="file" name="image10" id="image10" />
</div><div class="col-md-6">
<label>Paregraph10</label>
<textarea cols="16" rows="30" name="comment10" id="comment10"></textarea>
</div>
</div>

</div>
<div>

<div class="col-lg-4" style="margin-bottom:50px"></div>
<div class="col-lg-4" style="margin-bottom:50px">
<input type="submit" class="button" name="submit" value="submit">
</div>
</div>
</form>
</div></div>
