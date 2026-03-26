# Pelanggan API Spec

## Create Pelanggan API

Endpoint : POST /microservice/api/pelanggan.php

Headers :

```json
{
  "Accept": "application/json"
}
```

Request Body:

```json
{
  "nama_pelanggan": "Joy"
}
```

Response Body Success:

```json
{
  "message": "Data create successfully",
  "data": {
    "nama_pelanggan": "Joy",
    "id_pelanggan": "3"
  }
}
```

Response Body Error:

```json
{
  "error": "Form nama pelanggan tidak boleh kosong"
}
```

## Update Pelanggan API

Endpoint : PUT /microservice/api/pelanggan.php?id=id_pelanggan

Headers :

```json
{
  "Accept": "application/json"
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
  "nama_pelanggan": "Esther"
}
```

Response Body Success:

```json
{
  "message": "Data Updated successfully",
  "data": {
    "id_pelanggan": 17,
    "nama_pelanggan": "Esther"
  }
}
```

Response Body Error:

```json
{
  "error": "Data tidak ditemukan"
}
```

## List Pelanggan API

Endpoint : GET /microservice/api/pelanggan.php

Headers :

```json
{
  "Accept": "application/json"
}
```

Response Body Success:

```json
{
  "data": [
    {
      "id_pelanggan": 1,
      "nama_pelanggan": "Farish Asqalani"
    },
    {
      "id_pelanggan": 3,
      "nama_pelanggan": "Joy"
    },
    {
      "id_pelanggan": 17,
      "nama_pelanggan": "Esther"
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

## Get Pelanggan API

Endpoint : GET /microservice/api/pelanggan.php?id=id_pelanggan

Headers :

```json
{
  "Accept": "application/json"
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
    "id_pelanggan": 1,
    "nama_pelanggan": "Farish Asqalani"
  }
}
```

Response Body Error:

```json
{
  "error": "Data tidak ditemukan"
}
```

## Remove Pelanggan API

Endpoint : DELETE /microservice/api/pelanggan.php?id=id_pelanggan

Headers :

```json
{
  "Accept": "application/json"
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
