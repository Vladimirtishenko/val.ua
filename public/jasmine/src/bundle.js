function Helper() {
    "use strict";
}

Helper.prototype.returnDateNow = function(date) {
    "use strict";
    var now = date ? new Date(date) : new Date(),
        dateValue = (new Date(now.getDate(), now.getMonth(), now.getFullYear())).valueOf();

    return dateValue;
};

Helper.prototype.dateHalper = function(datas, lang) {
    "use strict";
    var data = datas.split(' '),
        dateStaticArguments = new Date(data[0]);

    if (this.returnDateNow() > this.returnDateNow(data[0])) {

        var thisDateMounth = this.mounthObject(dateStaticArguments.getMonth() + 1, lang),
            thisDateDay = dateStaticArguments.getDate(),
            thisDateYear = dateStaticArguments.getFullYear();

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

Helper.prototype.listen = function(listen, element, callback){

    var oneCallback = false,
        callbackTohandler,
        count = 0;

    if(callback instanceof Array && element.length != callback.length){
        throw {
            message: "The number of elements handler does not match"
        }
    } else if(typeof callback == "function") {
        oneCallback = true;
    }

    listen.forEach(function(item, i){
        element.forEach(function(items, j){
            if(items){
                callbackTohandler = oneCallback ? callback : callback[count];
                items.addEventListener(item, callbackTohandler);
            }  
            count++;
        })
    })

}

function ModelXhr() {
    "use strict";
    this.xhr = function() {
        var xmlhttp;
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (E) {
                xmlhttp = false;
            }
        }
        if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
            xmlhttp = new XMLHttpRequest();
        }
        return xmlhttp;
    };
}

ModelXhr.prototype = Object.create(Helper.prototype);

ModelXhr.prototype.Xhr = function(method, url, form, objectCaller, callback) {
    "use strict";
    if (form) {

        var formElement = form.querySelectorAll('input');
        formData = new FormData();

        for (var i = 0; i < formElement.length; i++) {
            formData.append(formElement[i].name, formElement[i].value);
        }

    } else {
        var formData = null;
    }

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(argument) {
        if (xhr.status === 200 && xhr.readyState === 4) {
            callback(xhr.responseText, objectCaller);
        }
    };

    xhr.open(method, url, true);
    xhr.send(formData);

};

function Site() {
    "use strict";
}

Site.prototype = Object.create(ModelXhr.prototype);


function AjaxConstructor(){
    "use strict";
}

AjaxConstructor.prototype = Object.create(Site.prototype);

AjaxConstructor.prototype.commonProps = function(self, value){
    "use strict";
    this.listen(['scroll'], [window], self.scrollHandler.bind(self, value));
    if(!value){
      self.generateDataAjax();  
    }
};


var handlerAllStart = function() {
    "use strict";
    new FacebookPopUp();
    new Slider(document.querySelector('.val-list-slider'));
    new IframeGemerate(document.querySelector('.val-iframe-streams'));
    new AjaxLoadCategory(document.querySelector('.val-full-width-category'));
    new Modal();
    new Currency();
    new weatherForVal();
    new MenuButton(document.querySelector('.val-button-menu'), document.querySelector('.val-all-outer'));
    new Market(document.querySelector('.val-market-table'));
    new StickyAccordeon(document.getElementById('val-only-else-pages'));
    new AjaxLoaderCategorySingle(document.getElementById('val-single-category'), document.getElementById('val-count-and-id'));
    new AjaxLoaderMultimedia(document.getElementById('val-single-multimedia'), document.getElementById('val-count-and-id'));
    new Pikaday({ field: document.getElementById('datepicker') });
    new MansoryGenerator(document.querySelectorAll('.-for-mansory-container'));
};

var handlerToError = function(e){
    console.log(e);
}

if(location.href.indexOf('jasmine') == -1){
    window.addEventListener('DOMContentLoaded', handlerAllStart);  
    window.addEventListener('error', handlerToError);  
}


