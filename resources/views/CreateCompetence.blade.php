<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <style>
        body {
            background-image: url('pics/back.png');
            background-size: cover;
        }

        form {
            margin: 20px auto;
            padding: 20px;
            width: 50%;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button{
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<form action="{{ url('CandidateServlet') }}" method="post">
    @csrf
    <input type="hidden" name="action" value="CreateCompetence"/>
    <table>
        <tr>
            <th>Name</th>
            <th>Level</th>
            <th colspan="2">Actions</th>
        </tr>
        <tr>
            <td><input type="text" name="Name" value="" required></td>
            <td>
                <select name="Level" required>
                    <option value="">Select Level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </select>
            </td>
            <td colspan="2"><button type="submit">Add</button></td>
        </tr>
    </table>
</form>
</body>
</html>
