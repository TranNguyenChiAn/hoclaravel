@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('customer/layout/nav')

<style>
        body {
            background-color: #F5F4F8;
        }
        .user_customer {
            position: absolute;
            background-color: white;
            width: 100%;
            margin-top: 6%;
        }
        .history_order {
            width: 180px;
            margin: 6px 30px 0 0;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #d2c7fd;
            background-color: transparent;
            border-top-right-radius: 9px;
            border-top-left-radius: 9px;
            border-bottom: none;
        }

        .history_order:hover {
            background-color: #6868de;
        }

        .history_order:hover .nav-link{
            color: white;
        }
    </style>
<title> Profile </title>

<section>
    <div class="user_customer">
        <div style="color: black; width: 300px; display: flex; align-items: center; margin: 30px 0 0 100px">
            <img style="width:64px" src="{{asset('./icons/user-profile.png')}}">
            <!--ID: {{ $customer->id}} <br>-->
            <p style="margin-left: 10px">{{$customer->name}}</p><br>
        </div>

        <div style="margin: 20px 0 0 100px; color: black">
            Email: {{ $customer->email}}<br>
            Phone: {{ $customer->phone}}<br>
            Address: {{ $customer->address}}<br>
        </div>
        <div style="display:flex;margin: 18px 0 0 90px; justify-content: flex-start">
            <div class="history_order">
                <a style="font-weight: bold;" class="nav-link" href="{{ route('ordersHistory') }}">
                    History orders
                </a>
            </div>
            <div class="history_order">
                <a style="font-weight: bold;" class="nav-link" href="{{ route('pwd.edit') }}">
                    Change password
                </a>
            </div>
        </div>
    </div>
</section>




