<?php

class Technology
{
    private $_id,
            $_name,
            $_category;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function id() { return $this->_id; }
    public function name() { return $this->_name; }
    public function category() { return $this->_category; }

    public function setId($id)
    {
        $id = (int) $id;

        if (!$id > 0) {
            trigger_error('"' . $id . '" : The id must be greater than 0', E_USER_WARNING);
            return;
        }

        $this->_id = $id;
    }

    public function setName($name)
    {
        if (!is_string($name)) {
            trigger_error('"' . $name . '" : The name must be a string', E_USER_WARNING);
            return;
        }

        $this->_name = $name;
    }

    public function setCategory($category)
    {
        if (!is_string($category)) {
            trigger_error('"' . $category . '" : The category must be a string', E_USER_WARNING);
            return;
        }

        $this->_category = $category;
    }
}
