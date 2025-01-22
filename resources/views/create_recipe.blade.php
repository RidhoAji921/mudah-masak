<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css" />
        @vite('resources/css/app.css')
        <title>Bagikan Resep Anda</title>
    </head>
    <body class="overflow-x-hidden mt-[50px]">
        @include("layouts.header")
        <section class="w-full px-[120px] py-[20px]">
            <h1 class="text-2xl font-bold">Bagikan resep anda ke pengguna lain</h1>
            <form action="/recipe/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex gap-2">
                    <label for="nama">Nama Resep</label>
                    <input type="text" name="nama" id="nama" class="border-b-[1px] border-black focus:border-b-2 focus:outline-none flex-1 box-border">
                </div>
                <div class="flex flex-col">
                    <label>Gambar Tampilan</label>
                    <input type="file" name="image" id="image" onchange="previewImage()">
                    <img id="img-preview" class="my-3">
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
                        <h3 class="mr-2">Kategori</h3>
                        <svg xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                        <input type="text" id="search-category" class="focus:outline-none border-b-[1px] border-black">
                    </div>
                    <div id="categories-container" class="flex flex-wrap gap-2"></div>
                    <input type="hidden" name="categories" id="categories-input">
                </div>
                <div class="mt-4">
                    <div class="flex mb-2">
                        <h3 class="mr-2">Alat</h3>
                        <svg xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                        <input type="text" id="search-tool" class="focus:outline-none border-b-[1px] border-black">
                    </div>
                    <div id="tools-container" class="flex flex-wrap gap-2"></div>
                    <input type="hidden" name="tools" id="tools-input">
                </div>
                <div class="mt-4">
                    <div class="flex mb-2">
                        <h3 class="mr-2">Bahan</h3>
                        <svg xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                        <input type="text" id="search-ingredient" class="focus:outline-none border-b-[1px] border-black">
                    </div>
                    <div id="ingredients-container" class="flex flex-wrap gap-2"></div>
                    <input type="hidden" name="ingredients" id="ingredients-input">
                    <table id="ingredients-details-container">
                    </table>
                </div>
                <div class="mt-4">
                    <div class="flex mb-2">
                        <h3 class="mr-2">Langkah</h3>
                        <a id="add-step" class="cursor-pointer"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-square-rounded-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" /><path d="M15 12h-6" /><path d="M12 9v6" /></svg></a>
                    </div>
                    <input type="hidden" name="steps" id="steps-input">
                    <div class="flex flex-col gap-2" id="steps-container">
                        <div class="flex flex-col gap-2 p-2 border-black border-2 rounded-md step">
                            <h2 class="font-medium">Langkah 1</h2>
                            <input type="text" name="steps[1][title]" id="steps[1][title]" placeholder="Langkah 1" class="border-b-[1px] border-black focus:border-b-2 focus:outline-none flex-1 box-border">
                            <textarea 
                                name="steps[1][description]" 
                                id="steps[1][description]" 
                                rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                placeholder="Masukkan deskripsi"
                            ></textarea>
                            <div class="flex flex-col">
                                <label>Gambar Tampilan (Opsional)</label>
                                <input type="file" name="steps[1][image]" id="image" onchange="previewImage()">
                                <img id="steps[1][image]" class="my-3">
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-4 flex justify-end">
                        <input type="submit" value="Bagikan resep" class="bg-orange-300 hover:bg-orange-400 p-2 rounded-lg cursor-pointer">
                    </div>
                </div>
            </form>
        </section>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function () {
                let stepCount = 1;
        
                // Fungsi untuk menambahkan langkah baru
                $('#add-step').click(function () {
                    stepCount++;
                    const stepHtml = `<div class="flex flex-col gap-2 p-2 border-black border-2 rounded-md step">
                            <div class="flex gap-1">
                                <h2 class="font-medium">Langkah ${stepCount}</h2>
                                <svg class="remove-step cursor-pointer" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </div>
                            <input type="text" name="steps[${stepCount}][title]" id="nama" placeholder="Langkah 1" class="border-b-[1px] border-black focus:border-b-2 focus:outline-none flex-1 box-border">
                            <textarea 
                                name="steps[${stepCount}][description]" 
                                id="steps[${stepCount}][description]" 
                                rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                placeholder="Masukkan deskripsi"
                            ></textarea>
                            <div class="flex flex-col">
                                <label for="steps[${stepCount}][image]">Gambar Tampilan (Opsional)</label>
                                <input type="file" name="steps[${stepCount}][image]" id="steps[${stepCount}][image]" onchange="previewImage()">
                                <img id="img-preview-step-1" class="my-3">
                            </div>
                        </div>`;
                    $('#steps-container').append(stepHtml);
                });
        
                // Fungsi untuk menghapus langkah
                $(document).on('click', '.remove-step', function () {
                    $(this).closest('.step').remove();
        
                    // Update label langkah setelah penghapusan
                    $('#steps-container .step').each(function (index) {
                        $(this).find('label:first').text(`Langkah ${index + 1}`);
                        $(this).find('textarea, input[type="file"]').each(function () {
                            const nameAttr = $(this).attr('name');
                            const updatedName = nameAttr.replace(/\d+/, index);
                            $(this).attr('name', updatedName);
                        });
                    });
        
                    stepCount = $('#steps-container .step').length;
                });
            });

            let selectedCategories = [];
            let selectedTools = [];
            let selectedIngredients = [];
            $(document).ready(function () {
                //=============== CATEGORIES ===============
                function loadCategories(query = '') {
                    $.ajax({
                        url: "{{ route('categories.search') }}",
                        method: "GET",
                        data: { search: query },
                        success: function (data) {
                            let container = $('#categories-container');
                            container.empty();

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

                                $('#categories-input').val(selectedCategories);
                            });
                        },
                        error: function () {
                            alert('Terjadi kesalahan, coba lagi nanti.');
                        }
                    });
                }

                $('#search-category').on('input', function () {
                    let query = $(this).val();
                    loadCategories(query);
                });

                $('#clear-search').on('click', function () {
                    $('#search').val('');
                    loadCategories();
                });

                loadCategories();
                //=============== END CATEGORIES ===============

                //=============== TOOLS ===============
                function loadTools(query = '') {
                    $.ajax({
                        url: "{{ route('tools.search') }}",
                        method: "GET",
                        data: { search: query },
                        success: function (data) {
                            let container = $('#tools-container');
                            container.empty();

                            if (data.length > 0) {
                                // Loop hasil pencarian
                                data.forEach(function (tool) {
                                    let selected = selectedTools.includes(tool.id)? "selected" : "";
                                    container.append(`
                                        <div data-id="${tool.id}" class="tool-item bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none whitespace-nowrap ${selected}">
                                            ${tool.name}
                                        </div>
                                    `);
                                });
                            } else {
                                container.append(`
                                    <p class="col-span-3 text-gray-500">Tidak ada alat ditemukan.</p>
                                `);
                            }
                            $('.tool-item').on('click', function() {
                                const toolId = $(this).data('id');
                                console.log(`${toolId} diklik`);
                                $(this).toggleClass('selected');

                                if ($(this).hasClass('selected')) {
                                    selectedTools.push(toolId);
                                } else {
                                    selectedTools = selectedTools.filter(id => id !== toolId);
                                }

                                $('#tools-input').val(selectedTools);
                            });
                        },
                        error: function () {
                            alert('Terjadi kesalahan, coba lagi nanti.');
                        }
                    });
                }

                $('#search-tool').on('input', function () {
                    let query = $(this).val();
                    loadTools(query);
                });

                loadTools();
                //=============== END TOOLS ===============

                //=============== INGREDIENTS ===============
                function loadIngredients(query = '') {
                    $.ajax({
                        url: "{{ route('ingredients.search') }}",
                        method: "GET",
                        data: { search: query },
                        success: function (data) {
                            let container = $('#ingredients-container');
                            container.empty();

                            if (data.length > 0) {
                                // Loop hasil pencarian
                                data.forEach(function (ingredient) {
                                    let selected = selectedIngredients.includes(ingredient.id)? "selected" : "";
                                    container.append(`
                                        <div data-id="${ingredient.id}" class="ingredient-item bg-orange-300 p-1 rounded-md hover:bg-orange-500 cursor-pointer select-none whitespace-nowrap ${selected}">
                                            ${ingredient.name}
                                        </div>
                                    `);
                                });
                            } else {
                                container.append(`
                                    <p class="col-span-3 text-gray-500">Tidak ada bahan ditemukan.</p>
                                `);
                            }
                            $('.ingredient-item').on('click', function() {
                                const ingredientId = $(this).data('id');
                                console.log(`${ingredientId} diklik`);
                                $(this).toggleClass('selected');

                                if ($(this).hasClass('selected')) {
                                    selectedIngredients.push(ingredientId);
                                    let container = $('#ingredients-details-container');
                                    const name = $(this).text().trim();
                                    const HTMLinput = `<tr id="ingredient-${ingredientId}">
                                        <td>${name}</td>
                                        <td>
                                            <input type="text" name="amount-${ingredientId}" placeholder="masukkan jumlah" class="ml-4 border-b-black border-2 text-right">
                                            <select name="unit-${ingredientId}" id="unit">
                                                <option value="gram">Gram (Massa)</option>
                                                <option value="kilogram">Kilogram (Massa)</option>
                                                <option value="liter">Liter (Volume)</option>
                                                <option value="mililiter">Mililiter (Volume)</option>
                                            </select>
                                        </td>
                                    </tr>`;
                                    container.append(HTMLinput);
                                } else {
                                    selectedIngredients = selectedIngredients.filter(id => id !== ingredientId);
                                    $(`#ingredient-${ingredientId}`).remove();
                                }

                                $('#ingredients-input').val(selectedIngredients);
                            });
                        },
                        error: function () {
                            alert('Terjadi kesalahan, coba lagi nanti.');
                        }
                    });
                }

                $('#search-ingredient').on('input', function () {
                    let query = $(this).val();
                    loadIngredients(query);
                });

                loadIngredients();
                //=============== END INGREDIENTS ===============
            });
        </script>
    </body>
</html>