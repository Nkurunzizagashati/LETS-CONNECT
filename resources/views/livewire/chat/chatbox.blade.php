<div class=" w-[100%] border rounded-lg h-screen">
    <div
        class=" p-4 flex justify-between items-center border-b border-slate-500 rounded-lg sticky bg-slate-600 top-0 z-10">
        <i class="fa-solid fa-arrow-left fa-lg text-white"></i>
        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=fab" class=" h-16 w-16  rounded-full" />
    </div>
    <h2>Chat box</h2>
    <div class=" bottom-0 sticky">
        <livewire:chat.send-message />
    </div>
</div>
