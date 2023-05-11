<?php

namespace App\Http\Controllers;

use App\Author;
use App\Helpers\AuthorValidationHelper;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class AuthorController extends Controller
{
    
    public function showAllAuthors()
    {
        return response()->json(Author::all());
    }


    public function showOneAuthor($id)
    {
        return response()->json(Author::find($id));
    }


    public function create(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:authors',
            'location' => 'required|alpha'
        ]);

        // $author = Author::create($request->all());

        $author = Author::create([
            // 'user_id' => $request->user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'github' => $request->github,
            'twitter' => $request->twitter,
            'location' => $request->location,
        ]);
            return new UserResource($author);
    }


    public function update($id, Request $request)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }


    public function delete($id)
    {
        Author::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}