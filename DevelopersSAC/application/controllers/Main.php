<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('main_model');
    }

    public function index() {
        $this->load->helper('form');

        $email = ($this->input->post('email') ? $this->input->post('email') : '');

        $this->data['email'] = array(
            'name' => 'email',
            'id' => 'email',
            'value' => $email,
            'placeholder' => 'Busque aquí un email'
        );
        $this->data['submit_query'] = array(
            'name' => 'submit_query',
            'id' => 'submit_query',
            'value' => 'Buscar'
        );
        $this->data['employees'] = $this->main_model->get_employees($email);

        //para el form XML
        $this->data['min_salary'] = array(
            'name' => 'min_salary',
            'id' => 'min_salary',
            'value' => ''
        );
        $this->data['max_salary'] = array(
            'name' => 'max_salary',
            'id' => 'max_salary',
            'value' => ''
        );
        $this->data['submit_xml'] = array(
            'name' => 'submit_xml',
            'id' => 'submit_xml',
            'value' => 'Ver XML'
        );
        $this->load->view('main', $this->data);
    }

    public function detalle($id = false) {
        if ($id) {
            $this->data['employee'] = $this->main_model->get_employee_detail($id);
            $this->load->view('detalle', $this->data);
        } else {
            redirect('/main', 'refresh');
        }
    }

    public function xml($min = false, $max = false) {
        if ($min !== false && $max) {
            $this->data['employees'] = $this->main_model->get_employees_by_salary($min, $max);
            $this->load->view('xml', $this->data);
        } else {
            $pmin = ($this->input->post('min_salary') ? $this->input->post('min_salary') : 0);
            $pmax = ($this->input->post('max_salary') ? $this->input->post('max_salary') : $this->main_model->get_max_salary());
            redirect('/main/xml/' . $pmin . '/' . $pmax, 'refresh');
        }
    }

}
