<?php

namespace App\Exports;

use App\Models\member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;

class MemberExport implements FromCollection, WithMapping
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return member::all();
    }

    public function map($member): array
    {
        return [
            $member->member_id,
            $member->name,
            $member->email,
            $member->phone,
            $member->address,
            $member->position,
            $member->status,
        ];
    }
}
