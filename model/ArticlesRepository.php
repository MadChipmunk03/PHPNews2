<?php

namespace Model;

class ArticlesRepository extends BaseRepository {

    public function getAll()
    {
        $sql = 'SELECT ar.*, CONCAT(au.name, \' \', au.surname) as author ,c.name as category FROM tbArticles ar
                INNER JOIN tbAuthors au ON au.id = ar.author_id
                INNER JOIN tbCategories c ON c.id = ar.category_id';
        return $this->db->select($sql);
    }

}
