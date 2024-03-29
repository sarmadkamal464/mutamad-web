<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->timestamps();
        });
        $countries = [
            0 => [
                'name' => 'Afghanistan',
                'code' => 'AF',
            ],
            1 => [
                'name' => 'Åland Islands',
                'code' => 'AX',
            ],
            2 => [
                'name' => 'Albania',
                'code' => 'AL',
            ],
            3 => [
                'name' => 'Algeria',
                'code' => 'DZ',
            ],
            4 => [
                'name' => 'American Samoa',
                'code' => 'AS',
            ],
            5 => [
                'name' => 'AndorrA',
                'code' => 'AD',
            ],
            6 => [
                'name' => 'Angola',
                'code' => 'AO',
            ],
            7 => [
                'name' => 'Anguilla',
                'code' => 'AI',
            ],
            8 => [
                'name' => 'Antarctica',
                'code' => 'AQ',
            ],
            9 => [
                'name' => 'Antigua and Barbuda',
                'code' => 'AG',
            ],
            10 => [
                'name' => 'Argentina',
                'code' => 'AR',
            ],
            11 => [
                'name' => 'Armenia',
                'code' => 'AM',
            ],
            12 => [
                'name' => 'Aruba',
                'code' => 'AW',
            ],
            13 => [
                'name' => 'Australia',
                'code' => 'AU',
            ],
            14 => [
                'name' => 'Austria',
                'code' => 'AT',
            ],
            15 => [
                'name' => 'Azerbaijan',
                'code' => 'AZ',
            ],
            16 => [
                'name' => 'Bahamas',
                'code' => 'BS',
            ],
            17 => [
                'name' => 'Bahrain',
                'code' => 'BH',
            ],
            18 => [
                'name' => 'Bangladesh',
                'code' => 'BD',
            ],
            19 => [
                'name' => 'Barbados',
                'code' => 'BB',
            ],
            20 => [
                'name' => 'Belarus',
                'code' => 'BY',
            ],
            21 => [
                'name' => 'Belgium',
                'code' => 'BE',
            ],
            22 => [
                'name' => 'Belize',
                'code' => 'BZ',
            ],
            23 => [
                'name' => 'Benin',
                'code' => 'BJ',
            ],
            24 => [
                'name' => 'Bermuda',
                'code' => 'BM',
            ],
            25 => [
                'name' => 'Bhutan',
                'code' => 'BT',
            ],
            26 => [
                'name' => 'Bolivia',
                'code' => 'BO',
            ],
            27 => [
                'name' => 'Bosnia and Herzegovina',
                'code' => 'BA',
            ],
            28 => [
                'name' => 'Botswana',
                'code' => 'BW',
            ],
            29 => [
                'name' => 'Bouvet Island',
                'code' => 'BV',
            ],
            30 => [
                'name' => 'Brazil',
                'code' => 'BR',
            ],
            31 => [
                'name' => 'British Indian Ocean Territory',
                'code' => 'IO',
            ],
            32 => [
                'name' => 'Brunei Darussalam',
                'code' => 'BN',
            ],
            33 => [
                'name' => 'Bulgaria',
                'code' => 'BG',
            ],
            34 => [
                'name' => 'Burkina Faso',
                'code' => 'BF',
            ],
            35 => [
                'name' => 'Burundi',
                'code' => 'BI',
            ],
            36 => [
                'name' => 'Cambodia',
                'code' => 'KH',
            ],
            37 => [
                'name' => 'Cameroon',
                'code' => 'CM',
            ],
            38 => [
                'name' => 'Canada',
                'code' => 'CA',
            ],
            39 => [
                'name' => 'Cape Verde',
                'code' => 'CV',
            ],
            40 => [
                'name' => 'Cayman Islands',
                'code' => 'KY',
            ],
            41 => [
                'name' => 'Central African Republic',
                'code' => 'CF',
            ],
            42 => [
                'name' => 'Chad',
                'code' => 'TD',
            ],
            43 => [
                'name' => 'Chile',
                'code' => 'CL',
            ],
            44 => [
                'name' => 'China',
                'code' => 'CN',
            ],
            45 => [
                'name' => 'Christmas Island',
                'code' => 'CX',
            ],
            46 => [
                'name' => 'Cocos (Keeling) Islands',
                'code' => 'CC',
            ],
            47 => [
                'name' => 'Colombia',
                'code' => 'CO',
            ],
            48 => [
                'name' => 'Comoros',
                'code' => 'KM',
            ],
            49 => [
                'name' => 'Congo',
                'code' => 'CG',
            ],
            50 => [
                'name' => 'Congo, The Democratic Republic of the',
                'code' => 'CD',
            ],
            51 => [
                'name' => 'Cook Islands',
                'code' => 'CK',
            ],
            52 => [
                'name' => 'Costa Rica',
                'code' => 'CR',
            ],
            53 => [
                'name' => 'Cote D\'Ivoire',
                'code' => 'CI',
            ],
            54 => [
                'name' => 'Croatia',
                'code' => 'HR',
            ],
            55 => [
                'name' => 'Cuba',
                'code' => 'CU',
            ],
            56 => [
                'name' => 'Cyprus',
                'code' => 'CY',
            ],
            57 => [
                'name' => 'Czech Republic',
                'code' => 'CZ',
            ],
            58 => [
                'name' => 'Denmark',
                'code' => 'DK',
            ],
            59 => [
                'name' => 'Djibouti',
                'code' => 'DJ',
            ],
            60 => [
                'name' => 'Dominica',
                'code' => 'DM',
            ],
            61 => [
                'name' => 'Dominican Republic',
                'code' => 'DO',
            ],
            62 => [
                'name' => 'Ecuador',
                'code' => 'EC',
            ],
            63 => [
                'name' => 'Egypt',
                'code' => 'EG',
            ],
            64 => [
                'name' => 'El Salvador',
                'code' => 'SV',
            ],
            65 => [
                'name' => 'Equatorial Guinea',
                'code' => 'GQ',
            ],
            66 => [
                'name' => 'Eritrea',
                'code' => 'ER',
            ],
            67 => [
                'name' => 'Estonia',
                'code' => 'EE',
            ],
            68 => [
                'name' => 'Ethiopia',
                'code' => 'ET',
            ],
            69 => [
                'name' => 'Falkland Islands (Malvinas)',
                'code' => 'FK',
            ],
            70 => [
                'name' => 'Faroe Islands',
                'code' => 'FO',
            ],
            71 => [
                'name' => 'Fiji',
                'code' => 'FJ',
            ],
            72 => [
                'name' => 'Finland',
                'code' => 'FI',
            ],
            73 => [
                'name' => 'France',
                'code' => 'FR',
            ],
            74 => [
                'name' => 'French Guiana',
                'code' => 'GF',
            ],
            75 => [
                'name' => 'French Polynesia',
                'code' => 'PF',
            ],
            76 => [
                'name' => 'French Southern Territories',
                'code' => 'TF',
            ],
            77 => [
                'name' => 'Gabon',
                'code' => 'GA',
            ],
            78 => [
                'name' => 'Gambia',
                'code' => 'GM',
            ],
            79 => [
                'name' => 'Georgia',
                'code' => 'GE',
            ],
            80 => [
                'name' => 'Germany',
                'code' => 'DE',
            ],
            81 => [
                'name' => 'Ghana',
                'code' => 'GH',
            ],
            82 => [
                'name' => 'Gibraltar',
                'code' => 'GI',
            ],
            83 => [
                'name' => 'Greece',
                'code' => 'GR',
            ],
            84 => [
                'name' => 'Greenland',
                'code' => 'GL',
            ],
            85 => [
                'name' => 'Grenada',
                'code' => 'GD',
            ],
            86 => [
                'name' => 'Guadeloupe',
                'code' => 'GP',
            ],
            87 => [
                'name' => 'Guam',
                'code' => 'GU',
            ],
            88 => [
                'name' => 'Guatemala',
                'code' => 'GT',
            ],
            89 => [
                'name' => 'Guernsey',
                'code' => 'GG',
            ],
            90 => [
                'name' => 'Guinea',
                'code' => 'GN',
            ],
            91 => [
                'name' => 'Guinea-Bissau',
                'code' => 'GW',
            ],
            92 => [
                'name' => 'Guyana',
                'code' => 'GY',
            ],
            93 => [
                'name' => 'Haiti',
                'code' => 'HT',
            ],
            94 => [
                'name' => 'Heard Island and Mcdonald Islands',
                'code' => 'HM',
            ],
            95 => [
                'name' => 'Holy See (Vatican City State)',
                'code' => 'VA',
            ],
            96 => [
                'name' => 'Honduras',
                'code' => 'HN',
            ],
            97 => [
                'name' => 'Hong Kong',
                'code' => 'HK',
            ],
            98 => [
                'name' => 'Hungary',
                'code' => 'HU',
            ],
            99 => [
                'name' => 'Iceland',
                'code' => 'IS',
            ],
            100 => [
                'name' => 'India',
                'code' => 'IN',
            ],
            101 => [
                'name' => 'Indonesia',
                'code' => 'ID',
            ],
            102 => [
                'name' => 'Iran, Islamic Republic Of',
                'code' => 'IR',
            ],
            103 => [
                'name' => 'Iraq',
                'code' => 'IQ',
            ],
            104 => [
                'name' => 'Ireland',
                'code' => 'IE',
            ],
            105 => [
                'name' => 'Isle of Man',
                'code' => 'IM',
            ],
            106 => [
                'name' => 'Israel',
                'code' => 'IL',
            ],
            107 => [
                'name' => 'Italy',
                'code' => 'IT',
            ],
            108 => [
                'name' => 'Jamaica',
                'code' => 'JM',
            ],
            109 => [
                'name' => 'Japan',
                'code' => 'JP',
            ],
            110 => [
                'name' => 'Jersey',
                'code' => 'JE',
            ],
            111 => [
                'name' => 'Jordan',
                'code' => 'JO',
            ],
            112 => [
                'name' => 'Kazakhstan',
                'code' => 'KZ',
            ],
            113 => [
                'name' => 'Kenya',
                'code' => 'KE',
            ],
            114 => [
                'name' => 'Kiribati',
                'code' => 'KI',
            ],
            115 => [
                'name' => 'Korea, Democratic People\'S Republic of',
                'code' => 'KP',
            ],
            116 => [
                'name' => 'Korea, Republic of',
                'code' => 'KR',
            ],
            117 => [
                'name' => 'Kuwait',
                'code' => 'KW',
            ],
            118 => [
                'name' => 'Kyrgyzstan',
                'code' => 'KG',
            ],
            119 => [
                'name' => 'Lao People\'S Democratic Republic',
                'code' => 'LA',
            ],
            120 => [
                'name' => 'Latvia',
                'code' => 'LV',
            ],
            121 => [
                'name' => 'Lebanon',
                'code' => 'LB',
            ],
            122 => [
                'name' => 'Lesotho',
                'code' => 'LS',
            ],
            123 => [
                'name' => 'Liberia',
                'code' => 'LR',
            ],
            124 => [
                'name' => 'Libyan Arab Jamahiriya',
                'code' => 'LY',
            ],
            125 => [
                'name' => 'Liechtenstein',
                'code' => 'LI',
            ],
            126 => [
                'name' => 'Lithuania',
                'code' => 'LT',
            ],
            127 => [
                'name' => 'Luxembourg',
                'code' => 'LU',
            ],
            128 => [
                'name' => 'Macao',
                'code' => 'MO',
            ],
            129 => [
                'name' => 'Macedonia, The Former Yugoslav Republic of',
                'code' => 'MK',
            ],
            130 => [
                'name' => 'Madagascar',
                'code' => 'MG',
            ],
            131 => [
                'name' => 'Malawi',
                'code' => 'MW',
            ],
            132 => [
                'name' => 'Malaysia',
                'code' => 'MY',
            ],
            133 => [
                'name' => 'Maldives',
                'code' => 'MV',
            ],
            134 => [
                'name' => 'Mali',
                'code' => 'ML',
            ],
            135 => [
                'name' => 'Malta',
                'code' => 'MT',
            ],
            136 => [
                'name' => 'Marshall Islands',
                'code' => 'MH',
            ],
            137 => [
                'name' => 'Martinique',
                'code' => 'MQ',
            ],
            138 => [
                'name' => 'Mauritania',
                'code' => 'MR',
            ],
            139 => [
                'name' => 'Mauritius',
                'code' => 'MU',
            ],
            140 => [
                'name' => 'Mayotte',
                'code' => 'YT',
            ],
            141 => [
                'name' => 'Mexico',
                'code' => 'MX',
            ],
            142 => [
                'name' => 'Micronesia, Federated States of',
                'code' => 'FM',
            ],
            143 => [
                'name' => 'Moldova, Republic of',
                'code' => 'MD',
            ],
            144 => [
                'name' => 'Monaco',
                'code' => 'MC',
            ],
            145 => [
                'name' => 'Mongolia',
                'code' => 'MN',
            ],
            146 => [
                'name' => 'Montserrat',
                'code' => 'MS',
            ],
            147 => [
                'name' => 'Morocco',
                'code' => 'MA',
            ],
            148 => [
                'name' => 'Mozambique',
                'code' => 'MZ',
            ],
            149 => [
                'name' => 'Myanmar',
                'code' => 'MM',
            ],
            150 => [
                'name' => 'Namibia',
                'code' => 'NA',
            ],
            151 => [
                'name' => 'Nauru',
                'code' => 'NR',
            ],
            152 => [
                'name' => 'Nepal',
                'code' => 'NP',
            ],
            153 => [
                'name' => 'Netherlands',
                'code' => 'NL',
            ],
            154 => [
                'name' => 'Netherlands Antilles',
                'code' => 'AN',
            ],
            155 => [
                'name' => 'New Caledonia',
                'code' => 'NC',
            ],
            156 => [
                'name' => 'New Zealand',
                'code' => 'NZ',
            ],
            157 => [
                'name' => 'Nicaragua',
                'code' => 'NI',
            ],
            158 => [
                'name' => 'Niger',
                'code' => 'NE',
            ],
            159 => [
                'name' => 'Nigeria',
                'code' => 'NG',
            ],
            160 => [
                'name' => 'Niue',
                'code' => 'NU',
            ],
            161 => [
                'name' => 'Norfolk Island',
                'code' => 'NF',
            ],
            162 => [
                'name' => 'Northern Mariana Islands',
                'code' => 'MP',
            ],
            163 => [
                'name' => 'Norway',
                'code' => 'NO',
            ],
            164 => [
                'name' => 'Oman',
                'code' => 'OM',
            ],
            165 => [
                'name' => 'Pakistan',
                'code' => 'PK',
            ],
            166 => [
                'name' => 'Palau',
                'code' => 'PW',
            ],
            167 => [
                'name' => 'Palestinian Territory, Occupied',
                'code' => 'PS',
            ],
            168 => [
                'name' => 'Panama',
                'code' => 'PA',
            ],
            169 => [
                'name' => 'Papua New Guinea',
                'code' => 'PG',
            ],
            170 => [
                'name' => 'Paraguay',
                'code' => 'PY',
            ],
            171 => [
                'name' => 'Peru',
                'code' => 'PE',
            ],
            172 => [
                'name' => 'Philippines',
                'code' => 'PH',
            ],
            173 => [
                'name' => 'Pitcairn',
                'code' => 'PN',
            ],
            174 => [
                'name' => 'Poland',
                'code' => 'PL',
            ],
            175 => [
                'name' => 'Portugal',
                'code' => 'PT',
            ],
            176 => [
                'name' => 'Puerto Rico',
                'code' => 'PR',
            ],
            177 => [
                'name' => 'Qatar',
                'code' => 'QA',
            ],
            178 => [
                'name' => 'Reunion',
                'code' => 'RE',
            ],
            179 => [
                'name' => 'Romania',
                'code' => 'RO',
            ],
            180 => [
                'name' => 'Russian Federation',
                'code' => 'RU',
            ],
            181 => [
                'name' => 'RWANDA',
                'code' => 'RW',
            ],
            182 => [
                'name' => 'Saint Helena',
                'code' => 'SH',
            ],
            183 => [
                'name' => 'Saint Kitts and Nevis',
                'code' => 'KN',
            ],
            184 => [
                'name' => 'Saint Lucia',
                'code' => 'LC',
            ],
            185 => [
                'name' => 'Saint Pierre and Miquelon',
                'code' => 'PM',
            ],
            186 => [
                'name' => 'Saint Vincent and the Grenadines',
                'code' => 'VC',
            ],
            187 => [
                'name' => 'Samoa',
                'code' => 'WS',
            ],
            188 => [
                'name' => 'San Marino',
                'code' => 'SM',
            ],
            189 => [
                'name' => 'Sao Tome and Principe',
                'code' => 'ST',
            ],
            190 => [
                'name' => 'Saudi Arabia',
                'code' => 'SA',
            ],
            191 => [
                'name' => 'Senegal',
                'code' => 'SN',
            ],
            192 => [
                'name' => 'Serbia and Montenegro',
                'code' => 'CS',
            ],
            193 => [
                'name' => 'Seychelles',
                'code' => 'SC',
            ],
            194 => [
                'name' => 'Sierra Leone',
                'code' => 'SL',
            ],
            195 => [
                'name' => 'Singapore',
                'code' => 'SG',
            ],
            196 => [
                'name' => 'Slovakia',
                'code' => 'SK',
            ],
            197 => [
                'name' => 'Slovenia',
                'code' => 'SI',
            ],
            198 => [
                'name' => 'Solomon Islands',
                'code' => 'SB',
            ],
            199 => [
                'name' => 'Somalia',
                'code' => 'SO',
            ],
            200 => [
                'name' => 'South Africa',
                'code' => 'ZA',
            ],
            201 => [
                'name' => 'South Georgia and the South Sandwich Islands',
                'code' => 'GS',
            ],
            202 => [
                'name' => 'Spain',
                'code' => 'ES',
            ],
            203 => [
                'name' => 'Sri Lanka',
                'code' => 'LK',
            ],
            204 => [
                'name' => 'Sudan',
                'code' => 'SD',
            ],
            205 => [
                'name' => 'Suriname',
                'code' => 'SR',
            ],
            206 => [
                'name' => 'Svalbard and Jan Mayen',
                'code' => 'SJ',
            ],
            207 => [
                'name' => 'Swaziland',
                'code' => 'SZ',
            ],
            208 => [
                'name' => 'Sweden',
                'code' => 'SE',
            ],
            209 => [
                'name' => 'Switzerland',
                'code' => 'CH',
            ],
            210 => [
                'name' => 'Syrian Arab Republic',
                'code' => 'SY',
            ],
            211 => [
                'name' => 'Taiwan, Province of China',
                'code' => 'TW',
            ],
            212 => [
                'name' => 'Tajikistan',
                'code' => 'TJ',
            ],
            213 => [
                'name' => 'Tanzania, United Republic of',
                'code' => 'TZ',
            ],
            214 => [
                'name' => 'Thailand',
                'code' => 'TH',
            ],
            215 => [
                'name' => 'Timor-Leste',
                'code' => 'TL',
            ],
            216 => [
                'name' => 'Togo',
                'code' => 'TG',
            ],
            217 => [
                'name' => 'Tokelau',
                'code' => 'TK',
            ],
            218 => [
                'name' => 'Tonga',
                'code' => 'TO',
            ],
            219 => [
                'name' => 'Trinidad and Tobago',
                'code' => 'TT',
            ],
            220 => [
                'name' => 'Tunisia',
                'code' => 'TN',
            ],
            221 => [
                'name' => 'Turkey',
                'code' => 'TR',
            ],
            222 => [
                'name' => 'Turkmenistan',
                'code' => 'TM',
            ],
            223 => [
                'name' => 'Turks and Caicos Islands',
                'code' => 'TC',
            ],
            224 => [
                'name' => 'Tuvalu',
                'code' => 'TV',
            ],
            225 => [
                'name' => 'Uganda',
                'code' => 'UG',
            ],
            226 => [
                'name' => 'Ukraine',
                'code' => 'UA',
            ],
            227 => [
                'name' => 'United Arab Emirates',
                'code' => 'AE',
            ],
            228 => [
                'name' => 'United Kingdom',
                'code' => 'GB',
            ],
            229 => [
                'name' => 'United States',
                'code' => 'US',
            ],
            230 => [
                'name' => 'United States Minor Outlying Islands',
                'code' => 'UM',
            ],
            231 => [
                'name' => 'Uruguay',
                'code' => 'UY',
            ],
            232 => [
                'name' => 'Uzbekistan',
                'code' => 'UZ',
            ],
            233 => [
                'name' => 'Vanuatu',
                'code' => 'VU',
            ],
            234 => [
                'name' => 'Venezuela',
                'code' => 'VE',
            ],
            235 => [
                'name' => 'Viet Nam',
                'code' => 'VN',
            ],
            236 => [
                'name' => 'Virgin Islands, British',
                'code' => 'VG',
            ],
            237 => [
                'name' => 'Virgin Islands, U.S.',
                'code' => 'VI',
            ],
            238 => [
                'name' => 'Wallis and Futuna',
                'code' => 'WF',
            ],
            239 => [
                'name' => 'Western Sahara',
                'code' => 'EH',
            ],
            240 => [
                'name' => 'Yemen',
                'code' => 'YE',
            ],
            241 => [
                'name' => 'Zambia',
                'code' => 'ZM',
            ],
            242 => [
                'name' => 'Zimbabwe',
                'code' => 'ZW',
            ],
        ];
        DB::table('countries')->insert($countries);
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
