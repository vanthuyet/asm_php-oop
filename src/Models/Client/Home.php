<?php
namespace Admin\Xuongoop\Models\Client;

use Admin\Xuongoop\Commons\Model;

class Home extends Model
{
    protected string $tableName = 'posts';


    public function selectAllTag(){
 
        return $this->queryBuilder
        ->select('*')
        ->from('tag' )
        ->fetchAllAssociative();
        // ->orderBy('tag.id', 'desc')
        
    }


    
}