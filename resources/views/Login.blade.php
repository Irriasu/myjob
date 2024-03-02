<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">

        html{
            height: 100%;
            width: 100%;
        }

        body{
            background: radial-gradient(50% 50% at 50% 50%, #70B8FB 0%, #0B5CA8 99.5%);
            height: 100%;
            margin: 0;
            padding: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 400px;
            height: 450px;
            background: rgba(186 196 211 / 28%);
            border-radius: 40px;
            padding: 2rem;
        }

        .container form {
            display: flex;
            flex-direction: column;
        }

        .box {
            display: flex;
            flex-direction: column;
            margin-bottom: 1rem;
        }

        label {
            color: white;
            margin-bottom: 0.5rem;
        }

        input{
            border-radius: 10px;
            width: 100%;
            padding: 0.5rem;
        }

        .password-input {
            position: relative;
        }

        .eye-icon {
            position: absolute;
            right: 10px;
            top: 70%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        button {
            background-color: rgb(77, 77, 201);
            color: white;
            border-radius: 10px;
            width: 100%;
            padding: 0.5rem;
            cursor: pointer;
        }

        a {
            color: white;
            text-decoration: none;
            margin-top: 1rem;
        }

        a:hover, a:active, a:visited {
            color: white;
        }
    </style>
</head>

<body>
<div class="container">
    <form action="Servlet" method="post">
        <input type="hidden" name="action" value="LogIn" />
        <h1 style="color: white;">LOGIN</h1>
        <div class="box">
            <label for="Email">Email :</label>
            <input type="email" name="Email" required placeholder="@gmail.com" />
        </div>
        <div class="box password-input">
            <label for="Password">Password :</label>
            <input type="password" name="Password" id="Password" placeholder="password..." required />
            <img src="pics/eye.png" alt="" class="eye-icon" onclick="togglePasswordVisibility('Password')">
        </div>
        <button type="submit">Log In</button>
    </form><br>
    <p>Don't have an account yet? <a href="SignUp.jsp">Register for free</a></p>
</div>

<script type="text/javascript">
    function togglePasswordVisibility(inputId) {
        var passwordInput = document.getElementById(inputId);
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>
</body>
</html>
