<div class=" flex items-center justify-center content-center h-screen flex-col">
    <div class=" w-[30%] shadow-md p-6">
        <form>
            @if (session('success'))
                <p class=" bg-green-500 text-white font-bold px-4 py-2 w-full text-center rounded">{{session('success')}}</p>
            @endif
            <div class=" flex flex-col mt-2">               
                <label for="title">Title</label>
                <input wire:model="title" type="text" name="title" id="title" class="rounded px-2 py-1" />
                @error('title')
                    <span class=" text-red-600">{{$message}}</span>
                @enderror
            </div>
            <div class=" flex flex-col mt-2">               
                <label for="post_category">Post Category</label>
                <select wire:model="post_category" name="post_category" id="post_category">
                    <option value="general">General</option>
                    <option value="software-engineering">Software Engineering</option>
                    <option value="computer-science">Computer Science</option>
                    <option value="networking">Networking</option>
                    <option value="machine-learning">Machine Learning</option>
                    <option value="cyber-security">Cyber Security</option>
                </select>
                @error('post_category')
                    <span class=" text-red-600">{{$message}}</span>
                @enderror
            </div>
            <div class=" flex flex-col mt-2">               
                <label for="description">Description</label>
                <textarea wire:model="description" rows="10" id="description" name="description" class="rounded px-2 py-1"></textarea>
                @error('description')
                    <span class=" text-red-600">{{$message}}</span>
                @enderror
            </div>
            <div class=" flex flex-col mt-2">               
                <label for="file">File</label>
                <input wire:model="file" type="file" name="file" id="file" class="rounded px-2 py-1" />
                @error('file')
                    <span class=" text-red-600">{{$message}}</span>
                @enderror
            </div>
            <button wire:click.prevent="create" class=" text-white bg-blue-600 hover:bg-blue-400 w-full mt-2 px-4 py-2 rounded">Create Post</button>
        </form>
    </div>
</div>