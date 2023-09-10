<?php

namespace app\models;

interface HeliosDbDriver
{
    public function getProduct(string $id): array;
}