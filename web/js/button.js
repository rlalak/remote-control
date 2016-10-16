var Button = function ($button) {
    var priv = {};
    var self = this;

    priv.$button = $button;
    priv.previous_label = null;

    priv.initialize = function () {
        priv.bindClick();
    };

    self.loadStatus = function () {
        priv.setLoading();

        $.ajax('/ajax/status.php', {
            data: priv.getAjaxData(),
            timeout: 5000,
            async: true,
            success: function (response) {
                priv.removeLoading();

                priv.handleResponse(response);
            },
            error: function () {
                priv.removeLoading();
            }
        });
    };

    priv.bindClick = function () {
        priv.$button.click(function () {
            if (priv.$button.hasClass('loading')) {
                return;
            }

            priv.changeStatus();
        });
    };

    priv.changeStatus = function () {
        priv.setLoading();

        $.ajax('/ajax/toogle.php', {
            data: priv.getAjaxData(),
            timeout: 5000,
            async: true,
            success: function (response) {
                priv.removeLoading();

                priv.handleResponse(response);
            },
            error: function () {
                priv.removeLoading();
            }
        });
    };

    priv.handleResponse = function (response) {
        if (response == '1') {
            priv.setOn();
        } else if (response == '0') {
            priv.setOff();
        }
    };

    priv.getAjaxData = function () {
        return {
            id: priv.$button.data('id')
        };
    };

    priv.setOn = function () {
        priv.$button.removeClass('button-off');
        priv.$button.addClass('button-on');
        priv.$button.html('on');
    };

    priv.setOff = function () {
        priv.$button.removeClass('button-on');
        priv.$button.addClass('button-off');
        priv.$button.html('off');
    };

    priv.setLoading = function () {
        priv.$button.addClass('loading');
        priv.previous_label = priv.$button.html();
        priv.$button.html('');
    };

    priv.removeLoading = function () {
        priv.$button.removeClass('loading');

        if (null !== priv.previous_label) {
            priv.$button.html(priv.previous_label);
        }
    };

    priv.initialize();
};

