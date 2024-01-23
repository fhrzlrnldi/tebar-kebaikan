@extends('layouts.user')
@include('layouts.partials.headeruser')
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="SB-Mid-client-4DO5mF95cCJ2I6hJ"></script>
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
            <li><a href="#">Home</a></li>
            <li><a href="#">Detail Donasi</a></li>
            <li><a href="#">Invoice</a></li>
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
                <img class="donation-image" src="/assets/galangdana/{{ $galangDana->path_image }}" alt="Gambar Donasi">
                <div class ="d-flex justify-content-center">
                    <p>Kamu Donasi Pada Program :</p>
                </div>
                <p><strong>{{ $galangDana->judul }}</strong></p>
                <hr>
                <div class="invoice-info">
                    <div class="container">
                        <div class="row">
                          <div class="col">
                            <p><strong>Nama Donatur:</strong></p>
                          </div>
                          <div class="col">
                            <p>{{ auth()->user()->name }}</p>
                          </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col">
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
                          </div> --}}
                          <div class="row">
                            <div class="col">
                              <p><strong>Email :</strong></p>
                            </div>
                            <div class="col">
                              <p>{{ auth()->user()->email }}</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <p><strong>Jenis Kelamin :</strong></p>
                            </div>
                            <div class="col">
                              <p>{{ auth()->user()->gender==''?'?':auth()->user()->gender }}</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <p><strong>Doa :</strong></p>
                            </div>
                            <div class="col">
                                <i class="bi bi-quote quote-icon-right" style="color: grey"></i>
                                {{ $data->dukungan }}
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
                      <p>{{ date('H:i',strtotime($data->created_at)) }}</p>
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
                        <td>{{  'RP'.number_format($data->nominal, 0, ',', '.') }}</td>
                      </tr>
                     
                      <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>{{'RP'.number_format($data->nominal, 0, ',', '.') }}</strong></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <br> 
                <div class="d-flex justify-content-center">
                  <button id="pay-button" class="btn btn-success">Bayar Sekarang</button>
                </div>
              </div>
        </div>
      </section>
      <form action="{{ route('proses-bayar') }}" id="checkoutform" method="post">
        @csrf
        <input type="hidden" value="" id="status" name="status">
        <input type="hidden" value="{{ $galangDana->slug }}" name="slug">
        <input type="hidden" id="jsoninfo" value="" name="jsoninfo">
        </form>
  </main><!-- End #main -->
  @push('script')
      
 
  <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          alert("payment success!"); 
          checkout(result,result.transaction_status);
        },
        onPending: function(result){
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result.transaction_status);
          checkout(result,result.transaction_status);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); 
          // location.href="{{ route('detaildonasi',['slug'=>$galangDana->slug]) }}";
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
      function checkout(json,status) {
        $('#jsoninfo').attr('value',JSON.stringify(json));
        $('#status').val(status);
        $('#checkoutform').submit();
    }
    });
  </script>
 @endpush