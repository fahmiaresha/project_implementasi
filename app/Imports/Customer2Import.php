<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class Customer2Import implements ToModel,WithHeadingRow,SkipsOnError,SkipsOnFailure,WithValidation
{
    use Importable,SkipsErrors,SkipsFailures;

    public function model(array $row)
    {
        return new Customer([
            'id_customer' => $row['id_customer'],
            'NAMA' => $row['nama'],
            'ALAMAT' => $row['alamat'],
            'ID_KELURAHAN' => $row['kodepos']
        ]);
    }

    public function rules(): array
    {
        return [
            '*.id_customer' => ['unique:customer,id_customer']
        ];
    }
}
