"use strict";
function sliderPhotoSingle(el, prew, num, w) {
    var slideOnePhoto = {
        action: function() {
            var genEl = document.querySelector(el),
                preloads = document.querySelector(".-val-outer-all-slider"),
                prewie = document.querySelector(prew),
                ctrlPrew = document.querySelectorAll(".-conrols"),
                resizeBlock = prewie.firstElementChild,
                chLenght = genEl.children.length,
                prevOverflow = (chLenght < num) ? w * chLenght : w * num;
            genEl.firstElementChild.style.display = "table";
            genEl.firstElementChild.classList.add("-active-photo");
            prewie.style.width = prevOverflow + "px";
            resizeBlock.style.width = w * chLenght + "px";
            for (var i = 0; i < chLenght; i++) {
                var node = genEl.children[i].firstElementChild,
                    dupNode = node.cloneNode(true);
                resizeBlock.appendChild(dupNode);
            }
            for (var j = 0; j < resizeBlock.children.length; j++) {
                if (j === 6) {
                    break;
                }
                if (j === 0) {
                    resizeBlock.children[j].classList.add("-active-wiewport");
                }
                resizeBlock.children[j].classList.add("-viewport");
            }
            for (var l = 0; l < ctrlPrew.length; l++) {
                ctrlPrew[l].addEventListener("click", slideOnePhoto.eventClick);
            }
            for (var k = resizeBlock.children.length - 1; k >= 0; k--) {
                resizeBlock.children[k].addEventListener("click", function() {
                    slideOnePhoto.eventClick(event, this);
                });
            }
            preloads.firstElementChild.style.opacity = 0;
            setTimeout(function() {
                preloads.firstElementChild.style.display = "none";
            }, 600);

        },
        eventClick: function(event, stat) {
            var target = (!stat) ? event.target.getAttribute("data-arrow") : stat,
                controls = document.querySelectorAll(".-conrols"),
                elActive = document.querySelector(".-active-wiewport"),
                nextEl = elActive.nextElementSibling ? elActive.nextElementSibling : null,
                prevEl = elActive.previousElementSibling ? elActive.previousElementSibling : null,
                nextViewport = (!nextEl) ? null : (nextEl.classList.contains("-viewport")) ? "inView" : "noView",
                prevViewport = (!prevEl) ? null : (prevEl.classList.contains("-viewport")) ? "inView" : "noView";
            for (var i = controls.length - 1; i >= 0; i--) {
                controls[i].style.display = "block";
            }

            if (target == "next") {
                if (!nextEl.nextElementSibling) {
                    slideOnePhoto._tryHandlerHide("next");
                }
                if (nextViewport == "inView") {
                    slideOnePhoto._changeHelperView(elActive, nextEl, false);
                } else {
                    slideOnePhoto._changeHelperView(elActive, nextEl, true, "next");
                }
            } else if (target == "prevent") {
                if (!prevEl.previousElementSibling) {
                    slideOnePhoto._tryHandlerHide("prevent");
                }
                if (prevViewport == "inView") {
                    slideOnePhoto._changeHelperView(elActive, prevEl, false);
                } else {
                    slideOnePhoto._changeHelperView(elActive, prevEl, true, "prevent");
                }
            } else {
                slideOnePhoto._changeHelperView(elActive, target, false);
            }

            var dir = document.querySelector(".-val-outer-all-slider");
            $('html, body').animate({scrollTop: $(dir).offset().top}, 800);

        },
        _changeHelperView: function(elActive, nextEl, state, dir) {
            if (state) {
                nextEl.classList.add("-viewport");
                if (dir == "next") {
                    slideOnePhoto._tryElHelper();
                } else {
                    slideOnePhoto._tryElHelperReverse();
                }
            }
            elActive.classList.remove("-active-wiewport");
            nextEl.classList.add("-active-wiewport");
            var dataNum = nextEl.getAttribute("data-num"),
                dataBeforeNum = document.querySelector(".-active-photo"),
                genEl = document.querySelector(el),
                trueElem = genEl.querySelector("[data-num='" + dataNum + "']");
            dataBeforeNum.style.display = "none";
            dataBeforeNum.classList.remove("-active-photo");
            trueElem.parentNode.style.display = "table";
            trueElem.parentNode.classList.add("-active-photo");
        },
        _tryElHelper: function() {
            var el = document.querySelector(".-overflow-previe");
            for (var i = 0; i < el.children.length; i++) {
                if (el.children[i].classList.contains("-viewport")) {
                    el.children[i].classList.remove("-viewport");
                    break;
                }
            }
            if (isNaN(parseInt(el.style.left))) {
                slideOnePhoto._moveHelper(-110);
            } else {
                slideOnePhoto._moveHelper(-110);
            }
        },
        _tryElHelperReverse: function() {
            var el = document.querySelector(".-overflow-previe");
            for (var i = el.children.length - 1; i >= 0; i--) {
                if (el.children[i].classList.contains("-viewport")) {
                    el.children[i].classList.remove("-viewport");
                    break;
                }
            }
            slideOnePhoto._moveHelper(110);
        },
        _tryHandlerHide: function(data) {
            var controls = document.querySelectorAll("[data-arrow='" + data + "']");
            for (var i = controls.length - 1; i >= 0; i--) {
                controls[i].style.display = "none";
            }
        },
        _moveHelper: function(l) {
            move.defaults = {
                duration: 400
            }
            move(".-overflow-previe")
                .ease('in-out')
                .add('left', l)
                .end();
        }
    }
    slideOnePhoto.action();
}

window.addEventListener("DOMContentLoaded", function() {
    if (document.querySelector(".val-outer-slide")) {
        sliderPhotoSingle(".val-outer-slide", ".val-peview", 6, 110);
    }
});