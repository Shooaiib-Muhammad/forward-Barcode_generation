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
    <div class="row d-flex align-items-end">
        <div class="col-md-4">
            <a href="<?php echo base_url("index.php/sections/newsection") ?>" class="btn btn-success mb-3"> <i class="fa fa-plus-circle"></i> Create New</a>
        </div>
        <div class="col-md-4">
            <form action="<?php echo base_url("index.php/sections") ?>" method="get">
            <div class="row">
                <div class="col-md-6 offset-md-2">
                    <?php $this->load->view("includes/departments") ?>
                
                </div>
                <div class="col-md-4 mt-md-3">
                    <button type="submit" class="btn btn-success mt-md-3"> <i class="fa fa-search"></i> Filter</button>
                </div>
            </div>
            </form>
        </div>
    </div>
       <div class="row">
    <div class="col-md-8">
    <table class="table table-hover table-stripped datatable table-sm">
        <thead class="bg-dark text-white">
            <tr>
                <th>Sr #</th>
                <th>Department</th>
                <th>Section Name</th>
                <th>Edit Section</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1 ?>
            <?php
            //print_r($sections);
            ?>
            <?php foreach ($sections as $key => $f): ?>
          
            <tr>
              <form action="<?php echo base_url("index.php/Sections/update") ?>" method="post">
                <td><?php echo $counter ?></td>
                  <td>
                  <div class="form-group">
    
    <select  class="form-control" name="department" id="department">
    <option value="<?php echo $f->DeptID ?>" ><?php echo $f->DeptName ?></option>
        <?php foreach($dept as $key => $value): ?>
            <option value="<?php echo $value->DeptID ?>" <?php if($department == $value->DeptID) {echo "selected";} ?>><?php echo $value->DeptName ?></option>
        <?php endforeach ?>
    </select>
</div>
                  </td>
                <td><?php echo $f->SecName ?></td>
               <td>
               <input type="text" class="form-control" name="SecName" value="<?php echo $f->SecName ?>">
                <input type="hidden" class="form-control" name="SecID" value="<?php echo $f->SecID ?>"></input></td>
                <td>
             <?php
            $Status=$f->Status;
            $SecID=$f->SecID;
              $Status;
    
           // if($Status){
if($f->Status==1){
                //Echo "Heloo";
                 ?>
                 <div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch<?php Echo $SecID ?>" tabindex="0" checked>
    <label class="onoffswitch-label" for="myonoffswitch<?php Echo $SecID ?>">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
                 <?php

             }else{
                  //Echo "Helll";
                 ?>
<div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch<?php Echo $SecID ?>" tabindex="0" >
    <label class="onoffswitch-label" for="myonoffswitch<?php Echo $SecID ?>">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
                 <?php
             }
             ?>
           
            

                   
                </td>
                <td>
                    <!-- <a href="<?php echo base_url("index.php/sections/delete/$f->SecID") ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a> -->
                 <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </td>
                <from>
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