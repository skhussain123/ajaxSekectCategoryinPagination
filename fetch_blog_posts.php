<?php
include 'connection.php';



// Check if 'page' parameter is present in the URL
if (isset($_GET['page']) && isset($_GET['category'])) {
    // Print the value of 'page' parameter
    $page = $_GET['page'];
    echo "Current Page Number: $page<br>";


    $limit = 1; // Number of blog posts per page
    $offset = ($page - 1) * $limit; // Offset calculation for SQL query


    $category = $_GET['category'];
    echo "Current Category: $category";


    $sql = "SELECT * FROM blog";
    if ($category !== 'all') {
        $sql .= " WHERE category = '$category'";
    }
    $sql .= " LIMIT $limit OFFSET $offset";

    $result = mysqli_query($connection, $sql);

    // Fetch and display blog posts
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <a href="/blog/<?php echo $row['slug']; ?>">
            <div class="card" style="padding-top: 1rem; padding-bottom: 1.5rem; box-shadow: 0 3px 12px rgba(0, 0, 0, 0.3); height: 565px;">
                <div class="cardimg">
                    <img height="430px" width="100%" src="admin/light/query/<?php echo $row['img']; ?>" alt="">
                </div>
                <div class="cardBody mt-1">
                    <h4 class="blog_title mt-4" style="position:relative;bottom:1rem;font-weight:bold;color:orange">
                        <?php echo $row['id']; ?>
                    </h4>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="meta_description text-start" style="position:relative;bottom:1.9rem">
                                <?php echo $row['blog_title']; ?>
                                <br>
                                <?php echo $row['category']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <hr>
<?php }
}


// Pagination links
$sql = "SELECT COUNT(*) AS total FROM blog";
if ($category !== 'all') {
    $sql .= " WHERE category = '$category'";
}

$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row['total'] / $limit);

?>

<div class="pagination">
    <?php

    // Display pagination links
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<a href="/co/?page=' . $i . '&category=' . $category . '" data-page="' . $i . '">' . $i . '</a>';
    }

    ?>
</div>

<?php


mysqli_close($connection);
?>