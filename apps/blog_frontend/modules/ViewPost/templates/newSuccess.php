<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php slot('signIn') ?>
<form method="post" action="<?php echo url_for('@sf_guard_signin') ?>" id="loginform">

    <?php echo $formSign; ?>
    <input type="submit" class="submit-login" value="Enviar">


</form>
<?php end_slot() ?>