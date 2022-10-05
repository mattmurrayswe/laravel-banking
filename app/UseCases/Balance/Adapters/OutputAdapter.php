<?php

namespace App\UseCases\Balance\Adapters;

use App\UseCases\Balance\Contracts\InteractorContract;
use Illuminate\Http\Response;

class OutputAdapter
{
    public Response $response;

    public function __construct(InteractorContract $interactorContract)
    {
        if ($interactorContract->accountExists === true)
        {
            $this->response = response(
                20,
                200
            );
        }
        if ($interactorContract->accountExists === false)
        {
            $this->response = response(
                0,
                404
            );
        }
    }
}
