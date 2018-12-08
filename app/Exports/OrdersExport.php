<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection, WithHeadings
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
            'Data Criação',
            'Usuário',
            'Email Usuário',
            'Nome Instituição',
            'Unidade instituição',
            'Subcategoria',
            'Categoria',
            'Turno',
            'Valor final Bolsa',
            'Nome Aluno',
            'Nome Responsavel',
            'Email Responsável',
            'Telefone Responsável',
            'CPF Responsável',
            'Pagamento concluído',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = DB::table('orders as o');
        $query->join('order_bolsa_aluno as o_b', 'o_b.order_id', 'o.id');
        $query->join('users as u', 'u.id', 'o.user_id');

        // dd($this->request);

        if ($this->request['institution_id']) {
            $query->where('o_b.institution_id', '=', $this->request['institution_id']);
        }

        if ($this->request['institution_id']) {
            $query->where('o_b.institution_id', '=', $this->request['institution_id']);
        }

        if ($this->request['category_id']) {
            $query->where('o_b.category_id', '=', $this->request['category_id']);
        }

        if ($this->request['subcategory_id']) {
            $query->where('o_b.subcategory_id', '=', $this->request['subcategory_id']);
        }

        if ($this->request['shift_id']) {
            $query->where('o_b.shift_id', '=', $this->request['shift_id']);
        }

        if ($this->request['data_inicio'] and $this->request['data_fim']) {
            $query->whereBetween('o.created_at', [$this->request['data_inicio'], $this->request['data_fim']]);
        }

        switch ($this->request['pagamento']) {
            case 1:
                $query->where('o.pagamento_confirmado', '=', 1);
                break;
            case 2:
                $query->where('o.pagamento_confirmado', '=', 0);
                break;
        }

        $query->select(
            'o.id',
            DB::raw("DATE_FORMAT(o.created_at, '%d/%m/%Y') as date"),
            'u.name',
            'u.email',
            'o_b.institution_name',
            'o_b.institution_unidade',
            'o_b.subcategory_name',
            'o_b.category_name',
            'o_b.shift_name',
            'o_b.valor_bolsa',
            'o_b.nome_aluno',
            'o_b.nome_responsavel',
            'o_b.email_responsavel',
            'o_b.telefone_responsavel',
            'o_b.cpf_responsavel',
            'o.pagamento_confirmado'
        );

        return $query->get()->unique();
        ;
    }
}
