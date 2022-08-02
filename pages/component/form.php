<div class="col-md-6 col-sm-12 form-group">
    <label for="register-form-name">Name:</label>
    <input type="text" name="name" value="<?php if(isset($row)) { echo $row['name']; } ?>" class="form-control" / required>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <label for="register-form-name">Skill:</label>
    <input type="text" name="skill" value="<?php if(isset($row)) { echo $row['skill']; } ?>" class="form-control" / required>
</div>