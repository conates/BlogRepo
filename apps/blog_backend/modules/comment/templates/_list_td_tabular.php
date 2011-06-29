<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($comment->getId(), 'comment_edit', $comment) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo $comment->getName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email">
  <?php echo $comment->getEmail() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_url">
  <?php echo $comment->getUrl() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_comment">
  <?php echo $comment->getComment() ?>
</td>
<td class="sf_admin_enum sf_admin_list_td_state">
  <?php echo $comment->getState() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_user_id">
  <?php echo $comment->getUsuario() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_post_id">
  <?php echo $comment->getPost() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($comment->getCreatedAt()) ? format_date($comment->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($comment->getUpdatedAt()) ? format_date($comment->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>

