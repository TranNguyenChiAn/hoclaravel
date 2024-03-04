<nav>
    <style>
        body {
            margin:0;
            color: #2F2FFE;
        }
        .navbar {
            position: fixed;
            display: block;
            padding: 0;
        }
        .navbar_menu {
            height: 645px;
            position: absolute;
            padding-left: 0;
            list-style-type: none;
            background-color: #FFFFFF;
            color: #2F2FFE;
            display: flex;
            justify-content: space-around;
            flex-direction: column;
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
            font-size: 16px;
        }

        .choice{
            width: 200px;
            height: 50px;
            color: #2F2FFE;
            text-decoration: none;
            padding-left: 24%;
            padding-top: 10px;
        }

        .choice:hover {
            border-radius: 5px;
            background-color: #ddddf1;
            backdrop-filter: blur(10px);
            cursor: pointer;
        }

        .link_in_menu {
            text-decoration: none;
            color: #2F2FFE;
            font-weight: bold;
        }
    </style>

    <div class="navbar">
        <ul class="navbar_menu">
            <li class="choice">
                <img src="{{asset('image/celement cat.png')}}" alt="brand"
                     height="32" class="rounded">
            </li>
            <li class="choice">
                <img style="width:16px; margin-top: -3px" src="../../image/statistic.png">
                <a class="link_in_menu" href="../homepage/index.blade.php"> Statistics </a>
            </li>
            <li  class="choice">
                <img style="width:16px; margin-top: -3px" src="../../image/package.png">
                <a class="link_in_menu" href="{{ route('admin.product') }}"> Product </a>
            </li>
            <li class="choice">
                <img style="width:16px; margin-top: -3px" src="../../image/menu.png">
                <a class="link_in_menu" href="{{ route('admin.category') }}"> Category </a>
            </li>
            <li  class="choice">
                <img style="width:16px; margin-top: -3px" src="../../image/shopping-cart (1).png">
                <a class="link_in_menu" href="{{ route('admin.order') }}"> Order </a>
            </li>
            <li  class="choice">
                <img style="width:16px; margin-top: -3px" src="../../image/log-out.png">
                <a class="link_in_menu" href="../account/logout_admin.php"> Logout </a>
            </li>
        </ul>
    </div>
</nav>





