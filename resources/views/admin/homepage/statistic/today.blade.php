@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<body>
<?php
//mo ket noi
include_once "../../connect/open.php";
$d=strtotime("today");
$date =  date("Y-m-d", $d);
$total = 0;
$cost = 0;
//Query để lấy dữ liệu từ bảng classes trên db về
$sql = "SELECT count(id) as quantity_order, date_buy
        FROM orders
        WHERE date_buy = '$date'
        group by id";
//Chay query
$orders = mysqli_query($connect, $sql);
foreach ($orders as $order) {
    $total += $order['quantity_order'];
}
//Query để lấy dữ liệu từ bảng classes trên db về
$sql = "SELECT orders.status,orders.date_buy, order_details.price, order_details.quantity
        FROM order_details
        INNER JOIN orders ON order_details.order_id = orders.id
        WHERE orders.status = 2 AND orders.date_buy = '$date'";
//Chay query
$order_details = mysqli_query($connect, $sql);
foreach ($order_details as $order_detail) {
    $cost += $order_detail['price'] * $order_detail['quantity'];
}
//dong ket noi
include_once "../../connect/close.php";

?>
    <div id="chart-container">
        <div>
            <h4 style="margin: 18px 0 0 60px">Today</h4>
            <p style="margin: 9px 0 0 18px;font-weight: bold; font-size: 30px; color: green">
                +<?= $total ?> order
            </p>
            <p style="margin: 9px 0 0 18px;font-weight: bold; font-size: 22px; color: green">
                +<?= $cost ?> $
            </p>
        </div>

    </div>
</body>
</html>

