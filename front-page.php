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

<div class='wrapper'>

    <div class="hero">

        <?php get_template_part( 'partials/nav', 'bar' ); ?>

        <div class='row'>

            <div class='col'>

                <div class='text-box'>

                    <h1>Built for Success</h1>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                        tincidunt ut
                        laoreet dolore magna aliquam erat volutpat.</p>

                </div>

            </div>

            <div class='col'>

                <div class='box'>

                    <?php echo do_shortcode('[eks-wc-reg]'); ?>


                </div>

            </div>



        </div>

    </div>

    <main>

        <div class='row'>

            <div class='col'>

                <div class='services-grid-container'>

                    <div class='services-item-1'>

                        <h3>Services</h3>

                        <p>

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet dui ligula. Mauris
                            tincidunt tellus enim, ut fringilla nisl ultrices at. Nunc aliquet aliquam convallis. Etiam
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


        <div class='row'>

            <div class='col'>

                <div class='prices-grid-container'>

                    <div class='prices-item-1'>

                        <h3>Bespoke Site Design</h3>
                        <p>Beautifully designed, well-imagined websites that work, that convert, that make you and your
                            clients happy.</p>
                        <ul class='eks-list'>
                            <li>Considered High-End Design</li>
                            <li>Performance Optimisation</li>
                            <li>SEO Optimised</li>
                            <li> <strong>3 Months</strong> Hosting & Support</li>
                        </ul>
                        <h3><span style='font-size:80%'>From</span> <strong>$899.00</strong></h3>


                    </div>

                    <div class='prices-item-2'>

                        <h4><strong>Support & Hosting</strong></h4>
                        <p>A fully manged support package for your site with one personal point of contact. Some more
                            text.</p>
                        <ul class='eks-list'>
                            <li>Fast, Secure, Hosting</li>
                            <li> Personal Support</li>
                            <li> Monthly Reporting</li>
                            <li> 3 x Single Incident Fixes</li>
                        </ul>
                        <h2><strong>$39.00 <span style='font-size:80%'>/ pm</span></strong></h2>



                    </div>

                    <div class='prices-item-3'>

                        <h3><strong>Single Incident Fix</strong></h3>
                        <p>Beautifully designed, well-imagined websites that work, that convert, that make you and your
                            clients happy.</p>
                        <ul class='eks-list'>
                            <li> Free Assessment</li>
                            <li> Quick Turnaround</li>
                            <li> Point 1</li>
                            <li>Money Back Guarantee </li>
                        </ul>
                        <h3><span style='font-size:80%'>From</span> <strong> $19.99</strong></h3>



                    </div>





                </div>

            </div>





        </div>



    </main>
    <footer><?php get_footer(); ?></footer>
</div>