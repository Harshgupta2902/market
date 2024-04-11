<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" id="powerkit-css"
        href="https://caards.codesupply.co/caards/wp-content/plugins/powerkit/assets/css/powerkit.css?ver=2.9.0"
        media="all">
    <link rel="stylesheet" id="powerkit-share-buttons-css"
        href="https://caards.codesupply.co/caards/wp-content/plugins/powerkit/modules/share-buttons/public/css/public-powerkit-share-buttons.css?ver=2.9.0"
        media="all">


    <link rel="stylesheet" id="csco-styles-css"
        href="https://caards.codesupply.co/caards/wp-content/themes/caards/style.css?ver=1.0.4" media="all">
    <script src="https://caards.codesupply.co/caards/wp-includes/js/jquery/jquery.min.js?ver=3.6.4" id="jquery-core-js">
    </script>

    <style id="csco-inline-styles">
        :root {

            /* Base Font */
            --cs-font-base-family: 'Manrope';
            --cs-font-base-size: 1rem;
            --cs-font-base-weight: 400;
            --cs-font-base-style: normal;
            --cs-font-base-letter-spacing: normal;
            --cs-font-base-line-height: 1.5;

            /* Primary Font */
            --cs-font-primary-family: 'Manrope';
            --cs-font-primary-size: 0.75rem;
            --cs-font-primary-weight: 600;
            --cs-font-primary-style: normal;
            --cs-font-primary-letter-spacing: normal;
            --cs-font-primary-text-transform: uppercase;

            /* Secondary Font */
            --cs-font-secondary-family: 'Manrope';
            --cs-font-secondary-size: 0.75rem;
            --cs-font-secondary-weight: 600;
            --cs-font-secondary-style: normal;
            --cs-font-secondary-letter-spacing: 0px;
            --cs-font-secondary-text-transform: none;

            /* Post Meta Font */
            --cs-font-post-meta-family: 'Manrope';
            --cs-font-post-meta-size: 0.75rem;
            --cs-font-post-meta-weight: 600;
            --cs-font-post-meta-style: normal;
            --cs-font-post-meta-letter-spacing: 0.0125rem;
            --cs-font-post-meta-text-transform: none;

            /* Details Font */
            --cs-font-details-family: 'Manrope';
            --cs-font-details-size: 0.75rem;
            --cs-font-details-weight: 600;
            --cs-font-details-style: normal;
            --cs-font-details-letter-spacing: 0.0125rem;
            --cs-font-details-text-transform: uppercase;

            /* Entry Excerpt */
            --cs-font-entry-excerpt-family: 'Manrope';
            --cs-font-entry-excerpt-size: 0.875rem;
            --cs-font-entry-excerpt-line-height: 1.75;
            --cs-font-entry-excerpt-letter-spacing: -0.0125rem;

            /* Category Font */
            --cs-font-category-family: 'Manrope';
            --cs-font-category-size: 0.75rem;
            --cs-font-category-weight: 500;
            --cs-font-category-style: normal;
            --cs-font-category-letter-spacing: -0.025em;
            --cs-font-category-text-transform: uppercase;

            /* Category Latter */
            --cs-font-category-letter-family: 'Manrope';
            --cs-font-category-letter-size: 1.125rem;
            --cs-font-category-letter-weight: 600;
            --cs-font-category-letter-style: normal;
            --cs-font-category-letter-letter-spacing: normal;
            --cs-font-category-letter-text-transform: uppercase;

            /* Post Number Font */
            --cs-font-post-number-family: 'Manrope';
            --cs-font-post-number-size: 1.125rem;
            --cs-font-post-number-weight: 600;
            --cs-font-post-number-style: normal;
            --cs-font-post-number-letter-spacing: normal;
            --cs-font-post-number-text-transform: uppercase;

            /* Tags Font */
            --cs-font-tags-family: 'Manrope';
            --cs-font-tags-size: 0.875rem;
            --cs-font-tags-weight: 600;
            --cs-font-tags-style: normal;
            --cs-font-tags-letter-spacing: -0.025em;
            --cs-font-tags-text-transform: none;

            /* Post Subbtitle */
            --cs-font-post-subtitle-family: 'Manrope';
            --cs-font-post-subtitle-size: 1.75rem;
            --cs-font-post-subtitle-weight: 400;
            --cs-font-post-subtitle-letter-spacing: normal;
            --cs-font-post-subtitle-line-height: 1.25;

            /* Post Content */
            --cs-font-post-content-family: 'Manrope';
            --cs-font-post-content-size: 1.125rem;
            --cs-font-post-content-line-height: 1.65;
            --cs-font-post-content-letter-spacing: -0.0125rem;

            /* Input Font */
            --cs-font-input-family: 'Manrope';
            --cs-font-input-size: 0.75rem;
            --cs-font-input-weight: 600;
            --cs-font-input-line-height: 1.625rem;
            --cs-font-input-style: normal;
            --cs-font-input-letter-spacing: normal;
            --cs-font-input-text-transform: none;

            /* Button Font */
            --cs-font-button-family: 'Manrope';
            --cs-font-button-size: 0.875rem;
            --cs-font-button-weight: 600;
            --cs-font-button-style: normal;
            --cs-font-button-letter-spacing: normal;
            --cs-font-button-text-transform: none;

            /* Main Logo */
            --cs-font-main-logo-family: 'Manrope';
            --cs-font-main-logo-size: 1.5rem;
            --cs-font-main-logo-weight: 700;
            --cs-font-main-logo-style: normal;
            --cs-font-main-logo-letter-spacing: -0.075em;
            --cs-font-main-logo-text-transform: none;

            /* Large Logo */
            --cs-font-large-logo-family: 'Manrope';
            --cs-font-large-logo-size: 1.75rem;
            --cs-font-large-logo-weight: 700;
            --cs-font-large-logo-style: normal;
            --cs-font-large-logo-letter-spacing: -0.075em;
            --cs-font-large-logo-text-transform: none;

            /* Tagline Font */
            --cs-font-tag-line-family: 'Manrope';
            --cs-font-tag-line-size: 0.75rem;
            --cs-font-tag-line-weight: 600;
            --cs-font-tag-line-style: normal;
            --cs-font-tag-line-line-height: 1.5;
            --cs-font-tag-line-letter-spacing: normal;
            --cs-font-tag-line-text-transform: none;

            /* Footer Logo */
            --cs-font-footer-logo-family: 'Manrope';
            --cs-font-footer-logo-size: 1.5rem;
            --cs-font-footer-logo-weight: 700;
            --cs-font-footer-logo-style: normal;
            --cs-font-footer-logo-letter-spacing: -0.075em;
            --cs-font-footer-logo-text-transform: none;

            /* Headings */
            --cs-font-headings-family: 'Manrope';
            --cs-font-headings-weight: 800;
            --cs-font-headings-style: normal;
            --cs-font-headings-line-height: 1.14;
            --cs-font-headings-letter-spacing: -0.0125em;
            --cs-font-headings-text-transform: none;

            /* Headings of Sidebar */
            --cs-font-headings-sidebar-family: 'Manrope';
            --cs-font-headings-sidebar-size: 0.75rem;
            --cs-font-headings-sidebar-weight: 600;
            --cs-font-headings-sidebar-style: normal;
            --cs-font-headings-sidebar-letter-spacing: normal;
            --cs-font-headings-sidebar-text-transform: uppercase;

            /* Section Headings */
            --cs-font-section-headings-family: 'Manrope';
            --cs-font-section-headings-size: 2rem;
            --cs-font-section-headings-weight: 800;
            --cs-font-section-headings-style: normal;
            --cs-font-section-headings-letter-spacing: normal;
            --cs-font-section-headings-text-transform: none;

            /* Menu Font --------------- */
            --cs-font-primary-menu-family: 'Manrope';
            --cs-font-primary-menu-size: 0.875rem;
            --cs-font-primary-menu-weight: 600;
            --cs-font-primary-menu-style: normal;
            --cs-font-primary-menu-letter-spacing: -0.0125em;
            --cs-font-primary-menu-text-transform: none;

            /* Submenu Font */
            --cs-font-primary-submenu-family: 'Manrope';
            --cs-font-primary-submenu-size: 0.875rem;
            --cs-font-primary-submenu-weight: 600;
            --cs-font-primary-submenu-style: normal;
            --cs-font-primary-submenu-letter-spacing: normal;
            --cs-font-primary-submenu-text-transform: none;

            /* Used for main top level fullscreen-menu elements. */
            --cs-font-fullscreen-menu-family: 'Manrope';
            --cs-font-fullscreen-menu-size: 2.625rem;
            --cs-font-fullscreen-menu-weight: 800;
            --cs-font-fullscreen-menu-line-height: 1;
            --cs-font-fullscreen-menu-style: normal;
            --cs-font-fullscreen-menu-letter-spacing: -0.025em;
            --cs-font-fullscreen-menu-text-transform: none;

            /* Submenu Font */
            --cs-font-fullscreen-submenu-family: 'Manrope';
            --cs-font-fullscreen-submenu-size: 0.875rem;
            --cs-font-fullscreen-submenu-weight: 600;
            --cs-font-fullscreen-submenu-line-height: 1.2;
            --cs-font-fullscreen-submenu-style: normal;
            --cs-font-fullscreen-submenu-letter-spacing: normal;
            --cs-font-fullscreen-submenu-text-transform: none;

            /* Featured Menu */
            --cs-font-featured-menu-family: 'Manrope';
            --cs-font-featured-menu-size: 1rem;
            --cs-font-featured-menu-weight: 800;
            --cs-font-featured-menu-style: normal;
            --cs-font-featured-menu-letter-spacing: -0.025em;
            --cs-font-featured-menu-text-transform: none;

            /* Featured Submenu Font */
            --cs-font-featured-submenu-family: 'Manrope';
            --cs-font-featured-submenu-size: 0.875rem;
            --cs-font-featured-submenu-weight: 600;
            --cs-font-featured-submenu-style: normal;
            --cs-font-featured-submenu-letter-spacing: normal;
            --cs-font-featured-submenu-text-transform: none;

            /* Footer Menu Font */
            --cs-font-footer-menu-family: 'Manrope';
            --cs-font-footer-menu-size: 1.5rem;
            ;
            --cs-font-footer-menu-weight: 800;
            --cs-font-footer-menu-line-height: 1;
            --cs-font-footer-menu-style: normal;
            --cs-font-footer-menu-letter-spacing: -0.025em;
            --cs-font-footer-menu-text-transform: none;

            /* Footer Submenu Font */
            --cs-font-footer-submenu-family: 'Manrope';
            --cs-font-footer-submenu-size: 0.875rem;
            --cs-font-footer-submenu-weight: 600;
            --cs-font-footer-submenu-line-height: 1;
            --cs-font-footer-submenu-style: normal;
            --cs-font-footer-submenu-letter-spacing: normal;
            --cs-font-footer-submenu-text-transform: none;

            /* Footer Bottom Menu Font */
            --cs-font-footer-bottom-submenu-family: 'Manrope';
            --cs-font-footer-bottom-submenu-size: 0.875rem;
            --cs-font-footer-bottom-submenu-weight: 600;
            --cs-font-footer-bottom-submenu-line-height: 1;
            --cs-font-footer-bottom-submenu-style: normal;
            --cs-font-footer-bottom-submenu-letter-spacing: normal;
            --cs-font-footer-bottom-submenu-text-transform: none;
        }

        /* Site Background */
        :root,
        [data-site-scheme="default"] {
            --cs-color-site-background: #f5f7f8;
        }

        [data-site-scheme="dark"] {
            --cs-color-site-background: #30323e;
        }

        [data-site-scheme="dark"] .cs-site {
            background-image: none;
        }

        /* Fullscreen Background */
        :root,
        [data-site-scheme="default"] {
            --cs-color-fullscreen-menu-background: #ffffff;
        }

        [data-site-scheme="dark"] {
            --cs-color-fullscreen-menu-background: #30323e;
        }

        [data-site-scheme="dark"] .cs-fullscreen-menu {
            background-image: none;
        }

        :root {
            --cs-str-follow: "Follow me";
        }
    </style>


