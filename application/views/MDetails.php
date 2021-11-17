<?php
if(!($this->session->has_userdata('user_id'))){
  redirect('');
}else{
?>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/topnav'); ?>
<?php $this->load->view('includes/sidebar') ?>

<?php $this->load->view('includes/contentstart') ?>

    
    
<table class="table table-striped" style="width:30%">
<thead>
 <th colspan="2">Today Machine Details</th>
  
 </thead>
 <thead>
 <th>Status</th>
  <th>Counter</th>
  <th>View</th>
</thead>
<tbody>

 <?php
 
 foreach ($ON as $Key){
  ?>
  <tr>
  <td>ON</td>
     <td><?php Echo $Key['ID']; ?></td>
      <td>
      
         <a href="<?php echo base_url("index.php/Reports/OnMachines/") ?>">View</a>
      
     
     </td>
</tr>
<?php
 }
 ?>





</tbody>
</table>

          <!-- ./col -->
         
          <!-- ./col -->

<?php $this->load->view('includes/contentend') ?>
<?php $this->load->view('includes/scripts') ?>
<?php $this->load->view('includes/footer') ?>


<?php

}

?>