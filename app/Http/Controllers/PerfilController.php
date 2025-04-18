<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\ArticleModel;
use App\Models\UsuariModel;
use Illuminate\Support\Facades\Log;

class PerfilController extends Controller{

    //Funcio per mostrar el perfil de l'usuari
    public function mostrarPerfil()
    {

        //varible per agafar les dades de l'usuari logeat
        $usuari = Auth::user();  
        
        //envia les dades a la vista
        return view('perfil', ['usuari' => $usuari]);
    }

    //Funcio per mostrar el nickname de l'usuari amb que estas logeat
    public function mostrarnickname()
    {

        
        
        if (Auth::check() && Auth::user()->id) {
            
            $usuariModel = new UsuariModel();
            $nickname = $usuariModel->filtrarUsuarisPerID(Auth::user()->id);
    
            
            return view('perfil', ['nickname' => $nickname]);
        } else {
            
            return redirect()->route('perfil')->with('error', 'No has iniciat sesió.');
        }
    }

    //Funcio per actulitzar el nickname de la sessio que has iniciat
    public function actualitzarNickname(Request $request)
    {
        $request->validate([
            'nickname' => 'required|string|max:255|unique:usuaris,nickname,' . Auth::id(), 
        ]);
    
        // Actualizar el nickname del usuari logeat 
        UsuariModel::actualitzarNickname($request->nickname, Auth::id());
    
        // Envia un missatge de confirmacio
        return redirect()->route('mostrar.perfil')->with('success', 'Nickname actualizado correctamente.');
    }
    
    
    //Funcio per actualitzar la contrasenya de l'usuari amb el que te has logeat    
    public function actualitzarContrasenya(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required|string|min:8',
            'newpassword' => 'required|string|min:8|confirmed|different:oldpassword',
        ]);
    
        $user = Auth::user();
    
        // Verificar contraseña actual
        if (!Hash::check($request->oldpassword, $user->password)) {
            return back()->with('error', 'La contrasenya actual és incorrecta');
        }
    
        // Llamar al método del modelo
        $result = UsuariModel::actualitzarContrasenya(
            $request->newpassword,
            $user->id
        );
    
        if ($result) {
            return back()->with('success', 'Contrasenya actualitzada correctament');
        }
    
        return back()->with('error', 'Error al actualitzar la contrasenya');
    }
    
    
     // Funció per actualizar la foto de perfil  
    public function actualitzarFotodePerfil(Request $request, $id)
    {
        try {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);
        
            $user = UsuariModel::findOrFail($id);
        
            // Verifica i procesa la imatge
            if ($request->hasFile('photo')) {
                // Eliminar imagen anterior si existe
                if ($user->image && Storage::disk('storage')->exists($user->image)) {
                    Storage::disk('storage')->delete($user->image);
                }
                
                // Guarda nova imatge
                $imagePath = $request->file('photo')->store('images', 'public');    
                
                // Actualitzar la columna photo
                $user->update([
                    'photo' => $imagePath
                ]);
            }
        
            return redirect()->route('mostrar.perfil', $user->id)
                   ->with('success', 'Foto de perfil actualizada correctamente');
        }
        catch (\Exception $e) {
            Log::error('Error al actualitzar foto de perfil: ' . $e->getMessage());
            return redirect()->back()
                   ->with('error', 'Error al actualitzar la foto: ' . $e->getMessage());
        }
    }
}
?>