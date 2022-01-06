## 362 Create User Login Authentication API Part2

- `SendGridを設定しておく`<br>

- `$ php artisan make:controller User/ForgetPasswordController`を実行<br>

- `$ php artisan make:request ForgetPasswordRequest`を実行<br>

```
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgetPasswordRequest extends FormRequest
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
            'email' => 'required',
        ];
    }
}
```

- `$ php artisan make:mail ForgetPasswordMail`を実行<br>

- `app/Http/Controllers/User/ForgetPasswordController.php`を編集<br>

```
<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;
use App\Mail\ForgetPasswordMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $email = $request->email;

        if (User::where('email', $email)->doesntExist()) {
            return response([
                'message' => 'Email Invalid',
            ], 401);
        }

        // generate Random Token
        $token = rand(10, 100000);

        try {
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
            ]);

            // Mail Send to User
            Mail::to($email)->send(new ForgetPasswordMail($token));

            return response([
                'message' => 'Reset Password Mail send on your email',
            ], 200);
        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
```

- `app/Mail/ForgetPasswordMail.php`を編集<br>

```
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->data = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;

        return $this->from('takaki_5573031@yahoo.co.jp')
            ->view('mail.forget_password', compact('data'))
            ->subject('Password Reset Link');
    }
}
```

- `resources/views/mail`ディレクトリを作成<br>

- `resources/views/mail/forget_password.blade.php`を作成<br>

```
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget Password</title>
</head>

<body>
  HI <br>
  Change Your Password <a href="http://localhost:3000/reset/{{ $data }}">Click Here</a>
  Pincode : {{ $data }}
</body>

</html>
```

- `Postman(POST) http://localhost/api/forgetpassword`を入力<br>

- `BODYタグを選択してform-data`を選択<br>

- `KEYにemailを入力 VALUEにメールアドレス`を入力<br>

- `Sendしてメールが届くか確認する`<br>

```
{
    "message": "Reset Password Mail send on your email"
}
```

## 363 Create User Login Authentication API Part3

- `$ php artisan make:migration add_password_reset_table --table=password_resets`を実行<br>

- `add_password_reset_table.php`を編集<br>

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasswordResetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('password_resets', function (Blueprint $table) {
            $table->id();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('password_resets', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }
}
```

- `$ php artisan make:controller User/ResetPasswordController`を実行<br>

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
use App\Http\Controllers\User\ForgetPasswordController;
use App\Http\Controllers\User\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// --------- User Login API Start -------------
// Login Routes
Route::post('/login', [AuthController::class, 'login']);
// Register Routes
Route::post('/register', [AuthController::class, 'register']);
// Forget Password Routes
Route::post('/forgetpassword', [ForgetPasswordController::class, 'forgetPassword']);
// Reset Password Routes
Route::post('/resetpassword', [ResetPasswordController::class, 'resetPassword']); // 追記
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

- `$ php artisan make:request ResetPasswordRequest`を実行<br>

```
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ];
    }
}
```

- `app/Http/Controllers/User/ResetPasswordController.php`を編集<br>

```
<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function resetPassword(ResetPasswordRequest $request)
    {
        $email = $request->email;
        $token = $request->token;
        $password = Hash::make($request->password);

        $emailcheck = DB::table('password_resets')
            ->where('email', $email)->first();
        $pincheck = DB::table('password_resets')
            ->where('token', $token)->first();

        if (!$emailcheck) {
            return response([
                'message' => "Email Not Found",
            ], 401);
        }
        if (!$pincheck) {
            return response([
                'message' => "Pin Code Invalid",
            ], 401);
        }

        DB::table('users')
            ->where('email', $email)->update(['password' => $password]);
        DB::table('password_resets')
            ->where('email', $email)->delete();

        return response([
            'message' => 'Password Change Successfully',
        ], 200);
    }
}
```

- `Postman(POST) http://localhost/api/resetpassword`を入力<br>

- `Bodyタブを選択してform-data`を選択する<br>

- `KEYにtoken email password password_confirmation`を入力<br>

- `各VALUEに入力する`<br>

- `Sendして確認する`<br>

```
{
    "message": "Password Change Successfully"
}
```

## 364 Create User Login Authentication API Part4

+ `$ php artisan make:controller User/UserController`を実行<br>

+ `routes/api.php`を編集<br>

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
use App\Http\Controllers\User\ForgetPasswordController;
use App\Http\Controllers\User\ResetPasswordController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// --------- User Login API Start -------------
// Login Routes
Route::post('/login', [AuthController::class, 'login']);
// Register Routes
Route::post('/register', [AuthController::class, 'register']);
// Forget Password Routes
Route::post('/forgetpassword', [ForgetPasswordController::class, 'forgetPassword']);
// Reset Password Routes
Route::post('/resetpassword', [ResetPasswordController::class, 'resetPassword']);
// Current User Route
Route::get('/user', [UserController::class, 'user'])->middleware('auth:api'); // 追記
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

+ `app/Http/Controllers/User/UserController.php`を編集<br>

```
<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user()
    {
        return Auth::user();
    }
}
```

+ `Postman(GET) http://localhost/api/user`を入力<br>

+ `HeadersタブのKeyにAuthorizationを追加記入し Valueに Bearer "ここにloginしたtokenをコピペする(""は除く)"` を追加記入する<br>

+ `Bodyタブを選択してform-data`を選択する<br>

+ `KEYにemailとpasswordを記入`<br>

+ `Sendする`<br>

```
{
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
```

## 365 Consume User Authentication Login Credentials Part1

+ `React Project`を編集<br>
