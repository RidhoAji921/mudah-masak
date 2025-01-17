<section class="w-full flex gap-3 p-2">
    <div class="px-2 py-1 {{ Route::currentRouteName() == 'posts.search' ? 'bg-orange-400' : 'bg-orange-200' }} rounded-md">Postingan</div>
    <div class="px-2 py-1 {{ Route::currentRouteName() == 'recipee.search' ? 'bg-orange-400' : 'bg-orange-200' }} rounded-md">Resep</div>
</section>