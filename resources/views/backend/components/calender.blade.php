<script>
// Calendar 1 ****************************
document.addEventListener('DOMContentLoaded', function() {
	var calendarEl = document.getElementById('calendar');

	var calendar = new FullCalendar.Calendar(calendarEl, {
		plugins: [ 'interaction', 'dayGrid' ],
		header: {
			left: 'prevYear,prev,next,nextYear today',
			center: 'title',
			right: 'dayGridMonth,dayGridWeek,dayGridDay'
		},
		navLinks: true, // can click day/week names to navigate views
		editable: true,
		eventLimit: true, // allow "more" link when too many events
		events: [
      @foreach($allEventCalender as $item)
			{
				title: '{{$item->count}}',
				url: '{{ route('backend.search',$item->date) }}',
				start: '{{$item->date}}'
			},
      @endforeach
		]
	});

	calendar.render();
});
</script>
