<?php
namespace Admin\Xuongoop\Models\Client;

use Admin\Xuongoop\Commons\Model;

class Post extends Model
{
    protected string $tableName = 'posts';


    public function selectAllPost(){
 
        return $this->queryBuilder
        ->select('p.id', 'p.name', 'p.overview', 'p.content', 'p.auth_id' , 'p.created_at', 'p.img_thumbnail', 't.name','a.name')
        ->from($this->tableName)
        ->innerJoin('p', 'authors', 'a')
        ->fetchAllAssociative();
        // ->orderBy('tag.id', 'desc')
        
    }

    public function count()
    {
        return $this->queryBuilder
        ->select("COUNT(*) as $this->tableName")
        ->from($this->tableName)
        ->fetchOne();
    }

    public function paginatePostC($page = 1, $perPage = 6)
    {
        $queryBuilder  = $this->conn->createQueryBuilder();
        
        $totalPage = ceil($this->count() / $perPage);
        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select(
                'p.id as id',
                'p.name as name',
                'p.overview as overview',
                'p.content as content',
                'p.auth_id',
                'p.created_at as created_at',
                'p.updated_at as updated_at',
                'p.img_thumbnail as img_thumbnail',
                'a.id author_id',
                'a.name as auth_name'
            )
            ->addSelect("GROUP_CONCAT(t.name SEPARATOR ', ') as tag_names")
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'authors', 'a', 'p.auth_id = a.id')
            ->innerJoin('p', 'post_tag', 'pt', 'p.id = pt.id_post')
            ->innerJoin('pt', 'tag', 't', 'pt.id_tag = t.id')
            ->groupBy('p.id')
            ->orderBy('p.id', 'desc')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->fetchAllAssociative();





            


        return [$data, $totalPage];
    }


    public function getThreeP($page = 1, $perPage = 3)
    {
        $queryBuilder  = $this->conn->createQueryBuilder();
        $totalPage = ceil($this->count() / $perPage);
        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select(
                'p.id as id',
                'p.name as name',
                'p.overview as overview',
                'p.content as content',
                'p.auth_id',
                'p.created_at as created_at',
                'p.updated_at as updated_at',
                'p.img_thumbnail as img_thumbnail',
                'a.id author_id',
                'a.name as auth_name'
            )
            ->addSelect("GROUP_CONCAT(t.name SEPARATOR ', ') as tag_names")
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'authors', 'a', 'p.auth_id = a.id')
            ->innerJoin('p', 'post_tag', 'pt', 'p.id = pt.id_post')
            ->innerJoin('pt', 'tag', 't', 'pt.id_tag = t.id')
            ->groupBy('p.id')
            ->orderBy('p.id', 'desc')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->fetchAllAssociative();

            
        return [$data, $totalPage];
    }

    public function getOneP($page = 1, $perPage = 1)
    {
        $queryBuilder  = $this->conn->createQueryBuilder();
        $totalPage = ceil($this->count() / $perPage);
        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select(
                'p.id as id',
                'p.name as name',
                'p.overview as overview',
                'p.content as content',
                'p.auth_id',
                'p.created_at as created_at',
                'p.updated_at as updated_at',
                'p.img_thumbnail as img_thumbnail',
                'a.id author_id',
                'a.name as auth_name'
            )
            ->addSelect("GROUP_CONCAT(t.name SEPARATOR ', ') as tag_names")
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'authors', 'a', 'p.auth_id = a.id')
            ->innerJoin('p', 'post_tag', 'pt', 'p.id = pt.id_post')
            ->innerJoin('pt', 'tag', 't', 'pt.id_tag = t.id')
            ->groupBy('p.id')
            ->orderBy('p.id', 'desc')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->fetchAssociative();

            
        return [$data, $totalPage];
    }
}


    
