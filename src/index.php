<?php
/**
 * This is just to demonstrate how you can use it.
 * 
 * It's enough to call this function without any arguments:
 * writingor_render_page_default()
 * 
 * However, sometimes it may be necessary to pass
 * specific HTML hardcoded instead of 
 * the_content().
 * 
 * --------------------------------
 * Yes, typically these blocks are placed
 * in ACF-based template parts
 * or custom Gutenberg blocks.
 * --------------------------------
 * 
 */

ob_start();
?>
<!-- title-block-1 -->
<div class="title-block-1">
    <div class="title-block-1__container container">
        <div class="title-block-1__content">
            <h1 class="title-1">
                <b>
                    Bringing Your Ideas<br>
                    to Life
                </b>
            </h1>
        </div>
    </div>
</div>
<!--/ title-block-1 -->

<section id="services">
    <!-- title-block-1 -->
    <div class="title-block-1">
        <div class="title-block-1__container container">
            <div class="title-block-1__content">
                <h2 class="title-block-1__title title-2 _centered _lh-s _color-primary">
                    Services
                </h2>
            </div>
        </div>
    </div>
    <!--/ title-block-1 -->

    <div class="layout-1">
        <div class="layout-1__container container">
            <div class="layout-1__content">
                <!-- service-card-1 -->
                <div class="service-card-1 --cursor-light ">
                    <div class="service-card-1__picture">
                        <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/icon/html.svg" alt="picture">
                    </div>
                    <div class="service-card-1__body">
                        <div class="service-card-1__main">
                            <h3 class="service-card-1__title title-3 _color-primary">
                                Figma to HTML + CSS + JS
                            </h3>
                            <p class="service-card-1__text _fsz-m _lh-m _mt-mb-xs">
                                Responsive-adaptive HTML-markup for various CMS and frameworks using the BEM methodology.
                            </p>
                        </div>

                        <button class="service-card-1__button button-1 _tt-lc _no-shadow" data-modal="#contact-modal">
                            <span>from</span>
                            <span>&nbsp;</span>
                            <span>$</span>
                            <span>300</span>
                        </button>
                    </div>
                </div>
                <!--/ service-card-1 -->
                <!-- service-card-1 -->
                <div class="service-card-1 --cursor-light ">
                    <div class="service-card-1__picture">
                        <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/icon/react.svg" alt="picture">
                    </div>
                    <div class="service-card-1__body">
                        <div class="service-card-1__main">
                            <h3 class="service-card-1__title title-3 _color-primary">
                                Front-end dev with ReactJS
                            </h3>
                            <p class="service-card-1__text _fsz-m _lh-m _mt-mb-xs">
                                Development using Feature-Sliced Design (an architectural methodology).
                            </p>
                        </div>

                        <button class="service-card-1__button button-1 _tt-lc _no-shadow" data-modal="#contact-modal">
                            <span>from</span>
                            <span>&nbsp;</span>
                            <span>$</span>
                            <span>700</span>
                        </button>
                    </div>
                </div>
                <!--/ service-card-1 -->
                <!-- service-card-1 -->
                <div class="service-card-1 --cursor-light ">
                    <div class="service-card-1__picture">
                        <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/icon/wp.svg" alt="picture">
                    </div>
                    <div class="service-card-1__body">
                        <div class="service-card-1__main">
                            <h3 class="service-card-1__title title-3 _color-primary">
                                Full-stack WordPress dev
                            </h3>
                            <p class="service-card-1__text _fsz-m _lh-m _mt-mb-xs">
                                Complete website development using the WordPress API.
                            </p>
                        </div>

                        <button class="service-card-1__button button-1 _tt-lc _no-shadow" data-modal="#contact-modal">
                            <span>from</span>
                            <span>&nbsp;</span>
                            <span>$</span>
                            <span>500</span>
                        </button>
                    </div>
                </div>
                <!--/ service-card-1 -->
                <!-- service-card-1 -->
                <div class="service-card-1 --cursor-light ">
                    <div class="service-card-1__picture">
                        <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/icon/django.svg" alt="picture">
                    </div>
                    <div class="service-card-1__body">
                        <div class="service-card-1__main">
                            <h3 class="service-card-1__title title-3 _color-primary">
                                Full-stack Django dev
                            </h3>
                            <p class="service-card-1__text _fsz-m _lh-m _mt-mb-xs">
                                Build website with python Django!
                            </p>
                        </div>

                        <button class="service-card-1__button button-1 _tt-lc _no-shadow" data-modal="#contact-modal">
                            <span>from</span>
                            <span>&nbsp;</span>
                            <span>$</span>
                            <span>900</span>
                        </button>
                    </div>
                </div>
                <!--/ service-card-1 -->
            </div>
        </div>
    </div>
