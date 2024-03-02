<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>

        h1{
            color: white;
        }

        body {
            background-image: url('pics/back.png');
            background-size: cover;
            padding: 1rem;
        }

        .NavBar, footer {
            width: 100%;
            background-color: transparent;
            backdrop-filter: blur(1px);
            padding: 1rem;
            text-align: center;
        }

        .button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 8px;
        }

        .button:hover {
            background-color: #0056b3;
            color: white;
        }

        .section,.Annonce {
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        .section h1,.Annonce h1{
            color: black;
        }

        .section {
            display: none;
        }

        table {
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        input, select{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(1px);
        }

        .row {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            padding: 1rem;
        }

        .Card {
            background: rgba(164, 165, 166, 0.28);
            backdrop-filter: blur(12.5px);
            padding: 20px;
            border-radius: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            min-width: 19rem;
            min-height: 16rem;
            color: black;
            box-sizing: border-box;
            border: 3px solid #97B4DF;
        }

        .Card h2 {
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .Card p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .Card h3 {
            font-size: 16px;
        }

    </style>
</head>
<body>

    <section class="NavBar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('home') }}">MyJob</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('home') }}">Home</a>
                        </li>
                        @if($Type == "User")
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('signup') }}">Sign Up</a>
                            </li>
                        @elseif($Type == "Candidate")
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('candidate/profile') }}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('logout') }}">LogOut</a>
                            </li>
                        @elseif($Type == "Recruiter")
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('recruiter/profile') }}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('logout') }}">LogOut</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('logout') }}">LogOut</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    

<section>
        <h1>User Information</h1>
    
        <button class="button" id="InfoBtn"> Update Profile </button>
        <button class="button" id="PasswordBtn"> Update Password </button>
    
        @if($user instanceof \App\Models\Candidate)
    
            <button class="button" id="ApplyBtn"> Applied To </button>
            <button class="button" id="CompetencesBtn"> Competences </button>
            <button class="button" id="DiplomasBtn"> Diplomas </button>
            <button class="button" id="CertificatesBtn"> Certificates </button>
    
            <button class="button" onclick="deleteCandidate({{ $Candidate->getID() }})">Delete Profile</button>
            <form action="{{ route('candidate.updateProfile') }}" method="post" id="InfoSection" class="section">
                @csrf
                <input type="hidden" name="action" value="UpdateProfile"/>
                <table>
                    <tr>
                        <th>First Name</th>
                        <td><label>{{ $Candidate->getFirstName() }}</label></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td><label>{{ $Candidate->getLastName() }}</label></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><input type="email" name="Email" value="{{ $Candidate->getEmail() }}"></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><input type="text" name="Phone" value="{{ $Candidate->getPhone() }}"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button class="button" onclick="document.getElementById('fileInput').click()">Upload CV</button>
                            <input name="CV" type="file" id="fileInput" style="display: none;" onchange="displayFileInfo()" accept=".pdf, .doc, .docx">
                            <div id="fileInfo"></div>
                        </td>
                    </tr>
                </table>
                <button class="button" type="submit">Update</button>
            </form>
    
            <!-- Competences Section -->
            <div class="section" id="CompetencesSection">
                <h1>Competences</h1>
                <a class="button" href="{{ route('competence.create') }}">New</a>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Level</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    @foreach($Competences as $Info)
                        <tr>
                            <form action="{{ route('candidate.updateCompetence') }}" method="post">
                                @csrf
                                <input type="hidden" name="ID" value="{{ $Info->getID() }}"/>
                                <td><input type="text" name="Name" value="{{ $Info->getName() }}" required></td>
                                <td>
                                    <select name="Level" required>
                                        <option value="{{ $Info->getLevel() }}">{{ $Info->getLevel() }}</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="hidden" name="action" value="UpdateCompetence"/>
                                    <button class="button" type="submit">Update</button>
                                </td>
                            </form>
                            <form action="{{ route('candidate.deleteCompetence') }}" method="post">
                                @csrf
                                <input type="hidden" name="ID" value="{{ $Info->getID() }}"/>
                                <td><button class="button" type="submit">Delete</button></td>
                            </form>
                        </tr>
                    @endforeach
                </table>
            </div>
    
            <!-- Diplomas Section -->
            <div class="section" id="DiplomasSection">
                <h1>Diplomas</h1>
                <a class="button" href="{{ route('diploma.create') }}">New</a>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    @foreach($Diplomas as $Info)
                        <tr>
                            <form action="{{ route('candidate.updateDiploma') }}" method="post">
                                @csrf
                                <input type="hidden" name="ID" value="{{ $Info->getID() }}"/>
                                <td><input type="text" name="Name" value="{{ $Info->getName() }}" required></td>
                                <td><input type="date" name="Date" value="{{ $Info->getDate() }}" required></td>
                                <td>
                                    <input type="hidden" name="action" value="UpdateDiploma"/>
                                    <button class="button" type="submit">Update</button>
                                </td>
                            </form>
                            <form action="{{ route('candidate.deleteDiploma') }}" method="post">
                                @csrf
                                <input type="hidden" name="ID" value="{{ $Info->getID() }}"/>
                                <td><button class="button" type="submit">Delete</button></td>
                            </form>
                        </tr>
                    @endforeach
                </table>
            </div>
    
            <!-- Certificates Section -->
            <div class="section" id="CertificatesSection">
                <h1>Certificates</h1>
                <a class="button" href="{{ route('certificate.create') }}">New</a>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Issuer</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    @foreach($Certificates as $Info)
                        <tr>
                            <form action="{{ route('candidate.updateCertificate') }}" method="post">
                                @csrf
                                <input type="hidden" name="ID" value="{{ $Info->getID() }}"/>
                                <td><input type="text" name="Name" value="{{ $Info->getName() }}" required></td>
                                <td><input type="text" name="Issuer" value="{{ $Info->getIssuer() }}" required></td>
                                <td>
                                    <input type="hidden" name="action" value="UpdateCertificate"/>
                                    <button class="button" type="submit">Update</button>
                                </td>
                            </form>
                            <form action="{{ route('candidate.deleteCertificate') }}" method="post">
                                @csrf
                                <input type="hidden" name="ID" value="{{ $Info->getID() }}"/>
                                <td><button class="button" type="submit">Delete</button></td>
                            </form>
                        </tr>
                    @endforeach
                </table>
            </div>
    
            <!-- Applied Announcements Section -->
