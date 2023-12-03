<div class=" w-[100%] border rounded-lg h-screen relative">
    @if ($selectedConversation)
        <div
            class=" p-4 flex justify-between items-center border-b border-slate-500 rounded-lg sticky bg-slate-600 top-0 z-10">
            <i class="fa-solid fa-arrow-left fa-lg text-white"></i>
            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $receiverInstance->name }}"
                class=" h-16 w-16  rounded-full" />
        </div>
        <div class=" flex flex-col gap-2 px-8 mt-2 " style="padding-bottom: 60px;">
            @if ($messages->count() >= 1)

                @foreach ($messages as $message)
                    @if ($message->sender_id === Auth::user()->id)
                        <div class=" w-[60%] p-2 bg-slate-200 flex relative border rounded-lg" style="margin-left: auto;">
                            <p class=" pb-4 pr-20">{{ $message->body }}</p>
                            <span class=" text-slate-400 italic font-bold"
                                style="position: absolute;bottom:3px; right:2px;">{{ $message->created_at->format('h:i a') }}
                                @if ($message->read)
                                    <i class="fa-solid text-blue-600 fa-check-double fa-lg"></i>
                                @else
                                    <i class="fa-solid fa-check fa-lg"></i>
                                @endif
                            </span>
                        </div>
                    @else
                        <div class=" max-w-[60%] p-2  bg-blue-300  flex relative border rounded-lg">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $receiverInstance->name }}"
                                class=" h-8 w-8  rounded-full" />
                            <p class=" pb-4">{{ $message->body }}</p>
                            <span class=" font-bold"
                                style="position: absolute;bottom:2px; right:2px;">{{ $message->created_at->format('h:i a') }}</span>
                        </div>
                    @endif
                @endforeach
            @else
                <h2 class=" text-center">Start conversation</h2>
            @endif


        </div>

        <livewire:chat.send-message :$receiverInstance :$selectedConversation />
    @else
        <h2 class=" text-center mt-20 text-2xl text-blue-500">No Conversation Selected</h2>
    @endif

</div>
