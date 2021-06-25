<?php
/**
 * Author: Alexander Kuziv
 * E-mail: alexander@makklays.com
 */

namespace App\Repositories;

use Symfony\Component\HttpFoundation\Request;

interface ArticleRepositoryInterface
{
    public function create(Request $request);

    public function updateByID($id, Request $request);

    public function updateImg($id, Request $request);

    public function getByID($id, $columns);

    public function getAllActive($columns);

    public function getAll($columns);

    public function paginate($perPage, $columns);

    public function delete($id);

    public function getUserFullnameByID($id);
}
