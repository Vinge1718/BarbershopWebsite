
<!-- PHP INCLUDES -->

<?php

    include "connect.php";
    include "Includes/templates/header.php";
    include "Includes/templates/navbar.php";

?>
<style type="text/css">
    h2, h3, h4, h5, h6 {
    font-family: 'Prata', sans-serif;
}

.padding-10 {
    padding: 10px;
}

@media (max-width: 995px)
{
    .mainmenu {
    display: none!important;
    
}

.padd_col_res
{
    padding: 15px;
}


}

@media (max-width: 767px)
{
.book_bg {
    display: none;
}
}

</style>
    
    <!-- HOME SECTION -->
    
    <section class="home-section" id="home-section" style="padding: 100px 0px;">
	    <div class="home-section-content">
			<div class="container">
			    <div>
                    <h3 style="font-size: 20px;margin-bottom: 20px;color: #ddd;font-family: 'Montserrat';">
                        Its Not Just a Haircut, Its an Experience.
                    </h3>
                    <h1 style="color: #fff;font-family: 'Prata',sans-serif;font-size: 52px;line-height: 62px;margin: 0 0 10px;letter-spacing: -0.02em;font-weight: 400;">
                        Being a barber is about 
                        <br>
                        taking care of the people.
                    </h1>
                    <p style="margin-bottom: 20px;color: #ddd;">
                        Our barbershop is the territory created purely for males who appreciate
                        <br>
                        premium quality, time, and flawless look.
                    </p>
                    <a href="#booking" class="default_btn" style="opacity: 1;">Make Appointment</a>
                </div>
			</div>
		</div>
	</section>

    <!-- ABOUT SECTION -->

    <section id="about" class="about_section" style="padding: 80px 0;border-bottom: 2px solid #eee">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about_content" style="text-align: center;">
                        <h3 style="font-size: 17px;">Introducing</h3>
                        <h2 style="font-size: 36px;
    line-height: 46px;
    color: #9e8a78;
    font-family: 'Prata', sans-serif;
    margin-bottom: 30px;">The Barber Shop <br>Science 1991</h2>
                        <img src="Design/images/about-logo.png" alt="logo">
                        <p style="color: #777">Barber is a person whose occupation is mainly to cut dress groom style and shave men's and boys' hair. A barber's place of work is known as a "barbershop" or a "barber's". Barbershops are also places of social interaction and public discourse. In some instances, barbershops are also public forums.</p>
                        <a href="#" class="default_btn" style="opacity: 1;">More about us</a>
                    </div>
                </div>
                <div class="col-md-6  d-none d-md-block">
                    <div class="about_img">
                        <img class="about_img_1" src="Design/images/about-1.jpg" alt="about-1">
                        <img class="about_img_2" src="Design/images/about-2.jpg" alt="about-2">
                        <img class="about_img_3" src="Design/images/about-3.jpg" alt="about-3">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->

    <section class="services_section" id="services" style="padding: 80px 0px; background-color: #fcf9f5">
        <div class="container">
            <div class="section_heading">
                <h3 style="color: #9e8a78;
    font-weight: 400;
    font-family: 'Prata', sans-serif;
    font-size: 17px">Trendy Salon & Spa</h3>
                <h2 style="font-size: 36px;
    line-height: 48px;
    font-weight: 400;
    letter-spacing: 0;">Our Services</h2>
                <div class="heading-line"></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 padd_col_res">
                    <div class="service_box">
                        <i class="bs bs-scissors-1"></i>
                        <h3>Haircut Styles</h3>
                        <p>Barber is a person whose occupation is mainly to cut dress style.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 padd_col_res">
                    <div class="service_box">
                        <i class="bs bs-razor-2"></i>
                        <h3>Beard Triming</h3>
                        <p>Barber is a person whose occupation is mainly to cut dress style.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 padd_col_res">
                    <div class="service_box">
                        <i class="bs bs-brush"></i>
                        <h3>Smooth Shave</h3>
                        <p>Barber is a person whose occupation is mainly to cut dress style.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 padd_col_res">
                    <div class="service_box">
                        <i class="bs bs-hairbrush-1"></i>
                        <h3>Face Masking</h3>
                        <p>Barber is a person whose occupation is mainly to cut dress style.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BOOKING SECTION -->

    <section class="book_section" id="booking" style="background-color: #222227;position: relative;padding:80px 0px">
        <div class="book_bg"></div>
        <div class="map_pattern"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-6">
                    <form action="appointment.php" method="post" id="appointment_form" class="form-horizontal appointment_form">
                        <div class="book_content">
                            <h2 style="color: white;">Make an appointment</h2>
                            <p style="color: #999;">Barber is a person whose occupation is mainly to cut dress groom <br>style and shave men's and boys hair.</p>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 padding-10">
                                
                            <input type="date" class="form-control" name="date_" value="<?php echo (isset($_POST['date_']))?$_POST['date_']:''  ?>">
                            <?php
                            $flag_date_time_form = 0;
                            if(isset($_POST['send-date-time']))
                            {
                                if(empty($_POST['date_']))
                                {
                                    ?>
                                    <div class='error_div'>
                                        <span class="error_message">THIS FIELD IS REQUIRED.</span>
                                    </div>
                                    <?php
                                    $flag_date_time_form = 1;
                                }
                            }
                            ?>
                            </div>
                            <div class="col-md-6 padding-10">
                                <input type="time" class="form-control" name="time_" min="09:00" max="23:00" value="<?php echo (isset($_POST['time_']))?$_POST['time_']:''  ?>">
                            <?php
                            if(isset($_POST['send-date-time']))
                            {
                                if(empty($_POST['time_']))
                                {
                                    ?>
                                    <div class='error_div'>
                                        <span class="error_message">THIS FIELD IS REQUIRED.</span>
                                    </div>
                                    <?php
                                    $flag_date_time_form = 1;
                                }
                            }
                            ?>
                            </div>
                        </div>

                        <!-- SUBMIT BUTTON -->

                        <button id="app_submit" class="default_btn" type="submit">Make Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- TEAM SECTION -->

    <section id="team" class="team_section" style="border-bottom: 2px solid #eee;padding:80px 0px;">
        <div class="container">
            <div class="section_heading ">
                <h3 style="color: #9e8a78;
    font-weight: 400;
    font-family: 'Prata', sans-serif;
    font-size: 17px">Trendy Salon & Spa</h3>
                <h2 style="font-size: 36px;
    line-height: 48px;
    font-weight: 400;
    letter-spacing: 0;">Our Barbers</h2>
                <div class="heading-line"></div>
            </div>
            <ul class="team_members row"> 
                <li class="col-lg-3 col-md-6 padd_col_res">
                    <div class="team_member">
                        <img src="Design/images/team-1.jpg" alt="Team Member">
                    </div>
                </li>
                <li class="col-lg-3 col-md-6 padd_col_res">
                    <div class="team_member">
                        <img src="Design/images/team-2.jpg" alt="Team Member">
                    </div>
                </li>
                <li class="col-lg-3 col-md-6 padd_col_res">
                    <div class="team_member">
                        <img src="Design/images/team-3.jpg" alt="Team Member">
                    </div>
                </li>
                <li class="col-lg-3 col-md-6 padd_col_res">
                    <div class="team_member">
                        <img src="Design/images/team-4.jpg" alt="Team Member">
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- REVIEWS SECTION -->

    <section id="reviews" class="testimonial_section">
        <div class="container">
            Random Dufanda Barbershop Content
        </div>
    </section>

    <!-- PRICING SECTION  -->

    <section class="pricing_section">

        <!-- START GET CATEGORIES  PRICES FROM DATABASE -->

            <?php

                $stmt = $con->prepare("Select * from service_categories");
                $stmt->execute();
                $categories = $stmt->fetchAll();

            ?>

        <!-- END -->

        <div class="container">
            <div class="section_heading">
                <h3 style="color: #9e8a78;
    font-weight: 400;
    font-family: 'Prata', sans-serif;
    font-size: 17px">Save 20% On Beauty Spa</h3>
                <h2 style="font-size: 36px;
    line-height: 48px;
    font-weight: 400;
    letter-spacing: 0;">Our Barber Pricing</h2>
                <div class="heading-line"></div>
            </div>
            <div class="row">
                <?php

                    foreach($categories as $category)
                    {
                        ?>

                            <div class="col-lg-4 col-md-6 sm-padding">
                                <div class="price_wrap">
                                    <h3><?php echo $category['category_name'] ?></h3>
                                    <ul class="price_list">
                                        <?php

                                            $stmt = $con->prepare("Select * from services where category_id = ?");
                                            $stmt->execute(array($category['category_id']));
                                            $services = $stmt->fetchAll();

                                            foreach($services as $service)
                                            {
                                                ?>

                                                    <li>
                                                        <h4><?php echo $service['service_name'] ?></h4>
                                                        <p><?php echo $service['service_description'] ?></p>
                                                        <span class="price">$<?php echo $service['service_price'] ?></span>
                                                    </li>

                                                <?php
                                            }

                                        ?>
                                        
                                    </ul>
                                </div>
                            </div>

                        <?php
                    }

                ?>
                
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->

    <section class="contact-section" id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 sm-padding">
                    <div class="contact-info">
                        <h2>
                            Get in touch with us & 
                            <br>send us message today!
                        </h2>
                        <p>
                            Saasbiz is a different kind of architecture practice. Founded by LoganCee in 1991, we’re an employee-owned firm pursuing a democratic design process that values everyone’s input.
                        </p>
                        <h3>
                            198 West House KOINANGE Street, Suite 31 
                            <br>
                            Nairobi, NRB 10010
                        </h3>
                        <h4>
                            <span>Email:</span> 
                            DufandaBarberShop.co.ke 
                            <br> 
                            <span>Phone:</span> 
                            +254 (0) 000 0000 000
                            <br> 
                            <span>Fax:</span> 
                            +254 (0) 100 0000 001
                        </h4>
                    </div>
                </div>
                <div class="col-lg-6 sm-padding">
                    <div class="contact-form">
                        <div id="contact_ajax_form" class="contactForm">
                            <div class="form-group colum-row row">
                                <div class="col-sm-6">
                                    <input type="text" id="contact_name" name="name" class="form-control" placeholder="Name" required="">
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" id="contact_email" name="email" class="form-control" placeholder="Email" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="text" id="contact_subject" name="subject" class="form-control" placeholder="Subject" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea id="contact_message" name="message" cols="30" rows="5" class="form-control message" placeholder="Message" required=""></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button id="contact_send" class="default_btn">Send Message</button>
                                </div>
                            </div>
                            <div id="contact_status_message"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WIDGET SECTION / FOOTER -->

    <section class="widget_section" style="background-color: #222227;padding: 100px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer_widget">
                        <img src="Design/images/barbershop_logo.png" alt="Brand">
                        <p>
                            Our barbershop is the created for men who appreciate premium quality, time and flawless look.
                        </p>
                        <ul class="widget_social">
                            <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="fab fa-facebook-f fa-2x"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" title="Twitter"><i class="fab fa-twitter fa-2x"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" title="Instagram"><i class="fab fa-instagram fa-2x"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" title="LinkedIn"><i class="fab fa-linkedin fa-2x"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" title="Google+"><i class="fab fa-google-plus-g fa-2x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                     <div class="footer_widget">
                        <h3>Headquarters</h3>
                        <p>
                            00100 Koinange Street, 3rd Floor Nairobi, NRB10022
                        </p>
                        <p>
                            contact@barbershop.com
                            <br>
                            (+254) 123 456 789    
                        </p>
                     </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer_widget">
                        <h3>
                            Opening Hours
                        </h3>
                        <ul class="opening_time">
                            <li>Monday - Friday 11:30am - 2:008pm</li>
                            <li>Monday - Friday 11:30am - 2:008pm</li>
                            <li>Monday - Friday 11:30am - 2:008pm</li>
                            <li>Monday - Friday 11:30am - 2:008pm</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer_widget">
                        <h3>Subscribe to our contents</h3>
                        <div class="subscribe_form">
                            <form action="#" class="subscribe_form" novalidate="true">
                                <input type="email" name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address...">
                                <button type="submit" class="submit">SUBSCRIBE</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER  -->

    <?php include "Includes/templates/footer.php"; ?>
    <script type="text/javascript">

                                $(document).ready(function()
                                {
                                    $('#contact_send').click(function()
                                    {
                                        var contact_name = $('#contact_name').val();
                                        var contact_email = $('#contact_email').val();
                                        var contact_subject = $('#contact_subject').val();
                                        var contact_message = $('#contact_message').val();

                                        $.ajax({
                                            url: "Includes/php-files-ajax/contact.php",
                                            type: "POST",
                                            data:{contact_name:contact_name, contact_email:contact_email, contact_subject:contact_subject, contact_message:contact_message},
                                            success: function (data) 
                                            {
                                                $('#contact_status_message').html(data);
                                            },
                                            error: function(xhr, status, error) 
                                            {
                                                alert("Internal ERROR has occured, please, try later!");
                                            }
                                        });
                                    });
                                }); 
                                
                            </script>