</section>

<section id="benefits">
    <!-- title-block-1 -->
    <div class="title-block-1">
        <div class="title-block-1__container container">
            <div class="title-block-1__content">
                <h2 class="title-block-1__title title-2 _centered _lh-s _color-primary">
                    Benefits
                </h2>
            </div>
        </div>
    </div>
    <!--/ title-block-1 -->

    <div class="layout-1">
        <div class="layout-1__container container">
            <div class="layout-1__content">

                <p class="title-2 _centered _color-primary">
                    I'm a private developer
                </p>

                <p class="_fsz-m _centered _color-primary">
                    and I have many advantages
                </p>
                <br>

                <div class="grid-2">
                    <!-- benefit-card-1 -->
                    <div class="benefit-card-1 --cursor-light">
                        <h3 class="benefit-card-1__title title-3 _mt-mb-s _centered">
                            Flexible terms
                        </h3>
                        <p class="benefit-card-1__text _fsz-m _lh-m _mt-mb-s _color-white">
                            As a private developer, I offer more flexible working conditions and an individual approach to each client.
                        </p>
                        <p class="benefit-card-1__text _fsz-m _lh-m _mt-mb-s _color-white">
                            I’m ready to discuss the details and adjust the project according to your needs.
                        </p>
                    </div>
                    <!--/ benefit-card-1 -->
                    <!-- benefit-card-1 -->
                    <div class="benefit-card-1 --cursor-light">
                        <h3 class="benefit-card-1__title title-3 _mt-mb-s _centered">
                            High responsibility
                        </h3>
                        <p class="benefit-card-1__text _fsz-m _lh-m _mt-mb-s _color-white">
                            I work on the project more carefully, as the quality of work is directly related to my name and reputation.
                        </p>
                        <p class="benefit-card-1__text _fsz-m _lh-m _mt-mb-s _color-white">
                            I’ m not distracted by other projects and focused on solving current problems.
                        </p>
                    </div>
                    <!--/ benefit-card-1 -->
                    <!-- benefit-card-1 -->
                    <div class="benefit-card-1 --cursor-light">
                        <h3 class="benefit-card-1__title title-3 _mt-mb-s _centered">
                            Better Communication
                        </h3>
                        <p class="benefit-card-1__text _fsz-m _lh-m _mt-mb-s _color-white">
                            I promptly respond to all questions and suggestions.
                        </p>
                        <p class="benefit-card-1__text _fsz-m _lh-m _mt-mb-s _color-white">
                            Communication takes place directly with me, which allows us to avoid mistakes in the interpretation of tasks and simplify the process of discussing and changing the project.
                        </p>
                    </div>
                    <!--/ benefit-card-1 -->
                </div>
            </div>
        </div>
    </div>
</section>

