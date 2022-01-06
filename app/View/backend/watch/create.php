
<div class="container col-7">
    <form method="post" enctype="multipart/form-data">
        <h3>CREATE WATCH</h3>
        <div class="mb-3">
            <label for="watch_name" class="form-label">Name</label>
            <input type="text" required class="form-control" id="watch_name" name="watch_name">
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" required class="form-control" id="brand" name="brand">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" required class="form-control" id="price" name="price">
        </div>
        <div class="mb-3">
            <label for="avt" class="form-label">Image</label>
            <input type="file" class="form-control" id="avt" name="fileToUpload">
        </div>
        <div class="mb-3">
            <label for="avt" class="form-label">ID Brand</label>
            <input type="text" class="form-control" id="brand_id" name="brand_id">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

