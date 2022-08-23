<?php

namespace App\Model;

class Invoice extends Model
{
    public function create(float $amount, int $userId): int
    {
        $qb = $this->db->prepare('INSERT INTO invoices (amount, user_id)
                                        VALUES (?, ?)'
        );

        $qb->execute([$amount, $userId]);

        return (int) $this->db->lastInsertId();
    }

    public function find(int $invoiceId): array
    {
        $qb = $this->db->prepare(
            'SELECT invoices.id, amount, full_name
                   FROM invoices
                   LEFT JOIN users ON users.id = user_id
                   WHERE invoices.id = ?'
        );

        $qb->execute([$invoiceId]);

        $invoice = $qb->fetch();

        return $invoice ?: [];
    }
}