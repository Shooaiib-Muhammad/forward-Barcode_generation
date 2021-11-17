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
            <a href="<?php echo base_url("index.php/departments/newdepartment") ?>" class="btn btn-success mb-3"> <i class="fa fa-plus-circle"></i> Create New</a>
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
    <table class="table table-hover table-stripped datatable table-sm">
        <thead class="bg-dark text-white">
            <tr>
                <th>Sr #</th>
                <th>Department </th>
                 <th>Edit Department </th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1 ?>
            <?php
            //print_r($data);
            ?>
            <?php foreach ($data as $key => $f): ?>
            <tr>
            <form action="<?php echo base_url("index.php/departments/update") ?>" method="post">
                <td><?php echo $counter ?></td>
                <td><?php echo $f->DeptName ?></td>
                <td>
                <input type="text" class="form-control" name="dept" value="<?php echo $f->DeptName ?>">
                <input type="hidden" class="form-control" name="deptID" value="<?php echo $f->DeptID ?>"></input>
                </td>
                <td>
             <?php
            $Status=$f->Status;
             $Deptid=$f->DeptID;
              $Status;
    
           // if($Status){
if($f->Status==1){
                //Echo "Heloo";
                 ?>
                 <div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch<?php Echo $Deptid ?>" tabindex="0" checked>
    <label class="onoffswitch-label" for="myonoffswitch<?php Echo $Deptid ?>">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
                 <?php

             }else{
                  //Echo "Helll";
                 ?>
<div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch<?php Echo $Deptid ?>" tabindex="0" >
    <label class="onoffswitch-label" for="myonoffswitch<?php Echo $Deptid ?>">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
                 <?php
             }
             ?>
           
            

                   
                </td>
                <td>
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    <!-- <a href="<?php echo base_url("index.php/departments/$f->DeptID") ?>" class="btn btn-primary"><i class="fa fa-th"></i></a>
                    <a href="<?php echo base_url("index.php/departments/delete/$f->DeptID") ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a> -->
                </td>
                </form>
            </tr>
            <?php $counter = $counter + 1; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div></div>

    
</div>

<?php $this->load->view('includes/contentend') ?>
<?php $this->load->view('includes/scripts') ?>
<?php $this->load->view('includes/footer') ?>


<?php

}

?>