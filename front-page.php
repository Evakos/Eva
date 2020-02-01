<?php
/**
 * Template Name: Full Width Home Page
 *
 * @package WordPress
 * @subpackage Evakos
 * @since Evakos 1.0
 */

?>

<?php get_header(); ?>

<?php get_template_part( 'partials/nav', 'bar' ); ?>

<div class='wrapper'>

    <hero>

        <div class='banner'>

            <div class='row'>

                <div class='col'>

                    <div class='text-box'>

                        <h1>Built for Success</h1>
                        <p>Experienced Site Creation & Support Professionals</p>

                        <p>We are a innovative, dynamic design and business web support service.
                            Keeping your site healthy and you happy. </p>

                    </div>

                </div>

                <div class='col'>

                    <div class='box'>

                        <?php echo do_shortcode('[eks-wc-reg]'); ?>

                    </div>

                </div>

            </div> <!-- End Row -->

        </div><!-- End Banner -->

    </hero><!-- End Hero Section -->

    <main>

        <section class='services-section'>

            <div class='row'>

                <div class='col'>

                    <div class='services-grid-container'>

                        <div class='services-item-1'>

                            <h3>Services</h3>

                            <p>

                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet dui ligula.
                                Mauris
                                tincidunt tellus enim, ut fringilla nisl ultrices at. Nunc aliquet aliquam convallis.
                                Etiam
                                vitae consectetur massa.</p>


                        </div>

                        <div class='services-item-2'>

                            <h4>127 Current Clients</h4>

                        </div>

                        <div class='services-item-3'>

                            <h4>Another One</h4>

                        </div>

                        <div class='services-item-4'>

                            <h4>Dynamic Hosting & Support</h4>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <section class='portfolio-section'>

            <div class='row'>

                <div class='col'>

                    <div class='text-box'>

                        <h2>Beautifully Imagined Design</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut
                            laoreet dolore magna aliquam erat volutpat.</p>

                    </div>

                </div>

                <div class='col'>

                    <div class='box'>

                    </div>

                </div>

            </div>

        </section>

        <section class='price-section'>

            <div class='row'>

                <div class='col'>

                    <div class='prices-grid-container'>

                        <div class='prices-item-1'>

                            <div class='price-img-design'></div>

                            <h3 style='font-size:2rem'>Site Design</h3>
                            <p>Beautifully designed, well-imagined websites that work, that convert, that make you and
                                your
                                clients happy.</p>
                            <ul class='price-list'>
                                <li>Considered High-End Design</li>
                                <li>Performance Optimisation</li>
                                <li>SEO Optimised</li>
                                <li> <strong>3 Months</strong> Hosting & Support</li>
                            </ul>
                            <h4 class='alt-title spacer'><span style='font-size:70%'>From</span>
                                <strong>$899.00</strong>
                            </h4>

                            <a href="#" class="button alt">Get Quote</a>


                        </div>

                        <div class='prices-item-2'>

                            <div class='price-img-support'></div>

                            <h3 style='font-size:2rem'>Support & Hosting</h3>
                            <p>A fully manged support package for your site with one personal point of contact. Some
                                more
                                text.</p>
                            <ul class='price-list'>
                                <li>Fast, Secure, Hosting</li>
                                <li> Personal Support</li>
                                <li> Monthly Reporting</li>
                                <li> 3 x Single Incident Fixes</li>
                            </ul>
                            <h4 class='alt-title spacer'><strong>$39.00 <span style='font-size:70%'>/ pm</span></strong>
                            </h4>

                            <a href="/product/premium-hosting-support/" class="button alt">Get Quote</a>

                        </div>

                        <div class='prices-item-3'>

                            <div class='price-img-fixes'></div>

                            <h3 style='font-size:2rem'><strong>Single Incident Fix</strong></h3>
                            <p>Beautifully designed, well-imagined websites that work, that convert, that make you and
                                your
                                clients happy.</p>
                            <ul class='price-list'>
                                <li> Free Assessment</li>
                                <li> Quick Turnaround</li>
                                <li> Point 1</li>
                                <li>Money Back Guarantee </li>
                            </ul>
                            <h4 class='alt-title spacer'><span style='font-size:80%'>From</span> <strong>
                                    $19.99</strong>
                            </h4>

                            <a href="#" class="button alt">Get Quote</a>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>
    <footer><?php get_footer(); ?></footer>