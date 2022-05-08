<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boite à idée</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body class="bg-gray-500">
<div class="row">
  @foreach($idees as $idee)
<div class="card ms-5 mb-2 mt-3 shadow-lg" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$idee->titre}}</h5>
    <p class="card-text">{{$idee->description}}</p>
    <div class="d-inline-flex">
      <form action="{{ route('idees.destroy', $idee->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit"><x-delete/></button>
      </form>
      <a href="{{route('idees.edit', $idee->id)}}" class="card-link btn btn-primary ms-5"><x-edit/></a>
    </div>
  </div>
</div>
@endforeach
</div>

</body>
</html>