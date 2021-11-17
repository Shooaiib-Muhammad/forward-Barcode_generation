<?php
if(!($this->session->has_userdata('user_id'))){
  redirect('');
}else{
?>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/topnav'); ?>
<?php $this->load->view('includes/sidebar') ?>

<?php $this->load->view('includes/contentstart') ?>

    
    
<table class="table table-hover table-stripped datatable table-sm"  id="tableExport">

 <thead>
  <th>Date </th>
 <th>Section </th>
  <th>Name</th>
<th>Parameter </th>
<th>Duration</th>
<th>Solution</th>
<th>Team Member</th>
</thead>
<tbody>

 <?php
 
 foreach ($OnMachine as $Key){
  ?>
  <tr>
     <td><?php Echo $Key['Datee']; ?></td>
  <td><?php Echo $Key['SecName']; ?></td>

     <td><?php Echo $Key['Name']; ?></td>
     <td><?php Echo $Key['ParamName']; ?></td>
     <td><?php Echo $Key['DurName']; ?></td>
        <td><?php Echo $Key['Solution']; ?></td>
     <td><?php Echo $Key['Teammember']; ?></td>
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