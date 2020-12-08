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
        $secenekler = $this->db
            ->select("Secenek")
            ->from("soru_secenekler")
            ->where('Soru_ID', $Soru_ID)
            ->get()->result_array();

        $data["list"] = [];

        foreach ($secenekler as $secenek) {
            $condition = array('Soru_ID' => $Soru_ID, 'Cevap' => $secenek["Secenek"]);
            $secenek["ogrenciler"] = $this->db
                ->select("*")
                ->from("soru_cevap")
                ->where($condition)
                ->join("ogrenciler","ogrenciler.Ogrenci_ID = soru_cevap.Ogrenci_ID")
                ->join("cevaplar", "cevaplar.Cevap_ID = soru_cevap.Cozum_ID")
                ->get()->result_array();
            array_push($data["list"], $secenek);
        }
        
        //fall($data);
        $this->load->view("choices", $data);
    }

    function questions() {
        $data["questions"] = $this->db
            ->select("*")
            ->from("sorular")
            ->get()->result_array();

        $this->load->view("input", $data);
    }

    function add_question() {
        $posted = $this->input->post();
        $this->db->insert("sorular", array(
            "Konusu"  => $posted["Konusu"],
            "Sorusu"  => $posted["Sorusu"],
            "Sirasi"  => $posted["Sirasi"]
        ));
        $insert_id = $this->db->insert_id();
        $inserts = [];
        if ($posted["secenek_a"] != "") $inserts[] = array("Soru_ID" => $insert_id,"Secenek" => "A", "Icerik" => $posted["secenek_a"]);
        if ($posted["secenek_b"] != "") $inserts[] = array("Soru_ID" => $insert_id,"Secenek" => "B", "Icerik" => $posted["secenek_b"]);
        if ($posted["secenek_c"] != "") $inserts[] = array("Soru_ID" => $insert_id,"Secenek" => "C", "Icerik" => $posted["secenek_c"]);
        if ($posted["secenek_d"] != "") $inserts[] = array("Soru_ID" => $insert_id,"Secenek" => "D", "Icerik" => $posted["secenek_d"]);
        if ($posted["secenek_e"] != "") $inserts[] = array("Soru_ID" => $insert_id,"Secenek" => "E", "Icerik" => $posted["secenek_e"]);
        $this->db->insert_batch("soru_secenekler", $inserts);
        redirect(base_url("home/questions"));
    }

    function edit_question($id) {
        $data["questions"] = $this->db
            ->select("*")
            ->from("sorular")
            ->get()->result_array();
        $data["questionx"] = $this->db
            ->select("*")
            ->from("sorular")
            ->where("Soru_ID", $id)
            ->get()->result_array()[0];
        $data["choices"] = $this->db
            ->select("*")
            ->from("soru_secenekler")
            ->where("Soru_ID", $id)
            ->get()->result_array();
        //fall($data);
        $this->load->view("input_edit", $data);
    }

    function edit_question_edit($id) {
        $posted = $this->input->post();
        //fall($posted);
        $question = array(
            "Konusu"  => $posted["Konusu"],
            "Sorusu"  => $posted["Sorusu"],
            "Sirasi"  => $posted["Sirasi"]
        );

        $this->db->update("sorular", $question, "Soru_ID = ".$id);


        $choices = [];
        if ($posted["secenek_a"] != "") {
            $choices[] = array("Soru_ID" => $id, "Secenek" => "A");
            $this->db->delete("soru_secenekler", $choices[0]);
            //fall($this->db->last_query());
            $this->db->insert("soru_secenekler", array("Soru_ID" => $id,"Secenek" => "A", "Icerik" => $posted["secenek_a"]));
        }
        if ($posted["secenek_b"] != "")  {
            $choices[] = array("Soru_ID" => $id, "Secenek" => "B");
            $this->db->delete("soru_secenekler", $choices[1]);
            $this->db->insert("soru_secenekler", array("Soru_ID" => $id,"Secenek" => "B", "Icerik" => $posted["secenek_b"]));
        }
        if ($posted["secenek_c"] != "") {
            $choices[] = array("Soru_ID" => $id, "Secenek" => "C");
            $this->db->delete("soru_secenekler", $choices[2]);
            $this->db->insert("soru_secenekler", array("Soru_ID" => $id,"Secenek" => "C", "Icerik" => $posted["secenek_c"]));
        }
        if ($posted["secenek_d"] != "") {
            $choices[] = array("Soru_ID" => $id, "Secenek" => "D");
            $this->db->delete("soru_secenekler", $choices[3]);
            $this->db->insert("soru_secenekler", array("Soru_ID" => $id,"Secenek" => "D", "Icerik" => $posted["secenek_d"]));
        }
        if ($posted["secenek_e"] != "") {
            $choices[] = array("Soru_ID" => $id, "Secenek" => "E");
            $this->db->delete("soru_secenekler", $choices[4]);
            $this->db->insert("soru_secenekler", array("Soru_ID" => $id,"Secenek" => "E", "Icerik" => $posted["secenek_e"]));
        }
        redirect(base_url("home/questions"));
    }

    function delete_question($id) {
        $this->db->delete("soru_secenekler", array("Soru_ID" => $id));
        $this->db->delete("sorular", array("Soru_ID" => $id));
        redirect(base_url("home/questions"));
    }

}