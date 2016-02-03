"use strict";
function valTopSlider(el, count, width, height, mrgl, control) {
    var slider = {
        element: document.querySelector("." + el),
        state: true,
        action: function() {
            var elChildren = this.element.children,
                elLenght = elChildren.length,
                controls = document.querySelectorAll(control);

            this.element.style.width = ((width + mrgl + 2) + 1) * elLenght + "px";
            for (var i = 0; i < elLenght; i++) {
                elChildren[i].style.cssText = "width: " + width + "px; height: " + height + "px; margin-right: " + mrgl + "px;";
            }
            for (var j = 0; j < controls.length; j++) {
                controls[j].addEventListener("click", slider.handlerEvent);
            }

            if (this.element.classList.contains("val-list-blog-slider")) {
                var elP = this.element.querySelectorAll("p");
                for (var s = 0; s < elP.length; s++) {
                    var str = elP[s].innerHTML;
                    var newStr = str.substring(0, 50);
                    elP[s].innerHTML = newStr + "...";
                }
            }

            slider.element.previousElementSibling.style.opacity = 0;
            setTimeout(function() {
                slider.element.previousElementSibling.style.display = "none";
            }, 2000);

            if(slider.element.classList.contains("val-list-slider")){
            	slider.intervalEvent();
            	var hoverEl = document.querySelector(".val-outer-slider");
            	hoverEl.addEventListener("mouseover", slider.hoverIn);
            	hoverEl.addEventListener("mouseout", slider.hoverOut);
            }
        },
        hoverIn: function(event){
        	clearInterval(_timer);
        },
        hoverOut: function(event){
        	slider.intervalEvent();
        },
        intervalEvent: function(){
        	_timer = setTimeout(function(){
        			slider.handlerEvent(null,"next");
        			slider.intervalEvent();
        	},3000)
        },
        handlerEvent: function(event, state) {
            if (slider.state === false) {
                return;
            }
            slider.state = false;
            var target = (event != null) ? event.target : state,
                attr = (state != null) ? state : target.getAttribute("data-arrow"),
                elChildren = slider.element.children,
                elLenght = elChildren.length;

            if (attr == "next") {
                slider._movenHelper(-(width + mrgl + 2));
                setTimeout(function() {
                    slider.element.appendChild(slider.element.firstElementChild);
                    slider.element.removeAttribute("style");
                    slider.element.style.width = (width + mrgl + 2) * elLenght + "px";
                    slider.state = true;
                }, 1000);

            } else {
                slider.element.style.left += -(width + mrgl + 2) + "px";
                slider.element.insertBefore(slider.element.lastElementChild, slider.element.firstElementChild);
                slider._movenHelper((width + mrgl + 2));
                setTimeout(function() {
                    slider.element.removeAttribute("style");
                    slider.element.style.width = (width + mrgl + 2) * elLenght + "px";
                    slider.state = true;
                }, 1000);
            }
        },
        _movenHelper: function(l) {

            move.defaults = {
                duration: 400
            }

            move("." + el)
                .ease('in-out')
                .add('left', l)
                .end();
        }

    },
    _timer;
    slider.action();
}


function sliderGrid(el, controls) {

    var objGrid = {
        state: true,
        action: function() {
            var element = document.querySelectorAll(el);
            for (var i = element.length - 1; i >= 0; i--) {
                var control = element[i].parentNode.querySelectorAll(controls),
                    dataCount = parseInt(element[i].getAttribute("data-count"));

                for (var s = 1; s < dataCount; s++) {
                    if (element[i].firstElementChild.nodeName != "A") {
                        break;
                    }
                    var block = document.createElement("div");
                    block.classList.add("item-n-" + s);
                    element[i].appendChild(block);
                    for (var j = 0; j < (dataCount * 2); j++) {
                        if (element[i].firstElementChild.nodeName == "A") {
                            block.appendChild(element[i].firstElementChild);
                        }
                    }
                }
                element[i].firstElementChild.classList.add("-el-active-grid");
                element[i].firstElementChild.style.cssText = "opacity: 1; z-index: 2";

                for (var f = control.length - 1; f >= 0; f--) {
                    control[f].addEventListener("click", objGrid.handlerClick);
                }
                element[i].addEventListener("mouseover", objGrid.hoverIn);
                element[i].addEventListener("mouseout", objGrid.hoverOut);

            }
        },
        handlerClick: function(event) {
            if (objGrid.state === false) {
                return;
            }
            objGrid.state = false;
            var target = event.target,
                genEl = target.parentNode.querySelector(el),
                activeEl = target.parentNode.querySelector(".-el-active-grid"),
                _timer,
                elAnim;


            if (target.getAttribute("data-arrow") == "next") {
                elAnim = (activeEl.nextElementSibling) ? activeEl.nextElementSibling : genEl.firstElementChild;
            } else {
                elAnim = (activeEl.previousElementSibling) ? activeEl.previousElementSibling : genEl.lastElementChild;
            }

            elAnim.style.opacity = 1;
            elAnim.classList.add("-el-active-grid");
            activeEl.style.opacity = 0;
            _timer = setTimeout(function() {
                objGrid.endOfAnimationHandler(activeEl, elAnim);
            }, 1000);
        },
        endOfAnimationHandler: function(activeEl, elAnim) {
            activeEl.removeAttribute("style");
            activeEl.classList.remove("-el-active-grid");
            elAnim.style.zIndex = "2";
            objGrid.state = true;
        },
        hoverIn: function(event) {
            var target = event.target;
            if (target.nodeName == "SPAN" || target.parentNode.nodeName == "SPAN") {
                var trg = (target.nodeName == "SPAN") ? target : target.parentNode;
                trg.style.top = "-100px";
            }


        },
        hoverOut: function(event) {
            var target = event.target;
            if (target.nodeName == "SPAN" || target.parentNode.nodeName == "SPAN") {
                var trg = (target.nodeName == "SPAN") ? target : target.parentNode;
                trg.style.top = "0px";
            }
        }
    };

    objGrid.action();

}


window.addEventListener("DOMContentLoaded", function() {
    if (document.querySelector(".val-list-slider")) {
        valTopSlider("val-list-slider", 3, 205, 290, 10, ".val-controls");
    }
    if (document.querySelector(".val-list-blog-slider")) {
        valTopSlider("val-list-blog-slider", 2, 311, 130, 10, ".val-blog-controls");
    }
    if (document.querySelector(".val-inner-grid")) {
        sliderGrid(".val-inner-grid", ".controls-grid");
    }
});