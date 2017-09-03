<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IcePick</title>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <!-- Font Awesome CSS - CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <div id="menuPrincipale">
                    <div id="wrapper">
                        <div id="menuLeft">
                            <ul class="menu-link">
                                <li><a href="#" class="active"><i class="fa fa-building-o " aria-hidden="true"></i>Home</a></li>
                                <li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i>Categories</a></li>
                                <li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Posts</a></li>
                                <li><a href="#"><i class="fa fa-desktop " aria-hidden="true"></i>Layouts</a></li>
                                <li><a href="#"><i class="fa fa-user-o" aria-hidden="true"></i>About me</a></li>
                                <li><a href="#"><i class="fa fa-envelope-open-o" aria-hidden="true"></i>Contacts</a></li>
                            </ul>
                        </div>
                        <div id="menuRight">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="logoWeb">
                            <a href="./">Ice Pick</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <?php
                        $allPosts = [];
                        $nColumns = 3;
                        
                        query_posts('cat='.get_the_category()[0]->cat_ID);
                        
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