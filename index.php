<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    @media (max-width: 767px) {

        .cardname {
            color: black !important;
        }
    }


    .centered-span {
        display: flex !important;
        justify-content: center !important;
        position: relative;
        left: 340px;
    }




    @media only screen and (max-width: 768px) {

        #categorySelect {
            position: relative;
            width: 200px;
            /* Set width to 100px */
            top: 10px;
            /* Adjust top position as needed */
            right: 10px;
            /* Set distance from right side of the screen */
            display: block !important;
            margin-left: auto;
            right: 0.2rem;
        }

        .navcategorySelect {
            display: none;
        }

    }

    @import url("https://fonts.googleapis.com/css?family=Poppins:400");


    .date__box .date__day {
        font-size: 22px;
    }

    .blog-card {
        padding: 30px;
        position: relative;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.3);
        margin-bottom: 30px;
    }

    */ .blog-card .date__box {
        opacity: 0;
        transform: scale(0.5);
        transition: 300ms ease-in-out;
    }

    .blog-card .blog-card__background,
    .blog-card .card__background--layer {
        z-index: -1;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .blog-card .blog-card__background {
        padding: 15px;
        background: white;
    }


    .blog-card .card__background--main {
        height: 100%;
        position: relative;
        transition: 300ms ease-in-out;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        /* Center the image */
    }

    .blog-card .card__background--wrapper {
        height: 0;
        padding-top: 56.25%;
        /* 16:9 aspect ratio */
        position: relative;
        overflow: hidden;
    }

    .blog-card .card__background--layer {
        z-index: 0;
        opacity: 0;
        background: rgba(#333, 0.9);
        transition: 300ms ease-in-out;
    }

    .blog-card .blog-card__head {
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .blog-card .blog-card__info {
        z-index: 10;
        background: white;
        padding: 20px 15px 0px;
        text-align: left;
    }

    .blog-card .blog-card__info h5 {
        transition: 300ms ease-in-out;
    }

    .blog-card:hover .date__box {
        opacity: 1;
        transform: scale(1);
    }

    .blog-card:hover .card__background--main {
        transform: scale(1.2) rotate(5deg);
    }

    .blog-card:hover .card__background--layer {
        opacity: 1;
    }

    .blog-card:hover .blog-card__info h5 {
        color: #ffb535;
    }

    a.icon-link {
        color: #363738;
        transition: 200ms ease-in-out;
    }

    a.icon-link i {
        color: #ffb535;
    }

    a.icon-link:hover {
        color: #ffb535;
        text-decoration: none;
    }

    .btn {
        background: white;
        color: #363738;
        font-weight: bold;
        outline: none;
        box-shadow: 1px 1px 3px 0 rgba(0, 0, 0, 0.2);
        overflow: hidden;
        border-radius: 0;
        height: 50px;
        line-height: 50px;
        display: inline-block;
        padding: 0 !important;
        border: none;
    }

    .btn:focus {
        box-shadow: none;
    }

    .btn:hover {
        background: #ffb535;
        color: #fff;
    }

    .btn.btn--with-icon {
        padding-right: 20px;
    }

    .btn.btn--with-icon i {
        padding: 0px 30px 0px 15px;
        margin-right: 10px;
        height: 50px;
        line-height: 50px;
        vertical-align: bottom;
        color: white;
        background: #ffb535;
        clip-path: polygon(0 0, 70% 0, 100% 100%, 0% 100%);
    }

    .btn.btn--only-icon {
        width: 50px;
    }


    .cardimg img {
        padding-left: 1rem;
        padding-right: 1rem;
        border-radius: 1rem;
    }

    .BlogButton {
        background-color: orange;
        padding-left: 1rem !important;
        padding-right: 2rem !important;
        position: relative;
        bottom: 2px;
        right: 0.3rem;
    }

    .BlogButtonSpan i {
        background-color: #040025;
        padding-left: 1rem !important;
        padding-right: 1rem !important;
        padding-top: 1.1rem;
        padding-bottom: 1.1rem;
        color: white;

    }
</style>



<body>



    <?php
    include 'connection.php';
    // Query to fetch only the required page of items
    $sql = "SELECT category, slug FROM `blog` GROUP BY category";

    $result = mysqli_query($connection, $sql);
    ?>


    <div style="width: 10px;" class="centered-span navcategorySelect">

        <input type="checkbox" name="category" id="all" value="all">
        <label for="all">All Services</label>
        <?php
        // Reset the result pointer to fetch from the beginning
        mysqli_data_seek($result, 0);

        // Print checkboxes and labels dynamically for each category
        while ($row = mysqli_fetch_assoc($result)) :
        ?>
            <input type="checkbox" name="category" id="<?php echo $row['category']; ?>" value="<?php echo $row['category']; ?>">
            <label for="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></label>
        <?php endwhile; ?>




    </div>

    <div class="col-lg-8 col-md-12 col-12" id="blog-posts">
    </div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Load all blogs initially when the page is loaded
        $(document).ready(function() {
            loadBlogPosts('all', 1); // Initially load all blogs with page 1
        });
        // Function to handle checkbox clicks
        $('input[name="category"]').change(function() {
            // Uncheck all checkboxes except the one that was just clicked
            $('input[name="category"]').not(this).prop('checked', false);

            var category = $(this).val();
            var page = 1; // Reset page number to 1 when category changes
            loadBlogPosts(category, page);
        });




        // Function to load blog posts based on category and page number
        function loadBlogPosts(category, page) {
            // Uncheck all checkboxes except the one that was just clicked
            $('input[name="category"]').not(':checked').prop('checked', false);
            $('input[name="category"][value="' + category + '"]').prop('checked', true);

            $.ajax({
                url: 'fetch_blog_posts.php',
                type: 'GET',
                data: {
                    category: category,
                    page: page
                },
                success: function(response) {
                    $('#blog-posts').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Request failed. Status: ' + status);
                }
            });
        }

        // Handle pagination click event
        $(document).on("click", ".pagination a", function(e) {
            e.preventDefault();
            var page = $(this).attr("data-page");
            var category = $('input[name="category"]:checked').val() || 'all'; // Get the checked category, default to 'all' if none selected
            loadBlogPosts(category, page);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>