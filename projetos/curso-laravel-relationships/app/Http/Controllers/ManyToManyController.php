<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Company;

class ManyToManyController extends Controller
{
    public function manyToMany()
    {
        $city = City::find(1);

        echo "{$city->name}<br />";

        foreach ($city->companys as $company) {
            echo "{$company->name}<br />";
        }
    }

    public function manyToManyInverse()
    {
        $company = Company::find(1);

        echo "{$company->name}<br />";

        foreach ($company->cities as $city) {
            echo "{$city->name}<br />";
        }
    }

    public function manyToManyInsert()
    {
        $dataForm = [
            3, 4
        ];

        $company = Company::find(1);
        $company->cities()->sync($dataForm);
        $company->cities()->detach(3);

    }
}
