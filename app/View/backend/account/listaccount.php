<?php session_start() ?>
<div class="container col-8">

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">username</th>
            <th scope="col">password</th>
            <th scope="col" colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($accounts)) {
            foreach ($accounts as $account) :?>
                <tr>
                    <th scope="row"><?php echo $account->getId() ?></th>
                    <td><?php echo $account->getUsername() ?></td>
                    <td><?php echo $account->getPassword() ?></td>
                    <td><a href="indexaccount.php?page=update-account&id=<?php echo $account->getId()?>" class="btn btn-warning btn-lg">Edit</a></td>
                    <td><a href="indexaccount.php?page=delete-account&id=<?php echo $account->getId()?>" class="btn btn-danger btn-lg">Delete</a></td>
                </tr>

            <?php endforeach;
        } ?>
        <?php var_dump($accounts); die(); ?>

        </tbody>
    </table>
</div>

<?php include_once '../layouts/footer.php' ?>

