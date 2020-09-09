<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layout/head.php' ?>
<body>
    <!--Start class site-->
    <div class="tz-site">

    <!--Start id tz header-->
    <?php include 'application/views/layout/header.php' ?>
    <!--End id tz header-->

    <!--Start shop-->
    <div class="tz-shop">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!--Start for shop sidebar-->
                    <div class="tz-shop-sidebar">
                        <aside class="widget widget_product_categories">
                            <h3 class="widget-title">Bikes product</h3>
                            <ul class="product-categories">
                                <li>
                                    <a href="shop.html">On-Road</a>
                                </li>
                                <li class="cat-parent">
                                    <a href="shop.html">X-Road</a>
                                    <ul class="children">
                                        <li>
                                            <a href="shop.html">Aero Race <span>(3)</span></a>
                                        </li>
                                        <li>
                                            <a href="shop.html">City <span>(3)</span></a>
                                        </li>
                                        <li>
                                            <a href="shop.html">Comfort<span>(1)</span></a>
                                        </li>
                                        <li>
                                            <a href="shop.html">Cruiser<span>(1)</span></a>
                                        </li>
                                        <li>
                                            <a href="shop.html">Endurance <span>(4)</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="shop.html">Off-Road</a>
                                </li>
                                <li>
                                    <a href="shop.html">BMX</a>
                                </li>
                            </ul>
                        </aside>
                        <aside class="product-catlog widget">
                            <h3 class="widget-title">Catalog</h3>
                            <div class="widget_price_filter">
                                <h4 class="widget-title-children">
                                    Price Filter
                                </h4>
                                <form>
                                    <div id="slider-range"></div>
                                    <div class="price_label">
                                        <button type="submit" class="button">Filter</button>
                                        <span class="value-price">
                                            <span class="from"></span>
                                             -
                                            <span class="to"></span>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="widget_color_filter">
                                <h4 class="widget-title-children">
                                    Color filter
                                </h4>
                                <ul>
                                    <li>
                                        <a href="shop.html" class="light-blue"></a>
                                    </li>
                                    <li>
                                        <a href="shop.html" class="orange"></a>
                                    </li>
                                    <li>
                                        <a href="shop.html" class="blueviolet"></a>
                                    </li>
                                    <li>
                                        <a href="shop.html" class="orange-dark"></a>
                                    </li>
                                    <li>
                                        <a href="shop.html" class="steelblue"></a>
                                    </li>
                                    <li>
                                        <a href="shop.html" class="red-light"></a>
                                    </li>
                                    <li>
                                        <a href="shop.html" class="cyan-dark"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-size-filter">
                                <h4 class="widget-title-children">
                                    Size Filter
                                </h4>
                                <ul>
                                    <li>
                                        <a href="shop.html">S - Small  <span>(24)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html">M - Medium  <span>(18)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html">L - Large <span>(9)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html"> XL - Extra Large <span>(39)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html">xtra Extra Large  <span>(24)</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-size-filter">
                                <h4 class="widget-title-children">
                                    Brand Filter
                                </h4>
                                <ul>
                                    <li>
                                        <a href="shop.html">S - Small  <span>(24)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html">M - Medium  <span>(18)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html">L - Large <span>(9)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html"> XL - Extra Large <span>(39)</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.html">xtra Extra Large  <span>(24)</span></a>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                       
                    </div>
                    <!--End shop sidebar-->

                </div>

                <div class="col-md-9">

                    <!--Start shop content-->
                    <div class="tz-shop-content">
                        <!-- <ul class="tz-breadcrumbs">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li class="current">
                                Category
                            </li>
                        </ul> -->
                        <!-- <div class="shop-banner">
                            <img src="<?=base_url()?>assets/images/product/banner.jpg" alt="banner">
                        </div> -->
                        <div class="catalog-meta">
                            <div class="catalog_top">
                                <span class="style-switch">
                                    <a class="nav-grid-view fa fa-th-large active"></a>
                                    <a class="nav-list-view fa fa-list"></a>
                                </span>
                                <form class="shop-order">
                                    <label class="form-arrow">
                                        <select class="number-item" name="number_item">
                                            <option value="12">12 items/page</option>
                                            <option value="6">6 items/page</option>
                                            <option value="3">3 items/page</option>
                                        </select>
                                    </label>
                                    <label class="form-arrow">
                                        <select name="orderby" class="orderby">
                                            <option value="'">Sort By: Position</option>
                                            <option value="rating">Sort by rating</option>
                                            <option value="date">Sort by newness</option>
                                        </select>
                                    </label>
                                </form>
                            </div>
                        </div>

                        <div class="tz-product row grid-eff">

                            <!--Product item-->
                            <div class="product-item col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="product-item-inner">
                                        <div class="product-thumb">
                                            <img src="<?=base_url()?>assets/images/product/shop1.jpg" alt="Liv Race Day Short Finger..">
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop.html">Liv Race Day Short Finger..</a></h4>
                                            <span class="p-meta">
                                                <span class="p-price">$30.00</span>
                                                <span class="p-vote">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </span>
                                            </span>
                                            <span class="p-color">
                                                 <i class="fa fa-circle light-blue"></i>
                                                <i class="fa fa-circle orange"></i>
                                                <i class="fa fa-circle blueviolet"></i>
                                                <i class="fa fa-circle orange-dark"></i>
                                                <i class="fa fa-circle steelblue"></i>
                                            </span>
                                                <p>
                                                    Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                                </p>
                                            <span class="p-mask">
                                                <a href="shop-cart.html" class="add-to-cart">Add to cart</a>
                                                <a href="#" class="add-to-wishlist"><i class="fa fa-heart"></i> Add to wishlist</a>
                                               <span class="quick-view">
                                                    <a href="#"><i class="fa fa-eye"></i> Quick view</a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End product item-->

                            <!--Product item-->
                            <div class="product-item col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="product-item-inner">
                                        <div class="product-thumb">
                                            <img src="<?=base_url()?>assets/images/product/shop2.jpg" alt="Team Hoody">
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop.html">Team Hoody</a></h4>
                                            <span class="p-meta">
                                                <span class="p-price">$105.00</span>
                                                <span class="p-vote">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </span>
                                            </span>
                                            <span class="p-color">
                                                <i class="fa fa-circle steelblue"></i>
                                                <i class="fa fa-circle light-blue"></i>
                                                <i class="fa fa-circle orange"></i>
                                                <i class="fa fa-circle blueviolet"></i>
                                                <i class="fa fa-circle orange-dark"></i>
                                            </span>
                                                <p>
                                                    Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                                </p>
                                            <span class="p-mask">
                                                <a href="shop-cart.html" class="add-to-cart">Add to cart</a>
                                                <a href="#" class="add-to-wishlist"><i class="fa fa-heart"></i> Add to wishlist</a>
                                               <span class="quick-view">
                                                    <a href="#"><i class="fa fa-eye"></i> Quick view</a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End product item-->

                            <!--Product item-->
                            <div class="product-item col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="product-item-inner">
                                        <div class="product-thumb">
                                            <img src="<?=base_url()?>assets/images/product/shop3.jpg" alt="Team Hoody">
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop.html">Defy Advanced</a></h4>
                                            <span class="p-meta">
                                                <span class="p-price">$2650.00</span>
                                                <span class="p-vote">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </span>
                                            </span>
                                            <span class="p-color">
                                                <i class="fa fa-circle steelblue"></i>
                                                <i class="fa fa-circle light-blue"></i>
                                                <i class="fa fa-circle orange"></i>
                                                <i class="fa fa-circle blueviolet"></i>
                                                <i class="fa fa-circle orange-dark"></i>
                                            </span>
                                                <p>
                                                    Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                                </p>
                                            <span class="p-mask">
                                                <a href="shop-cart.html" class="add-to-cart">Add to cart</a>
                                                <a href="#" class="add-to-wishlist"><i class="fa fa-heart"></i> Add to wishlist</a>
                                               <span class="quick-view">
                                                    <a href="#"><i class="fa fa-eye"></i> Quick view</a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End product item-->

                            <!--Product item-->
                            <div class="product-item col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="product-item-inner">
                                        <div class="product-thumb">
                                            <img src="<?=base_url()?>assets/images/product/shop4.jpg" alt="Team Hoody">
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop.html">Defy Advanced 2</a></h4>
                                            <span class="p-meta">
                                                <span class="p-price">$2125.00</span>
                                                <span class="p-vote">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </span>
                                            </span>
                                            <span class="p-color">
                                                <i class="fa fa-circle orange"></i>
                                                <i class="fa fa-circle steelblue"></i>
                                                <i class="fa fa-circle light-blue"></i>
                                                <i class="fa fa-circle blueviolet"></i>
                                                <i class="fa fa-circle orange-dark"></i>
                                            </span>
                                                <p>
                                                    Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                                </p>
                                            <span class="p-mask">
                                                <a href="shop-cart.html" class="add-to-cart">Add to cart</a>
                                                <a href="#" class="add-to-wishlist"><i class="fa fa-heart"></i> Add to wishlist</a>
                                               <span class="quick-view">
                                                    <a href="#"><i class="fa fa-eye"></i> Quick view</a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End product item-->

                            <!--Product item-->
                            <div class="product-item col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="product-item-inner">
                                        <div class="product-thumb">
                                            <img src="<?=base_url()?>assets/images/product/shop5.jpg" alt="Team Hoody">
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop.html">City Pedals Sport</a></h4>
                                            <span class="p-meta">
                                                <span class="p-price">$18.00</span>
                                                <span class="p-vote">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </span>
                                            </span>
                                            <span class="p-color">
                                                <i class="fa fa-circle orange"></i>
                                                <i class="fa fa-circle steelblue"></i>
                                                <i class="fa fa-circle light-blue"></i>
                                                <i class="fa fa-circle blueviolet"></i>
                                                <i class="fa fa-circle orange-dark"></i>
                                            </span>
                                                <p>
                                                    Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                                </p>
                                            <span class="p-mask">
                                                <a href="shop-cart.html" class="add-to-cart">Add to cart</a>
                                                <a href="#" class="add-to-wishlist"><i class="fa fa-heart"></i> Add to wishlist</a>
                                               <span class="quick-view">
                                                    <a href="#"><i class="fa fa-eye"></i> Quick view</a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End product item-->

                            <!--Product item-->
                            <div class="product-item col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="product-item-inner">
                                        <div class="product-thumb">
                                            <img src="<?=base_url()?>assets/images/product/shop6.jpg" alt="Neos Ant+ Wireless">
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop.html">Neos Ant+ Wireless</a></h4>
                                            <span class="p-meta">
                                                <span class="p-price">$70.00</span>
                                                <span class="p-vote">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </span>
                                            </span>
                                            <span class="p-color">
                                                <i class="fa fa-circle orange"></i>
                                                <i class="fa fa-circle steelblue"></i>
                                                <i class="fa fa-circle light-blue"></i>
                                                <i class="fa fa-circle blueviolet"></i>
                                                <i class="fa fa-circle orange-dark"></i>
                                            </span>
                                                <p>
                                                    Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                                </p>
                                            <span class="p-mask">
                                                <a href="shop-cart.html" class="add-to-cart">Add to cart</a>
                                                <a href="#" class="add-to-wishlist"><i class="fa fa-heart"></i> Add to wishlist</a>
                                               <span class="quick-view">
                                                    <a href="#"><i class="fa fa-eye"></i> Quick view</a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End product item-->

                            <!--Product item-->
                            <div class="product-item col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="product-item-inner">
                                        <div class="product-thumb">
                                            <img src="<?=base_url()?>assets/images/product/shop7.jpg" alt="Neos Ant+ Wireless">
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop.html">Rack-It Tour Rack</a></h4>
                                            <span class="p-meta">
                                                <span class="p-price">$480.00</span>
                                                <span class="p-vote">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </span>
                                            </span>
                                            <span class="p-color">
                                                <i class="fa fa-circle orange"></i>
                                                <i class="fa fa-circle steelblue"></i>
                                                <i class="fa fa-circle light-blue"></i>
                                                <i class="fa fa-circle blueviolet"></i>
                                                <i class="fa fa-circle orange-dark"></i>
                                            </span>
                                            <p>
                                                Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                            </p>
                                            <span class="p-mask">
                                                <a href="shop-cart.html" class="add-to-cart">Add to cart</a>
                                                <a href="#" class="add-to-wishlist"><i class="fa fa-heart"></i> Add to wishlist</a>
                                               <span class="quick-view">
                                                    <a href="#"><i class="fa fa-eye"></i> Quick view</a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End product item-->

                            <!--Product item-->
                            <div class="product-item col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="product-item-inner">
                                        <div class="product-thumb">
                                            <img src="<?=base_url()?>assets/images/product/shop8.jpg" alt="Lust Advanced">
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop.html">Lust Advanced</a></h4>
                                            <span class="p-meta">
                                                <span class="p-price">$8050.00</span>
                                                <span class="p-vote">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </span>
                                            </span>
                                            <span class="p-color">
                                                <i class="fa fa-circle orange"></i>
                                                <i class="fa fa-circle steelblue"></i>
                                                <i class="fa fa-circle light-blue"></i>
                                                <i class="fa fa-circle blueviolet"></i>
                                                <i class="fa fa-circle orange-dark"></i>
                                            </span>
                                            <p>
                                                Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                            </p>
                                            <span class="p-mask">
                                                <a href="shop-cart.html" class="add-to-cart">Add to cart</a>
                                                <a href="#" class="add-to-wishlist"><i class="fa fa-heart"></i> Add to wishlist</a>
                                               <span class="quick-view">
                                                    <a href="#"><i class="fa fa-eye"></i> Quick view</a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End product item-->

                            <!--Product item-->
                            <div class="product-item col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="product-item-inner">
                                        <div class="product-thumb">
                                            <img src="<?=base_url()?>assets/images/product/shop9.jpg" alt="Cruiser Bells">
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop.html">Cruiser Bells</a></h4>
                                            <span class="p-meta">
                                                <span class="p-price">$10.00</span>
                                                <span class="p-vote">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </span>
                                            </span>
                                            <span class="p-color">
                                                <i class="fa fa-circle orange"></i>
                                                <i class="fa fa-circle steelblue"></i>
                                                <i class="fa fa-circle light-blue"></i>
                                                <i class="fa fa-circle blueviolet"></i>
                                                <i class="fa fa-circle orange-dark"></i>
                                            </span>
                                            <p>
                                                Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                            </p>
                                            <span class="p-mask">
                                                <a href="shop-cart.html" class="add-to-cart">Add to cart</a>
                                                <a href="#" class="add-to-wishlist"><i class="fa fa-heart"></i> Add to wishlist</a>
                                               <span class="quick-view">
                                                    <a href="#"><i class="fa fa-eye"></i> Quick view</a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End product item-->

                            <!--Product item-->
                            <div class="product-item col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="product-item-inner">
                                        <div class="product-thumb">
                                            <img src="<?=base_url()?>assets/images/product/shop10.jpg" alt="GFR">
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop.html">GFR F/W</a></h4>
                                            <span class="p-meta">
                                                <span class="p-price">$270.00</span>
                                                <span class="p-vote">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </span>
                                            </span>
                                            <span class="p-color">
                                                <i class="fa fa-circle orange"></i>
                                                <i class="fa fa-circle steelblue"></i>
                                                <i class="fa fa-circle light-blue"></i>
                                                <i class="fa fa-circle blueviolet"></i>
                                                <i class="fa fa-circle orange-dark"></i>
                                            </span>
                                            <p>
                                                Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                            </p>
                                            <span class="p-mask">
                                                <a href="shop-cart.html" class="add-to-cart">Add to cart</a>
                                                <a href="#" class="add-to-wishlist"><i class="fa fa-heart"></i> Add to wishlist</a>
                                               <span class="quick-view">
                                                    <a href="#"><i class="fa fa-eye"></i> Quick view</a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End product item-->

                            <!--Product item-->
                            <div class="product-item col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="product-item-inner">
                                        <div class="product-thumb">
                                            <img src="<?=base_url()?>assets/images/product/shop11.jpg" alt="Race Day Tri Suit">
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop.html">Race Day Tri Suit</a></h4>
                                            <span class="p-meta">
                                                <span class="p-price">$270.00</span>
                                                <span class="p-vote">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </span>
                                            </span>
                                            <span class="p-color">
                                                <i class="fa fa-circle orange"></i>
                                                <i class="fa fa-circle steelblue"></i>
                                                <i class="fa fa-circle light-blue"></i>
                                                <i class="fa fa-circle blueviolet"></i>
                                                <i class="fa fa-circle orange-dark"></i>
                                            </span>
                                            <p>
                                                Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                            </p>
                                            <span class="p-mask">
                                                <a href="shop-cart.html" class="add-to-cart">Add to cart</a>
                                                <a href="#" class="add-to-wishlist"><i class="fa fa-heart"></i> Add to wishlist</a>
                                               <span class="quick-view">
                                                    <a href="#"><i class="fa fa-eye"></i> Quick view</a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End product item-->

                            <!--Product item-->
                            <div class="product-item col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="product-item-inner">
                                        <div class="product-thumb">
                                            <img src="<?=base_url()?>assets/images/product/shop12.jpg" alt="Gloss">
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop.html">Gloss</a></h4>
                                            <span class="p-meta">
                                                <span class="p-price">$325.00</span>
                                                <span class="p-vote">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </span>
                                            </span>
                                            <span class="p-color">
                                                <i class="fa fa-circle orange"></i>
                                                <i class="fa fa-circle steelblue"></i>
                                                <i class="fa fa-circle light-blue"></i>
                                                <i class="fa fa-circle blueviolet"></i>
                                                <i class="fa fa-circle orange-dark"></i>
                                            </span>
                                            <p>
                                                Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                            </p>
                                            <span class="p-mask">
                                                <a href="shop-cart.html" class="add-to-cart">Add to cart</a>
                                                <a href="#" class="add-to-wishlist"><i class="fa fa-heart"></i> Add to wishlist</a>
                                               <span class="quick-view">
                                                    <a href="#"><i class="fa fa-eye"></i> Quick view</a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End product item-->

                        </div>

                        <nav class="pagination">
                            <ul class="pagination_list pull-right">
                                <li>
                                    <a href="shop.html">1</a>
                                </li>
                                <li>
                                    <span class="current">2</span>
                                </li>
                                <li>
                                    <a href="shop.html">3</a>
                                </li>
                                <li>
                                    <a href="shop.html">4</a>
                                </li>
                                <li>
                                    <a href="shop.html">5</a>
                                </li>
                                <li>
                                    <span>...</span>
                                </li>
                                <li>
                                    <a href="shop.html">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!--End shop content-->
                </div>
            </div>
        </div>
    </div>
    <!--End Shop-->

    <!--Start Footer-->
    <!--Start Footer-->
        <!-- FOOTER -->
		<?php include 'application/views/layout/footer.php' ?>
		<!-- /FOOTER -->
        <!--End Footer-->

    </div>
    <!--End class site-->

		<!-- jQuery Plugins -->
		<?php include 'application/views/layout/jspack.php' ?>
<script>
    jQuery(function() {
        jQuery( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
            slide: function( event, ui ) {
                jQuery('.from').text('$' + ui.values[ 0 ]);
                jQuery('.to').text('$' + ui.values[ 1 ]);
            }
        });
        jQuery('.from').text('$' + jQuery( "#slider-range" ).slider( "values", 0 ));
        jQuery('.to').text('$' + jQuery( "#slider-range" ).slider( "values", 1 ));
    });
</script>
</body>
</html>