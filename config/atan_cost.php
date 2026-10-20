<?php
return [
    'token' => env('ATAN_COST_TOKEN'), // secret >=16 karakter (jangan publikasi)
    // mL/detik hasil pengujian tiap pompa. NULL = belum dikalibrasi.
    'flow_ml_s' => [
        'pump_water' => null,
        'pump_1' => null,
        'pump_2' => null,
        'pump_3' => null,
        'pump_4' => null,
        'mixer' => null,
    ],
    // Harga dapat diubah menurut pembelian sebenarnya.
    'price_rp_l' => ['water' => null, 'fertilizer' => null],
];
