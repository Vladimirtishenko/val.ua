<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class="leftBlock">
        <?= $content; ?>
    </div>
    <div class="rightBlock">
        <div class="btn-group-vertical">
            <a class="btn btn-default <?= Yii::app()->controller->action->id == 'index' ? 'activeMarketMenu' : ''; ?>" href="<?php echo Yii::app()->createUrl('/market/index'); ?>">Спеціальна пропозиція</a>
            <a class="btn btn-default <?= Yii::app()->controller->action->id == 'marketCoficient' ? 'activeMarketMenu' : ''; ?>" href="<?php echo Yii::app()->createUrl('/market/marketCoficient'); ?>">Сезонні коефіцієнти</a>
            <a class="btn btn-default <?= Yii::app()->controller->action->id == 'marketRules' ? 'activeMarketMenu' : ''; ?>" href="<?php echo Yii::app()->createUrl('/market/marketRules'); ?>">Порядок розміщення реклами</a>
            <a class="btn btn-default <?= Yii::app()->controller->action->id == 'marketOptions' ? 'activeMarketMenu' : ''; ?>" href="<?php echo Yii::app()->createUrl('/market/marketOptions'); ?>">Технічні вимоги</a>
            <a class="btn btn-default <?= Yii::app()->controller->action->id == 'marketPeoples' ? 'activeMarketMenu' : ''; ?>" href="<?php echo Yii::app()->createUrl('/market/marketPeoples'); ?>">Аудиторія</a>
            <a class="btn btn-default <?= Yii::app()->controller->action->id == 'marketContact' ? 'activeMarketMenu' : ''; ?>" href="<?php echo Yii::app()->createUrl('/market/marketContact'); ?>">Замовити on-line рекламу</a>
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    Наши цены
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('/market/marketPrice'); ?>" class="<?= Yii::app()->controller->action->id == 'marketPrice' ? 'activeMarketMenu' : ''; ?>">Прайс-лист</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('/market/marketPriceNews'); ?>" class="<?= Yii::app()->controller->action->id == 'marketPriceNews' ? 'activeMarketMenu' : ''; ?>">Новини</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('/market/marketPriceDates'); ?>" class="<?= Yii::app()->controller->action->id == 'marketPriceDates' ? 'activeMarketMenu' : ''; ?>" >Знайомства</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>