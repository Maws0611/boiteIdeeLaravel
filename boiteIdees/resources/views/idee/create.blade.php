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
<body class=bg-gray-100>
    <div class="bg-red-700 shadow-sm sm:rounded-lg">
        <h1 class="text-center text-white font-bold">Boite à Idée</h1>
    </div>
<div class="d-flex justify-content-evenly">
    <div class="col-6 pt-5">
        <form method="post" action="{{ route('idees.store') }}" >
            @csrf
            <div class="p-4 flex-1 md:flex-col justify-center items-center"> 
                <div class="mb-4">
                    <x-label for="titre" :value="__('Merci de donner un titre claire pour la categorisation')"/>
                    <x-input id="titre" class="block mt-1 w-full" type="text" name="titre" :value="old('titre')" required autofocus />
                </div>
                <div class="mb-4">
                    <x-label for="description" :value="__('Description')"/>
                    <x-textarea  :value="old('description')"/>
                </div>
                <div class="mb-4">
                    <select 
                        class="form-select
                        block mt-1 w-full
                        rounded-md shadow-sm border-gray-300 focus:border-indigo-300 
                        focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        aria-label="Default select example" name="user_id" :value="old('user_id')">
                    <option selected>Utilisateur</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-button class=bg-red-900>
                    {{ __("Ajouter") }}
                </x-button>
            </div>
        </form>
    </div>
    <div class="col-6">
        <img src="{{asset('img/idea.svg')}}" width="80%"/>
    </div>
</div>
</body>
</html>

