<?php

namespace App\UseCases\Balance\Interactors;

use App\UseCases\Balance\BusinessEntities\AccountExistanceVerifier;
use App\UseCases\Balance\BusinessEntities\BalanceChecker;
use App\UseCases\Balance\Contracts\InputContract;
use App\UseCases\Balance\Contracts\InteractorContract;

class Interactor
{
    public InteractorContract $interactorContract;

    public function __construct(InputContract $inputContract)
    {
        $accountExistanceVerifier = new AccountExistanceVerifier(
            $inputContract->accountId
        );

        $this->interactorContract = new InteractorContract(
            $inputContract->accountId,
            $accountExistanceVerifier->exists
        );

        $balanceChecker = new BalanceChecker($inputContract->accountId);
        $this->interactorContract->balance = $balanceChecker->balance;
    }
}
