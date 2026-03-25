<?php 
header('Content-Type: application/json');
require_once "../model/PelangganOrm.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $pelangganDetail = PelangganOrm::find_one($id);

        if ($pelangganDetail) {
            echo json_encode([
                "data" => $pelangganDetail->as_array()
            ]);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Data tidak ditemukan"]);
        }
    } else {
        $pelangganList = PelangganOrm::find_many();

        $data = [];
        foreach ($pelangganList as $pelanggan) {
            $data[] = $pelanggan->as_array();
        }
        echo json_encode([
            "data" => $data
        ]);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pelanggan = PelangganOrm::create();

    $post = (object) $_POST;

    if (isset($post->nama_pelanggan)) {
        $pelanggan->nama_pelanggan = $post->nama_pelanggan;
    
        $pelanggan->save();
        
        http_response_code(201);
        echo json_encode([
            "message" => "Data create successfully",
            "data" => $pelanggan->as_array()
        ]);
    } else {
        http_response_code(400);
        echo json_encode([
            "error" => "Form nama pelanggan tidak boleh kosong",
        ]);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    if (isset($_GET["id"])) {
        $id = $_GET['id'];
        $pelangganDetail = PelangganOrm::find_one($id);

        if ($pelangganDetail) {
            $putdata = file_get_contents("php://input");

            $put = (object) json_decode($putdata, true);

            $pelangganDetail->nama_pelanggan = $put->nama_pelanggan;
        
            $pelangganDetail->save();

            http_response_code(200);
            echo json_encode([
                "message" => "Data Updated successfully",
                "data" => $pelangganDetail->as_array(),
            ]);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Data tidak ditemukan"]);
        }
    } else {
        http_response_code(404);
        echo json_encode(["error" => "Data tidak ditemukan"]);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    if (isset($_GET["id"])) {
        $id = $_GET['id'];
        $pelangganDetail = PelangganOrm::find_one($id);

        if ($pelangganDetail) {
            $pelangganDetail->delete();
            http_response_code(200);
            echo json_encode([
                "message" => "Data Deleted successfully",
            ]);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Data tidak ditemukan"]);
        }
    } else {
        http_response_code(404);
        echo json_encode(["error" => "Data tidak ditemukan"]);
    }
}