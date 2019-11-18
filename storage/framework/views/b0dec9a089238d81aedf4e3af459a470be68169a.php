<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="description" content="Talentsaga - Connecting Talents">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <meta property="og:url" content="<?php echo e(request()->url()); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?php echo e(settings('brandname')); ?>">
    <meta property="og:title" content="<?php echo e(isset($title) ? $title : 'Talentsaga - Connecting Talents'); ?>" />
    <meta property="og:description" content="<?php echo e(isset($description) ? $description : 'Talentsaga - Connecting Talents'); ?>" />
    <meta property="og:image" content="<?php echo e($pageImage = isset($pageImage) ? $pageImage : asset('frontend/assets/img/apple-icon.png')); ?>" />
    <meta property="og:image:secure_url" content="<?php echo e($pageImage = isset($pageImage) ? $pageImage : asset('frontend/assets/img/apple-icon.png')); ?>" />
    <meta property="fb:app_id" content="<?php echo e(env('FB_CLIENT_ID', '')); ?>">

    <meta name="twitter:card" content="<?php echo e($pageImage ? 'summary' : 'summary'); ?>">
    <meta name="twitter:site" content="<?php echo e(request()->url()); ?>">
    <meta name="twitter:title" content="<?php echo e(isset($title) ? $title : 'Talentsaga - Connecting Talents'); ?>">
    <meta name="twitter:description" content="<?php echo e(isset($description) ? $description : 'Talentsaga - Connecting Talents'); ?>">
    <meta name="twitter:image" content="<?php echo e($pageImage = isset($pageImage) ? $pageImage : asset('frontend/assets/img/apple-icon.png')); ?>">  

    <link rel="apple-touch-icon" href="<?php echo e(asset('frontend/assets/img/apple-icon.png')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('frontend/assets/img/favicon.png')); ?>">

    <title><?php echo e(isset($pageTitle) && !empty($pageTitle) ? ($pageTitle . " | ") : ""); ?>Talentsaga - Connecting Talents</title>

    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/main.css?v=' . env('CSS_VERSION', 11))); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/custom.css?v=' . env('CSS_VERSION', 11))); ?>">
    <script src="<?php echo e(asset('frontend/assets/js/vendor/modernizr.min.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('css-style'); ?>
