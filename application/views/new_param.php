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

<div class="col-md-6 offset-md-3 offset-0 ">
    <?php if(validation_errors()): ?>
    <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
    </div>
    <?php endif ?>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create New Machine Parameter</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="<?php echo base_url("index.php/parameters/newparam?machine=$mid") ?>" method="post">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <lable class="form-control-label" for="machine">Machine</lable>
                            <select class="form-control" name="machine" id="machine">
                                <?php foreach($machines as $k => $v): ?>
                                    <option value="<?php echo $v->MID ?>" <?php if($mid == $v->MID){echo "selected"; } ?>> <?php echo $v->MachineName ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <lable class="form-control-label" for="name">Parameter Name</lable>
                            <input class="form-control" name="name" id="name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <lable class="form-control-label" for="duration">Duration</lable>
                            <select class="form-control" name="duration" id="duration">
                                <?php foreach($durations as $k => $v): ?>
                                    <option value="<?php echo $v->DID ?>"> <?php echo $v->DurName ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" value="1" name="status" id="status" type="checkbox"
                                checked>
                            <label class="custom-control-label" for="status">Status</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
</div>

<?php $this->load->view('includes/contentend') ?>
<?php $this->load->view('includes/scripts') ?>
<?php $this->load->view('includes/footer') ?>
<?php

}

?>