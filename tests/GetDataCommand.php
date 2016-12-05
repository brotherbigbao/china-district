<?php
/**
 * Created by PhpStorm.
 * User: liuyibao
 * Date: 16-12-5
 * Time: 下午4:28
 * Description: 用于Laravel Command
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ReadDistrict extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'read:district';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read district data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $fileName = [
            'Data0001',
            'Data0002',
            'Data0003',
            'Data0004',
            'Data0005',
            'Data0006',
            'Data0007',
            'Data0008',
            'Data0009',
            'Data0010',
            'Data0011',
            'Data0012',
            'Data0013',
            'Data0014',
            'Data0015',
            'Data0016',
            'Data0017',
            'Data0018',
            'Data0019',
            'Data0020',
            'Data0021',
            'Data0022',
            'Data0023',
            'Data0024',
            'Data0025',
            'Data0026',
            'Data0027',
            'Data0028',
            'Data0029',
            'Data0030',
            'Data0031',
            'Data0032',
            'Data0033',
            'Data0034',
            'Data0035',
            'Data0036',
            'Data0037',
            'Data0038',
            'Data0039',
            'Data0040',
            'Data0041',
            'Data0042',
            'Data0043',
            'Data0044',
            'Data0045',
            'Data0046',
            'Data0047',
            'Data0048',
            'Data0049',
        ];
        $i = 0;
        $results = DB::table('pre_common_district')->orderBy('id')->get();
        $results2 = $results->toArray();
        $r = array_chunk($results2, 1000);
        foreach ($r as $districts){
            $fp = fopen($fileName[$i] . '.php', 'a');
            fwrite($fp, '<?php' . PHP_EOL);
            fwrite($fp, 'namespace Liuyibao\ChinaDistrict;' . PHP_EOL);
            fwrite($fp, 'class ' . $fileName[$i] . '{' . PHP_EOL);
            fwrite($fp, 'public static $data = [' . PHP_EOL);
            foreach($districts as $district){
                fwrite($fp, "['id' => $district->id, 'name' => '$district->name', 'level' => '$district->level', 'pid' => $district->upid]" . ',' . PHP_EOL);
            }
            fwrite($fp, '];' . PHP_EOL . '}');
            fclose($fp);
            $i++;
        }
    }
}