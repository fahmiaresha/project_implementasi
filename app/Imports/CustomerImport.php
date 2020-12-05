<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class CustomerImport implements ToModel,WithHeadingRow
    ,SkipsOnError
    ,WithValidation
    ,SkipsOnFailure
    
{

    use Importable, SkipsErrors,SkipsFailures;    

    public function model(array $row)
    {
        return new Customer([
            'ID_CUSTOMER' => $row['id_customer'],
            'NAMA' => $row['nama'],
            'ALAMAT' => $row['alamat'],
            'ID_KELURAHAN' => $row['kodepos']
        ]);
    }

    public function rules(): array
    {
        return [
            '*.id_customer' => ['unique:Customer,ID_CUSTOMER']
        ];
    }

    // '*.email' => ['email', 'unique:users,email']

    // public function onFailure(Failure ...$failures)
    // {

    // }


  
}
