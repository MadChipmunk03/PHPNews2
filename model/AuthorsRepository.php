<?php

namespace Model;

class AuthorsRepository extends BaseRepository {

    public function getAll()
    {
        $sql = 'SELECT au.*, COUNT(ar.author_id) as articleCount FROM tbAuthors au
                LEFT JOIN tbArticles ar ON ar.author_id = au.id
                GROUP BY au.id';
        return $this->db->select($sql);
    }

    public function getById($id)
    {
        $sql = 'SELECT * FROM tbAuthors WHERE id = :id';
        $params = ['id' => intval($id)];
        return $this->db->selectOne($sql, $params);
    }

    public function add($name, $surname)
    {
        $sql = 'INSERT INTO tbAuthors (name, surname) VALUES (:name, :surname)';
        $params = ['name' => $name, 'surname' => $surname];
        $this->db->insert($sql, $params);
    }

    public function update($id, $name, $surname)
    {
        $sql = 'UPDATE tbAuthors set name = :name, surname = :surname
                WHERE id = :id';
        $params = ['id' => $id, 'name' => $name, 'surname' => $surname];
        $this->db->update($sql, $params);
    }

    public function delete($id) {
        $sql = 'DELETE FROM tbAuthors WHERE id = :id';
        $params = ['id' => intval($id)];
        $this->db->delete($sql, $params);
    }

}