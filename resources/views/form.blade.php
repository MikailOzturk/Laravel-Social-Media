<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Day 001 Login Form</title>


    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

    <link rel="stylesheet" href="css/style.css">


</head>

<body>

<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">

            <form action=" {{url('login')}}" method="post">
                {{csrf_field()}}
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">Email Address</label>
                        <input id="user" type="text" class="input" name="email">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password" name="password">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </div>
            </form>
            <div class="sign-up-htm">
                <form action=" {{url('signup')}}" method="post">
                    {{csrf_field()}}
                    <div class="group">
                        <label for="user" class="label">Name</label>
                        <input id="user" type="text" class="input" name="name">
                    </div>
                    <div class="group">
                        <label for="user" class="label">Surname</label>
                        <input id="user" type="text" class="input" name="surname">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password" name="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Repeat Password</label>
                        <input id="pass" type="password" class="input" data-type="password" name="cpassword">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Email Address</label>
                        <input id="pass" type="text" class="input" name="email">
                    </div>
                    </br>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>
                </form>
                <div class="hr"></div>

            </div>
        </div>
    </div>
</div>


</body>

</html>