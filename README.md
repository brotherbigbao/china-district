### 中国地区数据
####composer安装
```
composer require liuyibao/china-district
```

####使用方法
```
use Liuyibao\ChinaDistrict\Data;
foreach(Data::fetchByThousand() as $thousandDistrict){
    // todo
    // save database
    foreach($thousandDistrict as $district){
        echo $district['id'], PHP_EOL; //编号，由1开始，是固定值
        echo $district['name'], PHP_EOL; //名称
        echo $district['level'], PHP_EOL; //等级: 1省/直辖市, 2市/直辖市区, 3区/县, 4镇/乡
        echo $district['pid'], PHP_EOL; //父id
    }
}
```

####适用场景
>新项目数据迁移用

####Laravel数据迁移例子
1. 结构迁移
```php
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('level');
            $table->integer('pid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('district');
    }
}

```

2. seed
```php
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Liuyibao\ChinaDistrict\Data;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 插入时间不超过5秒钟, 可根据实际键名每一条插入，效率会慢一些
        foreach(Data::fetchByThousand() as $thousandData){
            DB::table('district')->insert($thousandData);
        }
    }
}
```

####数据说明
>　来自Discuz官方数据