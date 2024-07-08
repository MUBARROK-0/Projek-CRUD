<?php
include 'config.php';

$sql = "SELECT * FROM pendaftaran";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f9fc;
            color: #333;
            margin: 0;
            padding: 0;
        }

        table {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 5px rgb(1, 1, 1);
        }

        th, td {
            padding: 3px 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #010101;
            color: #fff;
            text-transform: uppercase;
            font-size: 0.9rem;
            font-weight: 500;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .action-btn {
            padding: 1px 1px;
            margin: 4px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            text-align: center;
            font-size: 0.9rem;
            width: 90px; 
            height: 80%;
            line-height: 35px;
            transition: background-color 0.3s;
        }

        .action-btn.delete {
            background-color: #dc3545;
        }

        .action-btn.edit {
            background-color: #007bff;
        }

        .action-btn:hover {
            background-color: #0056b3;
        }

        .action-btn.delete:hover {
            background-color: #c82333;
        }

        .back-btn {
            display: block;
            width: 110px;
            margin: 20px auto;
            padding: 8px;
            background-color: #28a745;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .back-btn:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            table, th, td {
                font-size: 14px;
            }

            .action-btn {
                width: 100px; 
                padding: 5px 10px;
            }

            .back-btn {
                width: 100px; 
                padding: 8px 10px;
            }
        }
    </style>
</head>
<body>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='0'>";
        echo "<thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Tanggal Lahir</th>
                    <th>Gender</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Nama Orang Tua</th>
                    <th>Pekerjaan Orang Tua</th>
                    <th>No. Telepon Orang Tua</th>
                    <th>Program Kursus</th>
                    <th>Hari Kursus</th>
                    <th>Waktu Kursus</th>
                    <th>Aksi</th>
                </tr>
            </thead>";

        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];

            echo "<tr>
                    <td>" . $row["nama_lengkap"] . "</td>
                    <td>" . date('d-M-Y', strtotime($row["tanggal_lahir"])) . "</td>
                    <td>" . $row["gender"] . "</td>
                    <td>" . $row["kelas"] . "</td>
                    <td>" . $row["alamat"] . "</td>
                    <td>" . $row["nama_orang_tua"] . "</td>
                    <td>" . $row["pekerjaan_orang_tua"] . "</td>
                    <td>" . $row["no_telepon_orang_tua"] . "</td>
                    <td>" . $row["program_kursus"] . "</td>
                    <td>" . $row["hari_kursus"] . "</td>
                    <td>" . $row["waktu_kursus"] . "</td>
                    <td>
                        <a href='edit.php?id=$id' class='action-btn edit'>Edit</a>
                        <button class='action-btn delete' data-id='$id'>Delete</button>
                    </td>
                  </tr>";
        }
        echo "</table>";
        echo "<a href='admin_panel.php' class='back-btn'>Kembali</a>";
    } else {
        echo "0 results";
        echo "<a href='admin_panel.php' class='back-btn'>Kembali</a>";
    }

    $conn->close();
    ?>

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JavaScript code for handling delete button clicks -->
    <script>
    $(document).ready(function(){
        $('.action-btn.delete').click(function(){
            var id = $(this).data('id');
            if (confirm("Are you sure you want to delete this item?")) {
                $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        if (response == "success") {
                            alert("Record deleted successfully");
                            location.reload(); // Reload the page to reflect changes
                        } else {
                            alert("Error deleting record");
                        }
                    },
                    error: function() {
                        alert("Error deleting record");
                    }
                });
            }
        });
    });
    </script>
</body>
</html>