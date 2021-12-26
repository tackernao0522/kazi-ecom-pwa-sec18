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

## 300 Consume Contact Rest API From Client Side Part1

`React Project`を編集<br>

## 306 Create Site Info API

+ `$ php artisan make:model SiteInfo -m`を実行<br>

+ `app/Models/create_site_infos_table.php`を編集<br>

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_infos', function (Blueprint $table) {
            $table->id();
            $table->text('about', 50000);
            $table->text('refund', 50000);
            $table->text('parchase_guide', 50000);
            $table->text('privacy', 50000);
            $table->text('address', 50000);
            $table->string('android_app_link');
            $table->string('ios_app_link');
            $table->string('facebook_link');
            $table->string('twitter_link');
            $table->string('instagram_link');
            $table->string('copyright_text');
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
        Schema::dropIfExists('site_infos');
    }
}
```

+ `app/Models/SiteInfo.php`を編集<br>

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    use HasFactory;

    protected $guarded = [];
}
```

+ `$ php artisan migrate`を実行<br>

+ `phpMyAdminのsite_infos_tableに直接aboutカラムのvalue`にOnline Editorで生成したHTMLを直接挿入<br>

```
<h4>About Us Page</h4>

<p>Hi! I&#39;m Kazi Ariyan. I&#39;m a web developer with a serious love for teaching I am a founder of easy Learning and a passionate Web Developer, Programmer &amp; Instructor.<br />
<br />
I am working online for the last 9 years and have created several successful websites running on the internet.<br />
<br />
I try to create a project-based course that helps you to learn professionally and make you fell as a complete developer. easy learning exists to help you succeed in life. Each course has been hand-tailored to teach a specific skill.<br />
<br />
I hope you agree! Whether you&rsquo;re trying to learn a new skill from scratch or want to refresh your memory on something you&rsquo;ve learned in the past, you&rsquo;ve come to the right place. Education makes the world a better place. Make your world better with new skills.</p>
```

+ `phpMyAdminのsite_infos_tableに直接privacyカラムのvalue`にOnline Editorで生成したHTMLを直接挿入<br>

```
<h4>Privacy Page</h4>

<p>Indie record labels rank amongst the globe&rsquo;s top record labels and have their own significant benefits when compared with major labels. Of course, there are pros and cons of signing with an independent label, and here, Reed Louis Jeune &ndash; founder of the&nbsp;<a href="https://trillcorporation.com/" rel="nofollow noopener">Trill Corporation</a>&nbsp;independent label &ndash; outlines the possibilities.</p>

<p>&ldquo;Over the past few years, a lot of artists have begun to change their aspirations and are now becoming increasingly interested in signing with independent labels&rdquo;, he says. &ldquo;It represents a goal that is more realistic for many, but that&rsquo;s not all &ndash; signing up to a smaller label can actually come with a host of advantages.&rdquo;</p>

<p><strong>What Are the Pros And Cons Of Signing With An Indie Label?</strong></p>

<p>Reed Louis Jeune is open about the fact that there are downsides as well as positives to signing up with an independent label like his own, but he believes that the advantages outweigh the disadvantages.</p>
```

+ `phpMyAdminのsite_infos_tableに直接refundカラムのvalue`にOnline Editorで生成したHTMLを直接挿入<br>

```
<h4>Refund Page</h4>

<p>The Swiss psychiatrist, Carl Jung, described a persona as a &ldquo;mask or facade presented to satisfy the demands of the situation or the environment and not representing the inner personality of the individual.&rdquo; Jung points out that such behaviors are often a mask to get through life, whereas the inner identity may be quite different.</p>

<p>In the same vein, the persona of a successful digital leader is not inherent and therefore, the persona is unique to the individual&rsquo;s environment or circumstance. In other words, different settings or situations require a unique persona that best fits into their leadership objectives.</p>

<p><strong>Cultivating a Persona of Authenticity</strong><br />
<br />
While I have encountered many born leaders in the military and during my time as CEO at Trianz, there is one persona that stands out. It is a persona that I have come across in my research on &ldquo;Digital Champions&rdquo; &mdash; the 7% of companies that manage to successfully transform &mdash; and my reason for writing this book. That persona is what I have dubbed the &ldquo;Methodical Innovator.&rdquo;</p>

<p>The Methodical Innovator is a persona that embraces a game of calm and composed intelligence and smarts. It is not one of grandiose vision, bravado, soul-stirring speeches, or frittering away capital without proper prioritization or forethought.</p>
```

