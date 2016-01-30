<?php
class WeatherWidget extends CWidget
{
    public $xml = '';
    public function init()
    {
        try {
            $xml = @simplexml_load_file('http://export.yandex.ru/weather-ng/forecasts/33135.xml');
            $json = json_encode($xml);
            $this->xml = json_decode($json,TRUE);
        } catch (Exception $e) {
            echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
        }
    }
    public function run()
    {
        $this->render('weather', array('xml'=>$this->xml));
    }
}
