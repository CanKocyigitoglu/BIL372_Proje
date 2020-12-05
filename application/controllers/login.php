<?php


class login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function auth() {
        $posted = $this->input->post();
        $validate = $this->db
            ->select("id, email")
            ->from("login")
            ->where("email", $posted["email"])
            ->where("password", $posted["password"])
            ->get()->result_array();
        if (count($validate) == 1) {
            $result = array(
                "id" => $validate[0]["id"],
                "email" => $validate[0]["email"],
                "logged" => true
            );
            $this->session->set_userdata(array("logged" => true));
        } else {
            $result = array(
                "id" => -1,
                "email" => null,
                "logged" => false
            );
            $this->session->set_userdata(array("logged" => false));
        }
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function logout() {
        $this->session->sess_destroy();
        $result = array("result" => true);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function register() {
        $posted = $this->input->post();
        $insert = array(
            "email" => $posted["email"],
            "password" => $posted["password"]
        );
        if ($this->db->insert('login', $insert)){
            $result = array(
                "result" => true
            );
        } else {
            $result = array(
                "result" => false
            );
        }
        header('Content-Type: application/json');
        echo json_encode( $result );
    }

}