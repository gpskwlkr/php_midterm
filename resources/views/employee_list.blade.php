@extends('base')
@section('content')
    <br/>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Phone</th>
            <th scope="col">Position</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($employees as $employee)
                <td>{{$employee -> id}}</td>
                <td>{{$employee -> name}}</td>
                <td>{{$employee -> surname}}</td>
                <td>{{$employee -> phone}}</td>
                <td>{{$employee -> position}}</td>
                @if ($employee -> is_hired == 1)
                    <td>Hired</td>
                @else
                    <td>Not Hired</td>
                @endif
                <td>
                    <form>
                        <button class="btn btn-primary" formaction="{{ route('employees.edit', ['employeeId' => $employee->id]) }}">Edit</button>
                    </form>
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
