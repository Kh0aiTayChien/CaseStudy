<?php session_start() ?>
<div class="container col-8">
    <table class="table">
        <tr>

        <?php if (isset($watchs)) {
            foreach ($watchs as $watch) :?>
            <td>
                   <div class="card" style="width: 18rem;">
                    <img width="150px" src="<?php echo $watch->getUrlImage() ?>" alt="watch"
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $watch->getwatchname() ?></h5>
                        <p class="card-text"><?php echo $watch->getbrand() ?></p>
                        <a href="#" class="btn btn-primary"><?php echo $watch->getprice() ." USD" ?></a>
                    </div>
                </div>
               </td>

            <?php endforeach;
        } ?>
        </tr>

    </table>
</div>



