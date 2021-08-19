<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;

class DependentDropdownController extends Controller
{
    //
    public function index()
    {

        $provinces = Province::pluck('name', 'id');

        return view('index', [
            'provinces' => $provinces,

        ]);
    }

    public function store(Request $request)
    {
        $cities = City::where('province_id', $request->id)
            ->pluck('name', 'id');

        return response()->json($cities);
    }

    public function village(Request $request)
    {
        $vilages = City::where('province_id', $request->id)
            ->pluck('name', 'id');

        return response()->json($vilages);
    }
}
