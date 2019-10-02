<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyStoreRequest;
use Illuminate\Support\Facades\Lang;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //display 10 records per page
    public function index()
    {
        $companies = Company::latest()->paginate(10);
        return view('companies.index',compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(CompanyStoreRequest $request)
    {
        //validating this request from http/requests/CompanyStoreRequest
        $data = $request->validated();
        if (request()->logo) {
            //store image
            $imagepath = request()->logo->store('companies/logo', 'public');
            $data['logo'] = $imagepath;
        }
         Company::create($data);
        return redirect()->route('companies.index')->with('success',Lang::get('app.companyadded'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));
    }

    public function update(CompanyStoreRequest $request, Company $company)
    {
        //validating this request from http/requests/CompanyStoreRequest
        $data = $request->validated();
        if (request()->logo) {
            //store image
            $imagepath = request()->logo->store('companies/logo', 'public');
            $data['logo'] = $imagepath;
        }
        $company->update($data);
        return redirect()->route('companies.index')->with('success',Lang::get('app.companyupdated'));
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success',Lang::get('app.companydeleted'));
    }
}
