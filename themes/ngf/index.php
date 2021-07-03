<?php 
get_header(); 
$thisID = get_option('page_for_posts');
$intro = get_field('intro', $thisID);
$page_title = !empty($intro['titel']) ? $intro['titel'] : get_the_title($thisID);
?>
<section class="page-banner d-none">
  <span class="page-bnr-skew"></span>
  <span class="hdr-circle-icon"></span>
  <div class="hdr-socials">
    <span class="hdr-lft-line-icon">
      <i><svg class="hdr-line-icon" width="58" height="95" viewBox="0 0 58 95" fill="#FFA800">
      <use xlink:href="#hdr-line-icon"></use> </svg></i>
    </span>
    <ul class="reset-list">
      <li>
        <a target="_blank" href="#">
          <i><svg class="facebook-icon" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
            <use xlink:href="#facebook-icon"></use> </svg>
          </i>
        </a>
      </li>
      <li>
        <a target="_blank" href="#">
          <i><svg class="twiter-icon" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
            <use xlink:href="#twiter-icon"></use> </svg>
          </i>
        </a>
      </li>
      <li>
        <a target="_blank" href="#">
          <i><svg class="linkden-icon" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
            <use xlink:href="#linkden-icon"></use> </svg>
          </i>
        </a>
      </li>
      <li>
        <a target="_blank" href="#">
          <i><svg class="instagram-icon" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
            <use xlink:href="#instagram-icon"></use> </svg>
          </i>
        </a>
      </li>
    </ul>
  </div>
  <div class="page-bnr-bg inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/has-transparent-bnr-img-002.jpg');"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-bnr-desc-cntlr">
          <div class="page-bnr-desc">
            <span class="pg-bnr-desc-line"></span>
            <span class="pg-bnr-desc-circle"></span>
            <h1 class="fl-h1-80 pg-bnr-title">Eu ac urna<br> vel, sagittis<br> enim Quis.</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="sec-heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="sec-header">
          <h1 class="fl-h1 sec-title"><?php echo $page_title; ?></h1>
        </div>
        <div class="fl-grid-category">
          <ul class="clearfix reset-list">
            <li class="active"><a href="#">alle</a></li>
            <li><a href="#">categorie</a></li>
            <li><a href="#">categorie</a></li>
            <li><a href="#">categorie</a></li>
          </ul>
        </div> 
      </div>
    </div>
  </div>
</section>

