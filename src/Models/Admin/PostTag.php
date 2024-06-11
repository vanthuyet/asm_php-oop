<?php

namespace Admin\Xuongoop\Models\Admin;

use Admin\Xuongoop\Commons\Model;

class  PostTag extends Model
{
    protected string $tableName = 'post_tag';

    

    public function selectTagByPostId($id){

        return $this->queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->where('id_post = ?')
        ->setParameter(0, $id)
        ->fetchAllAssociative();

    }


    


    
}