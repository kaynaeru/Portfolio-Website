@extends('dashboard.layout');

@section('content')
    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
            <div class="col-5">
                <h3> Profile </h3>
                @if (get_metavalue('picture'))
                    <img style="max-width: 100px; max-height: 100px" src="{{ asset('picture')."/".get_metavalue('picture')}}">
                @endif
                <div class="mb-3">
                    <label for="picture" class="form-label">Picture</label>
                    <input type="file" class="form-control form-control-sm" name="picture" id="picture">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control form-control-sm" name="description" id="description"
                    value = "{{ get_metavalue('description')}}">
                </div>
                
            </div>
            <div class="col-5">
                <h3>Socials</h3>
                <div class="mb-3">
                    <label for="linkedin" class="form-label">LinkedIn</label>
                    <input type="text" class="form-control form-control-sm" name="linkedin" id="linkedin"
                    value = "{{ get_metavalue('linkedin')}}">
                </div>
                <div class="mb-3">
                    <label for="github" class="form-label">Github</label>
                    <input type="text" class="form-control form-control-sm" name="github" id="github"
                    value = "{{ get_metavalue('github')}}">
                </div>
                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" class="form-control form-control-sm" name="instagram" id="instagram"
                    value = "{{ get_metavalue('instagram')}}">
                </div>
            </div>
        </div>
        
        <button class="btn btn-primary" name="save" type="submit">save</button>
    </form>
@endsection

