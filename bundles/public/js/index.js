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

        var cleanInput = function(e){
            var chars = [127,8,37,38,39,40,44,46];
            var charCode = e.which || e.keyCode;
            if ( charCode == 13 ) {
                e.preventDefault();
                that.trigger('calculate');
            } else if ((charCode < 48 || charCode > 57) && chars.indexOf(charCode) == -1) {
                e.preventDefault();
            }
        }

        $('#weight')
            .on('keypress', function(e){
                cleanInput(e)
            })
            .on('focusout', function(e){
                that.trigger('calculate');
            })
            .focus()
            .siblings('input[type=button]').on('click', function(e){
                    cleanInput(e)
            });

        this.on('calculate', function(){
            var value = parseFloat($('#weight').val().replace(',', '.') || 0);
            if (value){
                $('#weight').val(value);
                that.find('#carbone-weight').html(value);
            }

            if (value >= 0.05 && value <= 15000) {
                var isDaily = (value >= 0.05 && value <= 55);

                for (var i in regions) {
                    that.find('.'+i+' .percent').html(count(value, regions[i], isDaily)+ '%');
                }

                if (isDaily) {
                    that.find('.clock').hide();
                    that.find('.yearly').hide();
                    that.find('.calendar').show();
                    that.find('.daily').show();
                } else {
                    that.find('.calendar').hide();
                    that.find('.daily').hide();
                    that.find('.clock').show();
                    that.find('.yearly').show();
                }

                that.find('.global').show();
                that.find('.europe').hide();
                that.find('.usa').hide();
                that.find('.earth').hide();
                that.find('.tabs li.active').removeClass('active');
                that.find('.tabs li[data-region=global]').addClass('active');
                that.find('.results').show();
                that.find('#ask-value').show();
            } else {
                that.find('.earth').show();
                that.find('#ask-value').hide();
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