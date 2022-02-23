<?php
session_start();
$customers = $_SESSION['customers'];
$totalCustomers = $_SESSION['customer_numbers'];
$totalOrders = $_SESSION['orders_numbers'];
$totalRevenue = $_SESSION['revenue'];
$orders = $_SESSION['orders'];
session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);


        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Dates', 'Customers', 'Orders'],
                <?php
                foreach ($customers as $row) {
                    echo "['" . $row['created_at'] . "'," . $totalRevenue . "," . $row['purchase_date'] . "],";
                }
                ?>

            ]);

            var options = {
                title: 'Company Performance',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div class="container">
        <div class=" row header">

            <h1>BOOZT</h1>

        </div>
    </div>

    <div class="row" style="margin:0px">
        <div class="col-sm-4">
            <h3>Choose A Time</h3>

            <hr>
            <div>
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date">
            </div>
            <div>
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date">
            </div>
            <div>
                <button onclick="myFunction()">Done</button>
            </div>
        </div>
        <div class="col-sm-8">
            <div>
                <h4>Total Customers: <?php echo $totalCustomers; ?></h4>
                <h4>Total Orders: <?php echo $totalOrders; ?></h4>
                <h4>Total Revenue: <?php echo $totalRevenue; ?></h4>
            </div>
            <hr>

            <div id="curve_chart" style="width: 900px; height: 500px"></div>


        </div>
    </div>
    </div>
    </div>


    <script>
        function myFunction() {
            var start_date = document.getElementById("start_date").value;

            var end_date = document.getElementById("end_date").value;
            $.ajax({
                url: "script.php", //the page containing php script
                type: "POST", //request type,

                data: {
                    startDate: start_date,
                    endDate: end_date,

                },

                success: function(result) {
                    console.log(result);
                }
            });

        }
    </script>

</body>

</html>