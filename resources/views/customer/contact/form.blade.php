@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('customer/layout/nav')
    <style>
        body {
            background-color: #F5F4F8;
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

<section>
    <div class="row w-100">
        <div class="col-md-6">
            <form class="form-control p-4" method="post" action="#" style="width: 100%">
                <h3 align="center" style="font-weight: bold;color: #2f2ffe;font-family: Inter">
                    Contact Us
                </h3>
                <div style="margin: 20px 0 0 110px;" >
                    Name<br>
                    <input class="form-control rounded-5" type="text" name="name" placeholder="Name" alt="name"><br><br>
                    Email<br>
                    <input class="form-control rounded-5" type="email" name="email" placeholder="Email" alt="email"><br><br>
                    Message<br>
                    <input class="form-control rounded-5" type="textarea" name="message" placeholder="Message" alt="message"><br>
                    <button type="submit" class="contact_submit_button rounded-5">
                        CONTACT US
                    </button>
                </div>

                <div style="margin: 30px 0 0 90px">
                    <span style="font-weight: bold;color: #2f2ffe;font-family: Inter"> Contact:</span> Design@gmail.com
                </div>
            </form>
        </div>
        <img class="col-md-6 px-lg-5 object-fit-cover py-3" style="height: 500px; " src="{{asset('./icons/bg_contact.jpg')}}">
    </div>
</section>



