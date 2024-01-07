<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    protected $fillable = ['name','ip','port',
    'zpl_prefix','zpl_suffix','zpl_code',
    'offline','offlinetime'];
    /**
     * {{logo}} - company logo
     *{{symbol}} - company symbol
     * {{barcode}} - order id
     */
    /**
     * Evaluate ZPL string - insert variables values
     *
     * @param string $in
     * @param string $out
     * @param array $values array of name_of_key=>value
     * @return void
     */
    public function evalZPL(string $in, array $values): ?string
    {
        $evalstr = $in;
        $regex = "/\\{\\{[[:alnum:]]+\\}\\}/m";
        $matched = preg_match_all(
            "/\\{\\{[[:alnum:]]+\\}\\}/m",
            $in,
            $out,
            PREG_UNMATCHED_AS_NULL
        );
        if ($matched === \FALSE) {
            return null;
        }
        if (count($out)===0) {
            return $in;
        }
        foreach ($out[0] as $m) {
            $mkey = trim($m, "{}");
            if ($values[$mkey]) {
                $evalstr = str_replace($m, $values[$mkey], $evalstr);
            }
        }
        return $evalstr;
    }
}