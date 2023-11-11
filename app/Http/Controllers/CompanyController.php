<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{

    public function index()
    {
       $page_content = [
            'page_title' => __('Company List'),
            'module_name' => __('Company'),
            'sub_module_name' => __('List'),
            'module_route' => route('companies.create'),
            'button_type'    => 'create' //list
        ];



        $companies = (new Company())->getAllCompanies();

        return view('companies.index', compact('page_content', 'companies'));
    }


    public function create()
    {
        $page_content = [
            'page_title' => __('Add New Company'),
            'module_name' => __('Company'),
            'sub_module_name' => __('Add Company'),
            'module_route' => route('companies.index'),
            'button_type'    => 'list' //create
        ];

      return view('companies.create', compact('page_content'));

    }


    public function store(StoreCompanyRequest $request)
    {
        (new Company())->storeCompany($request);
        return redirect()->route('companies.index')->with('success', __('Company has been added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }


    public function edit(Company $company)
    {
        $page_content = [
            'page_title' => __('Edit Company'),
            'module_name' => __('Company'),
            'sub_module_name' => __('Edit Company'),
            'module_route' => route('companies.index'),
            'button_type'    => 'list' //create
        ];

        return view('companies.edit', compact('page_content', 'company'));
    }


    public function update(UpdateCompanyRequest $request, Company $company)
    {

        (new Company())->updateCompany($request, $company);
        return redirect()->route('companies.index')->with('success', __('Company has been updated successfully'));
    }


    public function destroy(Company $company)
    {

            (new Company())->deleteCompany($company);
            return redirect()->route('companies.index')->with('success', __('Company has been deleted successfully'));
    }
}
