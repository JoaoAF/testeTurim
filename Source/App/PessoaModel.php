<?php

namespace Source\App;

class PessoaModel extends Model
{
    protected static $entitys = ["pessoa", "filhos"];

    public function gravar($json)
    {
        $user = $this->create(self::$entitys, $json);

        if ($user) {
            return $user;
        } else {
            return false;
        }
    }

    public function ler()
    {
        $pessoas = $this->read("SELECT * FROM " . self::$entitys[0]);
        $filhos = $this->read("SELECT * FROM " . self::$entitys[1]);

        if (!$pessoas) {
            return ["Sua consulta não retornou dados!"];
        } else {
            $data = [];

            foreach ($pessoas as $p) {
                $person = ["id" => $p->id, "nome" => $p->nome, "filhos" => []];

                foreach ($filhos as $f) {
                    if ($p->id == $f->id_pessoa) {
                        array_push($person["filhos"], [
                            "id_pessoa" => $f->id_pessoa,
                            "nome" => $f->nome,
                        ]);
                    }
                }

                array_push($data, $person);
            }
        }

        return $data;
    }
}

?>
