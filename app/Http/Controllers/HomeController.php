<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Cookie;
use App\Printer;
use App\Barcode;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $currentprinter = $request->cookie('__prn');
        return view('home', [
            'printers' => Printer::select(
                'name',
                'offline',
                'offlinetime'
            )->orderBy('name')->get(),
            'currentprinter' => $currentprinter,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function printaction(Request $request)
    {
        $data = $request->all();
        //uppercase data['barcode']
        $data['barcode'] = strtoupper($data['barcode']);
        Cookie::queue('__prn', $data['printername']);
        Barcode::create([
            'code' => $data['barcode'],
            'employee_pseudo' => $data['employeepseudo'],
            'printer_name' => $data['printername'],
        ]);
        try {
            $this->sendtoprinter($data);
        } catch (\Exception $exception) {
            return view('oops', [
                "errormsg" => $exception->getMessage(),
            ]);
        }
        return redirect()->action('HomeController@index');
    }

    private function sendtoprinter($data)
    {
        $printer = Printer::where('name', $data['printername'])->first();
        $port = $printer->port;
        $host = $printer->ip;
        $barcode = $data['barcode'];

        $label = $printer->zpl_prefix.$barcode.$printer->zpl_suffix;
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket === false) {
            throw new \Exception(
                "socket_create() failed: reason: " .
                socket_strerror(socket_last_error())
            );
        }

        $result = socket_connect($socket, $host, $port);

        if ($result === false) {
            throw new \Exception(
                "socket_create() failed: reason: " .
                socket_strerror(socket_last_error($socket))
            );
        }
        $res = socket_write($socket, $label, strlen($label));
        if (!$res) {
            throw new \Exception(
                "socket_create() failed: reason: " .
                socket_strerror(socket_last_error($socket))
            );
        }
        socket_close($socket);
    }
}