function AjaxLoaderMultimedia(element, hidden){
    "use strict";
    if(!element) {
        return;
    }

    this.element = element;
    this.count = hidden.getAttribute('data-count');
    this.state = true;
    this._Masonry_ = null;

    this.commonProps(this, null);
}


AjaxLoaderMultimedia.prototype = Object.create(AjaxConstructor.prototype);


AjaxLoaderMultimedia.prototype.generateDataAjax = function(){
    "use strict";
    this.Xhr('GET', '/site/GetMultimedia?offset=' + this.count, null, this, this.template);

};

AjaxLoaderMultimedia.prototype.template = function(data, self){
    "use strict";
    var dataContent = JSON.parse(JSON.parse(data).multimedia),
        lang = JSON.parse(data).language,
        template = [];

    dataContent.forEach(function(item, i){
        
        var elementOuter = document.createElement('a'), 
            elementInner = document.createElement('div'), 
            img = new Image(), 
            elementSpan = document.createElement('span'),
            classieType = '-val-ico-'+item.type;
        
        elementOuter.href = (item.type == 'photo') ? '/'+lang+'/site/photos/'+item.id : '/'+lang+'/site/video/'+item.id;
        elementOuter.classList.add('val-block-multimedia', classieType);
        elementInner.classList.add('val-image-block-multimedia');
        (item.type == 'photo') ? img.src = 'http://val.ua/uploads/galery/category/'+item.image+'' : img.src = 'http://img.youtube.com/vi/'+item.image+'/mqdefault.jpg';
        elementSpan.classList.add('-val-multimedia-description');

        elementSpan.innerHTML = item['name_'+lang];

        elementInner.appendChild(img);
        elementOuter.appendChild(elementSpan);
        elementOuter.appendChild(elementInner);

        template.push(elementOuter);
    });

     for (var i = template.length - 1; i >= 0; i--) {
        self.element.appendChild(template[i]);
    }

    if(self._Masonry_){
        self._Masonry_.appended(template);
        self._Masonry_.layout();
        readyNextIteration();
    } else {
        setTimeout(function () {
            self._Masonry_ = new Masonry( self.element, {
              itemSelector: '.val-block-multimedia',
              columnWidth: 1
            });
            readyNextIteration();
            self.element.style.opacity = 1;
        }, 500);
    }

    function readyNextIteration(){
        self.count = JSON.parse(data).offset;
        self.state = true;
    }

};
function AjaxLoadCategory(element) {
    "use strict";
    if(!element) {
        return;
    }
    
    this.count = 1;
    this.container = element;
    this.state = true;

    this.commonProps(this, 'general');
}

AjaxLoadCategory.prototype = Object.create(AjaxConstructor.prototype);


AjaxLoadCategory.prototype.generateDataAjax = function(id) {
    "use strict";
    var self = this;
    this.Xhr('GET', '/site/GetCategory?id=' + id, null, self, self.responseGetServer);

};

AjaxLoadCategory.prototype.responseGetServer = function(response, self) {
    "use strict";
    var res = JSON.parse(response),
        news = JSON.parse(res.news),
        category = JSON.parse(res.category),
        lang = res.language;

    self.templateCategory(news, category, lang);
};

AjaxLoadCategory.prototype.templateCategory = function(news, category, lang) {
    "use strict";
    var self = this,
        str = '<div class="val-category-block">' +
                '<h2 class="val-title-uppercase-with-line">' + category[0]['name_' + lang] + '</h2>'+
                '<div class="val-news-list-category">';


    for (var i = 0; i < news.length; i++) {
        if (i === 0) {
            str += self.templateImage(news[i], lang);
        } else {
            str += self.templateWithoutImage(news[i], lang);
        }
    }

    str += '</div></div>';

    self.container.insertAdjacentHTML('beforeend', str);

    this.state = true;
    this.count++;

};
function AjaxLoaderCategorySingle(element, hidden){
    "use strict";

    if(!element) {
        return;
    }

    this.element = element;
    this.id = hidden.getAttribute('data-id') ? hidden.getAttribute('data-id') : null;
    this.count = hidden.getAttribute('data-count');
    this.state = true;

    this.commonProps(this, null);

}


