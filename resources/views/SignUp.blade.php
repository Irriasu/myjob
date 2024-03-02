<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        html, body {
            background: radial-gradient(50% 50% at 50% 50%, #70B8FB 0%, #0B5CA8 99.5%);
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 800px; /* Adjust as needed */
            background: rgba(186, 196, 211, 0.28);
            border-radius: 40px;
            padding: 2rem;
            display: flex; /* Use flexbox */
            flex-direction: column; /* Arrange children in a column */
            align-items: center; /* Center children horizontally */
        }

        .form-container {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .column {
            width: 45%; /* Adjust as needed */
            margin: 0 1rem; /* Add margin between columns */
        }

        .container form {
            display: flex;
            flex-direction: row; /* Align the divs horizontally */
            justify-content: space-between; /* Space between the divs */
            width: 100%;
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

        input,
        select {
            border-radius: 10px;
            width: calc(100% - 40px); /* Adjust width for eye icon */
            padding: 0.5rem;
        }

        .eye-icon {
            margin-left: -40px; /* Adjust as needed */
            cursor: pointer;
        }

        button {
            background-color: rgb(77, 77, 201);
            color: white;
            border-radius: 10px;
            padding: 0.5rem;
            cursor: pointer;
            width: 200px; /* Adjust as needed */
            margin-top: 1rem;
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
    <h1 style="color: white;">SignUp :</h1>

    <div class="form-container">
        <form action="register" method="post" onsubmit="return validateForm()">
            @csrf
            <div class="column">
                <input type="hidden" name="action" value="SignUp"/>
                <div class="box">
                    <label for="FirstName">First Name:</label>
                    <input type="text" name="FirstName" placeholder="first name.." required/>
                </div>
                <div class="box">
                    <label for="LastName">Last Name:</label>
                    <input type="text" name="LastName" placeholder="last name.." required/>
                </div>
                <div class="box">
                    <label for="Email">Email:</label>
                    <input type="email" name="email" placeholder="..@gmail.com" required/>
                </div>
                <div class="box">
                    <label for="username">Username:</label>
                    <input type="text" name="username" placeholder="Username" required/>
                </div>
            </div>
            <div class="column">
                <div class="box">
                    <label for="Type">Type:</label>
                    <select name="Type" required>
                        <option value="Candidate">Candidate</option>
                        <option value="Recruiter">Recruiter</option>
                    </select>
                </div>
                <div class="box">
                    <label for="Gender" >Gender:</label>
                    <select name="Gender" id="Gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="box">
                    <label for="Password1">Password:</label>
                    <div style="position: relative;">
                        <input type="password" id="Password1" name="Password1" placeholder="password.." onkeyup="checkPassword()" required/>
                        <img src="{{ asset('pics/eye.png') }}" alt="" class="eye-icon" onclick="togglePasswordVisibility('Password1')">
                    </div>
                </div>
                <div class="box">
                    <label for="Password2">Verify Password:</label>
                    <div style="position: relative;">
                        <input type="password" id="Password2" name="Password2" placeholder="password.." required/>
                        <img src="{{ asset('pics/eye.png') }}" alt="" class="eye-icon" onclick="togglePasswordVisibility('Password2')">
                    </div>
                </div>
                <div class="box">
                    <div id="passwordTracker">Password length: 0/8</div>
                </div>
            </div>
        </form>
    </div>
    <button type="submit"  onclick="submitForm()">Sign Up</button>
</form>
    <p>Already have an account?<a href="{{ url('login') }}">Log In</a></p>
</div>

<script type="text/javascript">
    function submitForm() {
        document.querySelector('form').submit();
    }


    function validateForm() {
        var password1 = document.getElementById('Password1').value;
        var password2 = document.getElementById('Password2').value;

        if (password1.length < 8) {
            alert("Passwords must be at least 8 characters long.");
            return false;
        } else if (password1 !== password2) {
            alert("Passwords must match.");
            return false;
        }

        return true;
    }

    function checkPassword() {
        var password1 = document.getElementById('Password1').value;
        var passwordTracker = document.getElementById('passwordTracker');

        if (password1.length >= 8) {
            passwordTracker.innerHTML = 'Password length: OK';
        } else {
            passwordTracker.innerHTML = 'Password length: ' + password1.length + '/8';
        }
    }

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
