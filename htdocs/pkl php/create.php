<!DOCTYPE html>
<html>
<head>
    <title>Data Produk D'Orange Wash</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        body {
        background: url('https://i.imgur.com/w3JVqf9.jpeg') center center fixed;
        background-size: cover;
        color: #fff;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
    }

        form {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>

    <div class="container">
        
    <br>
        <form action="store.php" method="post">
            <input type="text" name="nama" placeholder="Nama"> <br/>
            <input type="text" name="nomor_hp" placeholder="No Hp"> <br/>
            <label for="jenis_kelamin">Jenis Kelamin</label>
             <select class="form-control" name="jenis_kelamin">
             <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
              </select><br/>

            <input type="text" name="asal" placeholder="Alamat"> <br/>
            <input type="text" name="ikut_seminar" placeholder="Track"> <br/>
            <button>Save</button>
        </form>
    </div>
</body>
</html>