<div class="section" id="ApplySection">
    <h1>Applied Announcements</h1>
    <div class="row">
        @foreach ($Apply as $A)
            <div class="col-3">
                <div class="Card">
                    <h2>{{ $A->getName() }} :
                        @if ($A->getStatus())
                            Ongoing
                        @else
                            Closed
                        @endif
                    </h2>
                    <p>Type : {{ $A->getType() }}</p>
                    <p>{{ $A->getDescription() }}</p>
                    <h3>Created : {{ $A->getDate() }}</h3>
                </div>
            </div>
            <!-- Close the row and start a new row after every fourth announcement -->
            @if ($loop->index % 4 == 3)
    </div>
    <div class="row">
        @endif
        @endforeach
    </div>
</div>

@if ($user instanceof \App\Models\Recruiter)
    <button class="button" onclick="deleteRecruiter({{ $Recruiter->getID() }})">Delete Profile</button>
    <form action="{{ url('RecruiterServlet') }}" method="post" id="InfoSection" class="section">
        <input type="hidden" name="action" value="UpdateProfile"/>
        <table>
            <tr>
                <th>First Name</th>
                <td><label>{{ $Recruiter->getFirstName() }}</label></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><label>{{ $Recruiter->getLastName() }}</label></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="Email2" value="{{ $Recruiter->getEmail() }}" required></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><input type="text" name="Phone2" value="{{ $Recruiter->getPhone() }}" required></td>
            </tr>
        </table>
        <button class="button" type="submit">Update</button>
    </form>
@endif

<form action="{{ $user instanceof \App\Models\Recruiter ? url('RecruiterServlet') : url('CandidateServlet') }}" method="post" onsubmit="return validateForm()" id="PasswordSection" class="section">
    <input type="hidden" name="action" value="UpdatePassword"/>
    <table>
        <!-- Password update form fields -->
    </table>
</form>

@if ($user instanceof \App\Models\Recruiter)
    <!-- Announcements Section -->
    <div class="Annonce">
        <h1>My Announcements</h1>
        <a class="button" href="{{ url('AddAnnonce.jsp') }}">New</a>
        <table>
            <!-- Announcements table headers -->
            @foreach ($Annonces as $Info)
                <tr>
                    <!-- Announcement fields -->
                    <form action="{{ url('RecruiterServlet') }}" method="post">
                        <!-- Announcement update form -->
                    </form>
                    <form action="{{ url('RecruiterServlet') }}" method="post">
                        <!-- Announcement delete form -->
                    </form>
                    <form action="{{ url('RecruiterServlet') }}" method="post">
                        <!-- List candidates form -->
                    </form>
                </tr>
            @endforeach
        </table>
    </div>
