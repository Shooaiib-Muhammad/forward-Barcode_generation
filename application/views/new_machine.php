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

<div class="col-md-4 offset-md-4 offset-0 ">
    <?php if(validation_errors()): ?>
    <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
    </div>
    <?php endif ?>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create New Machine</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="<?php echo base_url("index.php/machines/newmachine") ?>" method="post">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name">Machine Name</label>
                            <input class="form-control" id="name" name="name" type="text"
                                placeholder="Enter Machine Name">
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