<?php

namespace App\Models;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Manager\ImageUploadManager;
use App\Manager\Utility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUS_LIST = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive'
    ];

    public const LOGO_UPLOAD_PATH = 'uploads/company/';
    public const LOGO_UPLOAD_PATH_THUMB = 'uploads/company/thumb/';
    public const LOGO_WIDTH = 600;
    public const LOGO_HEIGHT = 600;
    public const LOGO_WIDTH_THUMB = 150;
    public const LOGO_HEIGHT_THUMB = 150;

    public function storeCompany(StoreCompanyRequest $request)
    {
        return self::query()->create($this->prepareCompanyData($request));
    }

    private function prepareCompanyData(StoreCompanyRequest $request)
    {
        $data=[
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'ceo'         => $request->input('ceo'),
            'address'     => $request->input('address'),
            'account'     => $request->input('account'),
            'status'      => $request->input('status')
        ];
        if ($request->hasFile('logo_path')) {
            $logo_path = (new ImageUploadManager)->file($request->file('logo_path'))
                ->name(Utility::prepare_name($request->input('name')))
                ->path(self::LOGO_UPLOAD_PATH)
                ->height(self::LOGO_HEIGHT)
                ->width(self::LOGO_WIDTH)
                ->upload();

            $data['logo_path'] = $logo_path;
        }


        return $data;
    }

    public function getAllCompanies()
    {
        return self::query()->paginate(15);
    }

    public function getCompanies()
    {
        return self::query()->pluck('name', 'id');
    }

    public function updateCompany(UpdateCompanyRequest $request, Company $company)
    {
        $data=[
            'name'        => $request->input('name') ?? $company->name,
            'description' => $request->input('description') ?? $company->description,
            'ceo'         => $request->input('ceo') ?? $company->ceo,
            'address'     => $request->input('address') ?? $company->address,
            'account'     => $request->input('account') ?? $company->account,
            'status'      => $request->input('status') ?? $company->status
        ];
        $logo_path=$company->logo_path;
        if ($request->hasFile('logo_path')) {
            if($logo_path){
                ImageUploadManager::deletePhoto(self::LOGO_UPLOAD_PATH, $company->logo_path);
            }
            $logo_path = (new ImageUploadManager)->file($request->file('logo_path'))
                ->name(Utility::prepare_name($request->input('name')))
                ->path(self::LOGO_UPLOAD_PATH)
                ->height(self::LOGO_HEIGHT)
                ->width(self::LOGO_WIDTH)
                ->upload();


        }
        $data['logo_path'] = $logo_path;

        return $company->update($data);


    }

    public function deleteCompany(Company $company)
    {
        if($company->logo_path){
            ImageUploadManager::deletePhoto(self::LOGO_UPLOAD_PATH, $company->logo_path);
        }
        return $company->delete();
    }

    public function getCompanyList()
    {
        return self::query()->where('status', self::STATUS_ACTIVE)->pluck('name', 'id');
    }


    public function departments()
    {
        return $this->hasMany(Department::class);
    }



}
