@extends('dashboard.layout');

@section('content')
    <div class="pb-3">
        <a href="{{ route('education.index')}}" class="btn btn-secondary">
        < back
        </a>
    </div>
    <form action="{{ route('education.update', $data->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Institution</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="title"
                id="title"
                aria-describedby="helpId"
                placeholder="Institution"
                value="{{ $data->title }}"
            >
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Major</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="info1"
                id="info1"
                aria-describedby="helpId"
                placeholder="Major"
                value="{{ $data->info1 }}"
            >
        </div>
        <div class="mb-3">
             <div class="col-auto">Start Date</div>
             <div class="col-auto"><input type="date" class="form-control form-control-sm" name="start_date" placeholder="dd/mm/yyyy" value="{{ $data->start_date }}"></div>
             <div class="col-auto">End Date</div>
             <div class="col-auto"><input type="date" class="form-control form-control-sm" name="end_date" placeholder="dd/mm/yyyy" value="{{  $data->end_date }}"></div>
             
        </div>
        <button class="btn btn-primary" name="save" type="submit">Save</button>
    </form>
@endsection
