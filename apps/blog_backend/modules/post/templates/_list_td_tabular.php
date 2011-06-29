<td class="sf_admin_text sf_admin_list_td_title">
    <?php echo $post->getTitle() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_user_id">
    <?php echo $post->getUsuario() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_state">
    <?php echo $post->getState() ?>
</td>

<td class="sf_admin_text sf_admin_list_td_categories_list">

    <?php
    $total = $post->getCategoriesList()->count();
    $val = 0;
    foreach ($post->getCategoriesList() as $category) {
        $val++;
        echo $category->getCategory()->getName();
        echo ($val == $total) ? "" : ",&nbsp;";
    }
    ?>
</td> 
<td class="sf_admin_text sf_admin_list_td_tags_list">

    <?php
    $total = $post->getTagsList()->count();
    $val = 0;
    foreach ($post->getTagsList() as $tags) {
        $val++;
        echo $tags->getTag()->getName();
        echo ($val == $total) ? "" : ",&nbsp;";
    }
    ?>
</td>
<td class="sf_admin_date sf_admin_list_td_date">
    <?php echo false !== strtotime($post->getDate()) ? format_date($post->getDate(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_count_comment">
    <div>
        <?php echo link_to(image_tag('comment3.png'), '@comment?post_id=' . $post->getId()) ?> <span  class="post-count-wrapper"><?php echo $post->getCommentAmonut()->count() ?></span>
    </div>
</td>