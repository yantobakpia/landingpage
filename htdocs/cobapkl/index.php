<!DOCTYPE html>
<html>
<head>
    <title>CRUD Peserta Seminar</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>CRUD Peserta Seminar</h1>
    <div id="form-container">
        <form id="crud-form" method="POST" action="process.php">
            <input type="hidden" name="id" id="id">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>
            <label for="nomor_hp">Nomor HP:</label>
            <input type="text" name="nomor_hp" id="nomor_hp" required>
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" id="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <label for="asal">Asal:</label>
            <input type="text" name="asal" id="asal" required>
            <label for="ikut_seminar">Ikut Seminar:</label>
            <input type="checkbox" name="ikut_seminar" id="ikut_seminar">
            <button type="submit" name="submit" id="submit">Simpan</button>
        </form>
    </div>
    <div id="data-container"></div>
    <script src="script.js"></script>
</body>
</html>
