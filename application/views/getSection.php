<?php
if(!($this->session->has_userdata('user_id'))){
  redirect('');
}else{
?>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/topnav'); ?>
<?php $this->load->view('includes/sidebar') ?>

<?php $this->load->view('includes/contentstart') ?>
 <a href="<?php echo base_url("") ?>"><button type="button" class="btn btn-primary">back</button></a>
    </br>
     </br>
    </br>
    
          <div class="col-lg-12 " style="margin-bottom:20px" >
<div width="100%">
 <button class="btn btn-primary btn-sm " id="edit"> <i class="fa fa-edit"></i> Edit</button>
 <a href="<?php echo base_url("index.php/sections/newsection") ?>"><button class="btn btn-info btn-sm "> <i class="fa fa-plus-circle"></i> Create New Section</button></a>
</div>
<!--  -->
 </div>

<?php 

//print_r($Sections);
foreach ($Sections as $keys ){
  //print_r($Sections);
   $this->load->model('Section_model', 'model');
  $id=$keys['SecID'];
   $data['machineCounter'] = $this->model->getSectionCOunter($id);
  //print_r($data['machineCounter']);

  $SecID=$keys['SecID'];
  $DeptID=$keys['DeptID'];
?>

          <div class="col-lg-3 col-4" >            
        
             <form action="<?php echo base_url("index.php/Sections/updatesec") ?>" method="post" class="form" style="display: none;">
           <input type="text" class="form-control" name="SecName" value="<?php Echo $keys['SecName'];?>">
           <input type="hidden" class="form-control" name="SecID" value="<?php Echo $SecID;?>">
                    <input type="hidden" class="form-control" name="DeptID" value="<?php Echo $DeptID;?>">
           <?php
           
                 ?>
         <div class="row"> 
           <div class="col-md-10">
         <div class="onoffswitch ">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch<?php Echo $SecID;?>" tabindex="0" checked>
    <label class="onoffswitch-label" for="myonoffswitch<?php Echo $SecID;?>">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
</div>
<div class="col-md-2">
           <button style="submit" class="btn btn-primary btn-sm">update</button>  
</div>
</div>
                 
            
             </form>
            <div class="small-box bg-darkblue">
              <div class="inner">
              
                <h3><?php
                Echo $data['machineCounter'][0]['Count'];
                ?></h3>

           <p><?php Echo $keys['SecName'];?> </p> 
           
            
         
              </div>
              <div class="icon">
                <i class="fas fa-cog"></i>
              </div>
              <?php
              
              
              ?>
              <a href="<?php echo base_url("index.php/machines/getmachineBydept/$id") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php
          
}

?>
          <!-- ./col -->
         
          <!-- ./col -->
<style>
.bg-darklight{
  background-color: #173F5F !important;
}

a.bg-darklight:hover, a.bg-darklight:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #173F5F !important;
}
.bg-darkblue{
  background-color: #1F639C !important;
}

a.bg-darkblue:hover, a.bg-darkblue:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #1F639C !important;
}
.bg-bluelight{
  background-color: #3CAEA3 !important;
}

a.bg-bluelight:hover, a.bg-darkblue:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #3CAEA3 !important;
}
.bg-yellow{
  background-color: #F6D65D !important;
}

a.bg-yellow:hover, a.bg-yellow:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #F6D65D !important;
}
p ,h3,i{
  color:white;
}
.bg-orange{
  background-color: #4FC1E9 !important;
}

a.bg-orange:hover, a.bg-orange:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #4FC1E9 !important;
}
.bg-purple{
  background-color: #48CFAD !important;
}

a.bg-purple:hover, a.bg-purple:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #48CFAD !important;
}
.bg-green{
  background-color: #A0D468 !important;
}

a.bg-green:hover, a.bg-green:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #A0D468 !important;
}
.bg-GRAPEFRUIT{
  background-color: #ED5565 !important;
}

a.bg-GRAPEFRUIT:hover, a.bg-GRAPEFRUIT:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #ED5565 !important;
}
.bg-LAVENDER{
  background-color: #AC92EC !important;
}

a.bg-LAVENDER:hover, a.bg-LAVENDER:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #AC92EC !important;
}
.bg-SUNFLOWER{
  background-color: #5D9CEC !important;
}

a.bg-SUNFLOWER:hover, a.bg-SUNFLOWER:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #5D9CEC !important;
}


</style>
<?php $this->load->view('includes/scripts') ?>
<script>
    $(document).ready(() => {
      
        $('.form').hide();
$('#edit').click(function() {
   //Echoalert('heloo');
$('.form').show();
})
    })
</script>
<?php $this->load->view('includes/contentend') ?>
<?php $this->load->view('includes/scripts') ?>
<?php $this->load->view('includes/footer') ?>


<?php

}

?>