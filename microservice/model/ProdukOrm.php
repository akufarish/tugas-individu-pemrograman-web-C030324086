<?php
require_once '../config.php';

class ProdukOrm extends Model
{
    public static $_table = 'produk';
    public static $_id_column = 'id_produk';
}