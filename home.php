<?php
include 'config/koneksi.php';

$gameQuery = $koneksi->query("SELECT * FROM GAME LIMIT 1");
if (!$gameQuery) {
    die("Error mengambil data GAME: " . $koneksi->error);
}
$game = $gameQuery->fetch_assoc();

$galeri = $koneksi->query("SELECT * FROM GALERI");
if (!$galeri) {
    die("Error mengambil data GALERI: " . $koneksi->error);
}

$komentar = $koneksi->query("SELECT * FROM KOMENTAR ORDER BY id_komentar DESC");
if (!$komentar) {
    die("Error mengambil data KOMENTAR: " . $koneksi->error);
}

$logo = !empty($game['logo']) 
    ? "public/image/game/" . $game['logo'] 
    : "public/assets/default-logo.png";

$videoPath = !empty($game['video_thriller']) 
    ? "public/assets/video/" . $game['video_thriller'] 
    : '';

$imagePath = !empty($game['image']) 
    ? "public/image/game/" . $game['image'] 
    : "public/assets/default-logo.png";

$formattedDate = !empty($game['release_date']) && strtotime($game['release_date']) 
    ? date('d F Y', strtotime($game['release_date'])) 
    : 'Unknown release date';

function safeDate($date, $format = 'd M Y', $fallback = 'Unknown release date') {
    return !empty($date) && strtotime($date) 
        ? date($format, strtotime($date)) 
        : $fallback;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($game['judul_game'] ?? 'Unknown game') ?></title>
    <link rel="stylesheet" href="public/assets/css/home.css">
    <link rel="icon" href="public/assets/logo.png" type="image/png">
    <link rel="stylesheet" href="public/assets/datatable/datatables.min.css">
    <link rel="stylesheet" href="public/assets/swiper/package/swiper-bundle.min.css">
    <link rel="stylesheet" href="public/assets/AOS/dist/aos.css">

</head>
<body>
<?php include 'component/header.php'; ?>

<div class="dashboard-content">
    <div class="logo-container" style="background-image: url('<?= htmlspecialchars($imagePath) ?>');"></div>
    <button class="download-btn">
        <span>Download</span>
        <div class="liquid"></div>
    </button>
    <div class="video-container">
        <video class="dashboard-video" src="<?= $videoPath ?>" autoplay muted loop></video>
    </div>
    <div class="fade-1"></div>
</div>

<div class="description-game">
    <?= htmlspecialchars($game['detail_game'] ?? 'No description available for this game.') ?>
</div>

<div class="general-info">
    <h1>General Info</h1>
    <div class="info-details">
        <p><strong>Version:</strong> <?= htmlspecialchars($game['versi'] ?? 'Unknown version') ?></p>
        <p><strong>Genre:</strong> <?= htmlspecialchars($game['genre'] ?? 'Genre not specified') ?></p>
        <p><strong>Release Date:</strong> <?= safeDate($game['tanggal_rilis'] ?? null) ?></p>
    </div>
</div>

<div class="gallery-container">
    <h1>GALERI</h1>
    <div class="gallery-content">
        <?php while ($row = $galeri->fetch_assoc()) { ?>
            <div class="gallery-item" data-aos="fade-up">
                <img src="public/image/galeri/<?php echo htmlspecialchars($row['foto_galeri']); ?>" 
                    alt="<?php echo htmlspecialchars($row['judul_galeri']); ?>">
            </div>
        <?php } ?>
    </div>
</div>

<div class="moving-text-container">
    <div class="moving-text">
        <span>Welcome to Riversaver! Enjoy the game and have fun!</span>
        <span>Welcome to Riversaver! Enjoy the game and have fun!</span>
    </div>
</div>

<div class="komentar-section">
    <h2>What Our Users Say</h2>
    <div class="komentar-layout">
        <div class="komentar-form">
            <h3>Share Your Feedback</h3>
            <form action="backoffice/controller/komentarController.php" method="POST">
                <input type="text" name="nama_tamu" placeholder="Your Name" required>
                <textarea name="komentar" placeholder="Your Feedback" required></textarea>
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
            <button class="see-more-btn" onclick="openKomentarModal()">See All Comments</button>
        </div>
    </div>
</div>

<div id="komentarModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>All Comments</h2>
            <span class="close" onclick="closeKomentarModal()">&times;</span>
        </div>
        
        <div class="modal-search">
            <div>
                <label for="searchKomentar">Search:</label>
                <input type="text" id="searchKomentar" class="search-box" placeholder="Search comments...">
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
<script src="public/assets/swiper/package/swiper-bundle.min.js"></script>
<script src="public/assets/Masonry/masonry.pkgd.min.js"></script>
<script src="public/assets/AOS/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var grid = document.querySelector('.gallery-content');
    var msnry = new Masonry(grid, {
      itemSelector: '.gallery-item',
      columnWidth: 10,
      gutter: 8,
      percentPosition: true
    });
  });
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper('.komentar-slider', {
        loop: true,
        autoplay: { 
            delay: 5000,
            disableOnInteraction: false
        },
        slidesPerView: 1,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        speed: 800,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });

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
        
        filteredComments.slice(start, end).forEach(card => {
            card.style.display = "block";
            card.style.animation = "fadeIn 0.5s ease-in-out";
        });

        renderPagination(totalPages);
        
        const noResultsMsg = document.getElementById("noResultsMsg");
        if (filteredComments.length === 0) {
            if (!noResultsMsg) {
                const msg = document.createElement("div");
                msg.id = "noResultsMsg";
                msg.textContent = "No comments found matching your search.";
                msg.style.textAlign = "center";
                msg.style.padding = "20px";
                msg.style.color = "#666";
                document.getElementById("komentarContainer").appendChild(msg);
            }
        } else if (noResultsMsg) {
            noResultsMsg.remove();
        }
    }

    function renderPagination(totalPages) {
        paginationContainer.innerHTML = "";
        
        if (totalPages <= 1) return;
        
        if (currentPage > 1) {
            let prevBtn = document.createElement("span");
            prevBtn.classList.add("page-item");
            prevBtn.innerHTML = "&laquo;";
            prevBtn.addEventListener("click", function () {
                currentPage--;
                renderComments();
            });
            paginationContainer.appendChild(prevBtn);
        }

        let startPage = Math.max(1, currentPage - 2);
        let endPage = Math.min(totalPages, startPage + 4);
        startPage = Math.max(1, endPage - 4);

        if (startPage > 1) {
            let firstPage = document.createElement("span");
            firstPage.classList.add("page-item");
            firstPage.innerText = "1";
            firstPage.addEventListener("click", function () {
                currentPage = 1;
                renderComments();
            });
            paginationContainer.appendChild(firstPage);
            
            if (startPage > 2) {
                let ellipsis = document.createElement("span");
                ellipsis.textContent = "...";
                ellipsis.style.margin = "0 5px";
                paginationContainer.appendChild(ellipsis);
            }
        }

        for (let i = startPage; i <= endPage; i++) {
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

        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                let ellipsis = document.createElement("span");
                ellipsis.textContent = "...";
                ellipsis.style.margin = "0 5px";
                paginationContainer.appendChild(ellipsis);
            }
            
            let lastPage = document.createElement("span");
            lastPage.classList.add("page-item");
            lastPage.innerText = totalPages;
            lastPage.addEventListener("click", function () {
                currentPage = totalPages;
                renderComments();
            });
            paginationContainer.appendChild(lastPage);
        }

        if (currentPage < totalPages) {
            let nextBtn = document.createElement("span");
            nextBtn.classList.add("page-item");
            nextBtn.innerHTML = "&raquo;";
            nextBtn.addEventListener("click", function () {
                currentPage++;
                renderComments();
            });
            paginationContainer.appendChild(nextBtn);
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

    document.getElementById("komentarModal").addEventListener("click", function(e) {
        if (e.target === this) {
            closeKomentarModal();
        }
    });

    renderComments();
});

function openKomentarModal() {
    const modal = document.getElementById("komentarModal");
    modal.classList.add("show");
    document.body.style.overflow = "hidden";
}

function closeKomentarModal() {
    const modal = document.getElementById("komentarModal");
    modal.classList.remove("show");

    setTimeout(() => {
        modal.style.display = "none";
        document.body.style.overflow = "auto";
    }, 300);
}

</script>
</body>
</html>