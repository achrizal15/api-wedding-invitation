<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index ()
    {
        $resource = CommentResource::collection(Comment::where("parent_id", null)->with("comments")->latest()->get());

        return $resource;
    }
    public function store (Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [ 
                "nama"     => "required",
                "komentar" => "required",
                "hadir"    => "required|boolean"
            ]
        );
        if ( $validator->fails() )
        {
            return response()->json($validator->errors(), 422);
        }
        $data['uuid'] = Str::uuid();
        if ( $request->has("id") )
        {
            $data['parent_id'] = $request->id;
        }
        $data['detail']   = $request->komentar;
        $data['name']     = $request->nama;
        $data['presence'] = $request->hadir;
        Comment::create($data);
        return CommentResource::collection([ $data ]);
    }
 
}