<?php

namespace Model;

class AuthorRepository extends BaseRepository {

    public function getAll()
    {
        $sql = 'SELECT * FROM tbAuthors';
        return $this->db->select($sql);
    }

}