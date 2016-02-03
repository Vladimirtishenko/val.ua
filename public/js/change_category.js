function change_cat_try(){

	var el = document.querySelectorAll(".listCategoryUnit");

	if(el){
		for (var i = 0; i < el.length; i++) {
			var heightH3 = el[i].querySelector("h3").clientHeight,
				nexth3Elem = el[i].querySelector("h3").nextElementSibling;
			
				console.log(heightH3);

			if(heightH3 == 50){
				nexth3Elem.style.height = "110px";
			}else if(heightH3 == 65){
				nexth3Elem.style.height = "97px";
			}else if(heightH3 == 80){
				nexth3Elem.style.height = "80px";
			}else if(heightH3 == 35){
				nexth3Elem.style.height = "129px";
			}
			
		};
	}

}

window.addEventListener("DOMContentLoaded", change_cat_try);
