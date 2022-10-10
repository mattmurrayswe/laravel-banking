<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ResetController extends BaseController
{
    public function reset()
    {
        file_put_contents('1234.txt', 'NULL');

        file_put_contents('100.txt', 'NULL');

        return response('OK', 200);
    }
}
