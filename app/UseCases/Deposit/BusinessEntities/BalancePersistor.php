<?php

namespace App\UseCases\Deposit\BusinessEntities;

class BalancePersistor
{
    public function __construct(int $accountId, int $balance)
    {
        file_put_contents("{$accountId}.txt", $balance);
    }
}
