<?php

namespace App\UseCases\Balance\BusinessEntities;

class BalanceChecker
{
    public int $balance = 0;

    public function __construct(int $accountId)
    {
        if ($accountId === 100)
        {
            $this->balance = 10;
        }
    }
}
