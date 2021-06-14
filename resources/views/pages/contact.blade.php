@extends('layouts.app')
@section('title')
    <title>Contact | MP Fundz</title>
@endsection
@section('main')

@include('includes.side_menu')
<section class="services-sec" style="background: -webkit-linear-gradient(left, #e2ebef, #e2ebef);">

    <div class="container contact-form">
        <div class="contact-image">
            <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
        </div>
        <form method="post">
            <h3>Drop Us a Message</h3>
           <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                    </div>
                </div>

                <col-md-8 class="mx-auto mt-3">
                    <div class="form-group">
                        <button type="submit" name="btnSubmit" class="btn-default">Send Message </button>
                    </div>
                </col-md-8>
            </div>
        </form>
    </div>
</section>

@endsection
