@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<section style="width:80%; margin-left: 210px">

    <h3 class="center"> ORDERS </h3>

    <table class="table table-striped">
        <tr>
            <th class="t-heading" align="center"> Order ID </th>
            <th class="t-heading" align="center"> Date buy</th>
            <th class="t-heading" align="center"> Customer Name </th>
            <th class="t-heading" align="center"> Status </th>
            <th class="t-heading" style="text-align: center"> Edit </th>
            <th class="t-heading" style="text-align: center"> Delete </th>
        </tr>

        @foreach ($orders as $order)
        <tr class="record">
            <td style="padding-left: 30px">
                {{$order->id}}
            </td>
            <td>
                {{$order->date_buy}}
            </td>
            <td>
                {{$order->customer_name}}
            </td>
            <td>
                {{$order->status}}
            </td>
            <td align="center">
                <a href="">
                    <i class="bi bi-magic"></i>
                </a>
            </td>
            <td align="center">
                <a href="">
                    <i class="bi bi-x"></i>
                </a><br>
            </td>
        </tr>
        @endforeach
    </table>
</section>


