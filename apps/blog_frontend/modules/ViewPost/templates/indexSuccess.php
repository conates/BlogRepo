<div id='blog-content'>
    <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
    <script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
    <?php foreach ($pager->getResults() as $post) { ?>
        <div class="post">
            <div class="post-<?php echo $post->getId() ?>">
                <h1 class="underline"> <?php echo link_to($post->getTitle(), '@b_post?slug=' . $post->getSlug()) ?></h1>
                <div class="post-content">
                    <?php echo substr(html_entity_decode($post->getContent()), 0, sfConfig::get('app_post_content_long')) ?>...
                </div>
                <small> <?php echo date('Y-m-d', strtotime($post->getDate())) ?> </small>
                <br>
                <p> <span><?php echo $post->getCountComment($post->getId()) ?> Comentarios</span></p>
                <p> <?php echo link_to('Seguir leyendo »', '@b_post?slug=' . $post->getSlug()) ?></p>
                <div id="twitter">

                    <a href="http://twitter.com/share" class="twitter-share-button"
                       data-url="http://blog.recytics.com/index.php/blog/ver_post/<?php echo $post->getSlug() ?>.html"
                       data-via="conates"
                       data-text="Check this out!s"
                       data-related="conates_dev:The Javascript API"
                       data-count="vertical"
                       data-counturl="http://blog.recytics.com/index.php/blog/ver_post/<?php echo $post->getSlug() ?>.html">Tweet</a>
                </div>
                <div id="facebook">
                    <div id="fb-root"> </div>

                    <fb:like href="http://blog.recytics.com/index.php/blog/ver_post/<?php echo $post->getSlug() ?>.html" 
                             send="true" 
                             width="450" 
                             show_faces="true" 
                             colorscheme="dark" 
                             font=""
                             layout="box_count"
                             >
                    </fb:like>
                </div>
            </div>
        </div>

    <?php } ?>

</div>
<?php if ($pager->haveToPaginate()): ?>
    <div class="pagination">
        <a href="<?php echo url_for('@homepage') ?>?page=1">
            <img src="/images/first.png" alt="First page" title="First page" />
        </a>

        <a href="<?php echo url_for('@homepage') ?>?page=<?php echo $pager->getPreviousPage() ?>">
            <img src="/images/previous.png" alt="Previous page" title="Previous page" />
        </a>

        <?php foreach ($pager->getLinks() as $page): ?>
            <?php if ($page == $pager->getPage()): ?>
                <?php echo $page ?>
            <?php else: ?>
                <a href="<?php echo url_for('@homepage') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
            <?php endif; ?>
        <?php endforeach; ?>

        <a href="<?php echo url_for('@homepage') ?>?page=<?php echo $pager->getNextPage() ?>">
            <img src="/images/next.png" alt="Next page" title="Next page" />
        </a>

        <a href="<?php echo url_for('@homepage') ?>?page=<?php echo $pager->getLastPage() ?>">
            <img src="/images/last.png" alt="Last page" title="Last page" />
        </a>
    </div>
<?php endif; ?>

<div class="pagination_desc">
    <strong><?php echo $pager->getNbResults() ?></strong> post en el blog

    <?php if ($pager->haveToPaginate()): ?>
        - página <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
    <?php endif; ?>
</div>





















<?php slot('signIn') ?>
<?php if ($formSign->hasGlobalErrors()): ?>
    <?php echo $formSign->renderGlobalErrors() ?>
<?php endif; ?>
<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="notice"><?php echo $sf_user->getFlash('notice') ?></div>
<?php endif; ?>

<?php if ($sf_user->hasFlash('error')): ?>
    <div class="error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif; ?>

<form method="post" action="<?php echo url_for('@sf_guard_signin') ?>" id="loginform">

    <?php echo $formSign; ?>
    <input type="submit" class="submit-login" value="Enviar">


</form>
<?php end_slot() ?>