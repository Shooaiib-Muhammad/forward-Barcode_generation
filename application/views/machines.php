<?php
if(!($this->session->has_userdata('user_id'))){
  redirect('');
}else{
?>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/topnav'); ?>
<?php $this->load->view('includes/sidebar') ?>
<?php $this->load->view('includes/contentstart') ?>

<!-- Start here with columns -->
<div class="col-12 table-responsive">
    <div class="row d-flex align-items-end ">
        <div class="col-md-6">
            <a href="<?php echo base_url("index.php/machines/newmachine") ?>" class="btn btn-success "> <i class="fa fa-plus-circle"></i> Create New</a>
            <a href="<?php echo base_url("index.php/parameters/newparam?machine") ?>" class="btn btn-info"> <i class="fa fa-plus-circle"></i> Add Parameters</a>
                    <a href="<?php echo base_url("index.php/machines/install") ?>" class="btn btn-primary"> <i class="fa fa-plus-circle"></i>Add location</a>
        </div>
    </div>
     <?php if(validation_errors()): ?>
    <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
    </div>
    <?php endif ?>
    <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
    <?php endif ?>
       <div class="row">
    <div class="col-md-8">
    <table class="table table-hover table-strippesd datatable table-sm">
        <thead class="bg-dark text-white">
            <tr>
                <th>Sr #</th>
                <th>Machine</th>
                <th>Edit Machine </th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1 ?>
            <?php foreach ($data as $key => $f): ?>
            <tr>
            <form action="<?php echo base_url("index.php/Machines/update") ?>" method="post">
                <td><?php echo $counter ?></td>
                <td><?php echo $f->MachineName ?></td>
                <td> <input type="text" class="form-control" name="MachineName" value="<?php echo $f->MachineName ?>">
                <input type="hidden" class="form-control" name="MID" value="<?php echo $f->MID ?>"></input></td>
                 <td><?php
            $Status=$f->Status;
            $MID=$f->MID;
              $Status;
    
           // if($Status){
if($f->Status==1){
                //Echo "Heloo";
                 ?>
                 <div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch<?php Echo $MID ?>" tabindex="0" checked>
    <label class="onoffswitch-label" for="myonoffswitch<?php Echo $MID ?>">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
                 <?php

             }else{
                  //Echo "Helll";
                 ?>
<div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch<?php Echo $MID ?>" tabindex="0" >
    <label class="onoffswitch-label" for="myonoffswitch<?php Echo $MID ?>">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
                 <?php
             }
             ?></td> 
                <td>
                    <!-- <a href="<?php echo base_url("index.php/parameters?machine=$f->MID") ?>" class="btn btn-info">Parameters</a>
                    <a href="<?php echo base_url("index.php/machines/install/$f->MID") ?>" class="btn btn-primary">Install</a>
                    <a href="<?php echo base_url("index.php/machines/delete/$f->MID") ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a> -->
                      <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </td>
                </form>
            </tr>
            <?php $counter = $counter + 1; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>
</div>

<?php $this->load->view('includes/contentend') ?>
<?php $this->load->view('includes/scripts') ?>
<?php $this->load->view('includes/footer') ?>


<?php

}

?>