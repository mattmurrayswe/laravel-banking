<?php

namespace App\UseCases\Balance\Adapters;

use App\UseCases\Balance\Contracts\InputContract;
use App\UseCases\Balance\Contracts\InteractorContract;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HttpAdapter
{
    public InputContract $inputContract;
    public Response $response;

    public function __construct(Request $request)
    {
        $this->inputContract = new InputContract(
            $request->get('account_id')
        );
    }

    public function setResponse(InteractorContract $interactorContract)
    {
        if ($interactorContract->accountExists === true)
        {
            $this->response = response(
                $interactorContract->balance,
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
