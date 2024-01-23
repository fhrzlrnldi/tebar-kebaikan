@extends('layouts.user')
@include('layouts.partials.headeruser')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Pembayaran</h2>
             </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="/pengguna">Home</a></li>
            <li><a href="/detaildonasi">Detail Donasi</a></li>
            <li><a href="/invoice">Invoice</a></li>
            <li>pembayaran donasi</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->


    <section class="sample-page">
        <div class="container" data-aos="fade-up">




            <div class="invoice-container">

                <div class="invoice-header">
                  <h2 class="invoice-title" style="color: black">Invoice Donasi</h2>
                </div>
                <img class="donation-image" src="assets/img/donasi.png" alt="Gambar Donasi">
                <div class ="d-flex justify-content-center">
                    <p>Kamu Donasi Pada Program :</p>
                </div>
                <p><strong>Bencana Alam dan Pendidikan</strong></p>
                <hr>
                <div class="invoice-info">
                    <div class="container">
                        <div class="row">
                          <div class="col">
                            <p><strong>Nama Donatur :</strong></p>
                          </div>
                          <div class="col">
                            <p>Fharizal Renaldi W</p>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col">
                              <p><strong>Status Donatur :</strong></p>
                            </div>
                            <div class="col">
                              <p>Anonim dengan nama </p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <p><strong>Username :</strong></p>
                            </div>
                            <div class="col">
                              <p>Piecesoffais</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <p><strong>Email :</strong></p>
                            </div>
                            <div class="col">
                              <p>ijalijal99@gmail.com</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <p><strong>Jenis Kelamin :</strong></p>
                            </div>
                            <div class="col">
                              <p>Laki - Laki</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <p><strong>Doa :</strong></p>
                            </div>
                            <div class="col">
                                <i class="bi bi-quote quote-icon-right" style="color: grey"></i>
                                Semoga Apa yang disemogakan tersemogakan
                                <i class="bi bi-quote quote-icon-right"  style="color: grey"></i>
                            </div>
                          </div>

                    </div>

                </div>
                <hr>
                <div class="payment-details">
                  <h3>Rincian Pembayaran</h3>
                  <div class="row">
                    <div class="col-8">
                      <p><strong>Waktu :</strong></p>
                    </div>
                    <div class="col-4">
                      <p>12.45</p>
                    </div>
                  </div>
                  <table>
                    <thead>
                      <tr>
                        <th>Deskripsi</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Donasi</td>
                        <td>$100</td>
                      </tr>
                      <tr>
                        <td>Biaya Administrasi</td>
                        <td>$5</td>
                      </tr>
                      <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>$105</strong></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <br>
                <a href="#" class="btn">Bayar Sekarang</a>
              </div>
        </div>
      </section>



  </main><!-- End #main -->
