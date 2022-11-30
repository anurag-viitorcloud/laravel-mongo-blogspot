"use strict";

	$.ajax({
	    url: route('admin.dashboard.customer-statistic-graph'),
	    type: "GET",
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    success: function (data) {

	        var _demo11 = function () {
	            const apexChart = "#chart_11";
	            var options = {
	                series: data.data,
	                chart: {
	                    width: 420,
	                    type: 'donut',
	                },
	                labels: ['Active', 'In-active', 'Deleted'],
	                responsive: [{
	                    breakpoint: 480,
	                    options: {
	                        chart: {
	                            width: 400
	                        },
	                        legend: {
	                            position: 'bottom'
	                        }
	                    }
	                }],
	                colors: [success, warning, danger]
	            };

	            var chart = new ApexCharts(document.querySelector(apexChart), options);
	            chart.render();
	        }

	        return _demo11();
	    }
	})
