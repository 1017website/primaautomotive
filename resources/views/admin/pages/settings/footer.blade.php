@extends('admin.layouts.app')
@section('title', 'Pengaturan: Footer')
@section('breadcrumb', 'Pengaturan → Footer')
@section('content')
<div class="card" style="padding:24px;">
    @include('admin.partials.settings-form-bilingual', ['group' => 'footer'])
</div>
@endsection
