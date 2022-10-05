<?php

namespace App\UseCases\Balance\Contracts;

class BalanceContract
{
    public int $accountId;

    public function __construct(int $accountId)
    {
        $this->accountId = $accountId;
    }
}
