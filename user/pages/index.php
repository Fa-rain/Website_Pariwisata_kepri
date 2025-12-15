<?php
include '../includes/koneksi.php';
include '../includes/header.php';

$sql = "SELECT * FROM rencana_perjalanan LIMIT 2";
$query = mysqli_query($koneksi, $sql);

?>
    <!-- HERO -->
    <section class="hero">
        <img src="../assets/images/builder/website_banner.png" alt="" class="banner">
    </section>

<main>

    <!-- PENGENALAN -->
    <section class="pengenalan" style="padding-bottom:200px">
        <header class="subjudul">
            <h1>Kenal Lebih Dekat</h1>
        </header>

        <article class="deskripsi">
            <p>Kepulauan Riau (disingkat Kepri) adalah provinsi kepulauan di Indonesia yang beribu kota di Kota Tanjungpinang dan memiliki kota terbesar, Batam.
                Provinsi ini dibentuk berdasarkan Undang-undang Nomor 25 Tahun 2002, dengan hari jadi pada 24 September 2002.
                Luas wilayahnya mencapai 8.201,72 km², di mana sekitar 96% merupakan perairan dan hanya 4% daratan.
                Kepulauan Riau terdiri dari 5 kabupaten (Bintan, Karimun, Natuna, Lingga, Kepulauan Anambas)
                dan 2 kota (Batam dan Tanjungpinang), dengan total 2.408 pulau, sebagian besar belum bernama
            </p>
        </article>

        <a href="https://kepriprov.go.id">Laman Resmi</a>
        
    </section>

    <!-- REKOMENDASI -->
    <section class="rekomendasi"style="padding-bottom:100px">
        <header class="subjudul">
            <h1>Rekomendasi Wisata Menarik</h1>
            <a href="rekomendasi.php"><img src="../assets/images/builder/website_banner.png" width="100%" alt=""></a>
        </header>
    </section>
    
    <!-- DESTINASI -->
<section  class="destinasi">
    <header class="subjudul">
        <h1>Destinasi Wisata yang Menakjubkan</h1>
    </header>

    <!-- KATEGORI BUTTON -->
    <article class="opsi_kategori">
        <?php
        $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
        while($kategori = mysqli_fetch_assoc($queryKategori)){ ?>
            
            <button class="btn-kategori" data-id="<?= $kategori['id_kategori'] ?>">
                <?= $kategori['nama_kategori'] ?>
            </button>

        <?php } ?>
    </article>

    <!-- TEMPAT CARD WISATA AKAN MUNCUL -->
    <article class="wisata-by-kategori" id="wisata-container">
        <p>Pilih kategori untuk melihat daftar wisata.</p>
    </article>

</section>

<!-- RENCANA PERJALANAN -->
<section class="rencana_perjalanan">
    <header class="subjudul">
        <h1>Rencanakan Perjalananmu</h1>
    </header>
    
    <article class = "container-rencana-perjalanan">
        <?php
        while($r = mysqli_fetch_assoc($query)) {
            echo "
                <div class='card-rencana-perjalanan'>
                <a href = 'rencana_perjalanan/id_rencana_perjalanan={$r['id_rencana_perjalanan']}'>
                <img src='../../images/wisata/{$r['gambar']}' alt='{$r['judul']}'>
                </a>
                <h3>{$r['judul']}</h3>
                </div>
                ";
        }   
        ?>
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

