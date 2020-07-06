<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\product;


class MeatChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $meat = product::where('category', 'meat')->get()->toArray();
        foreach ($meat as $key => $elements) {
            $sell[] = $elements['sell'];
            $productName[] = $elements['name'];
        }

        return Chartisan::build()
            ->labels($productName)
            ->dataset('Sample', $sell);
            // ->dataset('Sample 2', [3, 2, 1]);
    }
}