@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('customer/layout/nav')
    <style>
        body {
            background-color: #ffffff;
        }

        .contact_submit_button {
            border: none;
            height: 40px;
            width: 160px;
            background-color: #2f2ffe;
            color: white;
            font-weight: bolder;
            font-size: 14px;
            align-items: center;
            font-family: Inter;
        }
    </style>
    <title> Contact </title>

<section class="mb-3">
    <div class="row w-100">
        <div class="col-md-6">
            <form class="form-control bg-white border-0 p-lg-5" method="get" action="{{ route('index')}}" style="width: 100%">
                <h3 align="center" style="font-weight: bold;color: #2f2ffe;font-family: Inter">
                    Contact Us
                </h3>
                <div style="margin: 20px 0 0 110px;" >
                    Name<br>
                    <input class="form-control rounded-5" type="text" name="name" placeholder="Name"
                           alt="name" required><br><br>
                    Email<br>
                    <input class="form-control rounded-5" type="email" name="email" placeholder="Email"
                           alt="email" required><br><br>
                    Message<br>
                    <textarea class="form-control rounded-1" type="text" name="message"
                              placeholder="Message" required></textarea><br>
                    <button type="submit" class="contact_submit_button rounded-5">
                        CONTACT US
                    </button>
                </div>

                <div style="margin: 30px 0 0 90px">
                    <span style="font-weight: bold;color: #2f2ffe;font-family: Inter"> Contact:</span> Design@gmail.com
                </div>
            </form>
        </div>
        <img class="col-md-6 px-lg-5 my-4 object-fit-cover py-3" style="height: 500px; "
             src="{{asset('./icons/bg_contact.jpg')}}">
    </div>
</section>



