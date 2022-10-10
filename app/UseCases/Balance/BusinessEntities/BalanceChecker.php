<?php

namespace App\UseCases\Balance\BusinessEntities;

class BalanceChecker
{
    public int $balance = 0;

    public function __construct(int $accountId)
    {
        if (file_get_contents("{$accountId}.txt") !== 'NULL') {    

            $this->balance = (int) file_get_contents("{$accountId}.txt");

        }
    }
}
