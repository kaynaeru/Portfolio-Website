@extends('dashboard.layout')

@section('content')
    <form action="{{ route('pagesetting.update') }}" method="post">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">About</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="about">
                    <option value="">-Choose-</option>
                    @foreach ($pagedata as $item)
                        <option value="{{ $item->id }}"
                            {{ get_metavalue ('about')==$item->id?'Selected':''}}>{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Interest</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="interest">
                    <option value="">-Choose-</option>
                    @foreach ($pagedata as $item)
                        <option value="{{ $item->id }}"
                            {{ get_metavalue ('interest')==$item->id?'Selected':''}}>{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Achievements</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="achievements">
                    <option value="">-Choose-</option>
                    @foreach ($pagedata as $item)
                        <option value="{{ $item->id }}"
                            {{ get_metavalue ('achievements')==$item->id?'Selected':''}}>{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
                <button class="btn btn-primary" name="save" type="submit">Save</button>
            </div>
        </div>
    </form>
@endsection
