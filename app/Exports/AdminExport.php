<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AdminExport implements FromCollection, WithHeadings, WithMapping
{
    protected $criteria;

    public function __construct($criteria)
    {
        $this->criteria = $criteria;
    }



    public function collection()
    {
        $query = User::query();

        if (!empty($this->criteria['name'])) {
            $query->where('name', 'like', '%' . $this->criteria['name'] . '%');
        }

        if (!empty($this->criteria['email'])) {
            $query->where('email', 'like', '%' . $this->criteria['email'] . '%');
        }

        return $query->select('id', 'name', 'email', 'created_at', 'updated_at')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Created At',
            'Updated At'
        ];
    }

    /**
     * @param \App\Models\User $row
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->id,
            $row->name,
            $row->email,
            $row->created_at->format('Y-m-d H:i:s'),
            $row->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
