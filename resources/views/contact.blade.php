@extends('layouts.apps')
@section('content')
@include('layouts.header')
<main class="contact_page">
    <iframe src="/assets/images/map.jpg"></iframe>
    <section class="contact_content">
        <h1 class="contact_content_title">Contact</h1>
        <div class="contact_detail_info">
            <form action="{{ route('contact.store', $locale)}}" method="post" >
                @csrf
                <div class="message_info">
                    <input type="text" name="name" placeholder="Name" class="name" required>
                    <input type="text" name="email" placeholder="Email" class="email" required>
                    <textarea cols="22" rows="6" name="description" placeholder="Your Message" class="message" required></textarea>
                    <button type="submit" class="send">Send</button>
                </div>
            </form>
            <ul class="detail_info">
                <li><i class="fa fa-address"></i>8, V. Gorgasali.</li>
                <li><a href="#!"><i class="fa fa-mobile"></i>+995 577 20 22 68</a></li>
                <li><a href="#!"><i class="fa fa-envelope-o"></i>info@iostudio.ge</a></li>
            </ul>
        </div>
    </section>
</main>
@include('layouts.footer')
@endsection
