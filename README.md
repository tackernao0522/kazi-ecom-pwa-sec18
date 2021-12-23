# kazi-ecom-pwa-sec18

## Section26: Laravel Authentication

## 296 Install Laravel Authtntication and Config Database

+ `$ composer require laravel/jetstream`を実行<br>

+ `$ php artisan jetstream:install livewire`を実行<br>

+ `$ npm install`を実行<br>

+ `$ npm run dev`を実行<br>

+ `$ php artisan migrate`を実行<br>

+ `config/jetstream.php`を編集<br>

```
<?php

use Laravel\Jetstream\Features;

return [

    /*
    |--------------------------------------------------------------------------
    | Jetstream Stack
    |--------------------------------------------------------------------------
    |
    | This configuration value informs Jetstream which "stack" you will be
    | using for your application. In general, this value is set for you
    | during installation and will not need to be changed after that.
    |
    */

    'stack' => 'livewire',

    /*
     |--------------------------------------------------------------------------
     | Jetstream Route Middleware
     |--------------------------------------------------------------------------
     |
     | Here you may specify which middleware Jetstream will assign to the routes
     | that it registers with the application. When necessary, you may modify
     | these middleware; however, this default value is usually sufficient.
     |
     */

    'middleware' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Features
    |--------------------------------------------------------------------------
    |
    | Some of Jetstream's features are optional. You may disable the features
    | by removing them from this array. You're free to only remove some of
    | these features or you can even remove all of these if you need to.
    |
    */

    'features' => [
        // Features::termsAndPrivacyPolicy(),
        Features::profilePhotos(), // コメントアウトを解除
        // Features::api(),
        // Features::teams(['invitations' => true]),
        Features::accountDeletion(),
    ],

    /*
    |--------------------------------------------------------------------------
    | Profile Photo Disk
    |--------------------------------------------------------------------------
    |
    | This configuration value determines the default disk that will be used
    | when storing profile photos for your application's users. Typically
    | this will be the "public" disk but you may adjust this if needed.
    |
    */

    'profile_photo_disk' => 'public',

];
```

## 297 Create Visitor Details Rest API

+ `$ php artisan make:model Visitor -m`を実行<br>

+ `create_visitors_table.php`を編集<br>

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->string('visit_time');
            $table->string('visit_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
```

+ `app/Models/Visitor.php`を編集<br>

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'visit_time',
        'visit_date',
    ];
}
```

+ `$ php artisan migrate`を実行<br>

+ `$ php artisan make:controller Admin/VisitorController`を実行<br>

+ `routes/api.php`を編集<br>

```
<?php

use App\Http\Controllers\Admin\VisitorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/getvisitor', [VisitorController::class, 'getVisitorDetails']);
```

+ `app/Http/Controllers/Admin/VisitorController.php`を編集<br>


```
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function getVisitorDetails()
    {
        $ip_address = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Tokyo");
        $visit_time = date("h:i:sa");
        $visit_date = date("d-m-Y");

        $result = Visitor::insert([
            'ip_address' => $ip_address,
            'visit_time' => $visit_time,
            'visit_date' => $visit_date,
        ]);

        return $result;
    }
}
```

+ `POSTMAN(GET) http://localhost/api/getvisitor`<br>

## 298 Consume Visitor Details API Form Client

+ `ReactのProjectを編集`<br>

## 299 Create Contact Rest API

+ `$ php artisan make:model Contact -m`を実行<br>

+ `create_contacts_table.php`を編集<br>

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->string('contact_date');
            $table->string('contact_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
```

+ `app/Models/Contact.php`を編集<br>

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];
}
```

+ `$ php artisan migrate`を実行<br>

+ `$ php artisan make:controller Admin/ContactController`を実行<br>

+ `routes.api.php`を編集<br>

```
<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\VisitorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Get Visitor
Route::get('/getvisitor', [VisitorController::class, 'getVisitorDetails']);
// Contact Page Route
Route::post('/postcontact', [ContactController::class, 'postContactDetails']);
```

+ `Admin/ContactController.php`を編集<br>

```
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function postContactDetails(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        date_default_timezone_set("Asia/Tokyo");
        $contact_time = date("h:i:sa");
        $contact_date = date("d-m-Y");

        $result = Contact::insert([
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'contact_time' => $contact_time,
            'contact_date' => $contact_date,
        ]);

        return $result;
    }
}
```

+ `POSTMAN(POST) http://localhost/api/postcontact`<br>

+ `Bodyタブを選択`<br>

+ `x-www-form-uriencoded`を選択<br>

+ `各KEYに name, email, messageと入力`<br>

+ `各VALUEに Takabo, takaki55730317@gmail.com, this is test message`と入力してみる<br>

+ `Send`をクリック<br>