</head>
<body>
    <!--[if lt IE 9]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="sticky-footer-container">
        <div class="sticky-footer-container-item" style="height: 0;">

            <!-- Specific for home -->
            <header class="site-header <?php echo e(\Request::route()->getName() == 'frontend.home' ? 'site-header--home' : 'site-header--active'); ?>">
                <div class="container">
                    <div class="site-header-sections">
                        <div class="site-header-logo-area">
                            <a href="<?php echo e(route('frontend.home')); ?>"><h1 class="site-header-logo">Talent Saga</h1></a>

                            <div class="popup">
                                <button class="site-nav-btn popup-btn">
                                    <span class="fa fa-fw fa-th-large"></span>
                                    <span class="fa fa-angle-down"></span>
                                </button>

                                <div class="popup-content">
                                    <nav class="site-nav">
                                        <h2 class="site-nav-heading"><span class="sr-only">Site nav</span> <?php echo e(trans('label.home.categories')); ?></h2>

                                        <ul class="site-nav-list list-nostyle">
                                        <?php foreach(getTalentCategories() as $cat): ?>
                                            <li class="site-nav-list-item">
                                                <a class="site-nav-anchor" href="<?php echo e(route('talent.list', ['categorySlug' => $cat->slug])); ?>">
                                                    <img class="site-nav-icon" src="<?php echo e($cat->cover_image ? $cat->cover_image : asset('frontend/assets/img/site-logo.png')); ?>" alt="">
                                                    <span><?php echo e($cat->name__trans); ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <form class="site-header-search" action="<?php echo e(route('talent.search')); ?>" role="search" method="get">
                            <input class="site-header-search-input" type="text" name="keyword" placeholder="<?php echo e(trans('label.home.search')); ?>">
                            <button type="submit" class="site-header-search-btn">
                                <span class="fa fa-fw fa-search"></span>
                                <span class="sr-only">Search</span>
                            </button>
                        </form>
                        <div class="site-header-user-actions">
                            <button class="site-header-search-toggle">
                                <span class="fa fa-fw fa-search"></span>
                            </button>
                            <?php if(auth()->check()): ?>
                                <?php if(!auth()->user()->isProfileComplete()): ?>
                                    <a class="btn btn--outline btn--red cta-become-an-artist" href="<?php echo e(route('user.onboarding.personal')); ?>"><?php echo e(trans('label.menu.becomeanartist')); ?></a>
                                <?php endif; ?>
                                <div class="popup popup--right">
                                    <?php if(auth()->user()->picture): ?>
                                        <a class="popup-btn user-area-btn" href="#">
                                            <span class="fa fa-fw fa-user" style="background-image: url('<?php echo e(auth()->user()->picture_small_square); ?>'); background-size: cover; color: transparent;"></span>
                                            <span class="user-area-btn-name text-ellipsis">Hi, <?php echo e(ucwords(auth()->user()->username)); ?></span>
                                        </a>
                                    <?php else: ?>
                                        <a class="popup-btn user-area-btn" href="#">
                                            <span class="fa fa-fw fa-user"></span>
                                            <span class="user-area-btn-name text-ellipsis">Hi, <?php echo e(ucwords(auth()->user()->username)); ?></span>
                                        </a>
                                    <?php endif; ?>
                                    <div class="popup-content">
                                        <div class="user-area-menus">
                                            <a href="<?php echo e(route('user.myprofile')); ?>"><?php echo e(trans('label.menu.myprofile')); ?></a>
                                            <a href="<?php echo e(route('user.dashboard.account')); ?>"><?php echo e(trans('label.menu.account')); ?></a>
                                            <a href="<?php echo e(route('user.booking.list')); ?>"><?php echo e(trans('label.menu.booking')); ?></a>
                                            <a href="<?php echo e(route('user.booking.request')); ?>"><?php echo e(trans('label.menu.jobrequest')); ?></a>
                                            <a href="<?php echo e(route('sessions.logout')); ?>"><?php echo e(trans('label.menu.logout')); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="popup popup--right">
                                    <a class="btn btn--outline btn--black popup-btn site-header-login-btn" href="#">
                                        <span class="hidden-medium"><i class="fa fa-fw fa-sign-in"></i></span>
                                        <span class="hidden-small"><?php echo e(trans('label.menu.register')); ?> / <?php echo e(trans('label.menu.login')); ?></span>
                                    </a>
                                    <div class="popup-content">
                                        <?php echo Form::open(['route' => 'sessions.store', 'class' => 'form-popup-login']); ?>

                                            <div class="block-half">
                                                <label class="sr-only" for="inputUsername"><?php echo e(trans('label.login.email')); ?></label>
                                                <?php echo Form::email('email', null, ['id' => 'inputUsername', 'class'=>'form-input', 'required' => 'true', 'placeholder' => trans('label.login.email')]); ?>

                                            </div>
                                            <div class="block-half">
                                                <label class="sr-only" for="inputPassword"><?php echo e(trans('label.login.password')); ?></label>
                                                <?php echo Form::password('password', ['id' => 'inputPassword', 'class'=>'form-input', 'required' => 'true', 'placeholder' => trans('label.login.password')]); ?>

                                            </div>
                                            <div class="block-half v-center v-center--spread">
                                                <label for="rememberMe">
                                                    <input id="rememberMe" type="checkbox">
                                                    <small><?php echo e(trans('label.menu.rememberme')); ?></small>
                                                </label>

                                                <a href="<?php echo e(route('frontend.user.forgetpassword')); ?>"><small><?php echo e(trans('label.menu.forgotpassword')); ?>?</small></a>
                                            </div>
                                            <button class="btn btn--block btn--tosca" type="submit"><?php echo e(trans('label.menu.login')); ?></button>
                                        </form>

                                        <hr class="block-half">

                                        <a class="btn btn--block btn--outline btn--fb block-half" href="<?php echo e(route('sessions.auth', ['app' => 'facebook'])); ?>">
                                            <span class="fa fa-fw fa-facebook-official"></span>
                                            <?php echo e(trans('label.login.fblogin')); ?>

                                        </a>
                                        <a class="btn btn--block btn--outline btn--gplus block-half" href="<?php echo e(route('sessions.auth', ['app' => 'google'])); ?>">
                                            <span class="fa fa-fw fa-google-plus-official"></span>
                                            <?php echo e(trans('label.login.googlelogin')); ?>

                                        </a>

                                        <hr class="block-half">

                                        <div class="text-center"><small><?php echo e(trans('label.menu.donthaveaccount')); ?></small></div>
                                        <a class="btn btn--block btn--tosca btn--outline" href="<?php echo e(route('frontend.user.registration')); ?>"><?php echo e(trans('label.menu.register')); ?></a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </header>
            <!-- end specific for home -->

        </div>
        <div class="sticky-footer-container-item --pushed">
            <main class="site-main">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
        <div class="sticky-footer-container-item">
            <footer class="site-footer">
                <div class="container">
                    <div class="site-footer-sections">
                        <div class="site-footer-section">
                            <nav class="site-footer-nav">
                                <h3 class="site-footer-nav-heading"><?php echo e(trans('label.home.browsetalent')); ?></h3>

                                <ul class="site-footer-nav-list list-nostyle">
                                    <?php foreach(getTalentCategories() as $cat): ?>
                                        <li><a href="<?php echo e(route('talent.list', ['categorySlug' => $cat->slug])); ?>"><?php echo e($cat->name__trans); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </nav>
                        </div>

                        <?php if(auth()->check() && !auth()->user()->isProfileComplete()): ?>
                            <div class="site-footer-section">
                                <nav class="site-footer-nav">
                                    <h3 class="site-footer-nav-heading"><?php echo e(trans('label.menu.becomeanartist')); ?></h3>

                                    <ul class="site-footer-nav-list list-nostyle">
                                        <li><a href="<?php echo e(route('user.onboarding.personal')); ?>">Personal Data</a></li>
                                        <li><a href="<?php echo e(route('user.onboarding.talent')); ?>">Talent Description</a></li>
                                        <li><a href="<?php echo e(route('user.onboarding.portofolio')); ?>">Experience / Portofolio</a></li>
                                        <li><a href="<?php echo e(route('user.onboarding.gallery')); ?>">Gallery</a></li>
                                    </ul>
                                </nav>
                            </div>
                        <?php endif; ?>

                        <div class="site-footer-section">
                            <nav class="site-footer-nav">
                                <h3 class="site-footer-nav-heading"><?php echo e(trans('label.home.info')); ?></h3>

                                <ul class="site-footer-nav-list list-nostyle">
                                    <li><a href="<?php echo e(route('frontend.home.aboutus')); ?>"><?php echo e(trans('label.home.aboutus')); ?></a></li>
                                    <li><a href="<?php echo e(route('frontend.home.contactus')); ?>"><?php echo e(trans('label.home.contactus')); ?></a></li>
                                    <li><a href="<?php echo e(route('frontend.home.content.blog')); ?>"><?php echo e(trans('label.home.blog')); ?></a></li>
                                <?php if(!auth()->check()): ?>
                                    <li><a href="<?php echo e(route('sessions.login')); ?>"><?php echo e(trans('label.menu.register')); ?> / <?php echo e(trans('label.menu.login')); ?></a></li>
                                <?php endif; ?>
                                </ul>
                            </nav>
                        </div>

                        <div class="site-footer-section">
                            <nav class="site-footer-nav">
                                <h3 class="site-footer-nav-heading"><?php echo e(trans('label.home.support')); ?></h3>

                                <ul class="social-list list-nostyle">
                                <?php if(!empty(settings('facebook', ''))): ?>
                                    <li>
                                        <a href="<?php echo e(settings('facebook')); ?>">
                                            <span class="fa fa-fw fa-facebook-official"></span>
                                            <span class="sr-only">Facebook</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(!empty(settings('twitter', ''))): ?>
                                    <li>
                                        <a href="<?php echo e(settings('twitter')); ?>">
                                            <span class="fa fa-fw fa-twitter"></span>
                                            <span class="sr-only">Twitter</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(!empty(settings('youtube', ''))): ?>
                                    <li>
                                        <a href="<?php echo e(settings('youtube')); ?>">
                                            <span class="fa fa-fw fa-youtube"></span>
                                            <span class="sr-only">Youtube</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(!empty(settings('instagram', ''))): ?>
                                    <li>
                                        <a href="<?php echo e(settings('instagram')); ?>">
                                            <span class="fa fa-fw fa-instagram"></span>
                                            <span class="sr-only">Instagram</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                </ul>

                                <ul class="site-footer-support-navs list-nostyle">
                                    <li><a href="<?php echo e(route('frontend.home.terms')); ?>"><?php echo e(trans('label.home.terms')); ?></a></li>
                                    <li><a href="<?php echo e(route('frontend.home.privacy')); ?>"><?php echo e(trans('label.home.policy')); ?></a></li>
                                    <li><a href="<?php echo e(route('frontend.home.faq')); ?>"><?php echo e(trans('label.home.faq')); ?></a></li>
                                </ul>
                            </nav>

                            <p><small>&copy; 2017 TALENTSAGA</small></p>
                        </div>

                        <div class="site-footer-section">
                            <label class="site-footer-nav-heading" for="selectLanguage"><?php echo e(trans('label.home.language')); ?></label>
                            <select class="form-input" id="selectLanguage" onChange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="<?php echo e(request()->fullUrlWithQuery(['locale' => 'de'])); ?>" <?php if(app()->getLocale() == 'de'): ?> selected <?php endif; ?>>Deutsch</option>
                                <option value="<?php echo e(request()->fullUrlWithQuery(['locale' => 'en'])); ?>" <?php if(app()->getLocale() == 'en'): ?> selected <?php endif; ?>>English</option>
                            </select>

                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <div class="modal">
        <div class="modal-dialog">
            <button class="modal-dialog-close">&times;</button>
            <div class="modal-dialog-content"></div>
        </div>
    </div>

    <?php echo $__env->yieldContent('custom-modal'); ?>

    <?php if(!session()->get('accept-cookie', false)): ?>
        <div id="cookie-notice">
            <div id="cookie-notice-container">
                <span id="cookie-notice-text"><?php echo e(trans('notification.cookiewarning')); ?></span><a href="<?php echo e(route('frontend.home.acceptcookie')); ?>" class="btn btn--tosca">OK</a>
            </div>
        </div>
    <?php endif; ?>

    <script>window.myPrefix = '<?php echo e(asset('frontend').'/'); ?>';</script>
    <script src="<?php echo e(asset('frontend/assets/js/vendor/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/vendor/angular.min.js')); ?>"></script>
    <script src="https://cdn.polyfill.io/v2/polyfill.js?features=default,promise,fetch"></script>
    <script src="<?php echo e(asset('frontend/assets/js/ts-notification.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/ts-confirm.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/vendor/timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/vendor/fancybox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/vendor/croppie.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/vendor/selectize.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/main.min.js?v=' . env('JS_VERSION', 11))); ?>"></script>

    <script>
    <?php if(session()->has('message') || session()->has('success') || session()->has('status') || session()->has('error')): ?>
        <?php if( $type = (session()->has('success') || session()->has('status') ? 'success' : (session()->has('error') ? 'error' : 'warning') ) ): ?>
        tsNotif.show("<?php echo e(session()->has('message') ? session()->pull('message') : (session()->has('success') ? session()->pull('success') : (session()->has('error') ? session()->pull('error') : (session()->has('status') ? session()->pull('status') : 'Oops, something went wront, please try again!') ))); ?>", "<?php echo e($type); ?>")
        <?php endif; ?>
    <?php endif; ?>
    </script>

    <!-- GOOGLE ANALYTICS -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', '<?php echo e(env('GA_TRACKING_ID', 'UA-79788319-1')); ?>', 'auto');
        ga('send', 'pageview');
    </script>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '445916019088581',
          cookie     : true,
          xfbml      : true,
          version    : 'v2.8'
        });
        FB.AppEvents.logPageView();   
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

    <?php echo $__env->yieldPushContent('js-script'); ?>
</body>
</html>
