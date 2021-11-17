<?php
if(!($this->session->has_userdata('user_id'))){
  redirect('');
}else{
?>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/topnav'); ?>
<?php $this->load->view('includes/sidebar') ?>

<?php $this->load->view('includes/contentstart') ?>  
<table class="table table-hover table-stripped  table-sm" >
 <thead>
  <tr>
  <th>Date </th>
 <th>Section </th>
  <th>Name</th>

<th>Team Member</th>
<th>Status</th>
</tr>
</thead>
<tbody>

 <?php
 
 foreach ($OnMachine as $Key){
  ?>
  <tr>
     <td><?php Echo $Key['Datee']; ?></td>
  <td><?php Echo $Key['SecName']; ?></td>

     <td><?php Echo $Key['Name']; ?></td>
     
    
     <td><?php Echo $Key['Teammember']; ?></td>
     <td><?php Echo $Key['Status']; ?></td>
    
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