<section class="blog-page-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">         
        <div class="blog-grids-cntrl">
          <div class="blog-grid-items">
            <ul class="clearfix reset-list">
              <li>                
                <div class="blog-grid-item">                
                  <div class="blog-grid-img">                    
                    <a href="#" class="overlay-link"></a>
                    <div class="bgi-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/coach-fl-grid-img-01.jpg');">                  
                    </div>
                  </div>  
                  <div class="fl-grid-tag">
                    <span>CATEGORIE</span>  
                  </div>
                  <div class="blog-grid-des mHc">
                    <div class="blog-grid-des-inner">                                     
                      <h4 class="fl-h4 bgi-title mHc1"><a href="#">Pellentesque tempus posuere urna tortor, sed. Lobortis.</a></h4>                      
                      <div class="bgi-des mHc2">
                        <p>Est in risus tempus egestas ut vitae lorem. Vel et elementum ultrices mauris dui auctor elit tellus vel. Nec donec a.</p>
                      </div>    
                      <div class="fl-pro-grd-btn fl-btn-absolute">
                        <a class="fl-read-more-btn" href="#">
                          <span>READ MORE</span>
                          <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                          <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                          </i>
                        </a>
                      </div>
                    </div>   
                  </div>    
                </div>  
              </li>
              <li>                
                <div class="blog-grid-item">                
                  <div class="blog-grid-img">                    
                    <a href="#" class="overlay-link"></a>
                    <div class="bgi-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/coach-fl-grid-img-01.jpg');">                  
                    </div>
                  </div>  
                  <div class="fl-grid-tag">
                    <span>CATEGORIE</span>  
                  </div>
                  <div class="blog-grid-des mHc">
                    <div class="blog-grid-des-inner">                                     
                      <h4 class="fl-h4 bgi-title mHc1"><a href="#">Pellentesque tempus posuere urna tortor, sed. Lobortis.</a></h4>                      
                      <div class="bgi-des mHc2">
                        <p>Est in risus tempus egestas ut vitae lorem. Vel et elementum ultrices mauris dui auctor elit tellus vel. Nec donec a.</p>
                      </div>    
                      <div class="fl-pro-grd-btn fl-btn-absolute">
                        <a class="fl-read-more-btn" href="#">
                          <span>READ MORE</span>
                          <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                          <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                          </i>
                        </a>
                      </div>
                    </div>   
                  </div>    
                </div>  
              </li>
              <li>                
                <div class="blog-grid-item">                
                  <div class="blog-grid-img">                    
                    <a href="#" class="overlay-link"></a>
                    <div class="bgi-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/coach-fl-grid-img-01.jpg');">                  
                    </div>
                  </div>  
                  <div class="fl-grid-tag">
                    <span>CATEGORIE</span>  
                  </div>
                  <div class="blog-grid-des mHc">
                    <div class="blog-grid-des-inner">                                     
                      <h4 class="fl-h4 bgi-title mHc1"><a href="#">Pellentesque tempus posuere urna tortor, sed. Lobortis.</a></h4>                      
                      <div class="bgi-des mHc2">
                        <p>Est in risus tempus egestas ut vitae lorem. Vel et elementum ultrices mauris dui auctor elit tellus vel. Nec donec a.</p>
                      </div>    
                      <div class="fl-pro-grd-btn fl-btn-absolute">
                        <a class="fl-read-more-btn" href="#">
                          <span>READ MORE</span>
                          <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                          <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                          </i>
                        </a>
                      </div>
                    </div>   
                  </div>    
                </div>  
              </li>
              <li>                
                <div class="blog-grid-item">                
                  <div class="blog-grid-img">                    
                    <a href="#" class="overlay-link"></a>
                    <div class="bgi-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/coach-fl-grid-img-01.jpg');">                  
                    </div>
                  </div>  
                  <div class="fl-grid-tag">
                    <span>CATEGORIE</span>  
                  </div>
                  <div class="blog-grid-des mHc">
                    <div class="blog-grid-des-inner">                                     
                      <h4 class="fl-h4 bgi-title mHc1"><a href="#">Pellentesque tempus posuere urna tortor, sed. Lobortis.</a></h4>                      
                      <div class="bgi-des mHc2">
                        <p>Est in risus tempus egestas ut vitae lorem. Vel et elementum ultrices mauris dui auctor elit tellus vel. Nec donec a.</p>
                      </div>    
                      <div class="fl-pro-grd-btn fl-btn-absolute">
                        <a class="fl-read-more-btn" href="#">
                          <span>READ MORE</span>
                          <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                          <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                          </i>
                        </a>
                      </div>
                    </div>   
                  </div>    
                </div>  
              </li>
              <li>                
                <div class="blog-grid-item">                
                  <div class="blog-grid-img">                    
                    <a href="#" class="overlay-link"></a>
                    <div class="bgi-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/coach-fl-grid-img-01.jpg');">                  
                    </div>
                  </div>  
                  <div class="fl-grid-tag">
                    <span>CATEGORIE</span>  
                  </div>
                  <div class="blog-grid-des mHc">
                    <div class="blog-grid-des-inner">                                     
                      <h4 class="fl-h4 bgi-title mHc1"><a href="#">Pellentesque tempus posuere urna tortor, sed. Lobortis.</a></h4>                      
                      <div class="bgi-des mHc2">
                        <p>Est in risus tempus egestas ut vitae lorem. Vel et elementum ultrices mauris dui auctor elit tellus vel. Nec donec a.</p>
                      </div>    
                      <div class="fl-pro-grd-btn fl-btn-absolute">
                        <a class="fl-read-more-btn" href="#">
                          <span>READ MORE</span>
                          <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                          <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                          </i>
                        </a>
                      </div>
                    </div>   
                  </div>    
                </div>  
              </li>
              <li>                
                <div class="blog-grid-item">                
                  <div class="blog-grid-img">                    
                    <a href="#" class="overlay-link"></a>
                    <div class="bgi-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/coach-fl-grid-img-01.jpg');">                  
                    </div>
                  </div>  
                  <div class="fl-grid-tag">
                    <span>CATEGORIE</span>  
                  </div>
                  <div class="blog-grid-des mHc">
                    <div class="blog-grid-des-inner">                                     
                      <h4 class="fl-h4 bgi-title mHc1"><a href="#">Pellentesque tempus posuere urna tortor, sed. Lobortis.</a></h4>                      
                      <div class="bgi-des mHc2">
                        <p>Est in risus tempus egestas ut vitae lorem. Vel et elementum ultrices mauris dui auctor elit tellus vel. Nec donec a.</p>
                      </div>    
                      <div class="fl-pro-grd-btn fl-btn-absolute">
                        <a class="fl-read-more-btn" href="#">
                          <span>READ MORE</span>
                          <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                          <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                          </i>
                        </a>
                      </div>
                    </div>   
                  </div>    
                </div>  
              </li>              
            </ul>    
          </div>
          <div class="fl-pagination-blog-cntrl">
            <div class="fl-pagination-ctlr">
              <ul class="page-numbers">
                <li><a class="prev page-numbers" href="#">←</a></li>
                <li><span aria-current="page" class="page-numbers current">1</span></li>
                <li><a class="page-numbers" href="#">2</a></li>
                <li><a class="page-numbers" href="#">3</a></li>
                <li><a class="page-numbers" href="#">4</a></li>
                <li><a class="next page-numbers" href="#">→</a></li>
              </ul>
            </div>
          </div>  
        </div>
      </div>  
    </div>
  </div>
</section>
<?php get_footer(); ?>