<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Gaji Karyawan</title>
</head>
<body>
    <div class="container">
        <h2>Hitung Gaji Karyawan</h2>
        <form method="POST">
            <div class="form-group">
                <label for="jamKerja">Jumlah Jam Kerja</label>
                <input type="number" id="jamKerja" name="jamKerja" required>
            </div>
            <div class="form-group">
                <label for="tarifPerJam">Tarif Per Jam</label>
                <input type="number" id="tarifPerJam" name="tarifPerJam" required>
            </div>
            <button type="submit" class="btn">Hitung Gaji</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $jamKerja = $_POST['jamKerja'];
            $tarifPerJam = $_POST['tarifPerJam'];

            function hitungGaji($jamKerja, $tarifPerJam) {
                $batasJamNormal = 40;
                $tarifLembur = 1.5 * $tarifPerJam;

                if ($jamKerja > $batasJamNormal) {
                    $jamLembur = $jamKerja - $batasJamNormal;
                    $gaji = ($batasJamNormal * $tarifPerJam) + ($jamLembur * $tarifLembur);
                } else {
                    $gaji = $jamKerja * $tarifPerJam;
                }

                return $gaji;
            }

            $gaji = hitungGaji($jamKerja, $tarifPerJam);
            echo "<div class='result'>Gaji total karyawan adalah: <strong>Rp " . number_format($gaji, 2) . "</strong></div>";
        }
        ?>
    </div>
</body>
</html>
