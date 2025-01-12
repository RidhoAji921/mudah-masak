<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css" />
        @vite('resources/css/app.css')
        <title>Buat Postingan</title>
    </head>
    <body class="overflow-x-hidden mt-[50px]">
        @include("layouts.header")
        <section class="w-full px-[120px] py-[20px]">
            <form action="">
                <div class="flex gap-2">
                    <label for="title">Judul Postingan</label>
                    <input type="text" name="title" id="title" class="border-b-[1px] border-black focus:border-b-2 focus:outline-none flex-1 box-border">
                </div>
                <div class="flex flex-col">
                    <label for="title">Gambar Tampilan</label>
                    <div class="dropzone" id="imageDropzone" class="w-fit"></div>
                </div>
                <div class="flex flex-col">
                    <label for="description">Deskripsi</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan deskripsi"
                    ></textarea>
                </div>
                <div class="mt-4">
                    <div class="flex mb-2">
                        <h3>Kategori</h3>
                        <a href="" class="ml-4"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg></a>
                        <input type="text" class="focus:outline-none border-b-[1px] border-black">
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="flex gap-2">
                            <div class="bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none">Kategori Satu</div>
                            <div class="bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none">Kategori Dua</div>
                            <div class="bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none">Kategori Tiga</div>
                            <div class="bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none">Kategori Empat</div>
                            <div class="bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none">Kategori Lima</div>
                        </div>
                        <div class="flex gap-2">
                            <div class="bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none">Kategori Enam</div>
                            <div class="bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none">Kategori Tujuh</div>
                            <div class="bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none">Kategori Delapan</div>
                            <div class="bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none">Kategori Sembilan</div>
                            <div class="bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none">Kategori Sepuluh</div>
                        </div>
                        <div class="flex gap-2">
                            <div class="bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none">Kategori Sebelas</div>
                            <div class="bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none">Kategori Dua Belas</div>
                            <div class="bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none">Kategori Tiga Belas</div>
                            <div class="bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none">Kategori Empat Belas</div>
                            <div class="bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none">Kategori Lima Belas</div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-4 flex justify-end">
                    <input type="submit" value="Posting" class="bg-orange-300 hover:bg-orange-400 p-2 rounded-lg">
                </div>
            </form>
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
        <script>
            Dropzone.options.imageDropzone = {
                url: '{{ route('post.store') }}', // URL tujuan untuk menyimpan gambar
                paramName: "image", // Nama parameter file yang akan dikirim ke server
                maxFilesize: 2, // Maksimum ukuran file dalam MB
                maxFiles: 1,
                acceptedFiles: "image/*", // Hanya menerima gambar
                dictDefaultMessage: "Seret dan lepas gambar di sini untuk mengunggah.",
                init: function() {
                    this.on("success", function(file, response) {
                        console.log(response); // Menampilkan respons server setelah gambar berhasil diunggah
                    });
                }
            };
        </script>
    </body>
</html>