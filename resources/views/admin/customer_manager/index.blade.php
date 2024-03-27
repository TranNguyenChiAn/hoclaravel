@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('admin/layout/nav')

<section style="width:80%; margin-left: 210px">
    <br>
    <h1 align="center" style="font-weight: bold;color: #2F2FFE;font-family: Arial;">
        MANAGE CUSTOMER
    </h1>
    <br>
    <table class="table table-striped">
        <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Email </th>
            <th> Phone number </th>
            <th> Address </th>
            <th> Edit </th>
            <th>Lock account</th>
        </tr>

        @foreach($customers as $customer)
            <tr>
                <td>
                    {{$customer->id}}
                </td>
                <td>
                    {{$customer->name}}
                </td>
                <td>
                    {{$customer->email}}
                </td>
                <td>
                    {{$customer->phone}}
                </td>
                <td>
                    {{$customer->address}}
                </td>
                <td>
                    <a href="">
                        <i class="bi bi-magic"></i>
                    </a>
                </td>
                <td>
                    <form method="post" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Lock</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</section>
