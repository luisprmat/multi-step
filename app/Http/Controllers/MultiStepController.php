<?php

namespace App\Http\Controllers;

use App\Http\Requests\MultiStepFormRequest;
use App\Models\City;
use App\Models\Country;
use Inertia\Inertia;
use Inertia\Response;

class MultiStepController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Dashboard', [
            'countries' => Country::all()->toArray(),
            'cities' => City::all()->groupBy('country_id')->toArray(),
        ]);
    }

    public function store(MultiStepFormRequest $request)
    {
        dd('submit');
    }
}
