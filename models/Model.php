<?php


namespace Models;


class Model
{
    protected $pdo = null;
    protected $table;
    protected $findKey;
    protected $column;

    public function __construct() // __connstruct va être appeler quand on fera un new Model n'importe où dans le code
    {
        try {
            $connection = new \PDO('sqlite:' . DB_PATH);
            //$connection = new \PDO("mysql:host=localhost;dbname=pendu", 'root', 'root');
            $connection->setAttribute(\PDO::ATTR_ERRMODE,
                \PDO::ERRMODE_EXCEPTION);
            $connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }

        $this->pdo = $connection;
    }

    public function find(string $key): \stdClass // rendre la classe partageable vu qu'elle est utilisé dans les 3 models
    {
        $request = 'SELECT * FROM ' . $this->table . ' WHERE ' . $this->findKey . ' = :' . $this->findKey;
        $pdoSt = $this->pdo->prepare($request);
        $pdoSt->execute([':' . $this->findKey => $key]);

        return $pdoSt->fetch();
    }

    public function all(): array
    {
        $request = 'SELECT * FROM ' . $this->table . ' ORDER BY ' . $this->column;
        $pdoSt = $this->pdo->query($request);

        return $pdoSt->fetchAll();

    }

}