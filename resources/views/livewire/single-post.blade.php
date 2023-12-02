
<div class="">
    <livewire:nav-component />



    <div class=" flex gap-20">

        <div class=" w-[100%]">
    
            <div class=" gap-3 mt-24 mb-20">
            <div class=" rounded-md shadow-md shadow-slate-500 p-4">
                <div class=" flex flex-col items-center justify-center  gap-8">
                    <div class="flex gap-20">
                        <p class=" font-bold underline">{{strtoupper($post->title)}}</p>
                        <span class=" text-gray-400 italic font-bold">{{ $post->created_at->diffForHumans()}}</span>
                    </div>
                    <div class=" flex flex-col gap-6 w-[80%]">
                        <div class=" flex flex-col items-center justify-center gap-4" >
                            <img class=" w-[60%] h-auto object-cover rounded-lg border" src="{{asset($post->file_path)}}" />
                            <div class=" flex flex-col gap-4">
                                <p class=" max-w-[600px] border p-4"><span class=" text-gray-700 font-bold">Description</span>: {{$post->description}}</p>
                                <p class=" h-8 w-80 truncate"><span class=" text-gray-700 font-bold">Category</span>: {{$post->post_category}}</p>
                            </div>
                        </div>
                        <livewire:post-comment :key="$post->id" :$post />
                    </div>
                </div>
                <div class=" flex gap-10 border border-slate-500 p-4 rounded justify-center items-center">     
                        <livewire:like-button :key="$post->id" :$post />
                            <div>
                                <i class="fa-regular hover:text-blue-300 hover:cursor-pointer fa-comment fa-lg"></i>
                                <span class="hover:underline">{{ $post->comments()->count() }} comments</span>
                            </div>
                            

                </div>
            </div>
        </div>
    </div>

    </div>
</div>