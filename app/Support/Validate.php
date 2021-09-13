<?php

namespace App\Support;

use Illuminate\Support\Facades\Auth;

class Validate
{
    private $data = [];
    private $result = [];
    private $model;

    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    public function result($rules, $data)
    {
        $this->data = $data;

        if(count($rules) > 0)
        {
            foreach($rules as $k => $v)
            {
                $validations = explode('|', $v);

                if(!isset($data[$k]) || empty($data[$k]))
                {
                    if(in_array('required', $validations))
                    {
                        $this->required($k);
                    }
                }
                else
                {
                    if(in_array('unique', $validations))
                    {
                        $this->unique($k);
                    }

                    if(in_array('maiorque', $validations))
                    {
                        $this->maiorque($k);
                    }
                }
            }
        }

        return $this->result;
    }

    private function required($key)
    {
        if(isset($this->pt_br()[$key]))
        {
            $this->result[$key] = 'O campo [' . $this->pt_br()[$key] . '] é obrigatório';
        }
    }

    private function unique($key)
    {
        if($this->model)
        {
            $model = $this->model->where($key, $this->data[$key])->first();

            if($model && isset($this->pt_br()[$key]))
            {
                $this->result[$key] = 'O campo [' . $this->pt_br()[$key] . '] deve ser único neste cadastro';
            }
        }
    }

    private function maiorque($key)
    {
        if($this->data[$key] > date('Y') && isset($this->pt_br()[$key]))
        {
            $this->result[$key] = 'O campo [' . $this->pt_br()[$key] . '] deve ser menor que o ano atual';
        }
    }

    private function pt_br()
    {
        return
        [
            'nome' => 'Nome',
            'sexo' => 'Sexo',
            'idade' => 'Idade',
            'hobby' => 'Hobby',
            'datanascimento' => 'Data de Nascimento'
        ];
    }
}
