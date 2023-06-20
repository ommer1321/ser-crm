<?php

namespace App\Traits;

use App\Http\Requests\GrupFormRequest;
use App\Http\Requests\TaskFormRequest;
use App\Models\Grup\Grup;
use App\Models\Grup\GrupNews;
use App\Models\Grup\GrupNewsTaggedUser;
use App\Models\Grup\Member;
use App\Models\Teacher\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait GrupNewsTrait
{

    use HelperTrait;



    function listGrupNews($grup_id)
    {

        $grup = Grup::where('grup_id', $grup_id)->first();

        $grupNews = GrupNews::where('grup_id', $grup->id)
            ->with('post_tagged_user')
            ->with('posted_user')
            ->with('news_comments')
            ->orderBy('updated_at', 'desc')
            ->get();

        foreach ($grupNews as $new) {
            $new->images_paths = json_decode($new->images_paths);
            $new->tagged_users = json_decode($new->tagged_users);
        }
        // ilişkisel veritabanı kurulacak

        if ($grupNews) {
            return $grupNews;
        } else {

            return [];
        }
    }
    function storeNews($request, $grup_id)
    {

        $validatedData = $request->validated();

        $user = User::where('user_name', $request->user_name)->first();
        $grup = Grup::where('grup_id', $grup_id)->first();

        $news = new  GrupNews();

        if ($grup && $user &&  $news) {


            $news->posted_user_id = $user->id;
            $news->title = $request->title;
            $news->note = $request->note;
            $news->images_paths =  $this->storePhotos($request, $grup);
            $news->grup_id = $grup->id;
            // $news->tagged_users = $request->tagged_users ? json_encode($request->tagged_users) : null; //Undefined array key "tagged_users"
            // $news->tages = $request->tages ? json_encode($request->tages) : null;


            if ($news->save()) {

                // News id'yi alır 

                if ($request->tagged_users) {

                    $news_id = $news->getKey();

                    $this->storeGrupNewsTaggedUser($request->tagged_users, $grup, $news_id);
                }

                return true;
            }

            return false;
        } else {

            return false;
        }
    }


    function deleteNews($request)
    {
        $grupNews = GrupNews::where('news_uuid', $request->news)->first();

        if ($grupNews) {

            if ($grupNews->delete()) {

                
                if ($grupNews->images_paths &&  (count(json_decode($grupNews->images_paths)) > 0)) {
                    $deleted = 0;
                    $deleted = 0;

                    $grupNews->images_paths = json_decode($grupNews->images_paths);


                    foreach ($grupNews->images_paths as  $images_path) {
                        if (File::exists($images_path)) {

                            if (File::delete($images_path)) {
                            }
                        }
                    }
                }

                return true;
            } else {

                return false;
            }
        }
    }


    function isGrupTeacherOrNewsOwner($request)
    {
         $grupNews = GrupNews::where('news_uuid', $request->news)->with('grup_info')->first();
       
        $res = false;

        if (auth()->user()->id  == $request->posted_user_id ||   auth()->user()->id  == $grupNews->grup_info->teacher_id) {
         
            return $res = true;
        }
        
        return $res;
    }


    function storeGrupNewsTaggedUser($tagged_users, $grup, $news_id)
    {


        foreach ($tagged_users as $tagged_user) {

            $GrupNewsTaggedUser = new GrupNewsTaggedUser();
            $user = User::where('user_id', $tagged_user)->first();

            if ($user) {
                $GrupNewsTaggedUser->user_id = $user->id;
                $GrupNewsTaggedUser->grup_id = $grup->id;
                $GrupNewsTaggedUser->news_id = $news_id;

                $GrupNewsTaggedUser->save();


                // log eklenecek if ile 
            }
        }
    }


    public function storePhotos($request, $grup)
    {
        $images_paths = [];
        $trash = 0;


        if ($request->hasFile('photos')) {

            $files =  $request->photos;

            foreach ($files as $key => $file) {

                $ext = $file->getClientOriginalExtension();
                $fileName = 'news' . auth()->user()->user_name . $key . time() . '.' . $ext;
                $filePath = 'uploads/grup/news/' . $fileName;

                if ($file->move('uploads/grup/news/', $fileName)) {
                    $images_paths[] = $filePath;
                } else {

                    $trash++;
                }
            }


            return    $images_paths = json_encode($images_paths);
        } else {

            //there is no image it will returned null  
            return  $images_paths = null;
        }
    }
}
