<?php
include '../includes/koneksi.php';
include '../includes/header.php';
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
        </div>
    </div>
    
    <!-- DESTINASI -->
    <div class="destinasi">
        <div class="subjudul">
            <h1>Destinasi Wisata yang Menakjubkan</h1>
        </div>
        <div class="opsi_kategori">
            <?php
                $kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
                while($row = mysqli_fetch_assoc($kategori)){
                    echo "<button class='btn-kategori' data-id='{$row['id_kategori']}'>{$row['nama_kategori']}</button>";
                }
            ?>
        </div>
    </div>

</main>
    

<?php
include '../includes/footer.php';
?>
</body>
</html>