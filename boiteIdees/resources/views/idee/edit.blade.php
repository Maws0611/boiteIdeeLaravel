<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boite à idée</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
 <x-auth-card>
    <x-slot name="logo">
        <a href="/">
            <x-logo/>
        </a>
    </x-slot>
        <form method="post" action="{{ route('idees.update', $idee->id) }}">
            @csrf
            @method('PATCH')
            <div class="p-4 flex-1 md:flex-col justify-center items-center"> 
                <div class="mb-4">
                    <x-label for="titre" :value="__('Titre')"/>
                    <x-input id="titre" class="block mt-1 w-full" type="text" name="titre" value="{{$idee->titre}}" required autofocus />
                </div>
                <div class="mb-4">
                    <x-label for="description" :value="__('Description')"/>
                    <x-textarea  value="{{$idee->description}}"/>
                </div>
                <div class="mb-4">
                    <select 
                        class="form-select
                        block mt-1 w-full
                        rounded-md shadow-sm border-gray-300 focus:border-indigo-300 
                        focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        aria-label="Default select example" name="user_id" :value="{{old('user_id')}}">
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
        <div class="col-6">
            <img src="{{asset('img/idea.svg')}}" width="80%"/>
        </div>
</x-auth-card>
</body>
</html>