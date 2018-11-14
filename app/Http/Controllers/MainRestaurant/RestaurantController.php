<?php

namespace App\Http\Controllers\MainRestaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRestaurant;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\RestaurantResource as FullRestaurant;
use App\Http\Resources\RestaurantListResource as ListRestaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::all();
        $pluckedName = $restaurant->pluck('name');
        $pluckedName->all();
        $pluckedCity = $restaurant->pluck('city')->unique();
        $pluckedCity->all();
        return ['names'=>$pluckedName,'cities'=>$pluckedCity];
    }

    public function search(Request $request)
    {
        $restaurantName = $request->input('searchName');
        $restaurantCity = $request->input('searchCity');

        $restaurant = Restaurant::where
        (
            [
                ['name', 'like', "%{$restaurantName}%"],
                ['city', 'like', "%{$restaurantCity}%"],
            ]
        )
            ->get();
        return ListRestaurant::collection($restaurant);
    }

    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return new FullRestaurant($restaurant);
    }

    public function store(CreateRestaurant $request)
    {
        $restaurant = new Restaurant();
        $restaurant->name = $request->input('name');
        $restaurant->city = $request->input('city');
        $restaurant->address = $request->input('address');
        $restaurant->phone = $request->input('phone');
        if($request->hasFile('photo'))
        {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'_'.$extension;
            $path = $request->file('photo')->storeAs('public/restaurant_photos', $fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.png';
        }
        $restaurant->photo = $fileNameToStore;
        $restaurant->owner_id = Auth::guard('api')->id();
        $restaurant->save();
        return new FullRestaurant($restaurant);
    }

    public function update(CreateRestaurant $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->name = $request->input('name');
        $restaurant->city = $request->input('city');
        $restaurant->address = $request->input('address');
        $restaurant->phone = $request->input('phone');
        if($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'_'.$extension;
            $path = $request->file('photo')->storeAs('public/restaurant_photos', $fileNameToStore);
        }
        if($request->hasFile('photo'))
        {
            $ingredient->image = $fileNameToStore;
        }
        $restaurant->description = $request->input('description');
        $restaurant->update();
        return new FullRestaurant($restaurant);
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        if($restaurant->delete()) {
            if($restaurant->image != 'noimage.jpg'){
                Storage::delete('public/restaurant_photos/'.$restaurant->photo);
            }
            return new FullRestaurant($restaurant);
        }
    }
}
