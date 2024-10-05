<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();

        return view('cars.index', [
            'cars' =>$cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cars',
            'founded' => 'required|integer|min:0|max:2024',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:5048'
        ]);

        $newImageName = time().'_'.strtolower($request->input('name')).'.'.$request->image->extension();
        $request->image->move(public_path('images'),$newImageName);

        $car = Car::create([
            'name' => $request->input('name'),
            'founded' =>  $request->input('founded'),
            'description' =>  $request->input('description'),
            'image_path' => $newImageName
        ]);
        //
        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $car = Car::find($id);
        return view('cars.show')-> with('car',$car);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $car = Car::find($id);//->first();
        return view('cars.edit')-> with('car',$car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'founded' => 'required|integer|min:0|max:2024',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:5048'
        ]);
        
        $newImageName = time().'_'.strtolower($request->input('name')).'.'.$request->image->extension();
        $request->image->move(public_path('images'),$newImageName);

        $car = Car::where ('id',$id)
             ->update([
            'name' => $request->input('name'),
            'founded' =>  $request->input('founded'),
            'description' =>  $request->input('description'),
            'image_path' => $newImageName
        ]);
        //
        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $car = Car::find($id);
        $car->delete();
        return redirect('/cars');
    }
}
