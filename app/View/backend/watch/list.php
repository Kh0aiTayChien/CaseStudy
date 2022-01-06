<?php session_start() ?>
<div class="container col-8">

    <table class="table table-striped">
        <thead>
        <tr class="table-success">
            <th scope="col">ID</th>
            <th scope="col">Avatar</th>
            <th scope="col">Watch Name</th>
            <th scope="col">Brand</th>
            <th scope="col">Brand Code</th>
            <th scope="col">Price</th>
            <th scope="col" colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($watchs)) {
            foreach ($watchs as $watch) :?>
                <tr>
                    <th scope="row"><?php echo $watch->getId() ?></th>
                    <td><img width="100px" height="170px" src="<?php echo $watch->getUrlImage() ?>" alt=""></td>
                    <td><?php echo $watch->getwatchname() ?></td>
                    <td><?php echo $watch->getbrand() ?></td>
                    <td><?php echo $watch->getbrand_id() ?></td>
                    <td><?php echo $watch->getprice() ?></td>
                    <td><a href="indexwatch.php?page=update-watch&id=<?php echo $watch->getId()?>" class="btn btn-outline-warning btn-lg">Edit</a></td>
                    <td><a href="indexwatch.php?page=delete-watch&id=<?php echo $watch->getId()?>" onclick=" return confirm('Are you sure ?')" class="btn btn-outline-danger btn-lg">Delete</a></td>
                </tr>

            <?php endforeach;
        } ?>
        </tbody>
    </table>
</div>

<?php include_once '../layouts/footer.php' ?>

