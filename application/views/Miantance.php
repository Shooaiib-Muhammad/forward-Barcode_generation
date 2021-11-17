
<div class="modal fade" id="ModelDeleteloc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Scheduling Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete detail of project? (This process is irreversible)
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary btn-confirm-del-method">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>  
    </div>
    </div>
  </div>
</div>

 <br>
  <?php
    
    if(isset($schedules)){
        ?>
 <div class="row">
   <div class="col-md-3">
  <div class="form-group">
        <div class="btn btn-primary submit-button">Approve Selected</div>

       </div>
       </div>

<div class="col-md-3">
 <div class="form-group">
    <?php
    $username =  $this->session->userdata('Username');
       $userid =  $this->session->userdata('user_id');
      // print_r($team);

    ?>
                          <label >Select Team Member</label>
                             <select class="form-control" name="team"  id="team"; ?>">
                                <option value="<?php echo $userid;?>"> <?php echo $username; ?></option>
                               <?php foreach($team as $key1){ ?>
                                    <option value="<?php echo $key1['ID']; ?>"> <?php echo $key1['Name']; ?></option>
                               <?php } ?>
                         </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                           <label >Machine Status:</label>
  <select class="form-control" name="status" id="status11">
                                <option value="ON">ON</option>
                                <option value="OFF">OFF</option>    
                            </select>
                        </div>
                          </div>
  </div>

        </div>
         
                        
      <table id="schedule" class="table table-bordered table-hover table-striped w-100">
                                                <thead >
           
            <th>
                    <div class="custom-control custom-checkbox no-sort">
                      <input class="custom-control-input" type="checkbox" id="select-all">
                      <label for="select-all" class="custom-control-label"></label>
                    </div>
                    </th>
                <th>SID #</th>
                 <th>Date</th>
               
                 <th>Parameters</th>
                <th>Duration</th>
                <th>Status</th>
                 <th>Actions</th>
                  <th>Solution</th>
              
                 
                    <th>Remarks</th>
                     <th>Actions</th>
                     
          
        </thead>
        <tbody>
            <?php
            
            
            //Print_r($schedules);
            
            ?>
            <?php foreach ($schedules as $key):
                $WorkStatus=$key['WorkStatus'];
                 ?>
            <tr>
            <td>
                   <?php   
                
                
                if($WorkStatus==0){
                    ?>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input leave-id" type="checkbox" id="select-<?= $key['SID']; ?>" value="<?= $key['SID'];?>">
                          <label for="select-<?= $key['SID']; ?>" class="custom-control-label"></label>
                        </div>
                        <?php
                        
                      }else{
                        ?>
                           <div class="custom-control custom-checkbox">
                          <input class="custom-control-input leave-id" type="checkbox" id="select-<?= $key['SID']; ?>" value="<?= $key['SID'];?>" checked disabled>
                          <label for="select-<?= $key['SID']; ?>" class="custom-control-label"></label>
                        </div> 
                        <?php
                      }
                        ?>
                        </td>
                <td><?php echo $key['SID']; ?></td>
                   <td><?php echo $key['SDate']; ?></td>
             
                 <td><?php echo $key['ParamName']; ?></td>
             
  <td><?php echo $key['DurName']; ?></td>
                <td><?php   
                
                
                if($WorkStatus==1){
                 ?>
                 <button class="btn btn-primary btn-sm"> Done</button>
                 <?php
                }else if($WorkStatus==0){
?>
<button class="btn btn-danger btn-sm"> Pending..</button>
<?php
                }
                ?>
                </td>
                <td>
            <?php   
                
                
                if($WorkStatus==1){
                    $SID=$key['SID'];
                    ?>
                     <a href="<?php echo base_url("index.php/schedules/getworking/$SID") ?>">
                <button type="submit" class="btn btn-success btn-sm" >Completed</button></a>
                    <?php
                }else{

            
                          
?>
 <a href="<?php echo base_url("index.php/schedules/view/key['SID") ?>">
                <button type="submit" class="btn btn-info btn-sm" >View</button></a>
                               <?php
                               
                           }
                           ?>
               
               
                </td>
                <form action="<?php echo base_url("index.php/schedules/DailyWorking") ?>" method="post">
                <td> 
                     <?php   
                
                
                if($WorkStatus==0){
                    ?>
                <div class="form-group">
                           
  <select class="form-control" name="Solution" id="<?php echo $key['SID']."1"; ?>">
                                <option value="ok">OK</option>
                                <option value="Notok">Not OK</option>
                                <option value="Repair">Repair</option>
                                  <option value="OFF">OFF</option>
                            </select>

                        
                          
                        </div>
                        <?php
                        }else{
                            ?>
                            <?php
                        }
                        ?>
                        </td>
                        
                       
                    
                 
                  <td>
                  
                   <input type="hidden" name="SID" value="<?php echo $key['SID']; ?>"></input>
                   <input type="hidden" class="form-control" name="department" value="<?php echo $key['DeptID'];?>"></input>
                      <input type="hidden" class="form-control" name="DMID"  id="<?php echo $key['SID']."4"; ?>" value="<?php echo $key['DMID'];?>"></input>
                  <?php   
                
                
                if($WorkStatus==0){
                    ?>
                          <input type="text" name="Remarks" class="form-control" id="<?php echo $key['SID']."3"; ?>" ></td>
                          
                 
                     <?php
                        }else{
                            ?>
                            <?php
                        }
                        ?>
                          <td>
                  <?php   
                
                
                if($WorkStatus==0){
                    ?>
                    <a href="<?php echo base_url("index.php/schedules/deleteSchedule/") ?><?php echo $key['SID']; ?>/<?php echo $key['DMID']; ?>"> 
                          <button  class="btn btn-danger btn-sm" >Delete</button></a>
                           <!-- <button type="submit" class="btn btn-success btn-sm"> Save </button> -->
                           <!-- <button data-value="<?php echo $key['SID']; ?> "
                            style="display:inline-block" data-toggle="modal" data-target="#ModelDeleteloc" class="btn btn-danger btn-sm btn-delete">Delete</button> -->
                         <?php
                        }else{
                            ?>
                            <?php
                        }
                        ?>
                                  
                   </td>
             </form>
             
               
            </tr>
           
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    }
    ?>
     <table id="maintance" class="table table-bordered table-hover table-striped w-100">
                                                <thead >
            <tr>
                 <th>Schedule Date</th>
                 <th>Parameters</th>
                <th>Duration</th>
                <th>Team member</th>
                
              <th>Maintance Date</th>
              <th>Start Time</th>
              <th>Start Time</th>
              <th>Solution</th>
              <th>Machine Status</th>  
            </tr>
        </thead>
        <tbody>
          
           <?php 
           
           foreach ($working as $key):
           ?>

           <tr>
                 <td><?php Echo $key['SDate'];?></td>
                  <td><?php Echo $key['ParamName'];?></td>
                <td><?php Echo $key['DurName'];?></td>
                 <td><?php Echo $key['Teammember'];?></td>
                <td><?php Echo $key['Datee'];?></td>
               <td><?php Echo $key['StartTime'];?></td>
               <td><?php Echo $key['EndTime'];?></td>
                <td><?php Echo $key['Solution'];?></td>
               <td><?php Echo $key['Status'];?></td>
            </tr>
             <?php endforeach; ?>
  </tbody>
  </table>
<script>
$('#tableExport').on('click',".btn-delete",function(e){
//alert("heloo")
llid = $(this).attr('data-value')
postData = {
llid
}
console.log(llid); 
$('.btn-confirm-del-method').click(function(e){
url = '<?php echo base_url('index.php/schedules/deleteSchedule/') ?>'
//alert(url)
$.post(url,postData,
function(data, status){
window.location.reload();  

});


})
}); 

leaves = []

$('#select-all').click(function(e){
 d = document.getElementById("status11").value;
     teammamber = document.getElementById("team").value;
checked = $('#select-all:checked').val()
if(checked){
  $('input[type=checkbox]').prop('checked', true)
  id = $('.leave-id').map((_,el) => el.value).get()
  for(let i = 0;i<id.length;i++){
    
        
    leaves.push({'id':id[i],'solution':$('#'+id[i]+"1" ).val(),'team':teammamber,'remarks':$('#'+id[i]+"3").val(),'dmid':$('#'+id[i]+"4").val(),'status':d})
  }
  console.log("id",id);
  console.log(leaves);
  $('.buttons').removeClass('d-none');
}else{
  $('input[type=checkbox]').prop('checked', false)
  leaves = []
  $('.buttons').addClass('d-none');
}

})

     $('.leave-id').click(function(e){
       d = document.getElementById("status11").value;
     teammamber = document.getElementById("team").value;
     //alert(teammamber);
     //alert(d);
      leave = $(this)[0]
      if(leave.checked){
        Statusval=$('#status').val();
        //alert(Statusval);
        leaves.indexOf(leave.value) === -1 ? leaves.push({'id':leave.value,'solution':$('#'+leave.value+"1" ).val(),
          'team':teammamber,
          'remarks':$('#'+leave.value+"3").val(),'dmid':$('#'+leave.value+"4").val(),'status':d}) : null;
      }else if(leave.checked == false){
        leaves.indexOf(leave.value) !== -1 ? leaves.splice(leaves,leaves.indexOf(leave.value), 1) : null;
      }

      if(leaves.length > 0){
        
        $('.buttons').removeClass('d-none');
      }else{
        $('#select-all').prop('checked', false)
        $('.buttons').addClass('d-none');
      }
    });

    $('.submit-button').click(function(e){
   console.log("Called",leaves);
          data = {
            leaves
          }
   console.log(data);
           url = '<?php echo base_url('index.php/schedules/bulk_save/') ?>'
          //alert(url);
           $.post(url, data, function(data){

            location.reload()
          }) 
        
      })

$('#schedule').dataTable(
                {
                    responsive: true,
                    lengthChange: false,
                    dom:
                        /*	--- Layout Structure 
                        	--- Options
                        	l	-	length changing input control
                        	f	-	filtering input
                        	t	-	The table!
                        	i	-	Table information summary
                        	p	-	pagination control
                        	r	-	processing display element
                        	B	-	buttons
                        	R	-	ColReorder
                        	S	-	Select

                        	--- Markup
                        	< and >				- div element
                        	<"class" and >		- div with a class
                        	<"#id" and >		- div with an ID
                        	<"#id.class" and >	- div with an ID and a class

                        	--- Further reading
                        	https://datatables.net/reference/option/dom
                        	--------------------------------------
                         */
                        "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        /*{
                        	extend:    'colvis',
                        	text:      'Column Visibility',
                        	titleAttr: 'Col visibility',
                        	className: 'mr-sm-3'
                        },*/
                        {
                            extend: 'pdfHtml5',
                            text: 'PDF',
                            titleAttr: 'Generate PDF',
                            className: 'btn-outline-danger btn-sm mr-1'
                        },
                        {
                            extend: 'excelHtml5',
                            text: 'Excel',
                            titleAttr: 'Generate Excel',
                            className: 'btn-outline-success btn-sm mr-1'
                        },
                        {
                            extend: 'csvHtml5',
                            text: 'CSV',
                            titleAttr: 'Generate CSV',
                            className: 'btn-outline-primary btn-sm mr-1'
                        },
                        {
                            extend: 'copyHtml5',
                            text: 'Copy',
                            titleAttr: 'Copy to clipboard',
                            className: 'btn-outline-primary btn-sm mr-1'
                        },
                        {
                            extend: 'print',
                            text: 'Print',
                            titleAttr: 'Print Table',
                            className: 'btn-outline-primary btn-sm'
                        }
                    ]
                });
