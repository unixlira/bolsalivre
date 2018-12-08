<?php

namespace App;

use \DB;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institution extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'institutions';
    protected $guarded = ['id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    public static function imageUpload($request, $atributo)
    {
        // Define o valor default para a variável que contém o nome da imagem
        $nameFile = null;
        //dd($request);

        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile($atributo) && $request->file($atributo)->isValid()) {
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->$atributo->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->$atributo->storeAs('institutions', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if (!$upload) {
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
            }
        }

        return $nameFile;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function shifts()
    {
        return $this->belongsToMany(Shift::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function scholarships()
    {
        return $this->hasMany(Scholarship::class);
    }

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function instituionHasScholarship($shift_id)
    {
        // return DB::table('scholarships')->where('institution_id', $this->id)->first();
        return DB::table('scholarships')->where('institution_id', $this->id)->where('shift_id', $shift_id)->first();
    }

    public static function instituicoesDestaque()
    {
        return DB::table('institutions')
        ->where('destaque_home', 1)
        // ->join('institution_shift', 'institutions.id', '=', 'institution_shift.institution_id')
        // ->join('shifts', 'shifts.id', '=', 'institution_shift.shift_id')
        // ->select('institutions.name as inst_name, ')
        ->whereNull('deleted_at')
        ->limit(6)
        ->get();
    }

    public function bolsaComMaiorDesconto()
    {
        return DB::table('scholarships')
        ->where('institution_id', '=', $this->id)
        ->max('desconto');
    }
}
