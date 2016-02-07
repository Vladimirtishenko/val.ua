function Slider(elem){

	if(!elem) return;

	this.list = elem;
	this.countChild = elem.children.length;
	this.width = parseInt(window.getComputedStyle(elem.parentNode).getPropertyValue('width'));
	this.move = 0;
	this.currentSlide = 0;

	elem.style.width = this.width*this.countChild+'px';

	[].forEach.call(elem.children, staticSize)

    function staticSize(item, i) {
        item.setAttribute("data-slides-number", i)
    }

	this.createControls(this.countChild)

}


Slider.prototype.createControls = function(count) {
    var constrols = document.querySelector(".val-display-controls"),
        items = "",
        self = this;

    for (var i = 0; i < count; i++) {
        items += (i == 0) ? "<span class='-active-slide' data-slide=" + i + "></span>" : "<span data-slide=" + i + "></span>";
    };

    constrols.insertAdjacentHTML("afterbegin", items);
    constrols.addEventListener("click", self._clickSlideHandlers.bind(self));
    this.controlsBuild = true;



}

Slider.prototype._clickSlideHandlers = function(event) {
    var target = event.target ? event.target : event,
        self = this,
        clicked = parseInt(target.getAttribute('data-slide'));

    if (clicked > this.currentSlide) {
        if ((this.currentSlide + 1) < clicked) {
            var move = parseInt((-self.width) * clicked);
            toSlideAnimation(move, 0.5);
        } else {
            var move = parseInt(self.move) + parseInt(-self.width)
            toSlideAnimation(move, 0.8);
        }

    } else {
        if ((this.currentSlide - 1) > clicked) {
            var move = parseInt((-self.width) * clicked)
            toSlideAnimation(move, 0.5);
        } else {
            var move = parseInt(self.move) + parseInt(self.width)
            toSlideAnimation(move, 0.8);
        }
    }

    function toSlideAnimation(move, speed) {

        var activeBeforeSlide = document.querySelector(".-active-slide");

        console.log(activeBeforeSlide);
        console.log(clicked);

        self.list.style.cssText += "transition-duration: " + speed + "s; ";
        self.list.style.cssText += "transform: translateX(" + move + "px)";
        self.currentSlide = clicked;
        self.move = move;

        activeBeforeSlide.parentNode.querySelector("span[data-slide='" + clicked + "']").classList.add("-active-slide");
        activeBeforeSlide.classList.remove("-active-slide");

    }

}

function IframeGemerate(element){

    var dataArray = element.getAttribute('data-src').split(','),
        self = this,
        template = '';

    dataArray.forEach(function (item) {
        template += self.template(item);
    })

    element.insertAdjacentHTML('afterbegin', template);

}


IframeGemerate.prototype.template = function (src) {
    var str = "<div class='val-outer-frame'>" +
                "<span class='val-ico-online'><i>Online</i></span>" +
                "<iframe width='100%' height='270px' src='"+src+"' frameborder='0' allowfullscreen></iframe>" +
              "</div>";

    return str;
}


function AjaxLoadCategory (element) {
    var self = this;

    this.state = true;
    this.count = 1;
    this.container = element;

    window.addEventListener('scroll', self.scrollHandler.bind(self));
}

AjaxLoadCategory.prototype.scrollHandler = function () {

    if (document.body.offsetHeight - 500 < window.scrollY + window.innerHeight && this.state && this.count < 10) {
        if(this.count == 7){
           this.count++; 
        }
        this.state = false;
        this.XhrConstructor(this.count);
    }

}

AjaxLoadCategory.prototype.XhrConstructor = function (id) {
    
    var xhr = new XMLHttpRequest(),
        self = this;

    xhr.onreadystatechange = function (argument) {
        if(xhr.status == 200 && xhr.readyState == 4){

            var response = JSON.parse(xhr.responseText),
                news = JSON.parse(response.news),
                category = JSON.parse(response.category),
                lang = response.language;

            self.templateCategory(news, category, lang);
        }
    }

    xhr.open('GET', '/site/GetCategory?id='+id, true)
    xhr.send(null);

}

AjaxLoadCategory.prototype.templateCategory = function (news, category, lang) {

    var self = this,
        str = '<div class="val-category-block"><h2 class="val-title-uppercase-with-line">'+category[0]['name_'+lang]+'</h2><div class="val-news-list-category">';
        

    for (var i = 0; i < news.length; i++) {
        if(i == 0){
            str += self.templateImage(news[i], lang);
        } else {
            str += self.templateWithoutImage(news[i], lang);
        }
    };
        


    str += '</div></div>';  

    self.container.insertAdjacentHTML('beforeend', str);

    this.state = true;
    this.count++;

}

AjaxLoadCategory.prototype.templateImage = function (arrays, lang) {

    console.log(arrays);

    var template = '<a href="/site/news/'+arrays.id+'" class="val-news-item-category val-category-image">' +
                        '<div class="val-item-outer-category-image">' +
                            '<img src="/uploads/news/thumb/'+arrays.image+'" alt="'+arrays['title_'+lang]+'">' +
                        '</div>' +
                        '<div class="val-line-vews-data">' +
                            '<span class="val-content-news-data">'+arrays.date+'</span>' +
                            '<span class="val-news-view">'+arrays.views+'</span>' +
                        '</div>' +
                        '<h2 class="val-title-news-category">'+arrays['title_'+lang]+'</h2>' +
                    '</a>';

    return template;
}

AjaxLoadCategory.prototype.templateWithoutImage = function (arrays, lang) {
    var template = '<a href="/site/news/'+arrays.id+'" class="val-news-item-category">'+ 
                        '<div class="val-line-vews-data">'+
                            '<span class="val-content-news-data">'+arrays.date+'</span>'+
                            '<span class="val-news-view">'+arrays.views+'</span>'+
                        '</div>'+
                        '<h2 class="val-title-news-category">'+arrays['title_'+lang]+'</h2>'+
                        '<p class="val-description-news-category">'+arrays['description_'+lang].slice(0,250)+'...</p>'+
                    '</a>';

    return template;
}


function handlerAllStart(){
	new Slider(document.querySelector('.val-list-slider'));
    new IframeGemerate(document.querySelector('.val-iframe-streams'));
    new AjaxLoadCategory(document.querySelector('.val-full-width-category'))
}


window.addEventListener('DOMContentLoaded', handlerAllStart)