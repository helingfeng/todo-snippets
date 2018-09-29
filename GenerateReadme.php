<?php

$prefix_markdown = <<<EOT

## Snippets
个人编程笔记本，全栈工程师修炼之路

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