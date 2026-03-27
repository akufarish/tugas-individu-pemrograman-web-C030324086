<?php
require_once '../config.php';

class DetailTransaksiOrm extends Model
{
    public static $_table = 'detail_transaksi';
    public static $_id_column = 'id_detail_transaksi';

    function transaksi() {
        return $this->belongs_to("TransaksiOrm", "id_transaksi");
    }

    function produk() {
        return $this->belongs_to("ProdukOrm", "id_produk");
    }
}