<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class DownloadFlags extends Command
{
    protected $signature = 'flags:download';
    protected $description = 'Download flags automatically into public/flags';

    public function handle()
    {
        // Semua kode negara ISO 3166-1 alpha-2
        $countries = [
            "AF","AL","DZ","AS","AD","AO","AI","AQ","AG","AR","AM","AW","AU","AT","AZ",
            "BS","BH","BD","BB","BY","BE","BZ","BJ","BM","BT","BO","BQ","BA","BW","BV","BR","IO","BN","BG","BF","BI",
            "CV","KH","CM","CA","KY","CF","TD","CL","CN","CX","CC","CO","KM","CD","CG","CK","CR","CI","HR","CU","CW","CY","CZ",
            "DK","DJ","DM","DO","EC","EG","SV","GQ","ER","EE","SZ","ET","FK","FO","FJ","FI","FR","GF","PF","TF","GA","GM","GE","DE","GH","GI","GR","GL","GD","GP","GU","GT","GG","GN","GW","GY",
            "HT","HM","VA","HN","HK","HU",
            "IS","IN","ID","IR","IQ","IE","IM","IL","IT","JM","JP","JE","JO",
            "KZ","KE","KI","KP","KR","KW","KG","LA","LV","LB","LS","LR","LY","LI","LT","LU","MO","MG","MW","MY","MV","ML","MT","MH","MQ","MR","MU","YT","MX","FM","MD","MC","MN","ME","MS","MA","MZ","MM",
            "NA","NR","NP","NL","NC","NZ","NI","NE","NG","NU","NF","MK","MP","NO","OM",
            "PK","PW","PS","PA","PG","PY","PE","PH","PN","PL","PT","PR","QA",
            "RE","RO","RU","RW",
            "BL","SH","KN","LC","MF","PM","VC","WS","SM","ST","SA","SN","RS","SC","SL","SG","SX","SK","SI","SB","SO","ZA","GS","SS","ES","LK","SD","SR","SJ","SE","CH","SY","TW","TJ","TZ","TH","TL","TG","TK","TO","TT","TN","TR","TM","TC","TV","UG","UA","AE","GB","US","UM","UY","UZ",
            "VU","VE","VN","VG","VI","WF","EH","YE","ZM","ZW"
        ];

        $baseUrl = "https://flagcdn.com/48x36/"; // ukuran 48x36 px
        $outputDir = public_path('flags');

        // Buat folder jika belum ada
        if (!File::exists($outputDir)) {
            File::makeDirectory($outputDir, 0755, true);
        }

        foreach ($countries as $code) {

            $lower = strtolower($code);
            $url = $baseUrl . $lower . ".png";
            $savePath = $outputDir . "/" . $lower . ".png";

            $this->info("Downloading: $url");

            $response = Http::get($url);
            if ($response->successful()) {
                File::put($savePath, $response->body());
                $this->info("Saved: $savePath");
            } else {
                $this->error("Failed: $url");
            }
        }

        $this->info("All flags downloaded!");
    }
}