@endif

<!-- Announcements Section -->
<div class="Annonce">
    <h1>My Announcements</h1>
    <a class="button" href="{{ url('AddAnnonce.jsp') }}">New</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Type</th>
            <th>Status</th>
            <th>Date</th>
            <th colspan="3">Actions</th>
        </tr>
        @foreach ($Annonces as $Info)
            <tr>
                <form action="{{ url('RecruiterServlet') }}" method="post">
                    <input type="hidden" name="ID" value="{{ $Info->getID() }}"/>
                    <td><input type="text" name="Name" value="{{ $Info->getName() }}" required></td>
                    <td><input type="text" name="Description" value="{{ $Info->getDescription() }}" required></td>
                    <td>
                        <select name="Type" required>
                            <option value="Stage" {{ $Info->getType() === "Stage" ? "selected" : "" }}>Stage</option>
                            <option value="Emploi" {{ $Info->getType() === "Emploi" ? "selected" : "" }}>Emploi</option>
                        </select>
                    </td>
                    <td>
                        <select name="Status" required>
                            <option value="false" {{ !$Info->getStatus() ? "selected" : "" }}>Closed</option>
                            <option value="true" {{ $Info->getStatus() ? "selected" : "" }}>OnGoing</option>
                        </select>
                    </td>
                    <td>{{ $Info->getDate() }}</td>
                    <input type="hidden" name="action" value="UpdateAnnonce"/>
                    <td><button class="button" type="submit">Update</button></td>
                </form>
                <form action="{{ url('RecruiterServlet') }}" method="post">
                    <input type="hidden" name="action" value="DeleteAnnonce"/>
                    <input type="hidden" name="ID" value="{{ $Info->getID() }}"/>
                    <td><button class="button" type="submit">Delete</button></td>
                </form>
                <form action="{{ url('RecruiterServlet') }}" method="post">
                    <input type="hidden" name="action" value="ListeCandidate"/>
                    <input type="hidden" name="ID" value="{{ $Info->getID() }}"/>
                    <td><button class="button" type="submit">Candidature</button></td>
                </form>
            </tr>
        @endforeach
    </table>
</div>
</section>
                           
