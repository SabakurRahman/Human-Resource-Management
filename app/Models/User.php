<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Manager\ImageUploadManager;
use App\Manager\Traits\CompanyBind;
use App\Manager\Utility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles,HasApiTokens,HasFactory, Notifiable,CompanyBind;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
   protected $guarded = [];

    public const STATUS_ACTIVE = 1;
    public const STATUS_PENDING = 2;
    public const STATUS_BLOCKED = 3;

    public const STATUS_LIST = [
        self::STATUS_ACTIVE  => 'Active',
        self::STATUS_PENDING => 'Pending',
        self::STATUS_BLOCKED => 'Blocked',
    ];

    public const PHOTO_UPLOAD_PATH = 'uploads/user/';
    public const PHOTO_UPLOAD_PATH_THUMB = 'uploads/user/thumb/';
    public const PHOTO_WIDTH = 600;
    public const PHOTO_HEIGHT = 600;
    public const PHOTO_WIDTH_THUMB = 150;
    public const PHOTO_HEIGHT_THUMB = 150;


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAllUsers()
    {
        return self::query()->orderByDesc('id')->paginate(15);
    }



    public function storeUser(StoreEmployeeRequest $request)
    {

        return self::query()->create($this->prepareUserData($request));

    }

    private function prepareUserData(StoreEmployeeRequest $request)
    {

        $data = [
            'name'      => $request->name,
            'phone'     => $request->phone_2,
            'email'     => $request->email,
            'company_id'=> $request->company_id,
            'status'    => $request->status ?? self::STATUS_ACTIVE,
            'password'  => Hash::make($request->password),

        ];

        if ($request->hasFile('photo')) {
            $photo = (new ImageUploadManager)->file($request->file('photo'))
                ->name(Utility::prepare_name($request->input('name')))
                ->path(self::PHOTO_UPLOAD_PATH)
                ->height(self::PHOTO_HEIGHT)
                ->width(self::PHOTO_WIDTH)
                ->upload();

            $data['photo'] = $photo;
        }


        return $data;

    }

    public function updateUser(UpdateEmployeeRequest $request, mixed $user_id)
    {
        $user = self::query()->findOrFail($user_id);

        $updateUserData = [
            'name'      => $request->input('name') ?? $user->name,
            'phone'     => $request->input('phone') ?? $user->phone,
            'email'     => $request->input('email') ?? $user->email,
            'company_id'=> $request->input('company_id') ?? $user->company_id,
            'status'    => $request->input('status') ?? $user->status,
        ];

        $photo = $user->photo;

        if ($request->hasFile('photo')) {
            if ($photo) {
                ImageUploadManager::deletePhoto(self::PHOTO_UPLOAD_PATH, $user->photo);
            }

            $photo = (new ImageUploadManager)->file($request->file('photo'))
                ->name(Utility::prepare_name('user'))
                ->path(self::PHOTO_UPLOAD_PATH)
                ->height(self::PHOTO_HEIGHT)
                ->width(self::PHOTO_WIDTH)
                ->upload();
        }

        $updateUserData['photo'] = $photo;
        $user->update($updateUserData);

        if ($request->filled('password') && $request->filled('old_password')) {
            if (Hash::check($request->input('old_password'), $user->password)) {
                // Only update the password if "password" is present in the request
                if ($request->has('password')) {
                    $updatePasswordData['password'] = Hash::make($request->input('password'));
                    $user->update($updatePasswordData);
                }
            } else {
                return false;
            }
        }

        return $user;


    }


}
