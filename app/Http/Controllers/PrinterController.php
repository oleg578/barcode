<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Printer;

class PrinterController extends Controller
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
    public function index()
    {
        return view('printers.index', [
            'printers' => Printer::all(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('printers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Printer::create([
            'name' => $data['name'],
            'ip' => $data['ip'],
            'port' => $data['port'],
            'zpl_prefix' => $data['zpl_prefix'],
            'zpl_suffix' => $data['zpl_suffix'],
            'zpl_code' => $data['zpl_code'],
        ]);
        return redirect()->action('PrinterController@index');
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
        $printer = Printer::findOrFail($id);
        return view('printers.edit', compact('printer'));
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
        $data = $request->all();
        $printer = Printer::findOrFail($id);
        $printer->ip = $data['ip'];
        $printer->port = $data['port'];
        $printer->zpl_prefix = $data['zpl_prefix'];
        $printer->zpl_suffix = $data['zpl_suffix'];
        $printer->zpl_code = $data['zpl_code'];
        $printer->save();
        return redirect()->action('PrinterController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Printer::destroy($id);
        return redirect()->action('PrinterController@index');
    }
}
