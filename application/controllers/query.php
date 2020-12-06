<?php


class query extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata("logged")) die();
    }

    function read($tablename) {
        $result = $this->db
            ->select("*")
            ->from($tablename)
            ->get()->result_array();
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function update($table, $id) {
        $posted = $this->input->post();
        if ($this->db->where("id", $id)->update($table, $posted)) $result = array("result" => true);
        else $result = array("result" => false);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function delete($table) {
        if ($this->db->delete($table, array("id" => $this->input->post("id")))) $result = array("result" => true);
        else $result = array("result" => false);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function create($table) {
        if ($this->db->insert($table, $this->input->post())) $result = array("result" => true);
        else $result = array("result" => false);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

}