<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Product;

use Illuminate\Http\Request;

use yangpimpollo\L2_application\UseCases\Product\SearchProductUseCase;
use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class SearchProductController
{
    use ApiResponse;

    public function __construct( private SearchProductUseCase $search ) {}

    /**
     * Buscardor Patito🐦
     */
    public function __invoke(Request $request){

        // http://localhost:8000/api/products/search?patito=.......

        $validated = $request->validate([ 'patito' => 'required|string|min:3|max:30']);
        $storeId = $request->user()->store_id;
    
        $results = $this->search->execute($validated['patito'], $storeId);

        $data = [  
            'store_id' => $storeId,
            'query' => $validated['patito'],
            'results' => $results 
        ];
    
        return $this->success($data, 'Busqueda exitosa!!! . . .', 200);
    }

}