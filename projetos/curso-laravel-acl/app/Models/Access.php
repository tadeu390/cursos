<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Access extends Pivot
{
    protected $table = 'accesses';

    public function a()
    {
        return 1;
    }
}
