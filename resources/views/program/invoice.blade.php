@extends('layouts.user')
@include('layouts.partials.headeruser')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Invoice</h2>
             </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="/pengguna">Home</a></li>
            <li><a href="/detaildonasi">Detail Donasi</a></li>
            <li>invoice</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->


    <section class="sample-page">
        <div class="container" data-aos="fade-up">

          <div class="form-container">
              <form method="POST" action="{{ route('pembayaran') }}">
                @csrf
                <input type="hidden" name="slug" value="{{ $slug }}">
                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="email">Email:</label>
                              <input type="email" id="email"  name="email" disabled value="{{ auth()->user()->email }}">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="username">Username:</label>
                              <input type="text" id="username" name="username" disabled value="{{ auth()->user()->name }}">
                            </div>
                      </div>
                  </div>


                <div class="form-group">
                  <label for="short-description">Isi Nominal Donasi:</label>
                  <input type ="number" id="short-description" name="nominal" required>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="anonim" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Sembunyikan nama saya (donasi sebagai anonim)</label>
                </div>
                <br>


                <div class="form-group">
                  <label for="invitation">Berdoa di donasi ini (opsional) :</label>
                  <textarea id="invitation" name="dukungan" ></textarea>
                </div>

              <br>
              <div class="form-group">
                  <div class="offset-4 col-8 ">
                    <a href ="{{ route('detaildonasi',['slug'=>$slug]) }}"  class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Buat Invoice Sekarang</button>
                  </div>
                </div>
                {{-- <button type="submit-ya" style="float: right" class ="btn btn-success">Submit</button> --}}
              </form>

        </div>
      </section>



  </main><!-- End #main -->
