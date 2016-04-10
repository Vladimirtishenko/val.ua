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

    this.login.addEventListener('click', self.openForm.bind(self, this.login));
    this.registration.addEventListener('click', self.openForm.bind(self, this.registration));
    this.about.addEventListener('click', self.openForm.bind(self, this.about));

    for (var i = 0; i < this.rememberPassOrBack.length; i++) {
        this.rememberPassOrBack[i].addEventListener('click', self.openRememberPassOrBack.bind(self));
    }

    for (var j = 0; j < this.formSubmit.length; j++) {
        this.formSubmit[j].addEventListener('submit', self.sendForm.bind(self, this.formSubmit[j].id));
    }

}

Modal.prototype = Object.create(Site.prototype);

Modal.prototype.openForm = function(button, event) {
    "use strict";
    this.contentBox = document.querySelector("." + button.getAttribute('data-attr'));
    this.contentBox.style.display = 'block';
    this.outerModal.classList.add('-active-outer');
    this.contentBox.classList.add('-animate-content-window');
    this.closeActivated();
};


Modal.prototype.closeActivated = function(container) {
    "use strict";
    var closeActivated = this.contentBox.querySelector('.val-close-modals'),
        self = this;

    closeActivated.addEventListener('click', self.closeModal.bind(self));

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

    for (var i = 0; i < this.formSubmit.length; i++) {
        if (window.getComputedStyle(this.formSubmit[i]).getPropertyValue('display') === 'none') {
            var notice = this.formSubmit[i].querySelector('.val-notice');
            if (notice) {
                notice.parentNode.removeChild(notice);
            }
            this.formSubmit[i].style.display = 'block';

        } else {
            this.formSubmit[i].style.display = 'none';
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