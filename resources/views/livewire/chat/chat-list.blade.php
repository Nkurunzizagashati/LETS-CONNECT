<div class=" w-[400px] border-r flex flex-col rounded-lg">
    <div class="p-6 flex justify-center items-center bg-slate-600">
        <i class="fa-solid fa-house fa-lg text-white"></i>
    </div>
    <div class="  flex flex-col border-slate-600 rounded-lg" style="flex-grow:1;">
        <div class=" flex justify-between p-2 bg-slate-600">
            <a wire:navigate href="{{ route('all-users') }}" class=" text-white font-extrabold text-2xl">All people</a>
            <a wire:navigate href="{{ route('all-users') }}" class=" text-white font-extrabold text-2xl">Groups</a>
        </div>
        <div class=" p-2 flex items-center justify-center gap-2">
            <input type="text" placeholder="search a user" class=" w-full rounded-lg text-center" />

            <i class="fa-solid fa-magnifying-glass fa-lg"></i>

        </div>
        <div class=" border-t rounded-lg py-4 px-2 mt-6 flex flex-col gap-2">
            @if ($conversations->count() >= 1)

                @foreach ($conversations as $conversation)
                    <div wire:key={{ $conversation->id }}
                        class=" border px-4 py-2 border-slate-600 hover:cursor-pointer rounded-lg flex hover:bg-slate-200"
                        wire:click="chatUserSelected({{ $conversation }}, {{ $this->getChatUserInstance($conversation, 'id') }})">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $this->getChatUserInstance($conversation, $name = 'name') }}"
                            class=" h-16 w-16  rounded-full" />
                        <div class="  flex-grow">
                            <div class=" w-full flex justify-between ">
                                <span class=" font-bold">
                                    {{ $this->getChatUserInstance($conversation, $name = 'name') }}
                                </span>
                                <span
                                    class=" italic">{{ $conversation->last_time_message ? Carbon\Carbon::parse($conversation->last_time_message)->shortAbsoluteDiffForHumans() : '' }}</span>
                            </div>
                            <div class=" flex justify-between">

                                <p class=" truncate max-w-[120px]">
                                    @if ($conversation->messages?->last()?->sender_id === Auth::user()->id)
                                        <span class=" font-bold text-blue-600">You:</span>
                                    @endif
                                    {{ $conversation->messages->last()->body ?? 'no message' }}
                                </p>
                                <span class="">

                                    @if ($conversation->messages?->last()?->sender_id === Auth::user()->id)
                                        @if ($conversation->messages->last()->read)
                                            <i class="fa-solid text-blue-600 fa-check-double fa-lg"></i>
                                        @else
                                            <i class="fa-solid fa-check fa-lg"></i>
                                        @endif
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>No conversation</h2>
            @endif
        </div>
    </div>
</div>
