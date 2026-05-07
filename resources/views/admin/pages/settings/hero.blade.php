@extends('admin.layouts.app')
@section('title', 'Pengaturan: Hero')
@section('breadcrumb', 'Pengaturan → Hero')
@section('content')
<div class="card" style="padding:24px;">
    @include('admin.partials.settings-form-bilingual', ['group' => 'hero'])
</div>
@endsection
