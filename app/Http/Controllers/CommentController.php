<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(int $id, Request $request)
    {
        // méthode de validation du formulaire (gestion erreurs de saisie)
        $request->validate([
            'pseudo' => 'required|min:2',
            'content' => 'required|min:5|max:150'
        ]);
        
        // On récupère le post, s'il n'existe pas, on renvoie une page 404
        $post = Post::findOrFail($id);
            
        //Enregistrer un nouveau commentaire
        $comment = new Comment();
        $comment->pseudo = $request->input('pseudo');
        $comment->content = $request->input('content');
        $comment->post_id = $id;
        $comment->save();
        
        // Redirection vers la page de l'article
        return redirect()->route('posts.show', ['slug' => $post->slug]);
    }
    
    
}
