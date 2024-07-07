<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM pendaftaran WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peserta</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #f0f0f0;
        }

        .container {
            max-width: 600px;
            width: 100%;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .container header {
          height: 70px;
          background: rgb(1, 1, 1);
          border-radius: 8px;
          font-size: 1.5rem;
          color: rgb(255, 255, 255);
          font-weight: 500;
          text-align: center;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-bottom: 20px;
        }

        .form .input-box {
            margin-bottom: 20px;
        }

        .input-box label {
            color: #333;
            font-weight: 500;
            display: block;
            margin-bottom: 5px;
        }

        .form input[type="text"],
        .form input[type="date"],
        .form input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            color: #333;
            transition: border-color 0.3s ease;
        }

        .form input[type="text"]:focus,
        .form input[type="date"]:focus,
        .form input[type="number"]:focus {
            border-color: #a3a3a3;
        }

        .gender-box, .inline-radio {
            margin-bottom: 20px;
        }

        .gender-box h3,
        .inline-radio h3 {
            color: #333;
            font-size: 1rem;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .gender-option, .inline-radio {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .gender-box input, .inline-radio input {
            accent-color: #010101;
            margin-right: 5px;
        }

        .form-button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 8px;
            background: #007bff;
            color: #fff;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .form-button:hover {
            background: #0056b3;
        }

        .form-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.5);
        }
    </style>
    <script>
        function handleSubmit(event) {
            event.preventDefault(); // Mencegah pengalihan form
            const formData = new FormData(event.target);

            fetch('update.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert('Data berhasil diperbarui'); // Menampilkan pesan pop-up
                console.log(data); // Optional: Log the response for debugging
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</head>
<body>
<section class="container">
    <header>Edit Data Peserta</header>
    <form action="update.php" method="post" class="form" onsubmit="handleSubmit(event)">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="input-box">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" required />
        </div>

        <div class="input-box">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" required />
        </div>

        <div class="gender-box">
            <h3>Gender</h3>
            <div class="gender-option">
                <div>
                    <input type="radio" id="check-male" name="gender" value="Laki-Laki" <?php if($row['gender'] == 'Laki-Laki') echo 'checked'; ?> />
                    <label for="check-male">Laki-Laki</label>
                </div>
                <div>
                    <input type="radio" id="check-female" name="gender" value="Perempuan" <?php if($row['gender'] == 'Perempuan') echo 'checked'; ?> />
                    <label for="check-female">Perempuan</label>
                </div>
                <div>
                    <input type="radio" id="check-other" name="gender" value="Jangan Kasih Tahu" <?php if($row['gender'] == 'Jangan Kasih Tahu') echo 'checked'; ?> />
                    <label for="check-other">Jangan Kasih Tahu</label>
                </div>
            </div>
        </div>

        <div class="input-box">
            <label>Kelas</label>
            <input type="text" name="kelas" value="<?php echo $row['kelas']; ?>" required>
        </div>

        <div class="input-box">
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required>
        </div>

        <div class="input-box">
            <label>Nama Orang Tua</label>
            <input type="text" name="nama_orang_tua" value="<?php echo $row['nama_orang_tua']; ?>" required>
        </div>

        <div class="input-box">
            <label>Pekerjaan Orang Tua</label>
            <input type="text" name="pekerjaan_orang_tua" value="<?php echo $row['pekerjaan_orang_tua']; ?>" required>
        </div>

        <div class="input-box">
            <label>No. Telepon Orang Tua</label>
            <input type="number" name="no_telepon_orang_tua" value="<?php echo $row['no_telepon_orang_tua']; ?>" required />
        </div>

        <div class="input-box">
            <label>Program Kursus</label>
            <input type="text" name="program_kursus" value="<?php echo $row['program_kursus']; ?>" required>
        </div>

        <div class="inline-radio">
            <h3>Hari Kursus</h3>
            <div><input type="radio" name="hari_kursus" value="Senin & Kamis" <?php if($row['hari_kursus'] == 'Senin & Kamis') echo 'checked'; ?>><label>Senin & Kamis</label></div>
            <div><input type="radio" name="hari_kursus" value="Selasa & Jumat" <?php if($row['hari_kursus'] == 'Selasa & Jumat') echo 'checked'; ?>><label>Selasa & Jumat</label></div>
            <div><input type="radio" name="hari_kursus" value="Rabu & Sabtu" <?php if($row['hari_kursus'] == 'Rabu & Sabtu') echo 'checked'; ?>><label>Rabu & Sabtu</label></div>
        </div>

        <div class="inline-radio">
            <h3>Waktu Kursus</h3>
            <div><input type="radio" name="waktu_kursus" value="16.00 - 17.30" <?php if($row['waktu_kursus'] == '16.00 - 17.30') echo 'checked'; ?>><label>16.00 - 17.30</label></div>
            <div><input type="radio" name="waktu_kursus" value="19.00 - 20.30" <?php if($row['waktu_kursus'] == '19.00 - 20.30') echo 'checked'; ?>><label>19.00 - 20.30</label></div>
        </div>

        <button type="submit" class="form-button">Simpan</button>
    </form>
    <form action="read.php" method="get" class="form">
        <button type="submit" class="form-button" style="margin-top: 10px;">Lihat Data</button>
    </form>
</section>
</body>
</html>

<?php
    } else {
        echo "Data tidak ditemukan";
    }
    $conn->close();
}
?>