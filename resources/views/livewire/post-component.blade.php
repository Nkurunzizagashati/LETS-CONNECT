<div class=" flex items-center justify-center content-center h-screen">
    <div class=" w-[30%] shadow-md p-6">
        <form>
            <div class=" flex flex-col mt-2">               
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="rounded px-2 py-1" />
            </div>
            <div class=" flex flex-col mt-2">               
                <label for="post_category">Post Category</label>
                <select name="post_category" id="post_category">
                    <option value="general">General</option>
                    <option value="software-engineering">Software Engineering</option>
                    <option value="computer-science">Computer Science</option>
                    <option value="networking">Networking</option>
                    <option value="machine-learning">Machine Learning</option>
                    <option value="cyber-security">Cyber Security</option>
                </select>
            </div>
            <div class=" flex flex-col mt-2">               
                <label for="description">Description</label>
                <textarea rows="10" id="description" name="description" class="rounded px-2 py-1"></textarea>
            </div>
            <div class=" flex flex-col mt-2">               
                <label for="file">File</label>
                <input type="file" name="file" id="file" class="rounded px-2 py-1" />
            </div>
            <button class=" text-white bg-blue-600 hover:bg-blue-400 w-full mt-2 px-4 py-2 rounded">Create Post</button>
        </form>
    </div>
</div>