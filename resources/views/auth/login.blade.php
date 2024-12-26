<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<style>
    body {
        background: #eee;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .card {
        border-radius: 12px;
    }
    .card1 {
        background-image: url("https://i.imgur.com/aeidEH1.jpg");
        margin-top: 20px;
    }
    .first {
        background-image: url("{{ asset('img/loginBackground.webp') }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        border-radius: 12px 0 0 12px;
        max-width: 100%;
        display: block;
        margin: 0;
        opacity: 0.8;
    }
    .welcome {
        margin-top: 130px;
        font-size: 28px;
    }
    .form-group {
        padding-top: 5px;
        font-size: 15px;
    }
    .form-control {
        background: #E3F2FD;
        margin-top: 10px;
        font-size: 13px;
        font-weight: bold;
        color: #fff;
        padding-top: 15px;
        padding-bottom: 15px;
        caret-color: red;
    }
    .form-control:focus {
        box-shadow: none;    
    }
    .forgot {
        padding-top: 7px;
        color: #42A5F5;
    }
    .space {
        padding-top: 28px;
    }
    .btn1, .btn2 {
        display: inline-block;
        text-align: center;
        font-size: 11px;
        font-weight: bold;
        padding: 10px 46px;
        border-radius: 0%;
        border: none;
    }
    .btn1 {
        background: #0277BD;
        color: #fff;
    }
    .btn1:hover {
        background: #01579B;
        color: #fff;
    }
    .btn2 {
        background-color: #fff;
        color: #0277BD;
        border: 2px solid #0277BD;
    }
    .btn2:hover {
        background-color: #E3F2FD;
        color: #01579B;
    }
    .under {
        font-size: 12px;
        color: #42A5F5;
        padding-top: 40px;
    }
    @media only screen and (max-width: 800px) {
        .formBackground {
            display: none;
        }
    }
</style>
<body>
<div class="card p-4 card1 ">

<div class="row d-flex justify-content-center">

    <div class="col-md-10">
        
    <div class="card">
    <div class="row no-gutters">
        <div class="col-md-4 first">
            <div class="formBackground"><span class="no-gutters text-primary font-weight-bold"></span></div>
        </div> 
        <div class="col-md-6 second pl-4 pr-4">
            <h4 class="welcome text-primary">Welcome</h4>
            
            <!-- Updated to <form> tag here -->
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email or Phone" class="form-control" required>
                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                    <div class="forgot"><span>Forgot Password?</span></div>
                </div>
                <div class="space">
                    <button type="submit" class="btn btn-primary btn1">Login</button>
                    <button onclick="window.location.href='/signup'" type="button" class="btn btn-primary btn2">Sign Up</button>
                </div>
            </form>
            
            <div class="row">
                <div class="col-sm-4 under">
                    <span>Copyright Policy</span>
                    <p>User Agreement</p>
                </div>
                <div class="col-sm-3 under">
                    <span>Privacy Policy</span>
                    <p>Cookie Policy</p>
                </div>
                <div class="col-sm-4 under">
                    <span>Send Feedback</span>
                    <p>Community Guidelines</p>
                </div>
                <div class="col-md-1"></div>
            </div>
            
        </div>
        
    </div>
    
    
</div>

</div>
    

</div>

</div>
</body>
</html>
