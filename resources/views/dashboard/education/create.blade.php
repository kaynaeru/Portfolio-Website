@extends('dashboard.layout');

@section('content')
    <div class="pb-3">
        <a href="{{ route('education.index')}}" class="btn btn-secondary">
        < back
        </a>
    </div>
    <form action="{{ route('education.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Institution</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="title"
                id="title"
                aria-describedby="helpId"
                placeholder="Institution"
                value="{{Session::get('title')}}"
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
                value="{{Session::get('info1')}}"
            >
        </div>
        <div class="mb-3">
             <div class="col-auto">Start Date</div>
             <div class="col-auto"><input type="date" class="form-control form-control-sm" name="start_date" placeholder="dd/mm/yyyy" value="{{Session::get('start_date')}}"></div>
             <div class="col-auto">End Date</div>
             <div class="col-auto"><input type="date" class="form-control form-control-sm" name="end_date" placeholder="dd/mm/yyyy" value="{{Session::get('end_date')}}"></div>
             
        </div>
        <button class="btn btn-primary" name="save" type="submit">save</button>
    </form>
@endsection
