@extends('layouts.main')

@section('content')
    <contacts-component
        :contacts="{{ $contacts }}"
    />
@endsection

@section('javascript')

@endsection