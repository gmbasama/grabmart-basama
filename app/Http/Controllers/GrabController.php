<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Grab;

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

    public function updateMenuRecord(Request $request)
    {
        $token = $this->oAuth()['access_token'];
        $merchantID = env('GRAB_MERCHANT_ID', '');

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ])
            ->put('https://partner-api.grab.com/grabmart-sandbox/partner/v1/menu', [
                'merchantID' => $merchantID,
                'field' => 'ITEM',
                'id' => $request->id,
                'price' => $request->price
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

    public function submitOrder(Request $request)
    {
        $token = $this->oAuth()['access_token'];
        $merchantID = env('GRAB_MERCHANT_ID', '');

        $response = [
            'orderID' => '',
            'shortOrderNumber' => 'ITEM',
            'merchantID' => $merchantID,
            'paymentType' => 'CASHLESS',
            'orderTime' => '',
            'submitTime' => '2019-05-24T05:16:00Z',
            'completeTime' => '2019-05-24T05:26:00Z',
            'scheduledTime' => '2019-05-24T08:26:00Z',
            'orderState' => 'DELIVERED',
            'currency' => [
                'code' => 'IDR',
                'symbol' => 'Rp',
                'exponent' => 0
            ],
            'featureFlags' => [
                'orderAcceptedType' => 'AUTO',
                'orderType' => 'DeliveredByGrab',
                'isMexEditOrder' => false
            ],
            'dbo.items' => [
                'id' => 'item-1',
                'grabItemID' => 'IDGFSTI000004qy1490868132306763533',
                'quantity' => 1,
                'price' => 2550,
                'tax' => 144,
                'specifications' => 'less sugar and chili',
                'modifiers' => [],
                'campaigns' => [],
                'promos' => [],
                'price' => [
                    'subtotal' => 2550,
                    'tax' => 117,
                    'merchantChargeFee' => 0,
                    'grabFundPromo' => 300,
                    'merchantFundPromo' => 475,
                    'basketPromo' => 775,
                    'deliveryFee' => 400,
                    'eaterPayment' => 2175
                ],
                'receiver' => [
                    'name' => 'Prashanth',
                    'phones' => 60122234704,
                    'address' => [
                        'unitNumber' => '3-45',
                        'deliveryInstruction' => 'turn left in 2 floor.',
                        'poiSource' => 'GRAB',
                        'poiID' => 'string',
                        'address' => '123, Jalan Eater street, Batu Caves, 12345, Selangor',
                        'postcode' => 123456,
                        'coordinates' => [
                            'latitude' => 1.234567,
                            'longitude' => 3.456789
                        ]
                    ]
                ],
                'orderReadyEstimation' => [
                    'allowChange' => true,
                    'estimatedOrderReadyTime' => '2019-05-24T05:16:00Z',
                    'maxOrderReadyTime' => '2019-05-24T05:16:00Z',
                    'newOrderReadyTime' => '2019-05-24T05:26:00Z'
                ],
                'membershipID' => ''
            ]
        ];

        if (!$request->hasHeader('Authorization')) {
            return $response->unauthorized();
        }

        return $response;
    }

    public function pushOrder(Request $request)
    {
        $merchantID = env('GRAB_MERCHANT_ID', '');

        $response = [
            'merchantID' => $merchantID,
            'orderID' => '',
            'state' => 'CANCELLED',
            'driverETA' => null,
            'code' => 'CANCELLED',
            'message' => 'We are too busy right now.'
        ];

        if (!$request->hasHeader('Authorization')) {
            return $response->unauthorized();
        }

        return $response;
    }

    public function menuSyncWebhook()
    {
        $merchantID = env('GRAB_MERCHANT_ID', '');
        $partnerMerchantID = env('GRAB_PARTNER_ID', '');

        $response = [
            'requestID' => '',
            'merchantID' => $merchantID,
            'partnerMerchantID' => $partnerMerchantID,
            'jobID' => '',
            'updatedAt' => '',
            'status' => null,
            'errors' => [],
        ];

        if (!$request->hasHeader('Authorization')) {
            return $response->unauthorized();
        }

        return $response;
    }
}
