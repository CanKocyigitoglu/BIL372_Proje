<?php


class login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view("login.html");
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
            $this->session->set_userdata(array(
                "id" => $validate[0]["id"],
                "email" => $validate[0]["email"],
                "logged" => true
            ));
            redirect(base_url("home"));
        } else {
            $this->session->set_userdata(array(
                "id" => -1,
                "email" => null,
                "logged" => false
            ));
            redirect(base_url("login"));
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect(base_url("login"));
    }

    function register() {
        $posted = $this->input->post();
        $insert = array(
            "email" => $posted["email"],
            "password" => $posted["password"]
        );
        $this->db->insert('login', $insert);
        redirect(base_url("login"));
    }

    function logged() {
        if ($this->session->userdata("logged")) $result = array("logged" => true);
        else $result = array("logged" => false);
        header('Content-Type: application/json');
        echo json_encode($result);

    }

}