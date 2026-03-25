<?php 
header('Content-Type: application/json');
require_once "../model/KategoriOrm.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $kategoriDetail = KategoriOrm::find_one($id);

        if ($kategoriDetail) {
            echo json_encode([
                "data" => $kategoriDetail->as_array()
            ]);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Data tidak ditemukan"]);
        }
    } else {
        $kategoriList = KategoriOrm::find_many();

        $data = [];
        foreach ($kategoriList as $kategori) {
            $data[] = $kategori->as_array();
        }
        echo json_encode([
            "data" => $data
        ]);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategori = KategoriOrm::create();

    $post = (object) $_POST;

    if (isset($post->nama_kategori)) {
        $kategori->nama_kategori = $post->nama_kategori;
    
        $kategori->save();
        
        http_response_code(201);
        echo json_encode([
            "message" => "Data create successfully",
            "data" => $kategori->as_array()
        ]);
    } else {
        http_response_code(400);
        echo json_encode([
            "error" => "Form nama kategori tidak boleh kosong",
        ]);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    if (isset($_GET["id"])) {
        $id = $_GET['id'];
        $kategoriDetail = KategoriOrm::find_one($id);

        if ($kategoriDetail) {
            $putdata = file_get_contents("php://input");

            $put = (object) json_decode($putdata, true);

            $kategoriDetail->nama_kategori = $put->nama_kategori;
        
            $kategoriDetail->save();

            http_response_code(200);
            echo json_encode([
                "message" => "Data Updated successfully",
                "data" => $kategoriDetail->as_array(),
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
        $kategoriDetail = KategoriOrm::find_one($id);

        if ($kategoriDetail) {
            $kategoriDetail->delete();
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