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
    <div class="bg-white shadow-lg max-w-lg md:flex ">
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
                    <label for="titre" class="block text-gray-600 mb-2">Titre</label>
                    <input type="text" name="titre" class="border shadow-inner 
                    py-2 px-3 text-gray-700 w-full " value={{$idee->titre}}>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-600 mb-2">Description</label>
                    <textarea class="border shadow-inner text-gray-700 w-full" name="description" value={{$idee->description}}></textarea>
                </div>
                <div class="mb-4">
                    <select class="form-select" aria-label="Default select example" name="user_id">
                        <option selected>Utilisateur</option>
                        @foreach ($users as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                      </select>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 
                rounded over:bg-blue-600">Modifier</button>
            </div>
        </form>
 </div>
</x-auth-card>
    
</body>
</html>