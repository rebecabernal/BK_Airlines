@extends('layouts.app2')

@section('content')
<div class="content-wrapper">
    <div class="form-container">
        <h2 class="form-title">Create Plane</h2>
        <form action="{{ route('planeStore') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="seats">Available places:</label>
                <input type="number" name="seats" class="form-control" required>
            </div>
            <button type="submit" class="btn-submit">Create Plane</button>
        </form>
    </div>
</div>
@endsection