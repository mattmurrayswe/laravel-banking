<?php

namespace App\Http\Controllers;

use App\UseCases\DecideEvent\Adapters\Adapter;
use App\UseCases\DecideEvent\Adapters\OutputAdapter;
use App\UseCases\Deposit\Adapters\HttpAdapter as AdapterDeposit;
use App\UseCases\Deposit\Interactors\Interactor as InteractorDeposit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class EventController extends BaseController
{
    public function event(Request $request): Response
    {
        $adapterEvent = new Adapter($request);

        if ($adapterEvent->inputContract->type === 'deposit') {
            
            $adapterDeposit = new AdapterDeposit($request);

            $interactorDeposit = new InteractorDeposit($adapterDeposit->inputContract);

            $adapterDeposit->setResponse($interactorDeposit->interactorContract);

            return $adapterDeposit->response;
        }
        if ($adapterEvent->inputContract->type === 'withdraw') {

        }
        if ($adapterEvent->inputContract->type === 'transfer') {

        }
    }
}
