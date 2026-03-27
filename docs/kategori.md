# Kategori API Spec

## Create Kategori API

Endpoint : POST /microservice/api/kategori.php

Headers :

```json
{
  "Content-Type": "application/json"
}
```

Request Body:

```json
{
  "nama_kategori": "Sport"
}
```

Response Body Success:

```json
{
  "message": "Data created successfully",
  "data": {
    "nama_kategori": "Sport",
    "id_kategori": "4"
  }
}
```

Response Body Error:

```json
{
  "error": "Form nama kategori tidak boleh kosong"
}
```

## Update kategori API

Endpoint : PUT /microservice/api/kategori.php?id=id_kategori

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
  "nama_kategori": "Game"
}
```

Response Body Success:

```json
{
  "message": "Data Updated successfully",
  "data": {
    "id_kategori": 5,
    "nama_kategori": "Game"
  }
}
```

Response Body Error:

```json
{
  "error": "Data tidak ditemukan"
}
```

## List kategori API

Endpoint : GET /microservice/api/kategori.php

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
      "id_kategori": 1,
      "nama_kategori": "Hobi"
    },
    {
      "id_kategori": 3,
      "nama_kategori": "test"
    },
    {
      "id_kategori": 4,
      "nama_kategori": "Sport"
    },
    {
      "id_kategori": 5,
      "nama_kategori": "Game"
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

## Get kategori API

Endpoint : GET /microservice/api/kategori.php?id=id_kategori

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
    "id_kategori": 5,
    "nama_kategori": "Game"
  }
}
```

Response Body Error:

```json
{
  "error": "Data tidak ditemukan"
}
```

## Remove kategori API

Endpoint : DELETE /microservice/api/kategori.php?id=id_kategori

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
