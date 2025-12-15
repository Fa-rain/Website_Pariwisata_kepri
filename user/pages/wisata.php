<?php

include '../includes/koneksi.php';
include '../includes/header.php';


?>

<main>
    <section class = "wisata-header">
        <center>
            <header class="subjudul">
                <h1>Berbagai Macam Wisata</h1>
            </header>

            <!-- KATEGORI BUTTON -->
            <article class="opsi_kategori">
                <button class = "btn-kategori" data-id="">Semua</button>
                <?php
                $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
                while($kategori = mysqli_fetch_assoc($queryKategori)){ ?>
                    
                    <button class="btn-kategori" data-id="<?= $kategori['id_kategori'] ?>">
                        <?= $kategori['nama_kategori'] ?>
                    </button>

                <?php } ?>
            </article>
        </center>
        <!-- TEMPAT CARD WISATA AKAN MUNCUL -->
        <article class="wisata-by-kategori" id="wisata-container">
            >
        </article>
    </section>
</main>
<script>
    document.querySelectorAll('.btn-kategori').forEach(btn => {
        btn.addEventListener('click', function () {

            let id = this.dataset.id;

            fetch("../process/get_wisata.php?id_kategori=" + id)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('wisata-container').innerHTML = data;
                });
        });
    });
</script>
<?php
    include '../includes/footer.php';
?>