@extends('dashboard.layout');

@section('content')
    <form action="{{ route('skill.update') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tools</label>
            <input
                type="text"
                class="form-control form-control-sm skill"
                name="tools"
                id="title"
                aria-describedby="helpId"
                placeholder="Tools Used"
                value="{{ get_metavalue ('tools') }}";
            >
        </div>
        <button class="btn btn-primary" name="save" type="submit">save</button>
    </form>
@endsection

<!--biar bisa buka halaman lain-->
@push('child-scripts')
<script>
    $(document).ready(function() {
        $('.skill').tokenfield({
            autocomplete: {
                source: [{!! $skill !!}],
                delay: 100
            },
            showAutocompleteOnFocus: true
        });
    });
  </script>
@endpush
