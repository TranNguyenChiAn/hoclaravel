@vite(["resources/sass/app.scss", "resources/js/app.js"])

<div class="form_login" >
    <figure align="center" style="font-weight: bold; font-size: 30px;color: rgba(239,239,243,0.91);"> ADMIN LOGIN </figure>
    <form align="center" id="form" method="post" action="loginProcess.php">
        <input type="hidden" name="id_admin">
        <input id="email_admin" type="email" name="email_admin" placeholder="Email" width="500px"><br>
        <br>
        <input  id="password_admin" type="password" name="password" placeholder="Password">
        <img id="showEye" src="../../image/view.png" onclick="passwordShow()">
        <img id="hideEye" src="../../image/hidden.png" onclick="passwordHide()">
        <br>
        <br>
        <button  id="login_button" type="submit"> LOGIN </button>
        <br>
    </form>
</div>

<script type="text/javascript">
    let password = document.getElementById('password_admin');
    let showEye = document.getElementById('showEye');
    let hideEye = document.getElementById('hideEye');

    function black(){
        showEye.style.fill = "#000000";
        hideEye.style.fill = "#000000";
    }
    function white(){
        showEye.style.fill = "#fff";
        hideEye.style.fill = "#fff";
    }

    function passwordShow(){
        password.type = 'text';
        showEye.style.display= "none";
        hideEye.style.display= "inline";
        password.focus();
    }
    function passwordHide(){
        password.type = 'password';
        showEye.style.display= "inline";
        hideEye.style.display= "none";
        password.focus();
    }
</script>


