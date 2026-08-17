<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tag;

class TestController extends Controller
{
    public function seed()
    {
        // Cria (ou reaproveita) um usuário de teste
        $user = User::firstOrCreate(
            ['email' => 'teste@exemplo.com'],
            ['name' => 'Usuário Teste', 'password' => bcrypt('123456')]
        );

        // Testa 1:1 -> profile
        $user->profile()->firstOrCreate([], [
            'bio' => 'Perfil de teste criado automaticamente',
            'telefone' => '11999999999',
        ]);

        // Testa 1:N -> posts
        $post = $user->posts()->firstOrCreate(
            ['titulo' => 'Post de teste'],
            ['conteudo' => 'Conteúdo de teste para verificar o relacionamento 1:N']
        );

        // Testa N:M -> tags (via post_tag)
        $tag1 = Tag::firstOrCreate(['nome' => 'laravel']);
        $tag2 = Tag::firstOrCreate(['nome' => 'teste']);
        $post->tags()->syncWithoutDetaching([$tag1->id, $tag2->id]);

        return redirect()->route('teste.index');
    }

    public function index()
    {
        $users = User::with(['profile', 'posts.tags'])->get();
        return view('teste', compact('users'));
    }
}