<section id="faq" x-data="
    {
    openFaq1: false, 
    openFaq2: false, 
    openFaq3: false, 
    openFaq4: false, 
    openFaq5: false, 
    openFaq6: false
    }
    " class="relative z-20 overflow-hidden bg-white dark:bg-dark pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
    <div class="container mx-auto">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div class="mx-auto mb-[60px] max-w-[520px] text-center lg:mb-20">
                    <span class="block mb-2 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl">
                        FAQ
                    </span>
                    <h2 class="text-dark dark:text-white mb-4 text-3xl font-bold sm:text-[40px]/[48px]">
                        Ada pertanyaan? Lihat disini
                    </h2>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4 lg:w-1/2">
                <div
                    class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-bcg sm:p-8 lg:px-6 xl:px-8">
                    <button class="flex w-full text-left faq-btn" @click="openFaq1 = !openFaq1">
                        <div
                            class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                            <svg :class="openFaq1 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <div class="w-full">
                            <h4 class="mt-1 text-lg font-semibold text-dark dark:text-secondary">
                                Apa itu iLost?
                            </h4>
                        </div>
                    </button>
                    <div x-show="openFaq1" class="faq-content pl-[62px]">
                        <p class="py-3 text-base leading-relaxed text-body-color dark:text-backgr">
                            iLost adalah sistem informasi kehilangan barang berbasis website yang bertujuan untuk
                            membantu civitas akademika melaporkan, mencari, dan berbagi informasi mengenai barang yang
                            hilang di sekitar kampus UNAND.
                        </p>
                    </div>
                </div>
                <div
                    class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-bcg sm:p-8 lg:px-6 xl:px-8">
                    <button class="flex w-full text-left faq-btn" @click="openFaq2 = !openFaq2">
                        <div
                            class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                            <svg :class="openFaq2 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <div class="w-full">
                            <h4 class="mt-1 text-lg font-semibold text-dark dark:text-secondary">
                                Apa saja syarat untuk membuat laporan barang hilang atau barang temuan?
                            </h4>
                        </div>
                    </button>
                    <div x-show="openFaq2" class="faq-content pl-[62px]">
                        <p class="py-3 text-base leading-relaxed text-body-color dark:text-backgr">
                            untuk membuat laporan, anda perlu mendaftar akun di website
                            kami. Ini bertujuan untuk membantu kami memverifikasi informasi dan memberikan pembaruan
                            terkait status pelaporan.
                        </p>
                    </div>
                </div>
                <div
                    class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-bcg sm:p-8 lg:px-6 xl:px-8">
                    <button class="flex w-full text-left faq-btn" @click="openFaq3 = !openFaq3">
                        <div
                            class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                            <svg :class="openFaq3 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <div class="w-full">
                            <h4 class="mt-1 text-lg font-semibold text-dark dark:text-secondary">
                                Adakah batasan dalam membuat laporan untuk setiap akun?
                            </h4>
                        </div>
                    </button>
                    <div x-show="openFaq3" class="faq-content pl-[62px]">
                        <p class="py-3 text-base leading-relaxed text-body-color dark:text-backgr">
                            Setiap akun tidak memiliki batasan dalam membuat laporkan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 lg:w-1/2">
                <div
                    class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-bcg sm:p-8 lg:px-6 xl:px-8">
                    <button class="flex w-full text-left faq-btn" @click="openFaq4 = !openFaq4">
                        <div
                            class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                            <svg :class="openFaq4 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <div class="w-full">
                            <h4 class="mt-1 text-lg font-semibold text-dark dark:text-secondary">
                                Bagaimana cara menemukan barang hilang?
                            </h4>
                        </div>
                    </button>
                    <div x-show="openFaq4" class="faq-content pl-[62px]">
                        <p class="py-3 text-base leading-relaxed text-body-color dark:text-backgr">
                            Untuk menemukan barang yang hilang silahkan hubungi kontak yang tertera pada Informasi
                            barang hilang.
                        </p>
                    </div>
                </div>
                <div
                    class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-bcg sm:p-8 lg:px-6 xl:px-8">
                    <button class="flex w-full text-left faq-btn" @click="openFaq5 = !openFaq5">
                        <div
                            class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                            <svg :class="openFaq5 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <div class="w-full">
                            <h4 class="mt-1 text-lg font-semibold text-dark dark:text-secondary">
                                Apakah ada biaya yang dikeluarkan terkait layanan di website ini.
                            </h4>
                        </div>
                    </button>
                    <div x-show="openFaq5" class="faq-content pl-[62px]">
                        <p class="py-3 text-base leading-relaxed text-body-color dark:text-backgr">
                            Tidak,layanan di website ini tidak dikenakan biaya. Layanan ini disediakan sebagai bagian
                            dari upaya kami untuk membantu komunitas.
                        </p>
                    </div>
                </div>
                <div
                    class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-bcg sm:p-8 lg:px-6 xl:px-8">
                    <button class="flex w-full text-left faq-btn" @click="openFaq6 = !openFaq6">
                        <div
                            class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                            <svg :class="openFaq6 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <div class="w-full">
                            <h4 class="mt-1 text-lg font-semibold text-dark dark:text-secondary">
                                Bagaimana cara mengubah atau memperbarui informasi dalam laporan telah dibuat?
                            </h4>
                        </div>
                    </button>
                    <div x-show="openFaq6" class="faq-content pl-[62px]">
                        <p class="py-3 text-base leading-relaxed text-body-color dark:text-backgr">
                            Jika Anda hendak memperbarui informasi dalam laporan yang telah dibuat, silakan masuk ke
                            akun Anda dan kunjungi bagian "Riwayat Laporan" pada bagian navigasi. Anda dapat memperbarui
                            informasi yang diperlukan dari sana.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 right-0 z-[-1]">
        <svg width="1440" height="886" viewBox="0 0 1440 886" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.5"
                d="M193.307 -273.321L1480.87 1014.24L1121.85 1373.26C1121.85 1373.26 731.745 983.231 478.513 729.927C225.976 477.317 -165.714 85.6993 -165.714 85.6993L193.307 -273.321Z"
                fill="url(#paint0_linear)" />
            <defs>
                <linearGradient id="paint0_linear" x1="1308.65" y1="1142.58" x2="602.827" y2="-418.681"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#3056D3" stop-opacity="0.36" />
                    <stop offset="1" stop-color="#F5F2FD" stop-opacity="0" />
                    <stop offset="1" stop-color="#F5F2FD" stop-opacity="0.096144" />
                </linearGradient>
            </defs>
        </svg>
    </div>
</section>