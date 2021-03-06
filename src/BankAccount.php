<?php

declare(strict_types=1);

namespace byrokrat\banking;

/**
 * Account number decorator for accounts belonging to a bank
 */
class BankAccount implements AccountNumber
{
    use Formatter\FormattableTrait;

    /**
     * @var string The name of the Bank this number belongs to
     */
    private $bankName;

    /**
     * @var AccountNumber
     */
    private $decorated;

    public function __construct(string $bankName, AccountNumber $decorated)
    {
        $this->bankName = $bankName;
        $this->decorated = $decorated;
    }

    public function getBankName(): string
    {
        return $this->bankName;
    }

    public function getRawNumber(): string
    {
        return $this->decorated->getRawNumber();
    }

    public function getClearingNumber(): string
    {
        return $this->decorated->getClearingNumber();
    }

    public function getClearingCheckDigit(): string
    {
        return $this->decorated->getClearingCheckDigit();
    }

    public function getSerialNumber(): string
    {
        return $this->decorated->getSerialNumber();
    }

    public function getCheckDigit(): string
    {
        return $this->decorated->getCheckDigit();
    }

    public function equals(AccountNumber $account, bool $strict = false): bool
    {
        return $this->decorated->equals($account, $strict) && $this->getBankName() == $account->getBankName();
    }

    protected function getFormattable(): AccountNumber
    {
        return $this;
    }
}
