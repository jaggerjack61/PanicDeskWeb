@extends('layouts.base')

@section('content')
    @livewireScripts
    @livewireStyles
    <livewire:chat-log :patient_id="$patient_id"/>

@endsection