+ `phpMyAdminのsite_infos_tableに直接parchase_guideカラムのvalue`にOnline Editorで生成したHTMLを直接挿入<br>

```
<p>Purchase Page</p>

<p>Prior to today&#39;s trading, shares of the largest U.S. drugstore chain had gained 8.28% over the past month. This has outpaced the Retail-Wholesale sector&#39;s loss of 4.49% and the S&amp;P 500&#39;s gain of 0.87% in that time.</p>

<p>Wall Street will be looking for positivity from Walgreens Boots Alliance as it approaches its next earnings report date. This is expected to be January 6, 2022. On that day, Walgreens Boots Alliance is projected to report earnings of $1.22 per share, which would represent no growth from the prior-year quarter. Our most recent consensus estimate is calling for quarterly revenue of $32.93 billion, down 9.31% from the year-ago period.</p>

<p>Looking at the full year, our Zacks Consensus Estimates suggest analysts are expecting earnings of $4.91 per share and revenue of $131.5 billion. These totals would mark changes of -7.53% and -4.28%, respectively, from last year.</p>

<p>It is also important to note the recent changes to analyst estimates for Walgreens Boots Alliance. Recent revisions tend to reflect the latest near-term business trends. As a result, we can interpret positive estimate revisions as a good sign for the company&#39;s business outlook.</p>

<p>Research indicates that these estimate revisions are directly correlated with near-term share price momentum. We developed the Zacks Rank to capitalize on this phenomenon. Our system takes these estimate changes into account and delivers a clear, actionable rating model.</p>

<p>&nbsp;</p>

<p>The Zacks Rank system ranges from #1 (Strong Buy) to #5 (Strong Sell). It has a remarkable, outside-audited track record of success, with #1 stocks delivering an average annual return of +25% since 1988. Within the past 30 days, our consensus EPS projection has moved 0.12% lower. Walgreens Boots Alliance is holding a Zacks Rank of #4 (Sell) right now.</p>

<p>Looking at its valuation, Walgreens Boots Alliance is holding a Forward P/E ratio of 10.28. For comparison, its industry has an average Forward P/E of 10.28, which means Walgreens Boots Alliance is trading at a no noticeable deviation to the group.</p>

<p>We can also see that WBA currently has a PEG ratio of 2.32. This metric is used similarly to the famous P/E ratio, but the PEG ratio also takes into account the stock&#39;s expected earnings growth rate. The Retail - Pharmacies and Drug Stores was holding an average PEG ratio of 2.1 at yesterday&#39;s closing price.</p>

<p>The Retail - Pharmacies and Drug Stores industry is part of the Retail-Wholesale sector. This group has a Zacks Industry Rank of 115, putting it in the top 46% of all 250+ industries.</p>

<p>The Zacks Industry Rank includes is listed in order from best to worst in terms of the average Zacks Rank of the individual companies within each of these sectors. Our research shows that the top 50% rated industries outperform the bottom half by a factor of 2 to 1.</p>
```

+ `phpMyAdminのsite_infos_tableに直接addressカラムのvalue`にOnline Editorで生成したHTMLを直接挿入<br>

```
<p>1635 Franklin Street Montgomery, Near Sherwood Mall. AL 36104<br />
Email: Support@easylearningbd.com</p>
```

+ `phpMyAdminのsite_infos_tableに直接android_app_linkカラムのvalue`に直接入力<br>

```
http://localhost/android
```

+ `phpMyAdminのsite_infos_tableに直接ios_app_linkカラムのvalue`に直接入力<br>

```
http://localhost/ios
```

+ `phpMyAdminのsite_infos_tableに直接facebook_linkカラムのvalue`に直接入力<br>

```
https://www.facebook.com/
```

