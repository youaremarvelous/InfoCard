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
    
    /**
     * The height of the card.
     *
     * @var string
     */
    public $height = 'auto';

    /**
     * Get customer data and configuration
     *
     * @return $this
     */
    public function getCustomerLogo()
    {
        $setting = Setting::first();
        
        return $this->withMeta([
            'customerLogo' => $setting->customer_logo 
                ? url('/') . '/storage/' . $setting->customer_logo 
                : null,
            'serverVersion' => $setting->server_version ?? 'N/A',
            'companyName' => $setting->company_name ?? 'Your Company',
            'administrator' => $setting->administrator ?? 'Admin',
            'instanceGuid' => $setting->instance_guid ?? null,
            'userName' => auth()->user()->name ?? 'User',
            'userEmail' => auth()->user()->email ?? '',
            
            // Translations with time-based greeting
            'welcomeMessage' => $this->getGreeting(),
            'serverVersionCaption' => __('Server Version'),
            'administratorCaption' => __('Administrator'),
            'companyCaption' => __('Company'),
            'onlineHelpCaption' => __('Online Help'),
            'imprintCaption' => __('Imprint'),
            'privacyCaption' => __('Privacy'),
            'documentationCaption' => __('Documentation'),
            
            // URLs
            'onlineHelpURL' => $setting->help_url ?? null,
            'imprintURL' => $setting->imprint_url ?? null,
            'privacyURL' => $setting->privacy_url ?? null,
        ]);
    }

    /**
     * Get time-based greeting
     *
     * @return string
     */
    protected function getGreeting()
    {
        $hour = now()->hour;
        
        if ($hour >= 5 && $hour < 12) {
            return __('Good morning');
        } elseif ($hour >= 12 && $hour < 18) {
            return __('Hello');
        } else {
            return __('Good evening');
        }
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