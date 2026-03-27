<?php 
header('Content-Type: application/json');
require_once "../model/TransaksiOrm.php";
require_once "../model/ProdukOrm.php";
require_once "../model/PelangganOrm.php";
require_once "../model/DetailTransaksiOrm.php";


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $transaksiDetail = TransaksiOrm::find_one($id);
        $dataDetail = $transaksiDetail->detail_transaksi()->find_many();

        $transaksiDetail = (array) $transaksiDetail->as_array();

        $detailArr = [];
        foreach ($dataDetail as $detail) {
            $produk = $detail->produk()->find_one();
            $detail = $detail->as_array();
            $detail["produk"] = $produk->as_array();
            $detailArr[] = $detail;
        }
            
        $transaksiDetail["detail"] = $detailArr;

        if ($transaksiDetail) {
            echo json_encode([
                "data" => $transaksiDetail,
            ]);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Data tidak ditemukan"]);
        }
    } else {
        $transaksiList = TransaksiOrm::find_many();
        $data = [];

        foreach ($transaksiList as $transaksi) {
            $detailTransaksi = $transaksi->detail_transaksi()->find_many();

            $detailArr = [];
            foreach ($detailTransaksi as $detail) {
                $produk = $detail->produk()->find_one();
                $detail = $detail->as_array();
                $detail["produk"] = $produk->as_array();
                $detailArr[] = $detail;
            }

            $transaksiItem = $transaksi->as_array();
            
            $transaksiItem["detail"] = $detailArr;
            $data[] = $transaksiItem;
        }

        echo json_encode([
            "data" => $data
        ]);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transaksi = TransaksiOrm::create();

    $post = (object) $_POST;

    $json = file_get_contents('php://input');

    $data = json_decode($json, true);
    $data = (object) $data;

    // var_dump($data->id_pelanggan);

    if (isset($data->id_pelanggan)) {

        $pelanggan = PelangganOrm::where("id_pelanggan", $data->id_pelanggan)->find_one();

        if (empty($pelanggan)) {
            http_response_code(400);
            echo json_encode([
                "error" => "Data pelanggan tidak ditemukan",
            ]);
            return;
        } else {
            $transaksi->id_pelanggan = $data->id_pelanggan;
        
            $transaksi->save();

            $transaksi = (object) $transaksi;

            foreach ($data->produk as $produk) {
                $detailTransaksi = DetailTransaksiOrm::create();
                $produk = (object) $produk;
                $detailTransaksi->id_produk = $produk->id_produk;
                $detailTransaksi->id_transaksi = $transaksi->id_transaksi;
                $detailTransaksi->pcs = $produk->pcs;
                $detailTransaksi->save();
            }
            
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

            if (empty($pelanggan)) {
                http_response_code(404);
                echo json_encode([
                    "error" => "Data pelanggan atau produk tidak ditemukan",
                ]);
                return;
            } else { 
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
        $transaksi = TransaksiOrm::find_one($id);

        if ($transaksi) {
            $transaksiDetail = $transaksi->detail_transaksi()->find_many();

            foreach ($transaksiDetail as $detail) {
                $detail->delete();
            }

            $transaksi->delete();

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