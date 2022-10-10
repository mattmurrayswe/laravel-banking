<?php

namespace App\UseCases\Transfer\Adapters;

use App\UseCases\Transfer\Contracts\InputContract;
use App\UseCases\Transfer\Contracts\InteractorContract;
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
            $request->post('amount'),
            $request->post('destination')
        );
    }

    public function setResponse(InteractorContract $interactorContract): void
    {
        if ($interactorContract->balanceDestination === NULL) {

            $this->response = response(
                0,
                404
            );

        }

        if (is_int($interactorContract->balanceDestination) === true) {

            $this->response = response(
                [
                    'origin' => [
                        'id' => "{$interactorContract->accountIdOrigin}",
                        'balance' => $interactorContract->balanceOrigin
                    ],
                    'destination' => [
                        'id' => "{$interactorContract->accountIdDestination}",
                        'balance' => $interactorContract->balanceDestination
                    ]
                ],
                201
            );

        }
        
    }
}
