<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetMenuController extends Controller
{
    public function index()
    {
        $data = Grab::get();

        if(!$data) {
            return false;
        }
        return $data;
    }

    public function getMenu(Request $request)
    {
        $merchantID = env('GRAB_MERCHANT_ID', '');
        $partnerMerchantID = env('GRAB_PARTNER_ID', '');

        $response = [
            'merchantID' => $merchantID,
            'partnerMerchantID' => $partnerMerchantID,
            'currency' => [
                'code' => 'IDR',
                'symbol' => 'Rp',
                'exponent' => 0
            ],
            'sellingTimes' => [
                [
                    'startTime' => '2022-03-01 08:00:00',
                    'endTime' => '2025-01-21 16:00:00',
                    'id' => 'SELL01',
                    'name' => 'Normal',
                    'serviceHours' => [
                        'mon' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '08:00',
                                    'endTime' => '16:00'
                                    ]
                            ]
                        ],
                        'tue' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '08:00',
                                    'endTime' => '16:00'
                                    ]
                            ]
                        ],
                        'wed' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '08:00',
                                    'endTime' => '16:00'
                                    ]
                            ]
                        ],
                        'thu' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '08:00',
                                    'endTime' => '16:00'
                                    ]
                            ]
                        ],
                        'fri' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '08:00',
                                    'endTime' => '16:00'
                                    ]
                            ]
                        ],
                        'sat' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '08:00',
                                    'endTime' => '16:00'
                                    ]
                            ]
                        ],
                        'sun'=> [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '08:00',
                                    'endTime' => '16:00'
                                    ]
                            ]
                        ]
                    ]
                ]
            ],
            'categories' => [
                [
                    'id' => 'IDITEDP20220629083635011784',
                    'name' => 'Staples & Cooking',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'SELL01',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701090459016004',
                            'name' => 'Dried Food',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'items' => [
                                [
                                    'id' => '8995899216484',
                                    'name' => 'BON CABE SAMBAL TABUR NORI  LEVEL 35G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'BON CABE SAMBAL TABUR NORI  LEVEL 35G',
                                    'price' => 12400,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => '8995899250358',
                                    'name' => 'KOBE BONCABE LEVEL 30 EXTREME',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'KOBE BONCABE LEVEL 30 EXTREME',
                                    'price' => 13700,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => 'IT09966',
                                    'name' => 'PATMA GOLD ABON SAPI 230G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'PATMA GOLD ABON SAPI 230G',
                                    'price' => 81700,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => '8992719113176',
                                    'name' => 'GLORIA ABON SAPI KOTAK 100G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'GLORIA ABON SAPI KOTAK 100G',
                                    'price' => 50600,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => '8992719345652',
                                    'name' => 'GLORIA ABON ORIGINAL 250G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'GLORIA ABON ORIGINAL 250G',
                                    'price' => 119300,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => '8995899215159',
                                    'name' => 'BON CABE SAMBAL TABUR LEVEL 50 30G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'BON CABE SAMBAL TABUR LEVEL 50 30G',
                                    'price' => 15600,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => '8992719113367',
                                    'name' => 'GLORIA ABON SAPI PEDAS',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'GLORIA ABON SAPI PEDAS',
                                    'price' => 50500,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => '8992719113251',
                                    'name' => 'GLORIA ABON SAPI BAWANG 100G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'GLORIA ABON SAPI BAWANG 100G',
                                    'price' => 48400,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => '8992719523289',
                                    'name' => 'GLORIA ABON AYAM 100G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'GLORIA ABON AYAM 100G',
                                    'price' => 38300,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => '5285001155774',
                                    'name' => 'DELTAFOODS TONGKOL 250G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'DELTAFOODS TONGKOL 250G',
                                    'price' => 26500,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => '5285001155767',
                                    'name' => 'DELTAFOODS TONGKOL 500G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'DELTAFOODS TONGKOL 500G',
                                    'price' => 50600,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => 'IT09981',
                                    'name' => 'KERTA SARI SRUNDENG KELAPA 150G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'KERTA SARI SRUNDENG KELAPA 150G',
                                    'price' => 31000,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => 'IT09982',
                                    'name' => 'KERTA SARI ABON AYAM 150G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'KERTA SARI ABON AYAM 150G',
                                    'price' => 71000,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => 'IT09983',
                                    'name' => 'KERTA SARI ABON SAPI MANIS/PEDAS 150G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'KERTA SARI ABON SAPI MANIS/PEDAS 150G',
                                    'price' => 84000,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => 'IT09984',
                                    'name' => 'KERTA SARI BALADO TERI KENTANG 150G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'KERTA SARI BALADO TERI KENTANG 150G',
                                    'price' => 66000,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => 'IT09985',
                                    'name' => 'KERTA SARI BALADO UDANG KENTANG 150G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'KERTA SARI BALADO UDANG KENTANG 150G',
                                    'price' => 66000,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => 'IT09986',
                                    'name' => 'KERTA SARI BALADO UDANG 150G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'KERTA SARI BALADO UDANG 150G',
                                    'price' => 82000,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => 'IT09987',
                                    'name' => 'KERTA SARI KERING KENTANG 100G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'KERTA SARI KERING KENTANG 100G',
                                    'price' => 47500,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ],
                                [
                                    'id' => 'IT09988',
                                    'name' => 'KERTA SARI KERING TEMPE KENTANG 150G',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'KERTA SARI KERING TEMPE KENTANG 150G',
                                    'price' => 42000,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []
                                ]
                            ],
                        ],
                        [
                            'id' => 'IDITEDP20220701091254019744',
                            'name' => 'Rice.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'items' => [
                                [
                                    'id' => '8997209480561',
                                    'name' => 'BERAS LAHAP LELE 5KG',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'BERAS LAHAP LELE 5KG',
                                    'price' => 81400,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []  
                                ],
                                [
                                    'id' => '8997209482930',
                                    'name' => 'LAHAP WANITA PREMIUM 5KG',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'LAHAP WANITA PREMIUM 5KG',
                                    'price' => 79200,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []  
                                ],
                                [
                                    'id' => '8997203881319',
                                    'name' => 'LO BERAS PUTIH ORGANIK 1KG',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'LO BERAS PUTIH ORGANIK 1KG',
                                    'price' => 38500,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []  
                                ],
                                [
                                    'id' => '8997203881357',
                                    'name' => 'LO BERAS MERAH ORGANIK 2KG',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'LO BERAS MERAH ORGANIK 2KG',
                                    'price' => 61200,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []  
                                ],
                                [
                                    'id' => '8997203881364',
                                    'name' => 'LO BERAS COKLAT ORGANIK 1KG',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'LO BERAS COKLAT ORGANIK 1KG',
                                    'price' => 29500,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1 //minimal jumlah dalam 1x pembelian
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []  
                                ],
                                [
                                    'id' => '8997203881388',
                                    'name' => 'LO BERAS HITAM ORGANIK 1KG',
                                    'availableStatus' => 'AVAILABLE',
                                    'description' => 'LO BERAS HITAM ORGANIK 1KG',
                                    'price' => 38500,
                                    'photos' => [
                                        ""
                                    ],
                                    'specialType' => null,
                                    'taxable' => false,
                                    'barcode' => 'GTIN',
                                    'maxStock' => 100,
                                    'maxCount' => 100,
                                    'weight' => [
                                        'unit' => 'per pack',
                                        'value' => 1,
                                        'count' => 1
                                    ],
                                    'soldByWeight' => false,
                                    'sellingTimeID' => 'SELL01',
                                    'modifierGroups' => []  
                                ]
                            ]
                        ]
                    ]
                ],
            ]                  
        ];

        return $response;
    }
}
