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
            <a href="<?php echo base_url("index.php/parameters/newparam?machine=$id") ?>" class="btn btn-success mb-3"> <i class="fa fa-plus-circle"></i> Create New</a>
        </div>
        
    </div>
     <div class="row">
                <div class="col-md-8">
    <table class="table table-hover table-stripped datatable table-sm">
        <thead class="bg-dark text-white">
            <tr>
                <th>Sr #</th>
                 <th>Machine </th>
                <th>Parameter </th>
                 <th>Edit Parameter </th>
                <th>Duration</th>
                 <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1 ?>
            <?php foreach ($params as $key => $f): ?>
          
            <tr>
                  <form action="<?php echo base_url("index.php/Parameters/update") ?>" method="post">
                <td><?php echo $counter ?></td>
                   <td>
                 <div class="form-group">
                           
                            <select class="form-control" name="Machine" id="duration">
                                 <option value="<?php echo $f->MID ?>"> <?php echo $f->MachineName ?></option>
                                <?php foreach($machines as $k => $v): ?>
                                    <option value="<?php echo $v->MID ?>"> <?php echo $v->MachineName ?></option>
                                <?php endforeach ?>
                            </select>
                        </div></td>
                <td><?php echo $f->ParamName ?></td>
                 <td><input type="text" class="form-control" name="ParamName" value="<?php echo $f->ParamName ?>">
                <input type="hidden" class="form-control" name="ParamID" value="<?php echo $f->ParamID ?>"></td>
                <td>
            <div class="form-group">
                           
                            <select class="form-control" name="duration" id="duration">
                                 <option value="<?php echo $f->DID ?>"> <?php echo $f->DurName ?></option>
                                <?php foreach($durations as $k => $v): ?>
                                    <option value="<?php echo $v->DID ?>"> <?php echo $v->DurName ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </td>
                <td>
                    <?php
            $Status=$f->Status;
            $ParamID=$f->ParamID;
              $Status;
    
           // if($Status){
if($Status==1){
                //Echo "Heloo";
                 ?>
                 <div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch<?php Echo $ParamID ?>" tabindex="0" checked>
    <label class="onoffswitch-label" for="myonoffswitch<?php Echo $ParamID ?>">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
                 <?php

             }else{
                  //Echo "Helll";
                 ?>
<div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch<?php Echo $ParamID ?>" tabindex="0" >
    <label class="onoffswitch-label" for="myonoffswitch<?php Echo $ParamID ?>">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
                 <?php
             }
             ?>
                </td>
                <td>
                    <!-- <a href="<?php echo base_url("index.php/parameters/delete/$f->ParamID?machine=$id") ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a> -->
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </td>
                </tr>
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