<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSectionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('footer_sections')->insert([

            // Host and Partners
            [
                'title' => 'Host and Partners',
                'subtitle' => null,
                'items' => json_encode([
                    ["img" => "logoUM.png", "alt" => "Logo UM"],
                    ["img" => "logoAscee.png", "alt" => "Logo ASCEE"],
                    ["img" => "logoIjain.png", "alt" => "Logo Ijain"],
                    ["img" => "logoUMI.png", "alt" => "Logo UMI"],
                    ["img" => "logoUAD.png", "alt" => "Logo UAD"],
                    ["img" => "logoUNMUL.png", "alt" => "Logo UNMUL"],
                    ["img" => "logoUPN.png", "alt" => "Logo UPN"],
                    ["img" => "logoKEDS.png", "alt" => "Logo KEDS"],
                    ["img" => "logoITSA.png", "alt" => "Logo ITSA"],
                ]),
            ],

            // Hosted section
            [
                'title' => 'Hosted',
                'subtitle' => 'Host',
                'items' => json_encode([
                    "Universitas Negeri Malang;",
                    "International Journal of Advances in Intelligent Informatics;",
                    "is jointly organized with",
                    "Association for Scientific Computing Electronics and Engineering (ASCEE);",
                    "Universitas Ahmad Dahlan;",
                    "Universitas Mulawarman;",
                    "Universitas Muslim Indonesia.",
                    "Universitas Pembangunan Nasional Veteran Yogyakarta, Indonesia;"
                ]),
            ],

            // Visitors section
            [
                'title' => 'Visitors',
                'subtitle' => null,
                'items' => json_encode([
                    ["country" => "ID", "count" => 13207, "flag" => "flags/id.png"],
                    ["country" => "US", "count" => 6392,  "flag" => "flags/us.png"],
                    ["country" => "TH", "count" => 1448,  "flag" => "flags/th.png"],
                    ["country" => "JP", "count" => 1065,  "flag" => "flags/jp.png"],
                    ["country" => "RU", "count" => 445,   "flag" => "flags/ru.png"],
                    ["country" => "VN", "count" => 283,   "flag" => "flags/vn.png"],
                    ["country" => "HK", "count" => 175,   "flag" => "flags/hk.png"],
                    ["country" => "ES", "count" => 133,   "flag" => "flags/es.png"],
                    ["country" => "AU", "count" => 116,   "flag" => "flags/au.png"],
                    ["country" => "IQ", "count" => 104,   "flag" => "flags/iq.png"],
                    ["country" => "FR", "count" => 83,    "flag" => "flags/fr.png"],
                    ["country" => "NL", "count" => 63,    "flag" => "flags/nl.png"],
                    ["country" => "LK", "count" => 54,    "flag" => "flags/lk.png"],
                    ["country" => "GR", "count" => 45,    "flag" => "flags/gr.png"],
                    ["country" => "IE", "count" => 37,    "flag" => "flags/ie.png"],
                    ["country" => "PK", "count" => 37,    "flag" => "flags/pk.png"],
                    ["country" => "MX", "count" => 22,    "flag" => "flags/mx.png"],
                    ["country" => "PE", "count" => 20,    "flag" => "flags/pe.png"],
                    ["country" => "CZ", "count" => 16,    "flag" => "flags/cz.png"],
                    ["country" => "FI", "count" => 14,    "flag" => "flags/fi.png"],
                    ["country" => "HU", "count" => 13,    "flag" => "flags/hu.png"],
                ]),
            ],

        ]);
    }
}