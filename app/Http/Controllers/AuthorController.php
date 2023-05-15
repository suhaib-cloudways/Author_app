<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\AuthorRepositoryInterface;
use App\Http\Resources\UserResource;

class AuthorController extends Controller
{

    private AuthorRepositoryInterface $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }
    
    public function showAllAuthors()
    {
        $allAuthors = $this->authorRepository->showAllAuthors();
        return response()->json($allAuthors);
    }


    public function showOneAuthor($id)
    {
        $oneAuthor =  $this->authorRepository->showOneAuthor($id);
        return response()->json($oneAuthor);
    }


    public function create(Request $request)
    {
        // JsonResource::withoutWrapping();
        $validated = $request->validated();
        
        $author = $this->authorRepository->create($request);

        return response()->json($author, 201);
    }


    public function update($id, Request $request)
    {
        $validated = $request->validated();
        
        $author = $this->authorRepository->updateAnAuthor($id, $request);

        return response($author, 200);
    }


    public function delete($id)
    {
        $deleteAuthors = $this->authorRepository->delete($id);
        return response()->json($deleteAuthors);
    }
}