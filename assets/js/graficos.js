async function getData() {
  let token = $('#token').val();
  return new Promise((resolve, reject) => {
      $.ajax({
          url: '../backend/apicalculos.php?f=data',
          type: 'POST',
          data: { token: token },
          success: function (e) {
              let data = JSON.parse(e);

              if (data.response === 'success') {
                  resolve(data.data);
              } else {
                  reject(data.message);
              }
          },
          error: function () {
              console.log('Ocurrio un error');
              reject('Ocurrio un error');
          }
      });
  });
}

async function setupChart() {
  try {
      let data = await getData();

      let ingresos = data.map(item => {
          return { x: `${item.mes}`, y: parseFloat(item.total_i_mes) };
      });

      let egresos = data.map(item => {
          return { x: `${item.mes}`, y: parseFloat(item.total_e_mes) };
      });


      //?optios 2
      let options={
        tooltip: {
          enabled: true,
          x: {
            show: true,
          },
          y: {
            show: true,
          },
        },
        grid: {
          show: false,
          strokeDashArray: 4,
          padding: {
            left: 2,
            right: 2,
            top: -26
          },
        },
        series: [
          {
            name: "Ingresos",
            data: ingresos,
            color: "#180F6F",
          },
          {
            name: "Egresos",
            data: egresos,
            color: "#A80101",
          },
        ],
        chart: {
          height: "100%",
          maxWidth: "100%",
          type: "area",
          fontFamily: "Inter, sans-serif",
          dropShadow: {
            enabled: false,
          },
          toolbar: {
            show: false,
          },
        },
        legend: {
          show: true
        },
        fill: {
          type: "gradient",
          gradient: {
            opacityFrom: 0.55,
            opacityTo: 0,
            shade: "#1C64F2",
            gradientToColors: ["#1C64F2"],
          },
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          width: 6,
        },
        xaxis: {
          categories: data.map(item => `${item.mes}`),
          labels: {
            show: false,
          },
          axisBorder: {
            show: false,
          },
          axisTicks: {
            show: false,
          },
        },
        yaxis: {
          show: false,
          labels: {
            formatter: function (value) {
              return 'S./ ' + value;
            }
          }
        },
      }


     

      var chart = new ApexCharts(document.querySelector("#column-chart"), options);
      chart.render();

  } catch (error) {
      console.error('Error setting up chart:', error);
  }
}

// Llamar a la función para configurar el gráfico
setupChart();
