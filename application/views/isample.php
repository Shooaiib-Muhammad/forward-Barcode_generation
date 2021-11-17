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
                <label class="form-control-label" for="machine">Machine</label>
                <select class="form-control" value="1" name="machine" id="machine" >
                  
                </select>
            </div>
            </div>


            <div class="col-md-3 mt-3">
            <button class="btn btn-success mt-3"> <i class="fa fa-search"></i> Filter</button>
            </div>
        </div>
       
        </form>
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