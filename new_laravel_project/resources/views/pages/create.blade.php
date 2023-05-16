<x-layouts.head-foot>


    <x-slot:title>
        Blog
    </x-slot:title>

    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Create Post Page</h1>
                <a href="/" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h5 text-white">Create Post Page</a>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar End -->



    <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control border-0 bg-light px-4"
                    value="{{ old('name') }}" placeholder="Your Name" style="height: 55px;"
                    data-validation-required-message="Please enter a subject">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <input type="file" name="photo" class="form-control border-0 bg-light px-4"
                    value="{{ old('photo') }}" style="height: 55px;"
                    data-validation-required-message="Please enter a subject">
            </div>
            @error('photo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="col-12">
                <textarea type="text" name="short_content" class="form-control border-0 bg-light px-4"
                    placeholder="Subject of your work" style="height: 55px;" data-validation-required-message="Please enter a message">{{ old('short_content') }} </textarea>
            </div>
            @error('short_content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="col-12">
                <textarea class="form-control border-0 bg-light px-4 py-3" rows="4" name="content"
                    data-validation-required-message="Please enter a message" placeholder="Message">{{ old('content') }}</textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="col-12">
                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
            </div>
        </div>
    </form>


</x-layouts.head-foot>
