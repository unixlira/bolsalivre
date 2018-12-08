<?php

namespace App\Http\Controllers\Backend;

use Storage;
use Illuminate\Http\Request;
use App\Tag;
use App\Shift;
use App\Category;
use App\Subcategory;
use App\Institution;
use App\Scholarship;
use App\TypeOfTraining;
use App\Http\Controllers\Controller;

class ScholarshipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $shift_id)
    {
        $this->authorize('admin');

        $institution = Institution::findOrFail($id);
        $type_of_trainings = TypeOfTraining::all();

        $products = $institution->products;
        $subcategories = [];
        foreach ($products as $product) {
            foreach ($product->categories as $category) {
                foreach ($category->subcategories as $subcategory) {
                    array_push($subcategories, $subcategory);
                }
            }
        }

        $shift = Shift::findOrFail($shift_id);
        $tags = Tag::all();

        return view('backend.scholarship.create', compact('institution', 'products', 'subcategories', 'shift', 'tags', 'type_of_trainings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin');

        $quantidadeInput = count($request->input('institution_id'));
        //dd($request->input('fora_estoque'));

        for ($i = 0; $i < $quantidadeInput; $i++) {
            $mensalidade = ($request->input('mensalidade')[$i]) ? ($request->input('mensalidade')[$i]) : null;
            $desconto = ($request->input('desconto')[$i]) ? ($request->input('desconto')[$i]) : null;
            $duracao = ($request->input('duracao')[$i]) ? ($request->input('duracao')[$i]) : null;
            if ($mensalidade and $desconto) {
                $valor_final = round(($mensalidade - ($mensalidade / 100) * $desconto), 2);
                dd($valor_final);
            } else {
                $valor_final = null;
            }

            $item = [
                'institution_id' => ($request->input('institution_id')[$i]),
                'subcategory_id' => ($request->input('subcategory_id')[$i]),
                'shift_id' => ($request->input('shift_id')[$i]),
                'mensalidade' => $mensalidade,
                'desconto' => $desconto,
                'duracao' => $duracao,
                'vagas_estoque' => ($request->input('vagas_estoque')[$i]) ? ($request->input('vagas_estoque')[$i]) : null,
                'vagas_site' => ($request->input('vagas_site')[$i]) ? ($request->input('vagas_site')[$i]) : null,
                'parcelas' => ($request->input('parcelas')[$i]) ? ($request->input('parcelas')[$i]) : null,
                'horario_curso' => ($request->input('horario_curso')[$i]) ? ($request->input('horario_curso')[$i]) : null,
                'duracao' => ($request->input('duracao')[$i]) ? ($request->input('duracao')[$i]) : null,
                'previsao_inicio' => ($request->input('previsao_inicio')[$i]) ? ($request->input('previsao_inicio')[$i]) : null,
                'tipo_graduacao' => ($request->input('tipo_graduacao')[$i]) ? ($request->input('tipo_graduacao')[$i]) : null,
                // 'inscricao' => ($request->input('inscricao')[$i]),
                'evolucao_preco' => ($request->input('evolucao_preco')[$i]),
                'fora_estoque' => ($request->input('fora_estoque')[$i]),
                'valor_final' => $valor_final,
                'dias' => ($request->input('dia_' . $i)) ? (json_encode($request->input('dia_' . $i))) : null,
            ];
            $scholarship = Scholarship::create($item);
            if (isset($request->input('tag')[$i])) {
                $scholarship->tags()->attach($request->input('tag')[$i]);
            }
        }

        return redirect()
            ->action('Backend\InstitutionController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function show(Scholarship $scholarship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $shift_id)
    {
        $this->authorize('admin');

        $institution = Institution::findOrFail($id);
        $type_of_trainings = TypeOfTraining::all();
        $scholarships = Scholarship::where('institution_id', $id)->get();

        $products = $institution->products;
        $subcategories = [];
        foreach ($products as $product) {
            foreach ($product->categories as $category) {
                foreach ($category->subcategories as $subcategory) {
                    array_push($subcategories, $subcategory);
                }
            }
        }

        $shift = Shift::findOrFail($shift_id);
        $tags = Tag::all();

        $tags_scholarships = collect();
        foreach ($scholarships as $scholarship) {
            $tags_scholarships->push($scholarship->tags->all());
        }

        //$subcategories = Subcategory::all();
        // $shifts = Shift::all();
        return view('backend.scholarship.edit', compact('institution', 'products', 'subcategories', 'shift', 'tags', 'scholarships', 'tags_scholarships', 'type_of_trainings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->authorize('admin');

        $quantidadeInput = count($request->input('institution_id'));

        for ($i = 0; $i < $quantidadeInput; $i++) {
            $id = $request->input('id')[$i];

            $mensalidade = ($request->input('mensalidade')[$i]) ? ($request->input('mensalidade')[$i]) : null;
            $desconto = ($request->input('desconto')[$i]) ? ($request->input('desconto')[$i]) : null;
            if ($mensalidade and $desconto) {
                $valor_final = round(($mensalidade - ($mensalidade / 100) * $desconto), 2);
            } else {
                $valor_final = null;
            }

            $categoria = Subcategory::categoriaDaSubcategoria($request->input('subcategory_id')[$i]);
            $produto = Category::produtoDeUmaCategoria($categoria->id);

            $item = [
                'institution_id' => $request->input('institution_id')[$i],
                'subcategory_id' => $request->input('subcategory_id')[$i],
                'shift_id' => $request->input('shift_id')[$i],
                'mensalidade' => ($request->input('mensalidade')[$i]) ? ($request->input('mensalidade')[$i]) : null,
                'desconto' => ($request->input('desconto')[$i]) ? ($request->input('desconto')[$i]) : null,
                'duracao' => ($request->input('duracao')[$i]) ? ($request->input('duracao')[$i]) : null,
                'vagas_estoque' => ($request->input('vagas_estoque')[$i]) ? ($request->input('vagas_estoque')[$i]) : null,
                'vagas_site' => ($request->input('vagas_site')[$i]) ? ($request->input('vagas_site')[$i]) : null,
                'parcelas' => ($request->input('parcelas')[$i]) ? ($request->input('parcelas')[$i]) : null,
                'horario_curso' => ($request->input('horario_curso')[$i]) ? ($request->input('horario_curso')[$i]) : null,
                'duracao' => ($request->input('duracao')[$i]) ? ($request->input('duracao')[$i]) : null,
                'previsao_inicio' => ($request->input('previsao_inicio')[$i]) ? ($request->input('previsao_inicio')[$i]) : null,
                'tipo_graduacao' => ($request->input('tipo_graduacao')[$i]) ? ($request->input('tipo_graduacao')[$i]) : null,
                'type_of_training_id' => $request->input('type_of_training_id')[$i],
                // 'inscricao' => $request->input('inscricao')[$i],
                'evolucao_preco' => $request->input('evolucao_preco')[$i],
                'fora_estoque' => $request->input('fora_estoque')[$i],
                'valor_final' => $valor_final,
                'product_id' => $produto->id,
                'dias' => ($request->input('dia_' . $i)) ? (json_encode($request->input('dia_' . $i))) : null,
            ];

            if ($id != 0) {
                $scholarship = Scholarship::find($id);
                $scholarship->update($item);
                if (isset($request->input('tag')[$i])) {
                    $scholarship->tags()->sync($request->input('tag')[$i]);
                }
            } else {
                $scholarship = Scholarship::create($item);
                if (isset($request->input('tag')[$i])) {
                    $scholarship->tags()->attach($request->input('tag')[$i]);
                }
            }

            // dd($request->input('tag')[$i]);
        }
        return redirect()->action(
            'Backend\ScholarshipController@edit',
            ['id' => $request->input('institution_id')[0], $request->input('shift_id')[0]]
        )->with('message', 'Edição realizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scholarship $scholarship)
    {
        //
    }
}
