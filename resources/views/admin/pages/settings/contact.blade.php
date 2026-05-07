@extends('admin.layouts.app')
@section('title', 'Pengaturan: Contact')
@section('breadcrumb', 'Pengaturan → Contact')
@section('content')
<div class="card" style="padding:24px;">
    @include('admin.partials.settings-form-bilingual', ['group' => 'contact'])
</div>
@endsection