$('#maintance').dataTable(
                {
                    responsive: true,
                    lengthChange: false,
                    dom:
                        /*	--- Layout Structure 
                        	--- Options
                        	l	-	length changing input control
                        	f	-	filtering input
                        	t	-	The table!
                        	i	-	Table information summary
                        	p	-	pagination control
                        	r	-	processing display element
                        	B	-	buttons
                        	R	-	ColReorder
                        	S	-	Select

                        	--- Markup
                        	< and >				- div element
                        	<"class" and >		- div with a class
                        	<"#id" and >		- div with an ID
                        	<"#id.class" and >	- div with an ID and a class

                        	--- Further reading
                        	https://datatables.net/reference/option/dom
                        	--------------------------------------
                         */
                        "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        /*{
                        	extend:    'colvis',
                        	text:      'Column Visibility',
                        	titleAttr: 'Col visibility',
                        	className: 'mr-sm-3'
                        },*/
                        {
                            extend: 'pdfHtml5',
                            text: 'PDF',
                            titleAttr: 'Generate PDF',
                            className: 'btn-outline-danger btn-sm mr-1'
                        },
                        {
                            extend: 'excelHtml5',
                            text: 'Excel',
                            titleAttr: 'Generate Excel',
                            className: 'btn-outline-success btn-sm mr-1'
                        },
                        {
                            extend: 'csvHtml5',
                            text: 'CSV',
                            titleAttr: 'Generate CSV',
                            className: 'btn-outline-primary btn-sm mr-1'
                        },
                        {
                            extend: 'copyHtml5',
                            text: 'Copy',
                            titleAttr: 'Copy to clipboard',
                            className: 'btn-outline-primary btn-sm mr-1'
                        },
                        {
                            extend: 'print',
                            text: 'Print',
                            titleAttr: 'Print Table',
                            className: 'btn-outline-primary btn-sm'
                        }
                    ]
                });
</script>    




