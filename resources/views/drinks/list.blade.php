@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-8 margin-tb">
            <h2>Menu</h2>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('drink.add.show') }}">Add Drink!</a>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
        @foreach ($drinks as $drink)
            <tr>
                <td>{{ $drink->id }}</td>
                <td>{{ $drink->name }}</td>
                <td>{{ $drink->price }}</td>
                <td>
                    <form action="{{ route('drink.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $drink->id }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
