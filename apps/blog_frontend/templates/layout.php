<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>  
        <script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>        
        <script type="text/javascript" src="http://twitter-friends-widget.googlecode.com/files/jquery.twitter-friends-1.0.min.js"></script>
        <script src="http://platform.twitter.com/anywhere.js?id=Bi552BoN8oWIdg98vPR02w&amp;v=1"></script>

        
    </head>
    <body>
            
        <div id="wrapper">
            <div id="header">
            </div>

            <div id="content">
                <?php echo $sf_content ?>          
            </div>
            <div id="navigation">
                <div id="menu">
                    <ul>
                        <li><?php echo link_to('Administración', '/adminBlog', array('target' => '_blank')) ?></li>
                        <?php if (!$sf_user->isAuthenticated()): ?>
                            <li><?php echo link_to('Registrate', '@register') ?></li>

                            <?php if (has_slot('signIn')): ?>
                                <?php include_slot('signIn') ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($sf_user->isAuthenticated()): ?>
                            <li><a class="last logout" href="<?php echo url_for('@sf_guard_signout') ?>">Logout</a></li>
                        <?php endif ?>
                        <div class="module_search">
                            <p>Buscador</p>
                            <div class="filter_box"></div>
                            <a class="search" title="Busqueda"></a>
                            <form action="<?php echo url_for('@homepage') ?>"  method="get">
                                <input id="module_search_input" class="search" type="text" title="input search" value="" name="search"/>
                                <input type="submit" id="button_module_search" class="search" value="Buscar" />
                                <a href="<?php echo url_for('@homepage') ?>" class="cancel_search" title="Anular Búsqueda">Anular Búsqueda</a>
                            </form>
                        </div>



                    </ul>
                    <div id="follow-twitter">
                        <a href="http://twitter.com/conates" class="twitter-follow-button" 
                           data-button="grey" 
                           data-link-color="800080" 
                           data-text-color="800080"
                           data-lang="es"
                           data-width="300px"
                           data-align="right"
                           data-show-count="true">Follow @conates</a>
                    </div>
                    <!--Inicio Código para mostrar los seguidores en twitter-->
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#friends').twitterFriends({
                                debug:1
                                ,username:'conates'
                                ,header:'<a href=\'_tp_\'><img src=\'_ti_\'/></a><h2>_fo_ SEGUIDORES!</h2>'
                                ,friends:0
                                ,user_animate:'opacity'
                                ,users:100
                                ,users_max:30
                                ,loop:0
                                ,user_image:36
                            });
                        });
                    </script>
                    <div style="width:100%">
                        <div id="friends"></div>
                    </div>
                    <!--Fin Código para mostrar los seguidores en twitter- lo demas esta en los css -->
                </div>
            </div>
            <div id="footer">

            </div>
        </div>
    </body>
</html>
