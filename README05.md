# Section38: Laravel Passport Authentication

## 360 Laravel passport Authentication Passport Install

- `$ composer require laravel/passport`を実行<br>

- `$ php artisan migrate`を実行<br>

- `$ php artisan passport:install`を実行<br>

- `server/.envにCLIENT_1とCLIENT_2のシークレットキーを設定する`<br>

- `app/Models/User.php`を編集<br>

```
<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
// use Laravel\Sanctum\HasApiTokens; // コメントアウト
use Laravel\Passport\HasApiTokens; // 追記

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
```

- `app/Providers/AuthServiceProvider.php`を編集<br>

```
<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport; // 追記

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy', // コメントアウトを解除
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if (!$this->app->routesAreCached()) {
            Passport::routes();
        }
    }
}
```

- `config/auth.php`を編集<br>

```
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // 追記
        'api' => [
            'driver' => 'passport',
            'provider' => 'users',
            'hash' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800,

];
```

## 361 Create User Login Authentication API Part1

- `$ php artisan make:controller User/AuthController`を実行<br>

- `routes/api.php`を編集<br>

```
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\User\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// --------- User Login API Start -------------
Route::post('/login', [AuthController::class, 'login']); // 追記
// --------- End User Login API ---------


// Get Visitor
Route::get('/getvisitor', [VisitorController::class, 'getVisitorDetails']);
// Contact Page Route
Route::post('/postcontact', [ContactController::class, 'postContactDetails']);
// Site Info Route
Route::get('/allsiteinfo', [SiteInfoController::class, 'allSiteInfo']);
// All Category Route
Route::get('/allcategory', [CategoryController::class, 'AllCategory']);
// ProductList Route
Route::get('/productlistbyremark/{remark}', [ProductListController::class, 'productListByRemark']);
Route::get('/productlistbycategory/{category}', [ProductListController::class, 'productListByCategory']);
Route::get('/productlistbysubcategory/{category}/{subcategory}', [ProductListController::class, 'productListBySubCategory']);
// Slider Route
Route::get('/allslider', [SliderController::class, 'allSlider']);
// Product Details Route
Route::get('/productdetails/{id}', [ProductDetailController::class, 'productDetails']);
// Notifications Route
Route::get('/notification', [NotificationController::class, 'notificationHistory']);
// Search Route
Route::get('/search/{key}', [ProductListController::class, 'productBySearch']);
```

- `User/AuthController.php`を編集<br>

```
<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;

                return response([
                    'message' => "Successfully Login",
                    'token' => $token,
                    'user' => $user
                ], 200); // Status Code
            }
        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage(),
            ], 400);
        }

        return response([
            'message' => 'Invalid Email Or Password',
        ], 401);
    }
}
```

- `routes.php`を編集<br>

```
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\User\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// --------- User Login API Start -------------
// Login Routes
Route::post('/login', [AuthController::class, 'login']);
// Register Routes
Route::post('/register', [AuthController::class, 'register']); // 追記
// --------- End User Login API ---------


// Get Visitor
Route::get('/getvisitor', [VisitorController::class, 'getVisitorDetails']);
// Contact Page Route
Route::post('/postcontact', [ContactController::class, 'postContactDetails']);
// Site Info Route
Route::get('/allsiteinfo', [SiteInfoController::class, 'allSiteInfo']);
// All Category Route
Route::get('/allcategory', [CategoryController::class, 'AllCategory']);
// ProductList Route
Route::get('/productlistbyremark/{remark}', [ProductListController::class, 'productListByRemark']);
Route::get('/productlistbycategory/{category}', [ProductListController::class, 'productListByCategory']);
Route::get('/productlistbysubcategory/{category}/{subcategory}', [ProductListController::class, 'productListBySubCategory']);
// Slider Route
Route::get('/allslider', [SliderController::class, 'allSlider']);
// Product Details Route
Route::get('/productdetails/{id}', [ProductDetailController::class, 'productDetails']);
// Notifications Route
Route::get('/notification', [NotificationController::class, 'notificationHistory']);
// Search Route
Route::get('/search/{key}', [ProductListController::class, 'productBySearch']);
```

- `$ php artisan make:request RegisterRequest`を実行<br>

```
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:55',
            'email' => 'required|unique:users|min:5|max:60',
            'password' => 'required|min:6|confirmed',
        ];
    }
}
```

- `app/Http/Controllers/User/AuthController.php`を編集<br>

```
<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;

                return response([
                    'message' => "Successfully Login",
                    'token' => $token,
                    'user' => $user
                ], 200); // Status Code
            }
        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage(),
            ], 400);
        }

        return response([
            'message' => 'Invalid Email Or Password',
        ], 401);
    }

    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $token = $user->createToken('app')->accessToken;

            return response([
                'message' => 'Registration Successfull',
                'token' => $token,
                'user' => $user,
            ], 200);
        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage(),
            ], 400);
        }
    }
}
```

- `Postman(POST) http://localhost/api/login`<br>

- `BODYタブのform-data`を選択<br>

- `KEYにemail と password`と入れる<br>

- `emailのVALUEとpasswordのVALUE`を入れる(登録されてない情報を入れてみる)<br>

- `Sendすると`<br>

```
{
    "message": "Invalid Email Or Password"
}
```

+ `Postman(POST) http://localhost/api/register`を入力<br>

+ `BODYタブを選択 form-data`を選択<br>

+ `KEYに name email password password_confirmation`を入力<br>

