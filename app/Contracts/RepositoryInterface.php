<?php
namespace App\Contracts;

interface RepositoryInterface
{
    public function getAll();

    public function store($data);

    public function update($data);

    public function delete($id);
}