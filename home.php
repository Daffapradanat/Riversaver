<?php
include 'config/koneksi.php';

$game = $koneksi->query("SELECT * FROM GAME");
if (!$game) {
    die("Error mengambil data GAME: " . $koneksi->error);
}

$galeri = $koneksi->query("SELECT * FROM GALERI");
if (!$galeri) {
    die("Error mengambil data GALERI: " . $koneksi->error);
}

$komentar = $koneksi->query("SELECT * FROM KOMENTAR ORDER BY id_komentar DESC");
if (!$komentar) {
    die("Error mengambil data KOMENTAR: " . $koneksi->error);
}

$game = $game->fetch_assoc(); 

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riversaver</title>
    <link rel="stylesheet" href="public/assets/css/home.css">
    <link rel="icon" href="/Riversaver_Native/public/assets/logo.png" type="image/png">
    <link rel="stylesheet" href="public/assets/datatable/datatables.min.css">
    <link rel="stylesheet" href="public/assets/swiper/swiper-bundle.min.css">

</head>
<body>
<?php include 'component/header.php'; ?>

<div class="dashboard-content">
    <div class="logo-container"></div>
    <button class="download-btn">
        <span>Download</span>
        <div class="liquid"></div>
    </button>
    <div class="video-container">
        <video class="dashboard-video" src="public/assets/video/contoh video.mp4" autoplay muted loop></video>
    </div>
    <div class="fade-1"></div>
</div>

<div class="description-game"><?php echo htmlspecialchars($game['detail_game']); ?></div>

<div class="general-info">
    <h1>General Info</h1>
    <div class="info-details">
        <p><strong>Version:</strong> <?php echo htmlspecialchars($game['versi']); ?></p>
        <p><strong>Genre:</strong> Adventure, Action</p>
        <p><strong>Release Date:</strong> January 2025</p>
    </div>

    <div class="slider-container">
        <input type="radio" name="slider" id="slide1" checked>
        <input type="radio" name="slider" id="slide2">
        <input type="radio" name="slider" id="slide3">
        <div class="slides">
            <?php while ($row = $galeri->fetch_assoc()) { ?>
                <div class="slide">
                    <div class="image-container">
                        <img src="<?php echo htmlspecialchars($row['foto_galeri']); ?>" alt="Game Image">
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="slider-nav">
            <label for="slide1"></label>
            <label for="slide2"></label>
            <label for="slide3"></label>
        </div>
    </div>
</div>

<div class="moving-text-container">
    <div class="moving-text">
        <span>Welcome to Riversaver! Enjoy the game and have fun!</span>
        <span>Welcome to Riversaver! Enjoy the game and have fun!</span>
    </div>
</div>


<div class="komentar-section">
    <!-- Form komentar di sebelah kiri -->
    <div class="komentar-form">
        <h3>Komentar</h3>
        <form action="backoffice/controller/komentarController.php" method="POST">
            <input type="text" name="nama_tamu" placeholder="Nama tamu" required>
            <textarea name="komentar" placeholder="Feedback" required></textarea>
            <button type="submit" name="tambah">Submit</button>
        </form>
    </div>

    <div class="komentar-container">
        <div class="swiper komentar-slider">
            <div class="swiper-wrapper">
            <?php
                $counter = 0;
                while ($row = $komentar->fetch_assoc()) {
                    if ($counter >= 3) break;
                    echo "<div class='swiper-slide'>";
                    echo "<strong>" . htmlspecialchars($row['nama_tamu']) . "</strong>";
                    echo "<p>" . htmlspecialchars($row['komentar']) . "</p>";
                    echo "</div>";
                    $counter++;
                }
                ?>
            </div>
        </div>
        <button class="see-more-btn" onclick="openKomentarModal()">See more</button>
    </div>
</div>

<!-- Modal Popup -->
<div id="komentarModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeKomentarModal()">&times;</span>
        <h2>All Comments</h2>
        <div>
            <label for="searchKomentar">Search:</label>
            <input type="text" id="searchKomentar" class="search-box">
        </div>
        <div>
            <label for="limitKomentar">Show:</label>
            <select id="limitKomentar">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <div id="komentarContainer">
            <?php
            $komentar->data_seek(0);
            while ($row = $komentar->fetch_assoc()) {
                echo "<div class='komentar-card'>";
                echo "<strong>" . htmlspecialchars($row['nama_tamu']) . "</strong>";
                echo "<p>" . htmlspecialchars($row['komentar']) . "</p>";
                echo "</div>";
            }
            ?>
        </div>
        <div id="pagination"></div>
    </div>
</div>


<?php include 'component/footer.php'; ?>

<script src="public/assets/datatable/datatables.min.js"></script>
<script src="public/assets/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.komentar-slider', {
        loop: true,
        autoplay: { delay: 3000 },
        slidesPerView: 1,
        effect: 'fade',
    });

    document.addEventListener("DOMContentLoaded", function () {
        let allComments = document.querySelectorAll(".komentar-card");
        let searchBox = document.getElementById("searchKomentar");
        let limitSelect = document.getElementById("limitKomentar");
        let paginationContainer = document.getElementById("pagination");

        let currentPage = 1;
        let itemsPerPage = parseInt(limitSelect.value);

        function renderComments() {
            let searchTerm = searchBox.value.toLowerCase();
            let filteredComments = Array.from(allComments).filter(card =>
                card.innerText.toLowerCase().includes(searchTerm)
            );

            let totalPages = Math.ceil(filteredComments.length / itemsPerPage);
            let start = (currentPage - 1) * itemsPerPage;
            let end = start + itemsPerPage;

            allComments.forEach(card => (card.style.display = "none"));
            filteredComments.slice(start, end).forEach(card => (card.style.display = "block"));

            renderPagination(totalPages);
        }

        function renderPagination(totalPages) {
            paginationContainer.innerHTML = "";
            for (let i = 1; i <= totalPages; i++) {
                let pageItem = document.createElement("span");
                pageItem.classList.add("page-item");
                if (i === currentPage) pageItem.classList.add("active");
                pageItem.innerText = i;
                pageItem.addEventListener("click", function () {
                    currentPage = i;
                    renderComments();
                });
                paginationContainer.appendChild(pageItem);
            }
        }

        searchBox.addEventListener("input", function () {
            currentPage = 1;
            renderComments();
        });

        limitSelect.addEventListener("change", function () {
            itemsPerPage = parseInt(this.value);
            currentPage = 1;
            renderComments();
        });

        renderComments();
    });

    function openKomentarModal() {
        document.getElementById("komentarModal").style.display = "flex";
    }

    function closeKomentarModal() {
        document.getElementById("komentarModal").style.display = "none";
    }
</script>

</body>
</html>