+ `phpMyAdminのsite_infos_tableに直接twitter_linkカラムのvalue`に直接入力<br>

```
https://twitter.com/
```

+ `phpMyAdminのsite_infos_tableに直接instagram_linkカラムのvalue`に直接入力<br>

```
https://www.instagram.com/
```

+ `phpMyAdminのsite_infos_tableに直接copyright_textカラムのvalue`に直接入力<br>

```
©︎ Copyright 2021 by easy Shop, All Rights Reserved
```

+ `実行する`<br>

+ `php artisan make:controller Admin/SiteInfoController`を実行<br>

+ `routes/api.php`を編集<br>

```
<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SiteInfoController;
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
// Site Info Route
Route::get('/allsiteinfo', [SiteInfoController::class, 'allSiteInfo']);
```

+ `app/Http/Controllers/Admin/SiteInfoController.php`を編集<br>

```
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteInfo;
use Illuminate\Http\Request;

class SiteInfoController extends Controller
{
    public function allSiteInfo()
    {
        $result = SiteInfo::all();

        return $result;
    }
}
```

+ `POSTMAN(GET) http://localhost/api/allsiteinfo`<br>

+ `Send結果`<br>

```
[
    {
        "id": 1,
        "about": "<h4>About Us Page</h4>\r\n\r\n<p>Hi! I&#39;m Kazi Ariyan. I&#39;m a web developer with a serious love for teaching I am a founder of easy Learning and a passionate Web Developer, Programmer &amp; Instructor.<br />\r\n<br />\r\nI am working online for the last 9 years and have created several successful websites running on the internet.<br />\r\n<br />\r\nI try to create a project-based course that helps you to learn professionally and make you fell as a complete developer. easy learning exists to help you succeed in life. Each course has been hand-tailored to teach a specific skill.<br />\r\n<br />\r\nI hope you agree! Whether you&rsquo;re trying to learn a new skill from scratch or want to refresh your memory on something you&rsquo;ve learned in the past, you&rsquo;ve come to the right place. Education makes the world a better place. Make your world better with new skills.</p>",
        "refund": "<h4>Refund Page</h4>\r\n\r\n<p>The Swiss psychiatrist, Carl Jung, described a persona as a &ldquo;mask or facade presented to satisfy the demands of the situation or the environment and not representing the inner personality of the individual.&rdquo; Jung points out that such behaviors are often a mask to get through life, whereas the inner identity may be quite different.</p>\r\n\r\n<p>In the same vein, the persona of a successful digital leader is not inherent and therefore, the persona is unique to the individual&rsquo;s environment or circumstance. In other words, different settings or situations require a unique persona that best fits into their leadership objectives.</p>\r\n\r\n<p><strong>Cultivating a Persona of Authenticity</strong><br />\r\n<br />\r\nWhile I have encountered many born leaders in the military and during my time as CEO at Trianz, there is one persona that stands out. It is a persona that I have come across in my research on &ldquo;Digital Champions&rdquo; &mdash; the 7% of companies that manage to successfully transform &mdash; and my reason for writing this book. That persona is what I have dubbed the &ldquo;Methodical Innovator.&rdquo;</p>\r\n\r\n<p>The Methodical Innovator is a persona that embraces a game of calm and composed intelligence and smarts. It is not one of grandiose vision, bravado, soul-stirring speeches, or frittering away capital without proper prioritization or forethought.</p>",
        "parchase_guide": "<p>Purchase Page</p>\r\n\r\n<p>Prior to today&#39;s trading, shares of the largest U.S. drugstore chain had gained 8.28% over the past month. This has outpaced the Retail-Wholesale sector&#39;s loss of 4.49% and the S&amp;P 500&#39;s gain of 0.87% in that time.</p>\r\n\r\n<p>Wall Street will be looking for positivity from Walgreens Boots Alliance as it approaches its next earnings report date. This is expected to be January 6, 2022. On that day, Walgreens Boots Alliance is projected to report earnings of $1.22 per share, which would represent no growth from the prior-year quarter. Our most recent consensus estimate is calling for quarterly revenue of $32.93 billion, down 9.31% from the year-ago period.</p>\r\n\r\n<p>Looking at the full year, our Zacks Consensus Estimates suggest analysts are expecting earnings of $4.91 per share and revenue of $131.5 billion. These totals would mark changes of -7.53% and -4.28%, respectively, from last year.</p>\r\n\r\n<p>It is also important to note the recent changes to analyst estimates for Walgreens Boots Alliance. Recent revisions tend to reflect the latest near-term business trends. As a result, we can interpret positive estimate revisions as a good sign for the company&#39;s business outlook.</p>\r\n\r\n<p>Research indicates that these estimate revisions are directly correlated with near-term share price momentum. We developed the Zacks Rank to capitalize on this phenomenon. Our system takes these estimate changes into account and delivers a clear, actionable rating model.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The Zacks Rank system ranges from #1 (Strong Buy) to #5 (Strong Sell). It has a remarkable, outside-audited track record of success, with #1 stocks delivering an average annual return of +25% since 1988. Within the past 30 days, our consensus EPS projection has moved 0.12% lower. Walgreens Boots Alliance is holding a Zacks Rank of #4 (Sell) right now.</p>\r\n\r\n<p>Looking at its valuation, Walgreens Boots Alliance is holding a Forward P/E ratio of 10.28. For comparison, its industry has an average Forward P/E of 10.28, which means Walgreens Boots Alliance is trading at a no noticeable deviation to the group.</p>\r\n\r\n<p>We can also see that WBA currently has a PEG ratio of 2.32. This metric is used similarly to the famous P/E ratio, but the PEG ratio also takes into account the stock&#39;s expected earnings growth rate. The Retail - Pharmacies and Drug Stores was holding an average PEG ratio of 2.1 at yesterday&#39;s closing price.</p>\r\n\r\n<p>The Retail - Pharmacies and Drug Stores industry is part of the Retail-Wholesale sector. This group has a Zacks Industry Rank of 115, putting it in the top 46% of all 250+ industries.</p>\r\n\r\n<p>The Zacks Industry Rank includes is listed in order from best to worst in terms of the average Zacks Rank of the individual companies within each of these sectors. Our research shows that the top 50% rated industries outperform the bottom half by a factor of 2 to 1.</p>",
        "privacy": "<h4>Privacy Page</h4>\r\n\r\n<p>Indie record labels rank amongst the globe&rsquo;s top record labels and have their own significant benefits when compared with major labels. Of course, there are pros and cons of signing with an independent label, and here, Reed Louis Jeune &ndash; founder of the&nbsp;<a href=\"https://trillcorporation.com/\" rel=\"nofollow noopener\">Trill Corporation</a>&nbsp;independent label &ndash; outlines the possibilities.</p>\r\n\r\n<p>&ldquo;Over the past few years, a lot of artists have begun to change their aspirations and are now becoming increasingly interested in signing with independent labels&rdquo;, he says. &ldquo;It represents a goal that is more realistic for many, but that&rsquo;s not all &ndash; signing up to a smaller label can actually come with a host of advantages.&rdquo;</p>\r\n\r\n<p><strong>What Are the Pros And Cons Of Signing With An Indie Label?</strong></p>\r\n\r\n<p>Reed Louis Jeune is open about the fact that there are downsides as well as positives to signing up with an independent label like his own, but he believes that the advantages outweigh the disadvantages.</p>\r\n\r\n<p>Reed Louis Jeune is open about the fact that there are downsides as well as positives to signing up with an independent label like his own, but he believes that the advantages outweigh the disadvantages.</p>",
        "address": "<p>1635 Franklin Street Montgomery, Near Sherwood Mall. AL 36104<br />\r\nEmail: Support@easylearningbd.com</p>",
        "android_app_link": "http://localhost/android",
        "ios_app_link": "http://localhost/ios",
        "facebook_link": "https://www.facebook.com/",
        "twitter_link": "https://twitter.com/",
        "instagram_link": "https://www.instagram.com/",
        "copyright_text": "©︎ Copyright 2021 by easy Shop, All Rights Reserved",
        "created_at": null,
        "updated_at": null
    }
]
```

## 307 Consume Site Info in Client Side Part1

+ `React Project`を編集<br>
