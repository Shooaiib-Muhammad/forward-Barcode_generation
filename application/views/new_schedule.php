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
    <a href="<?php echo base_url("index.php/machines/sectionwisemachine/$DMID") ?>"><button type="button" class="btn btn-primary">back</button></a>
    </br>
     </br>
 
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Schedule</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="<?php echo base_url("index.php/schedules/Working") ?>" method="post">
            <div class="card-body">

                <div class="row">
                <div class="col-md-2">
                <label>SID #.</label>
                <input type="text" class="form-control" value="<?php Echo $SID;?>" name="SID" readonly></input>
                
                </div>
                     <input type="hidden" class="form-control" name="department" value="<?php echo $DeptID;?>"></input>
                      <input type="hidden" class="form-control" name="DMID" value="<?php echo $DMID;?>"></input>
                      <input type="date" hidden class="form-control" name="date" id="date" ></input>
                    <div class="col-md-2">
                        <div class="form-group">
                           <label>Machine :</label>
                <input type="text" class="form-control" value="<?php Echo $Name;?>" readonly></input>
                        </div>

                        
                    </div>
<div class="col-md-2">
                        <div class="form-group">
                             <label>Peremetere :</label>
                <input type="text" class="form-control" value="<?php Echo $ParamName;?>" readonly></input>
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                             <label>Duration :</label>
                <input type="text" class="form-control" value="<?php Echo $DurName;?>" readonly></input>
                            
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                             <label>Schedule Date :</label>
                <input type="text" class="form-control" value="<?php Echo $SDate;?>" readonly></input>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input name="description" class="form-control" value="<?php echo $Desc;?>" type="text" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                if($DurName=="Daily"){
?>
<div class="col-md-6" style="display: none;">
                        <div class="form-group">
                            <label for="description">Maintenance Work Details :</label>
                            <input name="description" class="form-control"  type="text" >
                        </div>
                    </div>
                
                         <div class="col-md-3" style="display: none;">
                        <div class="form-group">
                            <label for="ST">Maintenance Start Time :</label>
                            <input name="ST" class="form-control"  type="time" >
                        </div>
                    </div>
                     <div class="col-md-3" style="display: none;">
                        <div class="form-group">
                            <label for="ET">Maintenance End Time :</label>
                            <input name="ET" class="form-control"  type="time" >
                        </div>
                    </div>
<?php
                    }else{
                        ?>
                 <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Maintenance Work Details :</label>
                            <input name="description" class="form-control"  type="text" >
                        </div>
                    </div>
                
                         <div class="col-md-3">
                        <div class="form-group">
                            <label for="ST">Maintenance Start Time :</label>
                            <input name="ST" class="form-control"  type="time" >
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="ET">Maintenance End Time :</label>
                            <input name="ET" class="form-control"  type="time" >
                        </div>
                    </div>
                        <?php
                    }
                ?>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Remarks">Remarks :</label>
                            <input name="Remarks" class="form-control"  type="text" >
                        </div>
                    </div>
                     <div class="col-md-3">
                 <div class="form-group">  
                 <label for="Remarks">Action :</label>
                  <select class="form-control" name="Solution" id="Solution" >
                                <option value="ok">OK</option>
                                <option value="Notok">Not OK</option>
                                <option value="Repair">Repair</option>
                            </select></div>
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
               
                    
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Done</button>
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

        function loadTeam(){

            var deptId = $("input[name=department]").val()
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


        

        
    })
</script>
<?php $this->load->view('includes/footer') ?>
<?php

}

?>