<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Database\DatabaseManager;

class TransactionService
{
    public function __construct(public readonly DatabaseManager $db)
    {
    }

    public function findTransaction(int $transactionId): array
    {
        return [
            'transactionId' => $transactionId,
            'amount' => 25,
        ];
    }

    public function create(float $amount, Carbon $date, string $description): bool
    {
        return $this->db->insert(
            'INSERT INTO transactions (amount, transaction_date, description, created_at, updated_at) values (?, ?, ?, NOW(), NOW())', 
            [$amount, $date, $description]
        );
    }

    public function getAll(): array
    {
        return $this->db->select('SELECT id, amount, description, transaction_date FROM transactions ORDER BY transaction_date DESC, created_at DESC');
    }

    public function update(int $transactionId, float $amount, Carbon $date, string $description): int
    {
        return $this->db->update('UPDATE transactions SET amount = :amount, transaction_date = :date, description = :desc 
        WHERE id = :id', 
        [
            'id' => $transactionId,
            'amount' => $amount,
            'date' => $date,
            'desc' => $description,
        ]);
    }

    public function delete(int $transactionId): int
    {
        return $this->db->delete('DELETE FROM transactions WHERE id = ?', [$transactionId]);
    }

}
