<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST['nama_lengkap'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $gender = $_POST['gender'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $nama_orang_tua = $_POST['nama_orang_tua'];
    $pekerjaan_orang_tua = $_POST['pekerjaan_orang_tua'];
    $no_telepon_orang_tua = $_POST['no_telepon_orang_tua'];
    $program_kursus = $_POST['program_kursus'];
    $hari_kursus = $_POST['hari_kursus'];
    $waktu_kursus = $_POST['waktu_kursus'];

    $sql = "INSERT INTO pendaftaran (nama_lengkap, tanggal_lahir, gender, kelas, alamat, nama_orang_tua, pekerjaan_orang_tua, no_telepon_orang_tua, program_kursus, hari_kursus, waktu_kursus)
    VALUES ('$nama_lengkap', '$tanggal_lahir', '$gender', '$kelas', '$alamat', '$nama_orang_tua', '$pekerjaan_orang_tua', '$no_telepon_orang_tua', '$program_kursus', '$hari_kursus', '$waktu_kursus')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Data berhasil disimpan!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error]);
    }

    $conn->close();
}
?>