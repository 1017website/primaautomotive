@extends('admin.layouts.app')
@section('title', 'Pengaturan: Location')
@section('breadcrumb', 'Pengaturan → Location')
@section('content')
<div class="card" style="padding:24px;">
    @include('admin.partials.settings-form-bilingual', ['group' => 'location'])
</div>
@endsection
