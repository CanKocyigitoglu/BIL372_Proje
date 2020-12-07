<?php


class home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata("logged")) redirect(base_url("login"));
    }

    function index() {
        $data["exams"] = $this->db
            ->select("*")
            ->from("sinavlar")
            ->get()->result_array();
        $this->load->view("exams", $data);
    }

    function exam_info($exam_id) {
        $data["list"] = $this->db
            ->select("sinavlar.Sinav_ID, sinavlar.Sinav_Adi,  sinav_soru.Soru_ID, sorular.Sorusu")
            ->from("sinav_soru")
            ->where("sinav_soru.Sinav_ID", $exam_id)
            ->join("sinavlar", "sinavlar.Sinav_ID = sinav_soru.Sinav_ID")
            ->join("sorular", "sorular.Soru_ID = sinav_soru.Soru_ID")
            ->get()->result_array();
        $data["exam_name"] = $data["list"][0]["Sinav_Adi"];

        foreach ($data["list"] as $question) {
            $data["secenek"] = $this->db
            ->select("Secenek")
            ->from("soru_secenekler")
            ->where('Soru_ID', $question["Soru_ID"])
            ->get()->result_array();
        };
        $data["answers"] = [];
        foreach ($data["list"] as $question) {
            $condition = array('Sinav_ID' => $question["Sinav_ID"], 'Soru_ID' => $question["Soru_ID"]);
            $answers = $this->db
                ->select("*")
                ->from("soru_cevap")
                ->where($condition)
                ->get()->result_array();

            array_push($data["answers"],$answers);                
        };
        print_r($data["answers"]);
        //print_r($this->db->last_query());
        fall($data["list"]);
        $this->load->view("exam_info", $data);
    }

}