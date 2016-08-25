<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Storage;

class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {

        return view("correo.contacto");
        

    }



    public function enviar(Request $request)
    {
    
        $pathToFile="";
        $containfile=false; 


        
        $destinatario=$request->input("destinatario");
        $asunto=$request->input("asunto");
        $contenido=$request->input("contenido_mail");
        $contenido.='Att.</br>'.$request->input("remitente").'</br>'.$destinatario;
       
        $data = array('contenido' => $contenido);
        $to = 'tienda@gopetsstore.com';
        $from = $destinatario;

        $r= Mail::send('correo.plantillaContacto', $data, function ($message) use ($asunto,$to,  $containfile,$pathToFile) {
            $message->from('atencionusuariogopets@gmail.com', 'Go! Pets Store');
            $message->to($to)->subject($asunto);
            });
            
        if($r){   
     
             return view("mensajes.msj_correcto")->with("msj","Correo Enviado correctamente");   
           }
        else
          {            
             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
          }

   
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file') ){ 
         
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $nombre=$file->getClientOriginalName();
        $r= Storage::disk('local')->put($nombre,  \File::get($file));
       

         } 
         else{

            return "no";
         } 

        if($r){
            return $nombre ;
        }
        else
        {
            return "error vuelva a intentarlo";
        }
      
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
