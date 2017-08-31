<?php

class DB
{
    const DB_HOST = 'localhost';
    const DB_NAME = 'pizza';
    const DB_USER_NAME = 'root';
    const DB_USER_PASSWORD = '';

    private static $db = null;  // Единственный экземпляр класса, чтобы не создавать множество подключений
    private $connection;              // Идентификатор соединения

    private function __construct()
    {
        $this->connection = new mysqli(self::DB_HOST,self::DB_USER_NAME,self::DB_USER_PASSWORD,self::DB_NAME);
        $this->connection->query("SET lc_time_names = 'ru_RU'");
        $this->connection->query("SET NAMES 'utf8'");
    }

    public function __destruct()
    {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    /* Получение экземпляра класса. Если он уже существует, то возвращается, если его не было, то создаётся и возвращается (паттерн Singleton) */
    public static function getDB()
    {
        if (self::$db == null) {
            self::$db = new DB();
        }
        return self::$db;
    }

    /**
     * @return array
     */
    public function getAllData($tableName, $orderBy = null){  // Получаем любую таблицу
        $sql = "SELECT * FROM $tableName";
        if($orderBy){
            $sql .= " ORDER BY ". $orderBy ." DESC";
        }
        $result = $this->connection->query($sql);
        $array = array();
        while($row = $result->fetch_assoc()){
            $array[] = $row;
        }
        return $array;
    }

    /**
     * @return array
     */
    public function getArrayFromTableWhere($tableName,$key,$value){ //получаем массив из любой таблицы по ключу
        $sql = "SELECT * FROM $tableName WHERE $key='$value'";
        $result = $this->connection->query($sql);
        $array = array();
        while($row = $result->fetch_assoc()){
            $array[] = $row;
        }
        return $array;
    }

    /**
     * @return array
     */
    public function getProductsFromTableWhere($array){ //получаем массив из любой таблицы по ключу
        $sql = "SELECT `id`, `prise` FROM pizza WHERE `id` IN(".implode(",",$array).")";
        $result = $this->connection->query($sql);
        $array = array();
        while($row = $result->fetch_assoc()){
            $array[] = $row;
        }
        return $array;
    }

    public function getFieldFromTableWhere($tableName,$key,$value){   // получаем 1 строку любой таблицы по ключу
        $sql = "SELECT * FROM $tableName WHERE $key='$value' LIMIT 1";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }

    public function getItemsByArrayIds($tableName, $array){ // Обновляем значения в любой таблице
        $sql = "SELECT * FROM $tableName WHERE `id` IN(".implode(",",$array).")";
        $result = $this->connection->query($sql);
        $items = array();
        while($row = $result->fetch_assoc()){
            $items[] = $row;
        }
        return $items;
    }

    public function update($tableName, $array, $where){ // Обновляем значения в любой таблице
        $sql = "UPDATE $tableName SET ";
        foreach ($array as $key=>$value) {
            $sql .= "`$key`=\"$value\",";
        }
        $sql = substr($sql, 0, -1);
        $sql .= " WHERE ";
        foreach ($where as $key=>$value) {
            $sql .= "`$key`=\"$value\",";
        }
        $sql = substr($sql, 0, -1);
        return $this->connection->query($sql);
    }

    public function insert($tableName, $array){ // Вставляем значения в любую таблицу
        $sql = "INSERT INTO $tableName (";
        foreach ($array as $key=>$value) {
            $sql .= "`$key`,";
        }
        $sql = substr($sql, 0, -1);
        $sql .= " ) VALUES (";
        foreach ($array as $key=>$value) {
            $value = addcslashes( $value , '\'"()[]' );
            $sql .= "\"$value\",";
        }
        $sql = substr($sql, 0, -1);
        $sql .= " )";
        return $this->connection->query($sql);
    }

    public function insertOrderItems($tableName, $items, $orderId){ // Вставляем значения в любую таблицу
        $sql = "INSERT INTO $tableName (`pizzaId`, `orderId`,`count`) VALUES ";
        foreach ($items as $item) {
            $id = $item["id"];
            $count = $item["count"];
            $sql .= "('$id','$orderId','$count'),";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ";";
        return $this->connection->query($sql);
    }

    public function getMaxId($tableName){ // Вставляем значения в любую таблицу
        $sql = "SELECT MAX(orderId) AS maxId FROM $tableName";
        return $this->connection->query($sql)->fetch_assoc()["maxId"];
    }

    public function delete($tableName, $where){  // удаляем из любой таблицы значения
        $sql = "DELETE FROM $tableName WHERE ";
        foreach ($where as $key=>$value) {
            $sql .= "`$key`=\"$value\",";
        }
        $sql = substr($sql, 0, -1);

        return $this->connection->query($sql);
    }

    public function getOrderById($productId){
        $sql = "SELECT * FROM OrderItem LEFT JOIN pizza ON (OrderItem.pizzaId = pizza.id) LEFT JOIN orderTable ON (OrderItem.orderId = orderTable.orderId) WHERE OrderItem.orderId =
".$productId;
        $items = array();
        $result = $this->connection->query($sql);
        while($row = $result->fetch_assoc()){
            $items[] = $row;
        }
        return $items;
    }
}