<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        td {
            padding: 8px;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #passwordTracker {
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
<center>
    <h1>Create User :</h1>

    <form action="{{ url('AdminServlet') }}" method="post" onsubmit="return validateForm()">
        @csrf
        <input type="hidden" name="action" value="CreateUser"/>
        <table>
            <tr>
                <td><label for="FirstName">First Name:</label></td>
                <td><input type="text" name="FirstName" required/></td>
            </tr>
            <tr>
                <td><label for="LastName">Last Name:</label></td>
                <td><input type="text" name="LastName"/></td>
            </tr>
            <tr>
                <td><label for="Email">Email:</label></td>
                <td><input type="email" name="Email"/><br></td>
            </tr>
            <tr>
                <td><label for="Phone">Phone:</label></td>
                <td><input type="text" name="Phone" required/></td>
            </tr>
            <tr>
                <td><label for="Type">Type:</label></td>
                <td>
                    <select name="Type" required>
                        <option value="Candidate">Candidate</option>
                        <option value="Recruiter">Recruiter</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="Gender">Gender:</label></td>
                <td>
                    <select name="Gender"  id="Gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="Password1">Password:</label></td>
                <td><input type="password" id="Password1" name="Password1" onkeyup="checkPassword()"/>
                    <img src="pics/eye.png" alt="" class="eye-icon" onclick="togglePasswordVisibility('Password1')">
                </td>
            </tr>
            <tr>
                <td><label for="Password2">Verify Password:</label></td>
                <td><input type="password" id="Password2" name="Password2"/>
                    <img src="pics/eye.png" alt="" class="eye-icon" onclick="togglePasswordVisibility('Password2')">
                </td>
            </tr>
            <tr>
                <td colspan="2"><div id="passwordTracker">Password length: 0/8</div></td>
            </tr>
            <tr>
                <td><input type="submit" value="Add"/></td>
            </tr>
        </table>
    </form>
</center>

<script type="text/javascript">
    function validateForm() {
        var password1 = document.getElementById('Password1').value; // Updated ID
        var password2 = document.getElementById('Password2').value; // Updated ID

        // Check if passwords match and if they are at least 8 characters long
        if (password1.length < 8) {
            alert("Passwords must be at least 8 characters long.");
            return false;
        } else if (password1 !== password2) {
            alert("Passwords must match.");
            return false;
        }

        // If passwords match and are at least 8 characters long, return true to submit the form
        return true;
    }

    function checkPassword() {
        var password1 = document.getElementById('Password1').value; // Updated ID
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