<section id="portfolio">
    <!-- title-block-1 -->
    <div class="title-block-1">
        <div class="title-block-1__container container">
            <div class="title-block-1__content">
                <h2 class="title-block-1__title title-2 _centered _lh-s _color-primary">
                    Last Public Works
                </h2>
            </div>
        </div>
    </div>
    <!--/ title-block-1 -->

    <div class="layout-1">
        <div class="layout-1__container container">
            <div class="layout-1__content">
                <div class="grid-2">
                    <!-- portfolio-card-1 -->
                    <a title="https://moo.la/" href="https://moo.la/" target="_blank" rel="noreferrer noopener" class="portfolio-card-1 --set-mouse">
                        <div class="portfolio-card-1__cover --cursor-light">
                            <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/other/moola.jpg" alt="moo.la">
                        </div>
                        <div class="portfolio-card-1__footer">
                            <div class="portfolio-card-1__footer-container --cursor-light">
                                <div class="portfolio-card-1__text">moo.la</div>
                            </div>
                        </div>
                    </a>
                    <!--/ portfolio-card-1 -->
                    <!-- portfolio-card-1 -->
                    <a title="https://dscrinvestors.net/" href="https://dscrinvestors.net/" target="_blank" rel="noreferrer noopener"  class="portfolio-card-1 --set-mouse">
                        <div class="portfolio-card-1__cover --cursor-light">
                            <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/other/dscr.jpg" alt="dscrinvestors.net">
                        </div>
                        <div class="portfolio-card-1__footer">
                            <div class="portfolio-card-1__footer-container --cursor-light">
                                <div class="portfolio-card-1__text">dscrinvestors.net</div>
                            </div>
                        </div>
                    </a>
                    <!--/ portfolio-card-1 -->
                    <!-- portfolio-card-1 -->
                    <a title="https://alfamedstar.co.uk/" href="https://alfamedstar.co.uk/" target="_blank" rel="noreferrer noopener" class="portfolio-card-1 --set-mouse">
                        <div class="portfolio-card-1__cover --cursor-light">
                            <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/other/alfamedstar.jpg" alt="alfamedstar.co.uk">
                        </div>
                        <div class="portfolio-card-1__footer">
                            <div class="portfolio-card-1__footer-container --cursor-light">
                                <div class="portfolio-card-1__text">alfamedstar.co.uk</div>
                            </div>
                        </div>
                    </a>
                    <!--/ portfolio-card-1 -->
                    <!-- portfolio-card-1 -->
                    <a title="https://school.mzeroa.com/lite/" href="https://school.mzeroa.com/lite/" target="_blank" rel="noreferrer noopener" class="portfolio-card-1 --set-mouse">
                        <div class="portfolio-card-1__cover --cursor-light">
                            <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/other/mzeroa.png" alt="school.mzeroa.com/lite/">
                        </div>
                        <div class="portfolio-card-1__footer">
                            <div class="portfolio-card-1__footer-container --cursor-light">
                                <div class="portfolio-card-1__text">school.mzeroa.com/lite/</div>
                            </div>
                        </div>
                    </a>
                    <!--/ portfolio-card-1 -->
                    <!-- portfolio-card-1 -->
                    <a title="https://www.escape-campers.co.uk" href="https://www.escape-campers.co.uk" target="_blank" rel="noreferrer noopener" class="portfolio-card-1 --set-mouse">
                        <div class="portfolio-card-1__cover --cursor-light">
                            <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/other/escape-campers.png" alt="www.escape-campers.co.uk">
                        </div>
                        <div class="portfolio-card-1__footer">
                            <div class="portfolio-card-1__footer-container --cursor-light">
                                <div class="portfolio-card-1__text">www.escape-campers.co.uk</div>
                            </div>
                        </div>
                    </a>
                    <!--/ portfolio-card-1 -->
                    <!-- portfolio-card-1 -->
                    <a title="https://ormari.rs/en/" href="https://ormari.rs/en/" target="_blank" rel="noreferrer noopener"  class="portfolio-card-1 --set-mouse">
                        <div class="portfolio-card-1__cover --cursor-light">
                            <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/other/elfa.png" alt="ormari.rs">
                        </div>
                        <div class="portfolio-card-1__footer">
                            <div class="portfolio-card-1__footer-container --cursor-light">
                                <div class="portfolio-card-1__text">ormari.rs</div>
                            </div>
                        </div>
                    </a>
                    <!--/ portfolio-card-1 -->
                    <!-- portfolio-card-1 -->
                    <a title="https://flora-fauna.us/" href="https://flora-fauna.us/" target="_blank" rel="noreferrer noopener"  class="portfolio-card-1 --set-mouse">
                        <div class="portfolio-card-1__cover --cursor-light">
                            <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/other/flora-fauna.png" alt="flora-fauna.us">
                        </div>
                        <div class="portfolio-card-1__footer">
                            <div class="portfolio-card-1__footer-container --cursor-light">
                                <div class="portfolio-card-1__text">flora-fauna.us</div>
                            </div>
                        </div>
                    </a>
                    <!--/ portfolio-card-1 -->
                    <!-- portfolio-card-1 -->
                    <a title="https://homefeelings.eu/" href="https://homefeelings.eu/" target="_blank" rel="noreferrer noopener" class="portfolio-card-1 --set-mouse">
                        <div class="portfolio-card-1__cover --cursor-light">
                            <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/other/homefeelings.png" alt="homefeelings.eu">
                        </div>
                        <div class="portfolio-card-1__footer">
                            <div class="portfolio-card-1__footer-container --cursor-light">
                                <div class="portfolio-card-1__text">homefeelings.eu</div>
                            </div>
                        </div>
                    </a>
                    <!--/ portfolio-card-1 -->
                    <!-- portfolio-card-1 -->
                    <a title="https://enomat.rs/" href="https://enomat.rs/" target="_blank" rel="noreferrer noopener"  class="portfolio-card-1 --set-mouse">
                        <div class="portfolio-card-1__cover --cursor-light">
                            <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/other/enomat.png" alt="enomat.rs">
                        </div>
                        <div class="portfolio-card-1__footer">
                            <div class="portfolio-card-1__footer-container --cursor-light">
                                <div class="portfolio-card-1__text">enomat.rs</div>
                            </div>
                        </div>
                    </a>
                    <!--/ portfolio-card-1 -->
                </div>
            </div>
        </div>
    </div>
