<h1>Articles</h1>

<p>
    <a href="<?php echo SITE_URL; ?>">&lt; Retour aux articles</a>
</p>

<?php 
if( isset( $datas[ 'item' ] ) )
{
    $row = $datas[ 'item' ];
    ?>
        <article>
            <h2><a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=form&id=<?php echo $row[ 'IdArticle' ]; ?>"><?php echo $row[ 'TitleArticle' ]; ?></a></h2>
            <p>
                <?php echo nl2br($row[ 'IntroArticle' ]); ?>
            </p>
            <p>
                <?php echo nl2br($row[ 'ContentArticle' ]); ?>
            </p>
        </article>
    <?php
}