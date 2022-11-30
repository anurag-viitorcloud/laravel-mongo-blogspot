"use strict";
// Class Definition
let chartsJSGraphWidget = {
    optionsData: null,
    chart: null,
    skeleton: function (response) {
        console.log(response.data);
        let options = {
            series: response.data,
            chart: {
                height: 350,
                type: chartsJSGraphWidget.optionsData.type,
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight',
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                // title: {
                //     text: 'Months'
                // },
                categories: response.categories,
            },
            colors: chartsJSGraphWidget.optionsData.colors
        };
        chartsJSGraphWidget.chart = new ApexCharts(document.querySelector(chartsJSGraphWidget.optionsData.element), options);
        return chartsJSGraphWidget.chart.render();
    },
    get: function (filter = {}) {
        let loader = chartsJSGraphWidget.optionsData.loaderClass;
        $.ajax({
            url: chartsJSGraphWidget.optionsData.url,
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            async: false,
            data: filter,
            beforeSend: function () {
                if (loader) {
                    $(loader).show();
                }
            },
            complete: function () {
                if (loader) {
                    $(loader).hide();
                }
            },
            success: function (response) {
                chartsJSGraphWidget.skeleton(response);
            },
            error: function (fail) {
                return fail;
            }
        });
    },
    init: function () {
        this.get(chartsJSGraphWidget.optionsData.filterData);
    },
    reset: function () {
        chartsJSGraphWidget.optionsData = {
            element: null,
            name: null,
            colors: [],
            url: null,
            type: null,
            loaderClass: null,
        }
    },
    configuration: function (data) {
        this.reset();
        this.optionsData.name = data.name || null;
        this.optionsData.element = data.element || null;
        this.optionsData.type = data.type || null;
        this.optionsData.url = data.url || null;
        this.optionsData.loaderClass = data.loaderClass || null;
        this.optionsData.colors = data.colors || [];
        this.optionsData.filterData = data.filterData || null;
        this.init();
    }
};
