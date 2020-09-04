$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();
    var morrisLine;

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        getSteps(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
    }

    function initMorris() {
        morrisLine = Morris.Bar({
            element: 'chartbars',
            xkey: 'step_date',
            xLabelMargin: 1,
            xLabelAngle: 70,
            ykeys: ['steps'],
            labels: ['Steps'],
            smooth: true,
            resize: true
        });
    }

    function setMorris(data) {
        morrisLine.setData(data);
    }

    function initDatePicker() {
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);


        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          getSteps(picker.startDate.format('YYYY-MM-DD'), picker.endDate.format('YYYY-MM-DD'));
        });

        cb(start, end);
    }

    function getTotalStepsNumber(data) {
        var totalSteps = 0;
        var sadface = '';

        data.forEach(function(item, index) {
            totalSteps = +totalSteps + +item.steps;
        });

        if (totalSteps == 0) {
            sadface = ' 😔'; // Should walk! Right?
        }

        $('.total_steps span').html(totalSteps + sadface);
    }


    function getSteps(from, to) {
        $.ajax({
            url: 'steps/getStepsAjax',
            dataType: 'json',
            data: {from: from, to: to},
            type: 'POST'
        })
        .done(function(data) {
            setMorris(data);
            getTotalStepsNumber(data);
        })
        .fail(function(data) {
            console.log("error" + data);
        });
    }

    initMorris();
    initDatePicker();
    

});