@extends('user-dashboard.user_dashboard')
@section('index')

<h2>{{ $data['shipping_name'] }}</h2>
<div class="container">
    <h1>Generate Control Number</h1>
    <form action="{{ route('generateControlNumber') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Generate Control Number</button>
    </form>
    @isset($controlNumber)
        <div class="mt-4">
            <h2>Control Number: {{ $controlNumber }}</h2>
        </div>
    @endisset
</div>
@endsection