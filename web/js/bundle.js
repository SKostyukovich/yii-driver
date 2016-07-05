'use strict';
(function () {
    var selectElement = document.getElementById('order-status');
    selectElement.addEventListener('change', function (e) {
        switch(e.target.value) {
            case '1':
                this.className = 'form-control btn-success';
                break;
            case '2':
                this.className = 'form-control btn-danger';
                break;
            case '3':
                this.className = 'form-control btn-warning';
        }});
})();

