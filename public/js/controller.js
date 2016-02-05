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


        console.log(this.currentSlide);
        console.log(clicked);

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


function handlerAllStart(){
	new Slider(document.querySelector('.val-list-slider'));
}


window.addEventListener('DOMContentLoaded', handlerAllStart)