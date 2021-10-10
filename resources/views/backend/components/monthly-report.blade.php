<script>
var day_data = [
  @foreach($allMonthlyReport as $item)
    {"period": "{{ $item->day }}", "Events": {{ $item->count }}},
    @endforeach
];
Morris.Bar({
  element: 'xLabelsDiagonally',
  data: day_data,
  xkey: 'period',
  ykeys: ['Events'],
  labels: ['Events'],
  xLabelAngle: 45,
  gridLineColor: "#e1e5f1",
  resize: true,
  hideHover: "auto",
  barColors:['#aa0000', '#cc0000', '#ee0000', '#ff3333', '#ff7777'],
});
</script>
