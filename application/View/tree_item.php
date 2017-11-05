<?php if (count($data) > 0) : ?>
    <?php foreach ($data as $item): ?>
        <li class="list-group-item">
            <span><?php echo $item['first_key'].':'.$item['first_value'].' | '.$item['second_key'].':'.$item['second_value'] ?></span>
            <?php if ($item['children']): ?>
                <ul>
                    <?php $this->render('tree_item', $item['children']) ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
<?php else: ?>
    Nincs adat.
<?php endif; ?>

