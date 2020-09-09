<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layout/head.php' ?>
<body>
<!--Start class site-->
<div class="tz-site">

        <!--Start id tz header-->
        <?php include 'application/views/layout/header.php' ?>
        <!--End id tz header-->

    <!--Start shop single-->
    <section class="tz-shop-single">
        <div class="container">

            <!--Start Breadcrumbs-->
            <ul class="tz-breadcrumbs">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="current">
                    Category
                </li>
            </ul>
            <!--End Breadcrumbs-->
            <div class="row">
                <div class="col-md-6 col-sm-6">

                    <!--Shop images-->
                    <div class="shop-images">
                        <ul class="single-gallery">
                            <li>
                                <img src="<?=base_url()?>assets/images/product/single-p.jpg" alt="Propel Advanced Pro">
                            </li>
                            <li>
                                <img src="<?=base_url()?>assets/images/product/single-p.jpg" alt="Propel Advanced Pro">
                            </li>
                            <li>
                                <img src="<?=base_url()?>assets/images/product/single-p.jpg" alt="Propel Advanced Pro">
                            </li>
                        </ul>
                        <div class="product-social">
                            <a href="#" class="fa fa-facebook"></a>
                            <a href="#" class="fa fa-twitter"></a>
                            <a href="#" class="fa fa-google-plus"></a>
                            <a href="#" class="fa fa-dribbble"></a>
                        </div>
                    </div>
                    <!--End shop image-->
                </div>
                <div class="col-md-6 col-sm-6">
                    <!--Shop content-->
                    <div class="entry-summary">
                        <h1>Propel Advanced Pro</h1>
                        <span class="p-vote">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </span>
                        <p class="product-price">
                            <span class="price">$2,290.00</span>
                            <span class="stock">Availability:  <span>In stock</span></span>
                        </p>
                        <div class="description">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </p>
                        </div>
                        <form class="tz_variations_form ">
                            <p class="form-attr">
                                <span class="color">
                                    <label>Color:</label>
                                    <select name="color">
                                        <option value="blue">Blue</option>
                                        <option value="blue">Red</option>
                                        <option value="blue">Yellow</option>
                                    </select>
                                </span>
                                <span class="tzqty">
                                    <label>Qty:</label>
                                    <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4">
                                </span>
                            </p>
                            <p>
                                <button type="submit" class="single_add_to_cart_button">Add to cart</button>
                                <button type="submit" class="single_add_to_wishlist">add to wishlist</button>
                            </p>
                        </form>
                    </div>
                    <!--End shop content-->
                </div>

            </div>
        </div>

        <!--Shop tabs-->
        <div class="tz-shop-tabs">
            <div class="container">
                <div class="tab-head">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#description" data-toggle="tab">Description</a></li>
                        <li role="presentation"><a href="#reviews" data-toggle="tab">Reviews</a></li>
                        <li role="presentation"><a href="#information" data-toggle="tab">Information</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>
                    </div>
                    <div class="tab-pane" id="reviews">
                        <p> Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi Lorem ipsum dolor sit amet, consectetur adipiscing elit. ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>
                    </div>
                    <div class="tab-pane" id="information">
                        <p> Cras neque metus, consequat et blandit et, luctus a nunc.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--End tab-->

        <!--Tabs product-->
        <div class="container">
            <div class="box-shadow">

                <!--Tabs header-->
                <div class="tz-tabs-header">
                    <h2 class="tz-tabs-title pull-left">Widget Products</h2>
                   
                </div>
                <!--End tab header-->

                <!--Tab content-->
                <div class="tab-content">

                    <!--Tab item-->
                    <div class="tab-pane active" id="one_read">
                        <div class="row row-item">
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product4.png" alt="product 4" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">Propel Advanced SL 0</a></h4>
                                        <span class="product-price">$900.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->
                            </div>
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product5.jpg" alt="product 2" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">Defy Advanced SL</a></h4>
                                        <span class="product-price">$1,770.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->

                            </div>
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product6.jpg" alt="product 3" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">FastRoad CoMax</a></h4>
                                        <span class="product-price">$900.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->

                            </div>
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product7.jpg" alt="product 4" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">Propel Advanced SL 0</a></h4>
                                        <span class="product-price">$900.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->

                            </div>
                        </div>
                    </div>
                    <!--End tab item-->

                    <!--Tab item-->
                    <div class="tab-pane" id="x_road">
                        <div class="row row-item">
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product5.jpg" alt="product 2" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">Defy Advanced SL</a></h4>
                                        <span class="product-price">$1,770.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->

                            </div>
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product4.png" alt="product 4" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">Propel Advanced SL 0</a></h4>
                                        <span class="product-price">$900.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->

                            </div>
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product6.jpg" alt="product 3" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">FastRoad CoMax</a></h4>
                                        <span class="product-price">$900.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->

                            </div>
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product7.jpg" alt="product 4" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">Propel Advanced SL 0</a></h4>
                                        <span class="product-price">$900.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->

                            </div>
                        </div>
                    </div>
                    <!--End tab item-->

                    <!--Tab item-->
                    <div class="tab-pane" id="off_road">
                        <div class="row row-item">
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product7.jpg" alt="product 4" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">Propel Advanced SL 0</a></h4>
                                        <span class="product-price">$900.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->

                            </div>
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product4.png" alt="product 4" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">Propel Advanced SL 0</a></h4>
                                        <span class="product-price">$900.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->

                            </div>
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product5.jpg" alt="product 2" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">Defy Advanced SL</a></h4>
                                        <span class="product-price">$1,770.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->

                            </div>
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product6.jpg" alt="product 3" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">FastRoad CoMax</a></h4>
                                        <span class="product-price">$900.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->

                            </div>
                        </div>
                    </div>
                    <!--End tab item-->

                    <!--Tab item-->
                    <div class="tab-pane" id="bmx">
                        <div class="row row-item">
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product6.jpg" alt="product 3" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">FastRoad CoMax</a></h4>
                                        <span class="product-price">$900.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->

                            </div>
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product4.png" alt="product 4" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">Propel Advanced SL 0</a></h4>
                                        <span class="product-price">$900.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->

                            </div>
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product5.jpg" alt="product 2" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">Defy Advanced SL</a></h4>
                                        <span class="product-price">$1,770.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->

                            </div>
                            <div class="col-md-3 col-sm-6">

                                <!--Start product item-->
                                <div class="product-item">
                                    <div class="product-thubnail">
                                        <img src="<?=base_url()?>assets/images/product/product7.jpg" alt="product 4" />
                                        <div class="product-meta">
                                            <a class="add-to-cart" href="shop-cart.html">Add to cart</a>
                                            <span class="quick-view">
                                                <a href="#">Quick view</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-infomation">
                                        <h4><a href="single-product.html">Propel Advanced SL 0</a></h4>
                                        <span class="product-price">$900.00</span>
                                        <span class="product-attr">
                                            <i class="fa fa-circle light-blue"></i>
                                            <i class="fa fa-circle orange"></i>
                                            <i class="fa fa-circle blueviolet"></i>
                                            <i class="fa fa-circle orange-dark"></i>
                                            <i class="fa fa-circle steelblue"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--End product item-->

                            </div>
                        </div>
                    </div>
                    <!--End tab item-->

                </div>
                <!--End tab content-->

            </div>
        </div>
        <!--End tabs-->

        <!--Start partners-->
        <?php include 'application/views/layout/partner.php' ?>
        <!--End partners-->
    </section>
    <!--End Shop single-->

    <!--Start Footer-->
    <?php include 'application/views/layout/footer.php' ?>
    <!--End Footer-->

</div><!--End class site-->

<?php include 'application/views/layout/jspack.php' ?>

</body>
</html>