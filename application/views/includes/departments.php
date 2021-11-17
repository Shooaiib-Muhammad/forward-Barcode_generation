
<?php 
if(!isset($department)) {
    $department = 1;
} 
?>
<div class="form-group">
    <label for="department">Department</label>
    <select  class="form-control" name="department" id="department">
        <?php foreach($dept as $key => $value): ?>
            <option value="<?php echo $value->DeptID ?>" <?php if($department == $value->DeptID) {echo "selected";} ?>><?php echo $value->DeptName ?></option>
        <?php endforeach ?>
    </select>
</div>