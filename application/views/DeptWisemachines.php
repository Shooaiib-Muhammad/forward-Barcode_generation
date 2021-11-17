<?php
if(!($this->session->has_userdata('user_id'))){
  redirect('');
}else{
   $this->load->model('Machine_model', 'model');
?>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/topnav'); ?>
<?php $this->load->view('includes/sidebar') ?>
<?php $this->load->view('includes/contentstart') ?>
<a href="<?php echo base_url("index.php/Sections/GetSection/$DeptID") ?>"><button type="button" class="btn btn-primary">back</button></a>

    </br>
    </br>
   
<div class="col-lg-12" style="margin-bottom:20px" >
<div class="row">
 <div class="col-md-1">

<button class="btn btn-primary btn-sm " id="edit"> <i class="fa fa-edit"></i> Edit</button> 
</div>
 <div class="col-md-2">
  <form action="<?php echo base_url("index.php/Machines/Add") ?>" method="post">
 <div class="form-group">
                           
                            <select class="form-control" name="Machine" id="Machine" >
                                
                                <?php foreach($machines as $k => $v): ?>
                                    <option value="<?php echo $v->MID ?>"> <?php echo $v->MachineName ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                         </div>
                       <input type="hidden" class="form-control" name="SecID" value="<?php Echo $id;?>">
                         <div class="col-md-4">
<button type="submit" class="btn btn-info btn-sm "> <i class="fa fa-plus-circle"></i> Add Machines
                        </button>
                                </form>
                         </div>
                                </div>                    
</div>

<?php 

//print_r($Sections);
foreach ($getmachines as $key => $f){
    ?>
  

          <div class="col-lg-3 col-4">
            <form action="<?php echo base_url("index.php/Machines/updatemac") ?>" method="post" class="form" style="display: none;">
           <input type="text" class="form-control" name="MachineName" value="<?php Echo $f->MachineName;?>">
           <input type="hidden" class="form-control" name="SecID" value="<?php Echo $f->SectionID;?>">
                    <input type="hidden" class="form-control" name="DMID" value="<?php Echo $f->DMID;?>">
           <?php
           
                 ?>
         <div class="row"> 
           <div class="col-md-10">
         <div class="onoffswitch ">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch<?php Echo $f->DMID;?>" tabindex="0" checked>
    <label class="onoffswitch-label" for="myonoffswitch<?php Echo $f->DMID;?>">
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
            <!-- small box -->
            <div class="small-box bg-SUNFLOWER">
              <div class="inner">
                <h3></h3>

           <p><?php Echo $f->MachineName;?></p> 
              </div>
              <div class="icon">
                <i class="fas fa-cog"></i>
              </div>
              <?php
              $data['Checkmaintance'] = $this->model->Checkmaintance($f->DMID);
              //print_r($data['Checkmaintance']);
if(empty($data['Checkmaintance'])){
 ?>
 <a href="<?php echo base_url("index.php/machines/sectionwisemachine/$f->DMID") ?>" class="small-box-footer"> Pending More info <i class="fas fa-arrow-circle-right"></i></a>
 <?php

}else{
  
  ?>
  <a href="<?php echo base_url("index.php/machines/sectionwisemachine/$f->DMID") ?>" class="small-box-footer">Maintance Done <i class="fas fa-check-circle"></i></a>
  <?php
}
              ?>
              
            </div>
          </div>
          <?php
          
}

?>
          <!-- ./col -->
         
          <!-- ./col -->
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