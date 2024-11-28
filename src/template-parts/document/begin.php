<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body class="body">
    <?php
    wp_body_open();
    writingor_part('sprite/sprite');
    writingor_part('app/begin');
    ?>