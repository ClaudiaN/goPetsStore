<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Producto;
use App\detalleProducto;
use App\colores;
use App\tallas;

class productoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$productos = detalleProducto::orderBy('id','DESC')->paginate(10);

        $productos = DB::table('detalleProducto')
            ->join('productos', 'productos.id', '=', 'detalleProducto.idProducto')
            ->join('tallas', 'tallas.idTalla', '=', 'detalleProducto.idTalla')
            ->join('colores', 'colores.idColor', '=', 'detalleProducto.idColor')
            ->select('detalleProducto.*', 'productos.descripcion', 'tallas.descriTalla','colores.descriColor')
            ->get();
            //var_dump($productos);
        return view('producto.index',compact('productos'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $list_colores = colores::all();
       $list_tallas = tallas::all();
       $list_productos = Producto::all();
       return view("producto.create")
       ->with("list_productos",$list_productos)
       ->with("list_colores",$list_colores)
       ->with("list_tallas",$list_tallas) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $archivo = $request->file('file');
        $input  = array('file' => $archivo) ;
        $reglas = array('file' => 'max:5000');  //recordar que para activar mimes se debe descomentar la linea de codigo  'extension=php_fileinfo.dll' del php.ini
        $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es un pdf o es demasiado Grande para subirlo");
        }
        else
        {
                
                if($request->input("idProducto")=='y')
                    $this->validate($request, [
                        'descripcion' => 'required',
                        'precioVenta' => 'required',
                        'precioEnvio' => 'required',
                    ]);
                else
                    {
                         $this->validate($request, [
                        'idProducto' => 'required|integer',   
                        'precioVenta' => 'required',
                        'precioEnvio' => 'required',
                    ]);
                    }

                if($request->input("idProducto")=='y')
                    {
                         Producto::create($request->all()); 
                         $idProducto = DB::table('productos')->max('id');
                    } 
               else
                    $idProducto = $request->input("idProducto");
                

                $extension = $archivo->extension();
                $detalleProducto = new detalleProducto;
                $detalleProducto->idProducto = $idProducto;
                $detalleProducto->idTalla = $request->input("idTalla");
                $detalleProducto->idColor = $request->input("idColor");
                $detalleProducto->peso = $request->input("peso");
                $detalleProducto->precioVenta = $request->input("precioVenta");
                $detalleProducto->precioEnvio = $request->input("precioEnvio");
                $detalleProducto->creadoPor = $request->input("creadoPor"); 
                $ruta='-Prod'.'.'.$extension;
                $detalleProducto->ruta = $ruta;
                $detalleProducto->save();
                $idDetProducto = DB::table('detalleProducto')->max('id');
                
                $ruta = $idDetProducto.$ruta;
                $r1=Storage::disk('fotosProductos')->put($ruta,  \File::get($archivo) );
                return redirect()->route('producto.index')
                                ->with('success','Producto registrado con éxito');

                
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
        $producto = Producto::find($id);
        return view('producto.show',compact('productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $detaProd = detalleProducto::find($id);
       $producto = Producto::find($detaProd->idProducto);
       $list_colores = colores::all();
       $list_tallas = tallas::all();
       $list_productos = Producto::all();
       
       return view("producto.edit")
       ->with("item",$producto)
       ->with("itemDet",$detaProd)
       ->with("list_productos",$list_productos)
       ->with("list_colores",$list_colores)
       ->with("list_tallas",$list_tallas) ;
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
        $this->validate($request, [
            'description' => 'required',
        ]);

        Producto::find($id)->update($request->all());
        return redirect()->route('producto.index')
                        ->with('success','producto modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::find($id)->delete();
        return redirect()->route('producto.index')
                        ->with('success','producto eliminado con éxito');
    }    



}
