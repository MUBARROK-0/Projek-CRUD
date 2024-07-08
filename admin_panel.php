<!-- admin_panel.php -->
<?php
session_start();

// Periksa apakah admin sudah login
if (!isset($_SESSION['admin_id'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit();
}

// Ambil admin dari database atau sesuai kebutuhan
// Di sini Anda dapat menampilkan halaman admin atau fitur yang diinginkan
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css" />
    <script>
      function submitForm(event) {
        event.preventDefault();

        var formData = new FormData(document.getElementById("pendaftaranForm"));

        fetch("process.php", {
          method: "POST",
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.status === "success") {
              alert(data.message);
            } else {
              alert(data.message);
            }
          })
          .catch((error) => {
            alert("Terjadi kesalahan: " + error);
          });
      }
    </script>
</head>
<body>
<section class="container">
      <header>Masukan Data Peserta</header>
      <form id="pendaftaranForm" onsubmit="submitForm(event)" class="form">
        <div class="input-box">
          <label>Nama Lengkap</label>
          <input
            type="text"
            name="nama_lengkap"
            placeholder="Masukan Nama Lengkap"
            required
          />
        </div>

        <div class="input-box">
          <label>Tanggal Lahir</label>
          <input
            type="date"
            name="tanggal_lahir"
            placeholder="Masukan Tanggal Lahir"
            required
          />
        </div>

        <div class="gender-box">
          <label>Gender</label>
          <div class="gender-option">
            <div class="gender">
              <input
                type="radio"
                id="check-male"
                name="gender"
                value="Laki-Laki"
              />
              <label for="check-male">Laki-Laki</label>
            </div>
            <div class="gender">
              <input
                type="radio"
                id="check-female"
                name="gender"
                value="Perempuan"
              />
              <label for="check-female">Perempuan</label>
            </div>
            <div class="gender">
              <input
                type="radio"
                id="check-other"
                name="gender"
                value="Jangan Kasih Tahu"
              />
              <label for="check-other">Jangan Kasih Tahu</label>
            </div>
          </div>
        </div>

        <div class="input-box">
          <label>Kelas</label>
          <input
            type="text"
            name="kelas"
            placeholder="Masukan Kelas"
            required
          />
        </div>

        <div class="input-box">
          <label>Alamat</label>
          <input
            type="text"
            name="alamat"
            placeholder="Masukan Alamat Lengkap"
            required
          />
        </div>

        <div class="input-box">
          <label>Nama Orang Tua</label>
          <input
            type="text"
            name="nama_orang_tua"
            placeholder="Masukan Nama Bapak atau Ibu"
            required
          />
        </div>

        <div class="input-box">
          <label>Pekerjaan Orang Tua</label>
          <input
            type="text"
            name="pekerjaan_orang_tua"
            placeholder="Masukan Pekerjaan Orang Tua"
            required
          />
        </div>

        <div class="input-box">
          <label>No. Telepon Orang Tua</label>
          <input
            type="number"
            name="no_telepon_orang_tua"
            placeholder="Masukan No. Telepon Orang Tua"
            required
          />
        </div>

        <div class="input-box">
          <label>Program Kursus</label>
          <input
            type="text"
            name="program_kursus"
            placeholder="Masukan Program Kursus"
            required
          />
        </div>

        <div class="hari-radio">
          <label>Hari Kursus</label>
          <div class="hari-option">
            <div class="radio">
              <input type="radio" name="hari_kursus" value="Senin & Kamis" />
              <label>Senin & Kamis</label>
            </div>
            <div class="radio">
              <input type="radio" name="hari_kursus" value="Selasa & Jumat" />
              <label>Selasa & Jumat</label>
            </div>
            <div class="radio">
              <input type="radio" name="hari_kursus" value="Rabu & Sabtu" />
              <label>Rabu & Sabtu</label>
            </div>
          </div>
        </div>

        <div class="waktu-radio">
          <label>Waktu Kursus</label>
          <div class="waktu-option">
            <div class="radio">
              <input type="radio" name="waktu_kursus" value="14.00 - 15.30" />
              <label>14.00 - 15.30</label>
            </div>
            <div class="radio">
              <input type="radio" name="waktu_kursus" value="16.00 - 17.30" />
              <label>16.00 - 17.30</label>
            </div>
            <div class="radio">
              <input type="radio" name="waktu_kursus" value="19.00 - 20.30" />
              <label>19.00 - 20.30</label>
            </div>
          </div>
        </div>
        <button type="submit" class="form-button">Simpan</button>
      </form>
      <form action="read.php" method="get" class="form">
        <button type="submit" style="margin-top: 0px" class="form-button">
          Lihat Data
        </button>
      </form>
      <form action="logout.php" method="get" class="form">
        <button type="submit" style="margin-top: 0px" class="form-button">
          logout
        </button>
      </form>
    </section>
</body>
</html>
