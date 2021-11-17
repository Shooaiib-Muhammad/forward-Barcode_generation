<?php $this->load->view('includes/header'); ?>
<body >
<!-- Start here with columns -->
<div class="container p-3 mb-2 bg-light text-dark" style="margin-top:3%; background-color:gray">

<form id="basic-form">
            <h2 style="margin-left:35%">Machine Information</h2>
            <div class="row" style="border: 1px solid black; padding:15px;">
            <div class="col-md-3">
            <div class="form-group">
                <label >Machine ID</label>
                <?php
                $DMID=$machineDetails[0]['DMID']
                ?>
                <input type="number" class="form-control" id="machineId" value="<?php echo $machineDetails[0]['DMID'] ?>" disabled>
            </div>
            </div>
            
            <div class="col-md-3">
            <div class="form-group">
                <label >Machine Name</label>
                <input type="text" class="form-control" id="machineName" 
                value="<?php echo $machineDetails[0]['Name'];?>" disabled>
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
                <label >Department</label>
                <input type="text" class="form-control" id="department" value="<?php echo $machineDetails[0]['DeptName'] ?>" disabled>
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
                <label >Section</label>
                <input type="text" class="form-control" id="section" value="<?php echo $machineDetails[0]['SecName'] ?>" disabled>
            </div>
            </div>
         
           </div>
            <h2 style="margin-left:30%">Maintenance Work Required</h2>
       
           
           
            <div class="row" style="border: 1px solid black; padding:15px;">
            <div class="col-md-12">
            <div class="form-group">
                <label >Description of Work required :</label>
                <textarea type="text" rows="4" cols="8" class="form-control" id="desOfWork" required></textarea>
            </div>
            </div>
         
      
            <br>
            <button    id="button-save" style="width:20%;margin-left:40%" class="btn btn-primary btn-block ">Send Request</button>
            </form>       

        <?php if(validation_errors()): ?>
    <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
    </div>
    <?php endif ?>
  
</div>



<?php $this->load->view('includes/scripts') ?>

<script src="https://smtpjs.com/v3/smtp.js">
</script>

<script>


$(document).ready(function(){



$('#button-save').click(function(e){
    event.preventDefault();

      machinId= $("#machineId").val();
      dept= $("#department").val();
      sec= $("#section").val();
      workDes= $("#desOfWork").val();
    //alert("I am here");
           // alert(url);

   var url = "<?php echo base_url("index.php/QRController/addData/")?>"+machinId + "/" + workDes
    alert(url);
    $.get(url, function(data) {
        alert("Request Successfuly Generated");
     event.preventDefault();
 });
//   $.post(
//         url,{"machinId" : machinId,"workDes":workDes},
//         function(data) {
   
//                console.log("Entered Success");
//         }
        
//     ); 
//alert(url);
});

});
</script>
<div>
<?php $this->load->view('includes/contentend') ?>
</div>
<?php $this->load->view('includes/footer') ?>


