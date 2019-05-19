<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Localization;
use Carbon\Traits\Localization as CarbonLocalization;

class OneToOneController extends Controller
{
    public function oneToOne()
    {
        $country = Country::find(1);

        echo '<pre>';
        print_r($country->toArray());

        $localization = $country->localization;

        print_r($localization->toArray());
    }

    public function inverse()
    {
        $latitude = 123;
        $longitude = 321;

        $localization = Localization::where('latitude', $latitude)->where('longitude', $longitude)->get()->first();

        echo '<pre>';
        print_r($localization->toArray());

        $country = $localization->country;
        $country = $localization->country;

        print_r($country->toArray());
    }

    public function oneToOneInsert()
    {
        $dataForm = [
            'name' => 'França',
            'latitude' => '890',
            'longitude' => '098',
        ];

        $country = Country::create($dataForm);
        $localization = $country->localization()->create($dataForm);
    }
}
