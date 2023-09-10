<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="/js/uploads/index.js"></script>
        <script src="/js/videos/index.js"></script>
    </head>
    <body class="antialiased">
        <main class="max-w-screen min-h-screen flex flex-col bg-white font-raleway">
            <x-navbar />
            @if (count($videos) > 0)
            <div class="w-full grow p-10 flex flex-col gap-4">
                <h2 class="text-2xl font-bold text-emerald-500">Your Video List</h2>
                <div class="w-full grid grid-cols-3 gap-8">
                    @foreach ($videos as $video)
                        <article class="w-full h-full grid grid-rows-4 gap-4">
                            <video class="row-span-3 h-full w-auto aspect-video object-top" controls>
                                <source src="{{ $video->file_path }}" />
                            </video>
                            <div class="row-span-1 flex justify-between items-center">
                                <div class="w-full flex flex-col">
                                    <h3 class="text-lg font-bold text-clip">{{ $video->title }}</h3>
                                    <p class="text-xs font-semibold opacity-50">Updated at {{ $video->updated_at }}</p>
                                </div>
                                <div class="relative">
                                    <button id="more-button" class="w-fit h-auto aspect-square p-1 rounded-full hover:bg-black/10 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 pointer-events-none" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </button>
                                    <div class="tooltip absolute right-0 top-4 hidden flex-col text-xs text-left bg-white rounded-md drop-shadow-md">
                                        <button id="btn-edit-modal-{{ $video->id }}" class="btn-edit-modal border-b tooltip-list">Edit</button>
                                        <button id="btn-delete-modal-{{ $video->id }}" class="btn-delete-modal tooltip-list">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <x-modal id="edit-form-modal-{{ $video->id }}" index="{{ $video->id }}" name="edit" title="Edit Your Videos!">
                            <x-edit-form id="{{ $video->id }}" title="{{ $video->title }}"  />
                        </x-modal>
                        <x-modal id="delete-form-modal-{{ $video->id }}" index="{{ $video->id }}" name="edit" title="Are you sure you want to delete your videos?">
                            <x-delete-form id="{{ $video->id }}" title="{{ $video->title }}"  />
                        </x-modal>
                    @endforeach
                </div>
            </div>
            @else
                <x-empty-state />
            @endif

            <x-modal id="upload-form-modal" index="100" name="add" title="Upload Your Videos!">
                <x-upload-form />
            </x-modal>

            @if ($text = Session::get('success'))
                <x-alert type="success" :$text />
            @endif
        </main>
    </body>
</html>
