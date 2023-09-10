<?php

namespace app\models;

interface LocalDbDriver
{
    public function findProductById(string $id): array;
}