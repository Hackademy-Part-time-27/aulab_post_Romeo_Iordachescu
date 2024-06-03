<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();

        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }
    public function setAdmin(User $user){
        $user->is_admin = true;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message' , 'Hai correttamente reso amministratore l\'utente scelto');
    }

    public function setRevisor(User $user){
        $user->is_revisor = true;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message' , 'Hai correttamente reso revisore l\'utente scelto');
    }
    public function setWriter(User $user){
        $user->is_writer = true;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message' , 'Hai correttamente reso redattore l\'utente scelto');
    }

    public function editTag(Request $request , Tag $tag){
        $request->validate([
            'name'=> 'required|unique:tags',
        ]);

        $tag->update([
            'name' => strtolower($request->name),
        ]);

        return redirect(route('admin.dashboard'))->with('message' , 'Hai correttamente aggiornato il tag');
    }

    public function deleteTag(Tag $tag){
        foreach ($tag->articles as $article) {
            $article->tags()->detach($tag);
        }

        $tag->delete();
        return redirect()->back()->with('message' , 'Hai correttamente eliminato il tag');
    }

    public function editCategory(Request $request , Category $category){
        $request->validate([
            'name'=> 'required|unique:categories',
        ]);

        $category->update([
            'name' => strtolower($request->name),
        ]);

        return redirect()->back()->with('message' , 'Hai correttamente aggiornato la categoria');
    }

    public function deleteCategory(Category $category){
    
        $category->delete();
        return redirect()->back()->with('message' , 'Hai correttamente eliminato la cateogria');
    }

    public function storeCategory(Request $request){
        Category::create([
            'name'=> strtolower($request->name),
        ]);

        return redirect()->back()->with('message' , 'Hai correttamente inserito una nuova categoria');
    }
    public function rejectAdmin(User $user) {
        $user->is_admin = false;
        $user->save();
    
        $adminRequests = collect(session('adminRequests'))->reject(function ($requestUser) use ($user) {
            return $requestUser->id === $user->id;
        });
        session(['adminRequests' => $adminRequests->values()->all()]);
    
        return redirect(route('admin.dashboard'))->with('message', 'Richiesta dell amministratore respinta correttamente');
    }
    
    public function rejectRevisor(User $user) {
        $user->is_revisor = false;
        $user->save();
    
        $revisorRequests = collect(session('revisorRequests'))->reject(function ($requestUser) use ($user) {
            return $requestUser->id === $user->id;
        });
        session(['revisorRequests' => $revisorRequests->values()->all()]);
    
        return redirect(route('admin.dashboard'))->with('message', 'Richiesta dello revisore respinta corretamente.');
    }
    
    public function rejectWriter(User $user) {
        $user->is_writer = false;
        $user->save();
    
        $writerRequests = collect(session('writerRequests'))->reject(function ($requestUser) use ($user) {
            return $requestUser->id === $user->id;
        });
        session(['writerRequests' => $writerRequests->values()->all()]);
    
        return redirect(route('admin.dashboard'))->with('message', 'Richiesta dello redattore respinta corretamente.');
    }
    
}
