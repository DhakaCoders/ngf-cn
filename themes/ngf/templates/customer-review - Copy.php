<?php 
  global $product;
  $client = get_field('clientoptions', $product->get_id());
  if(!empty($client)):
  $refobj = $client['selectclients'];
  if( empty($refobj) ){
      $refobj = get_posts( array(
        'post_type' => 'referenties',
        'posts_per_page'=> 3,
        'orderby' => 'date',
        'order'=> 'desc',

      ) );
      
  }
?>
<?php if($refobj){ ?>
<section class="pro-single-testimonial-slider-sec white-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="pro-single-testimonial-slider-cntlr">
          <div class="dfp-testimonial-module  pro-single-testimonial">
            <div class="testimonial-ctlr">
              <div class="sec-entry-hdr">
                <h3 class="fl-h3"><?php echo !empty($client['titel'])? $client['titel']:__('client options', 'ngf'); ?></h3>
              </div>
              <div class="testimonial-grds dfpTestimonialSlider">
                <?php 
                  foreach( $refobj as $ref ) {
                  global $post;
                  $imgID = get_post_thumbnail_id($ref->ID);
                  $imgtag = !empty($imgID)? cbv_get_image_tag($imgID): ''; 
                  $name = get_field('naam', $ref->ID);
                ?>
                <div class="testimonial-grd-item">
                  <div class="testimonial-grd-item-inr  home-testimonial-grd-item-inr">
                    <div class="testimonial-grd-item-img">
                      <i><?php echo $imgtag; ?></i>
                    </div>
                    <div class="testimonial-grd-item-des">
                      <blockquote>
                        <?php echo wpautop($ref->post_excerpt); ?>
                        <?php if( !empty($name) ) printf('<strong>%s</strong>', $name); ?>
                      </blockquote>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
              <div class="testimonial-btn">
                <a class="fl-black-btn" href="<?php echo get_link_by_page_template('page-referenties.php'); ?>"><?php _e( 'other testimonials', 'ngf' ); ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<?php endif; ?>


<section class="related-product-sec" style="display:none">
  <span class="latest-news-bg hide-sm"><svg class="latest-nws-bg" width="484" height="727" viewBox="0 0 484 727" fill="#FFA800">
      <use xlink:href="#latest-nws-bg"></use> </svg>
  </span>
  <span class="latest-news-bg latest-nws-xs-bg show-sm">
    <svg class="latest-news-xs-bg" width="146" height="598" viewBox="0 0 146 598" fill="#FFA800">
      <use xlink:href="#latest-news-xs-bg"></use> </svg>
  </span>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="related-product-sec-cntlr">
          <div class="sec-entry-hdr">
            <h3 class="fl-h3">gerelateerd producten 1</h3>
          </div>
          <div class="related-product-sec-grids relatedProGrdsSlider">
            <div class="relatedProGrdsSlideItem">
              <div class="fl-product-grd mHc">
                <div class="fl-pro-tag">
                  <span>NiEuW</span>  
                </div>
                <div class="fl-product-grd-inr">
                  <div class="fl-pro-grd-img-cntlr">
                    <a href="#" class="overlay-link"></a>
                    <div class="fl-pro-grid-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?><?php echo THEME_URI; ?>/assets/images//pro-grid-img-01.jpg');"></div>
                  </div>
                  <div class="fl-pro-grd-des mHc1">
                    <h4 class="fl-h4 fl-pro-grd-title"><a href="#">Customized Training And Nutrition Plan</a></h4>
                    <div class="fl-pro-grd-price">
                      <span class="woocommerce-Price-amount amount">
                        <bdi><span class="woocommerce-Price-currencySymbol">€</span>90,00</bdi>
                      </span>                                                                  
                    </div>
                    <div class="fl-pro-grd-details">
                      <p>Est in risus tempus egestas ut vitae lorem. Vel et elementum ultrices mauris dui auctor elit tellus vel. Nec donec a.</p>
                      <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Suspendisse faucibus.</li>
                        <li>Tortor orci turpis nunc.</li>
                      </ul>
                    </div>
                    <div class="fl-pro-grd-btn">
                      <a class="fl-read-more-btn" href="#">
                        <span>READ MORE</span>
                        <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                        <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                        </i>
                      </a>
                    </div>
                  </div>
                  <div>
                    <a class="fl-black-btn fl-buy-now-btn" href="#">BUY NOW</a>
                  </div>                      
                </div>
              </div>
            </div>
            <div class="relatedProGrdsSlideItem">
              <div class="fl-product-grd mHc">
                <div class="fl-pro-tag">
                  <span>NiEuW</span>  
                </div>
                <div class="fl-product-grd-inr">
                  <div class="fl-pro-grd-img-cntlr">
                    <a href="#" class="overlay-link"></a>
                    <div class="fl-pro-grid-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?><?php echo THEME_URI; ?>/assets/images//pro-grid-img-01.jpg');"></div>
                  </div>
                  <div class="fl-pro-grd-des mHc1">
                    <h4 class="fl-h4 fl-pro-grd-title"><a href="#">Customized Training And Nutrition Plan</a></h4>
                    <div class="fl-pro-grd-price">
                      <span class="woocommerce-Price-amount amount">
                        <bdi><span class="woocommerce-Price-currencySymbol">€</span>90,00</bdi>
                      </span>                                                                  
                    </div>
                    <div class="fl-pro-grd-details">
                      <p>Est in risus tempus egestas ut vitae lorem. Vel et elementum ultrices mauris dui auctor elit tellus vel. Nec donec a.</p>
                      <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Suspendisse faucibus.</li>
                        <li>Tortor orci turpis nunc.</li>
                      </ul>
                    </div>
                    <div class="fl-pro-grd-btn">
                      <a class="fl-read-more-btn" href="#">
                        <span>READ MORE</span>
                        <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                        <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                        </i>
                      </a>
                    </div>
                  </div>
                  <div>
                    <a class="fl-black-btn fl-buy-now-btn" href="#">BUY NOW</a>
                  </div>                      
                </div>
              </div>
            </div>
            <div class="relatedProGrdsSlideItem">
              <div class="fl-product-grd mHc">
                <div class="fl-pro-tag">
                  <span>NiEuW</span>  
                </div>
                <div class="fl-product-grd-inr">
                  <div class="fl-pro-grd-img-cntlr">
                    <a href="#" class="overlay-link"></a>
                    <div class="fl-pro-grid-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?><?php echo THEME_URI; ?>/assets/images//pro-grid-img-01.jpg');"></div>
                  </div>
                  <div class="fl-pro-grd-des mHc1">
                    <h4 class="fl-h4 fl-pro-grd-title"><a href="#">Customized Training And Nutrition Plan</a></h4>
                    <div class="fl-pro-grd-price">
                      <span class="woocommerce-Price-amount amount">
                        <bdi><span class="woocommerce-Price-currencySymbol">€</span>90,00</bdi>
                      </span>                                                                  
                    </div>
                    <div class="fl-pro-grd-details">
                      <p>Est in risus tempus egestas ut vitae lorem. Vel et elementum ultrices mauris dui auctor elit tellus vel. Nec donec a.</p>
                      <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Suspendisse faucibus.</li>
                        <li>Tortor orci turpis nunc.</li>
                      </ul>
                    </div>
                    <div class="fl-pro-grd-btn">
                      <a class="fl-read-more-btn" href="#">
                        <span>READ MORE</span>
                        <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                        <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                        </i>
                      </a>
                    </div>
                  </div>
                  <div>
                    <a class="fl-black-btn fl-buy-now-btn" href="#">BUY NOW</a>
                  </div>                      
                </div>
              </div>
            </div>
            <div class="relatedProGrdsSlideItem">
              <div class="fl-product-grd mHc">
                <div class="fl-pro-tag">
                  <span>NiEuW</span>  
                </div>
                <div class="fl-product-grd-inr">
                  <div class="fl-pro-grd-img-cntlr">
                    <a href="#" class="overlay-link"></a>
                    <div class="fl-pro-grid-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?><?php echo THEME_URI; ?>/assets/images//pro-grid-img-01.jpg');"></div>
                  </div>
                  <div class="fl-pro-grd-des mHc1">
                    <h4 class="fl-h4 fl-pro-grd-title"><a href="#">Customized Training And Nutrition Plan</a></h4>
                    <div class="fl-pro-grd-price">
                      <span class="woocommerce-Price-amount amount">
                        <bdi><span class="woocommerce-Price-currencySymbol">€</span>90,00</bdi>
                      </span>                                                                  
                    </div>
                    <div class="fl-pro-grd-details">
                      <p>Est in risus tempus egestas ut vitae lorem. Vel et elementum ultrices mauris dui auctor elit tellus vel. Nec donec a.</p>
                      <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Suspendisse faucibus.</li>
                        <li>Tortor orci turpis nunc.</li>
                      </ul>
                    </div>
                    <div class="fl-pro-grd-btn">
                      <a class="fl-read-more-btn" href="#">
                        <span>READ MORE</span>
                        <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                        <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                        </i>
                      </a>
                    </div>
                  </div>
                  <div>
                    <a class="fl-black-btn fl-buy-now-btn" href="#">BUY NOW</a>
                  </div>                      
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


