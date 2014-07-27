(function( $ ){

    $.fn.carbone = function(opts) {

        var that = this;
        var regions = {
            global: 5.0242214532872,
            europe: 7.97297297297297,
            usa: 11.537734064687
        };

        var count = function(userValue, regionValue, daily) {
            var num = 2;
            if (userValue > 0.1 && userValue <= 0.3) {
                num = 1;
            } else if (userValue > 0.3 && userValue <= 55) {
                num = 0;
            } else if (userValue > 55 && userValue <= 120) {
                num = 1;
            } else if (userValue > 120 && userValue <= 15000) {
                num = 0;
            }
            if (daily) {
                return (userValue*100 / (regionValue*1000/365)).toFixed(num);
            } else {
                return (userValue*100 / (regionValue*1000)).toFixed(num);
            }
        }

        this.find('#carbone').on('keypress', function(e){
            if ( e.which == 13 ) {
                e.preventDefault();
                that.trigger('calculate');
            } else if ((e.which < 48 || e.which > 57) && e.which != 46) {
                e.preventDefault();
            }
        })
        .on('focusout', function(e){
            that.trigger('calculate');
        })
        .focus();

        this.on('calculate', function(){
            var value = parseFloat(that.find('#carbone').val());

            if (value >= 0.05 && value <= 55) {
                for (var i in regions) {
                    that.find('.'+i+' .percent').html(count(value, regions[i], true)+ '%');
                }
                that.find('.global').show();
                that.find('.europe').hide();
                that.find('.usa').hide();
                that.find('.clock').hide();
                that.find('.yearly').hide();
                that.find('.calendar').show();
                that.find('.daily').show();
                that.find('.earth').hide();
                that.find('.tabs li.active').removeClass('active');
                that.find('.tabs li[data-region=global]').addClass('active');
                that.find('.results').show();
            } else if (value > 55 && value <= 15000) {
                for (var i in regions) {
                    that.find('.'+i+' .percent').html(count(value, regions[i], false)+ '%');
                }
                that.find('.global').show();
                that.find('.europe').hide();
                that.find('.usa').hide();
                that.find('.calendar').hide();
                that.find('.daily').hide();
                that.find('.clock').show();
                that.find('.yearly').show();
                that.find('.tabs li.active').removeClass('active');
                that.find('.tabs li[data-region=global]').addClass('active');
                that.find('.earth').hide();
                that.find('.results').show();
            } else {
                that.find('.earth').show();
                if (value === 0) {
                    that.find('.warning').hide();
                } else{
                    that.find('.warning').show();
                }
                that.find('.results').hide();
            }
        });

        this.find('.tabs li').on('click', function(e) {
            that.find('.tabs li.active').removeClass('active');
            $(this).addClass('active');
            that.find('.slide').hide();
            $('.'+$(this).attr('data-region')).show();
        });
    };

})( jQuery );

$(function(){
    $('#climate-change').carbone();
});