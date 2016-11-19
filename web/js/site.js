$(function () {
    //$('#datetimepicker1').datepicker();
    $("#datetimepicker1").datetimepicker({
	    format: 'YYYY-MM-DD HH:mm:ss',
	    showTodayButton: true,
	    showClose: true,
	    tooltips: {
	        incrementHour: "",
	        incrementMinute: "",
	        incrementSecond: "",
	        decrementHour: "",
	        decrementMinute: "",
	        decrementSecond: "",
	    }
	});
});