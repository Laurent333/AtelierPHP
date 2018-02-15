<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Articles</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
    </head>
    <body>
        <?php if (isset($datas['displayMessage'])) displayDatasMessage($datas); ?>
        <div id="page">
            <menu>
                <h2>
                    <a href="<?php echo SITE_URL; ?>/index.php?page=articles">Articles</a>
                    &nbsp; | &nbsp;
                    <a href="<?php echo SITE_URL; ?>/index.php?page=contact">Contact</a>
                </h2>
            </menu>
            <main>
                <?php include SITE_PATH . '/view/' . $page . '/' . $view . '.php'; ?>
            </main>
        </div>
    </body>
</html>
<script src="script/custom.js"></script>
