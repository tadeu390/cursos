<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    public function oneToMany()
    {
        $countrys = Country::find(1)->with(['states'])->get();

        //print_r($country->states()->where('sigla', 'GO')->get()->toArray());
        //dd($country->with('states')->get());

        foreach ($countrys as $country) {
            echo '<ul>';
                echo '<li>';
                    echo $country->name;
                    foreach ($country->states as $state) {
                        echo '<ul>';
                            echo '<li>';
                                echo $state->name;
                                foreach ($state->cities as $citie) {
                                    echo '<ul>';
                                        echo '<li>';
                                            echo $citie->name;
                                        echo '</li>';
                                    echo '</ul>';
                                }
                            echo '</li>';
                        echo '</ul>';
                    }
                echo '</li>';
            echo '</ul>';
        }
    }

    public function manyToOne()
    {
        $state = State::find(1);

        echo '<pre>';

        print_r($state->country->toArray());
    }

    public function oneToManyInsert()
    {
        $dataForm = [
            'name' => 'Ceará',
            'sigla' => 'CE',
        ];

        $country = Country::find(1);
        $country->states()->create($dataForm);

    }

    public function hasManyThrough()
    {
        $country = Country::find(1);
        echo "{$country->name}<br />";
        foreach ($country->cities as $city) {
            echo "{$city->name}<br />";
        }

        echo "Total de cidades: {$country->cities->count()}";
    }
}