+ `各KEYのVALUE`を入力<br>

+ `Send`する<br>

+ `登録完了する`<br>

```
{
    "message": "Registration Successfull",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTgxMGYyZjEwZWFkMGUzNWUwZjA5YjA2OTEyNjIzYWYzMDg0MDlhNjEyNWVhNDViNjlkMWQ4OTIzMWY0YWQzMTFlOWQ3YjY3MmVmYWE3ZDIiLCJpYXQiOjE2NDE0NDE5MDguOTYzMjk0LCJuYmYiOjE2NDE0NDE5MDguOTYzMzA3LCJleHAiOjE2NzI5Nzc5MDguOTAxODA0LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.SAajO8wXjly9aRm_mbFEQZkDTLs7MDbFR0I97QpUAC4jJamauS5VaFFw7MwMws7Q1aQHAcAUp35XsPPvqg9FNxgtNmNL8eVqwWtzktedOBfdvmRM5d2j-2whFNS_gm226rC9H9GAYw2ChzOylV1ymBrI-HfpSItto8MS1HFhl9KvogM9si9iepa33YSHwyYVKF6zjn7Fpb9jvi_45XgBUq0zCDCt8X09XTHv1kelZ08RmfyAeFMj6mpLxjAI26VoAdiX2a1rssbWX1jSLY2TYrZRJ80z-Wdh0jDeNomPlslcTGFc2bp2dq4J_ULNkmMTJb9_JCzNWDTeKsBbgsMZXkr_PMLwkC6-DFF0bAFLAdzUuRSZO4xbgUEfn808liKJx4Gn1HoxEkENvcIcueZ1HVOT0iGu9ekUe2okUrNpwd-zWvehIG1SZYMMBrG2EZXMzmCGOTB_tdlS6LsKiC0RvZA_ndAFW_I4uAkJrQs62dLBgIosvkpQeDwvgjHykzBmwZ6zqVJu_k1C39sng9-_VMjaMgv4yzRi6k2I3TRGU50u3mSGHkT03RxYbQT80J6MABSy2wyeS938BLeZGAVL0hQlH25mrq1w2ef6JLx8p0JxAkErWsGvtnWCxEm60Ezb6Msrf1SektqVWDZHGrTB6Ont9b0S3GtNdsJRWX2Bmks",
    "user": {
        "name": "naomi",
        "email": "takaki_5573031@yahoo.co.jp",
        "updated_at": "2022-01-06T04:05:08.000000Z",
        "created_at": "2022-01-06T04:05:08.000000Z",
        "id": 2,
        "profile_photo_url": "https://ui-avatars.com/api/?name=naomi&color=7F9CF5&background=EBF4FF"
    }
}
```

+ `POSTMAN(POST) http://localhost/api/login/`<br>

+ `登録されたユーザー情報を入力してSend`してみる<br>

```
{
    "message": "Successfully Login",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNDUzYWMyY2IyNmM1ZDRlMzcwYzg1YTRkNDY4MTNlZTc0ZGYyNzQxODg3NzQwMGQzZTdkYzI1M2M5MjczNDg2Y2ZmZGI4ZWIwNDY1YjU1NzkiLCJpYXQiOjE2NDE0NDIwOTIuODY5MDkyLCJuYmYiOjE2NDE0NDIwOTIuODY5MTA1LCJleHAiOjE2NzI5NzgwOTIuODE5NzQzLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.B_achGMc0WLqV6IGlISNqN8TNqb-TFHq2n0oQLlLGu7YhRkLuzBsZNpbRIRuM9xwXcy3R5Pb-A9pj30xW5B7xeZYxr7aHx844qkFh8FoYVLAu4twL7xYAVC7YIH-ezlpqddp3zfXVLbGezOUryaKTT8o-nKVLvjh-iauRGrDWGbYsakdIN027gGViDcZ4aGFEZrLjL7dgZGGnrcgltD4XZ7NC33S9WlcU8RjISG6Cw9DGzP-FAS6H2eY7fh3CM-UMoTl4Gl2J-5_ytQ-SFf-PjTDLUflrfHKqLKvnMPjP5cfcK46DDu2QJJWY-vGuga2WDVbYx04igGZsK5g2HyQ1HhLjt8H4jNAM6u7nScYz8_Se3VPxcSTkfI-CsPaV7NhM54zviMA8EINhpndZBD_Dl55W6tH_5GvBvsoxMCHB5sdzERTJtuCTZCTTBN0GxrCuvJ9kcqdcWtCrYaYU5bhqg5hk8QXf2xUR_pSyT1DHtxI5Lr8wz6lXnqnJCP-7GxoRHifyqMJ-EIsgZNTJ1vlN5W5YJ4IGzduYVP60keO-8U_NJb8ZYYS57l5ROt5BQPbQu3Onlseh-mA2Db7pfG_e9QCqVxaaVrR4cd2PMKX6riv3YQOI_Qs3FtFpoKtFrzB29PWHD94NfeBuPr-OPYJHDPgtgVXlatrCRwdpgpfrrY",
    "user": {
        "id": 2,
        "name": "naomi",
        "email": "takaki_5573031@yahoo.co.jp",
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "created_at": "2022-01-06T04:05:08.000000Z",
        "updated_at": "2022-01-06T04:05:08.000000Z",
        "profile_photo_url": "https://ui-avatars.com/api/?name=naomi&color=7F9CF5&background=EBF4FF"
    }
}
```
