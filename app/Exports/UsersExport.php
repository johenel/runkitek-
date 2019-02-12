<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Users;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Users::leftJoin('user_details','users.id','=','user_details.users_id')->leftJoin('transactions','users.id','=','transactions.users_id')->get();
    }
}
