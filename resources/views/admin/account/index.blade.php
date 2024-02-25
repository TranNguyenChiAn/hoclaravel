@vite(["resources/sass/app.scss", "resources/js/app.js"])

<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    @foreach($admin as $admin)
    <tr>
        <td>{{$admin->id}}</td>
        <td>{{$admin->name}}</td>
        <td>{{$admin->email}}</td>
        <td>{{$admin->password}}</td>
    </tr>
    @endforeach
</table>
