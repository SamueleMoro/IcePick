<div class="thumbnail">
    <div class="img-post">
        <div class="overlay-thumb">
            <div class="overlay-text">
                <div class="overlay-text-table">
                    <p class="subtext">Around the world</p>
                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <a href="#">
            <img src="<?php echo post_thumbnail($allPosts[$i]); ?>" alt="San Francisco">
        </a>
    </div>
    <div class="bottom-box">
        <a href="#">
            <h4><?php echo $allPosts[$i]->post_title; ?></h4>
        </a>
        <p class="date"><?php echo get_the_date("j F Y",$allPosts[$i]->ID); ?></p>
        <p class="categ"><?php echo get_the_category($allPosts[$i]->ID)[0]->name; ?></p>
        <p><?php
            $content = $allPosts[$i]->post_content;
            $content = preg_replace("/<img[^>]+\>/i", " ", $content);
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]>', $content);
            
            if(strlen($content) > 220) {
                $content = substr($content,0,220)."...";
            }

            echo $content;
        ?>
        </p>
        <div class="post-ins-buttons">
            <a href=""><i class="fa fa-heart-o"></i></a>
            <a href=""><i class="fa fa-comment-o"></i></a>
            <a href=""><i class="fa fa-bullhorn"></i></a>
        </div>
    </div>
</div>
