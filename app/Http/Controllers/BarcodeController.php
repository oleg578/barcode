<?php /** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Barcode;
use App\Printer;
use App\User;

class BarcodeController extends Controller
{
    private $pagesize;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->pagesize = env('PAGESIZE', 30);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $request->flash();
        $curprintername = $request->input('printername');
        $curemployee = $request->input('employee');

        $printers = Printer::select('name')->get();
        $users = User::select('pseudo')->get();
        if (is_null($curprintername) && is_null($curemployee)) {
            $barcodes = Barcode::paginate($this->pagesize);
        } elseif (!is_null($curprintername) && is_null($curemployee)) {
            $matchclause = [
                'printer_name' => $curprintername];
            $barcodes = Barcode::where($matchclause)->paginate($this->pagesize);
        } elseif (is_null($curprintername) && !is_null($curemployee)) {
            $matchclause = [
                'employee_pseudo' => $curemployee];
            $barcodes = Barcode::where($matchclause)->paginate($this->pagesize);
        } else {
            $matchclause = [
                'employee_pseudo' => $curemployee,
                'printer_name' => $curprintername];
            $barcodes = Barcode::where($matchclause)->paginate($this->pagesize);
        }

        return view('barcodes.index', [
            'barcodes' => $barcodes,
            'printers' => $printers,
            'users' => $users,
            'curprintername' => $curprintername,
            'curemployee' => $curemployee,
        ]);
    }

    /**
     * Build csv report file.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function reportcsv(Request $request)
    {
        //get method part
        $printers = Printer::select('name')->get();
        $users = User::select('pseudo')->get();
        //get form data
        if ($request->isMethod('post')) {
            $data = $request->all();
            //var_dump($data);die;
            if ($data['report_type'] == "staff_report") {
                list($fname, $outname, $headers) = $this->buildUserReport($data);
                return response()
                    ->download($fname, $outname, $headers)
                    ->deleteFileAfterSend();
            }
            if ($data['report_type'] == "date_report") {
                list($fname, $outname, $headers) = $this->buildDateReport($data);
                return response()
                    ->download($fname, $outname, $headers)
                    ->deleteFileAfterSend();
            }

        }

        return view('barcodes.reportcsv', [
            'printers' => $printers,
            'users' => $users,
        ]);
    }

    private function buildUserReport($data)
    {
        $printername = $data['printername'];
        $employee = $data['employee'];
        if (is_null($printername) && is_null($employee)) {
            $barcodes = Barcode::get();
        } elseif (!is_null($printername) && is_null($employee)) {
            $matchclause = [
                'printer_name' => $printername];
            $barcodes = Barcode::where($matchclause)->get();
        } elseif (is_null($printername) && !is_null($employee)) {
            $matchclause = [
                'employee_pseudo' => $employee];
            $barcodes = Barcode::where($matchclause)->get();
        } else {
            $matchclause = [
                'employee_pseudo' => $employee,
                'printer_name' => $printername];
            $barcodes = Barcode::where($matchclause)->get();
        }
        $fname = sprintf("/tmp/barcode_report-%s.csv", uniqid());
        $handle = fopen($fname, 'w+');
        $csvheader = ["Barcode", "Employee", "PrinterName", "CreatedAt"];
        fputcsv($handle, $csvheader);
        foreach ($barcodes as $barcode) {
            $row = [
                $barcode->code,
                $barcode->employee_pseudo,
                $barcode->printer_name,
                $barcode->created_at,
            ];
            fputcsv($handle, $row);
        }
        fclose($handle);
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; barcodes.csv',
        ];
        $outname = sprintf("barcodes_report_%s_%s.csv",
            str_replace(" ", "-", $employee),str_replace(" ", "-", $printername));
        return array($fname, $outname, $headers);
    }

    private function buildDateReport($data)
    {
        $workdate = $data['workdate'];
        if (is_null($workdate)) {
            $barcodes = Barcode::get();
        } else {
            $barcodes = Barcode::whereRaw('DATE(updated_at)=?', [$workdate])->get();
        }
        //var_dump($barcodes);die;
        $fname = sprintf("/tmp/barcode_report-%s.csv", uniqid());
        $handle = fopen($fname, 'w+');
        $csvheader = ["Barcode", "Employee", "PrinterName", "CreatedAt"];
        fputcsv($handle, $csvheader);
        foreach ($barcodes as $barcode) {
            $row = [
                $barcode->code,
                $barcode->employee_pseudo,
                $barcode->printer_name,
                $barcode->created_at,
            ];
            fputcsv($handle, $row);
        }
        fclose($handle);
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; barcodes.csv',
        ];
        $outname = sprintf("barcodes_report_%s.csv", $workdate);
        return array($fname, $outname, $headers);
    }
}
