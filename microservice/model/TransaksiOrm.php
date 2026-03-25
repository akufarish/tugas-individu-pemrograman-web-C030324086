<?php
require_once '../config.php';

class TransaksiOrm extends Model
{
    public static $_table = 'transaksi';
    public static $_id_column = 'id_transaksi';
}