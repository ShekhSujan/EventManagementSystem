<script>
var options = {
  chart: {
    height: 193,
    type: 'donut',
  },
  labels: ['Paypal', 'Stripe'],
  legend: {
    show: false,
  },

  series: [
    {{$allPaypalPayment}},
    {{$allStripePayment}}],
    stroke: {
      width: 1,
    },
    colors: ['#ee0000', '#007bff'],
  }
  var chart = new ApexCharts(
    document.querySelector("#customers"),
    options
  );
  chart.render();
  </script>
