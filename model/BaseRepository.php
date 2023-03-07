<?php

namespace Model;

abstract class BaseRepository {

    protected $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }
}