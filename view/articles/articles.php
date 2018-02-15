<h1>Articles</h1>

<p><a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=form">+ Ajouter un article</a></p>

<?php 
if( isset( $datas[ 'item' ] ) )
{
    foreach( $datas[ 'item' ] as $row )
    {
    ?>
        <article>
            <h2><a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=detail&id=<?php echo $row[ 'IdArticle' ]; ?>"><?php echo nl2br($row[ 'TitleArticle' ]); ?></a></h2>
            <p>
                <?php echo nl2br($row[ 'IntroArticle' ]); ?>
            </p>
        </article>
    <?php
    }
}