AjaxLoaderCategorySingle.prototype = Object.create(AjaxConstructor.prototype);


AjaxLoaderCategorySingle.prototype.generateDataAjax = function(){
    "use strict";
    this.Xhr('GET', '/site/GetCategoryByIdXhrOrNotId?id=' + this.id + '&offset=' + this.count, null, this, this.template);

};

AjaxLoaderCategorySingle.prototype.template = function(data, self){
    "use strict";
    var dataContent = JSON.parse(JSON.parse(data).news),
        lang = JSON.parse(data).language,
        template = '';


    dataContent.forEach(function(item){
        template += '<a href="/site/news/'+item.id+'" class="val-block-gen-news">' +
                        '<div class="val-image-block-gen-news">' +
                            '<img src="/uploads/news/thumb/'+item.image+'">' +
                        '</div>' +
                        '<div class="val-description-block-gen-news">' +
                             '<span class="val-news-view">'+item.views+'</span>' +
                             '<span class="val-content-news-data">'+self.dateHalper(item.date, lang)+'</span>' +
                            '<h3 class="val-content-news-title-small">'+item['title_'+lang]+'</h3>' +
                        '</div>' +
                    '</a>';
    });


    self.element.insertAdjacentHTML('beforeend', template);

    self.count = JSON.parse(data).offset;
    self.state = true;

};
function Currency() {
    "use strict";

    var url = "http://"+location.hostname+"/site/tryCurrency";

    this.Xhr('GET', url, null, this, this.templates);
}

Currency.prototype = Object.create(Site.prototype);

Currency.prototype.templates = function(query, self) {

    "use strict";
    var querys = JSON.parse(query),
        InArray = ["ПриватБанк", "ПУМБ", "Укрсоцбанк"],
        a = [],
        stay;

    [].reduce.call(querys, function(previousValue, currentValue, index) {

        if(InArray.indexOf(currentValue.bankName) == -1){
            return 0;
        }

        if (previousValue == 0 || currentValue.bankName != previousValue) {
            stay = {};
            stay.bankName = currentValue.bankName; 
        } 

        stay[currentValue.codeAlpha] = {
            rateBuy: currentValue.rateBuy,
            rateBuyDelta: currentValue.rateBuyDelta,
            rateSale: currentValue.rateSale,
            rateSaleDelta: currentValue.rateSaleDelta
        };

        if (stay && Object.keys(stay).length > 3) {
            a.push(stay);
        }

        return currentValue.bankName;

    }, 0);


    self.templateForArray(a, self);

};

Currency.prototype.templateForArray = function(a, self) {
    "use strict";
    var str = "<table class='-new-currensy'><tr><th><span>Банк</span></th><th><span style='font-size: 18px'>&#402;</span></th><th><span>Покупка</span></th><th><span>Продажа</span></th></tr>";

    [].forEach.call(a, function(item, i) {
        str += "<tr>" + "<td><p><i>" + item.bankName + "</i></p></td>" + "<td><span><b>&euro;</b></span><span><b>$</b></span><span><b>R</b></span></td>" + "<td><span>" + self.gets(item, "EUR", "rateBuy") + "</span> <span>" + self.gets(item, "USD", "rateBuy") + "</span> <span>" + self.gets(item, "RUB", "rateBuy") + "</span></td>" + "<td><span>" + self.gets(item, "EUR", "rateSale") + "</span> <span>" + self.gets(item, "USD", "rateSale") + "</span> <span>" + self.gets(item, "RUB", "rateSale") + "</span></td>" + "</tr>";
    });

    str += "</table>";

    var div = document.querySelector(".-currency-val");
    div.insertAdjacentHTML("beforeend", str);

};


