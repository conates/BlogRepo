<?php
$show = __(' Ver ');
$perPage = __(' por página');
$nbRecords = array('3','5','10', '20', '50', '100', '∞');
$currentMaxPerPage = $sf_user->getAttribute('category.max_per_page', $pager->getMaxPerPage(),'admin_module');
?>

| <?php echo $show ?>
<select  class="select_max_per_page" >
<?php  foreach(sfConfig::get('app_mp_reality_max_per_page', $nbRecords) as $maxPerPage): ?>
<option value="<?php echo $maxPerPage ?>" <?php echo ($currentMaxPerPage == $maxPerPage) ? 'selected=selected' :'' ?>><?php echo $maxPerPage ?></option>
<?php endforeach ?>
</select>
<?php echo $perPage ?>

<script type="text/javascript">
/* <![CDATA[ */
function changePageSize(val){
        var newLocation = "<?php echo url_for('@category') ?>?maxPerPage="+val;
        window.location=newLocation;
    }
/* ]]> */
</script>