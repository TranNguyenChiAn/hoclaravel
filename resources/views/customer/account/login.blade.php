<title>Login</title>
@vite(["resources/sass/app.scss", "resources/js/app.js"])

<title> Login </title>
<section style="font-family: Arial">
    <img height="100%" width="100%" class="float-end top-0 position-absolute object-fit-cover"
         src="{{ asset('./images/login_bg.png')}}">
    <div class="position-absolute top-50 start-50 translate-middle-y">
        <form method="post" action="{{ route('customer.loginProcess') }}"
              class="form-control rounded-4 text-white"
              style="z-index: 3; background-color: #525050;
                width: 120%;border: none; padding:10px 80px">
            @csrf
            <div class="my-4 text-center">
                <h1 style="font-weight: bold">LOGIN</h1>
            </div>
            @if($errors -> has('email'))
                <div class="">
                    <span class="text-danger"> {{ $errors -> first('email') }} </span>
                </div>
            @endif
            <div class="mb-3">
                <input type="email" name="email" class="form-control" id="email"
                       value="{{old('email')}}" placeholder="Email address">
            </div>

            @if($errors -> has('password'))
                <div class="">
                    <span class="text-danger"> {{ $errors -> first('password') }} </span>
                </div>
            @endif
            <div class="mb-3">
                <input type="password" name="password" class="form-control" id="password"
                       value="{{old('password')}}" placeholder="Password">
            </div>

            <div class="mb-3 d-flex justify-content-center">
                <button class="col-md-12 btn px-4 align-content-center"
                        style="background-color: #2F2FFE; color:white; font-size: 14px">
                    Login
                </button>
            </div>
        </form>

        <div class="text-white" style="z-index: 3; width: 120%">
            <div class="form-text d-flex align-items-center justify-content-between"
                 style="z-index: 2">
                <div style="z-index: 2;">
                    <b><i>
                            <a class="text-white" href="{{route('customer.register')}}">Register</a>
                        </i></b>
                </div>
                <div style="z-index: 2">
                    <b><i>
                       <a class="text-white" href="{{route('customer.forgotPassword')}}">Forgot password</a>
                    </i></b>
                </div>
            </div>
        </div>
    </div>
</section>