Currency.prototype.gets = function(item, items, rate) {
    "use strict";
    var delta, str;
    if (item[items]) {
        if (rate == "rateBuy") {
                str = "<mark>" + Number(item[items][rate]).toFixed(2) + "</mark>";
                delta = (item[items]["rateBuyDelta"] > 0) ? "<i class='-to-hight'> &nbsp; &#9650;</i>" : (item[items]["rateBuyDelta"] < 0) ? "<i class='-to-low'> &nbsp; &#9660;</i>" : "";
            str += delta;
            return str;
        } else if (rate == "rateSale") {
                str = "<mark>" + Number(item[items][rate]).toFixed(2) + "</mark>";
                delta = (item[items]["rateSaleDelta"] > 0) ? "<i class='-to-hight'> &nbsp; &#9650;</i>" : (item[items]["rateSaleDelta"] < 0) ? "<i class='-to-low'> &nbsp; &#9660;</i>" : "";
            str += delta;
            return str;
        }
    } else {
        return '-';
    }

};
function Modal() {
    "use strict";
    var self = this;

    this.login = document.querySelector('.-login');
    this.registration = document.querySelector('.-registration');
    this.about = document.querySelector('.-about');
    this.outerModal = document.querySelector('.val-modal-login-reg-outer');
    this.rememberPassOrBack = document.querySelectorAll('.-val-remember-pass');
    this.formSubmit = (this.outerModal) ? this.outerModal.querySelectorAll('form') : null;

    this.StaticForm = null;

    this.listen(
        ['click'], 
        [this.login, this.registration, this.about], 
        [this.openForm.bind(this, this.login), this.openForm.bind(this, this.registration), this.openForm.bind(this, this.about)]
        );

    for (var i = 0; i < this.rememberPassOrBack.length; i++) {
        this.listen(['click'], [this.rememberPassOrBack[i]], self.openRememberPassOrBack.bind(self))
    }

    for (var j = 0; j < this.formSubmit.length; j++) {
        this.listen(['click'], [this.formSubmit[j]], self.sendForm.bind(self, this.formSubmit[j].id))
    }

}

Modal.prototype = Object.create(Site.prototype);

Modal.prototype.openForm = function(button, event) {
    "use strict";
    this.contentBox = (typeof button == "object") ? document.querySelector("." + button.getAttribute('data-attr')) : document.querySelector("." + button);
    this.contentBox.style.display = 'block';
    this.outerModal = this.outerModal ? this.outerModal : document.querySelector('.val-modal-login-reg-outer');
    this.outerModal.classList.add('-active-outer')
    this.contentBox.classList.add('-animate-content-window');
    this.closeActivated();
};


Modal.prototype.closeActivated = function(container) {
    "use strict";
    var closeActivated = this.contentBox.querySelector('.val-close-modals__event_closes'),
        self = this;

    this.listen(['click'], [closeActivated], self.closeModal.bind(self));

};

Modal.prototype.closeModal = function() {
    "use strict";
    var self = this;

    this.contentBox.classList.add('-animate-content-window-close');
    self.outerModal.classList.add('-active-outer-out');
    setTimeout(function() {
        self.outerModal.classList.remove('-active-outer', '-active-outer-out');
        self.contentBox.style.display = 'none';
        self.removeClass(self.contentBox, ['-animate-content-window', '-animate-content-window-close']);
    }, 500);

};

Modal.prototype.removeClass = function(element, argumentsArray) {
    "use strict";
    argumentsArray.forEach(function(item) {
        element.classList.remove(item);
    });

};

Modal.prototype.openRememberPassOrBack = function() {
    "use strict";

    var target = event && event.target,
        parent = target.parentNode.parentNode,
        selector = parent.querySelectorAll('form');

    for (var i = 0; i < selector.length; i++) {
        if (window.getComputedStyle(selector[i]).getPropertyValue('display') === 'none') {
            var notice = selector[i].querySelector('.val-notice');
            if (notice) {
                notice.parentNode.removeChild(notice);
            }
            selector[i].style.display = 'block';

        } else {
            selector[i].style.display = 'none';
        }

    }

};

