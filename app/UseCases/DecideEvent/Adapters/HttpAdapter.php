<?php

namespace App\UseCases\DecideEvent\Adapters;

use App\UseCases\DecideEvent\Contracts\InputContract;
use Illuminate\Http\Request;

class HttpAdapter
{
    public InputContract $inputContract;

    public function __construct(Request $request)
    {
        $this->inputContract = new InputContract(
            $request->post('type')
        );
    }
}
