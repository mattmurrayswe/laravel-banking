<?php

namespace App\Http\Controllers;

use App\UseCases\Balance\Adapters\HttpAdapter as Adapter;
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
        $adapter = new Adapter($request);

        $interactor = new Interactor($adapter->inputContract);

        $adapter->setResponse($interactor->interactorContract);

        return $adapter->response;
    }
}
