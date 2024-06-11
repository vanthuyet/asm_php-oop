<?php

namespace Admin\Xuongoop\Models\Admin;

use Admin\Xuongoop\Commons\Model;

class Posts extends Model
{
    protected string $tableName = 'posts';

    public function deletePostByAuth($id)
    {

        return $this->queryBuilder
            ->delete('posts')
            ->where('auth_id = ?')
            ->setParameter(0, $id)
            ->executeQuery();
    }

    public function count()
    {
        return $this->queryBuilder
            ->select("COUNT(*) as $this->tableName")
            ->from($this->tableName)
            ->fetchOne();
    }

    public function paginatePost($page = 1, $perPage = 5)
    {
        $queryBuilder = clone ($this->queryBuilder);
        $totalPage = $this->count() / $perPage;
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
}
