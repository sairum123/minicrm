@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header" >
                    <strong class="text-primary">{{__('app.employeerecord')}}</strong>
                    <a href="{{ route('employees.create') }}" class="btn btn-outline-dark float-right">{{__('app.addemployee')}}</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('app.firstname')}}</th>
                                <th scope="col">{{__('app.lastname')}}</th>
                                <th scope="col">{{__('app.comapny')}}</th>
                                <th scope="col">{{__('app.email')}}</th>
                                <th scope="col">{{__('app.phone')}}</th>
                                <th scope="col">{{__('app.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td >{{$employee->first_name}}</td>
                                <td>{{$employee->last_name}}</td>
                                <td>{{$employee->company->name}}</td>
                                <td>@if(!$employee->email) <p class="text-danger">{{__('app.emailnotfound')}}</p>
                                    @else {{$employee->email}} @endif</td>
                                <td>@if(!$employee->phone_number) <p class="text-danger">{{__('app.phonenotfound')}}</p>
                                    @else {{$employee->phone_number}} @endif</td>
                                <td>
                                    <div class="d-flex ">
                                        <a  href="{{ route('employees.edit',$employee->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('employees.destroy',  $employee->id)}}" method="POST">
                                            @csrf
                                            @method('Delete')
                                            <button type="submit" class="ml-1 btn btn-danger btn-sm far fa-trash-alt" ></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            {{$employees->links()}}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
