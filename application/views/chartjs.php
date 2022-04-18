
    <?php
if(!($this->session->has_userdata('user_id'))){
  redirect('');
}else{
?>

<?PHP  $departments= $dept ?>
<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/sidebar') ?>
<?php $this->load->view('includes/contentstart') ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/moment@2.22.1/min/moment-with-locales.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-touchswipe@1.6.18/jquery.touchSwipe.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/eonasdan-bootstrap-datetimepicker@4.17.47/build/js/bootstrap-datetimepicker.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/arrobefr-jquery-calendar@1.0.12/dist/js/jquery-calendar.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/arrobefr-jquery-calendar@1.0.12/dist/css/jquery-calendar.min.css">
  <script src="https://cdn.jsdelivr.net/npm/pouchdb@6.4.3/dist/pouchdb.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>test</title>
  <title>Calendar</title>
  <style>
 @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
 @media (min-width: 1200px){

 
.col-lg-2 {
    width: 20%;
/*     margin-top: 10px !important; */
}
 }
body {
    margin: 0;
    padding: 0;
    font-family: 'Open Sans', serif;
    background: #efefe
}

.product {
    position: relative;
    /* top: 50%; */
    /* left: 50%; */
    /* transform: translate(-50%, -50%); */
    height: 130px;
    /* box-shadow: 0 20px 40px rgb(0 0 0 / 20%); */
     border: 1px solid #E7E9EB; 
    background: white;
    overflow: hidden;
}
.product .imgbox {
    height: 100%;
    box-sizing: border-box;
    color: black;
    margin-top: 6%;
    margin-left: 10px;
    text-align: left !important;
}


.h1, h1 {
    font-size: 13px;
    color: black !important;
}
.product .imgbox img {
    display: block;
    width: 80%;
    margin: 10px auto 0
}

.specifies {
    position: absolute;
    width: 100%;
    height:80px;
    background: #fff;
    padding: 10px;
    box-sizing: border-box;
    
    color: black !important;
    bottom: 0;
}


.specifies h2 {
    margin: 0;
    padding: 0;
    font-size: 20px;
    width: 100%
}

.specifies h2 span {
    font-size: 15px;
    color: #ccc;
    font-weight: normal
}

.specifies .price {
    position: absolute;
    top: 12px;
    right: 25px;
    font-weight: bold;
    color: #000;
    font-size: 30px
}

label {
    display: block;
    margin-top: 5px;
    font-weight: bold;
    font-size: 15px
}

ul {
    display: flex;
    margin: 0;
    padding: 0
}

ul li {
    list-style: none;
    margin: 5px 5px 0;
    font-size: 15px;
    font-style: normal;
    color: #ccc
}

ul li:first-child {
    margin-left: 0
}

ul.colors li {
    width: 15px;
    height: 15px
}

ul.colors li:nth-child(1) {
    background: #4A148C
}

ul.colors li:nth-child(2) {
    background: #F50057
}

ul.colors li:nth-child(3) {
    background: #536DFE
}

ul.colors li:nth-child(4) {
    background: #388E3C
}

ul.colors li:nth-child(5) {
    background: #FF6D00
}

.btn {
    display: block;
    padding: 5px;
    color: #fff;
    margin: 10px 0 0;
    width: 100%;
    font-size: 13px;
    border-radius: 2px
}


  </style>
</head>
<body>
  <div class="container-fluid">

    <div class="row">
      <div class="col-xs-12">
        <form action="<?php echo base_url("index.php/schedules") ?>" method="post">
        <div class="row">
            <div class="col-md-3">
            <div class="form-group">
    <label for="department">Department</label>
    <select  class="form-control"  name="department" id="department">
        <?php foreach($departments as $key => $value): ?>
            <option value="<?php echo $value->DeptID ?>"><?php echo $value->DeptName ?></option>
        <?php endforeach ?>
    </select>
</div>


            </div>
            <div class="col-md-3">
            <div class="form-group">
                <label class="form-control-label" for="section">Section</label>
                <select class="form-control" value="1" name="section" id="section" >
                  
                </select>
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
                <label class="form-control-label" for="from_date">Select Date</label>
                <input type="month" class="form-control" name="from_date" id="from_date">
            </div>
            </div>
            <div class="col-3 text-right">
            <label class="form-control-label" style="visibility:hidden" for="section">Section</label>
            <button class="btn btn-success" id="submit"> <i class="fa fa-search"></i> Filter</button>
            
            </div>
           
            
         
        </div>
       
        </form>
      </div>
    </div>

      
      <div class="d-flex mb-2" style="width:200px;">
      
    

      <button class="btn btn-default bg-light" id="backward"><i class="fas fa-less-than mr-auto p-2 text-dark rounded font-weight-bold p-1" style="cursor:pointer"></i> </button> 
      
      <input id="month_date" class="bg-light text-dark rounded font-weight-bold m-auto text-center" style="outline:none; border:0px;cursor:pointer;display:none" disabled value=<?php echo date('M-d-Y');?> ></input>
      <input id="month_date_to_show" class="bg-light text-dark rounded font-weight-bold m-auto text-center" style="outline:none; border:0px;cursor:pointer" disabled value=<?php echo date('M,Y');?> ></input>
      <button class="btn btn-default bg-light" id="forward"> <i class="fas fa-greater-than p-2 text-dark  rounded font-weight-bold p-1" style="cursor:pointer"></i></button>
      </div>
        <div class="row">
        
  
        <div class="col-lg-2 bg-danger " style="height:50px;width:400px;" ><p class="h4" style="text-align:center;">Daily</p></div>
          <div class="col-lg-2 bg-warning " style="height:50px;width:400px;" ><p class="h4" style="text-align:center;">Monthly</p></div>
          <div class="col-lg-2 bg-success " style="height:50px;width:400px;" ><p class="h4" style="text-align:center;">3 Months</p></div>
          <div class="col-lg-2 bg-info " style="height:50px;width:400px;" ><p class="h4" style="text-align:center;">6 Months</p></div>
          <div class="col-lg-2 bg-primary " style="height:50px;width:400px;" ><p class="h4" style="text-align:center;">Yearly</p></div>
          <div  id="headDate" class="col-lg-2 w3-container w3-center" style="display:none;">
        </div>
        </div>
        <br>  
    <div class="row example">
        

      </div>
        </div>
      
     
     
     

  <script>
    $(document).ready(function(){



$('#submit').on('click', function(event){
    event.preventDefault();
  console.log($('#from_date').val());
    var sdate = new Date($('#from_date').val());
  let month = $("#month_date").val();
  let split_it = month.split("-");

  let joined_date_string = split_it[0] + " " + split_it[1] + "," + split_it[2];

  console.log("month", getMonthFromString(joined_date_string));

  var sday = sdate.getDate();
  var smonth = sdate.getMonth() + 1;
  var syear = sdate.getFullYear();
 var startdate=[syear,smonth,sday].join('/');

  var dept=$("#department").val();
  var section=$("#section").val();


  var data={sday,smonth,dept,section};

  var url = "<?php echo base_url("index.php/ChartController/json_data/") ?>";
  $.ajax({
        url : url,
        type : "POST",
        dataType : "json",
        data : {"month" : smonth,"year":syear, "dept":dept,"section":section },
        success : function(data) {
         
         
          generate_calendar(smonth,data,sdate);
         
        },
        error : function(data) {
            console.log(data);
        }
    });
});

$('#forward').on('click', function(event){
    event.preventDefault();
  console.log($('#from_date').val());
    var sdate = new Date($('#from_date').val());
  let month = $("#month_date").val();
  let split_it = month.split("-");

  let joined_date_string = split_it[0] + " " + split_it[1] + "," + split_it[2];

  console.log("Forward month", getMonthFromString(joined_date_string));
  forward_month = getMonthFromString(joined_date_string);
 
  var monthNames = ["Jan", "Feb", "Mar", "Apr", "May","Jun","Jul", "Aug", "Sep", "Oct", "Nov","Dec"];

  if(forward_month + 1 <= 13){
    var month_get = monthNames[ forward_month -1];
  }else{
    
    split_it[2] = parseInt(split_it[2]) +1;
    month_get = monthNames[0];
  }
 


  $("#month_date_to_show").val(month_get + " ," + split_it[2]);
  month_get = month_get + "-" + split_it[1] + "-" + split_it[2];
  $("#month_date").val(month_get);

 
 

  var sday = sdate.getDate();
  var smonth = sdate.getMonth() + 1;
  var syear = sdate.getFullYear();
 var startdate=[syear,smonth,sday].join('/');

  var dept=$("#department").val();
  var section=$("#section").val();


  var data={sday,smonth,dept,section};

  var url = "<?php echo base_url("index.php/ChartController/json_data/") ?>";
  $.ajax({
        url : url,
        type : "POST",
        dataType : "json",
        data : {"month" : forward_month,"year":split_it[2], "dept":dept,"section":section },
        success : function(data) {
         
         
          generate_calendar(smonth,data,sdate);
         
        },
        error : function(data) {
            console.log(data);
        }
    });
});

$('#backward').on('click', function(event){
    event.preventDefault();
  console.log($('#from_date').val());
    var sdate = new Date($('#from_date').val());
  let month = $("#month_date").val();
  let split_it = month.split("-");

  let joined_date_string = split_it[0] + " " + split_it[1] + "," + split_it[2];

  console.log("Backward month", getMonthFromStringBackward(joined_date_string));
  back_month = getMonthFromStringBackward(joined_date_string);
  var monthNames = ["Jan", "Feb", "Mar", "Apr", "May","Jun","Jul", "Aug", "Sep", "Oct", "Nov","Dec"];

  if(back_month-1 >= 0){
    var month_get = monthNames[  back_month-1 ];
  }else{
    
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

  var dept=$("#department").val();
  var section=$("#section").val();


  var data={sday,smonth,dept,section};

  var url = "<?php echo base_url("index.php/ChartController/json_data/") ?>";
  $.ajax({
        url : url,
        type : "POST",
        dataType : "json",
        data : {"month" : back_month,"year":split_it[2], "dept":dept,"section":section },
        success : function(data) {
         
         
          generate_calendar(smonth,data,sdate);
         
        },
        error : function(data) {
            console.log(data);
        }
    });
});
function getMonthFromString(mon){
   return new Date(Date.parse(mon)).getMonth()+2
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

 console.log("Funcation Called Data: ", data);

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
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
             }
           else if(data[count].DurName=='3 Months '){
           
             console.log(data[count].MachineName);
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
           }  else if(data[count].DurName=='Monthly '){
           
           console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }
         else{
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
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
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
             }
           else if(data[count].DurName=='3 Months '){
           
             console.log(data[count].MachineName);
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
           }  else if(data[count].DurName=='Monthly '){
           
           console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }
         else{
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
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
         else if( month_number=='03')
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
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
             }
           else if(data[count].DurName=='3 Months '){
           
             console.log(data[count].MachineName);
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
           }  else if(data[count].DurName=='Monthly '){
           
           console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }
         else{
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
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
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
             }
           else if(data[count].DurName=='3 Months '){
           
             console.log(data[count].MachineName);
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
           }  else if(data[count].DurName=='Monthly '){
           
           console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }
         else{
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
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
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
             }
           else if(data[count].DurName=='3 Months '){
           
             console.log(data[count].MachineName);
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
           }  else if(data[count].DurName=='Monthly '){
           
           console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
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
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
             }
           else if(data[count].DurName=='3 Months '){
           
             console.log(data[count].MachineName);
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
           }  else if(data[count].DurName=='Monthly '){
           
           console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }
         else{
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
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
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
             }
           else if(data[count].DurName=='3 Months '){
           
             console.log(data[count].MachineName);
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
           }  else if(data[count].DurName=='Monthly '){
           
           console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }
         else{
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
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
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
             }
           else if(data[count].DurName=='3 Months '){
           
             console.log(data[count].MachineName);
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
           }  else if(data[count].DurName=='Monthly '){
           
           console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }
         else{
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
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
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
             }
           else if(data[count].DurName=='3 Months '){
           
             console.log(data[count].MachineName);
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
           }  else if(data[count].DurName=='Monthly '){
           
           console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }
         else{
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
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
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
             }
           else if(data[count].DurName=='3 Months '){
           
             console.log(data[count].MachineName);
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
           }  else if(data[count].DurName=='Monthly '){
           
           console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }
         else{
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
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
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
             }
           else if(data[count].DurName=='3 Months '){
           
             console.log(data[count].MachineName);
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
           }  else if(data[count].DurName=='Monthly '){
           
           console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }
         else{
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
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
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-primary' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
             }
           else if(data[count].DurName=='3 Months '){
           
             console.log(data[count].MachineName);
             $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-success' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
             count++;
             count1++;
           }  else if(data[count].DurName=='Monthly '){
           
           console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-warning' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }else if(data[count].DurName=='6 Months '){
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-info' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
           count++;
           count1++;
         }
         else{
          console.log(data[count].MachineName);
           $(".example").append(`<div class='col-lg-2 p-0'><div class='product bg-danger' ><div class='imgbox  h1 text-center'>${ count1 }</div><div class='specifies'><h2>Machine: ${data[count].MachineName}</h2><label>Department: ${data[count].DeptName}</label><label>Section: ${data[count].SecName}</label><label>Duration: ${data[count].DurName}</label></div></div></div>`);
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
  </script>
<?php $this->load->view('includes/contentend') ?>
<?php $this->load->view('includes/scripts') ?>
<?php $this->load->view('includes/footer') ?>
</body>
</html>

<?php

}

?>


