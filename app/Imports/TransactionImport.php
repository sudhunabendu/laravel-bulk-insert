<?php

namespace App\Imports;

use App\Models\Transaction;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class TransactionImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $user = User::create([
                'name' => $row['name'],
                'email'    => $row['email'],
                'password' => Hash::make($row['password']),
            ]);

           $transaction = Transaction::create([
                'user_id'=>$row['user_id'],
                'amount'=>$row['amount'],
                'description'=>$row['description'],
           ]);
        }

    }
}
