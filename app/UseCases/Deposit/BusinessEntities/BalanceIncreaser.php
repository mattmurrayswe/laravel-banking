<?php

namespace App\UseCases\Deposit\BusinessEntities;

use App\UseCases\Balance\BusinessEntities\BalanceChecker;

class BalanceIncreaser
{
    public int $newBalance;

    public function __construct(int $accountId, int $amount)
    {
        $balance = $this->fetchBalance($accountId);

        $newBalance = $this->generateNewBalance($balance, $amount);

        $this->persistNewBalance($accountId, $newBalance);

        $this->setNewBalance($newBalance);
    }

    private function fetchBalance(int $accountId): int
    {
        $balanceChecker = new BalanceChecker($accountId);

        return $balanceChecker->balance;
    }

    private function generateNewBalance(int $balance, int $amount): int
    {
        return $balance + $amount;
    }

    private function persistNewBalance(int $accountId, int $newBalance): void
    {
        new BalancePersistor($accountId, $newBalance);
    }

    private function setNewBalance(int $newBalance): void
    {
        $this->newBalance = $newBalance;
    }
}
