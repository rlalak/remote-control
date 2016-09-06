var Plan = function () {
    var priv = {};
    var self = this;

    priv.plan_prefix = 'background-';
    priv.plan_suffix = '.png';

    priv.plans = {
        //1: {width: 600, height: 582},
        2: {width: 1199, height: 1163},
        //3: {width: 2399, height: 2326}
    };

    priv.current_plan = 2;
    priv.zoom = 1;

    priv.$img = null;

    priv.initialize = function () {
        priv.$img = $('#plan');

        $('.zoom-in').click(function () {
            self.zoomIn();
        });

        $('.zoom-out').click(function () {
            self.zoomOut();
        });

        priv.setPlan(priv.current_plan);

        priv.calculateSize();
        priv.calculateButtonsPositions();
    };

    priv.setPlan = function (plan_number) {
        priv.current_plan = plan_number;

        setTimeout(function(){
            priv.$img.attr('src', priv.plan_prefix + plan_number + priv.plan_suffix);
        }, 100);
    };

    self.zoomIn = function () {
        priv.zoom += 0.1;

        priv.calculateSize();
        priv.calculateButtonsPositions();
    };

    self.zoomOut = function () {
        priv.zoom -= 0.1;

        priv.calculateSize();
        priv.calculateButtonsPositions();
    };

    priv.calculateButtonsPositions = function()
    {
        $('.button').each(function(key, button){
            var $button = $(button);

            var left = $button.attr('left');
            var top = $button.attr('top');

            $button.css('left', left * priv.zoom);
            $button.css('top', top * priv.zoom);
        });
    };

    priv.calculateSize = function () {
        var min_width = null;
        var max_width = null;

        var width = priv.getWidth();
        var height = priv.getHeight();

        if (priv.plans[priv.current_plan - 1]) {
            min_width = priv.plans[priv.current_plan - 1].width// + priv.plans[priv.current_plan].width
            //min_width /= 2;

            if (width <= min_width) {
                console.log('to small')

                priv.zoom = width / priv.plans[priv.current_plan - 1].width;
                priv.setPlan(priv.current_plan - 1);
                //width = priv.getWidth();
            }
        }

        if (priv.plans[priv.current_plan + 1]) {
            max_width = priv.plans[priv.current_plan].width// + priv.plans[priv.current_plan + 1].width
            //max_width /= 2;

            if (width > max_width) {
                console.log('to large')

                priv.zoom = width / priv.plans[priv.current_plan + 1].width;
                priv.setPlan(priv.current_plan + 1);
                //width = priv.getWidth();
            }
        }

        priv.$img.width(width);
        priv.$img.width(height);
    };

    priv.getWidth = function () {
        return priv.plans[priv.current_plan].width * priv.zoom;
    };

    priv.getHeight = function () {
        return priv.plans[priv.current_plan].height * priv.zoom;
    }

    priv.initialize();
};

