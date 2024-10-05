@extends('layouts.app')

@section('content')
   <div class="m-auto w-4/8 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase font-bold">Update car</h1>
    
    </div>
   </div>
   <div class="flex justify-center pt-15">
       <form action="/cars/{{ $car->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="block">
            <input type="file" class="block shadow-2xl mb-10 p-2 w-80 italic placeholder-gray-400" name='image' placeholder="Brand name ...">
        </div>
        <div class="block">
            <input type="text" value="{{ $car->name }}" class="block shadow-2xl mb-10 p-2 w-80 italic placeholder-gray-400" name='name' placeholder="Brand name ...">
        </div>
        <div class="block">
            <input type="text" value="{{ $car->founded }}" class="block shadow-2xl mb-10 p-2 w-80 italic placeholder-gray-400" name='founded' placeholder="Founded ...">
        </div>
        <div class="block">
            <input type="text" value="{{ $car->description }}" class="block shadow-2xl mb-10 p-2 w-80 italic placeholder-gray-400" name='description' placeholder="Description ...">
        </div>
        <button class="bg-green-500 block shadow-2xl mb-10 p-2 w-80 uppercase font-bold" type="submit">Submit</button>
       </form>
   </div>
    @if ($errors->any())
      <div class="w-4/8 m-auto text-center">
        @foreach ($errors->all() as $error)
           <li class="text-red-500 list-none">
            {{ $error }}
           </li> 
        @endforeach
      </div>
        
    @endif
@endsection