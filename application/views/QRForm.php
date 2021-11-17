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


<script>
    window.onload = function(){
        window.location.href="<?php echo base_url("index.php/QRController/Getids/$DMID")?>";
       
    }
</script>
<script>


$(document).ready(function(){



$('#button-save').click(function(e){
    event.preventDefault();

      machinId= $("#machineId").val();
      dept= $("#department").val();
      sec= $("#section").val();
      workDes= $("#desOfWork").val();
      
   var url = "<?php echo base_url("index.php/QRController/addData/") ?>";
  $.ajax({
        url : url,
        type : "POST",
        data : {"machinId" : machinId,"workDes":workDes},
        success : function(data) {
            alert("Success!");
            //window.location.reload();  
        //  Email.send({
        //          SecureToken : "cf75b23f-c53a-4876-816e-b2b4f7d10a28",
        //             To : 'shoaib@forward.pk',
        //             From : "aafaq146@gmail.com",
        //             Subject : "This is the subject",
        //             Body : "And this is the body"
        //         }).then(
        //         message => alert("Scheduling Done! Your Request has been Submitted"),
        //         console.log('hi')
        //         );
        //        console.log("Entered Success");
        },
         error: function (xhr, exception, thrownError) {
            var msg = "";
            if (xhr.status === 0) {
                msg = "Not connect.\n Verify Network.";
            } else if (xhr.status == 404) {
                msg = "Requested page not found. [404]";
            } else if (xhr.status == 500) {
                msg = "Internal Server Error [500].";
            } else if (exception === "parsererror") {
                msg = "Requested JSON parse failed.";
            } else if (exception === "timeout") {
                msg = "Time out error.";
            } else if (exception === "abort") {
                msg = "Ajax request aborted.";
            } else {
                msg = "Error:" + xhr.status + " " + xhr.responseText;
            }
            if (callbackError) {
                callbackError(msg);
            }
           
        }
    }); 

});

});
</script>
<div>
<?php $this->load->view('includes/contentend') ?>
</div>
<?php $this->load->view('includes/footer') ?>


