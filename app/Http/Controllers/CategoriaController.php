<?php

namespace App\Http\Controllers;

use App\Repository\CategoriaRepository;
use App\RepositoryFilter\CategoriaFilter;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /** @var CategoriaRepository */
    protected $repository;

    public function __construct(CategoriaRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $payload = array_merge($this->getPayloadData($request));
        $filter = new CategoriaFilter($payload);
        return $this->repository->paginateByFilter($filter, true);
    }

}