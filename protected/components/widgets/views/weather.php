<?php
function getDayString($date)
{
    switch($date)
    {
        case 0:
            $dayName = Yii::t('main', 'Неділя');
            break;
        case 1:
            $dayName = Yii::t('main', 'Понеділок');
            break;
        case 2:
            $dayName = Yii::t('main', 'Вівторок');
            break;
        case 3:
            $dayName = Yii::t('main', 'Середа');
            break;
        case 4:
            $dayName = Yii::t('main', 'Четвер');
            break;
        case 5:
            $dayName = Yii::t('main', 'Пя\'тниця');
            break;
        case 6:
            $dayName = Yii::t('main', 'Субота');
            break;
        default:
            $dayName = Yii::t('main', 'none');
    }
    return $dayName;
}
try {
?>
<div class="-with-before dropWeatherBotton" href="#"><span class="weather-mini weather-mini-01">
        <img src="http://yastatic.net/weather/i/icons/svg/<?= $xml['fact']['image-v3']; ?>.svg" title="<?= $xml['fact']['weather_type']; ?>">
</span>
    <?= $xml['fact']['temperature'] <= 0 ? $xml['fact']['temperature'] : '+'.$xml['fact']['temperature']; ?> C&deg;
    <div class="dropWether">
        <p class="forGenwether"><span>Погода</span><span>Украина, Чернигов</span></p>
        <div class="section today">
    	<span class="forWeatherIcon">
		<h5 class="section-heading">Сегодня</h5>
		    <img src="http://yastatic.net/weather/i/icons/svg/<?= $xml['fact']['image-v3']; ?>.svg" title="<?= $xml['fact']['weather_type']; ?>">
		</span>
		<span class="weather-detail">
		<h4 class="weather-heading">
            <span><?= $xml['fact']['temperature']; ?> С&deg;</span>
            <span class="phrase"><?= $xml['fact']['weather_type']; ?></span>
        </h4>
        <span class="temperature high-temperature"><span class="visually-hidden">Наивысшая температура</span><?= $xml['day'][0]['day_part'][2]['temperature-data']['avg']; ?> С&deg;</span>
		<span class="temperature low-temperature"><span class="visually-hidden">Низшая температура</span><?= $xml['day'][0]['day_part'][4]['temperature-data']['avg']; ?> С&deg;</span>
		<p class="summary"><?= $xml['yesterday']['weather_type']; ?></p>
		</span>
        </div>
        <div class="section this-week">
            <h5 class="section-heading">Неделя</h5>
            <ul>

                <li>
			<span class="icon-weather-01">
                <img src="http://yastatic.net/weather/i/icons/svg/<?= $xml['day'][1]['day_part'][2]['image-v3']; ?>.svg" title="<?= $xml['day'][1]['day_part'][2]['weather_type']; ?>">
			<span class="visually-hidden"><?= $xml['day'][1]['day_part'][2]['weather_type']; ?></span>
			</span>
                    <span class="day"><?= getDayString(date('w', strtotime($xml['day'][1]['@attributes']['date']))); ?></span>
                    <span class="temperature high-temperature"><span class="visually-hidden">Наивысшая температура</span><?= $xml['day'][1]['day_part'][2]['temperature-data']['avg']; ?> С&deg;</span>
                    <span class="temperature low-temperature"><span class="visually-hidden">Низшая температура</span><?= $xml['day'][1]['day_part'][4]['temperature-data']['avg']; ?> С&deg;</span>
                </li>

                <li>
			<span class="icon-weather-02">
                <img src="http://yastatic.net/weather/i/icons/svg/<?= $xml['day'][2]['day_part'][2]['image-v3']; ?>.svg" title="<?= $xml['day'][2]['day_part'][2]['weather_type']; ?>">
			<span class="visually-hidden"><?= $xml['day'][2]['day_part'][2]['weather_type']; ?></span>
			</span>
                    <span class="day"><?= getDayString(date('w', strtotime($xml['day'][2]['@attributes']['date']))); ?></span>
                    <span class="temperature high-temperature"><span class="visually-hidden">Наивысшая температура</span><?= $xml['day'][2]['day_part'][2]['temperature-data']['avg']; ?> С&deg;</span>
                    <span class="temperature low-temperature"><span class="visually-hidden">Низшая температура</span><?= $xml['day'][2]['day_part'][4]['temperature-data']['avg']; ?> С&deg;</span>
                </li>

                <li>
			<span class="icon-weather-03">
                <img src="http://yastatic.net/weather/i/icons/svg/<?= $xml['day'][3]['day_part'][2]['image-v3']; ?>.svg" title="<?= $xml['day'][3]['day_part'][2]['weather_type']; ?>">
			<span class="visually-hidden"><?= $xml['day'][3]['day_part'][2]['weather_type']; ?></span>
			</span>
                    <span class="day"><?= getDayString(date('w', strtotime($xml['day'][3]['@attributes']['date']))); ?></span>
                    <span class="temperature high-temperature"><span class="visually-hidden">Наивысшая температура</span><?= $xml['day'][3]['day_part'][2]['temperature-data']['avg']; ?> С&deg;</span>
                    <span class="temperature low-temperature"><span class="visually-hidden">Низшая температура</span><?= $xml['day'][3]['day_part'][4]['temperature-data']['avg']; ?> С&deg;</span>
                </li>

                <li>
			<span class="icon-weather-04">
                <img src="http://yastatic.net/weather/i/icons/svg/<?= $xml['day'][4]['day_part'][2]['image-v3']; ?>.svg" title="<?= $xml['day'][4]['day_part'][2]['weather_type']; ?>">
			<span class="visually-hidden"><?= $xml['day'][4]['day_part'][2]['weather_type']; ?></span>
			</span>
                    <span class="day"><?= getDayString(date('w', strtotime($xml['day'][4]['@attributes']['date']))); ?></span>
                    <span class="temperature high-temperature"><span class="visually-hidden">Наивысшая температура</span><?= $xml['day'][4]['day_part'][2]['temperature-data']['avg']; ?> С&deg;</span>
                    <span class="temperature low-temperature"><span class="visually-hidden">Низшая температура</span><?= $xml['day'][4]['day_part'][4]['temperature-data']['avg']; ?> С&deg;</span>
                </li>

            </ul>
        </div>
    </div>
</div>
<?php 
    } catch (Exception $e) {
        echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
    }
?>