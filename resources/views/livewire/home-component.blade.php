<div class="">
    <livewire:nav-component />



    <div class=" flex gap-20">

        <div
            class=" flex justify-center items-center content-center fixed w-[25%] top-0 bottom-0 p-1 border shadow-lg shadow-slate-500">

            <div class=" w-full gap-8 flex flex-col justify-center items-center content-center">
                <div
                    class=" bg-slate-800 w-full text-center text-white font-bold p-4 rounded hover:bg-slate-600 hover:cursor-pointer">
                    <i class="fa-solid fa-user-group fa-lg"></i>
                    <span>Groups</span>
                </div>
                <div
                    class=" bg-slate-800 w-full text-center text-white font-bold p-4 rounded hover:bg-slate-600 hover:cursor-pointer">
                    <i class="fa-brands fa-rocketchat fa-lg"></i>
                    <span>Chat</span>
                </div>
                <div wire:click="setShowPeople"
                    class=" {{ $showPeople ? 'bg-slate-600' : 'bg-slate-800' }}  w-full text-center text-white font-bold p-4 rounded hover:bg-slate-600 hover:cursor-pointer">
                    <i class="fa-solid fa-address-card fa-lg"></i>
                    <span>People</span>
                </div>
                <div
                    class=" bg-slate-800 w-full text-center text-white font-bold rounded hover:bg-slate-600 hover:cursor-pointer">
                    <a wire:navigate href="{{ route('profile.edit') }}" class=" w-full p-4 block">
                        <i class="fa-solid fa-user fa-lg"></i>
                        Profile</a>
                </div>
                <form method="POST" action="{{ route('logout') }}"
                    class=" flex justify-center items-center bg-slate-800 w-full text-center text-white font-bold rounded hover:bg-slate-600 hover:cursor-pointer">
                    @csrf
                    <button type="submit" class=" w-full p-4">
                        <i class="fa-solid fa-right-from-bracket fa-lg"></i>
                        Logout</button>
                </form>
            </div>

        </div>

        <div class=" w-[100%] z-10 ml-[26%]">
            @if ($showPeople)

                <livewire:all-users />
            @else
                <div class=" gap-3 mt-24 mb-20">

                    @foreach ($posts as $post)
                        <div wire:key="{{ $post->id }}" class=" rounded-md shadow-md shadow-slate-500 p-4">
                            <div class=" flex flex-col items-center justify-center  gap-8">
                                <div class="flex gap-20">
                                    <p class=" font-bold underline">{{ strtoupper($post->title) }}</p>
                                    <span
                                        class=" text-gray-400 italic font-bold">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                                <div class=" flex gap-10">
                                    <div class=" flex justify-center items-center flex-col">
                                        <img class=" w-[400px] h-[350px] rounded-lg object-cover border"
                                            src="{{ asset($post->file_path) }}" />
                                        <div>
                                            <p class=" w-80 truncate"><span
                                                    class=" text-gray-700 font-bold">Description</span>:
                                                {{ $post->description }}</p>
                                            <p class=" w-80 truncate"><span
                                                    class=" text-gray-700 font-bold">Category</span>:
                                                {{ $post->post_category }}</p>
                                        </div>
                                    </div>
                                    <livewire:post-comment :key="$post->id" :$post />
                                </div>
                                <a wire:navigate href="{{ route('single-post', $post->id) }}"
                                    class=" w-full bg-blue-500 hover:bg-blue-400 rounded text-white py-2 px-4 text-center">Read
                                    more</a>
                            </div>
                            <div class=" flex gap-10 border border-slate-500 p-4 rounded justify-center items-center">
                                <livewire:like-button :key="$post->id" :$post />
                                <div>
                                    <i class="fa-regular hover:text-blue-300 hover:cursor-pointer fa-comment fa-lg"></i>
                                    <span class="hover:underline">{{ $post->comments()->count() }} comments</span>
                                </div>


                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- <div class=" bottom-0 fixed w-full flex items-center justify-center mt-4 bg-blue-300 p-2">
                {{$posts->links()}}
            </div> --}}
            @endif
        </div>

    </div>

    {{-- <div style="display: grid; grid-template-columns: repeat(3, 1fr);" class=" gap-3 mt-24">
            
            @foreach ($posts as $post)
            <div class=" flex p-4 flex-col items-center justify-center rounded-md shadow-md shadow-slate-500 gap-8">
                <div class="flex gap-20">
                    <p class=" font-bold underline">{{strtoupper($post->title)}}</p>
                    <span class=" text-gray-400 italic font-bold">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>
                </div>
                <img class=" w-40 h-40 rounded-full border" src="{{asset($post->file_path)}}" />
                <div>
                    <p class=" h-8 w-80 truncate"><span class=" text-gray-700 font-bold">Description</span>: {{$post->description}}</p>
                    <p class=" h-8 w-80 truncate"><span class=" text-gray-700 font-bold">Category</span>: {{$post->post_category}}</p>
                </div>
                <button class=" w-full bg-blue-500 rounded text-white py-2 px-4">Read more</button>
            </div>
            
            @endforeach
        </div>
        <div class=" flex items-center justify-center mt-4 bg-blue-300 p-2">
            {{$posts->links()}}
        </div> --}}
</div>
