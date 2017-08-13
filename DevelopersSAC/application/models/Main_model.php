<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->fulldata = json_decode(file_get_contents('json/employees.json'));
    }

    public function get_employees($email) {
        $result = array();
        foreach ($this->fulldata as $employee) {
            if (!strlen($email) || strpos($employee->email, $email) !== false) {
                $result[] = array(
                    'id' => $employee->id,
                    'name' => $employee->name,
                    'email' => $employee->email,
                    'position' => $employee->position,
                    'salary' => $employee->salary
                );
            }
        }
        return $result;
    }

    public function get_employee_detail($id) {
        $item = false;
        foreach ($this->fulldata as $employee) {
            if ($id == $employee->id) {
                $skill = array();
                foreach ($employee->skills as $skills) {
                    $skill[] = $skills->skill;
                }
                $item = array(
                    'id' => $employee->id,
                    'name' => $employee->name,
                    'email' => $employee->email,
                    'phone' => $employee->phone,
                    'address' => $employee->address,
                    'position' => $employee->position,
                    'salary' => $employee->salary,
                    'skills' => $skill
                );
                break;
            }
        }
        if ($item !== false) {
            return $item;
        } else {
            return false;
        }
    }

    public function get_max_salary() {
        $max_salary = 0;
        foreach ($this->fulldata as $employee) {
            $salary = floatval(str_replace(['$', ','], '', $employee->salary));
            if ($salary > $max_salary) {
                $max_salary = $salary;
            }
        }
        return $max_salary;
    }

    public function get_employees_by_salary($min, $max) {
        $result = array();
        foreach ($this->fulldata as $employee) {
            $salary = floatval(str_replace(['$', ','], '', $employee->salary));
            if ($salary >= floatval($min) && $salary <= floatval($max)) {
                $result[] = $employee;
            }
        }
        return $result;
    }

}
