<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class InstitutionsExport implements FromCollection, WithHeadings
{
    protected $request;
    protected $dateFormat = 'd-m-Y';

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function headings(): array
    {
        return [
            '#ID',
            'Nome',
            'slug',
            'cnpj',
            'Endereço',
            'CEP',
            'Telefone',
            'Descrição',
            'Unidade',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = DB::table('institutions as i');

        $query->select(
            'i.id',
            'i.name',
            'i.slug',
            'i.cnpj',
            'i.address',
            'i.cep',
            'i.phone',
            'i.description',
            'i.unidade'
        );

        return $query->get()->unique();
        ;
    }
}
