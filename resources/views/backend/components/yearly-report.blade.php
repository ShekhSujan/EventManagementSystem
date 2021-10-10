<script>
var options = {
  chart: {
    height: 280,
    type: 'bar',
    stacked: true,
    toolbar: {
      show: false
    },
    zoom: {
      enabled: true
    }
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '20%',
    },
  },
  dataLabels: {
    enabled: true
  },
  series: [{
    name: 'Events',
    data: [
      @foreach($allYearlyReport as $item)
        {{ $item->count }}
        @if (!$loop->last)
        ,
        @else
        ,0
        @endif
        @endforeach
      ]
  }],
  xaxis: {
    type: 'month',
    categories: [
      @foreach($allYearlyReport as $item)
        '{{ $item->monthname }}'
        @if (!$loop->last)
        ,
        @endif
        @endforeach
    ],
  },
  legend: {
    offsetY: -7
  },
  fill: {
    opacity: 1
  },
  // colors: ['#2f8a00', '#074694'],
  colors: ['#074694', '#2f8a00'],
  tooltip: {
    y: {
      formatter: function(val) {
        return  "Events " + val + ""
      }
    }
  },
}
var chart = new ApexCharts(
  document.querySelector("#Events"),
  options
);
chart.render();
</script>
