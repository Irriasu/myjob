<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>

    <style>
        body {
            background-image: url('pics/back.png');
            background-size: cover;
        }

        .NavBar, footer {
            width: 100%;
            background-color: transparent;
            backdrop-filter: blur(1px);
            padding: 1rem;
            text-align: center;
        }

        h1{
            color: white;
        }

        table {
            color: white;
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            background: rgba(164, 165, 166, 0.28);
            backdrop-filter: blur(12.5px);
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
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
<section class="NavBar">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="Servlet">MyJob</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Servlet">Home</a>
                    </li>
                    <li class="nav-item" th:if="${Type eq 'User'}">
                        <a class="nav-link active" aria-current="page" href="Login.jsp">Login</a>
                    </li>
                    <li class="nav-item" th:if="${Type eq 'User'}">
                        <a class="nav-link active" aria-current="page" href="SignUp.jsp">Sign Up</a>
                    </li>
                    <li class="nav-item" th:if="${Type eq 'Candidate'}">
                        <a class="nav-link active" aria-current="page" href="CandidateServlet?action=Profile">Profile</a>
                    </li>
                    <li class="nav-item" th:if="${Type eq 'Candidate'}">
                        <a class="nav-link active" aria-current="page" href="Servlet?action=LogOut">LogOut</a>
                    </li>
                    <li class="nav-item" th:if="${Type eq 'Recruiter'}">
                        <a class="nav-link active" aria-current="page" href="RecruiterServlet?action=Profile">Profile</a>
                    </li>
                    <li class="nav-item" th:if="${Type eq 'Recruiter'}">
                        <a class="nav-link active" aria-current="page" href="Servlet?action=LogOut">LogOut</a>
                    </li>
                    <li class="nav-item" th:unless="${Type eq 'User' or Type eq 'Candidate' or Type eq 'Recruiter'}">
                        <a class="nav-link active" aria-current="page" href="Servlet?action=LogOut">LogOut</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>

<h1>Candidate's List</h1>
<br>
<table>
    <thead>
        <tr>
            <th>Candidate's Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Password</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        <tr th:each="C : ${CandidateList}">
            <td th:text="${C.getID()}"></td>
            <td th:text="${C.getFirstName()}"></td>
            <td th:text="${C.getLastName()}"></td>
            <td th:text="${C.getPhone()}"></td>
            <td th:text="${C.getEmail()}"></td>
            <td th:text="${C.getPassword()}"></td>
            <td th:if="${Type eq 'Recruiter'}">
                <form action="RecruiterServlet" method="post">
                    <input type="hidden" name="action" value="DeleteCandidate">
                    <input type="hidden" name="ID" th:value="${C.ID}">
                    <button type="submit">Refuse</button>
                </form>
            </td>
            <td th:if="${Type eq 'Recruiter'}">
                <form action="RecruiterServlet" method="post">
                    <input type="hidden" name="action" value="AcceptCandidate">
                    <input type="hidden" name="ID" th:value="${C.ID}">
                    <button type="submit">Accept</button>
                </form>
            </td>
            <td th:if="${Type eq 'Recruiter'}">
                <form action="RecruiterServlet" method="post">
                    <input type="hidden" name="action" value="CandidateInfo">
                    <input type="hidden" name="ID" th:value="${C.ID}">
                    <button type="submit">More Info</button>
                </form>
            </td>
            <td th:unless="${Type eq 'Recruiter'}">
                <form action="AdminServlet" method="post">
                    <input type="hidden" name="action" value="sendCandidate">
                    <input type="hidden" name="ID" th:value="${C.ID}">
                    <button type="submit">More Info</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

</body>
</html>
