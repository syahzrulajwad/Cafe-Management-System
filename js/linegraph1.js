$(document).ready(function () {
  $.ajax({
    url: "http://localhost/bengkel1/sales.php",
    type: "GET",
    success: function (data) {
      console.log(data);

      var date = [];
      var price = [];


      for (var i in data) {
        date.push(data[i].date);
        price.push(data[i].price);
      }

      var chartdata = {
        labels: date,
        datasets: [

          {
            label: "PRICE",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(59, 89, 152, 0.75)",
            borderColor: "rgba(59, 89, 152, 1)",
            pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
            pointHoverBorderColor: "rgba(59, 89, 152, 1)",
            data: price
          },

        ],
      };

      var ctx = $("#mycanvas1");

      var LineGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata,
        options: {
          title: {
            display: true,
            text: 'Graf jumlah harga berdasarkan tarikh'
          },
          scales: {
            yAxes: [{
              scaleLabel: {
                display: true,
                labelString: 'Harga'
              }
            }],
            xAxes: [{
              scaleLabel: {
                display: true,
                labelString: 'Bulan'
              }
            }]
          },
        }
      });
    },
    error: function (data) {

    }
  });
});