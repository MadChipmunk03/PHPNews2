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

    public function getById($id)
    {
        $sql = 'SELECT ar.*, CONCAT(au.name, \' \', au.surname) as author ,c.name as category FROM tbArticles ar
                INNER JOIN tbAuthors au ON au.id = ar.author_id
                INNER JOIN tbCategories c ON c.id = ar.category_id
                WHERE ar.id = :id';
        $params = ['id' => intval($id)];
        return $this->db->selectOne($sql, $params);
    }

    public function getWithCategory($category)
    {
        $sql = 'SELECT ar.id, ar.title FROM tbArticles ar
                INNER JOIN tbCategories c ON c.id = ar.category_id
                WHERE c.id = :id';
        $params = ['id' => $category['id']];
        return $this->db->select($sql, $params);
    }

    public function getWithAuthor($author)
    {
        $sql = 'SELECT ar.id, ar.title FROM tbArticles ar
                INNER JOIN tbAuthors au ON au.id = ar.author_id
                WHERE au.id = :id';
        $params = ['id' => $author['id']];
        return $this->db->select($sql, $params);
    }

    public function add($postArgs)
    {
        $sql = 'INSERT INTO tbArticles (title, subtitle, author_id, category_id, text) 
                VALUES (:title, :subtitle, :author_id, :category_id, :text)';
        $params = [
            'title' => $postArgs['title'],
            'subtitle' => $postArgs['subtitle'],
            'author_id' => $postArgs['author_id'],
            'category_id' => $postArgs['category_id'],
            'text' => $postArgs['text']
        ];
        $this->db->insert($sql, $params);
    }

    public function update($postArgs)
    {

        $sql = 'UPDATE tbArticles
                set title = :title, subtitle = :subtitle, author_id = :author_id, category_id = :category_id, text = :text
                WHERE id = :id';
        $params = [
            'id' => $postArgs['id'],
            'title' => $postArgs['title'],
            'subtitle' => $postArgs['subtitle'],
            'author_id' => $postArgs['author_id'],
            'category_id' => $postArgs['category_id'],
            'text' => $postArgs['text']
        ];
        $this->db->update($sql, $params);
    }

    public function delete($id) {
        $sql = 'DELETE FROM tbArticles WHERE id = :id';
        $params = ['id' => intval($id)];
        $this->db->delete($sql, $params);
    }
}