Modal.prototype.sendForm = function(id, event) {
    "use strict";
    event.preventDefault();

    var url = '/site/' + id;
    this.StaticForm = event.target;

    this.Xhr('POST', url, this.StaticForm, this, this.responseFromServer);

};

Modal.prototype.responseFromServer = function(response, self) {
    "use strict";
    if (JSON.parse(response).href) {
        window.location.href = location.protocol + '//' + location.host + JSON.parse(response).href;
    } else {
        self.StaticForm.insertAdjacentHTML('beforeend', '<p class="val-notice">' + JSON.parse(response) + '</p>');
    }

    if (self.StaticForm) {
        self.StaticForm.reset();
    }

};
/*=============================================
=            Section Slider block            =
=============================================*/

function Slider(elem) {
    "use strict";
    if (!elem) {
        return;
    }

    this.list = elem;
    this.countChild = elem.children.length;
    this.width = elem.parentNode.clientWidth;
    this.currentSlide = 0;
    this.timer;

    elem.style.width = this.width * this.countChild + 'px';

    this.createControls(this.countChild);
    this.listen(['mouseenter', 'mouseleave'], [this.list], this.autoStopOrStart.bind(this))

}

Slider.prototype = Object.create(Site.prototype)

Slider.prototype.createControls = function(count) {
    "use strict";
    var constrols = document.querySelector(".val-display-controls"),
        items = "",
        self = this;

    for (var i = 0; i < count; i++) {
        items += (i === 0) ? "<span class='-active-slide' data-slide=" + i + "></span>" : "<span data-slide=" + i + "></span>";
    }

    constrols.insertAdjacentHTML("afterbegin", items);
    this.listen(['click'], [constrols], self._clickSlideHandlers.bind(self));
    this._autoChangeSlide();
    this.controlsBuild = true;

};

Slider.prototype._clickSlideHandlers = function(event) {
    "use strict";
    var target = event.target ? event.target : event,
        self = this,
        clicked = target.getAttribute('data-slide') ? parseInt(target.getAttribute('data-slide')) : null,
        move = null;

    if (clicked == null || target.classList.contains('-active-slide')) {
        return;
    }

    toSlideAnimation(parseInt((-self.width) * clicked), 0.8);
       

    function toSlideAnimation(move, speed) {

        var activeBeforeSlide = document.querySelector(".-active-slide");

        self.list.style.cssText += "transition-duration: " + speed + "s; ";
        self.list.style.cssText += "transform: translateX(" + move + "px)";
        self.currentSlide = clicked;
        self.move = move;

        activeBeforeSlide.parentNode.querySelector("span[data-slide='" + clicked + "']").classList.add("-active-slide");
        activeBeforeSlide.classList.remove("-active-slide");

    }

};

Slider.prototype._autoChangeSlide = function(){
    "use strict";

    var self = this;

    this.timer = setTimeout(function(){
        var active = document.querySelector(".-active-slide"),
            next = active.nextElementSibling ? active.nextElementSibling : active.parentNode.firstElementChild;
        self._clickSlideHandlers(next);
        self._autoChangeSlide();
    }, 6000);

};

Slider.prototype.autoStopOrStart = function(event){

    var self = this,
        type = event.type;

    type == "mouseenter" ?  clearTimeout(self.timer) : self._autoChangeSlide();

};

/*=====  End of Slider block  ======*/

/*=============================================
=            Section IframeGemerate block      =
=============================================*/

function IframeGemerate(element) {
    "use strict";
    if(!element) {
        return false;
    }

    var dataArray = element.getAttribute('data-src').split(','),
        self = this,
        template = '';

    dataArray.forEach(function(item) {
        template += self.template(item);
    });

    element.insertAdjacentHTML('afterbegin', template);

}


