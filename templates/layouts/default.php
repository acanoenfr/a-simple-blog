<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no" />
            <title><?= $title ?></title>
            <link rel="stylesheet" type="text/css" href="<?= $_ENV["dirs"]["public"] ?>/css/app.css" />
        </head>
        <body>
            <?= $content_for_layout ?>
            <script type="text/javascript" src="<?= $_ENV["dirs"]["public"] ?>/js/app.js"></script>
        </body>
    </html>
