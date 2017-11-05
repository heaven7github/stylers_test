<?php include_once 'header.php' ?>

<div class="clearfix"></div>

<?php if (isset($tree) && count($tree) > 0) : ?>
    <ul class="list-group">
        <?php foreach ($tree as $item): ?>
            <li class="list-group-item">
                <span><?php echo $item['first_key'].':'.$item['first_value'].' | '.$item['second_key'].':'.$item['second_value'] ?></span>
                <?php if ($item['children']): ?>
                    <ul>
                        <?php $this->render('tree_item', $item['children']) ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    Nincs adat.
<?php endif; ?>
