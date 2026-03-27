# Produk API Spec

## Create Produk API

Endpoint : POST /microservice/api/produk.php

Headers :

```json
{
  "Content-Type": "application/json"
}
```

Request Body:

```json
{
  "id_kategori": 1,
  "nama_produk": "yoyo",
  "deskripsi": "mainan yoyo",
  "stok": 5,
  "harga": 20000
}
```

Response Body Success:

```json
{
  "message": "Data create successfully",
  "data": {
    "id_kategori": "1",
    "nama_produk": "yoyo",
    "deskripsi": "mainan yoyo",
    "stok": "5",
    "harga": "20000",
    "id_produk": "5"
  }
}
```

Response Body Error:

```json
{
  "error": "Form kategori, nama produk, deksripsi, stok, harga tidak boleh kosong"
}
```

## Update Produk API

Endpoint : PUT /microservice/api/produk.php?id=id_produk

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
  "nama_produk": "PS4",
  "deskripsi": "PS4 Pro",
  "harga": 400000,
  "stok": 12,
  "id_kategori": 5
}
```

Response Body Success:

```json
{
  "message": "Data Updated successfully",
  "data": {
    "id_produk": 5,
    "id_kategori": 5,
    "nama_produk": "PS4",
    "deskripsi": "PS4 Pro",
    "stok": 12,
    "harga": 400000
  }
}
```

Response Body Error:

```json
{
  "error": "Data tidak ditemukan"
}
```

## List Produk API

Endpoint : GET /microservice/api/produk.php

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
      "id_produk": 1,
      "id_kategori": 1,
      "nama_produk": "Kartu Pokemon",
      "deskripsi": "Kartu pokemon terbaru",
      "stok": 12,
      "harga": 20000
    },
    {
      "id_produk": 3,
      "id_kategori": 1,
      "nama_produk": "gundam",
      "deskripsi": "gundam oo",
      "stok": 1,
      "harga": 100000
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

## Get Produk API

Endpoint : GET /microservice/api/produk.php?id=id_produk

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

Response Body Success:

```json
{
  "data": {
    "id_produk": 5,
    "id_kategori": 5,
    "nama_produk": "PS4",
    "deskripsi": "PS4 Pro",
    "stok": 12,
    "harga": 400000
  }
}
```

Response Body Error:

```json
{
  "error": "Data tidak ditemukan"
}
```

## Remove Produk API

Endpoint : DELETE /microservice/api/produk.php?id=id_produk

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
