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
    200,
     300],
  stroke: {
    width: 1,
  },
  colors: ['#ee0000', '#999999'],
}
var chart = new ApexCharts(
  document.querySelector("#customers"),
  options
);
chart.render();