</head>


<body
    class="post-template-default single single-post postid-261 single-format-gallery wp-embed-responsive cs-page-layout-right cs-navbar-smart-enabled cs-sticky-sidebar-enabled cs-stick-last cs-header-one-type cs-search-type-one"
    data-scheme="inverse" data-site-scheme="dark">



    <div id="page" class="cs-site">


        <div class="cs-site-inner">



            <div class="cs-header-before"></div>

            <header class="cs-header cs-header-one" data-scheme="inverse">
                <div class="cs-container">
                    <div class="cs-header__wrapper">
                        <div class="cs-header__inner cs-header__inner-desktop">
                            <div class="cs-header__col cs-col-left">

                                <nav class="cs-header__nav">
                                    <ul id="menu-primary-1" class="cs-header__nav-inner">
                                        <?php foreach ($nav as $key => $value) { ?>
                                        <li
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-577 cs-sm-position-right">
                                            <a href="#"><span>
                                                    <?= $key ?>
                                                </span></a>
                                            <ul class="sub-menu cs-sm-position-init" data-scheme="inverse">


                                                <?php foreach ($nav[$key] as $subnav) { ?>
                                                <li
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-578">
                                                    <a href="<?php echo base_url($subnav['url']); ?>"
                                                        previewlistener="true">
                                                        <?= $subnav['subnav'] ?>
                                                    </a>
                                                </li>
                                                <?php } ?>


                                            </ul>
                                        </li>
                                        <?php } ?>



                                    </ul>
                                </nav>
                                <div class="cs-header__multi-column cs-site-submenu">
                                    <span class="cs-header__multi-column-toggle">
                                        <i class="cs-icon cs-icon-more-horizontal"></i>
                                    </span>

                                    <div class="cs-header__multi-column-container" data-scheme="inverse">
                                        <div class="cs-container">

                                            <div class="cs-header__multi-column-posts-wrapper">
                                                <div class="cs-header__multi-column-posts-title">
                                                    Popular </div>

                                                <div class="cs-header__multi-column-posts">
                                                    <article
                                                        class="mega-menu-item menu-post-item post-261 post type-post status-publish format-gallery has-post-thumbnail category-cybersecurity post_format-post-format-gallery cs-entry cs-video-wrap">
                                                        <div class="cs-entry__outer">
                                                            <div class="cs-entry__inner cs-entry__content">

                                                                <h5 class="cs-entry__title"><a
                                                                        href="https://caards.codesupply.co/caards/2023/02/27/how-ai-is-revolutionizing-the-tech-industry/"
                                                                        previewlistener="true">How AI is
                                                                        Revolutionizing
                                                                        the Tech Industry</a></h5>
                                                                <div class="cs-entry__post-meta">
                                                                    <div class="cs-meta-date">February 27, 2023</div>
                                                                </div>
                                                            </div>

                                                            <div class="cs-entry__inner cs-entry__overlay cs-entry__thumbnail cs-overlay-ratio cs-ratio-landscape-16-9"
                                                                data-scheme="inverse">

                                                                <div
                                                                    class="cs-overlay-background cs-overlay-transparent">
                                                                    <img width="380" height="250"
                                                                        src="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-380x250.jpg"
                                                                        class="attachment-csco-thumbnail size-csco-thumbnail pk-lqip wp-post-image lazyautosizes ls-is-cached pk-lazyloaded"
                                                                        alt="" decoding="async" loading="lazy"
                                                                        data-pk-sizes="auto"
                                                                        data-ls-sizes="(max-width: 380px) 100vw, 380px"
                                                                        data-pk-src="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-380x250.jpg"
                                                                        data-pk-srcset="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-380x250.jpg 380w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-1340x880.jpg 1340w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-230x150.jpg 230w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-260x170.jpg 260w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-80x52.jpg 80w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-2680x1760.jpg 2680w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-760x500.jpg 760w"
                                                                        sizes="379px"
                                                                        srcset="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-380x250.jpg 380w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-1340x880.jpg 1340w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-230x150.jpg 230w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-260x170.jpg 260w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-80x52.jpg 80w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-2680x1760.jpg 2680w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-760x500.jpg 760w">
                                                                </div>

                                                                <a href="https://caards.codesupply.co/caards/2023/02/27/how-ai-is-revolutionizing-the-tech-industry/"
                                                                    class="cs-overlay-link" previewlistener="true"></a>
                                                            </div>

                                                            <div class="cs-entry__footer">
                                                                <div class="cs-entry__footer-wrapper">
                                                                    <div class="cs-entry__footer-item">
                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-meta-reading-time">3 min
                                                                                read
                                                                            </div>
                                                                            <div class="cs-meta-views">2.0K views</div>
                                                                        </div>

                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-meta-shares">
                                                                                <div class="cs-meta-share-total">
                                                                                    <div class="cs-total-number">
                                                                                        Shares 521 </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="cs-entry__footer-item cs-entry__footer-item-hidden">
                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-entry__read-more">
                                                                                <a href="https://caards.codesupply.co/caards/2023/02/27/how-ai-is-revolutionizing-the-tech-industry/"
                                                                                    previewlistener="true">
                                                                                    Read More </a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-meta-shares">
                                                                                <div class="cs-meta-share-links">
                                                                                    <div class="pk-share-buttons-wrap pk-share-buttons-layout-simple pk-share-buttons-scheme-simple-light pk-share-buttons-has-counts pk-share-buttons-block-posts pk-share-buttons-mode-cached"
                                                                                        data-post-id="261"
                                                                                        data-share-url="https://caards.codesupply.co/caards/2023/02/27/how-ai-is-revolutionizing-the-tech-industry/">


                                                                                        <div
                                                                                            class="pk-share-buttons-items">

                                                                                            <div class="pk-share-buttons-item pk-share-buttons-facebook pk-share-buttons-item-count"
                                                                                                data-id="facebook">

                                                                                                <a href="https://www.facebook.com/sharer.php?u=https://caards.codesupply.co/caards/2023/02/27/how-ai-is-revolutionizing-the-tech-industry/"
                                                                                                    class="pk-share-buttons-link"
                                                                                                    target="_blank"
                                                                                                    previewlistener="true">

                                                                                                    <i
                                                                                                        class="pk-share-buttons-icon pk-icon pk-icon-facebook"></i>



                                                                                                    <span
                                                                                                        class="pk-share-buttons-count pk-font-secondary">165</span>
                                                                                                </a>



                                                                                            </div>
                                                                                            <div class="pk-share-buttons-item pk-share-buttons-twitter pk-share-buttons-no-count"
                                                                                                data-id="twitter">

                                                                                                <a href="https://twitter.com/share?&amp;text=How%20AI%20is%20Revolutionizing%20the%20Tech%20Industry&amp;via=envato&amp;url=https://caards.codesupply.co/caards/2023/02/27/how-ai-is-revolutionizing-the-tech-industry/"
                                                                                                    class="pk-share-buttons-link"
                                                                                                    target="_blank"
                                                                                                    previewlistener="true">

                                                                                                    <i
                                                                                                        class="pk-share-buttons-icon pk-icon pk-icon-twitter"></i>



                                                                                                    <span
                                                                                                        class="pk-share-buttons-count pk-font-secondary">0</span>
                                                                                                </a>



                                                                                            </div>
                                                                                            <div class="pk-share-buttons-item pk-share-buttons-pinterest pk-share-buttons-item-count"
                                                                                                data-id="pinterest">

                                                                                                <a href="https://pinterest.com/pin/create/bookmarklet/?url=https://caards.codesupply.co/caards/2023/02/27/how-ai-is-revolutionizing-the-tech-industry/&amp;media=https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-683x1024.jpg"
                                                                                                    class="pk-share-buttons-link"
                                                                                                    target="_blank"
                                                                                                    previewlistener="true">

                                                                                                    <i
                                                                                                        class="pk-share-buttons-icon pk-icon pk-icon-pinterest"></i>



                                                                                                    <span
                                                                                                        class="pk-share-buttons-count pk-font-secondary">356</span>
                                                                                                </a>



                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <a href="https://caards.codesupply.co/caards/2023/02/27/how-ai-is-revolutionizing-the-tech-industry/"
                                                                class="cs-overlay-link" previewlistener="true"></a>
                                                        </div>
                                                    </article>
                                                    <article
                                                        class="mega-menu-item menu-post-item post-279 post type-post status-publish format-standard has-post-thumbnail category-gear cs-entry cs-video-wrap">
                                                        <div class="cs-entry__outer">
                                                            <div class="cs-entry__inner cs-entry__content">

                                                                <h5 class="cs-entry__title"><a
                                                                        href="https://caards.codesupply.co/caards/2023/02/26/why-cybersecurity-is-more-important-than-ever/"
                                                                        previewlistener="true">Why Cybersecurity is
                                                                        More
                                                                        Important Than Ever</a></h5>
                                                                <div class="cs-entry__post-meta">
                                                                    <div class="cs-meta-date">February 26, 2023</div>
                                                                </div>
                                                            </div>

                                                            <div class="cs-entry__inner cs-entry__overlay cs-entry__thumbnail cs-overlay-ratio cs-ratio-landscape-16-9"
                                                                data-scheme="inverse">

                                                                <div
                                                                    class="cs-overlay-background cs-overlay-transparent">
                                                                    <img width="380" height="250"
                                                                        src="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-380x250.jpg"
                                                                        class="attachment-csco-thumbnail size-csco-thumbnail pk-lqip wp-post-image lazyautosizes ls-is-cached pk-lazyloaded"
                                                                        alt="" decoding="async" loading="lazy"
                                                                        data-pk-sizes="auto"
                                                                        data-ls-sizes="(max-width: 380px) 100vw, 380px"
                                                                        data-pk-src="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-380x250.jpg"
                                                                        data-pk-srcset="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-380x250.jpg 380w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-1340x880.jpg 1340w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-230x150.jpg 230w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-260x170.jpg 260w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-80x52.jpg 80w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-2680x1760.jpg 2680w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-760x500.jpg 760w"
                                                                        sizes="379px"
                                                                        srcset="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-380x250.jpg 380w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-1340x880.jpg 1340w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-230x150.jpg 230w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-260x170.jpg 260w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-80x52.jpg 80w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-2680x1760.jpg 2680w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-760x500.jpg 760w">
                                                                </div>

                                                                <a href="https://caards.codesupply.co/caards/2023/02/26/why-cybersecurity-is-more-important-than-ever/"
                                                                    class="cs-overlay-link" previewlistener="true"></a>
                                                            </div>

                                                            <div class="cs-entry__footer">
                                                                <div class="cs-entry__footer-wrapper">
                                                                    <div class="cs-entry__footer-item">
                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-meta-reading-time">3 min
                                                                                read
                                                                            </div>
                                                                            <div class="cs-meta-views">467 views</div>
                                                                        </div>

                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-meta-shares">
                                                                                <div class="cs-meta-share-total">
                                                                                    <div class="cs-total-number">
                                                                                        Shares 1K </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="cs-entry__footer-item cs-entry__footer-item-hidden">
                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-entry__read-more">
                                                                                <a href="https://caards.codesupply.co/caards/2023/02/26/why-cybersecurity-is-more-important-than-ever/"
                                                                                    previewlistener="true">
                                                                                    Read More </a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-meta-shares">
                                                                                <div class="cs-meta-share-links">
                                                                                    <div class="pk-share-buttons-wrap pk-share-buttons-layout-simple pk-share-buttons-scheme-simple-light pk-share-buttons-has-counts pk-share-buttons-block-posts pk-share-buttons-mode-cached"
                                                                                        data-post-id="279"
                                                                                        data-share-url="https://caards.codesupply.co/caards/2023/02/26/why-cybersecurity-is-more-important-than-ever/">


                                                                                        <div
                                                                                            class="pk-share-buttons-items">

                                                                                            <div class="pk-share-buttons-item pk-share-buttons-facebook pk-share-buttons-item-count"
                                                                                                data-id="facebook">

                                                                                                <a href="https://www.facebook.com/sharer.php?u=https://caards.codesupply.co/caards/2023/02/26/why-cybersecurity-is-more-important-than-ever/"
                                                                                                    class="pk-share-buttons-link"
                                                                                                    target="_blank"
                                                                                                    previewlistener="true">

                                                                                                    <i
                                                                                                        class="pk-share-buttons-icon pk-icon pk-icon-facebook"></i>



                                                                                                    <span
                                                                                                        class="pk-share-buttons-count pk-font-secondary">539</span>
                                                                                                </a>



                                                                                            </div>
                                                                                            <div class="pk-share-buttons-item pk-share-buttons-twitter pk-share-buttons-no-count"
                                                                                                data-id="twitter">

                                                                                                <a href="https://twitter.com/share?&amp;text=Why%20Cybersecurity%20is%20More%20Important%20Than%20Ever&amp;via=envato&amp;url=https://caards.codesupply.co/caards/2023/02/26/why-cybersecurity-is-more-important-than-ever/"
                                                                                                    class="pk-share-buttons-link"
                                                                                                    target="_blank"
                                                                                                    previewlistener="true">

                                                                                                    <i
                                                                                                        class="pk-share-buttons-icon pk-icon pk-icon-twitter"></i>



                                                                                                    <span
                                                                                                        class="pk-share-buttons-count pk-font-secondary">0</span>
                                                                                                </a>



                                                                                            </div>
                                                                                            <div class="pk-share-buttons-item pk-share-buttons-pinterest pk-share-buttons-item-count"
                                                                                                data-id="pinterest">

                                                                                                <a href="https://pinterest.com/pin/create/bookmarklet/?url=https://caards.codesupply.co/caards/2023/02/26/why-cybersecurity-is-more-important-than-ever/&amp;media=https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00002-683x1024.jpg"
                                                                                                    class="pk-share-buttons-link"
                                                                                                    target="_blank"
                                                                                                    previewlistener="true">

                                                                                                    <i
                                                                                                        class="pk-share-buttons-icon pk-icon pk-icon-pinterest"></i>



                                                                                                    <span
                                                                                                        class="pk-share-buttons-count pk-font-secondary">544</span>
                                                                                                </a>



                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <a href="https://caards.codesupply.co/caards/2023/02/26/why-cybersecurity-is-more-important-than-ever/"
                                                                class="cs-overlay-link" previewlistener="true"></a>
                                                        </div>
                                                    </article>
                                                    <article
                                                        class="mega-menu-item menu-post-item post-259 post type-post status-publish format-standard has-post-thumbnail category-artificial-intelligence cs-entry cs-video-wrap">
                                                        <div class="cs-entry__outer">
                                                            <div class="cs-entry__inner cs-entry__content">

                                                                <h5 class="cs-entry__title"><a
                                                                        href="https://caards.codesupply.co/caards/2023/02/25/the-future-of-virtual-reality-in-gaming-and-beyond/"
                                                                        previewlistener="true">The Future of Virtual
                                                                        Reality in Gaming and Beyond</a></h5>
                                                                <div class="cs-entry__post-meta">
                                                                    <div class="cs-meta-date">February 25, 2023</div>
                                                                </div>
                                                            </div>

                                                            <div class="cs-entry__inner cs-entry__overlay cs-entry__thumbnail cs-overlay-ratio cs-ratio-landscape-16-9"
                                                                data-scheme="inverse">

                                                                <div
                                                                    class="cs-overlay-background cs-overlay-transparent">
                                                                    <img width="380" height="250"
                                                                        src="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-380x250.jpg"
                                                                        class="attachment-csco-thumbnail size-csco-thumbnail pk-lqip wp-post-image lazyautosizes ls-is-cached pk-lazyloaded"
                                                                        alt="" decoding="async" loading="lazy"
                                                                        data-pk-sizes="auto"
                                                                        data-ls-sizes="(max-width: 380px) 100vw, 380px"
                                                                        data-pk-src="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-380x250.jpg"
                                                                        data-pk-srcset="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-380x250.jpg 380w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-1340x880.jpg 1340w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-230x150.jpg 230w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-260x170.jpg 260w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-80x52.jpg 80w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-2680x1760.jpg 2680w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-760x500.jpg 760w"
                                                                        sizes="379px"
                                                                        srcset="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-380x250.jpg 380w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-1340x880.jpg 1340w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-230x150.jpg 230w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-260x170.jpg 260w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-80x52.jpg 80w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-2680x1760.jpg 2680w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-760x500.jpg 760w">
                                                                </div>

                                                                <a href="https://caards.codesupply.co/caards/2023/02/25/the-future-of-virtual-reality-in-gaming-and-beyond/"
                                                                    class="cs-overlay-link" previewlistener="true"></a>
                                                            </div>

                                                            <div class="cs-entry__footer">
                                                                <div class="cs-entry__footer-wrapper">
                                                                    <div class="cs-entry__footer-item">
                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-meta-reading-time">3 min
                                                                                read
                                                                            </div>
                                                                            <div class="cs-meta-views">2.2K views</div>
                                                                        </div>

                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-meta-shares">
                                                                                <div class="cs-meta-share-total">
                                                                                    <div class="cs-total-number">
                                                                                        Shares 630 </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="cs-entry__footer-item cs-entry__footer-item-hidden">
                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-entry__read-more">
                                                                                <a href="https://caards.codesupply.co/caards/2023/02/25/the-future-of-virtual-reality-in-gaming-and-beyond/"
                                                                                    previewlistener="true">
                                                                                    Read More </a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-meta-shares">
                                                                                <div class="cs-meta-share-links">
                                                                                    <div class="pk-share-buttons-wrap pk-share-buttons-layout-simple pk-share-buttons-scheme-simple-light pk-share-buttons-has-counts pk-share-buttons-block-posts pk-share-buttons-mode-cached"
                                                                                        data-post-id="259"
                                                                                        data-share-url="https://caards.codesupply.co/caards/2023/02/25/the-future-of-virtual-reality-in-gaming-and-beyond/">


                                                                                        <div
                                                                                            class="pk-share-buttons-items">

                                                                                            <div class="pk-share-buttons-item pk-share-buttons-facebook pk-share-buttons-item-count"
                                                                                                data-id="facebook">

                                                                                                <a href="https://www.facebook.com/sharer.php?u=https://caards.codesupply.co/caards/2023/02/25/the-future-of-virtual-reality-in-gaming-and-beyond/"
                                                                                                    class="pk-share-buttons-link"
                                                                                                    target="_blank"
                                                                                                    previewlistener="true">

                                                                                                    <i
                                                                                                        class="pk-share-buttons-icon pk-icon pk-icon-facebook"></i>



                                                                                                    <span
                                                                                                        class="pk-share-buttons-count pk-font-secondary">248</span>
                                                                                                </a>



                                                                                            </div>
                                                                                            <div class="pk-share-buttons-item pk-share-buttons-twitter pk-share-buttons-no-count"
                                                                                                data-id="twitter">

                                                                                                <a href="https://twitter.com/share?&amp;text=The%20Future%20of%20Virtual%20Reality%20in%20Gaming%20and%20Beyond&amp;via=envato&amp;url=https://caards.codesupply.co/caards/2023/02/25/the-future-of-virtual-reality-in-gaming-and-beyond/"
                                                                                                    class="pk-share-buttons-link"
                                                                                                    target="_blank"
                                                                                                    previewlistener="true">

                                                                                                    <i
                                                                                                        class="pk-share-buttons-icon pk-icon pk-icon-twitter"></i>



                                                                                                    <span
                                                                                                        class="pk-share-buttons-count pk-font-secondary">0</span>
                                                                                                </a>



                                                                                            </div>
                                                                                            <div class="pk-share-buttons-item pk-share-buttons-pinterest pk-share-buttons-item-count"
                                                                                                data-id="pinterest">

                                                                                                <a href="https://pinterest.com/pin/create/bookmarklet/?url=https://caards.codesupply.co/caards/2023/02/25/the-future-of-virtual-reality-in-gaming-and-beyond/&amp;media=https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00003-683x1024.jpg"
                                                                                                    class="pk-share-buttons-link"
                                                                                                    target="_blank"
                                                                                                    previewlistener="true">

                                                                                                    <i
                                                                                                        class="pk-share-buttons-icon pk-icon pk-icon-pinterest"></i>



                                                                                                    <span
                                                                                                        class="pk-share-buttons-count pk-font-secondary">382</span>
                                                                                                </a>



                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <a href="https://caards.codesupply.co/caards/2023/02/25/the-future-of-virtual-reality-in-gaming-and-beyond/"
                                                                class="cs-overlay-link" previewlistener="true"></a>
                                                        </div>
                                                    </article>
                                                    <article
                                                        class="mega-menu-item menu-post-item post-277 post type-post status-publish format-gallery has-post-thumbnail category-cybersecurity post_format-post-format-gallery cs-entry cs-video-wrap">
                                                        <div class="cs-entry__outer">
                                                            <div class="cs-entry__inner cs-entry__content">

                                                                <h5 class="cs-entry__title"><a
                                                                        href="https://caards.codesupply.co/caards/2023/02/24/the-rise-of-cryptocurrency-exploring-the-pros-and-cons/"
                                                                        previewlistener="true">The Rise of
                                                                        Cryptocurrency: Exploring the Pros and Cons</a>
                                                                </h5>
                                                                <div class="cs-entry__post-meta">
                                                                    <div class="cs-meta-date">February 24, 2023</div>
                                                                </div>
                                                            </div>

                                                            <div class="cs-entry__inner cs-entry__overlay cs-entry__thumbnail cs-overlay-ratio cs-ratio-landscape-16-9"
                                                                data-scheme="inverse">

                                                                <div
                                                                    class="cs-overlay-background cs-overlay-transparent">
                                                                    <img width="380" height="250"
                                                                        src="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-380x250.jpg"
                                                                        class="attachment-csco-thumbnail size-csco-thumbnail pk-lqip wp-post-image lazyautosizes ls-is-cached pk-lazyloaded"
                                                                        alt="" decoding="async" loading="lazy"
                                                                        data-pk-sizes="auto"
                                                                        data-ls-sizes="(max-width: 380px) 100vw, 380px"
                                                                        data-pk-src="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-380x250.jpg"
                                                                        data-pk-srcset="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-380x250.jpg 380w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-1340x880.jpg 1340w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-230x150.jpg 230w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-260x170.jpg 260w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-80x52.jpg 80w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-2680x1760.jpg 2680w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-760x500.jpg 760w"
                                                                        sizes="379px"
                                                                        srcset="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-380x250.jpg 380w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-1340x880.jpg 1340w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-230x150.jpg 230w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-260x170.jpg 260w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-80x52.jpg 80w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-2680x1760.jpg 2680w, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-760x500.jpg 760w">
                                                                </div>

                                                                <a href="https://caards.codesupply.co/caards/2023/02/24/the-rise-of-cryptocurrency-exploring-the-pros-and-cons/"
                                                                    class="cs-overlay-link" previewlistener="true"></a>
                                                            </div>

                                                            <div class="cs-entry__footer">
                                                                <div class="cs-entry__footer-wrapper">
                                                                    <div class="cs-entry__footer-item">
                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-meta-reading-time">3 min
                                                                                read
                                                                            </div>
                                                                            <div class="cs-meta-views">2.4K views
                                                                            </div>
                                                                        </div>

                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-meta-shares">
                                                                                <div class="cs-meta-share-total">
                                                                                    <div class="cs-total-number">
                                                                                        Shares 933 </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="cs-entry__footer-item cs-entry__footer-item-hidden">
                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-entry__read-more">
                                                                                <a href="https://caards.codesupply.co/caards/2023/02/24/the-rise-of-cryptocurrency-exploring-the-pros-and-cons/"
                                                                                    previewlistener="true">
                                                                                    Read More </a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="cs-entry__footer-inner">
                                                                            <div class="cs-meta-shares">
                                                                                <div class="cs-meta-share-links">
                                                                                    <div class="pk-share-buttons-wrap pk-share-buttons-layout-simple pk-share-buttons-scheme-simple-light pk-share-buttons-has-counts pk-share-buttons-block-posts pk-share-buttons-mode-cached"
                                                                                        data-post-id="277"
                                                                                        data-share-url="https://caards.codesupply.co/caards/2023/02/24/the-rise-of-cryptocurrency-exploring-the-pros-and-cons/">


                                                                                        <div
                                                                                            class="pk-share-buttons-items">

                                                                                            <div class="pk-share-buttons-item pk-share-buttons-facebook pk-share-buttons-item-count"
                                                                                                data-id="facebook">

                                                                                                <a href="https://www.facebook.com/sharer.php?u=https://caards.codesupply.co/caards/2023/02/24/the-rise-of-cryptocurrency-exploring-the-pros-and-cons/"
                                                                                                    class="pk-share-buttons-link"
                                                                                                    target="_blank"
                                                                                                    previewlistener="true">

                                                                                                    <i
                                                                                                        class="pk-share-buttons-icon pk-icon pk-icon-facebook"></i>



                                                                                                    <span
                                                                                                        class="pk-share-buttons-count pk-font-secondary">414</span>
                                                                                                </a>



                                                                                            </div>
                                                                                            <div class="pk-share-buttons-item pk-share-buttons-twitter pk-share-buttons-no-count"
                                                                                                data-id="twitter">

                                                                                                <a href="https://twitter.com/share?&amp;text=The%20Rise%20of%20Cryptocurrency%3A%20Exploring%20the%20Pros%20and%20Cons&amp;via=envato&amp;url=https://caards.codesupply.co/caards/2023/02/24/the-rise-of-cryptocurrency-exploring-the-pros-and-cons/"
                                                                                                    class="pk-share-buttons-link"
                                                                                                    target="_blank"
                                                                                                    previewlistener="true">

                                                                                                    <i
                                                                                                        class="pk-share-buttons-icon pk-icon pk-icon-twitter"></i>



                                                                                                    <span
                                                                                                        class="pk-share-buttons-count pk-font-secondary">0</span>
                                                                                                </a>



                                                                                            </div>
                                                                                            <div class="pk-share-buttons-item pk-share-buttons-pinterest pk-share-buttons-item-count"
                                                                                                data-id="pinterest">

                                                                                                <a href="https://pinterest.com/pin/create/bookmarklet/?url=https://caards.codesupply.co/caards/2023/02/24/the-rise-of-cryptocurrency-exploring-the-pros-and-cons/&amp;media=https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00004-1024x683.jpg"
                                                                                                    class="pk-share-buttons-link"
                                                                                                    target="_blank"
                                                                                                    previewlistener="true">

                                                                                                    <i
                                                                                                        class="pk-share-buttons-icon pk-icon pk-icon-pinterest"></i>



                                                                                                    <span
                                                                                                        class="pk-share-buttons-count pk-font-secondary">519</span>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="cs-header__inner cs-header__inner-mobile">
                            <div class="cs-header__col cs-col-left">
                                <span class="cs-header__offcanvas-toggle cs-d-lg-none" role="button">
                                    <span></span>
                                </span>
                            </div>
                            <div class="cs-header__col cs-col-center">
                                <div class="cs-logo">
                                    <a class="cs-header__logo cs-logo-default "
                                        href="https://caards.codesupply.co/caards/" previewlistener="true">
                                        <img src="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/2022/07/logo.png"
                                            alt="Caards"
                                            srcset="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/2022/07/logo.png 1x, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/2022/07/logo@2x.png 2x">
                                    </a>

                                    <a class="cs-header__logo cs-logo-dark " href="https://caards.codesupply.co/caards/"
                                        previewlistener="true">
                                        <img src="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/2022/07/logo-dark.png"
                                            alt="Caards"
                                            srcset="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/2022/07/logo-dark.png 1x, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/2022/07/logo-dark@2x.png 2x">
                                    </a>
                                </div>
                            </div>
                            <div class="cs-header__col cs-col-right">
                                <span role="button"
                                    class="cs-header__scheme-toggle cs-header__scheme-toggle-mobile cs-site-scheme-toggle">
                                    <i class="cs-header__scheme-toggle-icon cs-icon cs-icon-light-mode"></i>
                                    <i class="cs-header__scheme-toggle-icon cs-icon cs-icon-dark-mode"></i>
                                </span>
                                <span class="cs-header__search-toggle" role="button">
                                    <i class="cs-icon cs-icon-search"></i>
                                </span>
                            </div>
                        </div>

                        <div class="cs-search cs-search-one" data-scheme="dark">


                            <div class="cs-search__wrapper">
                                <form role="search" method="get" class="cs-search__nav-form"
                                    action="https://caards.codesupply.co/caards/">
                                    <div class="cs-search__group">
                                        <input data-swpparentel=".cs-header .cs-search-live-result" required=""
                                            class="cs-search__input" data-swplive="true" type="search" value="" name="s"
                                            placeholder="Enter keyword" autocomplete="off"
                                            aria-owns="searchwp_live_search_results_66178b6a4c035"
                                            aria-autocomplete="both"
                                            aria-label="When autocomplete results are available use up and down arrows to review and enter to go to the desired page. Touch device users, explore by touch or with swipe gestures.">

                                        <button class="cs-search__submit" type="submit">
                                            <i class="cs-icon cs-icon-search"></i>
                                        </button>

                                        <button class="cs-search__close">
                                            <span></span>
                                        </button>
                                    </div>
                                </form>

                                <div class="cs-search-live-container">
                                    <div class="cs-search-live-result">
                                        <div aria-expanded="false" class="searchwp-live-search-results"
                                            id="searchwp_live_search_results_66178b6a4c035" role="listbox" tabindex="0">
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </header>


            <main id="main" class="cs-site-primary">


                <div
                    class="cs-site-content cs-sidebar-enabled cs-sidebar-right cs-metabar-enabled cs-singular-header-full section-heading-default-style-1">


                    <div class="cs-entry__header cs-entry__header-full">
                        <div class="cs-entry__header-inner">
                            <div class="cs-ratio-wide cs-entry__header-wrap cs-video-wrap" data-scheme="inverse">

                                <figure class="cs-entry__post-media cs-entry__overlay-bg cs-overlay-background">
                                    <img width="1920" height="1024" src="<?= $data->image ?>"
                                        class="attachment-csco-extra-large size-csco-extra-large pk-lqip wp-post-image lazyautosizes ls-is-cached pk-lazyloaded"
                                        alt="" decoding="async" loading="lazy" data-pk-sizes="auto"
                                        data-ls-sizes="(max-width: 1920px) 100vw, 1920px"
                                        data-pk-src="<?= $data->image ?>"
                                        data-pk-srcset="<?= $data->image ?> 1920w, <?= $data->image ?> 80w, <?= $data->image ?> 3840w"
                                        sizes="1027px"
                                        srcset="<?= $data->image ?> 1920w, <?= $data->image ?> 80w, <?= $data->image ?> 3840w">
                                </figure>

                                <div class="cs-container">
                                    <div class="cs-entry__header-container">
                                        <div class="cs-entry__header-info">
                                            <div class="cs-entry__header-category">
                                                <div class="cs-entry__header-category-inner">

                                                    <div class="cs-entry__category">
                                                        <a href="https://caards.codesupply.co/caards/category/cybersecurity/"
                                                            class="cs-entry__category-letter"
                                                            style="--cs-color-category-letter-contrast: #ffffff;"
                                                            previewlistener="true">
                                                            <?= $data->category[0] ?>
                                                        </a>

                                                        <a href="https://caards.codesupply.co/caards/category/cybersecurity/"
                                                            class="cs-entry__category-label"
                                                            previewlistener="true"><strong>
                                                                <?= $data->category ?>
                                                            </strong></a>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="cs-entry__header-info-item">
                                                <h1 class="cs-entry__title"><span>
                                                        <?= $data->title ?>
                                                    </span></h1>
                                                <div class="cs-entry__post-meta">
                                                    <div class="cs-meta-author"><a class="cs-meta-author-inner url fn n"
                                                            href="https://caards.codesupply.co/caards/author/elliot/"
                                                            title="View all posts by Elliot Alderson"
                                                            previewlistener="true"><span class="cs-author">
                                                                <?= $data->author ?>
                                                            </span></a></div>
                                                    <div class="cs-meta-date">
                                                        <?= date('M d, Y', strtotime($data->published_at)) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cs-container">
                        <div id="content" class="cs-main-content">
                            <div id="primary" class="cs-content-area">
                                <div class="cs-entry__wrap">
                                    <div class="cs-entry__container">
                                        <div class="cs-entry__metabar">
                                            <div class="cs-entry__metabar-post-meta">
                                                <div class="cs-entry__metabar-item">

                                                    <div class="cs-entry__post-meta">
                                                        <div class="cs-meta-reading-time"><span class="cs-meta-icon"><i
                                                                    class="cs-icon cs-icon-clock"></i></span>
                                                            <?= ceil(strlen($data->blog) / 225) ?>
                                                            min Read
                                                        </div>
                                                        <div class="cs-meta-views"><span class="cs-meta-icon"><i
                                                                    class="cs-icon cs-icon-bar-chart"></i></span>
                                                            <?= $data->views ?>
                                                            views
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cs-entry__metabar-inner" style="top: 20px; opacity: 1;">
                                                <div class="cs-entry__metabar-item">
                                                    <div class="pk-share-buttons-wrap pk-share-buttons-layout-simple pk-share-buttons-scheme-simple-light pk-share-buttons-has-counts pk-share-buttons-has-total-counts pk-share-buttons-metabar-post pk-share-buttons-mode-cached"
                                                        data-post-id="261"
                                                        data-share-url="https://caards.codesupply.co/caards/2023/02/27/how-ai-is-revolutionizing-the-tech-industry/">

                                                        <div class="pk-share-buttons-total">
                                                            <div class="pk-share-buttons-count pk-font-primary">521
                                                            </div>
                                                            <div class="pk-share-buttons-label pk-font-primary">Share
                                                            </div>
                                                        </div>

                                                        <div class="pk-share-buttons-items">

                                                            <div class="pk-share-buttons-item pk-share-buttons-facebook pk-share-buttons-item-count"
                                                                data-id="facebook">

                                                                <a href="https://www.facebook.com/sharer.php?u=https://caards.codesupply.co/caards/2023/02/27/how-ai-is-revolutionizing-the-tech-industry/"
                                                                    class="pk-share-buttons-link" target="_blank"
                                                                    previewlistener="true">

                                                                    <i
                                                                        class="pk-share-buttons-icon pk-icon pk-icon-facebook"></i>



                                                                    <span
                                                                        class="pk-share-buttons-count pk-font-secondary">165</span>
                                                                </a>



                                                            </div>
                                                            <div class="pk-share-buttons-item pk-share-buttons-pinterest pk-share-buttons-item-count"
                                                                data-id="pinterest">

                                                                <a href="https://pinterest.com/pin/create/bookmarklet/?url=https://caards.codesupply.co/caards/2023/02/27/how-ai-is-revolutionizing-the-tech-industry/&amp;media=https://caards.codesupply.co/caards/wp-content/uploads/sites/2/demo-image-00001-683x1024.jpg"
                                                                    class="pk-share-buttons-link" target="_blank"
                                                                    previewlistener="true">

                                                                    <i
                                                                        class="pk-share-buttons-icon pk-icon pk-icon-pinterest"></i>



                                                                    <span
                                                                        class="pk-share-buttons-count pk-font-secondary">356</span>
                                                                </a>



                                                            </div>
                                                            <div class="pk-share-buttons-item pk-share-buttons-twitter pk-share-buttons-no-count"
                                                                data-id="twitter">

                                                                <a href="https://twitter.com/share?&amp;text=How%20AI%20is%20Revolutionizing%20the%20Tech%20Industry&amp;via=envato&amp;url=https://caards.codesupply.co/caards/2023/02/27/how-ai-is-revolutionizing-the-tech-industry/"
                                                                    class="pk-share-buttons-link" target="_blank"
                                                                    previewlistener="true">

                                                                    <i
                                                                        class="pk-share-buttons-icon pk-icon pk-icon-twitter"></i>



                                                                    <span
                                                                        class="pk-share-buttons-count pk-font-secondary">0</span>
                                                                </a>



                                                            </div>
                                                            <div class="pk-share-buttons-item pk-share-buttons-mail pk-share-buttons-no-count"
                                                                data-id="mail">

                                                                <a href="mailto:?subject=How%20AI%20is%20Revolutionizing%20the%20Tech%20Industry&amp;body=How%20AI%20is%20Revolutionizing%20the%20Tech%20Industry%20https://caards.codesupply.co/caards/2023/02/27/how-ai-is-revolutionizing-the-tech-industry/"
                                                                    class="pk-share-buttons-link" target="_blank">

                                                                    <i
                                                                        class="pk-share-buttons-icon pk-icon pk-icon-mail"></i>



                                                                    <span
                                                                        class="pk-share-buttons-count pk-font-secondary">0</span>
                                                                </a>



                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cs-entry__content-wrap">


                                            <div class="cs-entry__content-container">

                                                <div class="entry-content">
                                                    <?= $data->blog ?>
                                                </div>

                                            </div>

                                            <div class="cs-entry__after-share-buttons">
                                                <div class="cs-entry__after-share-buttons-title">
                                                    <h5>Share this article</h5>
                                                </div>

                                                
                                                <div class="cs-entry__after-share-buttons-link">
                                                    <div class="cs-entry__after-share-buttons-input-group">
                                                        <input class="cs-entry__after-share-buttons-text" type="text"
                                                            value="<?=base_url('blogs/' . $data->category . '/' . $data->slug)?>">
                                                        <button class="cs-entry__after-share-buttons-copy">
                                                            <span class="cs-icon cs-icon-copy"></span>
                                                        </button>
                                                    </div>
                                                    <span class="cs-entry__after-share-buttons-text">Shareable
                                                        URL</span>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <aside id="secondary" class="cs-sidebar__area cs-widget-area">
                                <div class="cs-sidebar__inner">
                                    <div class="widget block-26 widget_block">
                                        <div class="wp-block-group is-style-default is-layout-flow">
                                            <div class="wp-block-group__inner-container">
                                                <h2 class="wp-block-heading is-style-cs-heading-sidebar">Top on the
                                                    week</h2>
                                                <div class="cnvs-block-posts cnvs-block-posts-1660142664321 cnvs-block-posts-layout-horizontal-type-5"
                                                    data-layout="horizontal-type-5" data-min-height="">
                                                    <div class="cs-posts-area" data-posts-area="">
                                                        <div class="cs-posts-area__outer">
                                                            <div
                                                                class="cs-posts-area__main cs-block-posts-layout-horizontal-type-5">
                                                                <?php foreach ($featured as $blogs) { ?>
                                                                <article
                                                                    class="post-261 post type-post status-publish format-gallery has-post-thumbnail category-cybersecurity post_format-post-format-gallery cs-entry cs-video-wrap">
                                                                    <div class="cs-entry__outer">
                                                                        <div
                                                                            class="cs-entry__inner cs-entry__thumbnail">
                                                                            <div class="cs-overlay-background">
                                                                                <img width="80" height="80"
                                                                                    src="<?= $blogs->image ?>"
                                                                                    class="attachment-csco-smaller size-csco-smaller pk-lqip wp-post-image lazyautosizes ls-is-cached pk-lazyloaded"
                                                                                    alt="" decoding="async"
                                                                                    loading="lazy" data-pk-sizes="auto"
                                                                                    sizes="48px">
                                                                            </div>
                                                                        </div>

                                                                        <div class="cs-entry__inner cs-entry__content ">
                                                                            <div class="cs-entry__content-inner">
                                                                                <div class="cs-entry__post-meta">
                                                                                    <div class="cs-meta-author"><a
                                                                                            class="cs-meta-author-inner url fn n"
                                                                                            href="https://caards.codesupply.co/caards/author/elliot/"
                                                                                            title="View all posts by Elliot Alderson"
                                                                                            previewlistener="true"><span
                                                                                                class="cs-author">
                                                                                                <?= $blogs->author ?>
                                                                                            </span></a>
                                                                                    </div>
                                                                                    <div class="cs-meta-date">February
                                                                                        27, 2023</div>
                                                                                </div>
                                                                                <h2 class="cs-entry__title ">
                                                                                    <a href="https://caards.codesupply.co/caards/2023/02/27/how-ai-is-revolutionizing-the-tech-industry/"
                                                                                        previewlistener="true">
                                                                                        <?= $blogs->title ?>
                                                                                    </a>
                                                                                </h2>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </article>
                                                                <?php } ?>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="widget block-29 widget_block">
                                        <div class="wp-block-group is-style-default is-layout-flow">
                                            <div class="wp-block-group__inner-container">
                                                <h2 class="wp-block-heading is-style-cs-heading-sidebar">Let`s Get
                                                    Social</h2>


                                                <div
                                                    class="cnvs-block-social-links cnvs-block-social-links-1658222626196">
                                                    <div
                                                        class="pk-social-links-wrap pk-social-links-template-vertical pk-social-links-align-default pk-social-links-scheme-gutenberg-block pk-social-links-titles-enabled pk-social-links-counts-enabled pk-social-links-labels-enabled pk-social-links-mode-php pk-social-links-mode-rest">
                                                        <div class="pk-social-links-items">
                                                            <div class="pk-social-links-item pk-social-links-facebook pk-social-links-item-count"
                                                                data-id="facebook">
                                                                <a href="https://facebook.com/codesupplyco"
                                                                    class="pk-social-links-link" target="_blank"
                                                                    rel="nofollow noopener" aria-label="Facebook"
                                                                    previewlistener="true">
                                                                    <i
                                                                        class="pk-social-links-icon pk-icon pk-icon-facebook"></i>
                                                                    <span
                                                                        class="pk-social-links-title pk-font-heading">Facebook</span>

                                                                    <span
                                                                        class="pk-social-links-count pk-font-secondary">53</span>


                                                                    <span
                                                                        class="pk-social-links-label pk-font-secondary">Likes</span>
                                                                </a>
                                                            </div>
                                                            <div class="pk-social-links-item pk-social-links-twitter pk-social-links-item-count"
                                                                data-id="twitter">
                                                                <a href="https://twitter.com/envato"
                                                                    class="pk-social-links-link" target="_blank"
                                                                    rel="nofollow noopener" aria-label="Twitter"
                                                                    previewlistener="true">
                                                                    <i
                                                                        class="pk-social-links-icon pk-icon pk-icon-twitter"></i>
                                                                    <span
                                                                        class="pk-social-links-title pk-font-heading">Twitter</span>

                                                                    <span
                                                                        class="pk-social-links-count pk-font-secondary">71K</span>


                                                                    <span
                                                                        class="pk-social-links-label pk-font-secondary">Followers</span>
                                                                </a>
                                                            </div>
                                                            <div class="pk-social-links-item pk-social-links-instagram pk-social-links-item-count"
                                                                data-id="instagram">
                                                                <a href="https://www.instagram.com/codesupply.co"
                                                                    class="pk-social-links-link" target="_blank"
                                                                    rel="nofollow noopener" aria-label="Instagram"
                                                                    previewlistener="true">
                                                                    <i
                                                                        class="pk-social-links-icon pk-icon pk-icon-instagram"></i>
                                                                    <span
                                                                        class="pk-social-links-title pk-font-heading">Instagram</span>

                                                                    <span
                                                                        class="pk-social-links-count pk-font-secondary">51</span>


                                                                    <span
                                                                        class="pk-social-links-label pk-font-secondary">Followers</span>
                                                                </a>
                                                            </div>
                                                            <div class="pk-social-links-item pk-social-links-pinterest pk-social-links-item-count"
                                                                data-id="pinterest">
                                                                <a href="https://pinterest.com/envato"
                                                                    class="pk-social-links-link" target="_blank"
                                                                    rel="nofollow noopener" aria-label="Pinterest"
                                                                    previewlistener="true">
                                                                    <i
                                                                        class="pk-social-links-icon pk-icon pk-icon-pinterest"></i>
                                                                    <span
                                                                        class="pk-social-links-title pk-font-heading">Pinterest</span>

                                                                    <span
                                                                        class="pk-social-links-count pk-font-secondary">15K</span>


                                                                    <span
                                                                        class="pk-social-links-label pk-font-secondary">Followers</span>
                                                                </a>
                                                            </div>
                                                            <div class="pk-social-links-item pk-social-links-youtube pk-social-links-item-count"
                                                                data-id="youtube">
                                                                <a href="https://www.youtube.com/user/envato"
                                                                    class="pk-social-links-link" target="_blank"
                                                                    rel="nofollow noopener" aria-label="YouTube"
                                                                    previewlistener="true">
                                                                    <i
                                                                        class="pk-social-links-icon pk-icon pk-icon-youtube"></i>
                                                                    <span
                                                                        class="pk-social-links-title pk-font-heading">YouTube</span>

                                                                    <span
                                                                        class="pk-social-links-count pk-font-secondary">201K</span>


                                                                    <span
                                                                        class="pk-social-links-label pk-font-secondary">Subscribers</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </main>



            <footer class="cs-footer cs-footer-one" data-scheme="inverse">
                <div class="cs-footer__top">
                    <div class="cs-container">
                        <div class="cs-footer__item">
                            <div class="cs-footer__col cs-col-left">
                                <div class="cs-footer__inner">
                                    <div class="cs-logo">
                                        <a class="cs-footer__logo cs-logo-default"
                                            href="https://caards.codesupply.co/caards/" previewlistener="true">
                                            <img src="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/2022/07/logo.png"
                                                alt="Caards"
                                                srcset="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/2022/07/logo.png 1x, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/2022/07/logo@2x.png 2x">
                                        </a>

                                        <a class="cs-footer__logo cs-logo-dark"
                                            href="https://caards.codesupply.co/caards/" previewlistener="true">
                                            <img src="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/2022/07/logo-dark.png"
                                                alt="Caards"
                                                srcset="https://caards.codesupply.co/caards/wp-content/uploads/sites/2/2022/07/logo-dark.png 1x, https://caards.codesupply.co/caards/wp-content/uploads/sites/2/2022/07/logo-dark@2x.png 2x">
                                        </a>
                                    </div>
                                    <div class="cs-footer__info">
                                        Our blog is dedicated to exploring the latest tech trends and innovations, from
                                        AI and machine learning to blockchain and virtual reality. We're a community of
                                        tech enthusiasts, entrepreneurs, and developers who are passionate about pushing
                                        the boundaries of what's possible. </div>
                                </div>
                            </div>
                            <div class="cs-footer__col cs-col-center">
                                <div class="cs-footer__inner">
                                    <nav class="cs-footer__nav">
                                        <div class="cs-footer__nav-item"><span class="cs-footer__nav-label">Demos</span>
                                            <ul class="cs-footer__nav-inner ">
                                                <li id="menu-item-3986"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-3986">
                                                    <a href="https://caards.codesupply.co/caards/"
                                                        previewlistener="true">Caards</a>
                                                </li>
                                                <li id="menu-item-3987"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3987">
                                                    <a href="https://caards.codesupply.co/firmware/"
                                                        previewlistener="true">Firmware</a>
                                                </li>
                                                <li id="menu-item-3988"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3988">
                                                    <a href="https://caards.codesupply.co/datacrunch/"
                                                        previewlistener="true">Datacrunch</a>
                                                </li>
                                                <li id="menu-item-3989"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3989">
                                                    <a href="https://caards.codesupply.co/foundr/"
                                                        previewlistener="true">Foundr</a>
                                                </li>
                                                <li id="menu-item-3990"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3990">
                                                    <a href="https://caards.codesupply.co/artboard/"
                                                        previewlistener="true">Artboard</a>
                                                </li>
                                                <li id="menu-item-3991"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3991">
                                                    <a href="https://caards.codesupply.co/design-loft/"
                                                        previewlistener="true">Design Loft</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="cs-footer__nav-item"><span
                                                class="cs-footer__nav-label">Categories</span>
                                            <ul class="cs-footer__nav-inner ">
                                                <li id="menu-item-3777"
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-3777">
                                                    <a href="https://caards.codesupply.co/caards/category/artificial-intelligence/"
                                                        previewlistener="true">Artificial Intelligence</a>
                                                </li>
                                                <li id="menu-item-3776"
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-3776">
                                                    <a href="https://caards.codesupply.co/caards/category/future-tech/connectivity/"
                                                        previewlistener="true">Connectivity</a>
                                                </li>
                                                <li id="menu-item-3772"
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-3772">
                                                    <a href="https://caards.codesupply.co/caards/category/gear/"
                                                        previewlistener="true">Gear</a>
                                                </li>
                                                <li id="menu-item-3773"
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-3773">
                                                    <a href="https://caards.codesupply.co/caards/category/future-tech/"
                                                        previewlistener="true">Future Tech</a>
                                                </li>
                                                <li id="menu-item-3774"
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-3774">
                                                    <a href="https://caards.codesupply.co/caards/category/future-tech/science/"
                                                        previewlistener="true">Science</a>
                                                </li>
                                                <li id="menu-item-3775"
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-3775">
                                                    <a href="https://caards.codesupply.co/caards/category/future-tech/business-tech/"
                                                        previewlistener="true">Business &amp; Tech</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            <div class="cs-footer__col cs-col-right">
                                <div class="cs-footer__inner">
                                    <div class="cs-footer-social-links">
                                        <div
                                            class="pk-social-links-wrap pk-social-links-template-nav pk-social-links-align-default pk-social-links-scheme-default pk-social-links-titles-disabled pk-social-links-counts-enabled pk-social-links-labels-disabled pk-social-links-mode-php pk-social-links-mode-rest">
                                            <div class="pk-social-links-items">
                                                <div class="pk-social-links-item pk-social-links-facebook pk-social-links-item-count"
                                                    data-id="facebook">
                                                    <a href="https://facebook.com/codesupplyco"
                                                        class="pk-social-links-link" target="_blank"
                                                        rel="nofollow noopener" aria-label="Facebook"
                                                        previewlistener="true">
                                                        <i class="pk-social-links-icon pk-icon pk-icon-facebook"></i>

                                                        <span class="pk-social-links-count pk-font-secondary">53</span>


                                                    </a>
                                                </div>
                                                <div class="pk-social-links-item pk-social-links-twitter pk-social-links-item-count"
                                                    data-id="twitter">
                                                    <a href="https://twitter.com/envato" class="pk-social-links-link"
                                                        target="_blank" rel="nofollow noopener" aria-label="Twitter"
                                                        previewlistener="true">
                                                        <i class="pk-social-links-icon pk-icon pk-icon-twitter"></i>

                                                        <span class="pk-social-links-count pk-font-secondary">71K</span>


                                                    </a>
                                                </div>
                                                <div class="pk-social-links-item pk-social-links-instagram pk-social-links-item-count"
                                                    data-id="instagram">
                                                    <a href="https://www.instagram.com/codesupply.co"
                                                        class="pk-social-links-link" target="_blank"
                                                        rel="nofollow noopener" aria-label="Instagram"
                                                        previewlistener="true">
                                                        <i class="pk-social-links-icon pk-icon pk-icon-instagram"></i>

                                                        <span class="pk-social-links-count pk-font-secondary">51</span>


                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cs-footer__bottom">
                    <div class="cs-container">
                        <div class="cs-footer__item">
                            <div class="cs-footer__col cs-col-left">
                                <div class="cs-footer__inner">
                                    <nav class="cs-footer__nav cs-footer__nav-horizontal">
                                        <div class="cs-footer__nav-item">
                                            <ul id="menu-main-1" class="cs-footer__nav-inner ">
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page current_page_parent menu-item-3881">
                                                    <a href="https://caards.codesupply.co/caards/blog/"
                                                        previewlistener="true">Blog</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-875">
                                                    <a href="https://caards.codesupply.co/caards/contact-form/"
                                                        previewlistener="true">Contacts</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2434">
                                                    <a href="https://caards.codesupply.co/caards/privacy-policy/"
                                                        previewlistener="true">Privacy Policy</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2432">
                                                    <a target="_blank" rel="noopener"
                                                        href="https://1.envato.market/buy-caards"
                                                        previewlistener="true">Buy Now</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            <div class="cs-footer__col cs-col-right">
                                <div class="cs-footer__inner">
                                    <div class="cs-footer__copyright">
                                        Designed &amp; Developed by <a href="https://codesupply.co/" target="_blank"
                                            previewlistener="true">Code Supply Co.</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>


        </div>


    </div>








    <script
        src="https://caards.codesupply.co/caards/wp-content/plugins/canvas/components/slider-gallery/block/flickity.pkgd.min.js?ver=2.4.1"
        id="flickity-js"></script>
    <script src="https://caards.codesupply.co/caards/wp-content/themes/caards/assets/js/scripts.js?ver=1.0.4"
        id="csco-scripts-js"></script>
    <style media="all" id="canvas-widget-blocks-dynamic-styles">
        .cnvs-block-opt-in-form-1658222795130 {
            margin-top: 64px !important;
        }

        .cnvs-block-social-links-1658222626196 {
            margin-top: 0px !important;
        }

        .cnvs-block-core-legacy-widget-1658919250481 {
            margin-top: 48px !important;
        }

        .cnvs-block-posts-1660142504931 {
            margin-top: 0px !important;
        }

        .cnvs-block-posts-1660142504931 .cs-posts-area__main {
            --cs-posts-area-grid-row-gap: 40px !important;
        }

        @media (max-width: 1584px) {
            .cnvs-block-posts-1660142504931 .cs-posts-area__main {
                --cs-posts-area-grid-row-gap: 40px !important;
            }
        }

        @media (max-width: 1279px) {
            .cnvs-block-posts-1660142504931 .cs-posts-area__main {
                --cs-posts-area-grid-row-gap: 40px !important;
            }
        }

        @media (max-width: 575px) {
            .cnvs-block-posts-1660142504931 .cs-posts-area__main {
                --cs-posts-area-grid-row-gap: 40px !important;
            }
        }

        .cnvs-block-posts-1660142504931 .cs-entry__title {
            --cs-entry-title-font-size: 1rem !important;
        }

        .cnvs-block-posts-1660142504931 .cs-entry__excerpt {
            --cs-font-entry-excerpt-size: 0.875rem !important;
        }

        .cnvs-block-posts-1660142664321 {
            margin-top: 0px !important;
        }

        .cnvs-block-posts-1660142664321 .cs-posts-area__main {
            --cs-posts-area-grid-row-gap: 40px !important;
        }

        @media (max-width: 1584px) {
            .cnvs-block-posts-1660142664321 .cs-posts-area__main {
                --cs-posts-area-grid-row-gap: 40px !important;
            }
        }

        @media (max-width: 1279px) {
            .cnvs-block-posts-1660142664321 .cs-posts-area__main {
                --cs-posts-area-grid-row-gap: 40px !important;
            }
        }

        @media (max-width: 575px) {
            .cnvs-block-posts-1660142664321 .cs-posts-area__main {
                --cs-posts-area-grid-row-gap: 40px !important;
            }
        }

        .cnvs-block-posts-1660142664321 .cs-entry__title {
            --cs-entry-title-font-size: 1rem !important;
        }

        .cnvs-block-posts-1660142664321 .cs-entry__excerpt {
            --cs-font-entry-excerpt-size: 0.875rem !important;
        }

        .cnvs-block-twitter-1658906149368 {
            margin-bottom: -24px !important;
        }

        .cnvs-block-featured-categories-1658222550955 .pk-featured-item .pk-featured-content:before {
            opacity: 0.3 !important;
        }

        .cnvs-block-social-links-1658222626196 {
            margin-top: 0px !important;
        }

        .cnvs-block-opt-in-form-1658222795130 {
            margin-top: 64px !important;
        }

        .cnvs-block-section-heading-1658222993011 {
            margin-bottom: 24px !important;
        }

        .cnvs-block-core-paragraph-1658223089864 {
            margin-top: 16px !important;
            margin-bottom: 16px !important;
        }

        .cnvs-block-row-1658223112100 {
            margin-top: 16px !important;
        }

        @media (max-width: 1584px) {
            .cnvs-block-row-1658223112100>.cnvs-block-row-inner {
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
            }
        }

        .cnvs-block-column-1658223112190 {
            -ms-flex-preferred-size: 41.666666666667%;
            flex-basis: 41.666666666667%;
        }

        @media (max-width: 1584px) {
            .cnvs-block-column-1658223112190 {
                -ms-flex-preferred-size: 41.666666666667%;
                flex-basis: 41.666666666667%;
            }
        }

        @media (max-width: 1279px) {
            .cnvs-block-column-1658223112190 {
                -ms-flex-preferred-size: 100%;
                flex-basis: 100%;
            }
        }

        @media (max-width: 575px) {
            .cnvs-block-column-1658223112190 {
                -ms-flex-preferred-size: 100%;
                flex-basis: 100%;
            }
        }

        @media (max-width: 1279px) {
            .cnvs-block-core-buttons-1658223130672 {
                margin-bottom: 24px !important;
            }
        }

        .cnvs-block-column-1658223112197 {
            -ms-flex-preferred-size: 58.333333333333%;
            flex-basis: 58.333333333333%;
        }

        @media (max-width: 1584px) {
            .cnvs-block-column-1658223112197 {
                -ms-flex-preferred-size: 58.333333333333%;
                flex-basis: 58.333333333333%;
            }
        }

        @media (max-width: 1279px) {
            .cnvs-block-column-1658223112197 {
                -ms-flex-preferred-size: 100%;
                flex-basis: 100%;
            }
        }

        @media (max-width: 575px) {
            .cnvs-block-column-1658223112197 {
                -ms-flex-preferred-size: 100%;
                flex-basis: 100%;
            }
        }

        .cnvs-block-core-image-1662013393151 {
            margin-top: 0px !important;
        }

        .cnvs-block-core-image-1662013395038 {
            margin-top: 0px !important;
        }

        .cnvs-block-core-group-1662014127551 {
            margin-top: 300px !important;
        }

        @media (max-width: 1279px) {
            .cnvs-block-core-group-1662014127551 {
                margin-top: 50px !important;
            }
        }

        .cnvs-block-core-image-1662014146391 {
            margin-top: 0px !important;
            margin-bottom: 0px !important;
        }

        .cnvs-block-core-image-1662014155799 {
            margin-top: 0px !important;
            margin-bottom: 0px !important;
        }

        .cnvs-block-section-heading-1658222993011 .cnvs-section-title {
            font-size: 40px !important;
        }

        @media (max-width: 1584px) {
            .cnvs-block-section-heading-1658222993011 .cnvs-section-title {
                font-size: 32px !important;
            }
        }

        @media (max-width: 1279px) {
            .cnvs-block-section-heading-1658222993011 .cnvs-section-title {
                font-size: 28px !important;
            }
        }

        @media (max-width: 575px) {
            .cnvs-block-section-heading-1658222993011 .cnvs-section-title {
                font-size: 28px !important;
            }
        }
    </style>
</body>

</html>

</html>