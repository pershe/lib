<!-- component -->
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

@extends('navbar')

@section('content')

<section class="relative  bg-blueGray-50">
<div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen-75">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('https://images.unsplash.com/photo-1519681393784-d120267933ba?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1350&q=80');">
          <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
        </div>
        <div class="container relative mx-auto">
          <div class="items-center flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
              <div class="pr-12">
                <h1 class="text-white font-semibold text-5xl">
                  Perjalanan Ilmu Dimulai di Sini
                </h1>
                <p class="mt-4 text-lg text-blueGray-200">
                  Selamat datang di perpustakaan digital kami, tempat di mana setiap buku membuka dunia baru untuk Anda.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="pb-10 bg-blueGray-200 -mt-24">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap">
            <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
              <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                <div class="px-4 py-5 flex-auto">
                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                    <i class="fas fa-book"></i>
                  </div>
                  <h6 class="text-xl font-semibold">Koleksi Buku Terbaik</h6>
                  <p class="mt-2 mb-4 text-blueGray-500">
                    Jelajahi berbagai koleksi buku dari berbagai genre dan penulis ternama di dunia.
                  </p>
                </div>
              </div>
            </div>
            <div class="w-full md:w-4/12 px-4 text-center">
              <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                <div class="px-4 py-5 flex-auto">
                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-lightBlue-400">
                    <i class="fas fa-users"></i>
                  </div>
                  <h6 class="text-xl font-semibold">Keanggotaan Gratis</h6>
                  <p class="mt-2 mb-4 text-blueGray-500">
                    Daftar sebagai anggota untuk menikmati akses eksklusif ke berbagai sumber daya dan layanan perpustakaan.
                  </p>
                </div>
              </div>
            </div>
            <div class="pt-6 w-full md:w-4/12 px-4 text-center">
              <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                <div class="px-4 py-5 flex-auto">
                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-emerald-400">
                    <i class="fas fa-calendar-check"></i>
                  </div>
                  <h6 class="text-xl font-semibold">Acara dan Workshop</h6>
                  <p class="mt-2 mb-4 text-blueGray-500">
                    Ikuti berbagai acara literasi, seminar, dan workshop yang diadakan oleh perpustakaan kami.
                  </p>
                </div>
              </div>
            </div>
          </div>
           <footer class="relative  pt-8 pb-6 mt-1">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-6/12 px-4 mx-auto text-center">
      </div>
    </div>
  </div>
</footer>
      </section>
      </section>

      @endsection
