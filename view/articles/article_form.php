<h1>Articles</h1>

<?php 

if( !empty( $_GET['id'] ) )
{
    $formAction = 'update';
    $id = $_GET['id'];
?>

<p><a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=detail&id=<?php echo $id; ?>">&lt; Retour à l'article</a></p>

<?php
}
else
{
    $id = 0;
    $formAction = 'insert';
    $datas[ 'item' ] = array(
        'TitleArticle' => ( isset($_POST['TitleArticle']) ? $_POST['TitleArticle'] : ''),
        'IntroArticle' => ( isset($_POST['IntroArticle']) ? $_POST['IntroArticle'] : ''),
        'ContentArticle' => ( isset($_POST['ContentArticle']) ? $_POST['ContentArticle'] : '')
    );
?>

<p><a href="<?php echo SITE_URL; ?>">&lt; Retour aux articles</a></p>

<?php
}
?>

<form action="<?php echo SITE_URL; ?>/index.php?page=articles&action=<?php echo $formAction; ?>&id=<?php echo $id; ?>" method="post">
    <label for="TitleArticle">
        <?php echo $pageController->formError( $datas, 'TitleArticle', 'message' ); ?>
        <input class="<?php echo $pageController->formError( $datas, 'TitleArticle', 'class' ); ?>" type="text" name="TitleArticle" id="TitleArticle" value="<?php echo $datas['item']['TitleArticle']; ?>" placeholder="Titre de l'article" />
    </label>
    
    <label for="IntroArticle">
        <?php echo $pageController->formError( $datas, 'IntroArticle', 'message' ); ?>
        <textarea class="<?php echo $pageController->formError( $datas, 'IntroArticle', 'class' ); ?>" id="IntroArticle" name="IntroArticle" placeholder="Introduction de l'article"><?php echo $datas['item']['IntroArticle']; ?></textarea>
    </label>
    
    <label for="ContentArticle">
        <?php echo $pageController->formError( $datas, 'ContentArticle', 'message' ); ?>
        <textarea class="<?php echo $pageController->formError( $datas, 'ContentArticle', 'class' ); ?>" id="ContentArticle" name="ContentArticle" placeholder="Contenu principal de l'article"><?php echo $datas['item']['ContentArticle']; ?></textarea>
    </label>
    
    <button class="btn">Envoyer</button>
    
</form>
