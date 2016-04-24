function Helper() {
    "use strict";
}

Helper.prototype.returnDateNow = function() {
    "use strict";
    var now = new Date(),
        currDate = now.getDate() < 10 ? '0' + now.getDate() : now.getDate(),
        currMonth = (now.getMonth() + 1) < 10 ? '0' + (now.getMonth() + 1) : now.getMonth() + 1,
        currYear = now.getFullYear();

    return currYear + '-' + currMonth + '-' + currDate;
};

Helper.prototype.dateHalper = function(datas, lang) {
    "use strict";
    var data = datas.split(' ');

    if (this.returnDateNow() > data[0]) {

        var thisDateMounth = this.mounthObject(new Date(data[0]).getMonth() + 1, lang),
            thisDateDay = new Date(data[0]).getDate(),
            thisDateYear = new Date(data[0]).getFullYear();

        return thisDateDay + ' ' + thisDateMounth + ' ' + thisDateYear;

    } else {
        return data[1].slice(0, -3);
    }

};

Helper.prototype.mounthObject = function(mount, lang) {
    "use strict";
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
    };

    return mounthObject[lang][mount];

};


Helper.prototype.inObject = function(obj, why, callback, self) {

    for (var mark in obj) {
        if (Object.keys(obj[mark]).indexOf(why) > -1) {
            callback(obj[mark][why], self);
            break;
        }
        if (Object.keys(obj[mark]).length > 0 && typeof obj[mark] == "object") {
            this.inObject(obj[mark], why, callback, self);
        }
    }

};

Helper.prototype.dayInUkranian = function(witch) {

    var days = {
        Mon: 'Понедiлок',
        Tue: 'Вiвторок',
        Wed: 'Середа',
        Thu: 'Четвер',
        Fri: 'П`ятниця',
        Sat: 'Субота',
        Sun: 'Недiля'
    }

    return days[witch];

};

Helper.prototype.tempDescription = function(key) {

    var description = {
		0: 'Торнадо',
		1: 'Тропічний шторм',
		2: 'Ураган',
		3: 'Сильні грози',
		4: 'Грози',
		5: 'Змішаний дощ зi снігом',
		6: 'Змішаний дощ зi снігом',
		7: 'Змішаний дощ зi снігом',
		8: 'Паморозь',
		9: 'Мряка',
		10: 'Град',
		11: 'Зливи',
		12: 'Зливи',
		13: 'Сніговi пориви',
		14: 'Легкий сніг',
		15: 'Хуртовина',
		16: 'Снiг',
		17: 'Град',
		18: 'Дощ зі снігом',
		19: 'Туманно',
		20: 'Туманно',
		21: 'Туманно',
		22: 'Туманно',
		23: 'Вітрянно',
		24: 'Вітрянно',
		25: 'Прохолодно',
		26: 'Хмарно',
		27: 'Переважно хмарно',
		28: 'Переважно хмарно',
		29: 'Мінлива хмарність',
		30: 'Мінлива хмарність',
		31: 'Ясно',
		32: 'Сонячно',
		33: 'Ясно',
		34: 'Ясно',
		35: 'Змішаний дощ з градом',
		36: 'Спекотно',
		37: 'Грози',
		38: 'Розсіяні грози',
		39: 'Розсіяні грози',
		40: 'Мінлива хмарність',
		41: 'Сильний снігопад',
		42: 'Снігопад',
		43: 'Сильний снігопад',
		44: 'Мінлива хмарність',
		45: 'Зливи',
		46: 'Зливовий сніг',
		47: 'Зливи'
    }

    return description[key];
};

Helper.prototype.templateImage = function(arrays, lang){
    "use strict";

    var template = '<a href="/site/news/' + arrays.id + '" class="val-news-item-category val-category-image">' +
        '<div class="val-item-outer-category-image">' +
        '<img src="/uploads/news/thumb/' + arrays.image + '" alt="' + arrays['title_' + lang] + '">' +
        '</div>' +
        '<div class="val-line-vews-data">' +
        '<span class="val-content-news-data">' + this.dateHalper(arrays.date, lang) + '</span>' +
        '<span class="val-news-view">' + arrays.views + '</span>' +
        '</div>' +
        '<h2 class="val-title-news-category">' + arrays['title_' + lang] + '</h2>' +
        '</a>';

    return template;
};


Helper.prototype.templateWithoutImage = function(arrays, lang) {
    "use strict";
    var template = '<a href="/site/news/' + arrays.id + '" class="val-news-item-category">' +
        '<div class="val-line-vews-data">' +
        '<span class="val-content-news-data">' + this.dateHalper(arrays.date, lang) + '</span>' +
        '<span class="val-news-view">' + arrays.views + '</span>' +
        '</div>' +
        '<h2 class="val-title-news-category">' + arrays['title_' + lang] + '</h2>' +
        '<p class="val-description-news-category">' + arrays['description_' + lang].slice(0, 250) + '...</p>' +
        '</a>';

    return template;
};

Helper.prototype.scrollHandler = function(general) {
    "use strict";

    if (document.body.offsetHeight - 1500 < window.scrollY + window.innerHeight && this.state && !general) {
        this.state = false;
        this.generateDataAjax();
    } else if (document.body.offsetHeight - 700 < window.scrollY + window.innerHeight && this.state && this.count < 10 && general) {

        if (this.count === 7) {
            this.count++;
        }
        this.state = false;
        this.generateDataAjax(this.count);
    }


};

Helper.prototype.inArray = function(needle, array) {
    "use strict";
    for (var i = 0, l = array.length; i < l; i++) {
        if (array[i] == needle) {
            return true;
        }
    }
    return false;
};
