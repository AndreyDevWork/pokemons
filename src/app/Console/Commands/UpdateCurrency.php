<?php

namespace App\Console\Commands;

use App\Models\Currency;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "app:update-currency";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "This command update currency";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get("http://www.cbr.ru/scripts/XML_daily.asp");

        $xmlData = $response->body();
        $xmlObject = simplexml_load_string($xmlData);
        $xmlArray = json_decode(json_encode($xmlObject), true);

        foreach ($xmlArray["Valute"] as $valuteData) {
            Currency::Create([
                "num_code" => $valuteData["NumCode"],
                "char_code" => $valuteData["CharCode"],
                "nominal" => $valuteData["Nominal"],
                "name" => $valuteData["Name"],
                "value" => str_replace(",", ".", $valuteData["Value"]),
                "vunit_rate" => str_replace(",", ".", $valuteData["VunitRate"]),
            ]);
        }
    }
}
