<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Support\Validate;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Exibe lista de desenvolvedores.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developers = Developer::orderBy('nome')->get();

        if($developers->count())
        {
            foreach($developers as $dev)
            {
                $data[] =
                [
                    'id' => $dev->id,
                    'nome' => $dev->nome,
                    'datanascimento' => (!empty($dev->datanascimento) ? date('d/m/Y', strtotime($dev->datanascimento)) : ''),
                    'sexo' => $dev->sexo,
                    'idade' => $dev->idade,
                    'hobby' => $dev->hobby
                ];
            }
        }
        else
        {
            $data = [];
        }

        return response()->json($data, 200);
    }

    /**
     * Armazena um registro de desenvolvedor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->all() as $k => $v)
        {
            $data[$k] = $v;
        }

        $rules =
        [
            'nome' => 'required|unique',
            'sexo' => 'required',
            'idade' => 'required',
            'hobby' => 'required',
            'datanascimento' => 'required'
        ];

        $developer = new Developer();

        $validate = (new Validate())->setModel($developer)->result($rules, $data);

        if($validate)
        {
            return response()->json($validate, 400);
        }

        $developer = $developer->create($data)->save();

        return response()->json($developer, 201);
    }

    /**
     * Exibe formulário para edição
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $developer = Developer::find($id);

        if(!$developer)
        {
            return response()->json($developer, 400);
        }

        return response()->json($developer, 200);
    }

    /**
     * Atualiza um registro de desenvolvedor
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        foreach($request->all() as $k => $v)
        {
            $data[$k] = $v;
        }

        $rules =
        [
            'nome' => 'required',
            'sexo' => 'required',
            'idade' => 'required',
            'hobby' => 'required',
            'datanascimento' => 'required'
        ];

        $developer = new Developer();

        $validate = (new Validate())->setModel($developer)->result($rules, $data);

        if($validate)
        {
            return response()->json($validate, 400);
        }

        $developer = $developer->find($data['id'])->fill($data)->save();

        return response()->json($developer, 200);
    }

    /**
     * Exibe formulário para exclusão
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $developer = Developer::find($id);

        if(!$developer)
        {
            return response()->json($developer, 400);
        }

        return response()->json($developer, 200);
    }

    /**
     * Remove um registro de desenvolvedor.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $developer = Developer::destroy($request->id);

        if(!$developer)
        {
            return response()->json($developer, 400);
        }

        return response()->json($developer, 204);
    }
}
