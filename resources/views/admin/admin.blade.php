
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin Dashboard</title>
</head>
<body>
    
</body>
</html>

@if(auth::user()->role==1)

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.all.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
<div class="container">
<div class="row">
<div class="col-md-12">


<h1>Liste des ouvrages disponibles</h1>
<a href="{{ url('Oeuvre/create') }}"><button  class="btn btn-primary" >Ajouter Oeuvre</button></a>

<hr>
<div class="card-body">
    <div class="table table-responsive">
        <table class="table-bordred">
            <thead>
                <tr>
                    <th>titre</th>
                    <th>auteur</th>
                    <th>date de publication</th>
                </tr>
            </thead>
            <tbody>
                @foreach($oeuvre as $ouvrage)
                <tr>
                    <td>{{ $ouvrage->titre }}</td>
                    <td>{{ $ouvrage->auteur }}</td>
                    <td>{{ $ouvrage->annee }}</td>
                    <td>
                        <form action="{{ route('Oeuvre.destroy',$ouvrage) }}" method="POST">
                            @csrf
                            @method("DELETE")

                            <button type="submit"  class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endif