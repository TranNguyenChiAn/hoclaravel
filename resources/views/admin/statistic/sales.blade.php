
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <style>
        body {
            background-color: white;
        }

        #chart-container {
            width:100%;
            max-width:600px;
        }
    </style>
    <title> Homepage </title>
</head>
<body>
@php

$tm = strtotime("today");
$this_month =  date("Y-m", $tm);
//Khai báo biến search
$month = "";
//print_r($date_buy);
@endphp

<section style="margin: 0 0 0 90px" class="main_content">
    <div id="chart-container">
        <h4 style="margin: 30px 0 18px 40%;"> SOLD PRODUCTS </h4>
        <form method="post" action="">
            Month <input type="month" name="month" value="{{ $month }}" min="2022-07" max="{{ $this_month }}">
            <input type="submit">
        </form>
        <canvas id="myChart" style="display: block;width:100%;max-width:600px; margin: 30px 0 0 0;"></canvas>
    </div>
    <canvas id="salesChart" width="400" height="200"></canvas>

    <script>
        const dateArrayJS = <?php echo json_encode($date_buy)?>;
        console.log(dateArrayJS);

        const data = {
            labels: dateArrayJS,
            datasets: [{
                label: 'Number of sold products',
                fill: false,
                lineTension: 0,
                backgroundColor: ['rgb(116,116,227)'],
                borderColor: ['rgba(0,0,255,0.1)'],
                data: <?php echo json_encode($amount)?>,
            }]
        };

        const config = {
            type: 'bar',
            data,
            options: {
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day'
                        }
                    }
                },
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        fontColor: '#000000'
                    }
                },
                title: {
                    display: true,
                    text: 'Sales',
                    fontSize: 25
                }
            }
        };

        //render chart
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    </script>
</section>

</body>
</html>