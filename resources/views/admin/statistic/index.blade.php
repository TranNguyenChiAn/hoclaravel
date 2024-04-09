@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #F5F4F8;
        }

        .menu_button {
            text-decoration: none;
            border: none;
            margin: 18px 0 0 0;
            background-color: white;
            width: 108px;
            border-top-right-radius: 9px;
            border-top-left-radius: 9px;
        }
        .menu_button:hover {
            cursor: pointer;
            background-color: #f8f6f6;
        }
        .notification {
            margin: 0 0 0 1%;
            width: 17%;
            height: 240px;
            border-radius: 6px;
        }
    </style>
    <title> Homepage </title>
</head>
<body>

<section style="width:80%; margin-left: 224px">
    <br>
    <p class="table_title"> STATISTICS </p>
    <!--<iframe id="notice" src="statistic/today.php" ></iframe>-->
    <div>
        <button class="menu_button">
            <a class="link_in_button" style="color:#6868de;" target="display" href="statistic/sales.php">
                Daily
            </a>
        </button>
        <button class="menu_button">
            <a class="link_in_button" style="color:#6868de;" target="display" href="statistic/sales_monthly.php">
                Monthly
            </a>
        </button>
        <button class="menu_button">
            <a class="link_in_button" style="color:#6868de;" target="display" href="statistic/sales_yearly.php">
                Yearly
            </a>
        </button>
    </div>
    <div style="display: flex; justify-content: start">
        <iframe name = "display" style="margin: 0 0 0 0; width: 81%; height: 460px" src="{{view('admin.statistic.sales')}}"></iframe>
        <iframe class="notification" src="statistic/today.php" ></iframe>
    </div>
    <div>

    </div>
    <iframe style="margin: 6px 0 0 0; width: 81%; height: 460px" src="statistic/status.php" ></iframe>
    <iframe style="margin: 0 0 0 0; width: 81%; height: 486px" src="statistic/product.php" ></iframe>

</section>



