<?php

include '../includes/koneksi.php';
include '../includes/header.php';

$query = mysqli_query($koneksi, "SELECT * FROM rencana_perjalanan");

?>

<main>
    <section class = "rencana_perjalanan">
        <div class="rencana_perjalanan_container">
            <article class = "card_rencana_perjalanan">
                <?php
                while($r = mysqli_fetch_assoc($query)){?>
                    <img src="../../images/wisata/<?= $r['gambar']?>" alt="" width= "20%">
                    <?= $r['judul']?>

                <?php } ?>
            </article> 
        </div>
    </section>
    
</main>
<?php
include '../includes/footer.php';
?>
