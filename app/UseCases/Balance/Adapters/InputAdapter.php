<?php

namespace App\UseCases\Balance\Adapters;

use App\UseCases\Balance\Contracts\InputContract;
use Illuminate\Http\Request;

class InputAdapter
{
    public InputContract $inputContract;

    public function __construct(Request $request)
    {
        $this->inputContract = new InputContract(
            $request->get('account_id')
        );
    }
}
