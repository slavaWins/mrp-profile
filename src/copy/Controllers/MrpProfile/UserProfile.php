<?php

namespace App\Http\Controllers\MrpProfile;


use App\Http\Controllers\Controller;
use App\Library\MrpProfile\MrpProfileLibary;
use App\Library\MrpProfile\PageBuilder;
use App\Models\Cat;
use App\Models\ResponseApi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MrProperter\Library\FormBuilderStructure;
use Tarifiner\Library\TarifinerLib;


class UserMrpProfile extends Controller
{


    public function profile_notify_if(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $result = $user->ValidateAndFilibleByRequest($request->toArray(), "profile_notify_if");

        if ($result === true) {
            return ResponseApi::Successful();
        }

        return ResponseApi::Error($result);
    }


    public function profile_notify_type(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $result = $user->ValidateAndFilibleByRequest($request->toArray(), "profile_notify_type");

        if ($result === true) {
            return ResponseApi::Successful();
        }

        return ResponseApi::Error($result);
    }

    public function profile_industry(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $result = $user->ValidateAndFilibleByRequest($request->toArray(), "profile.industry");

        if ($result === true) {
            return ResponseApi::Successful();
        }

        return ResponseApi::Error($result);
    }


    public function update_profile(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $result = $user->ValidateAndFilibleByRequest($request->toArray(), "profile");

        if ($result === true) {
            return ResponseApi::Successful();
        }

        return ResponseApi::Error($result);
    }


    public function index()
    {
        $item = Auth::user();

        $page = PageBuilder::New($item);
        $page->name = "Настройки профиля";
        $page->icon = "/img/prof.png";

        $page->AddRow("Настройки профиля");

        $page->AddTab("Информация о профиле")->SetTag("profile")->SetTitle("Общая инфа")->SetAjax(true)->SetRoute(route("profile.update_profile"));

        $page->AddTab("Организация")->SetTag("profile.industry")->SetTitle("Общая инфа")->SetAjax(true)->SetRoute(route("profile.industry"));

        $page->AddTab("Интеграции")->SetTitle("У вас нет доступа к интеграциям");
       // $page->AddTab("Виды")->view = "mrp-profile.tabs.xz";


        $page->AddRow("Уведомления");
        $page->AddTab("Уведомлять если")->SetTag("profile_notify_if")
            ->SetTitle("Уведомлять меня если:")->SetAjax(true)->SetRoute(route("profile.profile_notify_if"));

        $page->AddTab("Способ уведомления")->SetTag("profile_notify_type")
            ->SetTitle("Настройки способ отправки уведомления")
            ->SetAjax(true)->SetRoute(route("profile.profile_notify_type"));

        /*
                $page->AddRow("Team profile");
                $page->AddTab("Team");
                $page->AddTab("Plan");
                $page->AddTab("Members");

                $page->AddRow("Security");
                $page->AddTab("Phone");
                $page->AddTab("Password");
                $page->AddTab("Log");
        */
        return view("mrp-profile.index", compact(['item', 'page']));
    }
}
