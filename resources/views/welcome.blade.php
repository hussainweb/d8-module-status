@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="title">{{ $title }}</div>
    </div>
    <div class="col-sm-12" id="app">
        <upgrade-page
            module-status-url="{{ url('/api/module_status') }}"
        ></upgrade-page>
    </div>
@endsection

@push('scripts')
@endpush
