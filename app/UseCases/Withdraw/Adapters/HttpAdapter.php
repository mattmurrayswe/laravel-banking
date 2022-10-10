<?php

namespace App\UseCases\Withdraw\Adapters;

use App\UseCases\Withdraw\Contracts\InputContract;
use App\UseCases\Withdraw\Contracts\InteractorContract;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HttpAdapter
{
    public InputContract $inputContract;
    public Response $response;

    public function __construct(Request $request)
    {
        $this->inputContract = new InputContract(
            $request->post('origin'),
            $request->post('amount')
        );
    }

    public function setResponse(InteractorContract $interactorContract): void
    {
        if ($interactorContract->balance === NULL) {

            $this->response = response(
                0,
                404
            );

        }

        if (is_int($interactorContract->balance) === true) {

            $this->response = response(
                [
                    'origin' => [
                        'id' => "{$interactorContract->accountId}",
                        'balance' => $interactorContract->balance
                    ]
                ],
                201
            );

        }
        
    }
}
