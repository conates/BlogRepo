<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <?php if ($sf_user->isAuthenticated()): ?>
            <div id="container">
                <div id="header">
                    <div id="controlpanel">
                        <ul>
                            <li><?php echo __('Bienvenido', array(), 'mpRealityAdmin') ?> <strong><?php echo $sf_user->getUsername(); ?></strong> | </li>
                            <li><a class="last home" href="<?php echo url_for('@homepage') ?>"><?php echo __('Home', array(), 'mpRealityAdmin') ?></a></li>
                            <li><a class="last post" href="<?php echo url_for('@post') . "?state=null" ?>"><?php echo __('Post', array(), 'mpRealityAdmin') ?></a></li>
                            <li><a class="last comment" href="<?php echo url_for('@comment' . "?state=null") ?>"><?php echo __('Comentario', array(), 'mpRealityAdmin') ?></a></li>
                            <li><a class="last categories" href="<?php echo url_for('@category') ?>"><?php echo __('Categorías', array(), 'mpRealityAdmin') ?></a></li>
                            <li><a class="last tag" href="<?php echo url_for('@tag') ?>"><?php echo __('Tag', array(), 'mpRealityAdmin') ?></a></li>
                            <li><a class="last user" href="<?php echo url_for('@sf_guard_user') ?>"><?php echo __('Usuarios', array(), 'mpRealityAdmin') ?></a></li>
                            <li><a class="last groups" href="<?php echo url_for('@sf_guard_permission') ?>"><?php echo __('Permisos', array(), 'mpRealityAdmin') ?></a></li>                            
                            <li><a class="last blog" href="<?php echo url_for('@blog') ?>"><?php echo __('Blog', array(), 'mpRealityAdmin') ?></a></li>
                            <li><a class="last logout" href="<?php echo url_for('@sf_guard_signout') ?>"><?php echo __('Logout', array(), 'mpRealityAdmin') ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php echo $sf_content ?>
    </body>
</html>
