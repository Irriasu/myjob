<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
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

<table>
    <thead>
        <tr>
            <th>Recruiter's Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Password</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr th:each="C : ${RecruiterList}">
            <td th:text="${C.getID()}"></td>
            <td th:text="${C.getFirstName()}"></td>
            <td th:text="${C.getLastName()}"></td>
            <td th:text="${C.getPhone()}"></td>
            <td th:text="${C.getEmail()}"></td>
            <td th:text="${C.getPassword()}"></td>
            <td>
                <form action="AdminServlet" method="post">
                    <input type="hidden" name="action" value="RecruiterInfor">
                    <input type="hidden" name="ID" th:value="${C.ID}">
                    <button type="submit">More</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

</body>
</html>
