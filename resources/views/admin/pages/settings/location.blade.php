@extends('admin.layouts.app')
@section('title', 'Pengaturan: Location')
@section('breadcrumb', 'Pengaturan → Location')
@section('content')
<div class="card p-6">
    @include('admin.partials.settings-form', ['group' => 'location'])
</div>
@endsection
