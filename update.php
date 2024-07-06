<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama_lengkap = $_POST["nama_lengkap"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $gender = $_POST["gender"];
    $kelas = $_POST["kelas"];
    $alamat = $_POST["alamat"];
    $nama_orang_tua = $_POST["nama_orang_tua"];
    $pekerjaan_orang_tua = $_POST["pekerjaan_orang_tua"];
    $no_telepon_orang_tua = $_POST["no_telepon_orang_tua"];
    $program_kursus = $_POST["program_kursus"];
    $hari_kursus = $_POST["hari_kursus"];
    $waktu_kursus = $_POST["waktu_kursus"];

    $sql = "UPDATE pendaftaran SET 
            nama_lengkap='$nama_lengkap', 
            tanggal_lahir='$tanggal_lahir', 
            gender='$gender', 
            kelas='$kelas', 
            alamat='$alamat', 
            nama_orang_tua='$nama_orang_tua', 
            pekerjaan_orang_tua='$pekerjaan_orang_tua', 
            no_telepon_orang_tua='$no_telepon_orang_tua', 
            program_kursus='$program_kursus', 
            hari_kursus='$hari_kursus', 
            waktu_kursus='$waktu_kursus' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diperbarui";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>