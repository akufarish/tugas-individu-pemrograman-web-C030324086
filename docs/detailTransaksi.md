# Detail Transaksi API Spec

## Update Detail Transaksi API

Endpoint : PUT /microservice/api/detailTransaksi.php?id=id_detail

Headers :

```json
{
  "Content-Type": "application/json"
}
```

Query Params :

```json
{
  "id": 1
}
```

Request Body:

```json
{
  "pcs": 3
}
```

Response Body Success:

```json
{
  "message": "Data Updated successfully",
  "data": {
    "id_detail_transaksi": 1,
    "id_produk": 1,
    "id_transaksi": 18,
    "pcs": 3
  }
}
```

Response Body Error:

```json
{
  "error": "Data tidak ditemukan"
}
```

## Remove Detail Transaksi API

Endpoint : DELETE /microservice/api/detailTransaksi.php?id=id_detail

Headers :

```json
{
  "Content-Type": "application/json"
}
```

Response Body Success:

```json
{
  "message": "Data Deleted successfully"
}
```

Response Body Error:

```json
{
  "error": "Data tidak ditemukan"
}
```