IframeGemerate.prototype.template = function(src) {
    "use strict";
    var str = "<div class='val-outer-frame'>" +
        "<span class='val-ico-online'><i>Online</i></span>" +
        "<iframe width='100%' height='270px' src='" + src + "' frameborder='0' allowfullscreen></iframe>" +
        "</div>";

    return str;
};


/*=====  End of IframeGemerate comment block  ======*/
/*=============================================
=            Section MansoryGenerator      =
=============================================*/

function MansoryGenerator(element) {

   if(!element) {
        return;
   }

   [].forEach.call(element, this.generateMansory);
 
}


MansoryGenerator.prototype.generateMansory = function(item){

    var img = item.querySelectorAll('img'),
        count = img.length,
        j = 1,
        classie = item.querySelector('.val-block-multimedia-gallery') ? '.val-block-multimedia-gallery' : '.val-block-multimedia';

    [].forEach.call(img, function(item, i){
        var img = new Image();
            img.src = item.src;

        img.onload = function(){
            StackMansory(this);
        }
    })

    function StackMansory(images){
        delete images;
        if(j < count){
            j++;
        } else {
            new Masonry( item, {
              itemSelector: classie,
              columnWidth: 1
            });

            item.style.opacity = "1";
            if(item.querySelector('.val-block-multimedia-gallery')){
                $(function(){$(classie).imageLightbox()})
            }
            
        }
    }




}

/*=====  End of Section MansoryGenerator block  ======*/

/*=============================================
=            Section Market      =
=============================================*/

function Market(element) {

    if (!element) {
        return;
    }

    this.element = element;
    var child = this.element.children;


    for (var i = 0; i < child.length; i++) {
        this.listen(['mouseenter', 'mouseleave'], [child[i]], this.HandlerToMouseEnterLeave);
    }

}

Market.prototype = Object.create(Site.prototype);

Market.prototype.HandlerToMouseEnterLeave = function() {

    var attr = this.getAttribute('data-attr'),
        block = document.getElementById(attr);

    if (!block) {
        return;
    }

    if (event.type == "mouseenter") {
        block.style.display = "block";
    } else {
        block.style.display = "none";
    }

};



/*=====  End of Section Market block  ======*/

/*=============================================
=            Section MenuButton block      =
=============================================*/

function MenuButton(button, element) {
    "use strict";
    if(!element && !button) {
        return false;
    }

    this.listen(['click'], [button], this.slideMenu.bind(this, element, button));

}

MenuButton.prototype = Object.create(Site.prototype);


MenuButton.prototype.slideMenu = function(element, button) {
    "use strict";

    button.classList.toggle('-val-active-menu-side');
    element.classList.toggle('val-all-outer-animate');

};


/*=====  End of MenuButton comment block  ======*/
function StickyAccordeon(element){
    "use strict";
    if(!element) {
        return;
    }
    var self = this;
    self.accordeon = element.querySelector('.val-accordeons-block');
    self.listen(['scroll'],[window],self.positionOfAccordeon.bind(self))

}

StickyAccordeon.prototype = Object.create(Site.prototype)

StickyAccordeon.prototype.positionOfAccordeon = function () {
    "use strict";
    var elementOuterParent = this.accordeon.parentNode.getBoundingClientRect(),
        footer = document.querySelector('.val-footer').getBoundingClientRect();

    if(elementOuterParent.top <= 30 && footer.top > 450){
        this.accordeon.style.paddingTop = ((-elementOuterParent.top)) +"px";
    } else if(elementOuterParent.top > 30 && this.accordeon.getAttribute('style')) {
        this.accordeon.removeAttribute('style');
    } 

}; 
function weatherForVal(){
    "use strict";
    var url = "https://query.yahooapis.com/v1/public/yql?q=select%20item%20from%20weather.forecast%20where%20woeid%3D918233%20and%20u%3D%22c%22&format=json&l=ru";

    this.Xhr('GET', url, null, this, this.queryForecast);

}

weatherForVal.prototype = Object.create(Site.prototype);

