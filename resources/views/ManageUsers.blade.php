<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>

    {{-- STYLE --}}
    <style>
        .PasswordSection{
            display: none;
        }
        .candidatesSection,.recruitersSection{
            display: none;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 10px 20px;
            margin-right: 10px;
        }

        footer{
            width: 100%;
            height: 5rem;
            padding: 1rem;
        }

        .NavBar{
            width: 100%;
            height: 5rem;
        }

        footer{
            width: 100%;
            height: 5rem;
            padding: 1rem;
        }

    </style>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <section class="NavBar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('Servlet') }}">MyJob</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('Servlet') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('Servlet?action=LogOut') }}">LogOut</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </section>

    <button id="candidateBtn"> Candidate </button>
    <button id="recruiterBtn"> Recruiter </button>
    <th><a href="{{ url('AddUser') }}" >Create</a></th>

    <section id="candidatesSection" class="candidatesSection">
        <h1>Candidates :</h1>
        <table>
            <tr>
                <h1>Search</h1>
                <form action="{{ url('AdminServlet?action=SearchCandidate') }}" method="post">
                    {{-- Blade directive for CSRF token --}}
                    @csrf
                    <input type="text" name="searchTerm" placeholder="Search by name...">
                    <button type="submit">Search</button>
                    <button type="submit">Show All</button>
                </form>
            <tr>
            <tr>
                <th>Candidate's Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Password</th>
                <th>New Password</th>
                <th>Verify Password</th>
                <th colspan="1">Update</th>
                <th colspan="2"></th>
            </tr>
            @foreach ($request->get('Candidates') as $C)
                <tr>
                    <td>{{ $C->getID() }}</td>
                    <td>{{ $C->getFirstName() }}</td>
                    <td>{{ $C->getLastName() }}</td>
                    <td>{{ $C->getPhone() }}</td>
                    <td>{{ $C->getEmail() }}</td>
                    <td>{{ $C->getPassword() }}</td>
                    <form action="{{ url('AdminServlet') }}" method="post" >
                        {{-- Blade directive for CSRF token --}}
                        @csrf
                        <input type="hidden" name="action" value="UpdateCandidate"/>
                        <input type="hidden" name="ID" value="{{ $C->ID }}"/>
                        <td><input type="text" name="Password1" onkeyup="checkPassword()"/></td>
                        <td><input type="text" name="Password2" onkeyup="checkPassword()"/></td>
                        <td><button type="submit">Submit Password</button></td>
                    </form>
                    <td><a href="#" onclick="confirmDeleteCandidate('{{ $C->ID }}')" >Delete</a></td>
                    <td><a href="{{ url('AdminServlet?action=sendCandidate&ID=' . $C->ID) }}">More</a></td>
                </tr>
            @endforeach
        </table>
    </section>

    <section id="recruitersSection" class="recruitersSection" >
        <h1>Recruiters :</h1>
        <table>
            <tr>
                <h1>Search</h1>
                <form action="{{ url('AdminServlet?action=SearchRecruiter') }}" method="post">
                    {{-- Blade directive for CSRF token --}}
                    @csrf
                    <input type="text" name="searchTerm" placeholder="Search by name...">
                    <button type="submit">Search</button>
                    <button type="submit">Show All</button>
                </form>
            <tr>
            <tr>
                <th>Recruiter's Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Password</th>
                <th>New Password</th>
                <th>Verify Password</th>
                <th colspan="1">Update</th>
                <th colspan="2"></th>
            </tr>
            @foreach ($request->get('Recruiters') as $R)
                <tr>
                    <td>{{ $R->getID() }}</td>
                    <td>{{ $R->getFirstName() }}</td>
                    <td>{{ $R->getLastName() }}</td>
                    <td>{{ $R->getPhone() }}</td>
                    <td>{{ $R->getEmail() }}</td>
                    <td>{{ $R->getPassword() }}</td>
                    <form action="{{ url('AdminServlet') }}" method="post" >
                        {{-- Blade directive for CSRF token --}}
                        @csrf
                        <input type="hidden" name="action" value="UpdateRecruiter"/>
                        <input type="hidden" name="ID" value="{{ $R->ID }}"/>
                        <td><input type="text" name="Password1" onkeyup="checkPassword()"/></td>
                        <td><input type="text" name="Password2" onkeyup="checkPassword()"/></td>
                        <td><button type="submit">Submit</button></td>
                    </form>
                    <td><a href="#" onclick="confirmDeleteRecruiter('{{ $R->ID }}')" >Delete</a></td>
                    <td><a href="{{ url('AdminServlet?action=sendRecruiter&ID=' . $R->ID) }}" >More</a></td>
                </tr>
            @endforeach
        </table>
    </section>

    {{-- SCRIPT --}}
    <script>
        // Your JavaScript code remains unchanged
    </script>

</body>
</html>
``
