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
<a href="<?php echo base_url("index.php/machines/install") ?>" class="btn btn-primary"> <i class="fa fa-plus-circle"></i>Add location</a>
        <form action="<?php echo base_url("index.php/machines/department") ?>" method="post">
        <div class="row">
            <div class="col-md-2">
                <?php $this->load->view("includes/departments") ?>
            </div>

            <div class="col-md-2">
            <div class="form-group">
                <label class="form-control-label" for="section">Section</label>
                <select class="form-control" value="1" name="section" id="section" >
                  
                </select>
            </div>
            </div>
            <div class="col-md-2 mt-md-3">
            <button class="btn btn-success mt-md-3"> <i class="fa fa-search"></i> Filter</button>
            
            </div>
        </div>
       
        </form>
<div class="row">
    <div class="col-md-6">
    <table class="table table-hover table-stripped datatable table-sm">
        <thead class="bg-dark text-white">
            <tr>
                <th>Sr #</th>
                <th>Machine Name</th>
                <th>Department</th>
                <th>Section</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1 ?>
        <?php
        //print_r($data);
        ?>
            <?php foreach ($data as $key => $f): ?>
            <tr>
                <td><?php echo $counter ?></td>
                <td><?php echo $f->MachineName . " " . $f->MNO ?></td>
                <td><?php echo $f->DeptName ?></td>
                <td><?php echo $f->SecName ?></td>
                <td><?php
            $Status=$f->Status;
            $DMID=$f->DMID;
               $Status;
    
           // if($Status){
if($Status==1){
                //Echo "Heloo";
                 ?>
                 <button type="button" class="btn btn-success btn-sm ">Active</button>
                 <?php

             }else{
                  //Echo "Helll";
                 ?>
<button type="button" class="btn btn-danger btn-sm">In Active</button>
                 <?php
             }
             ?></td>
                <td>
                    
                    <a href="<?php echo base_url("index.php/Machines/Editlocation/$DMID") ?>"><button type="submit" class="btn btn-primary btn-sm">Edit</button></a>
                </td>
            </tr>
            <?php $counter = $counter + 1; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div></div>
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