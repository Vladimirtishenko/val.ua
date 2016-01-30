$(".str1").liMarquee({
	scrollamount: 35
});

function handlerEvent () {
	

	var elements = document.querySelectorAll(".-click-to-menu"),
		modal = document.querySelector(".modal-background-pop-up");


	for (var i = elements.length - 1; i >= 0; i--) {
		elements[i].addEventListener("click", openModal);
	};
	modal.addEventListener("click", closeModal);

	function openModal () {
		event.preventDefault();

		var modal = this.id,
			elementToShow = $("div[data-attr='"+modal+"']"),
			popUp = $(".modal-background-pop-up");
			popUp.fadeIn(500, function  () {
				elementToShow.slideDown();
				elementToShow.addClass("-active-show-element");
			})
			
	}
	function closeModal () {
		var self = $(this);

		if(event.target != this){return}

		var elementToHide = $(".-active-show-element");
		elementToHide.slideUp(function () {
			elementToHide.removeClass("-active-show-element");
			self.fadeOut();
		})
		
		
	}

}

function handlerEventScroll () {
	if(document.querySelector(".-active-show-element")){
		var elem = document.querySelector(".-active-show-element");
		elem.classList.remove("-active-show-element");
		elem.style.display = "none";
		elem.parentNode.style.display = "none";
	}
}


window.addEventListener("DOMContentLoaded", handlerEvent);
window.addEventListener("scroll", handlerEventScroll);

$(document).ready(function() {
	$(".btnClickMenu").click(function(a) {
		a.preventDefault();
		"-200px" == $(".fixedBlockMenu").css("margin-left") ? (1400 > $(window).width() && $(".main").animate({
			left: "100px"
		}, 100), $(".fixedBlockMenu").animate({
			"margin-left": "0"
		}, 100)) : (1400 > $(window).width() && $(".main").animate({
			left: "0"
		}, 100), $(".fixedBlockMenu").animate({
			"margin-left": "-200px"
		}, 100))
	});
	$("#region").click(function(a) {
		a.preventDefault();
		$("#forRegion").slideToggle()
	});
	$(".noneEmpty").parents().css("background", "none");
	$(".btnSubscribe").on("click", function(a) {
		a.preventDefault();
		"none" == $(".emailSub").css("display") ? $(".emailSub").slideDown("slow", function() {
			$(".fadeOnToogle").animate({
				opacity: 1
			}, 700)
		}) : $(".fadeOnToogle").animate({
			opacity: 0
		}, 700, function() {
			$(".emailSub").slideUp("slow")
		})
	})
});
