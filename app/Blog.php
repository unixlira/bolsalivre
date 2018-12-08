<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use Sluggable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
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
                'source' => 'title',
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
            $upload = $request->$atributo->storeAs('blog', $nameFile);
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
}
