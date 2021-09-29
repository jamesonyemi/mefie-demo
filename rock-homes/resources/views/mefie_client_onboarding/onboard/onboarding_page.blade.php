@extends('mefie_client_onboarding.layouts.master')

@section('page-title', config('app.name'))

@section('style-section')
    @parent
@endsection

@section('page-content-section')
    @include('mefie_client_onboarding.onboard.index')
@endsection


@section('script-section')
    @include('mefie_client_onboarding.custom-js.pricing')
@endsection
