<?php $icepickDir = get_template_directory(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'inc/head.inc.php'; ?>
    </head>
    <body>
        <div class="container-fluid">
            <?php require_once 'inc/header.inc.php'; ?>
            <div class="container page-container">
                <div class="row">
                    <!--
                    <div class="col-sm-12">
                        <div id="logoWeb">
                            <a href="./">Ice Pick</a>
                        </div>
                    </div>
                    -->
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
                        
                        //Loading post data in the $allPosts array
                        while(have_posts()) {
                            the_post();
                            
                            array_push($allPosts, $post);
                        }
                        ?>
                        
                        <?php
                            //Posts in column 1
                            for($i = 0; $i < count($allPosts); $i+=$nColumns)
                            {
                                include "thumbnail.php";
                            }
                        ?>
                    </div>
                    <div class="col-sm-4">
                        <?php
                            //Posts in column 2
                            for($i = 1; $i < count($allPosts); $i+=$nColumns)
                            {
                                include "thumbnail.php";
                            }
                        ?>
                    </div>
                    <div class="col-sm-4">
                        <?php
                            //Posts in column 3
                            for($i = 2; $i < count($allPosts); $i+=$nColumns)
                            {
                                include "thumbnail.php";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div id="socialTab">
                <table class="link-table">
                    <tr class="social-link">
                        <td><a href="#"><i class="fa fa-instagram " aria-hidden="true"></i></a></td>
                        <td><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></td>
                        <td><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></td>
                        <td><a href="#"><i class="fa fa-google-plus " aria-hidden="true"></i></a></td>
                        <td><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></td>
                        <td><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></td>
                    </tr>
                </table>
            </div>
            <footer>
                <p>&copy; 2017. Ice Pick. All Rights Reserved</p>
            </footer>
        </div>
        <!--
            <a href="" class="menu-hide"><i class="fa fa-bars" aria-hidden="true"></i></a>
        -->
    </body>
</html>

<?php
    //Functions

    //Returns the URL of the first image in a post.
    function post_thumbnail($post) {
        $first_img = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        $first_img = $matches [1] [0];
        
        //Set a default image if the post doesn't have any images
        if(empty($first_img)){ 
            $first_img = get_template_directory_uri()."/images/default.jpg";
        }
        return $first_img;
    }
?>