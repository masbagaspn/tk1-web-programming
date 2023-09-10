<form action="{{ route('create') }}" method="post" enctype="multipart/form-data" class="space-y-8">
    {{ csrf_field() }}
    <div class="flex flex-col gap-2">
        <label class="text-xs font-medium text-slate-500">Video Title</label>
        <input name="title" class="bg-emerald-50 text-sm rounded-sm px-4 py-2 focus:ring-emerald-200 focus:outline-emerald-300 focus:outline-2" type='text'/>
    </div>
    <div class="flex flex-col gap-2">
        <label class="text-xs font-medium text-slate-500">Video File</label>
        <input 
            name="video"
            class="block w-full text-slate-500 text-sm
                file:mr-4 file:py-2 file:px-4 file:rounded-md
                file:border-0 file:text-xs file:font-medium
                file:bg-emerald-50 file:text-emerald-700
                hover:file:bg-emerald-100 hover:file:cursor-pointer cursor-pointer focus:outline-emerald-200 focus:outline-2" 
            type='file' 
            accept="video/mp4,video/x-m4v,video/*"

        />
    </div>
    <div class="w-full flex justify-end gap-2">
        <button id="btn-cancel-add-modal" type="button" class='text-xs bg-slate-100 px-4 py-2 rounded-md text-neutral-950 hover:bg-slate-200 transition'>Cancel</button>
        <button type="submit" class="text-xs bg-emerald-500 px-4 py-2 rounded-md text-white hover:bg-emerald-600 transition">Save</button>
    </div>
</form>