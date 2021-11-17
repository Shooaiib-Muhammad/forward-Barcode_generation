<?php $this->load->view('includes/new_header'); ?>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
                <?php

                $this->load->view('includes/new_aside.php');
                ?>
                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                     <?php

                $this->load->view('includes/top_header.php');
                //print_r($title);
                 $this->load->model('Machine_model', 'model');
                 $machinename=$machinename;
                $DepartmetnName=$DeptName;
                $SecName=$SecName;
                $DMID=$DMID;
                $SecID=$SectionID;
                ?>
                    <!-- END Page Header -->
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/main/dmms_dashboard') ?>">Dashboard</a></li>
                        
                          <li class="breadcrumb-item"><a href="<?php echo base_url("index.php/Sections/Dept_Sections/$DeptID") ?>"><?php Echo  $DepartmetnName;?></a></li>
                             <li class="breadcrumb-item"><a href="<?php echo base_url("index.php/machines/machinebysections/$SecID") ?>"><?php Echo  $SecName;?></a></li>
                              <li class="breadcrumb-item active"><a href="javascript:void(0);"><?php Echo  $machinename;?></a></li>
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                        </ol>
                        <div class="subheader">
                            <h1 class="subheader-title">
                                
                                   <i class='subheader-icon fal fa-chart-area'></i> <?php Echo  $machinename?></span>
                            </h1>
                            
                            
                        </div>

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

 <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
    <?php endif ?>
     <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <!--Basic alerts-->
    <div id="panel-1" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            Add  <span class="fw-300"><i>New Schedule</i></span>
                                        </h2>
                                        <div class="panel-toolbar">
                                            <!-- <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button> -->
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                            <form action="<?php echo base_url("index.php/schedules/newschedule") ?>" method="post">
                                            <div class="row">
                                             <div class="col-md-4">
<div class="form-group">
                            <lable class="form-control-label" for="duration">Duration :</lable>
                            
                            <select class="form-control" name="duration" id="duration">
                             <option value="">Select Duration :</option>
                                <?php foreach($durations as $k => $v): ?>
                                    <option value="<?php echo $v->DID ?>"> <?php echo $v->DurName ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        
                        </div>
                        <div class="col-md-3">
<div class="form-group">
                            <lable class="form-control-label" for="Parameter">Parameter :</lable>
                            <select class="form-control params" name="ParamName" id="Parameter">
                                
                            </select>
                        </div>
                        
                        </div>
                        <div class="col-md-4">

                        
                        </div>
                       <div class="col-md-4">
                       <label >Schedule Date</label>
                        <div class="form-group">
                            
                            <input name="date" id="date" class="form-control" type="date">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label >Description</label>
                            <input name="description" id="description" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-md-4">
                    <label for="status">Status</label>
                    <div class="onoffswitch">
                     
   
<div class="custom-control custom-switch">
                                                                <input type="checkbox" name="status" class="custom-control-input" id="customSwitch1" checked>
                                                                <label class="custom-control-label" for="customSwitch1"></label>
                                                            </div>
</div>
</div>

                   <input type="hidden" name="department" value="<?php echo $DeptID; ?>"></input>
                   <input type="hidden" name="section" value="<?php echo $SectionID; ?>"></input>
                   <input type="hidden" name="MID" value="<?php echo $MID; ?>"></input>
                    <input type="hidden" name="machine" value="<?php echo $DMID; ?>"></input>
                       
                      
                         <div class="col-md-12">
                       <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
 </div>
 </div>
 <div class="col-md-6 col-xl-6">
                                <!--Basic alerts-->
    <div id="panel-1" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            Add  <span class="fw-300"><i>New Parameter</i></span>
                                        </h2>
                                        <div class="panel-toolbar">
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                             <form action="<?php echo base_url("index.php/Parameters/AddNew") ?>" method="post">
                                             <div class="row">
      <div class="col-md-4">
                        <div class="form-group">
                            <lable class="form-control-label" for="name">Parameter:</lable>
                            <input class="form-control" name="name" id="name">
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                            <lable class="form-control-label" for="duration">Duration :</lable>
                            <select class="form-control" name="duration" >
                           
                                <?php foreach($durations as $k => $v): ?>
                                    <option value="<?php echo $v->DID ?>"> <?php echo $v->DurName ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
<input type="hidden" name="MID" value="<?php echo $MID; ?>"></input>
<input type="hidden" name="DMID" id="DMID" value="<?php echo $DMID; ?>"></input>
 <input type="hidden" name="department" value="<?php echo $DeptID; ?>"></input>
                   <input type="hidden" name="section" id="SECID" value="<?php echo $SectionID; ?>"></input>
                   
                    <div class="col-md-4">
                      </br>
                     <button type="submit" class="btn btn-success btn-sm">Add New Parameter</button>
                     </div>
                     </form>
                     <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                                <thead >
            <tr>
                <th>Duration</th>
                <th>Peremetere</th>
                <th>Status</th>
               <th>Action</th>
            </tr>
        </thead>
        <tbody>
     
            <?php foreach($peremerters as $key => $f){

?>
<tr>
 <form action="<?php echo base_url("index.php/Parameters/updatepere") ?>" method="post">
                <td><?php echo $f->DurName ?> </td>
                 <td><input type="text" class="form-control" name="ParamName" value="<?php echo $f->ParamName ?>">
                 <input type="hidden" class="form-control" name="ParamID" value="<?php echo $f->ParamID ?>">
                 <input type="hidden" class="form-control" name="Machine" value="<?php echo $MID ?>"></td>
                 <input type="hidden" class="form-control" name="DMID" value="<?php echo $DMID ?>"></td>
                 
                 <td><?php
            $Status=$f->PStatus;
            $ParamID=$f->ParamID;
              $Status;
    
if($Status==1){
               
                 ?>
                
<div class="custom-control custom-switch">
                                                                <input type="checkbox" name="onoffswitch" class="custom-control-input" id="customSwitch<?php Echo $ParamID ?>" checked>
                                                                <label class="custom-control-label" for="customSwitch<?php Echo $ParamID ?>"></label>
                                                            </div>
                 <?php

             }else{
                
                 ?>
                 <div class="custom-control custom-switch">
                                                                <input type="checkbox" name="onoffswitch" class="custom-control-input" id="customSwitch<?php Echo $ParamID ?>" checked>
                                                                <label class="custom-control-label" for="customSwitch<?php Echo $ParamID ?>"></label>
                                                            </div>

                 <?php
             }
             ?></td>
                <td> <button type="submit" class="btn btn-primary btn-sm">Update</button></td>
                </form>
            </tr>
<?php
            }
          ?>
            </tbody>
            </table>
                                        </div>
                                    </div>
                                </div>
                                </div>
 </div>
 </div>
 <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <!--Basic alerts-->
    <div id="panel-1" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            View <span class="fw-300"><i>Schedule</i></span>
                                        </h2>
                                        <div class="panel-toolbar">
                                            <!-- <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button> -->
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                            <form action="<?php echo base_url("index.php/schedules/newschedule") ?>" method="post">
                                            <div class="row">
                                             
                       
                       
     <div class="col-md-4">
                       <label >Start Date :</label>
                        <div class="form-group-inline">
                            
                            <input name="date" id="date1" class="form-control" type="date">
                        </div>
                    </div>
                    <div class="col-md-4">
                       <label >End Date</label>
                        <div class="form-group-inline">
                            
                            <input name="date" id="date2" class="form-control" type="date">
                        </div>
                    </div>
                     <div class="col-md-4">
                       <label style="background-color: #fff; color: #fff;" >Schedule End Date</label>
                        <div class="form-group-inline">
                            
                             <button class="btn btn-primary" id="searchdata" >Search</button>
                        </div>
                    </div>
                      
