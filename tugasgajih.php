<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Program PHP Sederhana - Data Diri & Gaji</title>
</head>
<body>

<h2>Form Input Data Diri</h2>

<form method="post">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="tgl_lahir" required><br><br>

    <label>Pekerjaan:</label><br>
    <select name="pekerjaan" required>
        <option value="">-- Pilih Pekerjaan --</option>
        <option value="Programmer">Programmer</option>
        <option value="Designer">Designer</option>
        <option value="Manager">Manager</option>
        <option value="Admin">Admin</option>
        <option value="Freelancer">Freelancer</option>
    </select><br><br>

    <input type="submit" value="Kirim">
</form>

<hr>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $pekerjaan = $_POST['pekerjaan'];

    // Menghitung umur
    $tgl_lahir_obj = new DateTime($tgl_lahir);
    $sekarang = new DateTime();
    $umur = $sekarang->diff($tgl_lahir_obj)->y;

    // Menentukan gaji berdasarkan pekerjaan
    switch ($pekerjaan) {
        case "Programmer":
            $gaji = 8000000;
            break;
        case "Designer":
            $gaji = 6000000;
            break;
        case "Manager":
            $gaji = 10000000;
            break;
        case "Admin":
            $gaji = 5000000;
            break;
        case "Freelancer":
            $gaji = 4000000;
            break;
        default:
            $gaji = 0;
    }

    // Menghitung gaji bersih (setelah pajak 10%)
    $pajak = 0.1;
    $gaji_bersih = $gaji - ($gaji * $pajak);

    // Menampilkan hasil
    echo "<h3>Hasil Data:</h3>";
    echo "Nama: <b>$nama</b><br>";
    echo "Tanggal Lahir: <b>" . date("d F Y", strtotime($tgl_lahir)) . "</b><br>";
    echo "Umur: <b>$umur tahun</b><br>";
    echo "Pekerjaan: <b>$pekerjaan</b><br>";
    echo "Gaji Pokok: <b>Rp " . number_format($gaji, 0, ',', '.') . "</b><br>";
    echo "Gaji Bersih (setelah pajak 10%): <b>Rp " . number_format($gaji_bersih, 0, ',', '.') . "</b><br>";
}
?>

</body>
</html>