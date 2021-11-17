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
<div class="col-8 table-responsive">
   
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
    <table class="table table-hover table-stripped">
        <thead class="bg-dark text-white">
            <tr>
                <th>Sr #</th>
                <th>Name</th>
                 <th>User Name</th>
                <th>Card #</th>
                <th>Phone</th>
                <th>Email</th>
               
                <th>Skills</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1 ?>
            <?php foreach ($getTeam as $key => $f): ?>
            <tr>
                <td><?php echo $counter ?></td>
                <td><?php echo $f->Name ?></td>
                  <td><?php echo $f->Username ?></td>
                <td><?php echo $f->CardNo ?></td>
                <td><?php echo $f->Phone ?></td>
                <td><?php echo $f->Email ?></td>
              
                <td><?php echo $f->SkillName ?></td>
                <td>
                    <a href="<?php echo base_url("index.php/Teams/delete/$f->ID") ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                
                </td>
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