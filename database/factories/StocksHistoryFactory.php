<?php

namespace Database\Factories;

use App\Enums\StockMarketTypeEnum;
use App\Models\Model;
use App\Models\Stock;
use App\Models\StocksHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class StocksHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StocksHistory::class;

    protected $symbols = [
        'ELUXY',
        'ADMT',
        'AFAP',
        'AFIPA',
        'ACMT',
        'ACMTA',
        'ACLD',
        'JALC',
        'ADDC',
        'ADKT'
    ];

    protected $securityName = [
        'ADIRONDACK TRUST SARA SPS',
        'AB ELECTROLUX B S/ADR',
        'ADM TRONICS UNLTD INC',
        'AFA PROTECTIVE SYS INC',
        'AMFI CORP A',
        'ACMAT CORP',
        'ACMAT CORP A',
        'ACQUIRE LTD',
        'ADAMS (JOHN) LIFE CORP',
        'ADDMASTER CORP'
    ];

    protected $securityType = [
        'Common Stock',
        'ADRs',
        'Preferred Stock',
        'Foreign Ordinary Shares',
        'Preferred Stock',
    ];

    protected $country = [
        'USA',
        'Canada',
        'Japan',
        'China',
        'Germany',
        'Australia',
        'Hong Kong',
        'Singapore',
        'Sweden'
    ];

    protected $states = [
        'California',
        'New York',
        'Florida',
        'Alabama',
        'Washington',
    ];

    protected $forexCountry = [
        'USA' => 'USA',
        'Sweden' => 'SWE',
        'Canada' => 'USA',
        'Japan' => 'JPN',
        'China' => 'USA',
        'Germany' => 'DEU',
        'Australia' => 'AUS',
        'Hong Kong' => 'NAC',
        'Singapore' => 'USA',
    ];

    protected $industry = [
        'Lawn and garden equipment',
        'Electromedical equipment',
        'General industrial machinery',
        'Surety insurance',
        'Real Estate',
        null,
        'Skilled nursing care facilities',
        'Oil and gas exploration services'
    ];
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $country = $this->country[$this->faker->numberBetween(0,count( $this->country) -1)];
        $state = $country === 'USA' ? $this->states[$this->faker->numberBetween(0,count( $this->states) -1)] : null;
        $forexCountry = $this->forexCountry[$country];
        $market = collect(StockMarketTypeEnum::labels())->values();

        return [
            "stock_id" => $this->faker->numberBetween(0,10000),
            "securityId" => $this->faker->randomNumber(5),
            "reportDate" => $this->faker->dateTime('now')->format('F j, Y, G:i:s a'),
            "symbol" => $this->symbols[$this->faker->numberBetween(0,count( $this->symbols)-1)],
            "securityName" => $this->securityName[$this->faker->numberBetween(0,count( $this->securityName)-1)],
            "market" => $market[$this->faker->numberBetween(0, count($market)-1)],
            "marketId" => $this->faker->numberBetween(10,20),
            "securityType" => $this->securityType[$this->faker->numberBetween(0,count( $this->securityType)-1)],
            "country" => $country,
            "state" => $state,
            "forexCountry" => $forexCountry,
            "caveatEmptor" => $this->faker->numberBetween(0,1),
            "industryId" => $this->faker->numberBetween(1000,6000),
            "industry" => $this->industry[$this->faker->numberBetween(0,count( $this->industry)-1)],
            "volume" => $this->faker->numberBetween(0,5333),
            "volumeChange" => $this->faker->numberBetween(0,10000) / 1000,
            "dividendYield" => 0,
            "dividendPayer" => $this->faker->numberBetween(0,1),
            "morningStarRating" => null,
            "penny" => 1,
            "price" => $this->faker->numberBetween(0,5000) / 100,
            "shortInterest" => null,
            "shortInterestPercent" => null,
            "shortInterestRatio" => 0,
            "pct1Day" => $this->faker->numberBetween(-10000,10000) / 1000,
            "pct5Day" => $this->faker->numberBetween(-10000,10000) / 1000,
            "pct4Weeks" => 0,
            "pct13Weeks" => 0,
            "pct52Weeks" => 0,
            "isBank" => 'N',
            "perfQxComp4Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxComp13Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxComp52Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxBillion4Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxBillion13Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxBillion52Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxBanks4Weeks" => 0,
            "perfQxBanks13Weeks" => 0,
            "perfQxBanks52Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxIntl4Weeks" => 0,
            "perfQxIntl13Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxIntl52Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxUs4Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxUs13Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxUs52Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQb4Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQb13Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQb52Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfSp4Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfSp13Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfSp52Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxDiv4Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxDiv13Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxDiv52Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxCan4Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxCan13Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
            "perfQxCan52Weeks" => $this->faker->numberBetween(-10000,10000) / 1000,
        ];
    }
}
