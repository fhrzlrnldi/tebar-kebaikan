<!DOCTYPE html>
@extends('layouts.user')
@include('layouts.partials.headeruser')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>OPEN DONASI SEKARANG JUGA!!<span></span></h2>
          <p>Ayo bantu saudara kita sekarang juga, berapapun nominalnya bersama kita Tebar Kebaikan.</p>
          {{-- <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started">Selanjutnya</a>
         </div> --}}
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="assets/img/logo.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5 d-flex justify-content-center">

            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box">
                  <div class="icon"><i class="bi bi-easel"></i></div>
                  <p>Filter</P>
                  <h4 class="title"><a href="/donasi" class="stretched-link">Kategori</a></h4>
                </div>
              </div>
              <!--End Icon Box -->


              <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box">
                      <div class="icon"><i class="bi bi-geo-alt"></i></div>
                      <p>Ingin Menggalang Dana?</P>
                        <h4 class="title"><a href="/formcampaign" class="stretched-link">Galang Dana</a></h4>
                    </div>
                </div>
                <!--End Icon Box -->

               <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <div class="icon"><i class="bi bi-command"></i></div>
                  <p>Ingin Donasi?</P>
                  <h4 class="title"><a href="/donasi" class="stretched-link">Donasi</a></h4>
                </div>
            </div>
            <!-- End Icon Box -->

        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Tentang Kami</h2>
           </div>

        <div class="row gy-4">
          <div class="col-lg-6">
            <h3>Tebar Kebaikan</h3>
            <img src="assets/img/donasi.png" class="img-fluid rounded-4 mb-4" alt="">
            <p>Sebuah aplikasi donasi berbasis website yang dapat membuka kegiatan penggalangan dana, sekaligus menyalurkan dana donasi yang telah berhasil dikumpulkan. Dengan menggunakan media aplikasi donasi berbasis website ini, penggalang dana dan donatur bisa lebih leluasa dalam kegiatan berdonasi dana,
                dan mengajak masyarakat untuk ikut memberikan dana untuk orang-orang yang membutuhkan..</p>
            <p>“TebarKebaikan” menyediakan pengalangan dana yang berfokus hanya pada dua kategori saja, yaitu kategori pendidikan dan bencana. Dari kedua kategori galang dana tersebut.</p>
          </div>
          <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
              “TebarKebaikan” akan berusaha untuk menyediakan kegiatan penggalangan dana donasi yang
              </p>
              <ul>
              <li><i class="bi bi-check-circle-fill"></i> Mudah.</li>
                <li><i class="bi bi-check-circle-fill"></i> Aman.</li>
                <li><i class="bi bi-check-circle-fill"></i> Terpercaya.</li>
                <li><i class="bi bi-check-circle-fill"></i> Cepat.</li>
              </ul>
              <p>
              “TebarKebaikan” akan berusaha semaksimal mungkin
              </p>
              <div class="position-relative mt-4">
                <img src="assets/img/hoo.png" class="img-fluid rounded-4" alt="">
              </div>
            </div>
          </div>
        </div>


      </div>
    </section><!-- End About Us Section -->

