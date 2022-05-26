<?php

namespace App\Http\Controllers;

use App\Enums\FileTypeEnum;
use App\Enums\PostStatusEnum;
use App\Models\Company;
use App\Models\File;
use App\Models\Language;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class TestController extends Controller
{
    private object $model;
    private string $table;

    public function __construct(){
        $this->model = User::query();
        $this->table = (new User())->getTable();
        View::share('title', ucwords($this->table)); 
        View::share('table', $this->table);
    }

    public function test(){
        // return DB::getSchemaBuilder()->getColumnListing('companies');
        $companyName = 'Đa cấp';
        $language = 'PHP';
        $city = 'HN';
        $link = 'ABC';

        $company = Company::firstOrCreate([
            'name' => $companyName,
        ],[
            'city' => $city,
            'country' => 'Vietnam',
        ]);

        $post = Post::create([
            'job_title' => ucfirst($language) . '-' . $city,
            'company_id' => $company->id,
            'city' => $city,
            'status' => PostStatusEnum::ADMIN_APPROVED,
            
        ]);

        $languages = explode(',', $language);
        foreach ($languages as $language){
            Language::firstOrCreate([
                'name' => trim($language),
            ]);
        }

        File::create([
            'post_id' => $post->id,
            'link' => $link,
            'type' => FileTypeEnum::JD,

        ]);
    }

  
}
