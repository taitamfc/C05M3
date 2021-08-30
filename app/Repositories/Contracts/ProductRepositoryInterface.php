<?php
// app/Repositories/Contracts/ProductRepositoryInterface.php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function all();
    public function store($request);
    public function update($request,$id);
    public function find($id);
    public function destroy($id);
    public function findByCategory($category_id);

}
