<?php
Yii::app()->clientScript->registerScript('loading', '
    $( document ).ready(function() {

        function animateResults()
        {
            $(".line").each(
                function()
                {
                    var percentage = $(this).data("wid");
                    $(this).css({width: percentage}).animate({width: percentage}, "slow");
            });
        }
        animateResults();


        });
', CClientScript::POS_READY);
?>

<div class="result_s">
    <h4><?= Yii::t('main', 'Результати голосування'); ?></h4>
    <?php foreach($pool->answers as $answer): ?>
        <div class="in_res">
            <p><?= $answer->name; ?>&nbsp; &nbsp; <?= round($answer->hits*100/$pool->hits, 1).'%'; ?></p>
            <div class="line" style="width: <?= ($answer->hits*100/$pool->hits).'%'; ?>"></div>
        </div>
    <?php endforeach; ?>
</div>