<?php
// Scan the images directory
$images = scandir('images');
$images = array_diff($images, array('.', '..')); // Remove . and .. from the array

// Pagination Logic
$imagesPerPage = 3;
$totalPages = ceil(count($images) / $imagesPerPage);
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $imagesPerPage;
$imagesToDisplay = array_slice($images, $start, $imagesPerPage);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Photo Album</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
<section>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12 g-0">
          <div class="photo-album g-0">
            <?php if (!empty($imagesToDisplay)): ?>
              <div class="main-image mb-4">
                <img class="img-fluid main-img" src="images/<?php echo $imagesToDisplay[0]; ?>" alt="Main Image">
              </div>
              <div class="small-images d-flex">
                <?php foreach (array_slice($imagesToDisplay, 1) as $smallImage): ?>
                  <img class="img-fluid small-img" src="images/<?php echo $smallImage; ?>" alt="Small Image">
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="pagination ">
            <?php if ($page > 1): ?>
              <a href="?page=<?php echo $page - 1; ?>">Previous</a>
            <?php endif; ?>

            <?php if ($page < $totalPages): ?>
              <a href="?page=<?php echo $page + 1; ?>">Next</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
</section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>

</html>