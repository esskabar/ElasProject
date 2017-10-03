'use strict';

(function($) {



    function Holidays(){
        var self = this;
        self.options = {
            cssActiveClass: 'holiday'
        };
        self.$datePicker = $(".holidays-datepicker");
        self.$yearPicker = $(".holidays-year-picker");
        self.$config = $('#holidays-config');
        self.$holidaysData = $('#holidays-data');

        self.holidays = self.config().holidays;
        self.initialize();
    }

    Holidays.prototype.initialize = function(){
        var self = this;

        self.initializeDatePicker();
        self.initializeYearPicker();
    };

    Holidays.prototype.initializeDatePicker = function(){
        var self = this;
        self.$datePicker.datepicker({
            numberOfMonths: 12,
            defaultDate: '2016-01-01',
            showWeek: true,
            beforeShowDay: function(date){
                return [true, self.isHoliday(date) ? "holiday" : "", ""];
            },
            onSelect: function(date, object){
                self.toggleDate(date)
            }
        });
    };

    Holidays.prototype.initializeYearPicker = function(){
        var self = this;
        self.$yearPicker.on('change', onChange);
        onChange();

        function onChange(){
            self.$datePicker.datepicker('setDate', self.$yearPicker.val() + '-01-01');
        }
    };

    Holidays.prototype.isHoliday = function(date){
        var self = this;
        var holiday = self.find(date);

        if (holiday){
            return !holiday._destroy;
        }else{
            return false;
        }
    };

    Holidays.prototype.find = function(date){
        var self = this;
        var dateStr = moment(date).format('YYYY-MM-DD');
        var items = self.holidays.filter(function(holiday){
            return holiday.at == dateStr;
        });

        return items.length > 0 ? items[0] : null;
    };

    Holidays.prototype.delete = function(date){
        var self = this;
        var holiday = self.find(date);

        if (holiday.id){
            holiday._destroy = true;
        }else{
            self.holidays.splice(self.holidays.indexOf(holiday), 1);
        }
        self.prepairForm();
    };

    Holidays.prototype.create = function(date){
        var self = this;
        var holiday = self.find(date);

        if (holiday){
            delete holiday._destroy;
        }else{
            self.holidays.push({
                at: date
            });
        }
        self.prepairForm();
    };

    Holidays.prototype.config = function(){
        var self = this;
        return $.parseJSON( self.$config.html() );
    };

    Holidays.prototype.prepairForm = function(){
        var self = this;
        self.$holidaysData.val(JSON.stringify(self.holidays));
    };

    // return boolean
    // MUST return is it holiday or not for now
    Holidays.prototype.toggleDate = function(date){
        var self = this;
        var holiday = self.find(date);

        if (holiday && !holiday._destroy){
            self.delete(date);
            return false;
        }else{
            self.create(date);
            return true;
        }
    };



    $(document).on('ready page:load', function(){


        if ($(".holidays-content").length <= 0){
            return false;
        }

        window.holidays = new Holidays();
    });
    $( document ).ready(function() {

      //  $('#datepicker_admin').multiDatesPicker('gotDate', new Date());

    });
})(jQuery);