<!DOCTYPE html>
<html class="no-js " lang="pl">
<head>
    <title>Lalak-Home remote control</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" media="screen, print" href="style.css"/>
    <script type="text/javascript" src="jquery-2.2.2.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="button.js"></script>
</head>


<body>
<img id="plan" src="t.gif">
<div class="control">
    <div class="zoom-in">+</div>
    <div class="zoom-out">-</div>
    <div class="reload">re</div>

</div>
<? foreach (Buttons::getAll() as $button): ?>
    <?= $button->render(); ?>
<? endforeach; ?>
<script type="text/javascript">Plan = new Plan();</script>

<script type="text/javascript">
    $('.button').each(function () {
        var $button = $(this);
        var button = new Button($button);

        button.loadStatus();

        $button.data('object', button);
    });

    $('.control div.reload').click(function(){
        $('.button').each(function () {
            $(this).data('object').loadStatus();
        });
    });
</script>
</body>
</html>