</section>

<section id="reviews">
    <!-- title-block-1 -->
    <div class="title-block-1">
        <div class="title-block-1__container container">
            <div class="title-block-1__content">
                <h2 class="title-block-1__title title-2 _centered _lh-s _color-primary">
                    Reviews
                </h2>
            </div>
        </div>
    </div>
    <!--/ title-block-1 -->

    <div class="layout-1 _o-h">
        <div class="layout-1__container container">
            <div class="layout-1__content">
                <div class="slider-1">
                    <div class="slider-1__container swiper-wrapper --observe-event">
                        <!-- review-card-1 -->
                        <div class="review-card-1 swiper-slide --cursor-light">
                            <div class="review-card-1__header">
                                <div class="review-card-1__header-avatar">
                                    <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/photo/photo-2.jpg" alt="Angela W.">
                                </div>
                                <div class="review-card-1__header-info">
                                    <h3 class="review-card-1__header-info-title">
                                        I am
                                    </h3>
                                    <p class="review-card-1__header-info-text">
                                        a humble master..
                                    </p>
                                </div>
                            </div>
                            <div class="review-card-1__main">
                                <p class="review-card-1__main-text">
                                    I don’t collect reviews.
                                </p>
                                <p class="review-card-1__main-text">
                                    You are business people: why should you read specially selected rave reviews?
                                </p>
                            </div>
                            <div class="review-card-1__footer">
                                <!-- pass -->
                            </div>
                        </div>
                        <!--/ review-card-1 -->
                        <!-- review-card-1 -->
                        <div class="review-card-1 swiper-slide --cursor-light">
                            <div class="review-card-1__header">
                                <div class="review-card-1__header-avatar">
                                    <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/photo/photo-3.jpg" alt="photo">
                                </div>
                                <div class="review-card-1__header-info">
                                    <h3 class="review-card-1__header-info-title">
                                        👤 Still I am!
                                    </h3>
                                    <p class="review-card-1__header-info-text">
                                        👀
                                    </p>
                                </div>
                            </div>
                            <div class="review-card-1__main">
                                <p class="review-card-1__main-text">
                                    Better look at my real work in the portfolio section!
                                </p>
                                <p class="review-card-1__main-text">
                                    Unlike reviews, you can easily open it and see that everything works great.
                                </p>
                            </div>
                            <div class="review-card-1__footer">
                                <!-- pass -->
                            </div>
                        </div>
                        <!--/ review-card-1 -->
                        <!-- review-card-1 -->
                        <div class="review-card-1 swiper-slide --cursor-light">
                            <div class="review-card-1__header">
                                <div class="review-card-1__header-avatar">
                                    <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/photo/photo-1.jpg" alt="photo">
                                </div>
                                <div class="review-card-1__header-info">
                                    <h3 class="review-card-1__header-info-title">
                                        And yet:
                                    </h3>
                                    <p class="review-card-1__header-info-text">
                                        ⭐⭐⭐⭐⭐
                                    </p>
                                </div>
                            </div>
                            <div class="review-card-1__main">
                                <p class="review-card-1__main-text">
                                    I recommend me. 
                                </p>
                                <p class="review-card-1__main-text">
                                    It's a dedication to producing top-quality work.
                                </p>
                            </div>
                            <div class="review-card-1__footer">
                                <!-- pass -->
                            </div>
                        </div>
                        <!--/ review-card-1 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about-me">
    <!-- title-block-1 -->
    <div class="title-block-1">
        <div class="title-block-1__container container">
            <div class="title-block-1__content">
                <h2 class="title-block-1__title title-2 _centered _lh-s _color-primary">
                    About Me
                </h2>
            </div>
        </div>
    </div>
    <!--/ title-block-1 -->

    <div class="layout-1">
        <div class="layout-1__container container">
            <div class="layout-1__content">
                <div class="grid-1 ">
                    <div class="img-1 _radius-half">
                        <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/photo/photo.jpg" alt="photo">
                    </div>

                    <div class="text-block-1 _pt-pb-m">
                        <p class="_fsz-m _lh-m _mt-mb-s">
                            Hi! I’m Igor.
                        </p>
                        <p class="_fsz-m _lh-m _mt-mb-s">
                            I’m an <b>experienced Full-stack web developer</b>. Most skilled in ReactJS, WordPress API and Django REST.
                        </p>
                        <hr>
                        <p class="_fsz-m _lh-m _mt-mb-s">
                            I am developing useful, user-friendly web applications with a strong background in both front-end and back-end development.
                        </p>
                        <p class="_fsz-m _lh-m _mt-mb-s">
                            The objective is to provide top-level solutions with more than the customer's expected level of service.
                        </p>
                        <p class="_fsz-m _lh-m _mt-mb-s">
                            If you are looking for a coder ready to work in a team or individually, feel free to contact me and we will discuss your project!
                        </p>
                        <hr>
                        <p class="_fsz-m _lh-m _mt-mb-s">
                            So, let's build something amazing together!
                        </p>
                        <button class="button-1 _tt-lc _mt-mb-l --cursor-follow" data-modal="#contact-modal">
                            <span>🥷🏻</span>
                            <span>a</span>
                            <span>r</span>
                            <span>e</span>
                            <span>&nbsp;</span>
                            <span>y</span>
                            <span>o</span>
                            <span>u</span>
                            <span>&nbsp;</span>
                            <span>r</span>
                            <span>e</span>
                            <span>d</span>
                            <span>y</span>
                            <span>?</span>
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<section id="contacts">
    <!-- title-block-1 -->
    <div class="title-block-1">
        <div class="title-block-1__container container">
            <div class="title-block-1__content">
                <h2 class="title-block-1__title title-2 _centered _lh-s _color-primary">
                    Contacts
                </h2>
            </div>
        </div>
    </div>
    <!--/ title-block-1 -->

    <div class="layout-1">
        <div class="layout-1__container container">
            <div class="layout-1__content">
                <div class="grid-2">
                    <!-- contact-card -->
                    <a href="https://t.me/writingor" target="_blank" rel="noreferrer noopener" class="contact-card --cursor-light">
                        <div class="contact-card__icon">
                            <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/icon/icons8-telegram.svg" alt="telegram">
                        </div>
                        <div class="contact-card__text">
                            Telegram
                        </div>
                    </a>
                    <!--/ contact-card -->
                    <!-- contact-card -->
                    <a href="https://www.linkedin.com/in/writingor" target="_blank" rel="noreferrer noopener" class="contact-card --cursor-light">
                        <div class="contact-card__icon">
                            <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/icon/icons8-linkedin.svg" alt="linkedin">
                        </div>
                        <div class="contact-card__text">
                            LinkedIn
                        </div>
                    </a>
                    <!--/ contact-card -->
                    <!-- contact-card -->
                    <a href="https://github.com/writingor" target="_blank" rel="noreferrer noopener" class="contact-card --cursor-light">
                        <div class="contact-card__icon">
                            <img loading="lazy" src="<?= get_template_directory_uri() ?>/assets/img/icon/icons8-github.svg" alt="github">
                        </div>
                        <div class="contact-card__text">
                            GitHub
                        </div>
                    </a>
                    <!--/ contact-card -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_contents();
ob_end_clean();

writingor_render_page_default($content);
