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
        <!-- <div class="col-md-4">
            <a href="<?php //echo base_url("index.php/parameters/new?machine=$id") ?>" class="btn btn-success mb-3"> <i class="fa fa-plus-circle"></i> Create New</a>
        </div> -->
        <!-- <div class="col-md-8">
            <form action="<?php echo base_url("index.php/parameters") ?>" method="get">
            <div class="row">
                <div class="col-md-6 offset-md-2">
                <div class="form-group">
                    <label for="machine">Machine</label>
                    <select  class="form-control" name="machine" id="machine">
                        <?php //foreach($machines as $key => $value): ?>
                            <option value="<?php// echo $value->MID ?>" <?php //if($id == $value->MID) {echo "selected";} ?>><?php// echo $value->MachineName ?></option>
                        <?php //endforeach ?>
                    </select>
                </div>
                </div>
                <div class="col-md-4 mt-md-3">
                    <button type="submit" class="btn btn-success mt-md-3"> <i class="fa fa-search"></i> Filter</button>
                </div>
            </div>
            </form>
        </div> -->
    </div>
    <table class="table table-hover table-stripped datatable">
        <thead class="bg-dark text-white">
            <tr>
                <th>Sr #</th>
                <th>Full Name</th>
                <th>Card Number</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Designation</th>

            </tr>
        </thead>
        <tbody>
            <?php $counter = 1 ?>
            <?php foreach ($teams as $key => $f): ?>
          
            <tr>
                <td><?php echo $counter ?></td>
                <td><?php echo $f->Name ?></td>
                <td><?php echo $f->CardNo ?></td>
                <td><?php echo $f->Phone ?></td>
                <td><?php echo $f->Email ?></td>
                <td><?php echo $f->SkillName ?></td>
            </tr>
            <?php $counter = $counter + 1; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $this->load->view('includes/contentend') ?>
<?php $this->load->view('includes/scripts') ?>
<?php $this->load->view('includes/footer') ?>


<?php

}

?>