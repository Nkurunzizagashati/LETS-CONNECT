<div>
    <i wire:click="toggleLike" class="fa-solid {{(Auth::user()?->hasLiked($post) ? 'text-red-500' : '')}} hover:text-red-500 hover:cursor-pointer fa-lg fa-heart"></i>
    <span class=" hover:underline">{{$post->likes()->count()}} likes</span>
</div>

