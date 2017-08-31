<?php $icepickDir = get_template_directory(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'inc/head.inc.php'; ?>
    </head>
    <body>
        <div class="container-fluid">
            <?php require_once 'inc/header.inc.php'; ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="logoWeb">
                            <a href="./">Ice Pick</a>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div id="slider">
                            <div class="image-slider"></div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h1>Last post</h1>
                    </div>
                    <div class="col-sm-4">
                        <?php
                        $allPosts = [];
                        $nColumns = 3;

                        # Loading post data in the $allPosts array
                        while(have_posts()) {
                            the_post();
                            array_push($allPosts, $post);
                        }
                        ?>
                        <?php
                            # Posts in column 1
                            for($i = 0; $i < count($allPosts); $i+=$nColumns) {
                                include "thumbnail.php";
                            }
                        ?>
                    </div>
                    <div class="col-sm-4">
                        <?php
                            # Posts in column 2
                            for($i = 1; $i < count($allPosts); $i+=$nColumns) {
                                include "thumbnail.php";
                            }
                        ?>
                    </div>
                    <div class="col-sm-4">
                        <?php
                            # Posts in column 3
                            for($i = 2; $i < count($allPosts); $i+=$nColumns) {
                                include "thumbnail.php";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php require_once 'inc/footer.inc.php'; ?>
        </div>
    </body>
</html>

<?php
    # Functions

    # Returns the URL of the first image in a post.
    function post_thumbnail($post) {
        $first_img = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        $first_img = $matches [1] [0];

        # Set a default image if the post doesn't have any images
        if(empty($first_img)) {
            $first_img = $icepickDir."/images/default.jpg";
        }
        return $first_img;
    }
?>
