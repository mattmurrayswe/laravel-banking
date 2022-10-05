<?php

namespace App\UseCases\Balance\Adapters;

use App\UseCases\Balance\Contracts\BalanceContract;
use Illuminate\Http\Request;

class BalanceAdapter
{
    public BalanceContract $balanceContract;

    public function __construct(Request $request)
    {
        $this->balanceContract = new BalanceContract(
            $request->get('account_id')
        );
    }
}
