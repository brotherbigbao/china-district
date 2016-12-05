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
        echo $district['id'], PHP_EOL;
        echo $district['name'], PHP_EOL;
        echo $district['level'], PHP_EOL;
        echo $district['pid'], PHP_EOL;
    }
}
```

####适用场景
>新项目数据迁移用