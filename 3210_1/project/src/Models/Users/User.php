<?php

namespace src\Models\Users;

use src\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity // класс User наследуется от ActiveRecordEntity
{
    protected $nickname; 
    protected $email;
    protected $isConfirmed;
    protected $role;
    protected $passwordHash;
    protected $authToken;
    protected $createdAt;

    public function setName(string $name): void 
    {
        $this->nickname = $name;  //свойтсву nickname присвоены значения прееменной $name
    }

    public function getNickname(): string // метод должен вернуть строку 
    {
        return $this->nickname; // возвращает текущее значение nickanme 
    }

    public function getName(): string // метод должен вернуть строку 
    {
        return $this->nickname;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }
}