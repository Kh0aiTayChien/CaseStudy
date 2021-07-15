
<div class="container col-7 ">
    <form method="post"  enctype="multipart/form-data">
        <h3>UPDATE ACCOUNT</h3>
        <?php if(isset($account)):?>
        <div class="mb-3">
            <label username" class="form-label"> User Name</label>
            <input type="text" required class="form-control" id="username" name="username" value="<?php echo $account->getUsername()?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="password" required class="form-control" id="password" name="password" value="<?php echo $account->getPassword()?>">
        </div>

        <?php endif ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


