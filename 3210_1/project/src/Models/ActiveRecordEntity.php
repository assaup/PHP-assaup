<?php
 
     namespace src\Models;
     use src\Models\Articles\Article;
     use src\Services\Db;
     use ReflectionObject;
 
     abstract class ActiveRecordEntity{
         
         protected $id;
         public function getId() {
             return $this->id;
         }
 
         public function __set($name, $value)
         {
             $camelCaseName = $this->underscoreToCamelcase($name);
             $this->$camelCaseName = $value;
         }
     
         private function underscoreToCamelcase(string $name): string
         {
             return lcfirst(str_replace('_','',ucwords($name, '_')));
         }
         
         private function camelCaseToUnderscore(string $source): string
         {
             return strtolower(preg_replace('/([A-Z])/', '_$1', $source));
         }
         //Использует ReflectionObject для получения всех свойств текущего объекта.
         private function mapPropertiesToDb(): array 
         {
             $reflector = new ReflectionObject($this);
             $properties = $reflector->getProperties();
             //Создает массив, где ключи — названия полей в БД, а значения — значения свойств объекта.
             $mappedProperties = [];
             foreach($properties as $property){
                 $propertyName = $property->getName();
                 $propertyDbName = $this->camelCaseToUnderscore($propertyName);
                 $mappedProperties[$propertyDbName]= $this->$propertyName;
             }
             return $mappedProperties;
         }
         //Получает все записи из таблицы
         public static function findAll(): ?array
         {
             $db = Db::getInstance();
             $sql = 'SELECT * FROM `'.static::getTableName().'`';
             return $db->query($sql, [], static::class);
         }
     
         public static function getById(int $id): ?static
         {
             if ($id <= 0) {
                 return null;
             }
             //Выполняет запрос и возвращает первый найденный объект
             $db = Db::getInstance();
             $entities = $db->query(
                 'SELECT * FROM ' . static::getTableName() . ' WHERE id = :id',
                 [':id' => $id],
                 static::class
             );
             return $entities[0] ?? null;
         }

         public function save()
         {
             if ($this->getId()) $this->update();
             else $this->insert();
         }
     
         private function update(){
            $properties = $this->mapPropertiesToDb();
            $column2Params = [];
            $param2Value = [];
            // Строит части SQL-запроса: column = :param
            foreach( $properties as $key=>$value){
                $column = '`'.$key.'`';
                $param = ':'.$key;
                $column2Params[] = $column.'='.$param;
                $param2Value[$param] = $value;
            }
            // Формирует SQL и выполняет обновление в базе данных
            $sql = 'UPDATE `'.static::getTableName().'` SET '.implode(',', $column2Params).' WHERE `id`=:id';
            $db = Db::getInstance();
            $db->query($sql, $param2Value, static::class);
         }
        //  Получает свойства и отфильтровывает пустые значения
         private function insert(){
            $properties = array_filter($this->mapPropertiesToDb());
            $columns = [];
            $params = [];
            $param2Value = [];
             foreach($properties as $key=>$val){
                 $columns[] = '`'.$key.'`';
                 $param = ':'.$key;
                 $params[] = $param;
                 $param2Value[$param] = $val;
             }
            //  Выполняет SQL-запрос на вставку новой записи
            $sql = 'INSERT INTO `'.static::getTableName().'`('.implode(',', $columns).') VALUES ('.implode(',', $params).')';
            $db = Db::getInstance();
            $db->query($sql, $param2Value, static::class);
         }
        //  Удаляет запись из базы по id
         public function delete()
     {
         $sql = 'DELETE FROM `'.static::getTableName().'` WHERE `id`=:id';
         $db = Db::getInstance();
         $db->query($sql, [':id'=>$this->id], static::class);
     }
    //  Абстрактный метод: каждый подкласс должен реализовать и вернуть имя своей таблицы
         abstract protected static function getTableName(): string;
     }