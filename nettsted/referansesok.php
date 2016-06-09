<?php
    include_once 'head.php';
?>
<div class="container-innhold">
    <div class="col-md-12">
        <?php
            $id = utf8_encode($_GET["sok"]);
            print ($id);

        ?>
    </div>
</div>
<?php
    include_once 'end.php';
?>