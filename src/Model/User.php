<?php

namespace App\Model;

class User extends Model
{
    public function create(string $email, string $name, bool $isActive = true): int
    {
        $qb = $this->db->prepare('INSERT INTO users (email, full_name, is_active, created_at)
                                        VALUES (?, ?, ?, NOW())'
        );

        $qb->execute([$email, $name, $isActive]);

        return (int) $this->db->lastInsertId();
    }
}