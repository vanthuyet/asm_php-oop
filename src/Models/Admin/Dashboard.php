<?php

namespace Admin\Xuongoop\Models\Admin;

use Admin\Xuongoop\Commons\Model;

class Dashboard extends Model
{
    protected string $tableName = 'posts';

    
    public function countUser()
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        return $queryBuilder
        ->select("COUNT(*) as $this->tableName")
        ->from('users')
        ->fetchOne();
    }
    
    public function countTag()
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        return $queryBuilder
        ->select("COUNT(*) as $this->tableName")
        ->from('tag')
        ->fetchOne();   
    }


    public function countAuthor()
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        return $queryBuilder
        ->select("COUNT(*) as $this->tableName")
        ->from('authors')
        ->fetchOne();   
    }


    
}