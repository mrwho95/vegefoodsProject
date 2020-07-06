<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\product;

class ProductChart extends BaseChart
{
    
    public function handler(Request $request): Chartisan
    {
        $vegetable = product::where('category', 'vegetable')->get()->toArray();
        foreach ($vegetable as $key => $elements) {
            $sell[] = $elements['sell'];
            $productName[] = $elements['name'];
        }

        return Chartisan::build()
            ->labels($productName)
            ->dataset('Sample', $sell);
            // ->dataset('Sample 2', [3, 2, 1]);

        //Original
        // return Chartisan::build()
        //     ->labels(['First', 'Second', 'Third'])
        //     ->dataset('Sample', [1, 2, 3])
        //     ->dataset('Sample 2', [3, 2, 1]);
    }
}