@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header" >
                        <strong class="text-primary" >{{__('app.companyrecord')}}</strong>
                        <a href="{{ route('companies.create') }}" class="btn btn-outline-dark float-right">{{__('app.addcompany')}}</a>
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
                                <th scope="col">{{__('app.logo')}}</th>
                                <th scope="col">{{__('app.name')}}</th>
                                <th scope="col">{{__('app.email')}}</th>
                                <th scope="col">{{__('app.website')}}</th>
                                <th scope="col">{{__('app.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>@if(!$company->logo) <p class="text-danger">{{__('app.logonotfound')}}</p>
                                    @else <img src="/storage/{{$company->logo}}" alt="logo" width="70" height="70" class="rounded-circle"> @endif</td>
                                <td >{{$company->name}}</td>
                                <td>@if(!$company->email) <p class="text-danger">{{__('app.emailnotfound')}}</p>
                                    @else {{$company->email}} @endif</td>
                                <td>@if(!$company->website) <p class="text-danger">{{__('app.websitenotfound')}}</p>
                                    @else {{$company->website}} @endif</td>
                                <td>
                                    <div class="d-flex ">
                                    <a  href="{{ route('companies.edit',$company->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('companies.destroy',  $company->id)}}" method="POST">
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
                            {{$companies->links()}}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
