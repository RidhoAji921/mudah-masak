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
            <form action="/create-post" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex gap-2">
                    <label for="title">Judul Postingan</label>
                    <input type="text" name="title" id="title" class="border-b-[1px] border-black focus:border-b-2 focus:outline-none flex-1 box-border">
                </div>
                <div class="flex flex-col">
                    <label>Gambar Tampilan</label>
                    <input type="file" name="image">
                    <div class="dropzone" id="imageDropzone" class="w-fit"></div>
                </div>
                <div class="flex flex-col">
                    <label for="description">Deskripsi</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Masukkan deskripsi"
                    ></textarea>
                </div>
                <div class="mt-4">
                    <div class="flex mb-2">
                        <h3>Kategori</h3>
                        <a href="" class="ml-4"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg></a>
                        <input type="text" id="search-category" class="focus:outline-none border-b-[1px] border-black">
                    </div>
                    <div id="categories-container" class="flex flex-wrap gap-2"></div>
                    <input type="hidden" name="categories" id="categories-input">
                </div>
                <div class="w-full mt-4 flex justify-end">
                    <input type="submit" value="Posting" class="bg-orange-300 hover:bg-orange-400 p-2 rounded-lg">
                </div>
            </form>
        </section>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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

        <script>
            let selectedCategories = [];
            $(document).ready(function () {
                // Fungsi untuk memuat kategori
                function loadCategories(query = '') {
                    $.ajax({
                        url: "{{ route('categories.search') }}", // URL API
                        method: "GET",
                        data: { search: query }, // Kirim query pencarian
                        success: function (data) {
                            console.log("ini datanya");
                            console.log(data);
                            let container = $('#categories-container');
                            container.empty(); // Bersihkan kontainer

                            if (data.length > 0) {
                                // Loop hasil pencarian
                                data.forEach(function (category) {
                                    let selected = selectedCategories.includes(category.id)? "selected" : "";
                                    container.append(`
                                        <div data-id="${category.id}" class="category-item bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none whitespace-nowrap ${selected}">
                                            ${category.category}
                                        </div>
                                    `);
                                });
                            } else {
                                container.append(`
                                    <p class="col-span-3 text-gray-500">Tidak ada kategori ditemukan.</p>
                                `);
                            }
                            $('.category-item').on('click', function() {
                                const categoryId = $(this).data('id');
                                $(this).toggleClass('selected');

                                if ($(this).hasClass('selected')) {
                                    selectedCategories.push(categoryId);
                                } else {
                                    selectedCategories = selectedCategories.filter(id => id !== categoryId);
                                }

                                // console.log(selectedCategories);
                                $('#categories-input').val(selectedCategories);
                                // console.log($('#categories-input').val());
                            });
                        },
                        error: function () {
                            alert('Terjadi kesalahan, coba lagi nanti.');
                        }
                    });
                }

                // Trigger pencarian ketika user mengetik
                $('#search-category').on('input', function () {
                    let query = $(this).val();
                    loadCategories(query); // Panggil fungsi pencarian
                });

                // Tombol untuk membersihkan pencarian
                $('#clear-search').on('click', function () {
                    $('#search').val('');
                    loadCategories(); // Muat semua kategori
                });

                // Muat semua kategori saat halaman pertama kali diakses
                loadCategories();
            });
        </script>
    </body>
</html>