<?php

namespace Admin\Xuongoop\Models\Admin;

use Admin\Xuongoop\Commons\Helper;
use Admin\Xuongoop\Commons\Model;

class Tags extends Model
{
    protected string $tableName = 'tag';

   
    
    public function paginateTag($page = 1, $perPage = 5)
    {
        $queryBuilder = clone($this->queryBuilder);
        $totalPage = $this->count() / $perPage;
        $offset = $perPage * ($page - 1);

        $data= $this->queryBuilder
        ->select('*')
        ->from($this->tableName)->where('active != 0')
        ->setFirstResult($offset)
        ->setMaxResults($perPage)
        ->orderBy('id','desc')
        ->fetchAllAssociative();

        
        

        return [$data,$totalPage];
    }

    public function deleteTag($id, $active =0 )
    {
        
            $query = $this->queryBuilder->update($this->tableName);

            
                $query->set('active', '?')->setParameter(0, $active);
                $query->where('id = ?')->setParameter(1 ,$id)
                ->executeQuery();

            
        
        
    }

    public function insertPostTag($id,array $tags){
        
        
        if(!empty($tags)){
        foreach($tags as $tag) {
        
        $query = $this->queryBuilder->insert('post_tag');
          $query->setValue('id_post', '?')->setParameter(0, $id);
          $query->setValue('id_tag', '?')->setParameter(1, $tag);
          $query->executeQuery();
          
        }
        return true;
    }

    return false;
    }

    public function deleteTagByPostId($id){
        $queryBuilder = clone ($this->queryBuilder);
        return $queryBuilder
            ->delete('post_tag')
            ->where('id_post = ?')
            ->setParameter(0, $id)
            ->executeQuery();

    }

    


    
}