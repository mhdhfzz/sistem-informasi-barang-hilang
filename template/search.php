<form method="POST" action="">
    <div class="flex flex-wrap items-center justify-center">
        <div class="flex w-full mx-10 rounded-full bg-slate-200 lg:mb-12 mb-4">
            <select name="kategori" id="kategori"
                class="form-control rounded w-1/4 border-none bg-transparent px-4 py-1 text-dark outline-none focus:outline-none bg-slate-300 hidden lg:block">
                <option value="">Semua Kategori</option>
                <option value="elektronik" <?php if ($kategori=="elektronik"){ echo "selected"; } ?>>Barang Elektronik
                </option>
                <option value="penting" <?php if ($kategori=="penting"){ echo "selected"; } ?>>Barang Penting</option>
                <option value="kendaraan" <?php if ($kategori=="kendaraan"){ echo "selected"; } ?>>Kendaraan</option>
                <option value="perhiasan" <?php if ($kategori=="perhiasan"){ echo "selected"; } ?>>Perhiasan</option>
                <option value="dokumen" <?php if ($kategori=="dokumen"){ echo "selected"; } ?>>Surat atau Dokumen
                    Penting</option>
                <option value="lainnya" <?php if ($kategori=="lainnya"){ echo "selected"; } ?>>Lainnya</option>
            </select>
            <input class=" w-full border-none bg-transparent px-4 py-1 text-dark outline-none focus:outline-none "
                type="search" name="katakunci" placeholder="Search..." value="<?= $katakunci; ?>" />
            <button type="submit" name="search"
                class="m-2 rounded-full bg-primary px-4 py-1 text-white hover:animate-pulse">
                <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                    width="512px" height="512px">
                    <path
                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                </svg>
            </button>
        </div>
        <div class="lg:hidden container pb-8 flex justify-center">
            <select name="kategori" id="kategori"
                class="form-control rounded  border-none bg-transparent px-4 py-1 text-dark outline-none focus:outline-none w-1/2 bg-slate-300">
                <option value="">Semua Kategori</option>
                <option value="elektronik" <?php if ($kategori=="elektronik"){ echo "selected"; } ?>>Barang Elektronik
                </option>
                <option value="penting" <?php if ($kategori=="penting"){ echo "selected"; } ?>>Barang Penting</option>
                <option value="kendaraan" <?php if ($kategori=="kendaraan"){ echo "selected"; } ?>>Kendaraan</option>
                <option value="perhiasan" <?php if ($kategori=="perhiasan"){ echo "selected"; } ?>>Perhiasan</option>
                <option value="dokumen" <?php if ($kategori=="dokumen"){ echo "selected"; } ?>>Surat atau Dokumen
                    Penting</option>
                <option value="lainnya" <?php if ($kategori=="lainnya"){ echo "selected"; } ?>>Lainnya</option>
            </select>
        </div>

    </div>
</form>