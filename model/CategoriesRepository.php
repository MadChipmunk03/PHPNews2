<?php

namespace Model;

class CategoriesRepository extends BaseRepository {

    public function getAll()
    {
        $sql = 'SELECT c.*, COUNT(ar.category_id) as articleCount FROM tbCategories c
                LEFT JOIN tbArticles ar ON ar.category_id = c.id
                GROUP BY c.id';
        return $this->db->select($sql);
    }

    public function getById($id)
    {
        $sql = 'SELECT * FROM tbCategories WHERE id = :id';
        $params = ['id' => intval($id)];
        return $this->db->selectOne($sql, $params);
    }

    public function add($name)
    {
        $sql = 'INSERT INTO tbCategories (name) VALUES (:name)';
        $params = ['name' => $name];
        $this->db->insert($sql, $params);
    }

    public function update($id, $name)
    {
        $sql = 'UPDATE tbCategories set name = :name
                WHERE id = :id';
        $params = ['id' => $id, 'name' => $name];
        $this->db->update($sql, $params);
    }

    public function delete($id) {
        $sql = 'DELETE FROM tbCategories WHERE id = :id';
        $params = ['id' => intval($id)];
        $this->db->delete($sql, $params);
    }
}