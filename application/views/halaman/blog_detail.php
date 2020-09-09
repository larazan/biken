<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layout/head.php' ?>
<body>

    <!--Start class site-->
    <div class="tz-site">

        <!--Start id tz header-->
        <?php include 'application/views/layout/header.php' ?>
        <!--End id tz header-->

        <!--Start Blog-->
        <div class="blog">
            <div class="container">

                <!--Start breadcrumbs-->
                <ul class="tz-breadcrumbs">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li class="current">
                        Category
                    </li>
                </ul>
                <!--End breadcrumbs-->
                <div class="blog-container">
                    <div class="row">
                        <div class="col-md-4">

                            <!--Blog Sidebar-->
                            <?php include 'application/views/halaman/blog_sidebar.php' ?>
                            <!--End Blog Sidebar-->
                        </div>
                        <div class="col-md-8">

                            <!--Blog Content-->
                            <div class="row">
                                <div class="col-md-12">

                                    <!--Content-->
                                    <article class="single-blog">

                                        <div class="thumb">
                                            <img src="images/Blog/blog-heading.jpg" alt="will be distracted">
                                        </div>

                                        <h1><a href="#">It is a long established fact that a reader will be distracted</a></h1>
                                        <span class="date">Posted at March 19. 2015</span>
                                        <span class="date">
                                                Author:
                                                <a href="blog.html">Admin</a>
                                            </span>
                                        <div class="single-content">
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                            </p>
                                            <blockquote>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
                                            </blockquote>
                                            <p>
                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
                                                eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                                                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                                                sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                                            </p>
                                            <p>
                                                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                                                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam,
                                                quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                                            </p>
                                        </div>

                                    

                                        <div class="entry-social">
                                            <a href="#" class="fa fa-facebook"></a>
                                            <a href="#" class="fa fa-twitter"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-youtube"></a>
                                            <a href="#" class="fa fa-instagram"></a>
                                            <a href="#" class="fa fa-pinterest"></a>
                                        </div>

                                        <nav class="post-navigation">
                                            <a class="prev pull-left" href="single-blog.html">Previous post</a>
                                            <a class="Next pull-right" href="single-blog.html">Next post</a>
                                        </nav>

                                    </article>
                                    <!--End content-->

                                   

                                </div>
                            </div>
                            <!--End Blog Content-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Start Blog-->

       

        <!--Start Footer-->
        <?php include 'application/views/layout/footer.php' ?>
        <!--End Footer-->

    </div>
    <!--End class site-->

    <?php include 'application/views/layout/jspack.php' ?>

</body>
</html>