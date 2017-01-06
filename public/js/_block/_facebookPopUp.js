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

		}, 5000);

}

FacebookPopUp.prototype.addStoryToLocalStorage = function(){
	"use strict";
	var time = this.now ? this.now : this.returnDateNow();

	localStorage.setItem('popUp', true);
	localStorage.setItem('time', time);

}