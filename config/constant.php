<?php

// return [
//     'books' => [
//         'status' => [
//             1 => 'Okundu',
//             2 => 'Okunmadı',
//             3 => 'Okunacak',
//             4 => 'Yarım Kalan',
//             5 => 'Okuyorum'
//         ],
//         'list_types' => [
//             1 => 'Kitaplarım',
//             2 => 'Alınacaklar',
//             3 => 'Annem'
//         ],
//         'in_libray' => [
//             1 => 'Evet',
//             0 => 'Hayır'
//         ]
//     ]
// ];

return [
    'books' => [
        'status' => [
            ['id' => 1, 'name' => 'Okundu'],
            ['id' => 2, 'name' => 'Okunmadı'],
            ['id' => 3, 'name' => 'Okunacak'],
            ['id' => 4, 'name' => 'Yarım Kalan'],
            ['id' => 5, 'name' => 'Okuyorum'],
        ],
        'list_types' => [
            ['id' => 1, 'name' => 'Kitaplarım'],
            ['id' => 2, 'name' => 'Alınacaklar'],
            ['id' => 3, 'name' => 'Annem']
        ],
        'in_libray' => [
            ['id' => 1, 'name' => 'Evet'],
            ['id' => 0, 'name' => 'Hayır'],
        ]
    ]
];
