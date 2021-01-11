<form action="" method="post">

    {{csrf_field()}}
    <div class="sign-up-htm">

        <div class="group">
            <label for="user" class="label">Username</label>
            username= <input id="user" type="text" class="input" name="username">
        </div>
        <div class="group">
            <label for="pass" class="label">Password</label>
            password= <input id="pass" type="password" class="input" data-type="password" name="password">
        </div>
        <div class="group">
            <label for="pass" class="label">Password</label>
            password= <input id="pass" type="password" class="input" data-type="password" name="cpassword">
        </div>

        <div class="group">
            <label for="pass" class="label">Email Address</label>
            email = <input id="pass" type="text" class="input" name="email">
        </div>
        <div class="group">
            <input type="submit" class="button" value="Sign Up">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
            <a label for="tab-1">Already Member?</a>
        </div>
    </div>

</form>




