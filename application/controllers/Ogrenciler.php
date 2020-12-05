<?php


class Ogrenciler extends CI_Controller
{
    function index() {
        $data = $this->db->from("ogrenciler")->get()->result_array();        

        header('Content-Type: application/json');
        echo json_encode( $data );

    }

    function create() {
        $posted = $this->input->post();
        $this->db->insert("ogrenciler", array(
            "Ogrenci_ID" => $posted["Ogrenci_ID"],
            "Ad" => $posted["Ad"],
            "Soyad" => $posted["Soyad"],
            "Sifre" => $posted["Sifre"],
            "Not_Ortalamasi" => $posted["Not_Ortalamasi"],
            "Odev_Ortalamasi" => $posted["Odev_Ortalamasi"],
            "Yoklama" => $posted["Yoklama"]
        ));
    }

    function update() {
        $posted = $this->input->post();
        $this->db
            ->where(array("Ogrenci_ID" => $this->input->post("Ogrenci_ID")))
            ->update("ogrenciler", array(
                "Ad" => $posted["Ad"],
                "Soyad" => $posted["Soyad"],
                "Not_Ortalamasi" => $posted["Not_Ortalamasi"],
                "Odev_Ortalamasi" => $posted["Odev_Ortalamasi"],
                "Yoklama" => $posted["Yoklama"],
            ));
    }

    function delete() {
        $this->db->delete("Ogrenciler", array("Ogrenci_ID" => $this->input->post("Ogrenci_ID")));        
    }


}