<script>

    document.getElementById("InfoBtn").addEventListener("click", function() {
        document.getElementById("InfoSection").style.display = "block";
        document.getElementById("PasswordSection").style.display = "none";
        document.getElementById("ApplySection").style.display = "none";
        document.getElementById("CompetencesSection").style.display = "none";
        document.getElementById("DiplomasSection").style.display = "none";
        document.getElementById("CertificatesSection").style.display = "none";
        localStorage.setItem("lastDisplayedTable", "info");
    });

    document.getElementById("PasswordBtn").addEventListener("click", function() {
        document.getElementById("InfoSection").style.display = "none";
        document.getElementById("PasswordSection").style.display = "block";
        document.getElementById("ApplySection").style.display = "none";
        document.getElementById("CompetencesSection").style.display = "none";
        document.getElementById("DiplomasSection").style.display = "none";
        document.getElementById("CertificatesSection").style.display = "none";
        localStorage.setItem("lastDisplayedTable", "password");
    });

    document.getElementById("ApplyBtn").addEventListener("click", function() {
        document.getElementById("InfoSection").style.display = "none";
        document.getElementById("PasswordSection").style.display = "none";
        document.getElementById("ApplySection").style.display = "block";
        document.getElementById("CompetencesSection").style.display = "none";
        document.getElementById("DiplomasSection").style.display = "none";
        document.getElementById("CertificatesSection").style.display = "none";
        localStorage.setItem("lastDisplayedTable", "apply");
    });

    document.getElementById("CompetencesBtn").addEventListener("click", function() {
        document.getElementById("InfoSection").style.display = "none";
        document.getElementById("PasswordSection").style.display = "none";
        document.getElementById("ApplySection").style.display = "none";
        document.getElementById("CompetencesSection").style.display = "block";
        document.getElementById("DiplomasSection").style.display = "none";
        document.getElementById("CertificatesSection").style.display = "none";
        localStorage.setItem("lastDisplayedTable", "competence");
    });

    document.getElementById("DiplomasBtn").addEventListener("click", function() {
        document.getElementById("InfoSection").style.display = "none";
        document.getElementById("PasswordSection").style.display = "none";
        document.getElementById("ApplySection").style.display = "none";
        document.getElementById("CompetencesSection").style.display = "none";
        document.getElementById("DiplomasSection").style.display = "block";
        document.getElementById("CertificatesSection").style.display = "none";
        localStorage.setItem("lastDisplayedTable", "diplom");
    });

    document.getElementById("CertificatesBtn").addEventListener("click", function() {
        document.getElementById("InfoSection").style.display = "none";
        document.getElementById("PasswordSection").style.display = "none";
        document.getElementById("ApplySection").style.display = "none";
        document.getElementById("CompetencesSection").style.display = "none";
        document.getElementById("DiplomasSection").style.display = "none";
        document.getElementById("CertificatesSection").style.display = "block";
        localStorage.setItem("lastDisplayedTable", "certificate");
    });

    window.onload = function() {
        var lastDisplayedTable = localStorage.getItem("lastDisplayedTable");
        if (lastDisplayedTable === "info") {
            document.getElementById("InfoSection").style.display = "block";
            document.getElementById("PasswordSection").style.display = "none";
            document.getElementById("ApplySection").style.display = "none";
            document.getElementById("CompetencesSection").style.display = "none";
            document.getElementById("DiplomasSection").style.display = "none";
            document.getElementById("CertificatesSection").style.display = "none";
        } else if (lastDisplayedTable === "password") {
            document.getElementById("InfoSection").style.display = "none";
            document.getElementById("PasswordSection").style.display = "block";
            document.getElementById("ApplySection").style.display = "none";
            document.getElementById("CompetencesSection").style.display = "none";
            document.getElementById("DiplomasSection").style.display = "none";
            document.getElementById("CertificatesSection").style.display = "none";
        } else if (lastDisplayedTable === "apply") {
            document.getElementById("InfoSection").style.display = "none";
            document.getElementById("PasswordSection").style.display = "none";
            document.getElementById("ApplySection").style.display = "block";
            document.getElementById("CompetencesSection").style.display = "none";
            document.getElementById("DiplomasSection").style.display = "none";
            document.getElementById("CertificatesSection").style.display = "none";
        } else if (lastDisplayedTable === "competence") {
            document.getElementById("InfoSection").style.display = "none";
            document.getElementById("PasswordSection").style.display = "none";
            document.getElementById("ApplySection").style.display = "none";
            document.getElementById("CompetencesSection").style.display = "block";
            document.getElementById("DiplomasSection").style.display = "none";
            document.getElementById("CertificatesSection").style.display = "none";
        } else if (lastDisplayedTable === "diplom") {
            document.getElementById("InfoSection").style.display = "none";
            document.getElementById("PasswordSection").style.display = "none";
            document.getElementById("ApplySection").style.display = "none";
            document.getElementById("CompetencesSection").style.display = "none";
            document.getElementById("DiplomasSection").style.display = "block";
            document.getElementById("CertificatesSection").style.display = "none";
        } else if (lastDisplayedTable === "certificate") {
            document.getElementById("InfoSection").style.display = "none";
            document.getElementById("PasswordSection").style.display = "none";
            document.getElementById("ApplySection").style.display = "none";
            document.getElementById("CompetencesSection").style.display = "none";
            document.getElementById("DiplomasSection").style.display = "none";
            document.getElementById("CertificatesSection").style.display = "block";
        }
    };

    function deleteCandidate(ID) {
        var password = prompt("Please enter your password to confirm deletion:");

        if (password !== null && password !== "") {
            var confirmMessage = confirm("Are you sure you want to delete this recruiter?");

            if (confirmMessage) {
                window.location.href = "CandidateServlet?action=DeleteProfile&ID=" + ID + "&password=" + password;
            } else {
                alert("Deletion canceled.");
            }
        } else {
            alert("Password is required to confirm deletion.");
        }
    }

    function deleteRecruiter(ID) {
        var password = prompt("Please enter your password to confirm deletion:");

        if (password !== null && password !== "") {
            var confirmMessage = confirm("Are you sure you want to delete this recruiter?");

            if (confirmMessage) {
                window.location.href = "RecruiterServlet?action=DeleteProfile&ID=" + ID + "&password=" + password;
            } else {
                alert("Deletion canceled.");
            }
        } else {
            alert("Password is required to confirm deletion.");
        }
    }

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
