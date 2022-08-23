<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kopegtel Risti</title>
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @include('layouts.navbar')

    <main>

        <div class="content-contact">
            <div class="content-contact__alltext">
                <h1 id="contact" class="content-contact__title">Hubungi Kami</h1>
                <p>Hubungi kami untuk informasi lebih lengkap
                melalui kolom formulir di bawah ini</p>
            </div>
            <div class="content-contact__box">
                <div>
                    <form class="content-contact-form">
                    <div class="elem-group">
                      <label for="name">Name</label>
                      <input type="text" id="name" name="visitor_name" placeholder="Kopegtel Risti" pattern=[A-Z\sa-z]{3,20} required>
                    </div>
                    <div class="elem-group">
                      <label for="email">E-mail</label>
                      <input type="email" id="email" name="visitor_email" placeholder="kopegtelristi@gmail.com" required>
                    </div>
                    <div class="elem-group">
                      <label for="title">Subject</label>
                      <input type="text" id="title" name="email_title" required placeholder="Subject" pattern=[A-Za-z0-9\s]{8,60}>
                    </div>
                    <div class="elem-group">
                      <label for="message">Message</label>
                      <textarea id="message" name="visitor_message" placeholder="Write your message here.." required></textarea>
                    </div>
                    </form>
                </div>
                <div class="button-message">
                    <h4 class="button-primary"><a href="#">SEND MESSAGE</a></h4>
                </div>
            </div>
        </div>

        </div>
        
    </main>
    
    @include('layouts.footer')

        
</body>
</html>