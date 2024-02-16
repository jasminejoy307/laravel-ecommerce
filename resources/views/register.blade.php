<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * {box-sizing: border-box}
         /* Center the form on the page */
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        /* Add padding to containers */
        .container {
            padding: 16px;
            width: 300px; 
        }
        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
         input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }
     /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }
    /* Set a style for the submit/register button */
        .registerbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
      .registerbtn:hover {
            opacity:1;
        }
    /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }
</style>
</head>
<body>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="container">
            <h2>Registration</h2>
            <hr>
            <label for="name"><b>Full Name</b></label>
            <input type="text" placeholder="Enter Full Name" name="name" id="name">
            @error('name') <div style="color: red">{{ $message }}</div> @enderror
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email">
            @error('email') <div style="color: red">{{ $message }}</div> @enderror
            <label for="phone"><b>Phone Number</b></label>
            <input type="text" placeholder="Enter Phone Number" name="phone" id="phone">
            @error('phone') <div style="color: red">{{ $message }}</div> @enderror
            <label for="psw"><b>Password</b></label>
            <input type="text" placeholder="Enter Password" name="password" id="password">
            @error('password') <div style="color: red">{{ $message }}</div> @enderror
            <ul class="pswrdplcy">
                <li>8 characters <span class="bi bi-check" style="display: none"></span></li> {{-- 0 --}}
                <li>one uppercase <span class="bi bi-check" style="display: none"></span></li> {{-- 1 --}}
                <li>one lowercase <span class="bi bi-check" style="display: none"></span></li> {{-- 2 --}}
                <li>one digit <span class="bi bi-check" style="display: none"></span></li> {{-- 3 --}}
                <li>one special character <span class="bi bi-check" style="display: none"></span></li> {{-- 4 --}}
            </ul>
           <hr>
            <button type="submit" class="registerbtn">Register</button>
        </div>
     <div class="container signin">
            <p>Already have an account? <a href="{{route('login') }}">Login</a></p>
        </div>
    </form>
</body>
</html>
<script>
    $('#password').on('keyup', function() { 
        checkPswd(); 
    });
    function checkPswd() {
        var val = $('#password').val();
        (val.length>=8)?$('.pswrdplcy>li:eq(0)').find('span').show():$('.pswrdplcy>li:eq(0)').find('span').hide();
        (/[A-Z]/.test(val))?$('.pswrdplcy>li:eq(1)').find('span').show():$('.pswrdplcy>li:eq(1)').find('span').hide();
        (/[a-z]/.test(val))?$('.pswrdplcy>li:eq(2)').find('span').show():$('.pswrdplcy>li:eq(2)').find('span').hide();
        (/[0-9]/.test(val))?$('.pswrdplcy>li:eq(3)').find('span').show():$('.pswrdplcy>li:eq(3)').find('span').hide();
        (/[#?!@$%&*-]/.test(val))?$('.pswrdplcy>li:eq(4)').find('span').show():$('.pswrdplcy>li:eq(4)').find('span').hide();
    }
</script>