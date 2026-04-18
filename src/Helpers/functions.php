<?php
declare(strict_types=1);

function getStockStatus(int $quantity):string
{
    if ($quantity <=  0){
        return 'Hết hàng';
    } elseif ($quantity <= 2){
        return 'Sắp hết hàng';
    }

    return 'Còn hàng';
}

function getTotalQuantity(array $items): int 
{
    return array_reduce($items, function ($carry, $item){
        return $carry + $item['quantity'];
    }, 0);
}

function getAvailableItems(array $items): array
{
    return array_values(array_filter($items, function ($item){
        return $item['quantity'] > 0;
    }));
}

function formatItemName(string $name): string
{
    return ucwords(strtolower($name));
}

function calculateTotalValue(array $items): int {
    return array_reduce($items, function ($carry, $item) {
        // Chỉ tính tiền những món có số lượng > 0
        if ($item['quantity'] > 0) {
            return $carry + ($item['price'] * $item['quantity']);
        }
        return $carry;
    }, 0);
}