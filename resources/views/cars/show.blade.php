@extends('layouts.app')

@section('content')
   <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <div class="flex justify-center items-center pt-12">
                <img src="{{ asset('images/'.$car->image_path) }}" class="w-8/15 mb-8 shadow-xl"> 
            </div>
            <h1 class="text-5xl uppercase font-bold">{{ $car->name }}</h1>    
        </div>
        <div class="py-10 text-center">
            <div class="m-auto">
                <span class="uppercase text-blue-500 font-bold text-xs italic">
                    Founded: {{ $car->founded }}
                </span>
                <p class="text-lg text-gray-700 py-6">
                    {{ $car->description }}
                </p>
                <div class="flex justify-center items-center">
                    <table class="table_auto">
                        <tr class="bg-blue-100">
                            <th class="w-1/4 border-4 border-gray-500">Model</th>
                            <th class="w-1/4 border-4 border-gray-500">Engines</th>
                            <th class="w-1/4 border-4 border-gray-500">Date</th>
                        </tr>
                        @forelse ($car->carModels as $model)
                        <tr>
                            <td class="border-4 border-gray-500">
                                {{ $model->model_name }}
                            </td> 
                            <td class="border-4 border-gray-500">
                                @foreach ($car->engines as $engine)
                                    @if ($model->id == $engine->model_id)
                                        {{ $engine->engine_name }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="border-4 border-gray-500">
                                {{ date('d-m-y',strtotime($car->productionDate->creation_date)) }}
                            </td>
                        @empty
                        </tr>
                        <tr>
                            <td class="border-4 border-gray-500" colspan="3">
                                <p class="italic text-red-600">No models found</p>
                            </td>
                        </tr> 
                        @endforelse
                    </table> 
                    
                    
                </div>
                <p class="text-center pt-4">
                    Product types:
                    @forelse ($car->products as $product)
                        {{ $product->name }}
                    @empty
                        <p>No car product description</p>
                    @endforelse
                </p>
            </div>
        </div>
   </div>   
@endsection