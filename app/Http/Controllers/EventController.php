<?php

namespace App\Http\Controllers;

use App\UseCases\DecideEvent\Adapters\HttpAdapter as AdapterEvent;
use App\UseCases\Deposit\Adapters\HttpAdapter as AdapterDeposit;
use App\UseCases\Deposit\Interactors\Interactor as InteractorDeposit;
use App\UseCases\Withdraw\Adapters\HttpAdapter as AdapterWithdraw;
use App\UseCases\Withdraw\Interactors\Interactor as InteractorWithdraw;
use App\UseCases\Transfer\Adapters\HttpAdapter as AdapterTransfer;
use App\UseCases\Transfer\Interactors\Interactor as InteractorTransfer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class EventController extends BaseController
{
    public function event(Request $request): Response
    {
        $adapterEvent = new AdapterEvent($request);

        if ($adapterEvent->inputContract->type === 'deposit') {

            return $this->deposit($request);

        }
        if ($adapterEvent->inputContract->type === 'withdraw') {

            return $this->withdraw($request);
            
        }
        if ($adapterEvent->inputContract->type === 'transfer') {

            return $this->transfer($request);

        }
    }

    public function deposit(Request $request): Response
    {
        $adapterDeposit = new AdapterDeposit($request);

        $interactorDeposit = new InteractorDeposit(
            $adapterDeposit->inputContract
        );

        $adapterDeposit->setResponse(
            $interactorDeposit->interactorContract
        );

        return $adapterDeposit->response;
    }

    public function withdraw(Request $request): Response
    {
        $adapterWithdraw = new AdapterWithdraw($request);

        $interactorWithdraw = new InteractorWithdraw(
            $adapterWithdraw->inputContract
        );

        $adapterWithdraw->setResponse(
            $interactorWithdraw->interactorContract
        );

        return $adapterWithdraw->response;
    }

    public function transfer(Request $request): Response
    {
        $adapterTransfer = new AdapterTransfer($request);

        $interactorTransfer = new InteractorTransfer(
            $adapterTransfer->inputContract
        );

        $adapterTransfer->setResponse(
            $interactorTransfer->interactorContract
        );

        return $adapterTransfer->response;
    }
}
