<?php

namespace App\Http\Livewire;
use App\Models\Tipopersona;
use Livewire\WithPagination;
use App\Models\Persona;
use Illuminate\Http\Request;
use Livewire\Component;



class Person extends Component
{
    use WithPagination;
 
 
        public $nombres, $cedula, $tipo;
    
        public function render()
        {
           
            $tipos=Tipopersona::all();
            $personas=Persona::all();
            return view('livewire.person', compact('tipos','personas'));
            
        }
    
        public function guardar(){
            $persona = new Persona();
            $persona->nombres= $this->nombres;
            $persona->cedula= $this->cedula;
            $persona->tipo_id= $this->tipo;
            $persona->save();
    }
    public function update($id,Request $request){
        $persona= Persona::find($id);
        $persona->nombre = $request->nombre;
        $persona->cedula = $request->cedula;
        $persona->save();
     return redirect('/dashboard');
 }
 public function delete($id){
     $persona= Persona::find($id);
     $persona->estado =false;
     $persona->save();
     return redirect('/dashboard');
 }
/*  public function index(){
     $personas= Persona::where('estado', true)->get();
     return view ('dashboard', compact('personas'));
 } */
 public function edit($id){
     $persona= Persona::find($id);
     return view ('editPersona', compact('persona'));
 }
  
 
    public function rendera()
    {
        return view('livewire.show-posts', [
            'posts' => Post::paginate(10),
        ]);
    }

}