</div>
<div class="row">
                    <div class="col-md-12">
                 <div id="Data">
                   </div>
  </div>

                  
                                        </div>
                                    </div>
                                </div>
                                </div>
 </div>
 </div>
 

          <div class="col-lg-12" style="margin-bottom:20px" >
        
         
         </div>
<?php $this->load->view('includes/scripts') ?>
<script>

  $('#searchdata').click(function(e){
//alert('heloo');
e.preventDefault();
  var Date1 =  $('#date1').val();
  var Date2= $('#date2').val();
  var DMID1= $('#DMID').val();
   // alert(Date1);
   // alert(Date2);
   // alert(DMID1);
   url = '<?php echo base_url('index.php/schedules/data/') ?>' + Date1 + "/" + Date2 + "/" + DMID1
//alert(url);
   $.get(url, function(data) {
//alert(data);
     $("#Data").html(data)
 });
        
      });

       $("select[name=duration]").change(function() {

            loadParams()
        });
        function loadParams(){
         //alert("heloo");
            var SECID = $("input[id='SECID']").val()
            var DurID = $("select[name='duration']").val()
          //alert(SECID);
          // alert(DurID);
            url = "<?php echo base_url("index.php/parameters/json_by_machine/") ?>" + SECID + "/" + DurID
//alert(url);
            $.get(url, function(data){
                // html = ""
                // for(let i = 0; i < data.length; i++){
                //     html += "<option value="+ data[i].ParamID +">" + data[i].ParamName +" </option>"
                // }

                // $("#params").html(html)


                 html = '<option value="">Select a Peremeters</option>'
                for (let index = 0; index < data.length; index++) {
                    const element = data[index];
                    html += "<option value='"
                    html += element.ParamID
                    html += "' "
                    html += " >"
                    html += element.ParamName
                    html += "</option>"
                    // html += '<option value="'+element.SecID+'" >'+element.SecName+'</option>'
                }
console.log(html);
                $("#Parameter").html(html)
            })
        }


        $("select[name=duration1]").change(function() {

loadParams1()
});
function loadParams1(){
//alert("heloo");
 var SECID = $("input[id='SECID']").val()
            var DurID = $("select[name='duration1']").val()
// Echoalert(MID);
// alert("Machine Id",MID);
  url = "<?php echo base_url("index.php/parameters/json_by_machine/") ?>" + SECID + "/" + DurID
//alert(url);
$.get(url, function(data){
 
     html = '<option value="">Select a Peremeters</option>'
    for (let index = 0; index < data.length; index++) {
        const element = data[index];
        html += "<option value='"
        html += element.ParamID
        html += "' "
        html += " >"
        html += element.ParamName
        html += "</option>"
        // html += '<option value="'+element.SecID+'" >'+element.SecName+'</option>'
    }
console.log(html);
    $("#Parameter1").html(html)
})
}
    $(document).ready(() => {
let today = new Date();
let yesterday = new Date();

yesterday.setDate(today.getDate() - 1);

    document.getElementById('date').valueAsDate =new Date();

          let current = new Date();
     current.setMonth(current.getMonth()-1);
   let next = new Date();
     next.setMonth(next.getMonth()+1);
     document.getElementById('date1').valueAsDate = new Date();
      document.getElementById('date2').valueAsDate = new Date();
    var DMID= $('#DMID').val();
         var Date1 =  $('#date1').val();
  var Date2= $('#date2').val();
//   // //  console.log(Date1);
  url = '<?php echo base_url('index.php/schedules/data/') ?>' + Date1 + "/" + Date2 + "/" + DMID
    //alert(url);
  $.get(url, function(data) {
 //alert(data);
     $("#Data").html(data)
 });
      
     
       
    });
</script>

