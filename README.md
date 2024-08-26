# Dokumentasi WebXplore
### Harap dibaca terlebih dahulu ###
Berikut file untuk databasenya : ***db_webxplore.sql > PostgreSQL***

List API : 
***A. Folder*** 
    -> Get All Directories 
    -> Post Folders
    -> Update Folders
    -> Delete Folders
    -> Get Files By Folder Id

***B. Files*** 
    -> Get Files
    -> Post Files
    -> (Post) Update Files
    -> Delete Files

### Output JSON Format Response ###
*Perlu dicatat bahwa data dibawah ini merupakan isi dari file database diatas*
<pre>
```json
{
    "status": 200,
    "message": "List Folder",
    "data": [
        {
            "id": 2,
            "name": "Anatomi",
            "parent_id": null,
            "created_at": "2024-08-20T16:00:25.000000Z",
            "updated_at": "2024-08-23T10:30:10.000000Z",
            "subfolders": [
                {
                    "id": 3,
                    "name": "Sistem Saraf",
                    "parent_id": 2,
                    "created_at": "2024-08-21T01:41:24.000000Z",
                    "updated_at": "2024-08-25T05:27:08.000000Z",
                    "subfolders": [],
                    "files": [
                        {
                            "id": 2,
                            "name": "Saraf 1",
                            "folder_id": 3,
                            "path": "files/JZ0qk3jPdkK4s0UjtaEcG1e2wBvTvFMt5MJ4lGjW.jpg",
                            "mime_type": "image/jpeg",
                            "size": 164109,
                            "created_at": "2024-08-20T16:14:07.000000Z",
                            "updated_at": "2024-08-23T11:02:06.000000Z"
                        },
                        {
                            "id": 3,
                            "name": "Saraf 2",
                            "folder_id": 3,
                            "path": "files/oNRYqdI9yLV3jQYLym37ikY7Im3Mve4stf7JPfFK.jpg",
                            "mime_type": "image/jpeg",
                            "size": 20841,
                            "created_at": "2024-08-21T01:44:07.000000Z",
                            "updated_at": "2024-08-23T11:02:49.000000Z"
                        }
                    ]
                },
                {
                    "id": 24,
                    "name": "Sistem Pencernaan",
                    "parent_id": 2,
                    "created_at": "2024-08-23T10:26:40.000000Z",
                    "updated_at": "2024-08-23T10:26:40.000000Z",
                    "subfolders": [],
                    "files": []
                }
            ]
        },
        {
            "id": 5,
            "name": "Farmakologi",
            "parent_id": null,
            "created_at": "2024-08-21T02:13:13.000000Z",
            "updated_at": "2024-08-23T10:27:07.000000Z",
            "subfolders": [
                {
                    "id": 23,
                    "name": "Antibiotik",
                    "parent_id": 5,
                    "created_at": "2024-08-22T04:42:08.000000Z",
                    "updated_at": "2024-08-23T10:27:49.000000Z",
                    "subfolders": [],
                    "files": []
                },
                {
                    "id": 25,
                    "name": "Antiviral",
                    "parent_id": 5,
                    "created_at": "2024-08-23T10:28:07.000000Z",
                    "updated_at": "2024-08-23T10:28:07.000000Z",
                    "subfolders": [],
                    "files": []
                },
                {
                    "id": 26,
                    "name": "Obat Anti Malaria",
                    "parent_id": 5,
                    "created_at": "2024-08-23T10:32:00.000000Z",
                    "updated_at": "2024-08-23T10:32:00.000000Z",
                    "subfolders": [],
                    "files": []
                },
                {
                    "id": 9,
                    "name": "Obat Anti Infeksi",
                    "parent_id": 5,
                    "created_at": "2024-08-21T11:03:12.000000Z",
                    "updated_at": "2024-08-23T14:34:23.000000Z",
                    "subfolders": [],
                    "files": []
                }
            ]
        },
        {
            "id": 27,
            "name": "Patologi",
            "parent_id": null,
            "created_at": "2024-08-23T10:32:16.000000Z",
            "updated_at": "2024-08-23T10:32:16.000000Z",
            "subfolders": [
                {
                    "id": 28,
                    "name": "Patologi Umum",
                    "parent_id": 27,
                    "created_at": "2024-08-23T10:32:49.000000Z",
                    "updated_at": "2024-08-23T10:32:49.000000Z",
                    "subfolders": [],
                    "files": []
                },
                {
                    "id": 29,
                    "name": "Patologi Sistemik",
                    "parent_id": 27,
                    "created_at": "2024-08-23T10:33:01.000000Z",
                    "updated_at": "2024-08-23T10:33:01.000000Z",
                    "subfolders": [],
                    "files": []
                }
            ]
        },
        {
            "id": 33,
            "name": "Pediatri",
            "parent_id": null,
            "created_at": "2024-08-23T10:34:02.000000Z",
            "updated_at": "2024-08-23T10:34:02.000000Z",
            "subfolders": [
                {
                    "id": 34,
                    "name": "Neonatologi",
                    "parent_id": 33,
                    "created_at": "2024-08-23T11:00:40.000000Z",
                    "updated_at": "2024-08-23T11:00:40.000000Z",
                    "subfolders": [],
                    "files": []
                },
                {
                    "id": 35,
                    "name": "Pediatri Umum",
                    "parent_id": 33,
                    "created_at": "2024-08-23T11:00:57.000000Z",
                    "updated_at": "2024-08-23T11:00:57.000000Z",
                    "subfolders": [],
                    "files": []
                }
            ]
        },
        {
            "id": 30,
            "name": "Radiologi",
            "parent_id": null,
            "created_at": "2024-08-23T10:33:16.000000Z",
            "updated_at": "2024-08-23T10:33:16.000000Z",
            "subfolders": [
                {
                    "id": 31,
                    "name": "Radiografi Dada",
                    "parent_id": 30,
                    "created_at": "2024-08-23T10:33:34.000000Z",
                    "updated_at": "2024-08-23T10:33:34.000000Z",
                    "subfolders": [],
                    "files": []
                },
                {
                    "id": 32,
                    "name": "CT Scan Kepala",
                    "parent_id": 30,
                    "created_at": "2024-08-23T10:33:49.000000Z",
                    "updated_at": "2024-08-23T10:33:49.000000Z",
                    "subfolders": [],
                    "files": []
                }
            ]
        }
    ]
}
```
</pre>