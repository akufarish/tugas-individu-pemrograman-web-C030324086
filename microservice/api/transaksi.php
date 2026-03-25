<?php 
header('Content-Type: application/json');
require_once "../model/TransaksiOrm.php";
require_once "../model/ProdukOrm.php";
require_once "../model/PelangganOrm.php";


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $transaksiDetail = TransaksiOrm::find_one($id);

        if ($transaksiDetail) {
            echo json_encode([
                "data" => $transaksiDetail->as_array()
            ]);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Data tidak ditemukan"]);
        }
    } else {
        $transaksiList = TransaksiOrm::find_many();

        $data = [];
        foreach ($transaksiList as $transaksi) {
            $data[] = $transaksi->as_array();
        }
        echo json_encode([
            "data" => $data
        ]);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transaksi = TransaksiOrm::create();

    $post = (object) $_POST;

    if (isset($post->id_pelanggan) && isset($post->id_produk)) {

        $pelanggan = PelangganOrm::where("id_pelanggan", $post->id_pelanggan)->find_one();
        $produk = ProdukOrm::where("id_produk", $post->id_produk)->find_one();

        if (empty($pelanggan) || empty($produk)) {
            http_response_code(404);
            echo json_encode([
                "error" => "Data pelanggan atau produk tidak ditemukan",
            ]);
            return;
        } else {
            $transaksi->id_pelanggan = $post->id_pelanggan;
            $transaksi->id_produk = $post->id_produk;
        
            $transaksi->save();
            
            http_response_code(201);
            echo json_encode([
                "message" => "Data create successfully",
                "data" => $transaksi->as_array()
            ]);
        }

    } else {
        http_response_code(400);
        echo json_encode([
            "error" => "Form id pelanggan, dan id produk tidak boleh kosong",
        ]);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    if (isset($_GET["id"])) {
        $id = $_GET['id'];
        $transaksiDetail = TransaksiOrm::find_one($id);

        if ($transaksiDetail) {
            $putdata = file_get_contents("php://input");

            $put = (object) json_decode($putdata, true);
            $pelanggan = PelangganOrm::where("id_pelanggan", $put->id_pelanggan)->find_one();
            $produk = ProdukOrm::where("id_produk", $put->id_produk)->find_one();

            if (empty($pelanggan) || empty($produk)) {
                http_response_code(404);
                echo json_encode([
                    "error" => "Data pelanggan atau produk tidak ditemukan",
                ]);
                return;
            } else {
                $transaksiDetail->id_pelanggan = $put->id_pelanggan;
                $transaksiDetail->id_produk = $put->id_produk;        
                $transaksiDetail->status = $put->status;
    
                $transaksiDetail->save();
    
                http_response_code(200);
                echo json_encode([
                    "message" => "Data Updated successfully",
                    "data" => $transaksiDetail->as_array(),
                ]);
            }

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
        $transaksiDetail = TransaksiOrm::find_one($id);

        if ($transaksiDetail) {
            $transaksiDetail->delete();
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