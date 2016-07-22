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
        [self.openForm.bind(self, this.login), self.openForm.bind(self, this.registration), self.openForm.bind(self, this.about)]
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