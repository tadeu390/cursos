<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\State;

class PolymorphicController extends Controller
{
    public function polymorphic()
    {
        $city = City::find(1);
        echo $city->name;

        $comments = $city->comments;
        foreach ($comments as $comment) {
            echo "{$comment->description}<br />";
        }
    }

    public function polymorphicInsert()
    {
        /* $city = City::find(1);
        echo $city->name;

        $comment = $city->comments()->create([
            'description' => "New Comment {$city->name} ".date('YmdHis'),

        ]); */

        /* $state = State::find(1);
        echo $state->name;

        $comment = $state->comments()->create([
            'description' => "New Comment {$state->name} ".date('YmdHis'),

        ]); */

        $country = Country::find(1);
        echo $country->name;

        $comment = $country->comments()->create([
            'description' => "New Comment {$country->name} ".date('YmdHis'),

        ]);

        var_dump($comment);

    }
}
