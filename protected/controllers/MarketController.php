<?php

class MarketController extends Controller
{
    public function init()
    {
        $this->layout = '/layouts/market';
    }
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionMarketPrice()
    {
        $this->render('marketPrice');
    }

    public function actionMarketPriceNews()
    {
        $this->render('marketPriceNews');
    }

    public function actionMarketPriceDates()
    {
        $this->render('marketPriceDates');
    }

    public function actionMarketCoficient()
    {
        $this->render('marketCoficient');
    }

    public function actionMarketRules()
    {
        $this->render('marketRules');
    }

    public function actionMarketOptions()
    {
        $this->render('marketOptions');
    }

    public function actionMarketPeoples()
    {
        $this->render('marketPeoples');
    }

    public function actionMarketContact()
    {
        $this->render('marketContact');
    }

    public function actioninpagemarketnews()
    {
        $this->render('in_page_market_news');
    }
}