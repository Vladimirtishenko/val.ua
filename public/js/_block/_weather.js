function weatherForVal(){
    "use strict";
    var url = "https://query.yahooapis.com/v1/public/yql?q=select%20item%20from%20weather.forecast%20where%20woeid%3D918233%20and%20u%3D%22c%22&format=json&l=ru";

    this.Xhr('GET', url, null, this, this.tmp);

}

weatherForVal.prototype = Object.create(Site.prototype);

weatherForVal.prototype.tmp = function(data, self){
  "use strict";
  var datas = JSON.parse(data);

  console.log(self.inObject(datas)());

  //     query = datas.forecast,
  //     queryNow = datas.now,
  //     structure = self.creaters(query);

  // var html = '<div class="drop-weather-button">'
  //             +'<div class="outer-today-ico">'
  //                 +'<span class="icons-for-c-min icon-weather-min-'+query[0].code+'"></span>'
  //                 +'<i class="today-weather">'+queryNow+' С°</i>'
  //             +'</div>'
  //             +'<div class="drop-wether">'
  //                 +'<p class="for-genwether"><span class="title-weather">Погода</span><span class="city-weather">Украина, Чернигов</span></p>'
  //                 +'<div class="section-today">'
  //               +'<div class="for-weather-icon">'
  //                 +'<h5 class="section-heading">Сьогодні</h5>'
  //                 +'<span class="icons-for-c icon-weather-'+query[0].code+'"></span>'
  //               +'</div>'
  //             +'<div class="weather-detail">'
  //                 +'<h4 class="weather-heading">'
  //                     +'<span class="temp-now">'+queryNow+' С°</span>'
  //                     +'<span class="phrase">Температура зараз</span>'
  //                 +'</h4>'
  //                 +'<span class="temperature high-temperature">'+query[0].high+' С°</span>'
  //                 +'&nbsp; - &nbsp;'
  //                 +'<span class="temperature low-temperature">'+query[0].low+' С°</span>'
  //                 +'<p class="summary">'+query[0].text+'</p>'
  //             +'</div>'
  //                 +'</div>'
  //                 +'<div class="section-this-week">'
  //                     +'<h5 class="section-heading">Тиждень</h5>'
  //                     +'<ul class="item-list-temperature">'
  //                         + structure
  //                     +'</ul>'
  //                 +'</div>'
  //             +'</div>'
  //         +'</div>';
  // var el = document.querySelector(".outer-for-weather");
  // el.insertAdjacentHTML("beforeend", html);
};

weatherForVal.prototype.creaters = function(query){
  // "use strict";
  // var srt = "";
  // [].forEach.call(query, function(item, i){
  //   if(i != 0){
  //     srt += '<li class="item-time-temperature">'
  //               +'<span class="icons-for-c icon-weather-'+item.code+'"></span>'
  //               +'<span class="day">'+item.date+'</span>'
  //               +'<span class="temperature-days high-temperature">'+item.high+' С°</span>'
  //               +'&nbsp;-&nbsp;'
  //               +'<span class="temperature-days low-temperature">'+item.low+' С°</span>'
  //           +'</li>';
  //   }
  // });
  // return srt;
};