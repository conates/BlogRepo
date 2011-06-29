<div class="dm_box  f_left <?php echo $category['class'] ?>" >
    <div class="content-box">
        <div class="content-box-header">
            <h3><?php echo $category['label'] ?></h3>
        </div>
        <div class="dashboard">
            <ul>
                <?php $var = 0;
                foreach ($category['items'] as $key => $item): ?>
                    <?php if ($sf_user->hasCredential(sfConfig::get('app_mp_reality_admin_bloc' . $var1 . '' . $var . ''))): ?>
                        <li><a href="<?php echo url_for($item['url']) ?>" title="<?php echo $item['label'] ?>">
                                <?php echo image_tag($item['image'], array('alt' => __($item['label']))); ?><br><?php echo __($item['label']); ?>
                                <?php if (isset($item['badge'])) : ?>
                                    <span><?php echo $item['badge'] ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php
                    endif;
                    $var++;
                    ?>

<?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>