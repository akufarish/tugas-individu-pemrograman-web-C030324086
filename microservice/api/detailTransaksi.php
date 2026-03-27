<?php 
header('Content-Type: application/json');
require_once "../model/DetailTransaksiOrm.php";

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    if (isset($_GET["id"])) {
        $id = $_GET['id'];
        $putdata = file_get_contents("php://input");

        $put = (object) json_decode($putdata, true);

        $detailTransaksi = DetailTransaksiOrm::find_one($id);

        $detailTransaksi->pcs = $put->pcs;
        $detailTransaksi->save();

        http_response_code(200);
        echo json_encode([
            "message" => "Data Updated successfully",
            "data" => $detailTransaksi->as_array(),
        ]);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    if (isset($_GET["id"])) {
        $id = $_GET['id'];

        $detailTransaksi = DetailTransaksiOrm::find_one($id);

        $detailTransaksi->delete();

        http_response_code(200);
        echo json_encode([
            "message" => "Data Deleted successfully",
        ]);
    }
}
?>