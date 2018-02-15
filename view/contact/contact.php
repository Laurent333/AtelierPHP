<h1>Contact</h1>

<form action="<?php echo SITE_URL; ?>/index.php?page=contact&action=send" method="post">
    <label for="email">
        <?php echo $pageController->formError( $datas, 'email', 'message' ); ?>
        <input class="<?php echo $pageController->formError( $datas, 'email', 'class' ); ?>" type="text" name="email" id="email" value="<?php echo $datas['item']['email']; ?>" placeholder="Adresse E-mail" />
    </label>
    
    <label for="message">
        <?php echo $pageController->formError( $datas, 'message', 'message' ); ?>
        <textarea class="<?php echo $pageController->formError( $datas, 'message', 'class' ); ?>" id="message" name="message" placeholder="Votre message"><?php echo $datas['item']['message']; ?></textarea>
    </label>
    
    <button class="btn">Envoyer</button>
    
</form>