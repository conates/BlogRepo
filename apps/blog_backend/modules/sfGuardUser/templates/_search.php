<div class="module_search">
  <div class="filter_box" data-load-url="<?php echo url_for(array('module' => 'sfGuardUser', 'action' => 'showFilters')) ?>"></div>
  <a class="advance_search f_left" title="<?php echo __('Búsqueda Avanzada') ?>"></a>
  <input type="hidden" id="sf_guard_user_filters__csrf_token" value="669012cd4ce6d8431e0285f30b0519f5" name="sf_guard_user_filters[_csrf_token]">
  <a href="/adminBlog/guard/users/filter/action?_reset" class="blocFilter_reset graybutton f_left" onclick="var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'post'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', '_csrf_token'); m.setAttribute('value', 'e96c1f65a1bd18686368995918dac069'); f.appendChild(m);f.submit();return false;">Restablecer</a> 
            
  <?php    
  $currentSearch = $sf_user->getAttribute('sfGuardUser'.'.search', '', 'admin_module');
      
    
    printf('<form action="%s" method="get">', url_for('@sf_guard_user'));
    printf('<input id="module_search_input" class="ui-corner-left  f_left" type="text" title="%s" value="%s" name="search"/>',
      __('Búsqueda') . 'sfGuardUser',
      $currentSearch
    );
    printf('<input type="submit" id="button_module_search" class="mp_submit  no_margin graybutton f_left" value="%s" />', __('Búsqueda'));
    if ($currentSearch)
    {
      printf('<a href="%s" class="cancel_search" title="%s">&nbsp;</a>', url_for('@sf_guard_user'.'?search='), __('Cancelar la búsqueda'));
    }
  ?>
  </form>
  
</div>
