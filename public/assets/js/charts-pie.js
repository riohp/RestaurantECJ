/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const pieConfig = {
    type: 'doughnut',
    data: {
        datasets: [
            {
                data: [33, 33, 33],
                /**
                 * These colors come from Tailwind CSS palette
                 * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
                 */
                backgroundColor: ['#0694a2', '#1c64f2', '#7e3af2'],
                label: 'Dataset 1',
            },
        ],
        labels: ['Shoes', 'Shirts', 'Bags'],
    },
    options: {
        responsive: true,
        cutoutPercentage: 75,
        /**
         * Default legends are ugly and impossible to style.
         * See examples in charts.html to add your own legends
         *  */
        legend: {
            display: false,
        },
    },
    plugins: [{
        beforeDraw: function(chart) {
            var width = chart.chart.width,
                height = chart.chart.height,
                ctx = chart.chart.ctx;

            ctx.restore();
            var fontSize = (height / 100).toFixed(2);
            ctx.font = fontSize + "em Poppins";
            ctx.fillStyle = "#6b6b6b"
            ctx.textBaseline = "middle";

            var text = "$20,201",
                textX = Math.round((width - ctx.measureText(text).width) / 2),
                textY = height / 2;

            ctx.fillText(text, textX, textY);
            ctx.save();
        }
    }]
}

// change this to the id of your chart element in HTML
const pieCtx = document.getElementById('pie')
window.myPie = new Chart(pieCtx, pieConfig)
