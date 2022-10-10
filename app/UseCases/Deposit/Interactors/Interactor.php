<?php

namespace App\UseCases\Deposit\Interactors;

use App\UseCases\Balance\BusinessEntities\AccountExistanceVerifier;
use App\UseCases\CreateAccount\BusinessEntities\AccountCreator;
use App\UseCases\Deposit\BusinessEntities\BalanceIncreaser;
use App\UseCases\Deposit\Contracts\InputContract;
use App\UseCases\Deposit\Contracts\InteractorContract;

class Interactor
{
    public InteractorContract $interactorContract;

    public function __construct(InputContract $inputContract)
    {
        $accountExistanceVerifier = new AccountExistanceVerifier(
            $inputContract->destination
        );
        
        if ($accountExistanceVerifier->exists === true) {

            $balanceIncreaser = new BalanceIncreaser(
                $inputContract->destination, 
                $inputContract->amount
            );

            $this->setInteractorContract(
                $inputContract->destination,
                $balanceIncreaser->newBalance
            );

        } else {

            new AccountCreator(
                $inputContract->destination, 
                $inputContract->amount
            );

            $this->setInteractorContract(
                $inputContract->destination,
                $inputContract->amount
            );
        }
    }

    private function setInteractorContract(int $accountId, int $balance): void
    {
        $this->interactorContract = new InteractorContract(
            $accountId,
            $balance
        );
    }
}
