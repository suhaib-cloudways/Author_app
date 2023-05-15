<?php

namespace App\Repositories;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Interfaces\AuthorRepositoryInterface;

class AuthorRepository implements AuthorRepositoryInterface{
    
  //Show All Authors
  public function showAllAuthors(){
    return UserResource::collection(Author::all());
   }

 //Show one author
 public function showOneAuthor($id){
    return UserResource(Author::findOrFail($id));
   }

//Delete 
public function delete($id){
    return UserResource(Author::findOrFail($id)->delete());
}

    //Add an Author
    public function create($request)
    {
        return new UserResource(Author::create($request->all()));
    }


    //Update an Author
    public function update($id, $request){

        $author = new UserResource(Author::findOrFail($id));
        $author->update($request->all());

        return $author;

    }
}
