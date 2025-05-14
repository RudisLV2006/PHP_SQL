<?php
$orders = [
    ['order_id' => 1, 'customer' => 'Alise', 'product' => 'Grāmata'],
    ['order_id' => 1, 'customer' => 'Alise', 'product' => 'Pildspalva'],
    ['order_id' => 2, 'customer' => 'Bobs', 'product' => 'Dators'],
    ['order_id' => 2, 'customer' => 'Bobs', 'product' => 'Pelīte'],
    ['order_id' => 3, 'customer' => 'Čārlijs', 'product' => 'Kafijas automāts'],
];

$groupdedOrders = [];

foreach ($orders as $item){
    if(isset($groupdedOrders[$item["order_id"]])){
        $groupdedOrders[$item["order_id"]]['product'][] = $item["product"];
    }else{
      $groupdedOrders[$item["order_id"]] = [
        'customer' => $item["customer"],
        'product' => [$item["product"]]
    ];  
    }
    
}



?>