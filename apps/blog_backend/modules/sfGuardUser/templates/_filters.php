<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div id="blocFilter" title="Filtrer">
    <div class="sf_admin_filter">
        <div class="sf_admin_filter_content">

            <?php if ($form->hasGlobalErrors()): ?>
                <?php echo $form->renderGlobalErrors() ?>
            <?php endif; ?>

            <form action="<?php echo url_for('sf_guard_user_collection', array('action' => 'filter')) ?>" method="post">
                <?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?>
                    <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal()))
                        continue ?>
                    <?php
                    include_partial('sfGuardUser/filters_field', array(
                        'name' => $name,
                        'attributes' => $field->getConfig('attributes', array()),
                        'label' => $field->getConfig('label'),
                        'help' => $field->getConfig('help'),
                        'form' => $form,
                        'field' => $field,
                        'class' => 'sf_admin_form_row sf_admin_' . strtolower($field->getType()) . ' sf_admin_filter_field_' . $name,
                    ))
                    ?>
<?php endforeach; ?>

<?php echo $form->renderHiddenFields() ?>

                <div class="sf_admin_form_row">
                    <div class="label">&nbsp;

                    </div>
                    <div class="field">
                        <input type="hidden" id="sf_guard_user_filters__csrf_token" value="669012cd4ce6d8431e0285f30b0519f5" name="sf_guard_user_filters[_csrf_token]">            
                        <a href="/adminBlog/guard/users/filter/action?_reset" class="blocFilter_reset graybutton f_left" onclick="var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'post'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', '_csrf_token'); m.setAttribute('value', 'e96c1f65a1bd18686368995918dac069'); f.appendChild(m);f.submit();return false;">Restablecer</a>            
                        <input type="submit" value="Filtrar" class="graybutton"></input>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>