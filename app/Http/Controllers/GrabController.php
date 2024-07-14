<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GrabController extends Controller
{
    public function oAuth()
    {
        $clientID = env('GRAB_CLIENT_ID', '');
        $clientSecret = env('GRAB_CLIENT_SECRET', '');
        
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])
            ->post('https://api.grab.com/grabid/v1/oauth2/token', [
                'client_id' => $clientID,
                'client_secret' => $clientSecret,
                'grant_type' => 'client_credentials',
                'scope' => 'mart.partner_api'
            ]);

            if($response->status() !== 200) {
                return $response->throw();
            }
            return $response->json();

        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }

    public function updateMenuNotif()
    {
        $token = $this->oAuth()['access_token'];
        $merchantID = env('GRAB_MERCHANT_ID', '');

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ])
            ->post('https://partner-api.grab.com/grabmart-sandbox/partner/v1/merchant/menu/notification', [
                'merchantID' => $merchantID
            ]);

            if(!$response->successful()) {
                return $response->throw();
            }
            return $response->json();

        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }

    public function getMenu(Request $request)
    {
        $merchantID = env('GRAB_MERCHANT_ID', '');
        $partnerMerchantID = env('GRAB_PARTNER_ID', '');

        $response = [
            'merchantID' => '',
            'partnerMerchantID' => '',
            'currency' => [
                'code' => '',
                'symbol' => '',
                'exponent' => 0
            ],
            'sellingTimes' => [
                [
                    'startTime' => '2022-03-01 10:00:00',
                    'endTime' => '2025-01-21 22:00:00',
                    'id' => 'partner-sellingTimeID-1',
                    'name' => 'Best deal',
                    'serviceHours' => [
                        'mon' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '11:30',
                                    'endTime' => '14:00'
                                    ]
                            ]
                        ],
                        'tue' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '11:30',
                                    'endTime' => '14:00'
                                    ]
                            ]
                        ],
                        'wed' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '11:30',
                                    'endTime' => '14:00'
                                    ]
                            ]
                        ],
                        'thu' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '11:30',
                                    'endTime' => '14:00'
                                    ]
                            ]
                        ],
                        'fri' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '11:30',
                                    'endTime' => '14:00'
                                    ]
                            ]
                        ],
                        'sat' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '11:30',
                                    'endTime' => '14:00'
                                    ]
                            ]
                        ],
                        'sun'=> [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '11:30',
                                    'endTime' => '14:00'
                                    ]
                            ]
                        ]
                    ]
                ]
            ],
            'categories' => [
                [
                    'id' => 'category_id',
                    'name' => 'category_name',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'par',
                    'subCategories' => [
                        [
                            'id' => 'subCategory_id',
                            'name' => 'subCategory_name',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'partner-sellingTimeID-1',
                            'items' => [
                                [
                                    'id' => 'item_id',
                                    'name' => 'Fresh salmon',
                                    'nameTranslation' => [],
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'Fresh salmon imported from Japan.',
                                    'descriptionTranslation' => [],
                                    'price' => 2000,
                                    'photos' => [],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 15,
                                    'maxCount' => 5,
                                    'weight' => [],
                                    'soldByWeight' => true,
                                    'sellingUom' => [],
                                    'sellingTimeID' => 'partner-sellingTimeID-1',
                                    'advancedPricing' => [],
                                    'purchasability' => [],
                                    'modifierGroups' => []
                                ]
                            ]
                        ]
                    ]
                ]
            ]                  
        ];

        return $response;
    }

    public function updateMenuRecord(Request $request)
    {
        $token = $this->oAuth()['access_token'];
        $merchantID = env('GRAB_MERCHANT_ID', '');

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ])
            ->post('https://partner-api.grab.com/grabmart-sandbox/partner/v1/menu', [
                'merchantID' => $merchantID,
                'field' => 'ITEM',
                'id' => 'ITEMID-1',
                'price' => 12000,
                'availableStatus' => 'AVAILABLE',
                'maxStock' => 15,
                'advancedPricings' => [
                    [
                        'key' => 'Delivery_OnDemand_GrabApp',
                        'price' => 2000
                    ]
                ],
                'purchasabilities' => [
                    [
                        'key' => 'Delivery_OnDemand_GrabApp',
                        'purchasable' => true
                    ]
                ]
            ]);

            if(!$response->successful()) {
                return $response->throw();
            }
            return $response->json();

        } catch (Throwable $e) {
            report($e);
            return false;
        }   
    }
}
