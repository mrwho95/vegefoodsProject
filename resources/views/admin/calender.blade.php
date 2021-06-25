@extends('layouts.vegeAdmin')

@section('styles')
	 {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
  
{{--     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" /> --}}
@endsection

@section('content')
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<h3>Calender</h3>
			<div id='calendar'></div>
		</div>
	</div>
</section> <!-- .section -->

@endsection

@section('javascripts')
{{-- <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script> --}}
{{-- <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script> --}}
{{-- <script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script> --}}
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
    	var today = moment().format("YYYY-MM-DD");
        $('#calendar').fullCalendar({
            defaultDate: today,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
        });
    });
</script>
	{{-- <script>
		var SITEURL = "{{ url('/') }}";
  
		$.ajaxSetup({
		    headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		function displayMessage(message) {
		    toastr.success(message, 'Event');
		} 


		  
		var calendar = $('#calendar').fullCalendar({
		                    editable: true,
		                    events: SITEURL + "/fullcalender",
		                    displayEventTime: false,
		                    editable: true,
		                    eventRender: function (event, element, view) {
		                        if (event.allDay === 'true') {
		                                event.allDay = true;
		                        } else {
		                                event.allDay = false;
		                        }
		                    },
		                    selectable: true,
		                    selectHelper: true,
		                    select: function (start, end, allDay) {
		                        var title = prompt('Event Title:');
		                        if (title) {
		                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
		                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
		                            $.ajax({
		                                url: SITEURL + "/fullcalenderAjax",
		                                data: {
		                                    title: title,
		                                    start: start,
		                                    end: end,
		                                    type: 'add'
		                                },
		                                type: "POST",
		                                success: function (data) {
		                                    displayMessage("Event Created Successfully");
		  
		                                    calendar.fullCalendar('renderEvent',
		                                        {
		                                            id: data.id,
		                                            title: title,
		                                            start: start,
		                                            end: end,
		                                            allDay: allDay
		                                        },true);
		  
		                                    calendar.fullCalendar('unselect');
		                                }
		                            });
		                        }
		                    },
		                    eventDrop: function (event, delta) {
		                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
		                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
		  
		                        $.ajax({
		                            url: SITEURL + '/fullcalenderAjax',
		                            data: {
		                                title: event.title,
		                                start: start,
		                                end: end,
		                                id: event.id,
		                                type: 'update'
		                            },
		                            type: "POST",
		                            success: function (response) {
		                                displayMessage("Event Updated Successfully");
		                            }
		                        });
		                    },
		                    eventClick: function (event) {
		                        var deleteMsg = confirm("Do you really want to delete?");
		                        if (deleteMsg) {
		                            $.ajax({
		                                type: "POST",
		                                url: SITEURL + '/fullcalenderAjax',
		                                data: {
		                                        id: event.id,
		                                        type: 'delete'
		                                },
		                                success: function (response) {
		                                    calendar.fullCalendar('removeEvents', event.id);
		                                    displayMessage("Event Deleted Successfully");
		                                }
		                            });
		                        }
		                    }
		 
		                });
		 
	</script> --}}
@endsection