weatherForVal.prototype.generateTemp = function(data, self){
  var forecast = data.forecast,
      now = data.condition.temp,
      structure = self.creaters(forecast);

  var html = '<div class="drop-weather-button">'
              +'<div class="outer-today-ico">'
                  +'<span class="icons-for-c-min icon-weather-min-'+forecast[0].code+'"></span>'
                  +'<i class="today-weather"> '+now+' С°</i>'
              +'</div>'
              +'<div class="drop-wether">'
                  +'<p class="for-genwether"><span class="title-weather">Погода</span><span class="city-weather">Украина, Чернигов</span></p>'
                  +'<div class="section-today">'
                +'<div class="for-weather-icon">'
                  +'<h5 class="section-heading">Сьогодні</h5>'
                  +'<span class="icons-for-c icon-weather-'+forecast[0].code+'"></span>'
                +'</div>'
              +'<div class="weather-detail">'
                  +'<h4 class="weather-heading">'
                      +'<span class="temp-now"> '+now+' С° </span>'
                      +'<span class="phrase"> Температура зараз</span>'
                  +'</h4>'
                  +'<span class="temperature high-temperature">'+forecast[0].high+' С°</span>'
                  +'&nbsp; - &nbsp;'
                  +'<span class="temperature low-temperature">'+forecast[0].low+' С°</span>'
                  +'<p class="summary">'+self.tempDescription(forecast[0].code)+'</p>'
              +'</div>'
                  +'</div>'
                  +'<div class="section-this-week">'
                      +'<h5 class="section-heading">Тиждень</h5>'
                      +'<ul class="item-list-temperature">'
                          + structure
                      +'</ul>'
                  +'</div>'
              +'</div>'
          +'</div>';
  var el = document.querySelector(".outer-for-weather");
  el.insertAdjacentHTML("beforeend", html);
}

weatherForVal.prototype.queryForecast = function(data, self){
  "use strict";
  var datas = JSON.parse(data);
  self.inObject(datas, 'item', self.generateTemp, self); 
};

weatherForVal.prototype.creaters = function(query){
  "use strict";
  var srt = "",
      self = this;
  [].forEach.call(query, function(item, i){
    if(i != 0 && i < 5){
      srt += '<li class="item-time-temperature">'
                +'<span class="icons-for-c icon-weather-'+item.code+'"></span>'
                +'<span class="day">'+self.dayInUkranian(item.day)+'</span>'
                +'<span class="temperature-days high-temperature">'+item.high+' С°</span>'
                +'&nbsp;-&nbsp;'
                +'<span class="temperature-days low-temperature">'+item.low+' С°</span>'
            +'</li>';
    }
  });
  return srt;
};
function FacebookPopUp(){
	"use strict";
	if(!window.localStorage.popUp){
		this.tryToGenerate();
	} else {
		this.time = this.returnDateNow(window.localStorage.time);
		this.now = this.returnDateNow();
		this.results = this.now - this.time;

		if (this.results < 432000000){
			this.tryToGenerate();
		}
	}
}

FacebookPopUp.prototype = Object.create(Modal.prototype);

FacebookPopUp.prototype.tryToGenerate = function(){
		"use strict";
		var d = document, 
			s = 'script', 
			id = 'facebook-jssdk', 
			fjs = d.getElementsByTagName(s)[0], 
			js = d.createElement(s), 
			self = this;
			
			js.id = id;
			js.src = "//connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v2.7&appId=857884574261497";
			

		if (d.getElementById(id)) return;

		fjs.parentNode.insertBefore(js, fjs);


		setTimeout(function(){

			FB.Event.subscribe('edge.create', function(response) {
			  self.closeModal();
			});

			self.openForm('-facebook-open');
			self.addStoryToLocalStorage();

		}, 10000);

}

FacebookPopUp.prototype.addStoryToLocalStorage = function(){
	"use strict";
	var time = this.now ? this.now : this.returnDateNow();

	localStorage.setItem('popUp', true);
	localStorage.setItem('time', time);

}