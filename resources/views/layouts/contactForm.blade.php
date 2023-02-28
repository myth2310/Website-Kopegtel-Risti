<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<div class="content-contact">
    <div class="content-contact__alltext">
        <h1 id="contact" class="content-contact__title">
            Hubungi Kami
        </h1>
        <p>
            Hubungi kami untuk informasi lebih lengkap melalui kolom formulir di bawah ini
        </p>
    </div>

    

    <div class="card-body">

        <div class="content-contact__box" style="gap: 1rem">

            {{-- @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>                        
            @endif --}}

            

            <form action="/send-message" method="POST" enctype="multipart/form-data" style="gap: 24px">
            @csrf
            @method('POST')
                <div class="elem-group">
                    <label for="" class="form-control-label">Nama</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            placeholder="Masukkan nama.."
                            class="form-control @error('name') is-invalid @enderror" 
                        >
                        @error('name')
                            <small id="nameHelp" class="alert-danger">{{ $message }}</small>
                        @enderror
                </div>

                <div class="elem-group">
                    <label for="" class="form-control-label">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            placeholder="name@example.com"
                            class="form-control @error('email') is-invalid @enderror" 
                        >
                        @error('email')
                            <small id="emailHelp" class="alert-danger">{{ $message }}</small>
                        @enderror
                </div>

                <div class="elem-group">
                    <label for="" class="form-control-label">Subjek</label>
                        <input 
                            type="text" 
                            name="subject" 
                            id="subject" 
                            placeholder="Subjek"
                            class="form-control @error('phone') is-invalid @enderror" 
                        >
                        @error('subject')
                            <small id="subjectHelp" class="alert-danger">{{ $message }}</small>
                        @enderror
                </div>

                <div class="elem-group">
                    <label for="" class="form-control-label">Pesan</label>
                        <textarea 
                            name="message" 
                            id="exampleFormControlTextarea1" 
                            rows="3" 
                            placeholder="Masukkan pesan.."
                            class="form-control @error('message') is-invalid @enderror" 
                        ></textarea>
                        @error('address')
                            <small id="messageHelp" class="alert-danger">{{ $message }}</small>
                        @enderror
                </div>

                <div class="form-group button-message">                           
                    <button type="submit" class="button-primary" onclick="swal ( 'Berhasil','Pesan Anda Telah Terkirim','success')"> 
                        Kirim Pesan                            
                    </button>                            
                </div> 
            </form>

         </div>
    <div>
</div>