<!-- <script>
    $(document).ready(function(){



 $('#search').on('click', function(event){
 
 
    var sdate = new Date($('#from_date').val());
  let month = $("#month_date").val();
  let split_it = month.split("-");

  let joined_date_string = split_it[0] + " " + split_it[1] + "," + split_it[2];

  console.log("month", getMonthFromStringNumber(joined_date_string));

  var currentMonth =  getMonthFromStringNumber(joined_date_string);

  let sday = sdate.getDate();
  let smonth = sdate.getMonth() + 1;
  let syear = sdate.getFullYear();
 let startdate=[syear,smonth,sday].join('/');

  let dept=$("input[name=department]").val()
  let section= $("input[name=section]").val()
  let DMID = $("input[name=DMID]").val()
  let DurID = $("select[name='duration1']").val()
  let PID = $("select[name='ParamName1']").val()
/*   let data={sday,smonth,dept,section}; */
  
  let url = "<?php echo base_url("index.php/ChartController/json_data/") ?>";
  $.ajax({
        url : url,
        type : "POST",
        dataType : "json",
        data : {"month" : currentMonth,"year":split_it[2], "dept":dept,"section":section,"DMID":DMID, "DurID":DurID, "PID":PID },
        success : function(data) {
         
         console.log("Called Function");
          generate_calendar(currentMonth,data,split_it[1]);
         
        },
        error : function(data) {
            console.log(data);
        }
    });
    event.preventDefault();
});

$('#forward').on('click', function(event){
   
   
  console.log($('#from_date').val());
    var sdate = new Date($('#from_date').val());
  let month = $("#month_date").val();
  let split_it = month.split("-");

  let joined_date_string = split_it[0] + " " + split_it[1] + "," + split_it[2];

  console.log("Forward month", getMonthFromString(joined_date_string));
  let forward_month = getMonthFromString(joined_date_string);
 
  var monthNames = ["Jan", "Feb", "Mar", "Apr", "May","Jun","Jul", "Aug", "Sep", "Oct", "Nov","Dec"];

  if(forward_month + 1 <= 13){
    
    var month_get = monthNames[ forward_month -1];
  }else{
    forward_month =1;
    split_it[2] = parseInt(split_it[2]) +1;
    month_get = monthNames[0];
  }
 


  $("#month_date_to_show").val(month_get + " ," + split_it[2]);
  month_get = month_get + "-" + split_it[1] + "-" + split_it[2];
  $("#month_date").val(month_get);
  let DMID = $("input[name=DMID]").val()
 
 
  console.log("Forward Month", forward_month);
  var sday = sdate.getDate();
  var smonth = sdate.getMonth() + 1;
  var syear = sdate.getFullYear();
 var startdate=[syear,smonth,sday].join('/');

 let dept1=$("input[name=department]").val()
  let section1= $("input[name=section]").val()
  let DurID = $("select[name='duration1']").val()
  let PID = $("select[name='ParamName1']").val()

/*   var data={sday,smonth,dept,section}; */
  var url = "<?php echo base_url("index.php/ChartController/json_data/") ?>";
  $.ajax({
        url : url,
        type : "POST",
        dataType : "json",
        data : {"month" : forward_month,"year":split_it[2], "dept":dept1,"section":section1,"DMID":DMID, "DurID":DurID, "PID":PID },
        success : function(data) {
         
          generate_calendar(forward_month,data,split_it[1]);
         
        },
        error : function(data) {
            console.log(data);
        }
    });
    event.preventDefault();
});

$('#backward').on('click', function(event){
    event.preventDefault();

    var sdate = new Date($('#from_date').val());
  let month = $("#month_date").val();
  let split_it = month.split("-");

  let joined_date_string = split_it[0] + " " + split_it[1] + "," + split_it[2];

  console.log("Backward month", getMonthFromStringBackward(joined_date_string));
  back_month = getMonthFromStringBackward(joined_date_string);
  var monthNames = ["Jan", "Feb", "Mar", "Apr", "May","Jun","Jul", "Aug", "Sep", "Oct", "Nov","Dec"];

  if(back_month >= 1){
    var month_get = monthNames[  back_month-1 ];
  }else{
    back_month = 12;
   split_it[2] -= 1; 
    month_get = monthNames[  11 ];
  }
 
  $("#month_date_to_show").val(month_get + " ," + split_it[2]);
  month_get = month_get + "-" + split_it[1] + "-" + split_it[2];
  $("#month_date").val(month_get);


  var sday = sdate.getDate();
  var smonth = sdate.getMonth() + 1;
  var syear = sdate.getFullYear();
 var startdate=[syear,smonth,sday].join('/');

 let dept1=$("input[name=department]").val()
  let section1= $("input[name=section]").val()
let DMID = $("input[name=DMID]").val()
let DurID = $("select[name='duration1']").val()
  let PID = $("select[name='ParamName1']").val()
 /*  var data={sday,smonth,dept,section,DMID}; */
  console.log("Backward Month", back_month);
  var url = "<?php echo base_url("index.php/ChartController/json_data/") ?>";
  $.ajax({
        url : url,
        type : "POST",
        dataType : "json",
        data : {"month" : back_month,"year":split_it[2], "dept":dept1,"section":section1,"DMID":DMID, "DurID":DurID, "PID":PID },
        success : function(data) {
         
         
          generate_calendar(back_month,data,split_it[1]);
         
        },
        error : function(data) {
            console.log(data);
        }
    });
});
function getMonthFromString(mon){
   return new Date(Date.parse(mon)).getMonth()+2
}
function getMonthFromStringNumber(mon){
   return new Date(Date.parse(mon)).getMonth()+1
}
function getMonthFromStringBackward(mon){
   return new Date(Date.parse(mon)).getMonth()
}

function generate_calendar(month_number,data,sdate){
  $(".example").empty();
  $("#headDate").empty();
  let base =  window.location.origin;
  
var host = window.location.host;

  console.log(month_number,data ,base, host);

    const month = sdate.toLocaleString('default', { month: 'long' });
    console.log(typeof month);
    console.log(month);

 $("#headDate").attr('style','display:none;padding-top:10px;padding-bottom:10px;background-color:black;color:white;');
 $("#headDate").append(`<b style="margin-left:50%;">${month}</b>`);



    if(month_number=='01'){
      console.log(month_number);
           var count=0;
           var count1 = 1;

         for(let i=0; i<31;i++){ 
          if(data[count] == undefined){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);    
            count1++;
          }
       else{
          var sdate=data[count].SDate;
         
        let date=sdate.split('-');
       let date_number=date[2];
           if(i+1==date_number){
            if(data[count].DurName=='Yearly'){
                if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
             }
           else if(data[count].DurName=='3 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
           }  else if(data[count].DurName=='Monthly '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
         else{
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
           }
            else{
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);
           count1++;
          }
          }
         }
        }
          else if( month_number=='02'){
            console.log(month_number);
           var count=0;
           var count1 = 1;

         for(let i=0; i<28;i++){ 
           if(data[count] == undefined){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);    
            count1++;
          }
           else{
         var sdate=data[count].SDate;
        let date=sdate.split('-');
       let date_number=date[2];
       if(i+1==date_number){
        if(data[count].DurName=='Yearly'){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
             }
           else if(data[count].DurName=='3 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
           }  else if(data[count].DurName=='Monthly '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
         else{
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
           }
        }
            else{
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);
           count1++;
          
          }
         }
        }
    }else if( month_number=='03')
          {
            console.log(month_number);
           var count=0;
           var count1 = 1;

         for(let i=0; i<31;i++){ 
          if(data[count] == undefined){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);    
            count1++;
          }else{
         var sdate=data[count].SDate;
        let date=sdate.split('-');
       let date_number=date[2];
       if(i+1==date_number){
        if(data[count].DurName=='Yearly'){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
             }
           else if(data[count].DurName=='3 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
           }  else if(data[count].DurName=='Monthly '){
           
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
         else{
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
           }
            else{
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);
           count1++;
          }
          }
         }} else if( month_number=='04'){
           
           console.log(month_number);
           var count=0;
           var count1 = 1;

         for(let i=0; i<30;i++){ 
          if(data[count] == undefined){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);    
            count1++;
          }
       else{
         var sdate=data[count].SDate;
        let date=sdate.split('-');
       let date_number=date[2];
       if(i+1==date_number){
             if(data[count].DurName=='Yearly'){
                if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
             }
           else if(data[count].DurName=='3 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
           }  else if(data[count].DurName=='Monthly '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
         else{
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
           }
            else{
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);
           count1++;
          }
           }

       }
      }
       else if( month_number=='05')
          {
            console.log(month_number);
           var count=0;
           var count1 = 1;

         for(let i=0; i<31;i++){ 
          if(data[count] == undefined){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);    
            count1++;
          }
       else{
         var sdate=data[count].SDate;
        let date=sdate.split('-');
       let date_number=date[2];
       if(i+1==date_number){
        if(data[count].DurName=='Yearly'){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
             }
           else if(data[count].DurName=='3 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
           }  else if(data[count].DurName=='Monthly '){
           
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
         else{
          console.log(data[count].MachineName);
          if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
           }
            else{
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);
           count1++;
          }
          }
         }
        }
         else if( month_number=='06'){
            console.log(month_number);
           var count=0;
           var count1 = 1;

         for(let i=0; i<30;i++){ 
          if(data[count] == undefined){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);    
            count1++;
          }
       else{
         var sdate=data[count].SDate;
        let date=sdate.split('-');
       let date_number=date[2];
       if(i+1==date_number){
        if(data[count].DurName=='Yearly'){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
             }
           else if(data[count].DurName=='3 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
           }  else if(data[count].DurName=='Monthly '){
           
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
         else{
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
           }
            else{
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);
           count1++;
          }
          }
         } 
        }
         else if( month_number=='07')
          {
            console.log(month_number);
           var count=0;
           var count1 = 1;

         for(let i=0; i<31;i++){ 
          if(data[count] == undefined){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);    
            count1++;
          }
       else{
         var sdate=data[count].SDate;
        let date=sdate.split('-');
       let date_number=date[2];
       if(i+1==date_number){
        if(data[count].DurName=='Yearly'){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
             }
           else if(data[count].DurName=='3 Months '){
           
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
           }  else if(data[count].DurName=='Monthly '){
           
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
         else{
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
           }
            else{
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);
           count1++;
          }
          }
        }
      }
        else if( month_number=='08'){
            console.log(month_number);
           var count=0;
           var count1 = 1;

         for(let i=0; i<31;i++){ 
          if(data[count] == undefined){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);    
            count1++;
          }
       else{
         var sdate=data[count].SDate;
        let date=sdate.split('-');
       let date_number=date[2];
       if(i+1==date_number){
        if(data[count].DurName=='Yearly'){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
             }
           else if(data[count].DurName=='3 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
           }  else if(data[count].DurName=='Monthly '){
           
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
         else{
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
           }
            else{
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);
           count1++;
          }
          }
         }
        }
         else if( month_number=='09'){
            console.log(month_number);
           var count=0;
           var count1 = 1;

         for(let i=0; i<30;i++){ 
          if(data[count] == undefined){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);    
            count1++;
          }
       else{
         var sdate=data[count].SDate;
        let date=sdate.split('-');
       let date_number=date[2];
       if(i+1==date_number){
        if(data[count].DurName=='Yearly'){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
             }
           else if(data[count].DurName=='3 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
           }  else if(data[count].DurName=='Monthly '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
         else{
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
           }
            else{
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);
           count1++;
          }
          }
        }  
      }
        else if( month_number=='10'){
            console.log(month_number);
           var count=0;
           var count1 = 1;

         for(let i=0; i<31;i++){ 
          if(data[count] == undefined){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);    
            count1++;
          }
       else{
         var sdate=data[count].SDate;
        let date=sdate.split('-');
       let date_number=date[2];
       if(i+1==date_number){
        if(data[count].DurName=='Yearly'){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
             }
           else if(data[count].DurName=='3 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
           }  else if(data[count].DurName=='Monthly '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
         else{
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
           }
            else{
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);
           count1++;
          }
          }
        }
      }
        else if( month_number=='11'){
            console.log(month_number);
           var count=0;
           var count1 = 1;

         for(let i=0; i<30;i++){ 
          if(data[count] == undefined){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);    
            count1++;
          }
       else{
         var sdate=data[count].SDate;
        let date=sdate.split('-');
       let date_number=date[2];
       if(i+1==date_number){
        if(data[count].DurName=='Yearly'){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
             }
           else if(data[count].DurName=='3 Months '){
           
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
           }  else if(data[count].DurName=='Monthly '){
           
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
         else{
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
           }
            else{
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);
           count1++;
          }
          }
        }
      }
        else if( month_number=='12'){
            console.log(month_number);
           var count=0;
           var count1 = 1;

         for(let i=0; i<31;i++){ 
          if(data[count] == undefined){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);    
            count1++;
          }
       else{
         var sdate=data[count].SDate;
        let date=sdate.split('-');
       let date_number=date[2];
       if(i+1==date_number){
        if(data[count].DurName=='Yearly'){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
             }
           else if(data[count].DurName=='3 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
           }  else if(data[count].DurName=='Monthly '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
         else{
            if(data[count].WorkStatus==1){
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/getworking/${data[count].SID}')?>" class="btn bg-info"><i class="fa fa-eye"></i></a></div></div></div>`);
          }else{
            $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><label>Parameter: ${data[count].ParamName}</label> <a href="<?php echo base_url('index.php/schedules/view/${data[count].SID}')?>" class="btn border border-dark bg-light"><i class=" fa fa-clock" style="color:black"></i> &nbsp;<b>pending...</b></a></div></div></div>`);
          }
      
           count++;
           count1++;
         }
           }
            else{
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product' ><div class='imgbox   h1 text-center'>${ count1 }</div></div></div>`);
           count1++;
          }
          }
         }


}
}
$("#department").on("change",function(){
    loadSections();
})
        
        function loadSections(){
            var deptId = $("select[name=department]").val()
            var url = "<?php echo base_url("index.php/sections/json_sections/") ?>" + deptId;
            var section = $("#sectionID").val()

            console.log(section ? "selected" : "not selected")
            $.get(url, function(data){
                
                html = '<option value="">Select a Section</option>'
                for (let index = 0; index < data.length; index++) {
                    const element = data[index];
                    html += "<option value='"
                    html += element.SecID
                    html += "' "
                    html += section && section == element.SecID ? "selected" : ""
                    html += " >"
                    html += element.SecName
                    html += "</option>"
                    // html += '<option value="'+element.SecID+'" >'+element.SecName+'</option>'
                }

                $("select[name=section]").html(html)

            })
        }
      $('.dtp').datetimepicker();

      var Calendar = $('#calendar').Calendar();
      Calendar.init();
      console.log(Calendar);

      var eventsDB = new PouchDB('events');

      function UUID4(){
        function S4() {
          return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
        }
        return (S4() + S4() + "-" + S4() + "-4" + S4().substr(0,3) + "-" + S4() + "-" + S4() + S4() + S4()).toLowerCase();
      }

      /**
       * GET
       */
      eventsDB.allDocs({
        include_docs: true
      }).then(function(result){
        var events = [];
        for (var i=0; i<result.rows.length; i++){
          events.push({
            _id: result.rows[i].doc._id,
            _rev: result.rows[i].doc._rev,
            start: result.rows[i].doc.start,
            end: result.rows[i].doc.end,
            title: result.rows[i].doc.title,
            content: result.rows[i].doc.content,
            category: result.rows[i].doc.category
          });
        }
        Calendar.addEvents(events);
        Calendar.init();
      }).catch(function (err){
        console.error(err);
      });

      /**
       * CREATE
       */
      function putdata(chart_data){
          console.log(chart_data);
     
           var e = {
          _id: UUID4(),
          start: chart_data[0].SDate,
          end: chart_data[0].SDate,
          title: chart_data[0].MachineName,
          content: chart_data[0].ParamName,
          category: chart_data[0].SecName
        };
        eventsDB.put(e).then(function(response){
          e._rev = response.rev;
          Calendar.addEvents(e);
          Calendar.init();
          $('#modal-create').modal('hide');
        }).catch(function(err){
          console.error(err);
        });
       
  

      }
  
      /**
       * UPDATE and DELETE event : replace the default modal by our modal (#modal-update)
       */
      $('#calendar').unbind('Calendar.event-click').on('Calendar.event-click', function(event, instance, elem, evt){
        $('#form-update').find('._id').val(evt._id);
        $('#form-update').find('._rev').val(evt._rev);
        $('#form-update').find('.start').data("DateTimePicker").date(moment.unix(evt.start));
        $('#form-update').find('.end').data("DateTimePicker").date(moment.unix(evt.end));
        $('#form-update').find('.title').val(evt.title);
        $('#form-update').find('.content').val(evt.content.replace(/<br>/g, '\n'));
        $('#form-update').find('.category').val(evt.category);
        $('#modal-update').modal('show');
      });

      /**
       * UPDATE
       */
      $('#form-update').on('submit', function(event){
        event.preventDefault();
        var form = $(event.target);
        var e = {
          _id: form.find('._id').val(),
          _rev: form.find('._rev').val(),
          start: form.find('.start').data("DateTimePicker").date().unix(),
          end: form.find('.end').data("DateTimePicker").date().unix(),
          title: form.find('.title').val(),
          content: form.find('.content').val().replace(/\n/g, '<br>'),
          category: form.find('.category').val()
        };
        eventsDB.put(e).then(function(response){
          var events = Calendar.getEvents();
          for (var i=0; i<events.length; i++){
            if (events[i]._id == e._id){
              events[i]._rev = response.rev;
              events[i].start = e.start;
              events[i].end = e.end;
              events[i].title = e.title;
              events[i].content = e.content;
              events[i].category = e.category;
            }
          }
          Calendar.init();
          $('#modal-update').modal('hide');
        }).catch(function(err){
          console.error(err);
        });
      });

      /**
       * DELETE
       */
      $('#form-update').find('.delete').click(function(){
        var form = $('#form-update');
        eventsDB.remove(form.find('._id').val(), form.find('._rev').val()).then(function(response){
          var events = Calendar.getEvents();
          for (var i=0; i<events.length; i++){
            if (events[i]._id == response.id){
              events.splice(i, 1);
            }
          }
          Calendar.init();
          $('#modal-update').modal('hide');
        }).catch(function(err){
          console.error(err);
        });
      });

      /**
       * Random event
       */
      $('#random').click(function(){
        $(this).attr("disabled", true);
        var titles = [
          'A New Hope',
          'The Empire Strikes Back',
          'Return of the Jedi',
          'The Phantom Menace',
          'Attack of the Clones',
          'Revenge of the Sith',
          'The Force Awakens',
          'The Last Jedi',
          'Darth Vader',
          'Obi-Wan Kenobi',
          'Luke Skywalker',
          'Han Solo',
          'Princess Leia'
        ];
        var contents = [
          'It is a period of civil war. Rebel spaceships, striking from a hidden base, have won their first victory against the evil Galactic Empire. During the battle, Rebel spies managed to steal secret plans to the Empire’s ultimate weapon, the DEATH STAR, an armored space station with enough power to destroy an entire planet.',
          'Pursued by the Empire’s sinister agents, Princess Leia races home aboard her starship, custodian of the stolen plans that can save her people and restore freedom to the galaxy…',
          'It is a dark time for the Rebellion. Although the Death Star has been destroyed, Imperial troops have driven the Rebel forces from their hidden base and pursued them across the galaxy.',
          'Evading the dreaded Imperial Starfleet, a group of freedom fighters led by Luke Skywalker has established a new secret base on the remote ice world of Hoth.',
          'The evil lord Darth Vader, obsessed with finding young Skywalker, has dispatched thousands of remote probes into the far reaches of space….',
          'Luke Skywalker has returned to his home planet of Tatooine in an attempt to rescue his friend Han Solo from the clutches of the vile gangster Jabba the Hutt.',
          'Little does Luke know that the GALACTIC EMPIRE has secretly begun construction on a new armored space station even more powerful than the first dreaded Death Star.',
          'When completed, this ultimate weapon will spell certain doom for the small band of rebels struggling to restore freedom to the galaxy...',
          'Turmoil has engulfed the Galactic Republic. The taxation of trade routes to outlying star systems is in dispute.',
          'Hoping to resolve the matter with a blockade of deadly battleships, the greedy Trade Federation has stopped all shipping to the small planet of Naboo.',
          'While the congress of the Republic endlessly debates this alarming chain of events, the Supreme Chancellor has secretly dispatched two Jedi Knights, the guardians of peace and justice in the galaxy, to settle the conflict....',
          'There is unrest in the Galactic Senate. Several thousand solar systems have declared their intentions to leave the Republic. This separatist movement, under the leadership of the mysterious Count Dooku, has made it difficult for the limited number of Jedi Knights to maintain peace and order in the galaxy.',
          'Senator Amidala, the former Queen of Naboo, is returning to the Galactic Senate to vote on the critical issue of creating an ARMY OF THE REPUBLIC to assist the overwhelmed Jedi....',
          'War! The Republic is crumbling under attacks by the ruthless Sith Lord, Count Dooku. There are heroes on both sides. Evil is everywhere. In a stunning move, the fiendish droid leader, General Grievous, has swept into the Republic capital and kidnapped Chancellor Palpatine, leader of the Galactic Senate.',
          'As the Separatist Droid Army attempts to flee the besieged capital with their valuable hostage, two Jedi Knights lead a desperate mission to rescue the captive Chancellor....'
        ];
        var categories = [
          'Alderaan',
          'Jedi',
          'Force',
          'Bespin',
          'Corellia',
          'Coruscant',
          'Dagobah',
          'Dantooine',
          'Dathomir',
          'Devaron',
          'Endor',
          'Géonosis',
          'Hoth',
          'Kamino',
          'Kashyyyk',
          'Kessel',
          'Mon Cala',
          'Mustafar',
          'Naboo',
          'Ryloth',
          'Tatooine',
          'Yavin IV'
        ];
        var interval = Calendar.getViewInterval();
        var min = interval[0];
        var max = interval[1] - (30 * 60);
        var from = parseInt(Math.random() * (max - min) + min);
        var to = parseInt(Math.random() * (parseInt(moment.unix(from).endOf('day').subtract(1, 'h').format('X')) - (from + 30 * 60)) + (from + 600));
        var title = titles[parseInt(Math.random() * (titles.length - 1))];
        var content = contents[parseInt(Math.random() * (contents.length - 1))];
        var category = categories[parseInt(Math.random() * (categories.length - 1))];
        var e = {
          _id: UUID4(),
          start: from,
          end: to,
          title: title,
          content: content,
          category: category
        };
        eventsDB.put(e).then(function(response){
          e._rev = response.rev;
          Calendar.addEvents(e);
          Calendar.init();
          $('#random').removeAttr("disabled");
        }).catch(function(err){
          console.error(err);
        });
      });
    });
  </script> -->
  
