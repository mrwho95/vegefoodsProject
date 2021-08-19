@extends('layouts.vegeAdmin')

@section('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

	{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
  
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
{{-- <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script> --}}
{{-- <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script> --}}
{{-- <script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script> --}}
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
    	var today = moment().format("YYYY-MM-DD");

    	 $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

        var calendar = $('#calendar').fullCalendar({
            editable: true,
            displayEventTime: true,
            header: {
            	left: 'prev,next today',
            	center: 'title',
            	right: 'month,agendaWeek,agendaDay'
            },
            events: '{{ route("adminCalender") }}',
	        selectable: true,
	        selectHelper: true,
	        select: function (event_start, event_end, allDay) {
                var eventName = prompt('Event Name:');
                if (eventName) {
                    var eventStart = moment(event_start).format("Y-MM-DD hh:mm:ss");
                    var eventEnd = moment(event_end).format("Y-MM-DD hh:mm:ss");
                    // var eventStart = $.fullCalendar().formatDate(event_start, "Y-MM-DD HH:mm:ss");
                    // var eventEnd = $.fullCalendar().formatDate(event_end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: '{{ route("calenderCRUD") }}',
                        data: {
                            eventName: eventName,
                            eventStart: eventStart,
                            eventEnd: eventEnd,
                            type: 'create'
                        },
                        type: "POST",
                        success: function (data) {
                        	console.log(typeof data);
                        	if (typeof data == 'string') {
                        		sweetAlert("Oops", data, 'error');
                        	} else {
                        		console.log(data);
                             	sweetAlert("Congratulation","Event created","success");
	                            // calendar.fullCalendar('refetchEvents');
	                            // calendar.fullCalendar('addEventSource', events);
	                            calendar.fullCalendar('renderEvent', {
                                    id: data.id,
                                    title: eventName,
                                    start: event_start,
                                    end: event_end,
                                    allDay: true
                                }, true);
                                calendar.fullCalendar('unselect');
                        	}
                        }
                    });
                }
            },
            editable: true,
            eventDrop: function (event, delta) {
            	console.log("event",event);
	            var eventStart = moment(event.start).format("Y-MM-DD hh:mm:ss");
                var eventEnd = moment(event.end).format("Y-MM-DD hh:mm:ss");
                console.log(eventStart, eventEnd);
	            $.ajax({
	                url: '{{ route("calenderCRUD") }}',
	                data: {
	                    // title: event.event_name,
	                    eventStart: eventStart,
	                    eventEnd: eventEnd,
	                    eventID: event.id,
	                    type: 'update'
	                },
	                type: "POST",
	                success: function (response) {
	                    sweetAlert("Congratulation","Event edited","success");
	                    calendar.fullCalendar('refetchEvents');
	                }
	            });
	        },
	        eventClick: function (event) {
                var eventDelete = confirm("Are you sure to delete event?");
                if (eventDelete) {
                    $.ajax({
                        type: "POST",
                        url: '{{ route("calenderCRUD") }}',
                        data: {
                            id: event.id,
                            type: 'delete'
                        },
                        success: function (response) {
                            calendar.fullCalendar('removeEvents', event.id);
                            sweetAlert("Congratulation","Event removed","success");
                        }
                    });
                }
            }
        });
    });

</script>
@endsection