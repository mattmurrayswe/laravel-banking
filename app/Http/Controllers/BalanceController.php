<?php

namespace App\Http\Controllers;

use App\UseCases\Balance\Adapters\InputAdapter;
use App\UseCases\Balance\Adapters\OutputAdapter;
use App\UseCases\Balance\Interactors\Interactor;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class BalanceController extends BaseController
{
    public function balance(Request $request): Response
    {
        $inputAdapter = new InputAdapter($request);

        $interactor = new Interactor($inputAdapter->inputContract);

        $outputAdapter = new OutputAdapter($interactor->interactorContract);

        return $outputAdapter->response;
    }
}
