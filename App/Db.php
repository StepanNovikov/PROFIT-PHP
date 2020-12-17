<?php
    namespace App;

    class Db 
    {

        protected $dbh;


        public function __construct(){
            $config = (include __DIR__ . '/../config.php')['db'];
            $this->dbh = new \PDO(
                'mysql:host='. $config['host'] . ';dbname='.$config['dbname'],
                $config['user'],
                $config['password']
            );
        }

        public function query($sql, $data = [],$class){
            $sth = $this->dbh->prepare($sql); //получили подготовленный запрос
            $sth->execute($data); //выполнили подготовленный запрос
            $data = $sth->fetchAll(\PDO::FETCH_CLASS, $class); // вернули весь результат

            // $ret = [];
            // foreach($data as $row){
            //     $item = new $class;
            //     foreach($row as $key=>$value){
            //         if(is_numeric($key)){
            //             continue;
            //         }
            //         $item->$key = $value;
            //     }
            //     $ret[] = $item;
            // }

            // return $ret;

            return $data;

        }
    }