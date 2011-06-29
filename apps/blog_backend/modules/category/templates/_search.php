<div class="module_search">
    <div class="filter_box" data-load-url="<?php echo url_for(array('module' => 'category', 'action' => 'showFilters')) ?>"></div>
    <a class="advance_search f_left" title="<?php echo __('Búsqueda Avanzada') ?>"></a>
         
<?php
       
    printf('<a href="%s/filter/action?_reset" class="blocFilter_reset graybutton f_left" title="Restablecer">Restablecer</a>', url_for('@category'));
     $currentSearch = $sf_user->getAttribute('category' . '.search', '', 'admin_module');


    printf('<form action="%s" method="get">', url_for('@category'));
    printf('<input id="module_search_input" class="ui-corner-left  f_left" type="text" title="%s" value="%s" name="search"/>', __('Búsqueda') . 'category', $currentSearch
    );
    printf('<input type="submit" id="button_module_search" class="mp_submit  no_margin graybutton f_left" value="%s" />', __('Búsqueda'));
    if ($currentSearch) {
        printf('<a href="%s" class="cancel_search" title="%s">&nbsp;</a>', url_for('@category' . '?search='), __('Cancelar la búsqueda'));
    }
    ?>
</form>

</div>
