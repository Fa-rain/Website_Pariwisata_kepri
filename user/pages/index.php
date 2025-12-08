<?php
include '../includes/koneksi.php';
include '../includes/header.php';

$sql = "SELECT * FROM rencana_perjalanan";
$query = mysqli_query($koneksi, $sql);

?>
<main>
    <!-- PENGENALAN -->
    <div class="pengenalan" style="padding-bottom:200px">
        <div class="subjudul">
            <h1>Kenal Lebih Dekat</h1>
        </div>
        <div class="deskripsi">
            <p>Kepulauan Riau (disingkat Kepri) adalah provinsi kepulauan di Indonesia yang beribu kota di Kota Tanjungpinang dan memiliki kota terbesar, Batam.
                Provinsi ini dibentuk berdasarkan Undang-undang Nomor 25 Tahun 2002, dengan hari jadi pada 24 September 2002.
                Luas wilayahnya mencapai 8.201,72 km², di mana sekitar 96% merupakan perairan dan hanya 4% daratan.
                Kepulauan Riau terdiri dari 5 kabupaten (Bintan, Karimun, Natuna, Lingga, Kepulauan Anambas)
                dan 2 kota (Batam dan Tanjungpinang), dengan total 2.408 pulau, sebagian besar belum bernama
        </p>
        </div>
        <div class="btn-explore">
            <a href="https://kepriprov.go.id">Laman Resmi</a>
        </div>
    </div>

    <!-- REKOMENDASI -->
    <div class="rekomendasi"style="padding-bottom:100px">
        <div class="subjudul">
            <h1>Rekomendasi Wisata Menarik</h1>
            <a href="rekomendasi.php"><img src="../assets/images/builder/website_banner.png" width="100%" alt=""></a>
        </div>
    </div>
    
    <!-- DESTINASI -->
<div class="destinasi">

    <div class="subjudul">
        <h1>Destinasi Wisata yang Menakjubkan</h1>
    </div>

    <!-- KATEGORI BUTTON -->
    <div class="opsi_kategori">
        <?php
        $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
        while($kategori = mysqli_fetch_assoc($queryKategori)){ ?>
            
            <button class="btn-kategori" data-id="<?= $kategori['id_kategori'] ?>">
                <?= $kategori['nama_kategori'] ?>
            </button>

        <?php } ?>
    </div>

    <!-- TEMPAT CARD WISATA AKAN MUNCUL -->
    <div class="wisata-by-kategori" id="wisata-container">
        <p>Pilih kategori untuk melihat daftar wisata.</p>
    </div>

</div>

    <!-- RENCANA PERJALANAN -->
     <div class="rencana_perjalanan">
        <div class="subjudul">
            <h1>Rencanakan Perjalananmu</h1>
        </div>
        <?php
        while($r = mysqli_fetch_assoc($query)) {
            echo "
                <div class='card_rencana_perjalanan'>
                <img src='../../images/wisata/{$r['gambar']}' alt='{$r['judul']}'>
                <h3>{$r['judul']}</h3>
                </div>
                ";
        }
       
        ?>
     </div>

</main>
    

<?php
include '../includes/footer.php';
?>

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

</body>
</html>