<?php

declare(strict_types=1);

namespace App\Model;

class SignInvoice extends Model
{
    public function __construct(protected User $userModel, protected Invoice $invoiceModel)
    {
        parent::__construct();
    }

    public function register(array $userData, array $invoiceData): int
    {
        try {
            $this->db->beginTransaction();
            $userId = $this->userModel->create($userData['email'], $userData['name']);
            $invoiceId = $this->invoiceModel->create($invoiceData['amount'], $userId);
            $this->db->commit();
        } catch (\Throwable $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }

            throw $e;
        }

        return $invoiceId;
    }
}