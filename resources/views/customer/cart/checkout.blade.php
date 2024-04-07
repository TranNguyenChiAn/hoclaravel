@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include('customer/layout/nav')

<title> Checkout </title>
<style>
    body {
        background-color: #ffffff;
        font-family: Inter;
        }
</style>
<title> Receiver </title>

<div style="margin-left: 36%; margin-top: 30px ">
    <div class="position-absolute w-50 my-xxl-2">
        <h4 style="color: black; font-weight: bold; "> Receiver's Information </h4>
        <form method="post" action="{{ route('checkoutProcess') }}"  class="w-50 needs-validation" novalidate>
            @csrf
            @method('post')
            <input class="form-control" type="text" id="receiver_name" placeholder="Name" name="receiver_name"
                   value="{{ $customer ->name }}" required><br>
            <input class="form-control" type="number" id="receiver_phone" placeholder="Phone" name="receiver_phone"
                   value="{{ $customer ->phone }}" required><br>
            <input class="form-control" type="text" id="receiver_address" placeholder="Address" name="receiver_address"
                   value="{{ $customer ->address }}" required><br>
            <button style="background-color: #2f2ffe; color:white" class="btn float-end" type="submit">
                Submit
            </button>
        </form>
        <br>
    </div>
</div>

<script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

<script>
    let msg = '{{Session::get('alert')}}';
    let exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>

