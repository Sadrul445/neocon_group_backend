@extends('layouts.dashboard.master')
@push('css')
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'Update News')

@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Settings</li>
        <li class="breadcrumb-item">News</li>
        <li class="breadcrumb-item">Update</li>
    @endcomponent
    <div class="container w-50">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('news.update', ['id' => $news->id]) }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            @method('put')
                            {{-- <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="type" :value="__('Type')" />
                                    <select class="form-control btn btn-orange" id="type" name="type">
                                        <option class="select-placeholder btn btn-orange" value="" disabled selected>
                                            Select Type
                                        </option>
                                        <option value="all" {{ $news->type == 'all' ? 'selected' : '' }}>all</option>
                                        <option value="innovations" {{ $news->type == 'innovations' ? 'selected' : '' }}>
                                            innovations</option>
                                        <option value="technologies" {{ $news->type == 'technologies' ? 'selected' : '' }}>
                                            technologies</option>
                                        <option value="gateway" {{ $news->type == 'gateway' ? 'selected' : '' }}>gateway
                                        </option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="tags" :value="__('Tags')" />
                                    <input class="form-control" id="tags" name="tags"
                                        placeholder="Enter tags here..." value="{{ old('tags', $news->tags) }}" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-6">
                                    <x-input-label class="form-label" for="image" :value="__('Image')" />
                                    <x-text-input class="form-control" id="image" type="file" name="image" />
                                    @if ($news->image)
                                        <img class="mt-4 shadow bg-body rounded"
                                            src="{{ asset('storage/' . $news->image) }}" alt="News Image" width="40%">
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <x-input-label class="form-label" for="name" :value="__('Name')" />
                                    <x-text-input class="form-control" id="name" type="text"
                                        placeholder="Enter your name here..." required="" value="{{ $news->name }}"
                                        name="name" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <x-input-label class="form-label" for="title" :value="__('Title')" />
                                    <x-text-input class="form-control" id="title" type="text"
                                        placeholder="Enter your title here..." value="{{ $news->title }}" name="title" />
                                </div>
                                <div class="col-sm-6">
                                    <x-input-label class="form-label" for="link" :value="__('Link')" />
                                    <x-text-input class="form-control" placeholder="https://..." id="link"
                                        type="url" name="link" value="{{ $news->link }}" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="description" :value="__('Description')" />
                                    <textarea class="form-control" id="description" placeholder="Enter your description here..." name="description">{!! $news->description !!}</textarea>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <x-primary-button href="#" class="btn btn-primary">Save</x-primary-button>
                                    <x-secondary-button href="#" class="btn btn-secondary">Cancel
                                    </x-secondary-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        //FroalaEditor
        var editor = new FroalaEditor('#description', {
            pluginsEnable: ['insertUnorderedList', 'fullscreen', 'bold', 'italic', 'underline', 'strikeThrough',
                'subscript', 'superscript', 'fontFamily', 'fontSize', 'color', 'align', 'outdent', 'indent',
                'quote', 'insertLink',
                'insertImage', 'insertTable', 'insertHR', 'undo', 'redo'
            ],
            height: '100px',
        });
        // Initialize Tagify on the input field with ID "tags"
        var input = document.getElementById('tags');
        new Tagify(input);
    </script>
@endpush
