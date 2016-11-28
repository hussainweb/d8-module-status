@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="title">{{ $title }}</div>
    </div>
    <div class="col-sm-12">
        <form name="modules" method="post" action="{{ url('/api/module_status') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="list">Modules:</label>
                <textarea name="list" class="form-control" rows="10" placeholder="Paste output from `drush pm-list --format=json` here"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Can I upgrade?</button>
        </form>
    </div>
@endsection
