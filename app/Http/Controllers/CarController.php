<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cars\StoreCliensCarstRequest;
use App\Http\Requests\Cars\UpdateCliensCarstRequest;
use App\Models\Car;
use App\Models\Client;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function store(StoreCliensCarstRequest $request)
    {
        Car::create($request->except(['_token']));

        return response(200);
    }

    public function update(UpdateCliensCarstRequest $request)
    {
        $car= Car::find($request->id);
        $car->update($request->except(['_token']));

        return response(200);
    }

    public function change_status_client_cars(Request $request,$id)
    {
        $car = Car::find($id);
        if($car->is_parked === true){
            $car->is_parked = false;
        }else{
            $car->is_parked = true;
        }
        $car->update();

        return response(200);
    }

    public function delete(Request $request,$id)
    {
        $car = Car::find($id);
        $car->delete();

        return response(200);
    }

}
