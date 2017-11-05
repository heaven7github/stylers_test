<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <base href="<?php echo BASE_URL ?>">
    <meta charset="UTF-8" />
    <title>JSON adat feldolgozó</title>
    <link rel="stylesheet" href="pub/assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="pub/assets/application/css/main.css" type="text/css">
    <script src="pub/assets/jquery/jquery.js"></script>
    <script src="pub/assets/application/js/main.js"></script>
</head>
<body>

<div class="container" id="main_container">
    <header id="header">
        <div class="header_top">
            <div class="row">
                <div class="col-xl">
                    <button type="button" class="btn btn-primary" id="data_read_btn">Adatok beolvasása</button>
                    <button type="button" class="btn btn-primary" id="draw_tree_btn">Fa kirajzolása</button>
                    <button type="button" class="btn btn-primary" id="send_email_btn">Email küldés</button>
                </div>
            </div>
        </div>
    </header>

    <?php $error = $session->getError() ?>
    <?php if ('' != $error) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
        </div>
    <?php endif; ?>

    <?php $notice = $session->getNotice() ?>
    <?php if ('' != $notice) : ?>
        <div class="alert alert-info" role="alert">
            <?php echo $notice ?>
        </div>
    <?php endif; ?>

    <?php $success = $session->getSuccess() ?>
    <?php if ('' != $success) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $success ?>
        </div>
    <?php endif; ?>
