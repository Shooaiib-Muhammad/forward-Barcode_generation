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

<div class="col-md-6 offset-md-3 offset-0 ">
    <?php if(validation_errors()): ?>
    <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
    </div>
    <?php endif ?>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Machine Location</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="<?php echo base_url("index.php/machines/updatelocation/") ?>" method="post">
            <div class="card-body">
<?php
//print_r($location);
$DeptName=$location[0]['DeptName'];
$DeptID=$location[0]['DeptID'];
$MachineName=$location[0]['MachineName'];
$MID=$location[0]['MID'];
$SecName=$location[0]['SecName'];
$SectionID=$location[0]['SectionID'];
$DMID=$location[0]['DMID'];
$Status=$location[0]['Status'];
?>
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
    <label for="department">Department</label>
    <select  class="form-control" name="department" id="department">
     <option value="<?php echo $DeptID ?>" ><?php echo $DeptName ?></option>
        <?php foreach($dept as $key => $value): ?>
            <option value="<?php echo $value->DeptID ?>" ><?php echo $value->DeptName ?></option>
        <?php endforeach ?>
    </select>
</div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="section">Section</label>
                            <select class="form-control"name="section" id="section" >
                             <option value="<?php echo $SectionID ?>" ><?php echo $SecName ?></option>
                                <option>Select a Section</option>
                            </select>
                        </div>
                    </div>
                </div>
 <input type="hidden" class="form-control" name="DMID" value="<?php echo $DMID ?>"></input>
                <div class="row">
                    <div class="col-md-6">
                              <div class="form-group">
                    <label for="machine">Machine</label>
                     <?php
                   // print_r($machine);
                    ?>
                    <select  class="form-control" name="machine" id="machine">
                    <option value="<?php echo $MID ?>" ><?php echo $MachineName ?></option>
                        <?php foreach($machine as $key ): ?>
                            <option value="<?php echo $key['MID'] ?>" ><?php echo $key['MachineName'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                
                        </div>
                        <div class="col-md-6">
                         <label for="machine">Status</label>
                        <?php
            
              $Status;
    
           // if($Status){
if($Status==1){
                //Echo "Heloo";
                 ?>
                 <div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch<?php Echo $DMID ?>" tabindex="0" checked>
    <label class="onoffswitch-label" for="myonoffswitch<?php Echo $DMID ?>">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
                 <?php

             }else{
                  //Echo "Helll";
                 ?>
<div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch<?php Echo $DMID ?>" tabindex="0" >
    <label class="onoffswitch-label" for="myonoffswitch<?php Echo $DMID ?>">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
                 <?php
             }
             ?>
                        
                     
                        </div>
                </div>
            </div>
           

            <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
</div>

<?php $this->load->view('includes/contentend') ?>
<?php $this->load->view('includes/scripts') ?>
<script>
    $(document).ready(() => {
       // loadSections()
        $("select[name=department]").change((e)=>{
            loadSections()
        });


        function loadSections(){
            var deptId = $("select[name=department]").val()
            url = "<?php echo base_url("index.php/sections/json_sections/") ?>" + deptId;

            $.get(url, function(data){
                
                html = '<option value="">Select a Section</option>'
                for (let index = 0; index < data.length; index++) {
                    const element = data[index];
                    html += '<option value="'+element.SecID+'">'+element.SecName+'</option>'
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