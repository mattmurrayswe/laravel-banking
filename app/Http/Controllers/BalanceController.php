<?php

namespace App\Http\Controllers;

use App\UseCases\Balance\Adapters\InputAdapter;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class BalanceController extends BaseController
{
    public function balance(Request $request)
    {
        $inputAdapter = new InputAdapter($request);

        return "Hello account_id: {$inputAdapter->inputContract->accountId}";
    }
}
