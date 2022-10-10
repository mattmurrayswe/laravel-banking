<?php

namespace App\UseCases\Transfer\Interactors;

use App\UseCases\Transfer\Contracts\InputContract;
use App\UseCases\Transfer\Contracts\InteractorContract;

use App\UseCases\Balance\BusinessEntities\AccountExistanceVerifier;
use App\UseCases\Deposit\BusinessEntities\BalanceIncreaser;
use App\UseCases\Withdraw\BusinessEntities\BalanceDecreaser;

class Interactor
{
    public InteractorContract $interactorContract;

    public function __construct(InputContract $inputContract)
    {
        $accountExistanceVerifierOrigin = new AccountExistanceVerifier(
            $inputContract->origin
        );

        $accountExistanceVerifierDestination = new AccountExistanceVerifier(
            $inputContract->origin
        );

        if (
            $accountExistanceVerifierOrigin->exists === true
            &&
            $accountExistanceVerifierDestination->exists === true
        ) {

            $balanceDecreaser = new BalanceDecreaser(
                $inputContract->origin,
                $inputContract->amount
            );

            $balanceIncreaser = new BalanceIncreaser(
                $inputContract->destination,
                $inputContract->amount
            );

            $this->setInteractorContract(
                $inputContract->origin,
                $balanceDecreaser->newBalance,
                $inputContract->destination,
                $balanceIncreaser->newBalance
            );

        } else {

            $this->setInteractorContract(
                $inputContract->origin,
                NULL,
                $inputContract->destination,
                NULL,
            );
            
        }
    }

    /**
     * @param int|NULL $balanceOrigin
     * @param int|NULL $balanceDestination
     */
    private function setInteractorContract(
        int $accountIdOrigin,
        $balanceOrigin,
        int $accountIdDestination,
        $balanceDestination
    ): void {

        $this->interactorContract = new InteractorContract(
            $accountIdOrigin,
            $balanceOrigin,
            $accountIdDestination,
            $balanceDestination
        );

    }
}
