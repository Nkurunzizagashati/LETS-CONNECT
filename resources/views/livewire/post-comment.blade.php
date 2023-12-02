<div class="">
    @if ($comments->count() >= 1)

        <div class=" border p-2 ">
            <h1 class=" text-center font-bold text-2xl">Comments</h1>
            <div class=" flex flex-col gap-2 max-h-[400px] overflow-y-auto">
                @foreach ($comments as $comment)
                    <div class=" border rounded">
                        <div class=" flex justify-between px-2">
                            <div class=" mt-2 flex justify-center items-center">
                                <img class=" h-10 w-10 rounded-full"
                                    src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $comment->user->name }}" />
                                <strong>{{ $comment->user->name }}</strong>
                            </div>
                            <span
                                class=" text-gray-400 italic font-bold">{{ $comment->created_at->shortAbsoluteDiffForHumans() }}</span>
                        </div>
                        <p class=" ml-[20%] ">{{ $comment->comment }}</p>
                    </div>
                @endforeach
            </div>
            {{-- <button class=" bg-blue-500 hover:bg-blue-400 rounded text-white">
            Show more
            <i class="fa-solid fa-chevron-down fa-lg"></i>
        </button> --}}
        </div>
    @else
        <div class=" border p-2 flex flex-col gap-2">
            <h1 class=" text-center font-bold text-2xl">Comments</h1>
            <div class=" border rounded p-4">
                <h2 class=" text-center">No comment yet</h2>
            </div>
        </div>

    @endif


    <form>
        <label for="chat" class="sr-only">Your message</label>
        <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
            <button type="button"
                class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 18">
                    <path fill="currentColor"
                        d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18 1H2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                </svg>
                <span class="sr-only">Upload image</span>
            </button>
            <button type="button"
                class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.408 7.5h.01m-6.876 0h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM4.6 11a5.5 5.5 0 0 0 10.81 0H4.6Z" />
                </svg>
                <span class="sr-only">Add emoji</span>
            </button>
            <textarea wire:model="message" id="chat" rows="1"
                class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Your message..."></textarea>
            <button type="submit"
                class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                <svg wire:click.prevent="postComment" class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path
                        d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                </svg>
                <span class="sr-only">Send message</span>
            </button>
        </div>
    </form>


</div>
