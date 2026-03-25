<?php 
header('Content-Type: application/json');
require_once "../model/ProdukOrm.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $produkDetail = ProdukOrm::find_one($id);

        if ($produkDetail) {
            echo json_encode($produkDetail->as_array());
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Data tidak ditemukan"]);
        }
    } else {
        $produkList = ProdukOrm::find_many();

        $data = [];
        foreach ($produkList as $produk) {
            $data[] = $produk->as_array();
        }
        echo json_encode($data);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produk = ProdukOrm::create();

    $post = (object) $_POST;

    if (isset($post->id_kategori) && isset($post->nama_produk) && isset($post->deskripsi) && isset($post->stok) && isset($post->harga)) {
        $produk->id_kategori = $post->id_kategori;
        $produk->nama_produk = $post->nama_produk;
        $produk->deskripsi = $post->deskripsi;
        $produk->stok = $post->stok;
        $produk->harga = $post->harga;
    
        $produk->save();
        
        http_response_code(201);
        echo json_encode([
            "message" => "Data create successfully",
            "data" => $produk->as_array()
        ]);
    } else {
        http_response_code(400);
        echo json_encode([
            "error" => "Form kategori, nama produk, deksripsi, stok, harga tidak boleh kosong",
        ]);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    if (isset($_GET["id"])) {
        $id = $_GET['id'];
        $produkDetail = ProdukOrm::find_one($id);

        if ($produkDetail) {
            $putdata = file_get_contents("php://input");

            $put = (object) json_decode($putdata, true);

            $produkDetail->id_kategori = $put->id_kategori;
            $produkDetail->nama_produk = $put->nama_produk;
            $produkDetail->deskripsi = $put->deskripsi;
            $produkDetail->stok = $put->stok;
            $produkDetail->harga = $put->harga;
        
            $produkDetail->save();

            http_response_code(200);
            echo json_encode([
                "message" => "Data Updated successfully",
                "data" => $produkDetail->as_array(),
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
        $produkDetail = ProdukOrm::find_one($id);

        if ($produkDetail) {
            $produkDetail->delete();
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