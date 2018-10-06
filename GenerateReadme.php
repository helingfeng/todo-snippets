<?php

$prefix_markdown = <<<EOT

## Snippets
个人编程笔记本，全栈工程师修炼之路

产品观念：小步快跑，通过迭代来优化产品，但如果每个迭代都颠覆了之前的设计，那就是原地踏步，每一次迭代都要知道这个迭代哪里出了问题，然后再针对问题做优化，而不是频繁的改版，持续优化，这个就必须建立在比较良好的数据监控与数据分析上，人有偏见但是数据不会，所以大公司的核心产品，每一个决策，每一个迭代都需要分析各种数据，建立完善的AB Testing与小流量机制，待收到了充分的信息证明这次迭代是有效的后再做真正的全量更新。

EOT;


$root_dir = './';
$dirs = scandir($root_dir);

foreach($dirs as $dir){
    if($dir !== '.' && $dir !== '..' && $dir !== '.git'){
        if(!is_file($root_dir.$dir)){
        
            $prefix_markdown .= <<<EOT
### {$dir}

EOT;

            // 打开每个模块的文件夹
            $_dirs = scandir($root_dir.$dir.'/');
            foreach($_dirs as $file){

                // 遍历文档
                if(is_file($root_dir.$dir.'/'.$file) && strpos($file, '.md') !== false){
                    $prefix_markdown .= <<<EOT
- [{$file}](./{$dir}/{$file})

EOT;
                }
            }
        }
    }
}

file_put_contents('./README.md', $prefix_markdown);

echo "done. \n\r";