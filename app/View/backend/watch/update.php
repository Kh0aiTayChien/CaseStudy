eturn
<div class="container col-7 ">
    <form method="post"  enctype="multipart/form-data">
        <h3>UPDATE WATCH</h3>
        <?php if(isset($watch)):?>
        <div class="mb-3">
            <label for="first-name" class="form-label">First Name</label>
            <input type="text" required class="form-control" id="watch_name" name="watch_name" value="<?php echo $watch->getwatchname()?>">
        </div>
        <div class="mb-3">
            <label for="last-name" class="form-label">Brand</label>
            <input type="text" required class="form-control" id="brand" name="brand" value="<?php echo $watch->getbrand()?>">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price </label>
            <input type="text" required class="form-control" id="price" name="price" value="<?php echo $watch->getprice()?>">
        </div>
            <div class="mb-3">
                <label for="price" class="form-label">Brand Code </label>
                    <input type="text" required class="form-control" id="brand_id" name="brand_id" value="<?php echo $watch->getbrand_id()?>">
            </div>
            <div class="mb-3">
                <label for="avt" class="form-label">Avatar</label>
                <input type="file" class="form-control" id="avt" name="fileToUpload">
            </div>
            <div class="mb-3">
                <img width="50px" src="<?php echo $watch->getUrlImage()?>" alt="<?php echo $watch->getUrlImage()?>">
            </div>

        <?php endif ?>
        <button type="submit" class="btn btn-primary" onclick=" return confirm('Are you sure ?') ">Submit</button>
    </form>
</div>


