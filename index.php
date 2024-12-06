<?php
# Access session.
session_start();
# Include navigation file.
include('includes/nav.php');
include('includes/filter.php');

# Redirect if not logged in.
if (!isset($_SESSION['id'])) {
    require('login_tools.php');
}

require('connect_db.php')
?>

<!-- Carousel Section -->
<div class="carousel-container">
    <div id="movieCarousel" class="carousel slide mt-5" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <?php
            $query = "SELECT img, movie_title, genre FROM movie_listings LIMIT 5";
            $result = mysqli_query($link, $query);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $isActive = true;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="carousel-item' . ($isActive ? ' active' : '') . '">';
                    echo '<img src="' . htmlspecialchars($row['img']) . '" class="d-block w-100 img-fluid" alt="Poster of ' . htmlspecialchars($row['movie_title']) . '">';
                    echo '<div class="movie-details">';
                    echo '<h5>' . htmlspecialchars($row['movie_title']) . '</h5>';
                    echo '</div>';
                    echo '</div>';
                    $isActive = false;
                }
            } else {
                echo '<div class="carousel-item active">';
                echo '<p>No movies available to display in the carousel.</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
<?php
# Include footer file.
include('includes/footer.php');
