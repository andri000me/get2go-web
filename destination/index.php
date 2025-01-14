<?php
    session_start();
    require "../script/php/conn.php";

    if( !isset($_SESSION["lokasi"])) {
        header("Location: /");
        exit;
    } else {
        $lokasi = $_SESSION["lokasi"];
        $tipe = $_SESSION["tipe"];
    }

    $result = mysqli_query($conn, "SELECT * FROM `tempat` WHERE `lokasi`='$lokasi' AND `tipe`='$tipe'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata | Get2Go</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/style/destination.css">
    <link rel="stylesheet" href="/style/destination.tmp.css">
</head>

<body>
    <h1>Rekomendasi Untuk Anda</h1>

    <div class="centre">
        <article>
            <?php while ( $row = mysqli_fetch_row($result)) : ?>
            <div class="card">
                <a href="/place/index.php?id=<?= $row[0]; ?>"><img src="<?= $row[9]; ?>" alt=""></a>
                <div class="container">
                    <a href="/place/index.php?id=<?= $row[0]; ?>""><h2><b><?= $row[2]; ?></b></h2></a>
                    <a href="/place/index.php?id=<?= $row[0]; ?>""><h4><?= $row[1]; ?></h4></a>
                </div>
            </div>
            <?php endwhile; ?>

        </article>
    </div>
</body>
</html>