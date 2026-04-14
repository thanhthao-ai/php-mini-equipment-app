<?php

function getEquipmentStatus(int $quantity): string
{
    if ($quantity <= 0) {
        return 'Out of stock';
    } elseif ($quantity <= 2) {
        return 'Low stock';
    }

    return 'Available';
}

function formatEquipmentName(string $name): string
{
    return strtoupper($name);
}

function getTotalEquipmentQuantity(array $equipments): int
{
    return array_reduce($equipments, function ($carry, $item) {
        return $carry + $item['quantity'];
    }, 0);
}

function getAvailableEquipments(array $equipments): array
{
    return array_values(array_filter($equipments, function ($item) {
        return $item['quantity'] > 0;
    }));
}