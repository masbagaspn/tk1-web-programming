<form action="{{ route('delete', $id) }}" method="post" enctype="multipart/form-data" class="space-y-8">
    {{ csrf_field() }}
    @method('DELETE')
    <div class="w-full flex justify-end gap-2">
        <button id="btn-delete-edit-modal-{{ $id }}" type="button" class='btn-delete-edit-modal text-xs bg-slate-100 px-4 py-2 rounded-md text-neutral-950 hover:bg-slate-200 transition'>Cancel</button>
        <button type="submit" class="text-xs bg-red-500 px-4 py-2 rounded-md text-white hover:bg-red-600 transition">Delete</button>
    </div>
</form>