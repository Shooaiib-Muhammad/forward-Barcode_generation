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

<div class="col-md-10 offset-md-1 offset-0 ">
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
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create New Schedule</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
       
      
       
        <?php
        //print_r($Schedule);

        
        foreach ($Schedule as $key): ?>
    
        <form action="<?php echo base_url("index.php/schedules/new__schedule") ?>" method="post">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                       
                        <div class="form-group">
                            <label for="section">Department</label>
                            <select  class="form-control" name="department" >
                                <option value="<?php echo $key['DeptID']; ?>"><?php echo $key['DeptName']; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="section">Section</label>
                            <select name="section" id="section" class="form-control">
                                <option value="<?php echo $key['SectionID']; ?>"><?php echo $key['SecName']; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="machine">Machine</label>
                            <select name="machine" id="machine" class="form-control">
                                 <option value=""><?php echo $key['MachineName']; ?>-<?php echo $key['MNO']; ?></option>
                            </select>
                        </div>

                        <input type="hidden" name="MID" value="<?php echo $key['DMID']; ?>">
                        <input type="hidden" name="Dept" value="<?php echo $key['DeptID']; ?>">
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <select name="duration" id="duration" class="form-control">
                            <option value="">Select Duration</option>
                                <?php foreach($durations as $k=>$v): ?>
                                
                                <option value="<?php echo $v->DID?>"><?php echo $v->DurName?></option>

                                <?php endforeach ?>
                            </select>
                            
                        </div>
                    </div>

                    <?php endforeach; ?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="duration">Parameters</label>
                            <select name="PID" id="parameters" class="form-control"></select>
                            
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date">Schedule Date</label>
                            <input name="date" id="date" class="form-control" type="date">
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input name="description" id="description" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="text-center">Available Team</h3>
                        <table class="table table-hover-table-striped">
                        <thead>
                        <tr>
                                <th>Select</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Skill</th>
                            </tr>
                        </thead>
                           
                            <tbody>
                            
                            </tbody>
                        </table>
                    
                    </div>

                    <div class="col-md-6">
                        <h3 class="text-center">Machine Parameters</h3>
                        <ul class="list-group params">
                            
                        </ul>
                    
                    </div>
               
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" value="1" name="status" id="status" type="checkbox"
                                checked>
                            <label class="custom-control-label" for="status">Status</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>

    <input type="hidden" id="sectionID" value="<?php echo isset($section) ? $section : "" ?>" >
</div>
</div>

<?php $this->load->view('includes/contentend') ?>
<?php $this->load->view('includes/scripts') ?>
<script>
$(document).ready(() => {
     loadTeam()
    document.getElementById('date').valueAsDate = new Date();
        //loadSections()
        loadTeam()
        // $("select[name=department]").change((e)=>{
        //     loadSections()
        //     loadTeam();
        // });



        $("select[name=machine]").change(function() {
            var selectedItem = $(this).val();
            var abc = $('option:selected',this).data("value");
            $("input[name=MID]").val(abc)

            loadParams()
        });


        $("select[name=duration]").change(function() {

            loadParams()
        });


        // $("select[name=section]").change((e)=>{
        //     var sec = e.target.value;
        //     var dept = $("select[name=department]").val()
            
        //     var url = "<?php echo base_url("index.php/machines/department_machine_json/")?>" + dept + "/" + sec

        //     $.get(url, function(data){
        //         html = '<option value="">Select a Machine</option>'
        //         for (let index = 0; index < data.length; index++) {
        //             const element = data[index];
        //             html += "<option value='"
        //             html += element.DMID
        //             html += "' data-value="
        //             html += element.MID
        //             html += " >"
        //             html += element.MachineName
        //             html += " "
        //             html += element.MNO
        //             html += "</option>"
        //             // html += '<option value="'+element.SecID+'" >'+element.SecName+'</option>'
        //         }

        //         $("select[name=machine]").html(html)
        //     })
        // })

        $("select[name=duration]").change((e)=>{
            var sec = e.target.value;

            var MID = $("input[name='MID']").val()
            var DurID = $("select[name='duration']").val()

           
           /*  var param = $("select[name=PID]").val() */
            
            url = "<?php echo base_url("index.php/parameters/json_by_machine/") ?>" + MID + "/" + DurID

            $.get(url, function(data){
                console.log(data);
                html = '<option value="">Select a Parameter</option>'
                for (let index = 0; index < data.length; index++) {
                    const element = data[index];
                    html += "<option value='"
                    html += element.ParamID
                    html += "' >"
                    html += element.ParamName
                    html += "</option>"
                    // html += '<option value="'+element.SecID+'" >'+element.SecName+'</option>'
                }

                $("select[name=PID]").html(html)
            })
        })

        function loadTeam(){
            //alert('heloo');
var deptId = $("input[name='Dept']").val()
            
            var url = "<?php echo base_url("index.php/teams/team_by_dept_json/") ?>" + deptId;

            $.get(url, function(data){

                 html = ''
                for (let index = 0; index < data.length; index++) {
                    const element = data[index];
                    html += "<tr>"
                    html += "<td><input type='checkbox' value='" + element.ID +"' name='team[]'></td>"
                    html += "<td>" + element.Name +"</td>"
                    html += "<td>" + element.Email +"</td>"
                    html += "<td>" + element.SkillName +"</td>"
                }

                $("table tbody").html(html)
            })

        }
     

        function loadParams(){
            var MID = $("input[name='MID']").val()
            var DurID = $("select[name='duration']").val()
            url = "<?php echo base_url("index.php/parameters/json_by_machine/") ?>" + MID + "/" + DurID

            $.get(url, function(data){
                html = ""
                for(let i = 0; i < data.length; i++){
                    html += "<li class='list-group-item'>" + data[i].ParamName +" </li>"
                }

                $(".params").html(html)
            })
        }

        function loadSections(){
            var deptId = $("select[name=department]").val()
            var url = "<?php echo base_url("index.php/sections/json_sections/") ?>" + deptId;
            var section = $("#sectionID").val()

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
    })
</script>
<?php $this->load->view('includes/footer') ?>
<?php

}

?>