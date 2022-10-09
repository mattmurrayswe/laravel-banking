<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ResetController extends BaseController
{
    public function reset()
    {
        return response('OK', 200);
    }
}
