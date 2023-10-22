@extends('layouts.frontoffice')
@section('title', 'Profile')
@section('content')

    <nav class="flex mt-[4.9rem] lg:mt-[6.7rem] bg-textColor-subtleGrey" aria-label="Breadcrumb">
        <ol class="inline-flex __container items-center py-3 lg:py-4 space-x-3 md:space-x-4">
            <li class="inline-flex items-center">
                <a href="index.html"
                    class="inline-flex items-center gap-x-2.5 _paragraph-2-bold lg:_heading-6-bold text-primary hover:text-btnColor-primaryHover">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.382 8.08434L10.5487 2.98017C10.2345 2.70526 9.76535 2.70526 9.45116 2.98017L3.61783 8.08434C3.43699 8.24258 3.33325 8.47119 3.33325 8.71149V15.8333C3.33325 16.2936 3.70635 16.6667 4.16659 16.6667H7.49992C7.96016 16.6667 8.33325 16.2936 8.33325 15.8333V12.5C8.33325 12.0398 8.70635 11.6667 9.16658 11.6667H10.8333C11.2935 11.6667 11.6666 12.0398 11.6666 12.5V15.8333C11.6666 16.2936 12.0397 16.6667 12.4999 16.6667H15.8333C16.2935 16.6667 16.6666 16.2936 16.6666 15.8333V8.71149C16.6666 8.47119 16.5629 8.24258 16.382 8.08434Z"
                            stroke="#0B8457" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center gap-x-3">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.70711 4.29289C9.31658 3.90237 8.68342 3.90237 8.29289 4.29289C7.90237 4.68342 7.90237 5.31658 8.29289 5.70711L9.70711 4.29289ZM16 12L16.7071 12.7071C17.0976 12.3166 17.0976 11.6834 16.7071 11.2929L16 12ZM8.29289 18.2929C7.90237 18.6834 7.90237 19.3166 8.29289 19.7071C8.68342 20.0976 9.31658 20.0976 9.70711 19.7071L8.29289 18.2929ZM8.29289 5.70711L15.2929 12.7071L16.7071 11.2929L9.70711 4.29289L8.29289 5.70711ZM15.2929 11.2929L8.29289 18.2929L9.70711 19.7071L16.7071 12.7071L15.2929 11.2929Z"
                            fill="#A2A2A2" />
                    </svg>
                    <span
                        class="_paragraph-2-regular lg:_heading-6-regular font-medium text-textColor-darkGrey">Profil</span>
                </div>
            </li>
        </ol>
    </nav>
    <!-- Struktur Organisasi -->
    <section class="pt-[1.875rem] lg:pt-[3.125rem] pb-[3.125rem] lg:pb-[6.25rem]">
        <div class="__container">
            <div class="">
                <div class="flex items-center space-x-5 justify-center">
                    <hr class="_line-primary">
                    <h1 class="_heading-5-bold lg:_heading-2-bold text-textColor-black">Struktur Organisasi</h1>
                    <hr class="_line-primary">
                </div>
                <div class="flex flex-col items-center space-y-2 lg:space-y-3 mt-10">
                    <img src="/frontoffice/assets/img/profile.png"
                        class="w-[8.75rem] lg:w-60 h-[11.25rem] lg:h-80 object-cover rounded-[0.625rem]" alt="">
                    <h4 class="_paragraph-1-bold lg:_heading-4-bold text-primary">Ketua</h4>
                    <p class="_paragraph-2-regular lg:_heading-6-bold text-textColor-black">H. Asnil M, SE. MM</p>
                </div>
                <div class="grid grid-cols-2 lg:grid-cols-12 mt-10 lg:mt-[3.75rem]">
                    <div class="col-span-1 lg:col-span-3 flex flex-col items-center space-y-2 lg:space-y-3 mt-10">
                        <img src="/frontoffice/assets/img/profile.png"
                            class="w-[8.75rem] lg:w-60 h-[11.25rem] lg:h-80 object-cover rounded-[0.625rem]" alt="">
                        <h4 class="_paragraph-1-bold lg:_heading-4-bold text-primary">Wakil Ketua I</h4>
                        <p class="_paragraph-2-regular lg:_heading-6-bold text-textColor-black">Zulfahmi, S.Pd</p>
                    </div>
                    <div class="col-span-1 lg:col-span-3 flex flex-col items-center space-y-2 lg:space-y-3 mt-10">
                        <img src="/frontoffice/assets/img/profile.png"
                            class="w-[8.75rem] lg:w-60 h-[11.25rem] lg:h-80 object-cover rounded-[0.625rem]" alt="">
                        <h4 class="_paragraph-1-bold lg:_heading-4-bold text-primary">Wakil Ketua II</h4>
                        <p class="_paragraph-2-regular lg:_heading-6-bold text-textColor-black">Deny Fadly, S. Sos</p>
                    </div>
                    <div class="col-span-1 lg:col-span-3 flex flex-col items-center space-y-2 lg:space-y-3 mt-10">
                        <img src="/frontoffice/assets/img/profile.png"
                            class="w-[8.75rem] lg:w-60 h-[11.25rem] lg:h-80 object-cover rounded-[0.625rem]" alt="">
                        <h4 class="_paragraph-1-bold lg:_heading-4-bold text-primary">Wakil Ketua III</h4>
                        <p class="_paragraph-2-regular lg:_heading-6-bold text-textColor-black">Iskandar, S. Sos.I</p>
                    </div>
                    <div class="col-span-1 lg:col-span-3 flex flex-col items-center space-y-2 lg:space-y-3 mt-10">
                        <img src="/frontoffice/assets/img/profile.png"
                            class="w-[8.75rem] lg:w-60 h-[11.25rem] lg:h-80 object-cover rounded-[0.625rem]" alt="">
                        <h4 class="_paragraph-1-bold lg:_heading-4-bold text-primary">Wakil Ketua IV</h4>
                        <p class="_paragraph-2-regular lg:_heading-6-bold text-textColor-black">Irfan Malin Mudo, S. Sos
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Struktur Organisasi -->

    <!-- Visi Misi -->
    <section class="bg-white py-[1.875rem] lg:py-[3.125rem]">
        <div class="__container space-y-[1.875rem]">
            <div class="flex items-center space-x-5 justify-center">
                <hr class="_line-primary">
                <h1 class="_heading-5-bold lg:_heading-2-bold text-textColor-black">Visi Misi</h1>
                <hr class="_line-primary">
            </div>
            <div class="text-center space-y-2">
                <h4 class="_paragraph-1-bold lg:_heading-4-bold uppercase text-textColor-darkGrey">Visi :</h4>
                <p class="_paragraph-2-regular lg:_heading-6-regular text-textColor-black">"Menjadi BAZNAS yang Amanah
                    dan Profesional"</p>
            </div>
            <div class="text-center space-y-2">
                <h4 class="_paragraph-1-bold lg:_heading-4-bold uppercase text-textColor-darkGrey">Misi :</h4>
                <p class="_paragraph-2-regular lg:_heading-6-regular text-textColor-black">"Meningkatkan kesadaran Umat
                    untuk Berzakat Melalui
                    Baznas"</p>
                <p class="_paragraph-2-regular lg:_heading-6-regular text-textColor-black">"Meningkatkan Penghimpunan
                    dan Pemberdayagunaan
                    Zakat"</p>
                <p class="_paragraph-2-regular lg:_heading-6-regular text-textColor-black">"Meningkatkan Peran Zakat
                    Untuk Menanggulangi
                    Kemiskinan"</p>
                <p class="_paragraph-2-regular lg:_heading-6-regular text-textColor-black">"Melalui Koordinasi dan
                    Sinergi Dengan Lembaga
                    Terkait"</p>
            </div>
        </div>
    </section>
    <!-- End Visi Misi -->

    <!-- Dasar Hukum -->
    <section class="pt-[1.875rem] lg:pt-[3.125rem] pb-[3.125rem] lg:pb-[6.25rem]">
        <div class="__container space-y-3.5">
            <div class="flex items-center space-x-5 justify-center">
                <hr class="_line-primary">
                <h1 class="_heading-5-bold lg:_heading-2-bold text-textColor-black">Dasar Hukum</h1>
                <hr class="_line-primary">
            </div>
            <p class="_paragraph-1-bold lg:_heading-5-bold text-center text-textColor-darkGrey">Badan Amil Zakat
                Kabupaten Pasaman dibentuk
                dan ditetapkan
                berdasarkan :</p>
            <div class="text-center _paragraph-2-regular lg:_heading-6-regular">
                <li>Undang-undang Nomor 12 Tahun 1956 Tentang Pembentukan Daerah Otonomi Kabupaten Dalam Lingkungan
                    Daerah Provinsi Sumatera Tengah dan Undang-Undang Nomor 38 Tahun 2003.</li>
                <li>Undang-undang Nomor 23 Tahun 2011 tentang Pengelolaan Zakat.</li>
                <li>Undang-undang Nomor 10 Tahun 2004 Tentang Pembentukan Peraturan Perundang-undangan.</li>
                <li>Undang-undang Nomor 32 Tahun 2004 Tentang Pemerintahan Daerah sebagaimana telah diubah beberapa
                    kali, terakhir dengan Undang-undang Nomor 12 Tahun 2008.</li>
                <li>Peraturan Pemerintah Nomor 14 Tahun 2014 tentang Pelaksanaan Undang-undang Nomor 32 Tahun 2011
                    tentang Pelaksanaan Pengelolaan Zakat.</li>
                <li>Keputusan Menteri Agama RI Nomor 581 Tahun 1999 Tentang Pelaksanaan Undang-undang Nomor 38 Tahun
                    1999 tentang Pengelolaan Zakat.</li>
                <li>Peraturan Bupati Pasaman Nomor 39 Tahun 2007 tentang Sususan Organisasi, Tata Kerja dan Uraian Tugas
                    Serta Mekanisme Pembentukan Kepengurusan Badan Amil Zakat (BAZ) Kabupaten Pasaman.</li>
                <li>Peraturan Pemerintah Nomor 14 Tahun 2014 tentang Pelaksanaan Undang-undang Nomor 32 Tahun 2011
                    tentang Pelaksanaan Pengelolaan Zakat.</li>
                <li>Peraturan Bupati Pasaman Nomor 40 Tahun 2007 Tentang Tata Cara Pengumpulan dan Pengelolaan Zakat.
                </li>
                <li>Keputusan Bupati Pasaman Nomor : 188.45/395/BUP-PAS/2014 tentang Pembentukan Kepengurusan Badan Amil
                    Zakat Nasional Kabupaten Pasaman Periode 02-14-2019.</li>
            </div>
        </div>
    </section>
    <!-- End Dasar Hukum -->
@endsection
