<?php
	
namespace App\Libraries\Vlidation;

class CustomRule 
{
	public function CustomRules(string $str, string $field, array $data)
    {
        $array  = explode('.',$field);
        $column = $array[1];
        $table  = $array[0];
        $db     = \Config\Database::connect();
        $row    = $db->table($table)->select('1')->where($column, $str)->limit(1)->get()->getRow();
        if (!$row) 
        {
            return false;
        }
        else
        {
        	return true;
        }
    }
}