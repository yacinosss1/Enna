

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tableau de Données</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* margin: 20px; */
            background-color: #f4f4f4;
        }

        .header1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    @if (session()->has('success')) {
        <div class="container container-narrow">
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        </div>
    } @endif

    @auth
    <div class="container mt-5">
        <h1 class="mb-4">Formulaire d'Inscription</h1>
        <form action="/offrePublier" method="POST">
            @csrf
            <div class="mb-3">
                <label for="numero" class="form-label">Numéro :</label>
                <input type="text" id="numero" name="numero" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="objet" class="form-label">Objet :</label>
                <input type="text" id="objet" name="objet" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="date_Limite" class="form-label">Date limite :</label>
                <input type="date" id="date_Limite" name="date_Limite" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="proroge" class="form-label">Prorogé au :</label>
                <input type="date" id="proroge" name="proroge" class="form-control">
            </div>

            <div class="mb-3">
                <label for="observation" class="form-label">Observation :</label>
                <textarea id="observation" name="observation" class="form-control" rows="4" cols="50"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
            <form action="adminLogout" method="POST" onsubmit="return confirmLogout()">
                @csrf
                <button class="btn btn-danger mt-4" type="submit">Déconnecter</button>
            </form>
        </div>

        <script>
            function confirmLogout() {
                return confirm("Êtes-vous sûr de vouloir vous déconnecter ?");
            }
        </script>

        </div>
    </div>

<h1>tableau admin </h1>

    <table>
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Objet</th>
                <th>Date limite</th>
                <th>Prorogé au</th>
                <th>Observation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $offres as $offre )  
            <tr>
                <td>{{$offre->id}}</td>
                <td>{{$offre->objet}}</td>
                <td>{{$offre->date_Limite}}</td>
                <td>{{$offre->proroge}}</td>
                <td>{{$offre->observation}}</td>
            </tr>
       @endforeach    
        </tbody>
    </table>

@else
<h1 class="header1">Tableau des Données user </h1>


<table>
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Objet</th>
                <th>Date limite</th>
                <th>Prorogé au</th>
                <th>Observation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $offres as $offre )  
            <tr>
                <td>{{$offre->id}}</td>
                <td>{{$offre->objet}}</td>
                <td>{{$offre->date_Limite}}</td>
                <td>{{$offre->proroge}}</td>
                <td>{{$offre->observation}}</td>
            </tr>
       @endforeach    
        </tbody>
    </table>

    @endauth

    <!-- <h1 class="header1">Tableau des Données</h1> -->
    <!-- <table>
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Objet</th>
                <th>Date limite</th>
                <th>Prorogé au</th>
                <th>Observation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $offres as $offre )  
            <tr>
                <td>{{$offre->id}}</td>
                <td>{{$offre->objet}}</td>
                <td>{{$offre->date_Limite}}</td>
                <td>{{$offre->proroge}}</td>
                <td>{{$offre->observation}}</td>
            </tr>
       @endforeach    
        </tbody>
    </table> -->
</body>

</html>

