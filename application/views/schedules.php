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
<div class="col-12 table-responsive">

        <div class="col-md-4">
            <a href="<?php echo base_url("index.php/schedules/newschedule") ?>" class="btn btn-success mb-3"> <i class="fa fa-plus-circle"></i> Create New</a>
        </div>

        <form action="<?php echo base_url("index.php/schedules") ?>" method="post">
        <div class="row">
            <div class="col-md-3">
                <?php $this->load->view("includes/departments") ?>
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
                <label class="form-control-label" for="from_date">From Date</label>
                <input type="date" class="form-control" name="from_date" id="from_date">
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
                <label class="form-control-label" for="section">End Date</label>
                <input type="date" class="form-control" name="end_date" id="end_date">
            </div>
            </div>
            
            <div class="col-12 text-right">
            <button class="btn btn-success"> <i class="fa fa-search"></i> Filter</button>
            
            </div>
        </div>
       
        </form>

        <?php if(validation_errors()): ?>
    <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
    </div>
    <?php endif ?>
    <?php
    
    if(isset($data)){
        ?>
    <table class="table table-hover table-stripped datatable">
        <thead class="bg-dark text-white">
            <tr>
                <th>Sr #</th>
                <th>Machine Name</th>
                 <th>Parameters</th>
                <th>Date</th>
                <th>Department</th>
                <th>Section</th>
                <th>Duration</th>
                 <th>Assign TO</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1 ?>
            <?php foreach ($data as $key => $f): ?>
            <tr>
                <td><?php echo $counter ?></td>
                <td><?php echo $f->MachineName . " " . $f->MNO ?></td>
                 <td><?php echo $f->ParamName ?></td>
                <td><?php echo $f->SDate ?></td>
                <td><?php echo $f->DeptName ?></td>
                <td><?php echo $f->SecName ?></td>
                <td><?php echo $f->DurName ?></td>
                   <td><?php echo $f->Name ?></td>
                <td>
                <a href="<?php echo base_url("index.php/schedules/view/$f->SID") ?>" class="btn btn-info"><i class="fa fa-users"></i></a>
                    <a href="<?php echo base_url("index.php/schedules/delete/$f->SID") ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php $counter = $counter + 1; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php

            }
            ?>
    <input type="hidden" id="sectionID" value="<?php echo isset($section) ? $section : "" ?>" >
</div>

<?php $this->load->view('includes/contentend') ?>
<?php $this->load->view('includes/scripts') ?>
<script>
    $(document).ready(() => {
        loadSections()
        $("select[name=department]").change((e)=>{
            loadSections()
        });


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
    })
</script>
<?php $this->load->view('includes/footer') ?>


<?php

}

?>