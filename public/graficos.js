const ctxContratacion = document.getElementById('tasaContratacion');
const ctxEdad = document.getElementById('disEdad');
const ctxGnero = document.getElementById('disgen');
const ctxAusen = document.getElementById('numAusen');
const ctxRetemp = document.getElementById('retEmp');
const ctxMyCh6 = document.getElementById('myChart6');

const nombres = ['Jose', 'Carlos', 'David', 'Erick', 'Luis', 'Gustavo'];
const edades = [45, 40, 34, 34, 23, 29];


const graficoTasaContratacion = new Chart(ctxContratacion, {
  type: 'bar',
  data: {
    labels: nombres,
    datasets: [{
      label: 'Edad',
      data: edades,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1
    }],

  },
  options: {
    responsive: true,
    maintainAspectRatio: false // Opcional: si quieres que el gráfico ignore el aspect ratio original y se ajuste completamente al contenedor
  }
});

const graficoDisEdad = new Chart(ctxEdad, {
  type: 'bar',
  data: {
    labels: nombres,
    datasets: [{
      label: 'Edad',
      data: edades,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1
    }],

  },
  options: {
    responsive: true,
    maintainAspectRatio: false // Opcional: si quieres que el gráfico ignore el aspect ratio original y se ajuste completamente al contenedor
  }
});

const graficoDisGnero = new Chart(ctxGnero, {
  type: 'pie',
  data: {
    labels: ['Hombres', 'Mujeres', 'Otros'],
    datasets: [{
      label: 'Distribución por género',
      data: [12, 19, 3],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)'
      ],
      borderWidth: 1
    }],
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Distribución del personal por género'
      }
    }
  }
});

const graficoNumAusen = new Chart(ctxAusen, {
  type: 'bar',
  data: {
    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'],
    datasets: [{
      label: 'Número de ausencias',
      data: [12, 19, 3, 5, 2],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)'
      ],
      borderWidth: 1
    }],
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Número de ausencias por mes'
      }
    }
  }
});

const graficoRetEmp = new Chart(ctxRetemp, {
  type: 'line',
  data: {
    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    datasets: [{
      label: 'Tasa de Retención (%)',
      data: [95, 94, 93, 92, 91, 90, 89, 88, 87, 86, 85, 84], // Ejemplo de datos de retención por mes
      fill: true,
      backgroundColor: 'rgba(153, 102, 255, 0.2)',
      borderColor: 'rgba(153, 102, 255, 1)',
      borderWidth: 1
    }],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
        max: 100
      }
    },
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Tasa de Retención de Empleados'
      }
    },
    responsive: true,
  }
});





/* // Suponiendo que myChart, myChart1, myChart2, y myChart3 son los IDs de los elementos canvas para los gráficos
const myChart2 = new Chart(ctx2, {
    type: 'line', // Tipo de gráfico, por ejemplo, 'line', 'bar', etc.
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'],
        datasets: [{
            label: '# de algo',
            data: [12, 19, 3, 5, 2, 3, 7],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false // Opcional: si quieres que el gráfico ignore el aspect ratio original y se ajuste completamente al contenedor
    }
});

 */