<script>
$('#tableExport').on('click',".btn-delete",function(e){

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

    $('.leave-id').click(function(e){
      
      leave = $(this)[0]
      if(leave.checked){
        leaves.indexOf(leave.value) === -1 ? leaves.push({'id':leave.value,'solution':$('#'+leave.value+"1" ).val(),'team':$('#'+leave.value+"2").val(),'remarks':$('#'+leave.value+"3").val(),'dmid':$('#'+leave.value+"4").val(),'status':$('#'+leave.value+"5").val()}) : null;
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
          $.post(url, data, function(data){

            //location.reload()
          }) 
        
      })

</script>    
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->
                    <footer class="page-footer" role="contentinfo">
                        <div class="d-flex align-items-center flex-1 text-muted">
                            <span class="hidden-md-down fw-700">2021 © DMMS by&nbsp;IT Dept Forward Sports</span>
                        </div>
                        <div>
                           
                        </div>
 </footer>
                    <!-- END Page Footer -->
                    <!-- BEGIN Shortcuts -->
                    <div class="modal fade modal-backdrop-transparent" id="modal-shortcut" tabindex="-1" role="dialog" aria-labelledby="modal-shortcut" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-top modal-transparent" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <ul class="app-list w-auto h-auto p-0 text-left">
                                        <li>
                                            <a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
                                                <div class="icon-stack">
                                                    <i class="base base-7 icon-stack-3x opacity-100 color-primary-500 "></i>
                                                    <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                                    <i class="fal fa-home icon-stack-1x opacity-100 color-white"></i>
                                                </div>
                                                <span class="app-list-name">
                                                    Home
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="page_inbox_general.html" class="app-list-item text-white border-0 m-0">
                                                <div class="icon-stack">
                                                    <i class="base base-7 icon-stack-3x opacity-100 color-success-500 "></i>
                                                    <i class="base base-7 icon-stack-2x opacity-100 color-success-300 "></i>
                                                    <i class="ni ni-envelope icon-stack-1x text-white"></i>
                                                </div>
                                                <span class="app-list-name">
                                                    Inbox
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
                                                <div class="icon-stack">
                                                    <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                                    <i class="fal fa-plus icon-stack-1x opacity-100 color-white"></i>
                                                </div>
                                                <span class="app-list-name">
                                                    Add More
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Shortcuts -->
                    <!-- BEGIN Color profile -->
                    <!-- this area is hidden and will not be seen on screens or screen readers -->
                    <!-- we use this only for CSS color refernce for JS stuff -->
                    <p id="js-color-profile" class="d-none">
                        <span class="color-primary-50"></span>
                        <span class="color-primary-100"></span>
                        <span class="color-primary-200"></span>
                        <span class="color-primary-300"></span>
                        <span class="color-primary-400"></span>
                        <span class="color-primary-500"></span>
                        <span class="color-primary-600"></span>
                        <span class="color-primary-700"></span>
                        <span class="color-primary-800"></span>
                        <span class="color-primary-900"></span>
                        <span class="color-info-50"></span>
                        <span class="color-info-100"></span>
                        <span class="color-info-200"></span>
                        <span class="color-info-300"></span>
                        <span class="color-info-400"></span>
                        <span class="color-info-500"></span>
                        <span class="color-info-600"></span>
                        <span class="color-info-700"></span>
                        <span class="color-info-800"></span>
                        <span class="color-info-900"></span>
                        <span class="color-danger-50"></span>
                        <span class="color-danger-100"></span>
                        <span class="color-danger-200"></span>
                        <span class="color-danger-300"></span>
                        <span class="color-danger-400"></span>
                        <span class="color-danger-500"></span>
                        <span class="color-danger-600"></span>
                        <span class="color-danger-700"></span>
                        <span class="color-danger-800"></span>
                        <span class="color-danger-900"></span>
                        <span class="color-warning-50"></span>
                        <span class="color-warning-100"></span>
                        <span class="color-warning-200"></span>
                        <span class="color-warning-300"></span>
                        <span class="color-warning-400"></span>
                        <span class="color-warning-500"></span>
                        <span class="color-warning-600"></span>
                        <span class="color-warning-700"></span>
                        <span class="color-warning-800"></span>
                        <span class="color-warning-900"></span>
                        <span class="color-success-50"></span>
                        <span class="color-success-100"></span>
                        <span class="color-success-200"></span>
                        <span class="color-success-300"></span>
                        <span class="color-success-400"></span>
                        <span class="color-success-500"></span>
                        <span class="color-success-600"></span>
                        <span class="color-success-700"></span>
                        <span class="color-success-800"></span>
                        <span class="color-success-900"></span>
                        <span class="color-fusion-50"></span>
                        <span class="color-fusion-100"></span>
                        <span class="color-fusion-200"></span>
                        <span class="color-fusion-300"></span>
                        <span class="color-fusion-400"></span>
                        <span class="color-fusion-500"></span>
                        <span class="color-fusion-600"></span>
                        <span class="color-fusion-700"></span>
                        <span class="color-fusion-800"></span>
                        <span class="color-fusion-900"></span>
                    </p>
                    <!-- END Color profile -->
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->
        <!-- BEGIN Quick Menu -->
        <!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
        <nav class="shortcut-menu d-none d-sm-block">
            <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
            <label for="menu_open" class="menu-open-button ">
                <span class="app-shortcut-icon d-block"></span>
            </label>
            <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
                <i class="fal fa-arrow-up"></i>
            </a>
            <a href="page_login_alt.html" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Logout">
                <i class="fal fa-sign-out"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="Full Screen">
                <i class="fal fa-expand"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-print" data-toggle="tooltip" data-placement="left" title="Print page">
                <i class="fal fa-print"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-voice" data-toggle="tooltip" data-placement="left" title="Voice command">
                <i class="fal fa-microphone"></i>
            </a>
        </nav>
        <!-- END Quick Menu -->
        <!-- BEGIN Messenger -->
        <div class="modal fade js-modal-messenger modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-right">
                <div class="modal-content h-100">
                    <div class="dropdown-header bg-trans-gradient d-flex align-items-center w-100">
                        <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                            <span class="mr-2">
                                <span class="rounded-circle profile-image d-block" style="background-image:url('img/demo/avatars/avatar-d.png'); background-size: cover;"></span>
                            </span>
                            <div class="info-card-text">
                                <a href="javascript:void(0);" class="fs-lg text-truncate text-truncate-lg text-white" data-toggle="dropdown" aria-expanded="false">
                                    Tracey Chang
                                    <i class="fal fa-angle-down d-inline-block ml-1 text-white fs-md"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Send Email</a>
                                    <a class="dropdown-item" href="#">Create Appointment</a>
                                    <a class="dropdown-item" href="#">Block User</a>
                                </div>
                                <span class="text-truncate text-truncate-md opacity-80">IT Director</span>
                            </div>
                        </div>
                        <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body p-0 h-100 d-flex">
                        <!-- BEGIN msgr-list -->
                        <div class="msgr-list d-flex flex-column bg-faded border-faded border-top-0 border-right-0 border-bottom-0 position-absolute pos-top pos-bottom">
                            <div>
                                <div class="height-4 width-3 h3 m-0 d-flex justify-content-center flex-column color-primary-500 pl-3 mt-2">
                                    <i class="fal fa-search"></i>
                                </div>
                                <input type="text" class="form-control bg-white" id="msgr_listfilter_input" placeholder="Filter contacts" aria-label="FriendSearch" data-listfilter="#js-msgr-listfilter">
                            </div>
                            <div class="flex-1 h-100 custom-scroll">
                                <div class="w-100">
                                    <ul id="js-msgr-listfilter" class="list-unstyled m-0">
                                        <li>
                                            <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="tracey chang online">
                                                <div class="d-table-cell align-middle status status-success status-sm ">
                                                    <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-d.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                                    <div class="text-truncate text-truncate-md">
                                                        Tracey Chang
                                                        <small class="d-block font-italic text-success fs-xs">
                                                            Online
                                                        </small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="oliver kopyuv online">
                                                <div class="d-table-cell align-middle status status-success status-sm ">
                                                    <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-b.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                                    <div class="text-truncate text-truncate-md">
                                                        Oliver Kopyuv
                                                        <small class="d-block font-italic text-success fs-xs">
                                                            Online
                                                        </small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="dr john cook phd away">
                                                <div class="d-table-cell align-middle status status-warning status-sm ">
                                                    <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-e.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                                    <div class="text-truncate text-truncate-md">
                                                        Dr. John Cook PhD
                                                        <small class="d-block font-italic fs-xs">
                                                            Away
                                                        </small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney online">
                                                <div class="d-table-cell align-middle status status-success status-sm ">
                                                    <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-g.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                                    <div class="text-truncate text-truncate-md">
                                                        Ali Amdaney
                                                        <small class="d-block font-italic fs-xs text-success">
                                                            Online
                                                        </small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="sarah mcbrook online">
                                                <div class="d-table-cell align-middle status status-success status-sm">
                                                    <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-h.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                                    <div class="text-truncate text-truncate-md">
                                                        Sarah McBrook
                                                        <small class="d-block font-italic fs-xs text-success">
                                                            Online
                                                        </small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney offline">
                                                <div class="d-table-cell align-middle status status-sm">
                                                    <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-a.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                                    <div class="text-truncate text-truncate-md">
                                                        oliver.kopyuv@gotbootstrap.com
                                                        <small class="d-block font-italic fs-xs">
                                                            Offline
                                                        </small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney busy">
                                                <div class="d-table-cell align-middle status status-danger status-sm">
                                                    <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-j.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                                    <div class="text-truncate text-truncate-md">
                                                        oliver.kopyuv@gotbootstrap.com
                                                        <small class="d-block font-italic fs-xs text-danger">
                                                            Busy
                                                        </small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney offline">
                                                <div class="d-table-cell align-middle status status-sm">
                                                    <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-c.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                                    <div class="text-truncate text-truncate-md">
                                                        oliver.kopyuv@gotbootstrap.com
                                                        <small class="d-block font-italic fs-xs">
                                                            Offline
                                                        </small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney inactive">
                                                <div class="d-table-cell align-middle">
                                                    <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-m.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                                    <div class="text-truncate text-truncate-md">
                                                        +714651347790
                                                        <small class="d-block font-italic fs-xs opacity-50">
                                                            Missed Call
                                                        </small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="filter-message js-filter-message"></div>
                                </div>
                            </div>
                            <div>
                                <a class="fs-xl d-flex align-items-center p-3">
                                    <i class="fal fa-cogs"></i>
                                </a>
                            </div>
                        </div>
                        <!-- END msgr-list -->
                        <!-- BEGIN msgr -->
                        <div class="msgr d-flex h-100 flex-column bg-white">
                            <!-- BEGIN custom-scroll -->
                            <div class="custom-scroll flex-1 h-100">
                                <div id="chat_container" class="w-100 p-4">
                                    <!-- start .chat-segment -->
                                    <div class="chat-segment">
                                        <div class="time-stamp text-center mb-2 fw-400">
                                            Jun 19
                                        </div>
                                    </div>
                                    <!--  end .chat-segment -->
                                    <!-- start .chat-segment -->
                                    <div class="chat-segment chat-segment-sent">
                                        <div class="chat-message">
                                            <p>
                                                Hey Tracey, did you get my files?
                                            </p>
                                        </div>
                                        <div class="text-right fw-300 text-muted mt-1 fs-xs">
                                            3:00 pm
                                        </div>
                                    </div>
                                    <!--  end .chat-segment -->
                                    <!-- start .chat-segment -->
                                    <div class="chat-segment chat-segment-get">
                                        <div class="chat-message">
                                            <p>
                                                Hi
                                            </p>
                                            <p>
                                                Sorry going through a busy time in office. Yes I analyzed the solution.
                                            </p>
                                            <p>
                                                It will require some resource, which I could not manage.
                                            </p>
                                        </div>
                                        <div class="fw-300 text-muted mt-1 fs-xs">
                                            3:24 pm
                                        </div>
                                    </div>
                                    <!--  end .chat-segment -->
                                    <!-- start .chat-segment -->
                                    <div class="chat-segment chat-segment-sent chat-start">
                                        <div class="chat-message">
                                            <p>
                                                Okay
                                            </p>
                                        </div>
                                    </div>
                                    <!--  end .chat-segment -->
                                    <!-- start .chat-segment -->
                                    <div class="chat-segment chat-segment-sent chat-end">
                                        <div class="chat-message">
                                            <p>
                                                Sending you some dough today, you can allocate the resources to this project.
                                            </p>
                                        </div>
                                        <div class="text-right fw-300 text-muted mt-1 fs-xs">
                                            3:26 pm
                                        </div>
                                    </div>
                                    <!--  end .chat-segment -->
                                    <!-- start .chat-segment -->
                                    <div class="chat-segment chat-segment-get chat-start">
                                        <div class="chat-message">
                                            <p>
                                                Perfect. Thanks a lot!
                                            </p>
                                        </div>
                                    </div>
                                    <!--  end .chat-segment -->
                                    <!-- start .chat-segment -->
                                    <div class="chat-segment chat-segment-get">
                                        <div class="chat-message">
                                            <p>
                                                I will have them ready by tonight.
                                            </p>
                                        </div>
                                    </div>
                                    <!--  end .chat-segment -->
                                    <!-- start .chat-segment -->
                                    <div class="chat-segment chat-segment-get chat-end">
                                        <div class="chat-message">
                                            <p>
                                                Cheers
                                            </p>
                                        </div>
                                    </div>
                                    <!--  end .chat-segment -->
                                    <!-- start .chat-segment for timestamp -->
                                    <div class="chat-segment">
                                        <div class="time-stamp text-center mb-2 fw-400">
                                            Jun 20
                                        </div>
                                    </div>
                                    <!--  end .chat-segment for timestamp -->
                                </div>
                            </div>
                            <!-- END custom-scroll  -->
                            <!-- BEGIN msgr__chatinput -->
                            <div class="d-flex flex-column">
                                <div class="border-faded border-right-0 border-bottom-0 border-left-0 flex-1 mr-3 ml-3 position-relative shadow-top">
                                    <div class="pt-3 pb-1 pr-0 pl-0 rounded-0" tabindex="-1">
                                        <div id="msgr_input" contenteditable="true" data-placeholder="Type your message here..." class="height-10 form-content-editable"></div>
                                    </div>
                                </div>
                                <div class="height-8 px-3 d-flex flex-row align-items-center flex-wrap flex-shrink-0">
                                    <a href="javascript:void(0);" class="btn btn-icon fs-xl width-1 mr-1" data-toggle="tooltip" data-original-title="More options" data-placement="top">
                                        <i class="fal fa-ellipsis-v-alt color-fusion-300"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Attach files" data-placement="top">
                                        <i class="fal fa-paperclip color-fusion-300"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Insert photo" data-placement="top">
                                        <i class="fal fa-camera color-fusion-300"></i>
                                    </a>
                                    <div class="ml-auto">
                                        <a href="javascript:void(0);" class="btn btn-info">Send</a>
                                    </div>
                                </div>
                            </div>
                            <!-- END msgr__chatinput -->
                        </div>
                        <!-- END msgr -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Messenger -->
        <!-- BEGIN Page Settings -->
        <div class="modal fade js-modal-settings modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-right modal-md">
                <div class="modal-content">
                    <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100">
                        <h4 class="m-0 text-center color-white">
                            Layout Settings
                            <small class="mb-0 opacity-80">User Interface Settings</small>
                        </h4>
                        <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="settings-panel">
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        App Layout
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="fh">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="header-function-fixed"></a>
                                <span class="onoffswitch-title">Fixed Header</span>
                                <span class="onoffswitch-title-desc">header is in a fixed at all times</span>
                            </div>
                            <div class="list" id="nff">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-fixed"></a>
                                <span class="onoffswitch-title">Fixed Navigation</span>
                                <span class="onoffswitch-title-desc">left panel is fixed</span>
                            </div>
                            <div class="list" id="nfm">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-minify"></a>
                                <span class="onoffswitch-title">Minify Navigation</span>
                                <span class="onoffswitch-title-desc">Skew nav to maximize space</span>
                            </div>
                            <div class="list" id="nfh">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-hidden"></a>
                                <span class="onoffswitch-title">Hide Navigation</span>
                                <span class="onoffswitch-title-desc">roll mouse on edge to reveal</span>
                            </div>
                            <div class="list" id="nft">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-top"></a>
                                <span class="onoffswitch-title">Top Navigation</span>
                                <span class="onoffswitch-title-desc">Relocate left pane to top</span>
                            </div>
                            <div class="list" id="mmb">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-main-boxed"></a>
                                <span class="onoffswitch-title">Boxed Layout</span>
                                <span class="onoffswitch-title-desc">Encapsulates to a container</span>
                            </div>
                            <div class="expanded">
                                <ul class="">
                                    <li>
                                        <div class="bg-fusion-50" data-action="toggle" data-class="mod-bg-1"></div>
                                    </li>
                                    <li>
                                        <div class="bg-warning-200" data-action="toggle" data-class="mod-bg-2"></div>
                                    </li>
                                    <li>
                                        <div class="bg-primary-200" data-action="toggle" data-class="mod-bg-3"></div>
                                    </li>
                                    <li>
                                        <div class="bg-success-300" data-action="toggle" data-class="mod-bg-4"></div>
                                    </li>
                                </ul>
                                <div class="list" id="mbgf">
                                    <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-fixed-bg"></a>
                                    <span class="onoffswitch-title">Fixed Background</span>
                                </div>
                            </div>
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Mobile Menu
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="nmp">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-push"></a>
                                <span class="onoffswitch-title">Push Content</span>
                                <span class="onoffswitch-title-desc">Content pushed on menu reveal</span>
                            </div>
                            <div class="list" id="nmno">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-no-overlay"></a>
                                <span class="onoffswitch-title">No Overlay</span>
                                <span class="onoffswitch-title-desc">Removes mesh on menu reveal</span>
                            </div>
                            <div class="list" id="sldo">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-slide-out"></a>
                                <span class="onoffswitch-title">Off-Canvas <sup>(beta)</sup></span>
                                <span class="onoffswitch-title-desc">Content overlaps menu</span>
                            </div>
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Accessibility
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="mbf">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-bigger-font"></a>
                                <span class="onoffswitch-title">Bigger Content Font</span>
                                <span class="onoffswitch-title-desc">content fonts are bigger for readability</span>
                            </div>
                            <div class="list" id="mhc">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-high-contrast"></a>
                                <span class="onoffswitch-title">High Contrast Text (WCAG 2 AA)</span>
                                <span class="onoffswitch-title-desc">4.5:1 text contrast ratio</span>
                            </div>
                            <div class="list" id="mcb">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-color-blind"></a>
                                <span class="onoffswitch-title">Daltonism <sup>(beta)</sup> </span>
                                <span class="onoffswitch-title-desc">color vision deficiency</span>
                            </div>
                            <div class="list" id="mpc">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-pace-custom"></a>
                                <span class="onoffswitch-title">Preloader Inside</span>
                                <span class="onoffswitch-title-desc">preloader will be inside content</span>
                            </div>
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Global Modifications
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="mcbg">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-clean-page-bg"></a>
                                <span class="onoffswitch-title">Clean Page Background</span>
                                <span class="onoffswitch-title-desc">adds more whitespace</span>
                            </div>
                            <div class="list" id="mhni">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-nav-icons"></a>
                                <span class="onoffswitch-title">Hide Navigation Icons</span>
                                <span class="onoffswitch-title-desc">invisible navigation icons</span>
                            </div>
                            <div class="list" id="dan">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-disable-animation"></a>
                                <span class="onoffswitch-title">Disable CSS Animation</span>
                                <span class="onoffswitch-title-desc">Disables CSS based animations</span>
                            </div>
                            <div class="list" id="mhic">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-info-card"></a>
                                <span class="onoffswitch-title">Hide Info Card</span>
                                <span class="onoffswitch-title-desc">Hides info card from left panel</span>
                            </div>
                            <div class="list" id="mlph">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-lean-subheader"></a>
                                <span class="onoffswitch-title">Lean Subheader</span>
                                <span class="onoffswitch-title-desc">distinguished page header</span>
                            </div>
                            <div class="list" id="mnl">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-nav-link"></a>
                                <span class="onoffswitch-title">Hierarchical Navigation</span>
                                <span class="onoffswitch-title-desc">Clear breakdown of nav links</span>
                            </div>
                            <div class="list mt-1">
                                <span class="onoffswitch-title">Global Font Size <small>(RESETS ON REFRESH)</small> </span>
                                <div class="btn-group btn-group-sm btn-group-toggle my-2" data-toggle="buttons">
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-sm" data-target="html">
                                        <input type="radio" name="changeFrontSize"> SM
                                    </label>
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text" data-target="html">
                                        <input type="radio" name="changeFrontSize" checked=""> MD
                                    </label>
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-lg" data-target="html">
                                        <input type="radio" name="changeFrontSize"> LG
                                    </label>
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-xl" data-target="html">
                                        <input type="radio" name="changeFrontSize"> XL
                                    </label>
                                </div>
                                <span class="onoffswitch-title-desc d-block mb-0">Change <strong>root</strong> font size to effect rem
                                    values</span>
                            </div>
                            <hr class="mb-0 mt-4">
                            <div class="mt-2 d-table w-100 pl-5 pr-3">
                                <div class="fs-xs text-muted p-2 alert alert-warning mt-3 mb-2">
                                    <i class="fal fa-exclamation-triangle text-warning mr-2"></i>The settings below uses localStorage to load
                                    the external CSS file as an overlap to the base css. Due to network latency and CPU utilization, you may
                                    experience a brief flickering effect on page load which may show the intial applied theme for a split
                                    second. Setting the prefered style/theme in the header will prevent this from happening.
                                </div>
                            </div>
                            <div class="mt-2 d-table w-100 pl-5 pr-3">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Theme colors
                                    </h5>
                                </div>
                            </div>
                            <div class="expanded theme-colors pl-5 pr-3">
                                <ul class="m-0">
                                    <li>
                                        <a href="#" id="myapp-0" data-action="theme-update" data-themesave data-theme="" data-toggle="tooltip" data-placement="top" title="Wisteria (base css)" data-original-title="Wisteria (base css)"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-1" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-1.css" data-toggle="tooltip" data-placement="top" title="Tapestry" data-original-title="Tapestry"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-2" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-2.css" data-toggle="tooltip" data-placement="top" title="Atlantis" data-original-title="Atlantis"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-3" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-3.css" data-toggle="tooltip" data-placement="top" title="Indigo" data-original-title="Indigo"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-4" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-4.css" data-toggle="tooltip" data-placement="top" title="Dodger Blue" data-original-title="Dodger Blue"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-5" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-5.css" data-toggle="tooltip" data-placement="top" title="Tradewind" data-original-title="Tradewind"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-6" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-6.css" data-toggle="tooltip" data-placement="top" title="Cranberry" data-original-title="Cranberry"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-7" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-7.css" data-toggle="tooltip" data-placement="top" title="Oslo Gray" data-original-title="Oslo Gray"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-8" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-8.css" data-toggle="tooltip" data-placement="top" title="Chetwode Blue" data-original-title="Chetwode Blue"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-9" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-9.css" data-toggle="tooltip" data-placement="top" title="Apricot" data-original-title="Apricot"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-10" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-10.css" data-toggle="tooltip" data-placement="top" title="Blue Smoke" data-original-title="Blue Smoke"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-11" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-11.css" data-toggle="tooltip" data-placement="top" title="Green Smoke" data-original-title="Green Smoke"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-12" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-12.css" data-toggle="tooltip" data-placement="top" title="Wild Blue Yonder" data-original-title="Wild Blue Yonder"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="myapp-13" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-13.css" data-toggle="tooltip" data-placement="top" title="Emerald" data-original-title="Emerald"></a>
                                    </li>
                                </ul>
                            </div>
                            <hr class="mb-0 mt-4">
                            <div class="pl-5 pr-3 py-3 bg-faded">
                                <div class="row no-gutters">
                                    <div class="col-6 pr-1">
                                        <a href="#" class="btn btn-outline-danger fw-500 btn-block" data-action="app-reset">Reset Settings</a>
                                    </div>
                                    <div class="col-6 pl-1">
                                        <a href="#" class="btn btn-danger fw-500 btn-block" data-action="factory-reset">Factory Reset</a>
                                    </div>
                                </div>
                            </div>
                        </div> <span id="saving"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Settings -->
        <!-- base vendor bundle: 
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations 
						+ pace.js (recommended)
						+ jquery.js (core)
						+ jquery-ui-cust.js (core)
						+ popper.js (core)
						+ bootstrap.js (core)
						+ slimscroll.js (extension)
						+ app.navigation.js (core)
						+ ba-throttle-debounce.js (core)
						+ waves.js (extension)
						+ smartpanels.js (extension)
						+ src/../jquery-snippets.js (core) -->
        <script src="<?php echo base_url();?>/assets/js/vendors.bundle.js"></script>
        <script src="<?php echo base_url();?>/assets/js/app.bundle.js"></script>
        <script type="text/javascript">
            /* Activate smart panels */
            $('#js-page-content').smartPanel();

        </script>
        <!-- The order of scripts is irrelevant. Please check out the plugin pages for more details about these plugins below: -->
        <script src="<?php echo base_url();?>/assets/js/statistics/peity/peity.bundle.js"></script>
        <script src="<?php echo base_url();?>/assets/js/statistics/flot/flot.bundle.js"></script>
        <script src="<?php echo base_url();?>/assets/js/statistics/easypiechart/easypiechart.bundle.js"></script>
        <script src="<?php echo base_url();?>/assets/js/datagrid/datatables/datatables.bundle.js"></script>
        <script src="<?php echo base_url();?>/js/datagrid/datatables/datatables.bundle.js"></script>
        <script>
            /* demo scripts for change table color */
            /* change background */


            $(document).ready(function()
            {
                $('#dt-basic-example').dataTable(
                {
                    responsive: true
                });

                $('.js-thead-colors a').on('click', function()
                {
                    var theadColor = $(this).attr("data-bg");
                    console.log(theadColor);
                    $('#dt-basic-example thead').removeClassPrefix('bg-').addClass(theadColor);
                });

                $('.js-tbody-colors a').on('click', function()
                {
                    var theadColor = $(this).attr("data-bg");
                    console.log(theadColor);
                    $('#dt-basic-example').removeClassPrefix('bg-').addClass(theadColor);
                });

            });

        </script>
        
    </body>
</html>

