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
        /*foreach($data["answers"] as $answer){
            foreach($answer as $item){
                //$condition = array("Ogrenci_ID" => $item["Ogrenci_ID"], )
                $element = $this->db
                ->select("Ogrenci_ID, Ogrenci_Ad, Ogrenci_Soyad")
                ->from("ogrenciler")
                ->where("Ogrenci_ID", $item["Ogrenci_ID"])
                ->join("cevaplar","cevaplar.Cevap_ID = '"+$item["Cevap_ID"]+"' ");
            }
        }*/
        //fall($data["answers"]);
        //print_r($this->db->last_query());
        //fall($data["list"]);
        $this->load->view("exam_info", $data);
    }

    function question_info($Soru_ID) {
        $data["secenek"] = $this->db
            ->select("Secenek")
            ->from("soru_secenekler")
            ->where('Soru_ID', $Soru_ID)
            ->get()->result_array();
        
        //fall($data["secenek"]);
        $data["answers"] = [];
        foreach($data["secenek"] as $secenek){
            foreach($secenek as $element){
                $condition = array('Soru_ID' => $Soru_ID, 'Cevap' => $element);
                $answers[$element] = $this->db
                    ->select("*")
                    ->from("soru_cevap")
                    ->where($condition)
                    ->join("ogrenciler","ogrenciler.Ogrenci_ID = soru_cevap.Ogrenci_ID")
                    ->join("cevaplar", "cevaplar.Cevap_ID = soru_cevap.Cozum_ID")
                    ->get()->result_array();

                array_push($data["answers"],$answers[$element]);    
            }
        }
        fall($data["answers"]);
        //$this->load->view("question_info", $data);
    }

}