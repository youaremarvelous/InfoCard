<?php

namespace Yam\InfoCard;

use Laravel\Nova\Card;
use App\Models\Setting;

class InfoCard extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = 'full';
    public $height = 'fixed';

    public function getCustomerLogo()
    {
        $setting = Setting::first();
        return $this->withMeta(['customerLogo' => url('/').'/storage/'.$setting->customer_logo,
                                'serverVersion' => $setting->server_version,
                                'companyName' => $setting->company_name,
                                'administrator' => $setting->administrator,
                                'instance_guid' => $setting->instance_guid,
                                'userName' => auth()->user()->name,
                                'welcomeMessage' => __('Welcome back').' ',
                                'serverVersionCaption' => __('Server Version:'),
                                'administratorCaption' => __('Administrator:'),
                                'onlineHelpCaption' => __('Online Help'),
                                'imprintCaption' => __('Imprint'),
                                'privacyCaption' => __('Privacy'),
                                'onlineHelpURL' => $setting->help_url,
                                'imprintURL' => $setting->imprint_url,
                                'privacyURL' => $setting->privacy_url,
                            ]);
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'info-card';
    }
}
