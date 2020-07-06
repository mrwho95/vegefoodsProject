<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\product;

class FruitJuiceChart extends BaseChart
{
     /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'fruitjuice_chart';

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $fruitJuice = product::where('category', 'fruit juice')->get()->toArray();
        foreach ($fruitJuice as $key => $elements) {
            $sell[] = $elements['sell'];
            $productName[] = $elements['name'];
        }

        return Chartisan::build()
            ->labels($productName)
            ->dataset('Sample', $sell);
            // ->dataset('Sample 2', [3, 2, 1]);
    }
}