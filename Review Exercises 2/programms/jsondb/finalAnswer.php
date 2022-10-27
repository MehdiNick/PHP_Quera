<?php

class JsonDB
{
    private $db_path;

    public function __construct($db_path = __DIR__)
    {
        $this->db_path = $db_path;
    }

    public function insert($table_name, $columns)
    {
        $table_filepath = $this->db_path . '/' . $table_name . '.json';
        if (!file_exists($table_filepath)) {
            throw new Exception("Table $table_name not found");
            return false;
        }
        $table = json_decode(file_get_contents($table_filepath), true);
        $schema = $table['schema'];
        foreach ($columns as $key => $value) {
            if (!isset($schema[$key])) {
                throw new Exception("Column $key not found");
                return false;
            }
        }
        $row = [];
        foreach ($schema as $column_name => $attributes) {
            if ((!isset($columns[$column_name]) && !$attributes['nullable'] && !isset($attributes['default'])) || (isset($columns[$column_name]) && $columns[$column_name] === null && !$attributes['nullable'])) {
                throw new Exception("No value provided for column $column_name");
                return false;
            }
            if (isset($columns[$column_name])) {
                $row[$column_name] = $columns[$column_name];
            }
            else {
                if (isset($attributes['default'])) {
                    $row[$column_name] = $attributes['default'];
                } else {
                    $row[$column_name] = null;
                }
            }
        }
        $table['data'][] = $row;
        file_put_contents($table_filepath, json_encode($table));
    }

    public function select($table_name, $columns = [])
    {
        $table_filepath = $this->db_path . '/' . $table_name . '.json';
        if (!file_exists($table_filepath)) {
            throw new Exception("Table $table_name not found");
            return false;
        }
        $table = json_decode(file_get_contents($table_filepath), true);
        if (empty($columns)) {
            return $table['data'];
        }
        $schema = $table['schema'];
        foreach ($columns as $key => $value) {
            if (!isset($schema[$key])) {
                throw new Exception("Column $key not found");
                return false;
            }
        }
        $rows = [];
        foreach ($table['data'] as $table_row) {
            foreach ($columns as $key => $value) {
                if ($table_row[$key] != $value) {
                    continue 2;
                }
            }
            $rows[] = $table_row;
        }

        return $rows;
    }

    public function update($table_name, $columns = [], $conditions = [])
    {
        if (empty($columns)) {
            return;
        }
        $table_filepath = $this->db_path . '/' . $table_name . '.json';
        if (!file_exists($table_filepath)) {
            throw new Exception("Table $table_name not found");
            return false;
        }
        $table = json_decode(file_get_contents($table_filepath), true);
        if (empty($columns)) {
            return $table['data'];
        }
        $schema = $table['schema'];
        foreach ($columns as $key => $value) {
            if (!isset($schema[$key])) {
                throw new Exception("Column $key not found");
                return false;
            }
        }
        foreach ($conditions as $key => $value) {
            if (!isset($schema[$key])) {
                throw new Exception("Column $key not found");
                return false;
            }
        }
        foreach ($table['data'] as &$table_row) {
            foreach ($conditions as $key => $value) {
                if ($table_row[$key] != $value) {
                    continue 2;
                }
            }
            foreach ($columns as $column_name => $value) {
                $table_row[$column_name] = $value;
            }
        }
        file_put_contents($table_filepath, json_encode($table));
    }

    public function delete($table_name, $conditions = [])
    {
        $table_filepath = $this->db_path . '/' . $table_name . '.json';
        if (!file_exists($table_filepath)) {
            throw new Exception("Table $table_name not found");
            return false;
        }
        $table = json_decode(file_get_contents($table_filepath), true);
        $schema = $table['schema'];
        foreach ($conditions as $key => $value) {
            if (!isset($schema[$key])) {
                throw new Exception("Column $key not found");
                return false;
            }
        }
        $table['data'] = array_values(
            array_filter($table['data'], function ($row) use ($conditions) {
                foreach ($conditions as $key => $value) {
                    if ($row[$key] != $value) {
                        return true;
                    }
                }
                return false;
            })
        );
        file_put_contents($table_filepath, json_encode($table));
    }
}
