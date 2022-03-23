<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Settings;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\BaseController;

class SettingsController extends BaseController
{
    use UploadAble;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Settings::all()->toArray();

        return $this->responseJson($data);
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        if ($request->has('site_logo') && ($request->file('site_logo') instanceof UploadedFile)) {

            if (config('settings.site_logo') != null) {
                $this->deleteOne(config('settings.site_logo'));
            }
            $logo = $this->uploadOne($request->file('site_logo'), 'img');

            Settings::set('site_logo', $logo);

        } elseif ($request->has('site_favicon') && ($request->file('site_favicon') instanceof UploadedFile)) {

            if (config('settings.site_favicon') != null) {
                $this->deleteOne(config('settings.site_favicon'));
            }
            $favicon = $this->uploadOne($request->file('site_favicon'), 'img');

            Settings::set('site_favicon', $favicon);

        } else {

            $keys = $request->except('_token');

            foreach ($keys as $key => $value)
            {
                Settings::set($key, $value);
            }

        }

        $data = Settings::all()->toArray();

        $this->responseJson($data);
    }
}
