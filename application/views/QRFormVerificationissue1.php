<?php $this->load->view('includes/header'); ?>

<!-- Start here with columns -->
<div class="container p-3 mb-2 bg-light text-dark" style="margin-top:3%; background-color:gray">

<form id="basic-form">
            <h2 style="margin-left:35%">Defect Information</h2>
            <div class="row" style="border: 1px solid black; padding:15px;">
            <div class="col-md-3">
            <div class="form-group">
                <label >Machine ID</label>
                <input type="number" class="form-control" id="transactionId" value="<?php echo $machineissue[0]['ID'] ?>" disabled>
            </div>
            </div>
            
            <div class="col-md-3">
            <div class="form-group">
                <label >Machine Name</label>
                <input type="text" class="form-control" id="machineName" 
                value="<?php echo $machineissue[0]['Name'];?>" disabled>
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
                <label >Department</label>
                <input type="text" class="form-control" id="department" value="<?php echo $machineissue[0]['DeptName'] ?>" disabled>
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
                <label >Section</label>
                <input type="text" class="form-control" id="section" value="<?php echo $machineissue[0]['SecName'] ?>" disabled>
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
                <label >Description of Work required</label>
                <textarea type="text" rows="4" cols="8" class="form-control" id="desOfWork" placeholder="<?php echo $machineissue[0]['des_work_required'] ?>" disabled></textarea>
            </div>
            </div>
           </div>
            <h2 style="margin-left:30%">Solution Remarks</h2>
       
           
           
            <div class="row" style="border: 1px solid black; padding:15px;">
            <div class="col-md-12">
            <div class="form-group">
                <label >Solution Provided</label>
                <textarea type="text" rows="4" cols="8" class="form-control" id="sol_provided"  placeholder="<?php echo $machineissue[0]['SOultionDescption']?>" disabled></textarea>
            </div>
        
            </div>

            <div class="col-md-3">
            <div class="form-group">
                <label >Solution :<?php echo $machineissue[0]['Solution']?></label>
               
              
               
                
            </div>
        
         
            </div>
           <div class="col-md-3">
            <div class="form-group">
                <label >asasasas:</label>
                <select class="form-control" id="sol">
                <option value="1">Approved</option>
                <option value="0">Dis Approved</option> 
             
                </select>
            </div>
        
            </div>
            </div>
         
            <br>
            <button    id="button-save" style="width:20%;margin-left:40%" class="btn btn-primary btn-block ">Save</button>
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

      transaction_Id= $("#transactionId").val();
//alert(transaction_Id);

      //solDes= $("#sol_provided").val();

      sol = $( "#sol" ).val();
//alert(sol);
   var url = "<?php echo base_url("index.php/QRController/Approval/") ?>";
   //alert(url);
   $.ajax({
        url : url,
        type : "POST",
         data : {"transaction_Id" : transaction_Id, "sol":sol},
        success : function(data) {
            //console.log(data);
            //alert(data);
         Email.send({
                 SecureToken : "cf75b23f-c53a-4876-816e-b2b4f7d10a28",
                    To : 'shoaib@forward.pk',
                    From : "aafaq146@gmail.com",
                    Subject : "This is the subject",
                    Body : "And this is the body"
                }).then(
                message => alert("Scheduling Done! Your Request has been Submitted"),
                console.log('hi')
                );
               console.log("Entered Success");
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


