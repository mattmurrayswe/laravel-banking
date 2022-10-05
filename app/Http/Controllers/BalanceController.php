<?php

namespace App\Http\Controllers;

use App\UseCases\Balance\Adapters\BalanceAdapter;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class BalanceController extends BaseController
{
    public function balance(Request $request)
    {
        $adapter = new BalanceAdapter($request);

        return "Hello account_id: {$adapter->balanceContract->accountId}";
    }
}
