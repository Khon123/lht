<?php
use App\Http\Controllers\Helpers\Language;          
?>
@extends('FrontEnd.layout.app')

@section('content')
	<!-- Page Content -->
    <div class="container">

        <div class="row" style=" margin-top: 95px;">

            <div class="col-lg-12">
                <h3><?php echo Language::getTitleLang() == 'kh'? 'ទីតាំងរបស់យើង':'Our Location'; ?></h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
		 <div class="animated zoomIn">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.9431351440876!2d104.9203670147919!3d11.55593434748099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109513b6718dc61%3A0xfb868ef4f39a478b!2s160+Preah+Sihanouk+Blvd+(274)%2C+Phnom+Penh!5e0!3m2!1sen!2skh!4v1464056365510" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
         </div>       
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
			 <div class="animated zoomIn">
                <h3><?php echo Language::getTitleLang() == 'en'? 'Contact Details':'ពត៌មានលំអិត'; ?></h3>
                @if(Language::getTitleLang() == 'en')
                    <p>
                       N0 . 160 E2, Preah Sihanouk Boulevard <br>Beoung Keng Kong I, Khan Chamkarmon<br> Phnom Penh, Cambodia <br>
                    </p>
                @else
                   <p>
                       N0 . 160 E2, តាមបណ្តោយមហាវិថីព្រះសីហនុ <br>បឹងកេងកង​​​១, ខណ្ឌចំការមន <br> រាជធានីភ្នំពេញ, កម្ពុជា​ <br>
                   </p> 
                @endif
			</div>
		 <div class="animated zoomIn">
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone"><?php echo Language::getTitleLang() == 'en'? 'Tel':'ទូរស័ព្ទលេខ'; ?></abbr>: (+855) 23 224 487</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email"><?php echo Language::getTitleLang() == 'en'? 'E-mail':'អ៊ីម៉ែល'; ?></abbr>: <a href="kao.sokharany@lhtcapital.com">kao.sokharany@lhtcapital.com</a>
                </p>

                @if(Language::getTitleLang() == 'en')
                    <p><i class="fa fa-clock-o"></i> 
                        <abbr title="Hours">H</abbr>:Monday - Sunday: 8:00 AM to 7:00 PM</p>
                @else
                    <p><i class="fa fa-clock-o"></i> 
                        <abbr title="Hours">ម៉ោង</abbr>:ថ្ងៃចន្ទ - ថ្ងៃអាទិត្យ: 8:00 ព្រឹក - 7:00 ល្ងាច</p>
                @endif
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>
		 </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-md-8">
                <h3><?php echo Language::getTitleLang() == 'en'? 'Send us a Message':'ផ្ញេីរសារមកពួកយេីង'; ?></h3>
                <form method="POST" action="{{url(''). '/contact' }}" name="sentMessage" id="contactForm" novalidate>
                {{ csrf_field() }}
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><?php echo Language::getTitleLang() == 'en'? 'Full Name:':'ឈ្មោះ​ពេញោ:'; ?></label>
                            <input type="text" class="form-control" name="name" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><?php echo Language::getTitleLang() == 'en'? 'Phone Number:':'លេខទូរសព្ទ:'; ?></label>
                            <input type="tel" class="form-control" id="phone" name="phone" required data-validation-required-message="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><?php echo Language::getTitleLang() == 'en'? 'Email Address:':'អ៊ី​ម៉េ​ល:'; ?></label>
                            <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><?php echo Language::getTitleLang() == 'en'? 'Message:':'សារ:'; ?></label>
                            <textarea rows="10" cols="100" class="form-control" id="message" name="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    @include('backpack::inc.message')
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 50px;"><?php echo Language::getTitleLang() == 'en'? 'Send Message':'បញ្ជូនសារ'; ?></button>
                </form>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@stop