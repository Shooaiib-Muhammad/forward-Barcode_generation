<?php
if(!($this->session->has_userdata('user_id'))){
  redirect('');
}else{
?>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/topnav'); ?>
<?php $this->load->view('includes/sidebar') ?>
<?php $this->load->view('includes/contentstart') ?>

<?php
 $deptId =  $this->session->userdata('DeptID');
 $AdminStatus=  $this->session->userdata('isAdmin');
?>
<?php
if($AdminStatus ==1){
  ?>
  <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-darkblue">
              <div class="inner">
                <h3><?php echo $amb_count ?></h3>

                <p>Airless Mini Hall </p>
              </div>
              <div class="icon">
                <i class="fas fa-cog"></i>
              </div>
              <a href="<?php echo base_url("index.php/Sections/GetSection/1") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-darklight">
              <div class="inner">
               <h3><?php echo $ms1_count ?></h3>

                <p>Machine Stitch Hall 2  </p>
              </div>
              <div class="icon">
                <i class="fas fa-cog"></i>
              </div>
              <a href="<?php echo base_url("index.php/Sections/GetSection/7") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-bluelight">
              <div class="inner">
               <h3><?php echo $ms2_count ?></h3>

                <p>Machine Stitch Hall 1  </p>
              </div>
              <div class="icon">
                <i class="fas fa-cog"></i>
              </div>
              <a href="<?php echo base_url("index.php/Sections/GetSection/6") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
       
          <!-- ./col -->
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
               <h3><?php echo $tm_count ?></h3>

                <p>Thermo Bounded </p>
              </div>
              <div class="icon">
                <i class="fas fa-cog"></i>
              </div>
              <a href="<?php echo base_url("index.php/Sections/GetSection/3") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
               <h3><?php echo $lfb_count ?></h3>

                <p>Laminated FootBall Ball  </p>
              </div>
              <div class="icon">
                <i class="fas fa-cog"></i>
              </div>
              <a href="<?php echo base_url("index.php/Sections/GetSection//24") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><?php echo $amb_team ?></h3>

                <p>Department</p>
              </div>
              <div class="icon">
                <i class="fas fa-cogs"></i>
              </div>
              <a href="<?php echo base_url("index.php/departments") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $ms1_team ?></h3>

                <p>Section</p>
              </div>
              <div class="icon">
                <i class="fas fa-cogs"></i>
              </div>
              <a href="<?php echo base_url("index.php/sections") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-GRAPEFRUIT">
              <div class="inner">
                <h3><?php echo $ms2_team ?></h3>

                <p>Machines</p>
              </div>
              <div class="icon">
                <i class="fas fa-cash-register"></i>
              </div>
              <a href="<?php echo base_url("index.php/machines") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-LAVENDER">
              <div class="inner">
                <h3><?php echo $tm_team ?></h3>

                <p>Machines Peremetere</p>
              </div>
              <div class="icon">
                <i class="fas fa-prescription-bottle"></i>
              </div>
              <a href="<?php echo base_url("index.php/Parameters") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-SUNFLOWER">
              <div class="inner">
                <h3><?php echo $lfb_team ?></h3>

                <p>Machine Location</p>
              </div>
              <div class="icon">
                <i class="fas fa-map-marker"></i>
              </div>
              <a href="<?php echo base_url("index.php/machines/department") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
  <?php
}else{
if($deptId ==1){
?>
<div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-darkblue">
              <div class="inner">
                <h3><?php echo $amb_count ?></h3>

                <p>Airless Mini Hall </p>
              </div>
              <div class="icon">
                <i class="fas fa-cog"></i>
              </div>
              <a href="<?php echo base_url("index.php/Sections/GetSection/1") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
<?php
}elseif($deptId ==7){
?>
          
          <!-- ./col -->
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-darklight">
              <div class="inner">
               <h3><?php echo $ms1_count ?></h3>

                <p>Machine Stitch Hall 2  </p>
              </div>
              <div class="icon">
                <i class="fas fa-cog"></i>
              </div>
              <a href="<?php echo base_url("index.php/Sections/GetSection/7") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php
}elseif($deptId ==6){
?>
           <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-bluelight">
              <div class="inner">
               <h3><?php echo $ms2_count ?></h3>

                <p>Machine Stitch Hall 1  </p>
              </div>
              <div class="icon">
                <i class="fas fa-cog"></i>
              </div>
              <a href="<?php echo base_url("index.php/Sections/GetSection/6") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php
}elseif($deptId ==3){
?>
          <!-- ./col -->
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
               <h3><?php echo $tm_count ?></h3>

                <p>Thermo Bounded </p>
              </div>
              <div class="icon">
                <i class="fas fa-cog"></i>
              </div>
              <a href="<?php echo base_url("index.php/Sections/GetSection//3") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php
}elseif($deptId ==24){
?>
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
               <h3><?php echo $lfb_count ?></h3>

                <p>Laminated FootBall Ball  </p>
              </div>
              <div class="icon">
                <i class="fas fa-cog"></i>
              </div>
              <a href="<?php echo base_url("index.php/Sections/GetSection//24") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php
}
}
?>
          <!-- ./col -->

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
<?php $this->load->view('includes/contentend') ?>
<?php $this->load->view('includes/scripts') ?>
<?php $this->load->view('includes/footer') ?>


<?php

}

?>