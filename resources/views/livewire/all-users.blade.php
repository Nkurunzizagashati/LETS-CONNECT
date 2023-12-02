<div class=" flex items-center justify-center mt-20">

    <div class=" w-[600px] mt-10 border p-6">
        <div class=" flex justify-between p-6">
            <span wire:click="setActive('followers')"
                class=" {{ $active === 'followers' ? 'underline' : '' }} text-2xl font-bold hover:cursor-pointer hover:underline">Followers</span>
            <span wire:click="setActive('following')"
                class=" {{ $active === 'following' ? 'underline' : '' }} text-2xl font-bold hover:cursor-pointer hover:underline">Following</span>
            <span wire:click="setActive('browse users')"
                class=" {{ $active === 'browse users' ? 'underline' : '' }} text-2xl font-bold hover:cursor-pointer hover:underline">Browse
                users</span>
        </div>
        @if ($active === 'followers')

            <div class=" flex gap-1 flex-col">
                @if (Auth::user()?->followers->count() >= 1)
                    @foreach (Auth::user()->followers as $follower)
                        <div class=" flex gap-3">
                            <div
                                class=" bg-slate-600 w-[70%] w-fulll text-white font-bold p-4 rounded-md text-center hover:cursor-pointer hover:bg-slate-500">
                                <h2>{{ $follower->name }}</h2>
                            </div>
                            <div class=" flex gap-4 items-center justify-center border border-slate-600 p-4 rounded">
                                <span>{{ $follower->followers()->count() }} followers</span>
                                @if (Auth::user())
                                    <i wire:click="followOrUnfollow({{ $follower }})"
                                        class="fa-solid {{ Auth::user()->follows($follower) ? 'fa-user-minus' : 'fa-user-plus' }} fa-lg hover:cursor-pointer"></i>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @elseif (Auth::user() === null)
                    <h2 class=" text-xl text-center">You are not logged in</h2>
                @else
                    <h2 class=" text-xl text-center">No followers yet</h2>
                @endif
            </div>
        @elseif ($active === 'following')
            <div class=" flex gap-1 flex-col">
                @if (Auth::user()?->followings->count() >= 1)
                    @foreach (Auth::user()->followings as $user)
                        <div class=" flex gap-3">
                            <div
                                class=" bg-slate-600 w-[70%] w-fulll text-white font-bold p-4 rounded-md text-center hover:cursor-pointer hover:bg-slate-500">
                                <h2>{{ $user->name }}</h2>
                            </div>
                            <div class=" flex gap-4 items-center justify-center border border-slate-600 p-4 rounded">
                                <span>{{ $user->followers()->count() }} followers</span>
                                @if (Auth::user())
                                    <i wire:click="followOrUnfollow({{ $user }})"
                                        class="fa-solid {{ Auth::user()->follows($user) ? 'fa-user-minus' : 'fa-user-plus' }} fa-lg hover:cursor-pointer"></i>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @elseif (Auth::user() === null)
                    <h2 class=" text-xl text-center">You are not logged in</h2>
                @else
                    <h2 class=" text-xl text-center">You are not following anyone</h2>
                @endif
            </div>
        @else
            <div class=" flex gap-1 flex-col">
                @if ($users)
                    @foreach ($users as $user)
                        <div class=" flex gap-3">
                            <div
                                class=" bg-slate-600 w-[70%] w-fulll text-white font-bold p-4 rounded-md text-center hover:cursor-pointer hover:bg-slate-500">
                                <h2>{{ $user->name }}</h2>
                            </div>
                            <div class=" flex gap-4 items-center justify-center border border-slate-600 p-4 rounded">
                                <span>{{ $user->followers()->count() }} followers</span>
                                @if (Auth::user())
                                    <i wire:click="followOrUnfollow({{ $user }})"
                                        class="fa-solid {{ Auth::user()->follows($user) ? 'fa-user-minus' : 'fa-user-plus' }} fa-lg hover:cursor-pointer"></i>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <h2>NO USER FOUND</h2>
                @endif
            </div>
        @endif

    </div>
</div>
