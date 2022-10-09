<?php

namespace App\UseCases\Deposit\Adapters;

use App\UseCases\Deposit\Contracts\InputContract;
use App\UseCases\Deposit\Contracts\InteractorContract;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HttpAdapter
{
    public InputContract $inputContract;
    public Response $response;

    public function __construct(Request $request)
    {
        $this->inputContract = new InputContract(
            $request->post('destination'),
            $request->post('amount')
        );
    }

    public function setResponse(InteractorContract $interactorContract): void
    {
        $this->response = response(
            [
                'destination' => [
                    'id' => "{$interactorContract->accountId}",
                    'balance' => $interactorContract->balance
                ]
            ],
            201
        );
    }
}
