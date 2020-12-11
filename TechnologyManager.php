<?php

class TechnologyManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function getPhrases()
    {
        return $this->_db->query('SELECT s.id AS id, s.phrase AS phrase, t.name AS technology, s.label AS label FROM short_phrase AS s INNER JOIN technology AS t ON s.technology_id = t.id ORDER BY s.id')->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTechnologies()
    {
        return $this->_db->query('SELECT name FROM technology')->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function technologiesInformation()
    {
        return $this->_db->query('SELECT t.id AS id, t.name AS name, c.name AS category, c.description AS category_description FROM technology AS t INNER JOIN category AS c ON t.category_id = c.id')->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getImages()
    {
        return $this->_db->query('SELECT ti.image AS image, ti.name AS title, t.name AS technology FROM tech_image AS ti INNER JOIN technology AS t ON ti.technology_id = t.id ORDER BY rand()')->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}
