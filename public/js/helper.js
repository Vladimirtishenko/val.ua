"use strict";

function Helper () {}

Helper.prototype.returnDateNow = function () {
	var now = new Date(),
		curr_date = now.getDate() < 10 ? '0' + now.getDate() : now.getDate(),
		curr_month = (now.getMonth() + 1) < 10 ?  '0' +(now.getMonth() + 1) : now.getMonth() + 1,
		curr_year = now.getFullYear();

	return curr_year + '-' + curr_month + '-' + curr_date;
}

Helper.prototype.dateHalper = function (datas, lang){
	
	var data = datas.split(' ')

	if(this.returnDateNow() > data[0]){
		
		var thisDateMounth = this.mounthObject(new Date(data[0]).getMonth() + 1, lang),
			thisDateDay = new Date(data[0]).getDate(),
			thisDateYear = new Date(data[0]).getFullYear();

		return thisDateDay + ' ' + thisDateMounth + ' ' + thisDateYear;

	} else {
		return data[1].slice(0, -3);
	}

}	

Helper.prototype.mounthObject = function(mount, lang){

	var mounthObject = {
		ru: {
			1: 'Января',
			2: 'Февраля',
			3: 'Марта',
			4: 'Апреля',
			5: 'Мая',
			6: 'Июня',
			7: 'Июля',
			8: 'Августа',
			9: 'Сентября',
			10: 'Октября',
			11: 'Ноября',
			12: 'Декабря'	
		},
		uk: {
			1: "Січня",
			2: "Лютого",
			3: "Березня",
			4: "Квітня",
			5: "Травня",
			6: "Червня",
            7: "Липня",
            8: "Серпня",
            9: "Вересня",
            10: "Жовтня",
            11: "Листопада",
            12: "Грудня"
		}
	}


	return mounthObject[lang][mount];

}


Helper.prototype.templateImage = function(arrays, lang){
	var template = '<a href="/site/news/' + arrays.id + '" class="val-news-item-category val-category-image">' +
        '<div class="val-item-outer-category-image">' +
        '<img src="/uploads/news/thumb/' + arrays.image + '" alt="' + arrays['title_' + lang] + '">' +
        '</div>' +
        '<div class="val-line-vews-data">' +
        '<span class="val-content-news-data">' + arrays.date + '</span>' +
        '<span class="val-news-view">' + arrays.views + '</span>' +
        '</div>' +
        '<h2 class="val-title-news-category">' + arrays['title_' + lang] + '</h2>' +
        '</a>';

    return template;
}


Helper.prototype.templateWithoutImage = function(arrays, lang) {
    var template = '<a href="/site/news/' + arrays.id + '" class="val-news-item-category">' +
        '<div class="val-line-vews-data">' +
        '<span class="val-content-news-data">' + arrays.date + '</span>' +
        '<span class="val-news-view">' + arrays.views + '</span>' +
        '</div>' +
        '<h2 class="val-title-news-category">' + arrays['title_' + lang] + '</h2>' +
        '<p class="val-description-news-category">' + arrays['description_' + lang].slice(0, 250) + '...</p>' +
        '</a>';

    return template;
}


Helper.prototype.scrollHandler = function(general) {


    if (document.body.offsetHeight - 1200 < window.scrollY + window.innerHeight && this.state && !general) {
        this.state = false;
        this.generateDataAjax();
    }else if (document.body.offsetHeight - 500 < window.scrollY + window.innerHeight && this.state && this.count < 10 && general) {

        if (this.count == 7) {
            this.count++;
        }
        this.state = false;
        this.generateDataAjax(this.count);
    }


}