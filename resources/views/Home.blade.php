<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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

        .box {
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

        .apply-button {
            background-color: white;
            color: black;
            border-radius: 8px;
            padding: 12px 24px;
            cursor: pointer;
            box-shadow: inset 1px 1px 1px rgba(0, 0, 0, 0.25);
            width: 7rem;
            height: 3rem;
        }

        .button {
            background: rgba(255, 255, 255, 0.45);
            backdrop-filter: blur(12.5px);
            color: black;
            border-radius: 40px;
            padding: 12px 24px;
            cursor: pointer;
            border: 3px solid #97B4DF;
        }

        .Header, .Annonces {
            border-bottom: 1px solid white;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .Annonces {
            height:90vh;
            display: flex;
            justify-content: flex-start; /* Align cards to the left */
            flex-wrap: wrap;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    @php
        $Type=0;
        if(auth()->Check())
        if(auth()->user())
        $Type=auth()->user()->role;

        if($Type=='Candidate') {
        $item = $item = \App\Models\candidat::where('user_id', auth()->user()->id)->first();
        $id = $item->id;}
        elseif($Type=='Recruiter'){
        $item = \App\Models\rucruter::where('user_id',auth()->user()->id);
        $id = $item->id;}
        else
        $Type = "user";
        
    
    @endphp
    {{-- NAV BAR --}}
    <section class="NavBar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">MyJob</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        @if($Type == 'user')
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/register">Sign Up</a>
                            </li>
                        @elseif($Type == 'Candidate')
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="dashboard">Profile</a>
                            </li>
                            
                        @elseif($Type == 'Recruiter')
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="dashboard">Profile</a>
                            </li>
                            
                        @else
                            
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    {{-- START OF NEW SECTION --}}
    <section class="Header">
        <center>
            @if($Type == 'user')
                <a href="login">
                    <button type="submit" class="button">Candidate : Deposer Cv</button>
                    <button type="submit" class="button">Recruteur : Deposer Annonce</button>
                </a>
            @elseif($Type == 'Admin')
            <a href="UsersIndex">
                <button type="submit" class="button">Manage Users</button>    
            </a><a href="UniversitiesIndex">
                <button type="submit" class="button"> Universities</button>    
            </a>
            @elseif($Type == 'Candidate')
            <a href="DeposerCv">
                <button type="submit" class="button"> Deposer CV</button>    
            </a>
            <a href="DeposerCv">
                <button type="submit" class="button"> Postuler</button>    
            </a>
            @elseif($Type == 'Recruiter')
            <a href="DeposerAnonce">
                <button type="submit" class="button">Deposer anonces</button>
            </a>
            <a href="ListeAnonce">
                <button type="submit" class="button">Liste des Annonce</button>
            </a>
            @endif
        </center>
    </section>

    {{-- ANNONCES SECTION --}}
    <section class="Annonces">
        
        
        <center>
            <div class="box">
               
                @foreach ($anonces as $A)
                    <div class="Card">
                        <h2>{{ $A->post }} :
                            @if($A->status)
                                Ongoing
                            @else
                                Closed
                            @endif
                        </h2>
                        
                        <p>{{ $A->description }}</p>
                        <h3> Created : {{ $A->created_at }}</h3>
                        @if($Type == 'Candidate')
                            <form action="apply" method="post">
                                <input type="hidden" name="action" value="Apply">
                                <input type="hidden" name="anonce_id" value="{{$A->id}}">
                                <button type="submit" class="apply-button">Apply</button>
                            </form>
                        @endif
                    </div>
                @endforeach
                
            </div>
        </center>
    </section>

    {{-- FOOTER --}}
    <footer>
        <h3> MyJob Website</h3>
    </footer>
</body>
</html>
