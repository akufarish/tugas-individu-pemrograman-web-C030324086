# Transaksi API Spec

## Create Transaksi API

Endpoint : POST /microservice/api/transaksi.php

Headers :

```json
{
  "Content-Type": "application/json"
}
```

Request Body:

```json
{
  "id_pelanggan": 1,
  "produk": [
    {
      "id_produk": 1,
      "pcs": 2
    },
    {
      "id_produk": 3,
      "pcs": 1
    }
  ]
}
```

Response Body Success:

```json
{
  "message": "Data create successfully",
  "data": {
    "id_pelanggan": 1,
    "id_transaksi": "19"
  }
}
```

Response Body Error:

```json
{
  "error": "Data pelanggan tidak ditemukan"
}
```

## Update Transaksi API

Endpoint : PUT /microservice/api/transaksi.php?id=id_transaksi

Headers :

```json
{
  "Content-Type": "application/json"
}
```

Query Params :

```json
{
  "id": 19
}
```

Request Body:

```json
{
  "id_pelanggan": 1,
  "status": "Sukses"
}
```

Response Body Success:

```json
{
  "message": "Data Updated successfully",
  "data": {
    "id_transaksi": 19,
    "id_pelanggan": 1,
    "status": "Sukses",
    "tanggal_transaksi": "2026-03-27 20:31:05"
  }
}
```

Response Body Error:

```json
{
  "error": "Data tidak ditemukan"
}
```

## List Transaksi API

Endpoint : GET /microservice/api/transaksi.php

Headers :

```json
{
  "Content-Type": "application/json"
}
```

Response Body Success:

```json
{
  "data": [
    {
      "id_transaksi": 18,
      "id_pelanggan": 1,
      "status": "pending",
      "tanggal_transaksi": "2026-03-26 14:51:01",
      "detail": [
        {
          "id_detail_transaksi": 1,
          "id_produk": 1,
          "id_transaksi": 18,
          "pcs": 2,
          "produk": {
            "id_produk": 1,
            "id_kategori": 1,
            "nama_produk": "Kartu Pokemon",
            "deskripsi": "Kartu pokemon terbaru",
            "stok": 12,
            "harga": 20000
          }
        },
        {
          "id_detail_transaksi": 2,
          "id_produk": 3,
          "id_transaksi": 18,
          "pcs": 1,
          "produk": {
            "id_produk": 3,
            "id_kategori": 1,
            "nama_produk": "gundam",
            "deskripsi": "gundam oo",
            "stok": 1,
            "harga": 100000
          }
        }
      ]
    },
    {
      "id_transaksi": 19,
      "id_pelanggan": 1,
      "status": "sukses",
      "tanggal_transaksi": "2026-03-27 20:31:05",
      "detail": [
        {
          "id_detail_transaksi": 3,
          "id_produk": 1,
          "id_transaksi": 19,
          "pcs": 2,
          "produk": {
            "id_produk": 1,
            "id_kategori": 1,
            "nama_produk": "Kartu Pokemon",
            "deskripsi": "Kartu pokemon terbaru",
            "stok": 12,
            "harga": 20000
          }
        },
        {
          "id_detail_transaksi": 4,
          "id_produk": 3,
          "id_transaksi": 19,
          "pcs": 1,
          "produk": {
            "id_produk": 3,
            "id_kategori": 1,
            "nama_produk": "gundam",
            "deskripsi": "gundam oo",
            "stok": 1,
            "harga": 100000
          }
        }
      ]
    }
  ]
}
```

Response Body Error:

```json
{
  "error": "Data tidak ditemukan"
}
```

## Get Transaksi API

Endpoint : GET /microservice/api/transaksi.php?id=id_transaksi

Headers :

```json
{
  "Content-Type": "application/json"
}
```

Query Params :

```json
{
  "id": 18
}
```

Response Body Success:

```json
{
  "data": {
    "id_transaksi": 18,
    "id_pelanggan": 1,
    "status": "pending",
    "tanggal_transaksi": "2026-03-26 14:51:01",
    "detail": [
      {
        "id_detail_transaksi": 1,
        "id_produk": 1,
        "id_transaksi": 18,
        "pcs": 2,
        "produk": {
          "id_produk": 1,
          "id_kategori": 1,
          "nama_produk": "Kartu Pokemon",
          "deskripsi": "Kartu pokemon terbaru",
          "stok": 12,
          "harga": 20000
        }
      },
      {
        "id_detail_transaksi": 2,
        "id_produk": 3,
        "id_transaksi": 18,
        "pcs": 1,
        "produk": {
          "id_produk": 3,
          "id_kategori": 1,
          "nama_produk": "gundam",
          "deskripsi": "gundam oo",
          "stok": 1,
          "harga": 100000
        }
      }
    ]
  }
}
```

Response Body Error:

```json
{
  "error": "Data tidak ditemukan"
}
```

## Remove Transaksi API

Endpoint : DELETE /microservice/api/transaksi.php?id=id_transaksi

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