<!-- ======= Our Services Section ======= -->
<section id="services" class="services sections-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Doa Doa #Orang Baik</h2>
        </div>

        <div class="splide">
            <div class="splide__track">
              <ul class="splide__list">
                <li class="splide__slide">
                    <div class="donation-card">
                        <div class="donation-card__image">
                          <img src="https://via.placeholder.com/150x150" alt="Donation Image">
                        </div>
                        <div class="donation-card__info">
                          <h3 class="donation-card__title">Bucky</h3>
                          <hr>
                          <p class="donation-card__description">Semoga anak-anak di panti asuhan ini diberikan kesehatan dan untuk pengurus panti diberikan
                            kesehatan dan kemampuan untuk menjalankan nya aamiin</p>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="donation-card">
                        <div class="donation-card__image">
                          <img src="https://via.placeholder.com/150x150" alt="Donation Image">
                        </div>
                        <div class="donation-card__info">
                          <h3 class="donation-card__title">Bucky</h3>
                          <hr>
                          <p class="donation-card__description">Semoga anak-anak di panti asuhan ini diberikan kesehatan dan untuk pengurus panti diberikan
                            kesehatan dan kemampuan untuk menjalankan nya aamiin</p>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="donation-card">
                        <div class="donation-card__image">
                          <img src="https://via.placeholder.com/150x150" alt="Donation Image">
                        </div>
                        <div class="donation-card__info">
                          <h3 class="donation-card__title">Bucky</h3>
                          <hr>
                          <p class="donation-card__description">Semoga anak-anak di panti asuhan ini diberikan kesehatan dan untuk pengurus panti diberikan
                            kesehatan dan kemampuan untuk menjalankan nya aamiin</p>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="donation-card">
                        <div class="donation-card__image">
                          <img src="https://via.placeholder.com/150x150" alt="Donation Image">
                        </div>
                        <div class="donation-card__info">
                          <h3 class="donation-card__title">Bucky</h3>
                          <hr>
                          <p class="donation-card__description">Semoga anak-anak di panti asuhan ini diberikan kesehatan dan untuk pengurus panti diberikan
                            kesehatan dan kemampuan untuk menjalankan nya aamiin</p>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="donation-card">
                        <div class="donation-card__image">
                          <img src="https://via.placeholder.com/150x150" alt="Donation Image">
                        </div>
                        <div class="donation-card__info">
                          <h3 class="donation-card__title">Bucky</h3>
                          <hr>
                          <p class="donation-card__description">Semoga anak-anak di panti asuhan ini diberikan kesehatan dan untuk pengurus panti diberikan
                            kesehatan dan kemampuan untuk menjalankan nya aamiin</p>
                        </div>
                    </div>
                </li>
              </ul>
            </div>
          </div>


    </div>
  </section><!-- End Our Services Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

            <div class="section-header">
              <h2>Donasi Segera</h2>
              <div style="float:right;"><a href="/donasi" type="submit" class="btn btn-success">Lihat Lainnya <i class="bi bi-arrow-right"></i></a></div>
            </div>



        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="card">
                      <div class="card img bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="assets/img/donasi.png" class="img-fluid"/>
                        <a href="/#">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Santuni Ratusan Mustahik dengan Bayar Wajib Fidyah</h5>
                        <br>
                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar bg-success" style="width: 25%"></div>
                        </div>
                        <hr>
                        <div class="tulisan">
                            <div class="kiri">Rp 123.991.099</div>
                            <div class="kanan">1 hari lagi</div>
                        </div>
                        <br>
                        <a href="/donasi" class="btn btn-success">Selanjutnya</a>
                      </div>
                  </div>
                </div>
              </div><!-- End testimonial item -->


            <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="card">
                      <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="assets/img/hoo.png" class="img-fluid"/>
                        <a href="/donasi">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Santuni Ratusan Mustahik dengan Bayar Wajib Fidyah</h5>
                        <br>
                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar bg-success" style="width: 25%"></div>
                        </div>
                        <hr>
                        <div class="tulisan">
                            <div class="kiri">Rp 123.456.789</div>
                            <div class="kanan">1 hari lagi</div>
                        </div>
                        <br>
                        <a href="/donasi" class="btn btn-success">Selanjutnya</a>
                      </div>
                    </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="card">
                      <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="assets/img/blog/blog-6.jpg" class="img-fluid"/>
                        <a href="#">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Santuni Ratusan Mustahik dengan Bayar Wajib Fidyah</h5>
                        <br>
                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar bg-success" style="width: 25%"></div>
                        </div>
                        <hr>
                        <div class="tulisan">
                            <div class="kiri">Rp 123.456.789</div>
                            <div class="kanan">1 hari lagi</div>
                        </div>
                        <br>
                        <a href="/donasi" class="btn btn-success">Selanjutnya</a>
                      </div>
                    </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="card">
                      <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="assets/img/blog/blog-5.jpg" class="img-fluid"/>
                        <a href="#">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Santuni Ratusan Mustahik dengan Bayar Wajib Fidyah</h5>
                        <br>
                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar bg-success" style="width: 25%"></div>
                        </div>
                        <hr>
                        <div class="tulisan">
                            <div class="kiri">Rp 123.456.789</div>
                            <div class="kanan">1 hari lagi</div>
                        </div>
                        <br>
                        <a href="/donasi" class="btn btn-success">Selanjutnya</a>
                      </div>
                    </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="card">
                      <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="assets/img/blog/blog-4.jpg" class="img-fluid"/>
                        <a href="#">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Santuni Ratusan Mustahik dengan Bayar Wajib Fidyah</h5>
                        <br>
                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar bg-success" style="width: 25%"></div>
                        </div>
                        <hr>
                        <div class="tulisan">
                            <div class="kiri">Rp 123.456.789</div>
                            <div class="kanan">1 hari lagi</div>
                        </div>
                        <br>
                        <a href="/donasi" class="btn btn-success">Selanjutnya</a>
                      </div>
                    </div>
                </div>
              </div><!-- End testimonial item -->

            </div>
            <br>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->


    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="artikel" class="recent-posts sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Artikel</h2>
        </div>

        <div class="row gy-4">

          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Politics</p>

              <h2 class="title">
                <a href="blog-details.html">Dolorum optio tempore voluptas dignissimos</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="assets/img/blog/blog-author.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">Maria Doe</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Jan 1, 2022</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Sports</p>

              <h2 class="title">
                <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="assets/img/blog/blog-author-2.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">Allisa Mayer</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Jun 5, 2022</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Entertainment</p>

              <h2 class="title">
                <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="assets/img/blog/blog-author-3.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">Mark Dower</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Jun 22, 2022</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->

        </div><!-- End recent posts list -->

      </div>
    </section><!-- End Recent Blog Posts Section -->

  </main><!-- End #main -->
