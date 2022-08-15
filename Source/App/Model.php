<?php

namespace Source\App;
use Source\Database\Connect;
use \PDO;
use \PDOException;

abstract class Model
{
    protected function create(array $entitys, array $data)
    {
        try {
            $stmt = Connect::getInstance();

            $stmt->exec("TRUNCATE pessoa");
            $stmt->exec("TRUNCATE filhos");

            foreach ($data as $person) {
                $stmt->exec(
                    "INSERT INTO $entitys[0] (id, nome) VALUES ({$person["id"]}, '{$person["nome"]}')"
                );

                foreach ($person["filhos"] as $f) {
                    $stmt->exec(
                        "INSERT INTO $entitys[1] (id_pessoa, nome) VALUES ({$f["id_pessoa"]}, '{$f["nome"]}')"
                    );
                }
            }

            return Connect::getInstance()->rowCount();
        } catch (PDOException $exception) {
            return null;
        }
    }

    protected function read($select)
    {
        try {
            $stmt = Connect::getInstance()->prepare($select);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $exception) {
            return null;
        }
    }
}

?>
